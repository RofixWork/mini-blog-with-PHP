<?php

namespace App;

use App\Exceptions\ClassNotExistException;
use App\Exceptions\MethodNotExistException;
use App\Exceptions\RouteNotFoundException;
use App\Helpers\HttpMethods;
use Illuminate\Container\Container;

class Router
{
    private array $routes = [];

    public function __construct(protected Container $container)
    {
    }

    private function register(string $method, string $route, callable|array $action) : void
    {
        $this->routes[$method][$route] = $action;
    }

    public function get(string $route, callable|array $action) : static
    {
        $this->register(HttpMethods::GET->value, $route, $action);
        return $this;
    }

    public function post(string $route, callable|array $action) : static
    {
        $this->register(HttpMethods::POST->value, $route, $action);
        return $this;
    }

    /**
     * @throws RouteNotFoundException
     * @throws \Exception
     */
    public function resolve(string $requestUri, string $method) : string|\Exception
    {
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[strtolower($method)][$route] ?? null;
        try {

            if(!$action)
            {
                throw new RouteNotFoundException($route);
            }

            if(is_callable($action))
            {
                return $this->runCallableAction($action);
            }

            return $this->runActionInController($action);

        }
        catch(RouteNotFoundException $exception)
        {
            throw new RouteNotFoundException($exception->getRoute(), $exception->getMessage(), $exception->getCode());
        }
        catch(\Exception $exception)
        {
            throw new \Exception($exception->getMessage(), $exception->getCode());
        }

    }

    public function printRoutes()
    {
        print_r($this->routes);
    }

    //function for call action by call_user_func method
    private function runCallableAction(callable $action) : string
    {
        return call_user_func($action);
    }

    /**
     * @throws ClassNotExistException
     * @throws MethodNotExistException
     */
    private function runActionInController(array $action) : string|\Exception
    {
        [$className, $method] = $action;

        if(!class_exists($className))
        {
            throw new ClassNotExistException("not exist any class By This name [$className]");
        }

        $class = $this->container->get($className);

        if(!method_exists($class, $method))
        {
            throw new MethodNotExistException("not exist this method [$method] in this Controller [$className]");
        }

        return call_user_func_array([$class, $method], []);
    }
}