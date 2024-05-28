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
    $sql = "SELECT t.id, tt.name AS type, s.name, s.symbol, t.volume, t.price, to_char(t.transaction_date, 'DD.MM.YYYY') AS transaction_date, c.mark
FROM stock_transaction t
INNER JOIN stock_transaction_type tt ON t.type_id = tt.id
INNER JOIN stock s ON t.stock_id = s.id
INNER JOIN currency c ON s.currency_id = c.id
ORDER BY t.transaction_date";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function deleteTransaction(PDO $connection, int $id): void
{
    $sql = "DELETE FROM stock_transaction WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function findTransactionById(PDO $connection, int $id): array
{
    $sql = "SELECT st.*,s.id AS symbolID, s.symbol AS symbol, c.code AS code, tp.id AS transactionTypeId, tp.name AS transactionTypeName FROM stock_transaction st
INNER JOIN stock s ON st.stock_id = s.id
INNER JOIN currency c ON s.currency_id = c.id
INNER JOIN stock_transaction_type tp ON st.type_id = tp.id
WHERE st.id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
}

function updateTranscation(PDO $connection, array $data): void
{
    $sql="UPDATE stock_transaction
SET type_id = :transactionType,
    stock_id = :stockID,
    volume = :volume,
    price = :price,
    transaction_date = :date
WHERE id = :transactionId";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':transactionType', $data['transactionType']);
    $stmt->bindParam(':stockID', $data['stockID']);
    $stmt->bindParam(':volume', $data['volume']);
    $stmt->bindParam(':price', $data['price']);
    $stmt->bindParam(':date', $data['date']);
    $stmt->bindParam(':transactionId', $data['transactionId']);
    $stmt->execute();
}

function showCurrency (PDO $connection): array
{
    $sql = "select id, name from stock_transaction_type";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}