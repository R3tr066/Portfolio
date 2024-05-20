<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfólio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg border-bottom bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Porftólio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link<?php if (preg_match('~^/([?|#].*)*$~si', $_SERVER['REQUEST_URI'])) echo " active" ?>"
                   href="/">Home</a>
                <a class="nav-link<?php if (str_starts_with($_SERVER['REQUEST_URI'], "/latest-price")) echo " active" ?>"
                   href="latest-price">Latest price</a>
                <a class="nav-link<?php if (str_starts_with($_SERVER['REQUEST_URI'], "/portfolio")) echo " active" ?>"
                   href="portfolio">Portfolio</a>
            </div>
        </div>
    </div>
</nav>


