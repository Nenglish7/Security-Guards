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

namespace Nenglish7\ComposerEngine\Tests;

/**
 * use PHPUnit\Framework\TestCase;
 * use Nenglish7\ComposerEngine\Process;
 */
use PHPUnit\Framework\TestCase;
use Nenglish7\ComposerEngine\Process;

/**
 * ProcessTest.
 */
class ProcessTest extends TestCase
{
    public function testConstructor()
    {
        $process1 = new Process('install', [
        ]);
        $process2 = new Process('install', [
            '--no-dev'
        ]);
        $process3 = new Process('install', [
            '--no-suggest',
            '--ignore-platform-reqs'
        ]);
        $process4 = new Process('install', [
            '--dry-run'
        ]);
        $this->assertTrue(\true);
    }
    
    public function testRun()
    {
        $process = new Process('install', [
        ]);
        $process->run();
        /composer_install();
        $this->assertTrue(\true);
    }
    
    public function testException1()
    {
        $this->expectException(\Nenglish7\ComposerEngine\Exception\UnexpectedValueException::class);
        $process1 = new Process('install', [
            'foo-bar'
        ]);
    }
    
    public function testException2()
    {
        $this->expectException(\Nenglish7\ComposerEngine\Exception\InvalidArgumentException::class);
        $process1 = new Process(\true, [
            'foo-bar'
        ]);
    }
    
    public function testException3()
    {
        $this->expectException(\Nenglish7\ComposerEngine\Exception\InvalidArgumentException::class);
        $process1 = new Process('install', \true);
    }
}
