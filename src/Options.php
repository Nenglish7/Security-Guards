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
    /** @const array INSTALL A list of all the install options. */
    const INSTALL = [
        '--prefer-source',
        '--prefer-dist',
        '--dry-run',
        '--dev',
        '--no-dev',
        '--no-autoloader',
        '--no-scripts',
        '--no-progress',
        '--no-suggest',
        '--optimize-autoloader',
        '--classmap-authoritative',
        '--apcu-autoloader',
        '--ignore-platform-reqs'
    ];
    /** @const array UPDATE A list of all the update options. */
    const UPDATE = [
        '--prefer-source',
        '--prefer-dist',
        '--dry-run',
        '--dev',
        '--no-dev',
        '--lock',
        '--no-autoloader',
        '--no-scripts',
        '--no-progress',
        '--no-suggest',
        '--with-dependencies',
        '--with-all-dependencies',
        '--optimize-autoloader',
        '--classmap-authoritative',
        '--apcu-autoloader',
        '--ignore-platform-reqs',
        '--prefer-stable',
        '--prefer-lowest',
        '--interactive',
        '--root-reqs'
    ];
}
