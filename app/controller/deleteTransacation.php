<?php
declare(strict_types=1);

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../dbTransaction.php';

$transactionId = (int) $_GET['id'];

deleteTransaction($connection, $transactionId);

header("Location: transactions");
exit;