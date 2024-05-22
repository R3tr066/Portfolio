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
            <th scope="col">Value 2</th>
            <th scope="col">Profit</th>
            <th scope="col">Percent</th>
        </tr>
        </thead>

        <tbody class="table-group-divider">
        <?php
        $i = 1;
        foreach ($data as $row) {
            echo "<tr>
                <th scope='row'>$i</th>
                <td>{$row['name']}</td>
                <td>{$row['volume']}</td>
                <td>{$row['price']}</td>
                <td>{$row['latest_price']}</td>
                <td>{$row['price_date']}</td>
                <td>{$row['value_2']}</td>
                <td>{$row['profit']}</td>
                <td>{$row['percent']} %</td>
              </tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>


<?php require __DIR__ . '/../../parts/footer.php'; ?>