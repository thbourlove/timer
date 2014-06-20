<?php
namespace Eleme\Timer;

use ArrayIterator;
use IteratorAggregate;

class Collection implements IteratorAggregate
{
    private $collection = array();

    private $namespace = null;

    public function __construct($namespace = '')
    {
        $this->namespace = $namespace;
    }

    public function getNamespace()
    {
        return $this->namespace;
    }

    public function get($name)
    {
        $full = $this->full($name);
        if (empty($this->collection[$full])) {
            throw new TimerException("timer $name is not exists.");
        }
        return $this->collection[$full];
    }

    public function start($name)
    {
        $full = $this->full($name);
        if (empty($this->collection[$full])) {
            $this->collection[$full] = new Timer();
        }
        $this->collection[$full]->start();
    }

    public function stop($name)
    {
        $this->get($name)->stop();
    }

    public function getIterator()
    {
        return new ArrayIterator($this->collection);
    }

    private function full($name)
    {
        return $this->namespace ? "{$this->namespace}.{$name}" : $name;
    }
}
