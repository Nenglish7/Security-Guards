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

use Nenglish7\ComposerEngine\Options;
use Nenglish7\ComposerEngine\Process;
use Nenglish7\ComposerEngine\InvalidArgumentException as Nenglish7InvalidArgumentException;
use Nenglish7\ComposerEngine\UnexpectedValueException as Nenglish7UnexpectedValueException;

function composer_install($options = [])
{
    if (is_array($options) || $options instanceof Traversable) {
        foreach ($options as $option) {
            if (!in_array($option, Options::INSTALL, true)) {
                throw new Nenglish7UnexpectedValueException(sprintf(
                    'The `%s` option is not recognized. Allowed: `%s`.',
                    htmlspecialchars($option, ENT_QUOTES),
                    serialize(Options::INSTALL)
                ));
            }
        }
        $process = new Process($options, 'install');
        $process->run();
    }
    throw new Nenglish7InvalidArgumentException(
        'The variable `$options` is not an array or an instance of `Traversable`.'
    );
}
