<?php
declare(strict_types=1);

function findPriceByDateAndSymbol(PDO $connection, string $date, string $symbol): array
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

function findLatestPrices(PDO $connection): array
{
    $sql = "SELECT s.name, s.symbol, p.price, to_char(p.price_date, 'DD.MM.YYYY') AS price_date, c.mark
FROM stock s
         INNER JOIN price p on s.id = p.stock_id
         INNER JOIN currency c on s.currency_id = c.id
WHERE p.price_date = (SELECT MAX(price_date) FROM price WHERE stock_id = s.id)
ORDER BY s.name";
    $result = $connection->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}