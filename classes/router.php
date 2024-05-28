<?php

class Router
{
    public static function handle(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];


        // latest price
        if (preg_match('~^/latest-price([?|#].*)*~si', $uri)) {
            require_once __DIR__ . '/../app/controller/latestPriceShow.php';
            exit();
        }
        // update price
        if (preg_match('~^/update-price([?|#].*)*~si', $uri)) {
            require_once __DIR__ . '/../app/controller/updatePrice.php';
            exit();
        }
        // insert transaction
        if (preg_match('~^/add-transaction([?|#].*)*~si', $uri) && $method == "GET") {
            require_once __DIR__ . '/../app/controller/addTransactionForm.php';
            exit();
        }
        // upload transaction
        if (preg_match('~^/add-transaction([?|#].*)*~si', $uri) && $method == "POST") {
            require_once __DIR__ . '/../app/controller/addTransaction.php';
            exit();
        }
        // transactions
        if (preg_match('~^/transactions([?|#].*)*~si', $uri)) {
            require_once __DIR__ . '/../app/controller/transactions.php';
            exit();
        }
        // delete transaction
        if (preg_match('~^/delete-transaction([?|#].*)*~si', $uri)) {
            require_once __DIR__ . '/../app/controller/deleteTransacation.php';
            exit();
        }
        // update transaction form
        if (preg_match('~^/update-transaction([?|#].*)*~si', $uri) && $method == "GET") {
            require_once __DIR__ . '/../app/controller/updateTransactionForm.php';
            exit();
        }
        // update transaction
        if (preg_match('~^/update-transaction([?|#].*)*~si', $uri) && $method == "POST") {
            require_once __DIR__ . '/../app/controller/updateTransaction.php';
            exit();
        }
        // portfolio
        if (preg_match('~^/([?|#].*)*~si', $uri)) {
            require_once __DIR__ . '/../app/controller/portfolio.php';
            exit();
        }
        // 404
        require_once __DIR__ . '/../app/controller/404.php';

    }
}