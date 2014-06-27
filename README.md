# Timer
[![Build Status](https://travis-ci.org/thbourlove/timer.png?branch=master)](https://travis-ci.org/thbourlove/timer)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/thbourlove/timer/badges/quality-score.png?s=f113f1ab965f6aaef55e497a330caf72bff94201)](https://scrutinizer-ci.com/g/thbourlove/timer/)
[![Code Coverage](https://scrutinizer-ci.com/g/thbourlove/timer/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/thbourlove/timer/?branch=master)
[![Stable Status](https://poser.pugx.org/eleme/timer/v/stable.png)](https://packagist.org/packages/eleme/timer)

thrift service provider for silex framework.

## Install With Composer:

```json
"require": {
    "eleme/timer": "~0.1"
}
```

## Example:

```php
<?php

use Eleme\Timer\Collection;

require __DIR__.'/../vendor/autoload.php';

$collection = new Collection('namespace');
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
```
