<?php

class Router
{
    public static function handle(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // main page
        if (preg_match('~^/([?|#].*)*$~si', $uri)) {
            require_once __DIR__ . '/../app/controller/mainPage.php';
            exit();
        }
        // latest price
        if (preg_match('~^/latest-price([?|#].*)*~si', $uri)) {
            require_once __DIR__ . '/../app/controller/latestPriceShow.php';
            exit();
        }
        // portfolio
        if (preg_match('~^/portfolio([?|#].*)*~si', $uri)) {
            require_once __DIR__ . '/../app/controller/portfolio.php';
            exit();
        }
        // update price
        if (preg_match('~^/update-price([?|#].*)*~si', $uri)) {
            require_once __DIR__ . '/../app/controller/updatePrice.php';
            exit();
        }
        // 404
        require_once __DIR__ . '/../app/controller/404.php';

    }
}