<?php
declare(strict_types=1);

$dsn = 'pgsql:dbname=portfolio;host=postgres';
$user = 'tom';
$password = 'postgres';

$dbh = new PDO($dsn, $user, $password);

$sql = 'SELECT * FROM stock order by symbol asc limit 5';
$stm=$dbh->query($sql);
var_dump($stm->fetchAll(PDO::FETCH_ASSOC));