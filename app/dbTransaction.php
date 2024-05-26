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

function showTransactions(PDO $connection): array
{
    $sql = "SELECT tt.name AS type, s.name, s.symbol, t.volume, t.price, to_char(t.transaction_date, 'DD.MM.YYYY') AS transaction_date, c.mark
FROM stock_transaction t
INNER JOIN stock_transaction_type tt ON t.type_id = tt.id
INNER JOIN stock s ON t.stock_id = s.id
INNER JOIN currency c ON s.currency_id = c.id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function deleteTransaction(PDO $connection, int $id): void{
    $sql = "DELETE FROM stock_transaction WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}