<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfólio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg border-bottom bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Porftólio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link<?php if (str_starts_with($_SERVER['REQUEST_URI'], "/index.php")) echo " active" ?>" href="index.php">Home</a>
                <a class="nav-link<?php if (str_starts_with($_SERVER['REQUEST_URI'], "/latest-price.php")) echo " active" ?>" href="latest-price.php">Latest price</a>
                <a class="nav-link<?php if (str_starts_with($_SERVER['REQUEST_URI'], "/portfolio.php")) echo " active" ?>" href="portfolio.php">Portfolio</a>
            </div>
        </div>
    </div>
</nav>

