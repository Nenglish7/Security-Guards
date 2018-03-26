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
 * use PHPUnit\Framework\TestCase;
 */
use PHPUnit\Framework\TestCase;

/**
 * ProcessTest.
 */
class ProcessTest extends TestCase
{
    public function testConstructor()
    {
        $process1 = new Process([
        ], 'install');
        $process2 = new Process([
            '--no-dev'
        ], 'install');
        $process3 = new Process([
            '--no-suggest',
            '--ignore-platform-reqs'
        ], 'install');
        $process4 = new Process([
            '--dry-run'
        ], 'install');
        $this->assertTrue(\true);
    }
    
    public function testException1()
    {
        $this->expectException(Exception\UnexpectedValueException::class);
        $process1 = new Process([
            'foo-bar'
        ], 'install');
    }
    
    public function testException2()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        $process1 = new Process([
            'foo-bar'
        ], \true);
    }
    
    public function testException3()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        $process1 = new Process(\true, 'install');
    }
}
