<?php
declare(strict_types=1);

include_once __DIR__ . '/../classes/router.php';

Router:: handle('GET', '/portfolio', './portfolio.php');
Router:: handle('GET', '/latest-price', './latest-price.php');
?>

