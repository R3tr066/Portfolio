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
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Type</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Symbol</th>
            <th class="text-center" scope="col">Volume</th>
            <th class="text-center" scope="col">Price</th>
            <th class="text-center" scope="col">Transaction date</th>
            <th class="text-center" scope="col">Actions</th>
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
                <td class='text-center'>{$transaction['type']}</td>
                <td>{$transaction['name']}</td>
                <td class='text-center'>{$transaction['symbol']}</td>
                <td class='text-end pe-3'>$volume</td>
                <td class='text-end pe-3'>$price {$transaction['mark']}</td>
                <td class='text-center'>{$transaction['transaction_date']}</td>
                <td class='text-center'>
                <div class='dropdown'>
                    <button class='btn btn-primary dropdown-toggle' type='button'[ data-bs-toggle='dropdown' aria-expanded='false'>Actions</button>
                        <ul class='dropdown-menu'>
                               <li><a class='btn btn-success dropdown-item text-center' href='/update-transaction?id={$transaction['id']}' role='button'>Update</a></button></li>
                            <li><button type='button' data-bs-toggle='modal' data-bs-id='{$transaction['id']}' data-bs-target='#confirmModal' class='text-center btn btn-danger dropdown-item' >Delete</button></li>
                        </ul>
                    </div>                   
                </td>
              </tr>";
            $i++;
        }
        ?>
        </tbody>
    </table>
    <a class="btn btn-success" href="/add-transaction" role="button">Add transaction</a>

<!--delete modal-->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirmModalLabel">Confirm delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure u want to delete transaction?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="deleteBtn" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const confirmModal = document.getElementById('confirmModal')
        if (confirmModal) {
            confirmModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id')

                const btn = confirmModal.querySelector('#deleteBtn')

                btn.onclick = function () {
                    location.href = '/delete-transaction?id=' + id
                };

            })
        }
    </script>


<?php require __DIR__ . '/../../parts/footer.php'; ?>