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

putenv('COMPOSER_HOME=' . getcwd() . '/vendor/bin/composer');

/** @link <https://getcomposer.org/doc/03-cli.md#install>. */
function composer_install($options = [])
{
}
