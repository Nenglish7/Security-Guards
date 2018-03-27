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
        'install'
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
     * Process the requested command.
     *
     * @param string $commandType The requested command type.
     * @param mixed $options      The requested options for the command.
     *
     * @throws InvalidArgumentException If the command options is not an array or Traversable.
     * @throws InvalidArgumentException If the command type is not recognized.
     * @throws UnexpectedValueException If the command options are not recognized.
     *
     * @return void
     */
    public function __construct($commandType, $options = [])
    {
        if (!\in_array($commandType, $this->commandTypes, \true)) {
            throw new Exception\InvalidArgumentException(\sprintf('The variable `$command` needs to be a string. Passed: `%s`.', \gettype($commandType)));
        }
        if (is_array($options) || $options instanceof Traversable) {
            foreach ($options as $key => $option) {
                if (!in_array($option, Options::INSTALL, true)) {
                    throw new Exception\UnexpectedValueException(sprintf('The `%s` option is not recognized. Allowed: `%s`. Reference ID: %s.', \htmlspecialchars(\strval($option), ENT_QUOTES), \serialize(Options::INSTALL), \strval($key)));
                }
            }
        } else {
            throw new Exception\InvalidArgumentException('The variable `$options` is not an array or an instance of `Traversable`.');
        }
        $this->commandType = $commandType;
        $this->options = $options;
    }
    
    /**
     * Execute the command.
     *
     * @return void
     */
    public function run()
    {
        $options = (array) $this->options;
        $optionLine = ' ' . \implode(' ', $options);
        if (\trim($optionLine) == '') {
            $optionLine = '';
        }
        if ($this->commandType == 'install') {
            $complete = 0;
            $out = array();
            \exec('composer install' . $optionLine . ' 2>&1', $out, $complete);
            if ($complete !== 0) {
                die('We are not able to run `composer install`. If you do not have composer installed please see <a href="https://getcomposer.org/">https://getcomposer.org/</a>');
            }
        }
    }
}
