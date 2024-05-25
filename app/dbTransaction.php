<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/connection.php';

function insertTransaction(PDO $connection, array $data): void
{

    $sql = "INSERT INTO stock_transaction (type_id, stock_id, volume, price, transaction_date)
            VALUES (:transactionType, :stockSymbol, :volume, :price, :date)";

    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':transactionType', $data['transactionType']);
    $stmt->bindParam(':stockSymbol', $data['stockSymbol']);
    $stmt->bindParam(':volume', $data['volume']);
    $stmt->bindParam(':price', $data['price']);
    $stmt->bindParam(':date', $data['date']);``
    $stmt->execute();

}