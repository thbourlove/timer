<?php
namespace Eleme\Timer\Tests;

use Eleme\Timer\Timer;
use PHPUnit_Framework_TestCase;

class TimerTest extends PHPUnit_Framework_TestCase
{
    private $timer = null;

    public function setUp()
    {
        require_once 'MockMicrotime.php';
        $this->timer = new Timer();
    }

    /**
     * @expectedException Eleme\Timer\TimerException
     */
    public function testStopBeforeStart()
    {
        $this->timer->stop();
    }

    public function testTimer()
    {
        $this->timer->start();
        $this->timer->stop();
        $this->assertEquals(1, $this->timer->total());
        $this->assertEquals(1, $this->timer->count(), 1);
        $this->assertEquals(array(1), $this->timer->delta());
        $this->timer->start();
        $this->timer->stop();
        $this->assertEquals(array(1, 1), $this->timer->delta());
    }
}
