<?php

use Eleme\Timer\Collection;

require __DIR__.'/../vendor/autoload.php';

$collection = new Collection();
$collection->start('test');
usleep(500000);
$collection->stop('test');
$collection->start('test');
usleep(1000000);
$collection->stop('test');
echo $collection->total('test');
