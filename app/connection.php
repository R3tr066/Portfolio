<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/settings.php';
$connection = new PDO($settings['db']['dsn'], $settings['db']['user'], $settings['db']['password']);