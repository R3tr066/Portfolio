<?php
declare(strict_types=1);

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../dbTransaction.php';


$data = array(
    "transactionId" => $_POST["transactionId"],
    "transactionType" => $_POST["transactionType"],
    "stockID" => $_POST["stockID"],
    "volume" => $_POST["volume"],
    "price" => $_POST["price"],
    "currencyId" => $_POST['currency_id'],
    "date" => $_POST["date"]
);


updateTranscation($connection, $data);

header("Location: transactions");
exit();