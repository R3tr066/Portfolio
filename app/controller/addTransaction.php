<?php
declare(strict_types=1);

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../dbTransaction.php';

$data = array(
    "transactionType" => $_POST["transactionType"],
    "stockSymbol" => $_POST["stockSymbol"],
    "volume" => $_POST["volume"],
    "price" => $_POST["price"],
    "date" => $_POST["date"],
);

insertTransaction($connection, $data);

header("Location: portfolio");
exit;

