<?php
declare(strict_types=1);

require __DIR__ . '/../../parts/head.php';

require_once __DIR__ . '/../../app/connection.php';
require_once __DIR__ . '/../../app/settings.php';
require_once __DIR__ . '/../../app/getStockPriceFunc.php';
require_once __DIR__ . '/../../app/dbPriceFunc.php';
require_once __DIR__ . '/../../app/priceUpdate.php';
require_once __DIR__ . '/../../app/dbSymbolFunc.php';

$data = findLatestPrices($connection);
?>

<h1>Latest price</h1>

    <table class="table">
        <thead>
        <tr>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Symbol</th>
            <th class="text-center" scope="col">Price</th>
            <th class="text-center" scope="col">Date</th>
        </tr>
        </thead>

        <tbody class="table-group-divider">
        <?php
        $i = 1;
        foreach ($data as $row) {
            $price = number_format((float)$row['price'], 2, ',', ' ');
            echo "<tr>
                <th scope='row'>$i</th>
                <td>{$row['name']}</td>
                <td class='text-center'>{$row['symbol']}</td>
                <td class='text-end pe-3'>$price {$row['mark']}</td>
                <td class='text-center  '>{$row['price_date']}</tdclas>
              </tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>


<?php require __DIR__ . '/../../parts/footer.php'; ?>