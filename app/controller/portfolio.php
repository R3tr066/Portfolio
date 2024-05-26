<?php
declare(strict_types=1);

require __DIR__ . '/../../parts/head.php';

require_once __DIR__ . '/../../app/connection.php';
require_once __DIR__ . '/../../app/settings.php';
require_once __DIR__ . '/../../app/getStockPriceFunc.php';
require_once __DIR__ . '/../../app/dbPriceFunc.php';
require_once __DIR__ . '/../../app/priceUpdate.php';
require_once __DIR__ . '/../../app/dbSymbolFunc.php';
require_once __DIR__ . '/../../app/dbPortfolio.php';

$data = displayStockReport($connection);
?>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Volume</th>
            <th scope="col">Price</th>
            <th scope="col">Latest price</th>
            <th scope="col">Price date</th>
            <th scope="col">Profit</th>
            <th scope="col">Percent</th>
        </tr>
        </thead>

        <tbody class="table-group-divider">
        <?php
        $i = 1;
        foreach ($data as $row) {
            $volume = number_format((float)$row['volume'], 2, ',', ' ');
            $latestPrice = number_format((float)$row['latest_price'], 2, ',', ' ');
            $price = number_format((float)$row['price'], 2, ',', ' ');
            $profit = number_format((float)$row['profit'], 2, ',', ' ');
            $percent = number_format((float)$row['percent'], 2, ',', ' ');
            echo "<tr>
                <th scope='row'>$i</th>
                <td>{$row['name']}</td>
                <td>$volume </td>
                <td>$price {$row['mark']}</td>
                <td>$latestPrice {$row['mark']}</td>
                <td>{$row['price_date']}</td>
                <td>$profit {$row['mark']}</td>
                <td>$percent%</td>
              </tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>

<?php require __DIR__ . '/../../parts/footer.php'; ?>