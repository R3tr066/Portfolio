<?php
declare(strict_types=1);

require __DIR__ . '/../../parts/head.php';

require_once __DIR__ . '/../../app/connection.php';
require_once __DIR__ . '/../../app/dbTransaction.php';

$transactions = showTransactions($connection);
?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
            <th scope="col">Name</th>
            <th scope="col">Symbol</th>
            <th scope="col">Volume</th>
            <th scope="col">Price</th>
            <th scope="col">Transaction date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>

        <tbody class="table-group-divider">
        <?php
        $i = 1;
        foreach ($transactions as $transaction) {
            $volume = number_format((float)$transaction['volume'], 2, ',', ' ');
            $price = number_format((float)$transaction['price'], 2, ',', ' ');
            echo "<tr>
                <th scope='row'>$i</th>
                <td>{$transaction['type']}</td>
                <td>{$transaction['name']}</td>
                <td>{$transaction['symbol']}</td>
                <td>$volume</td>
                <td>$price {$transaction['mark']}</td>
                <td>{$transaction['transaction_date']}</td>
                <td>
                    <a class='btn btn-danger' href='/delete-transaction?id={$transaction['id']}' role='button'>Delete</a>
                </td>
              </tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>
    <a class="btn btn-success" href="/add-transaction" role="button">Add transaction</a>

<?php require __DIR__ . '/../../parts/footer.php'; ?>