<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/dbSymbolFunc.php';
require_once __DIR__ . '/../app/connection.php';

function fillTable(PDO $connection): array
{
    $symbols = findAllSymbols($connection);
    $data = [];
    foreach ($symbols as $symbol) {
        $sql = "SELECT s.name, s.symbol, p.price, to_char(p.price_date, 'DD.MM.YYYY') AS price_date, c.mark FROM stock s INNER JOIN price p on s.id = p.stock_id INNER JOIN currency c on s.currency_id = c.id WHERE p.price_date = (SELECT MAX(price_date) FROM price WHERE stock_id = s.id) AND s.symbol = :symbol LIMIT 1;";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':symbol', $symbol['symbol']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $data[] = $result;
        }
    }
    return $data;
}