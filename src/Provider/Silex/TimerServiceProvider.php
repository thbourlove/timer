<?php
namespace Eleme\Timer\Provider\Silex;

class TimerServiceProvider
{
    public function register(Application $app)
    {
        $app['timers'] = $app->share(function ($app) {
            $timers = new Pimple();
            return new Collection();
        });
    }
}
