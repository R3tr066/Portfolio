<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/dbSymbolFunc.php';
require_once __DIR__ . '/../app/connection.php';

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