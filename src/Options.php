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
 * Options.
 */
class Options
{
    /** @const array REQUIRE A list of all the require options. */
    const REQUIRE = [
        '--dev',
        '--prefer-source',
        '--prefer-dist',
        '--no-progress',
        '--no-suggest',
        '--no-update',
        '--no-scripts',
        '--update-no-dev',
        '--with-dependencies',
        '--with-all-dependencies',
        '--ignore-platform-reqs',
        '--prefer-stable',
        '--prefer-lowest',
        '--sort-packages',
        '--optimize-autoloader',
        '--classmap-authoritative',
        '--apcu-autoloader'
    ];
    /** @const array REMOVE A list of all the remove options. */
    const REMOVE = [
        '--dev',
        '--no-progress',
        '--no-update',
        '--no-scripts',
        '--update-no-dev',
        '--update-with-dependencies',
        '--ignore-platform-reqs',
        '--optimize-autoloader',
        '--classmap-authoritative',
        '--apcu-autoloader'
    ];
}
