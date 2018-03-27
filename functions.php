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

/**
 * use Nenglish7\ComposerEngine\Process;
 */
use Nenglish7\ComposerEngine\Process;

function composer_require($packageName = '', $currentVersion = '', $options = [])
{
    $process = new Process('require', $options, $packageName, $currentVersion);
    return $process->run();
}

function composer_update($packageName = '', $options = [])
{
    $process = new Process('update', $options, $packageName);
    return $process->run();
}

function composer_remove($packageName = '', $options = [])
{
    $process = new Process('remove', $options, $packageName);
    return $process->run();
}
