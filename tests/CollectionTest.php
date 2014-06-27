<?php
namespace Eleme\Timer\Tests;

use Eleme\Timer\Timer;
use Eleme\Timer\Collection;
use PHPUnit_Framework_TestCase;

class CollectionTest extends PHPUnit_Framework_TestCase
{
    private $namespace = '';
    private $collection = null;

    public function setUp()
    {
        require_once 'MockMicrotime.php';
        $this->namespace = 'namespace';
        $this->collection = new Collection($this->namespace);
    }

    public function testGetNamespace()
    {
        $this->assertEquals($this->namespace, $this->collection->getNamespace());
    }

    /**
     * @expectedException Eleme\Timer\TimerException
     */
    public function testGetBeforeStart()
    {
        $this->collection->get('not_exist');
    }

    public function testCollection()
    {
        $this->collection->start('foo');
        $this->collection->start('bar');
        $this->collection->stop('foo');
        $this->collection->stop('bar');

        $this->collection->start('bar');
        $this->collection->stop('bar');
        $names = array();
        foreach ($this->collection as $name => $timer) {
            $names[] = $name;
            $this->assertInstanceOf('Eleme\Timer\Timer', $timer);
        }
        $this->assertEquals(array("{$this->namespace}.foo", "{$this->namespace}.bar"), $names);
    }
}
