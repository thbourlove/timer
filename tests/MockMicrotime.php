<?php
namespace Eleme\Timer;

function microtime($float)
{
    static $count = 0;
    return ++$count;
}
