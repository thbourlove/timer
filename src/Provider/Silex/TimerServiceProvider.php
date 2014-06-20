<?php
namespace Eleme\Timer\Provider\Silex;

class TimerServiceProvider
{
    public function register(Application $app)
    {
        $app['timer.collection'] = $app->share(function ($app) {
            return new Collection();
        });
    }
}
