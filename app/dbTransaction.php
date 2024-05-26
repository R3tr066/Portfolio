<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/connection.php';

function insertTransaction(PDO $connection, array $data): void
{

    $sql = "INSERT INTO stock_transaction (type_id, stock_id, volume, price, currency_id, transaction_date)
            VALUES (:transactionType, :stockID, :volume, :price, :currency_id, :date)";

    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':transactionType', $data['transactionType']);
    $stmt->bindParam(':stockID', $data['stockID']);
    $stmt->bindParam(':volume', $data['volume']);
    $stmt->bindParam(':price', $data['price']);
    $stmt->bindParam(':currency_id', $data['currencyID']);
    $stmt->bindParam(':date', $data['date']);
    $stmt->execute();

}