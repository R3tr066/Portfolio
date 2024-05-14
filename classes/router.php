<?php

class Router
{
    public static function handle()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        switch ($method) {

        }

        $pattern = '~^/portfolio[?|#].*~siD';
        if (preg_match($pattern, $currentUri)) {
            require_once $filename;
            exit();

        }
        return false;
    }
}