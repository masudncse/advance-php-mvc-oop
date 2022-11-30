<?php

namespace Foundation;

class Session
{
    /**
     * @param $title
     * @param $body
     */
    public static function put($title, $body)
    {
        session_start();
        $_SESSION[$title] = $body;
    }

    /**
     * @param $title
     * @return bool
     */
    public static function has($title)
    {
        session_start();
        return isset($_SESSION[$title]);
    }

    /**
     * @param $title
     * @return bool|mixed
     */
    public static function get($title)
    {
        if (static::has($title)) {
            $body = $_SESSION[$title];
            unset($_SESSION[$title]);

            return $body;
        } else {
            return false;
        }
    }
}