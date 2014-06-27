<?php
namespace Eleme\Timer\Tests\Provider\Silex;

use PHPUnit_Framework_TestCase;
use Eleme\Timer\Provider\Silex\TimerServiceProvider;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class TimerServiceProviderTest extends PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        $app = new Application();
        $app->register(new TimerServiceProvider);
        $app['timer.options'] = array(
            'foo' => array(
                'namespace' => 'foo.namespace',
            ),
            'bar' => array(
                'namespace' => 'bar.namespace',
            )
        );

        $app->get('/', function () {
        });
        $request = Request::create('/');
        $app->handle($request);

        $this->assertInstanceOf('Pimple', $app['timer.collections']);

        $foo = $app['timer.collections']['foo'];
        $this->assertInstanceOf('Eleme\Timer\Collection', $foo);
        $this->assertEquals('foo.namespace', $foo->getNamespace());

        $bar = $app['timer.collections']['bar'];
        $this->assertInstanceOf('Eleme\Timer\Collection', $bar);
        $this->assertEquals('bar.namespace', $bar->getNamespace());
    }
}
