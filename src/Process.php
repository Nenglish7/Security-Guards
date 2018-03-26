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
 * Process.
 */
class Process implements ProcessInterface
{
    /**
     * @var array $commandTypes The list of command types.
     */
    private $commandTypes = [
        'install'
    ];
    
    /**
     * @var string $commandType The command type passed.
     */
    private $commanType = '';
    
    /**
     * @var array $options The list of options passed.
     */
    private $options = [];
    
    /**
     * Process the requested command.
     *
     * @param array $options     The requested options for the command.
     * @param string $commanType The requested command type.
     *
     * @throws InvalidArgumentException If the command options is not an array or Traversable.
     * @throws InvalidArgumentException If the command type is not recognized.
     * @throws UnexpectedValueException If the command options are not recognized.
     *
     * @return void
     */
    public function __construct($options = [], $commandType)
    {
        if (!\in_array($commandType, $this->commandTypes, \true)) {
            throw new Exception\InvalidArgumentException(\sprintf('The variable `$command` needs to be a string. Passed: `%s`.', \gettype($commandType)));
        }
        if (is_array($options) || $options instanceof Traversable) {
            foreach ($options as $option) {
                if (!in_array($option, Options::INSTALL, true)) {
                    throw new Nenglish7UnexpectedValueException(sprintf('The `%s` option is not recognized. Allowed: `%s`.', \htmlspecialchars($option, ENT_QUOTES), \serialize(Options::INSTALL)));
                }
            }
        } else {
            throw new Exception\InvalidArgumentException('The variable `$options` is not an array or an instance of `Traversable`.');
        }
        $this->commanType = $commandType;
        $this->options = $options;
    }
    
    /**
     * Execute the command.
     *
     * @return void
     */
    public function run()
    {
        $optionLine = ' ';
        foreach ($this->options as $option) {
            $optionLine .= \escapeshellarg($option) . ' ';
        }
        $optionLine = rtrim($optionLine);
        if ($this->commanType == 'install') {
            \exec('composer install' . $optionLine);
        }
    }
}
