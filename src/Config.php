<?php
declare(strict_types=1);
/**
 * Session.
 *
 * @author  Nicholas English     <nenglish6657@gmail.com>.
 * @author  Session Contributors <https://github.com/Nenglish7/Session/graphs/contributors>
 *
 * @link    <https://github.com/Nenglish7/Session> Github Repository.
 * @license <https://github.com/Nenglish7/Session/blob/master/LICENSE> MIT License.
 *
 * @package Nenglish7/Session.
 */

namespace Nenglish7\Session;

use Traversable;

/**
 * Config.
 */
class Config extends IniConfig implements ConfigInterface
{
    
    /**
     * @var bool|false $complete Is the config done setting.
     */
    public $complete = \false;

    /**
     * Construct a new session config.
     *
     * @param mixed $config The session config.
     *
     * @throws Exception\InvalidArgumentException If the config has an invalid data type.
     *
     * @return void Return nothing.
     */
    public function __construct(
        $config
    ) {
        if (!\is_array($config) && !$config instanceof Traversable) {
            throw new Exception\InvalidArgumentException('The config has an invalid data type.');
        } else {
            $this->runConfig($this->validate($config));
        }
    }
    
    /**
     * Run the requested config.
     *
     * @param mixed $config The session config.
     *
     * @throws InvalidArgumentException If the data type is invalid for the requested directive.
     * @throws UnexpectedValueException If the session config key is unknown or unsupported.
     *
     * @return void Return nothing.
     */
    private function runConfig(
        $config
    ): void {
        foreach ($config as $key => $value) {
            if (\in_array($key, self::directives())) {
                if (!self::matches($key, $value)) {
                    throw new Exception\InvalidArgumentException('The data type is invalid for the requested directive.');
                }                
                \ini_set($key, $value);
            } elseif (
                $key == 'session.check.ip'
                || $key == 'session.check.ua'
                || $key == 'session.encrypt.data'
            ) {
                if (!\is_bool($value)) {
                    throw new Exception\InvalidArgumentException('The data type is invalid for the requested directive.');
                }
                Session::addDirective($key, \true);
            } else {
                throw new Exception\UnexpectedValueException('The session key is unknown or unsupported');
            }
        }
        $this->complete = \true;
    }
    
    /**
     * Valdiate the config.
     *
     * @param mixed $config The session config.
     *
     * @return void Return nothing.
     */
    private function validate(
        $config
    ): void {
        configValidator::validate($config);
    }
}
