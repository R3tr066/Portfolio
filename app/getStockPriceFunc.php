<?php
declare(strict_types=1);

function getStockPrices(string $symbol, string $apiKey): array
{
    $ch = curl_init('https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data?symbol=' . $symbol);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-RapidAPI-Key: ' . $apiKey]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    if ($result === false) {
        return [
            'error' => curl_error($ch),
            'data' => null
        ];
    }

    $decodedResult = json_decode(
        $result,
        true
    );

    return [
        'error' => null,
        'data' => $decodedResult
    ];
}