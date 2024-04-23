<?php
declare(strict_types=1);

function findAllSymbols(PDO $connection): array
{
    $sql = "SELECT * FROM stock";
    $symbols = $connection->query($sql);
    return $symbols->fetchAll(PDO::FETCH_ASSOC);
}