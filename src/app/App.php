<?php

namespace App;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
class App
{
    public function __construct(protected Container $container, protected Router $router, protected array $requestInfo)
    {
    }

    public function boot() : self
    {
        $capsule = new Capsule;
        $config = new Config($_ENV);
        $capsule->addConnection($config->db);

        $capsule->setEventDispatcher(new Dispatcher($this->container));

        $capsule->setAsGlobal();

        $capsule->bootEloquent();

        return $this;
    }
    public function run()
    {
        echo $this->router->resolve($this->requestInfo['uri'], strtolower($this->requestInfo['method']));
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }
}