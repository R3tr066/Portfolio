<?php
declare(strict_types=1);

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../dbTransaction.php';
require_once __DIR__ . '/../dbSymbolFunc.php';

$symbol = findByID($connection, (int)$_POST["stockID"]);

$data = array(
    "transactionType" => $_POST["transactionType"],
    "stockID" => $_POST["stockID"],
    "volume" => $_POST["volume"],
    "price" => $_POST["price"],
    "currencyID" => $symbol["currency_id"],
    "date" => $_POST["date"]
);

insertTransaction($connection, $data);

header("Location: transactions");
exit;