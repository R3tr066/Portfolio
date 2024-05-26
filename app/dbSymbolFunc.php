<?php
declare(strict_types=1);

function findAllSymbols(PDO $connection): array
{
    $sql = "SELECT * FROM stock";
    $symbols = $connection->query($sql);
    return $symbols->fetchAll(PDO::FETCH_ASSOC);
}

function findByID(PDO $connection, int $id): array
{
    $sql = "SELECT * FROM stock WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}