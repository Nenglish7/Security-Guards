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
    // {{
        // {{
    public function testConstructor()
    {
        $process1 = new Process('update');
        $process2 = new Process('update');
        $process3 = new Process('update');
        $process4 = new Process('update');
        $this->assertTrue((bool) $process1);
        $this->assertTrue((bool) $process2);
        $this->assertTrue((bool) $process3);
        $this->assertTrue((bool) $process4);
    }
    // }}
    // {{
    public function testConstructorExceptionErrors1()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        $process1 = new Process('foo');
    }
    public function testConstructorExceptionErrors2()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        $process1 = new Process(\true);
    }
    // }}
    // {{
    public function testConstructorExceptionErrors3()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        $process1 = new Process('update', 'foo');
    }
    public function testConstructorExceptionErrors4()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        $process1 = new Process('update', 'bar');
    }
    // }}
    // }}
    // {{
    // {{
    // }}
    // }}
}
