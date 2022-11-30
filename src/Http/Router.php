<?php

namespace Foundation\Http;

use Exception;

class Router
{
    /**
     * @var array[]
     */
    protected static $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * @param $file
     * @return static
     */
    public static function load($file)
    {
        require $file;
        return new static;
    }

    /**
     * @param $uri
     * @param $method
     * @return mixed
     * @throws Exception
     */
    public function direct($uri, $method)
    {
        if (array_key_exists($uri, static::$routes[$method])) {
            return $this->callToAction(
                ...explode('@', static::$routes[$method][$uri]['uses'])
            );
        }

        throw new Exception("No route defined for this URI!");
    }

    /**
     * @param $controller
     * @param $action
     * @return mixed
     * @throws Exception
     */
    protected function callToAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to {$action} action!"
            );
        }

        return $controller->$action();
    }
}
