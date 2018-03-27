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
 * ProcessInterface.
 */
interface ProcessInterface
{
    /**
     * Process the requested command.
     *
     * @param string $commandType    The requested command type.
     * @param mixed $options         The requested options for the command.
     * @param string $packageName    The name of the package.
     * @param string $currentVersion The version requested from the package.
     *
     * @throws InvalidArgumentException If the command options is not an array or Traversable.
     * @throws InvalidArgumentException If the command type is not recognized.
     * @throws UnexpectedValueException If the command options are not recognized.
     *
     * @return void
     */
    public function __construct($commandType, $options = [], $packageName = '', $currentVersion = '');
    
    /**
     * Execute a composer command based on set variables.
     *
     * @return string|null The command output.
     */
    public function run();
}
