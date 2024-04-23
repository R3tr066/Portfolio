<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/settings.php';
require_once __DIR__ . '/../app/connection.php';
require_once __DIR__ . '/../app/dbSymbolFunc.php';
require_once __DIR__ . '/../app/getStockPriceFunc.php';
require_once __DIR__ . '/../app/dbPriceFunc.php';
function updatePrice(PDO $connection, string $apikey): array
{
    $result = [];
    $symbols =  findAllSymbols($connection);
    foreach ($symbols as $symbol) {
        $result[$symbol['symbol']]['inserted'] = 0;
        $result[$symbol['symbol']]['existing'] = 0;
        $prices = getStockPrices($symbol['alias'], $apikey );
        $result[$symbol['symbol']]['downloaded'] = count($prices['data']['prices']);

        foreach ($prices['data']['prices'] as $price) {
            $date = date("Y-m-d", $price['date'],);
            $dbPrice = findPriceByDateAndSymbol($connection, $date, $symbol['symbol']);
            if ($dbPrice === []){
                insertPrice($connection, $price, $symbol['symbol']);
                $result[$symbol['symbol']]['inserted']++;
            } else {
                $result[$symbol['symbol']]['existing']++;
            }
        }
    }
    return $result;
}