<?php

namespace Foundation\Http;

use Foundation\Session;

class Redirect
{
    /**
     * @param $path
     * @return static
     */
    public static function redirect($path)
    {
        if ($path != '')
            header("Location: {$path}");
        else
            return new static;
    }

    /**
     * @param $name
     * @param array $params
     * @throws \Exception
     */
    public function route($name, $params = [])
    {
        $route = route($name, $params);

        header("Location: {$route}");
    }

    /**
     * @param $name
     * @param array $params
     * @throws \Exception
     */
    public function toRoute($name, $params = [])
    {
        $this->route($name, $params);
    }

    /**
     * @param $title
     * @param $body
     * @return $this
     */
    public function with($title, $body)
    {
        Session::put($title, $body);

        return $this;
    }
}
