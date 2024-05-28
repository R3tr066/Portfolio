<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="d-flex flex-column h-100">
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Porftolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link<?php if (preg_match('~^/([?|#].*)*$~si', $_SERVER['REQUEST_URI'])) echo " active" ?>"
                       href="/">Portfolio</a>
                    <a class="nav-link<?php if (str_starts_with($_SERVER['REQUEST_URI'], "/latest-price")) echo " active" ?>"
                       href="latest-price">Latest price</a>
                    <a class="nav-link<?php if (str_starts_with($_SERVER['REQUEST_URI'], "/transactions")) echo " active" ?>"
                       href="transactions">Transactions</a>
                    <a class="nav-link<?php if (str_starts_with($_SERVER['REQUEST_URI'], "/update-price")) echo " active" ?>"
                       href="update-price">Update price</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="flex-shrink-0" style="margin-top: 60px">
    <div class="container">