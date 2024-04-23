<?php
declare(strict_types=1);

require __DIR__ . '/../parts/head.php';
require __DIR__ . '/../parts/nav.php';

require_once __DIR__ . '/../app/connection.php';
require_once __DIR__ . '/../app/settings.php';
require_once __DIR__ . '/../app/getStockPriceFunc.php';
require_once __DIR__ . '/../app/dbPriceFunc.php';
require_once __DIR__ . '/../app/priceUpdate.php';
require_once __DIR__ . '/../app/dbSymbolFunc.php';
require_once __DIR__ . '/../app/fillTable.php';

//updatePrice($connection, $settings['rapidApiKey']);

//var_dump(fillTable($connection));
$data = fillTable($connection);

?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Symbol</th>
            <th scope="col">Price</th>
            <th scope="col">Date</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $i = 1;
        foreach ($data as $row) {
            echo "<tr>
                <th scope='row'>$i</th>
                <td>{$row['name']}</td>
                <td>{$row['symbol']}</td>
                <td>{$row['price']}</td>
                <td>{$row['price_date']}</td>
              </tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>


<?php require __DIR__ . '/../parts/script.php'; ?>