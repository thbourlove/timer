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
$collection->start('fast');
$collection->stop('fast');
foreach ($collection as $name => $timer) {
    echo $name, "\n";
    foreach ($timer->delta() as $value) {
        echo $value, "\n";
    }
}
