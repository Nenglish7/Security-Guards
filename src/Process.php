<?php
/**
 * Composer Engine.
 *
 * @author  Nicholas English <nenglish0820@outlook.com>.
 *
 * @link    <https://github.com/Nenglish7/composer-engine> Github repository.
 * @license <https://github.com/Nenglish7/composer-engine/blob/master/LICENSE> GPL-3.0 License.
 *
 * @package composer-engine.
 */

namespace Nenglish7\ComposerEngine;

/**
 * use Traversable;
 */
use Traversable;

/**
 * Process.
 */
class Process implements ProcessInterface
{
    /**
     * @var array $commandTypes The list of command types.
     */
    private $commandTypes = [
        'require',
        'remove',
        'update',
        'install',
        'validate',
        'show'
    ];
    
    /**
     * @var string $commandType The command type passed.
     */
    private $commandType = '';
    
    /**
     * @var mixed $options The list of options passed.
     */
    private $options = [];
    
    /**
     * @var string $packageName The name of the package to use.
     */
    private $packageName = '';
    
    /**
     * @var string $currentVersion The version requested from the package.
     */
    private $currentVersion = '';
    
    /**
     * Process the requested command.
     *
     * @param string $commandType          The requested command type.
     * @param mixed $options               The requested options for the command.
     * @param string $packageName    The name of the package.
     * @param string $currentVersion The version requested from the package.
     *
     * @throws InvalidArgumentException If the command options is not an array or Traversable.
     * @throws InvalidArgumentException If the command type is not recognized.
     * @throws UnexpectedValueException If the command options are not recognized.
     *
     * @return void
     */
    public function __construct($commandType, $options = [], $packageName = '', $currentVersion = '')
    {
        if (!\in_array($commandType, $this->commandTypes, \true)) {
            throw new Exception\InvalidArgumentException(\sprintf(
                'The variable `$command` needs to be a string. Passed: `%s`.',
                \gettype($commandType)
            ));
        }
        if (!is_array($options) && !($options instanceof Traversable)) {
            throw new Exception\InvalidArgumentException('The variable `$options` is not an array or an instance of `Traversable`.');
        }
        $this->currentVersion = \trim($currentVersion);
        $this->packageName = \trim($packageName);
        $this->commandType = \trim($commandType);
        $this->options = $options;
    }
    
    /**
     * Execute a composer command based on set variables.
     *
     * @return string The command output.
     */
    public function run()
    {
        $options = $this->escapeArgument(\trim($this->getOptions));
        if ($this->commandType != 'update') {
            if ($this->commandType == 'require') {
                if (\trim($this->currentVersion) != '') {
                    $this->packageName .= ':';
                }
            }
            $command = $this->escapeArgument($this->commandType);
            return \shell_exec("composer {$command} {$this->packageName}{$this->currentVersion} {$options}");
        } else {
            if ($this->packageName == '') {
                $this->packageName .= ' ';
            }
            $command = $this->escapeArgument($this->commandType);
            return \shell_exec("composer {$command}{$this->packageName} {$options}");
        }
    }
    
    /**
     * Escape shell arguments in a command.
     *
     * @param string $data The shell argument that needs to be escaped.
     *
     * @return string The escaped shell argument.
     */
    private function escapeArgument($data)
    {
        return \escapeshellarg((string) $data);
    }
    
    /**
     * Format the options array to a string.
     *
     * @return string The options array formated to string.
     */
    private function getOptions()
    {
        $options = (array) $this->options;
        $optionLine = ' ' . \implode(' ', $options);
        if (\trim($optionLine) == '') {
            $optionLine = '';
        }
        return $optionLine;
    }
}
