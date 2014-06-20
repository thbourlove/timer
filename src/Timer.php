<?php
namespace Eleme\Timer;

class Timer
{
    private $start = 0;
    private $stop = 0;
    private $total = 0;
    private $count = 0;
    private $delta = array();

    public function start()
    {
        $this->stop = 0;
        $this->start = microtime(true);
    }

    public function stop()
    {
        $this->stop = microtime(true);
        if ($this->start === 0) {
            throw new TimerException('timer not started.');
        }
        $delta = $this->stop - $this->start;
        $this->delta[] = $delta;
        $this->total += $delta;
        $this->count += 1;
        $this->start = 0;
    }

    public function total()
    {
        return $this->total;
    }

    public function count()
    {
        return $this->count;
    }

    public function delta()
    {
        return $this->delta;
    }
}
