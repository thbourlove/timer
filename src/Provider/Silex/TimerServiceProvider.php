<?php
namespace Eleme\Timer\Provider\Silex;

use Pimple;
use Silex\Application;
use Silex\ServiceProviderInterface;
use Eleme\Timer\Collection;

class TimerServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['timer.collections'] = $app->share(function ($app) {
            $collections = new Pimple();
            foreach ($app['timer.options'] as $name => $option) {
                $collections[$name] = $collections->share(function ($collections) use ($name) {
                    return new Collection($option['namespace']);
                });
            }
            return new $collections;
        });
    }

    public function boot(Application $app)
    {
    }
}
