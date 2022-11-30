<?php

use Foundation\App;
use Foundation\Session;
use Foundation\Http\Route;
use Foundation\Http\Request;
use Foundation\Http\Redirect;

/**
 * @param $key
 * @param string $default
 * @return bool|mixed|string
 */
function env($key, $default = '')
{
    if (!isset($_ENV[$key]) && !empty($key) && !empty($default)) {
        return $_ENV[$key] = $default;
    }

    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    }

    return false;
}

/**
 * @param mixed ...$args
 */
function dump(...$args)
{
    echo '<pre>';
    var_dump(...$args);
    echo '</pre>';
}

/**
 * @param mixed ...$args
 */
function dd(...$args)
{
    dump(...$args);
    die();
}

/**
 * @param string $path
 * @return string
 */
function asset($path = '/')
{
    $path = trim($path, '/');
    return Request::appUrl() . '/' . $path;
}

/**
 * @return object
 * @throws Exception
 */
function app()
{
    return (object)App::get('app');
}

/**
 * @return Request
 */
function request()
{
    return new Request;
}

/**
 * @param $date
 * @return false|string
 */
function mysql_date($date)
{
    return date_format(date_create($date), "Y-m-d");
}

/**
 * @param $title
 * @param null $body
 * @return bool|mixed
 */
function session($title, $body = null)
{
    if ($body == null) {
        return Session::get($title);
    } else {
        Session::put($title, $body);
    }
}

/**
 * @param $email
 * @return mixed|string
 */
function user_name($email)
{
    $emailParts = explode("@", $email);
    return $emailParts[0];
}

/**
 * @return string
 * @throws Exception
 */
function base_uri()
{
    return Request::baseUri();
}

/**
 * @return string
 * @throws Exception
 */
function app_url()
{
    return Request::appUrl();
}

/**
 * @param $name
 * @param array $data
 * @return mixed
 */
function view($name, $data = [])
{
    extract($data);
    $name = str_replace(['.'], '/', $name);

    return require __DIR__ . "/../views/{$name}.view.php";
}

/**
 * @param string $path
 * @return Redirect
 */
function redirect($path = '')
{
    return Redirect::redirect($path);
}

/**
 * @param $uri
 * @param $params
 * @return string
 * @throws Exception
 */
function formatUri($uri, $params)
{
    $formattedUri = $uri;

    if (!empty($params)) {
        $formattedUri = $uri . '?' . http_build_query($params);
    }

    return $formattedUri != '/' ? base_uri() . $formattedUri : base_uri();
}

/**
 * @param $name
 * @param array $params
 * @return string
 * @throws Exception
 */
function route($name, $params = [])
{
    $getRoutes = Route::getRoutesWithNamesAsKeys();
    $postRoutes = Route::postRoutesWithNamesAsKeys();

    if (array_key_exists($name, $getRoutes)) {
        return formatUri($getRoutes[$name]['uri'], $params);
    } else if (array_key_exists($name, $postRoutes)) {
        return formatUri($postRoutes[$name]['uri'], $params);
    } else {
        throw new Exception("No route defined for this name!");
    }
}
