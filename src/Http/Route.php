<?php

namespace Foundation\Http;

class Route extends Router
{
    /**
     * @return array[]
     */
    public static function routes()
    {
        return static::$routes;
    }

    /**
     * @return array
     */
    public static function getRoutes()
    {
        return static::$routes['GET'];
    }

    /**
     * @return array
     */
    public static function getUris()
    {
        return array_keys(static::getRoutes());
    }

    /**
     * @return array
     */
    public static function getControllerActions()
    {
        return array_column(static::getRoutes(), 'uses');
    }

    /**
     * @return array
     */
    public static function getNames()
    {
        return array_column(static::getRoutes(), 'as');
    }

    /**
     * @return array
     */
    public static function postRoutes()
    {
        return static::$routes['POST'];
    }

    /**
     * @return array
     */
    public static function postUris()
    {
        return array_keys(static::postRoutes());
    }

    /**
     * @return array
     */
    public static function postControllerActions()
    {
        return array_column(static::postRoutes(), 'uses');
    }

    /**
     * @return array
     */
    public static function postNames()
    {
        return array_column(static::postRoutes(), 'as');
    }

    /**
     * @return array[]
     */
    public static function getRoutesWithNamesAsKeys()
    {
        $routes = array_map(function ($uri, $controllerAction) {
            return [
                'uses' => $controllerAction,
                'uri' => $uri
            ];
        }, static::getUris(), static::getControllerActions());

        return array_combine(static::getNames(), $routes);
    }

    /**
     * @return array
     */
    public static function postRoutesWithNamesAsKeys()
    {
        $routes = array_map(function ($uri, $controllerAction) {
            return [
                'uses' => $controllerAction,
                'uri' => $uri
            ];
        }, static::postUris(), static::postControllerActions());

        return array_combine(static::postNames(), $routes);
    }

    /**
     * @return array
     */
    public static function routesWithNamesAsKeys()
    {
        return [
            'GET' => static::getRoutesWithNamesAsKeys(),
            'POST' => static::postRoutesWithNamesAsKeys()
        ];
    }

    /**
     * @param $uri
     * @param array $actions
     */
    public static function get($uri, array $actions)
    {
        $uri = trim($uri, '/') ?: '/';
        static::$routes['GET'][$uri] = $actions;
    }

    /**
     * @param $uri
     * @param array $actions
     */
    public static function post($uri, array $actions)
    {
        $uri = trim($uri, '/') ?: '/';
        static::$routes['POST'][$uri] = $actions;
    }
}
