<?php
namespace Eleme\Timer;

function microtime()
{
    static $count = 0;
    return ++$count;
}
