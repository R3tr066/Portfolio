<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/connection.php';
function findMePriceByDateAndSymbol(PDO $connection, string $date, string $symbol): array
{
    $sql = "SELECT * FROM price
            INNER JOIN stock ON price.stock_id = stock.id
            WHERE
                price.price_date = '$date'
                AND stock.symbol = '$symbol'";
    $stm = $connection->query($sql);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function insertPrice(PDO $connection, array $data, string $symbol)
{
    $price = $data['close'];
    $date = date("Y-m-d", $data['date']);
    $sql = "INSERT INTO price(price, stock_id, price_date, currency_id)
            VALUES ($price, 
                    (SELECT id FROM stock WHERE symbol = '$symbol'), 
                    '$date', 
                    (SELECT currency_id FROM stock WHERE symbol = '$symbol')
                    )";
    $connection->query($sql);
}