<?php
namespace Eleme\Timer;

use IteratorAggregate;

class Collection implements IteratorAggregate
{
    private $collection = array();

    public function get($name)
    {
        if (empty($this->collection[$name])) {
            throw new TimerException("timer $name is not exists.");
        }
        return $this->collection[$name];
    }

    public function start($name)
    {
        if (empty($this->collection[$name])) {
            $this->collection[$name] = new Timer();
        }
        $this->collection[$name]->start();
    }

    public function stop($name)
    {
        $this->get($name)->stop();
    }

    public function total($name)
    {
        return $this->get($name)->total();
    }

    public function count($name)
    {
        return $this->get($name)->count();
    }

    public function delta($name)
    {
        return $this->get($name)->delta();
    }

    public function getIterator()
    {
        return new ArrayIterator($this->collection);
    }
}
