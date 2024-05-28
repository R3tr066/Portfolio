<?php
declare(strict_types=1);

require __DIR__ . '/../../parts/head.php';

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../dbSymbolFunc.php';
require_once __DIR__ . '/../dbTransaction.php';


$transactionId = (int)$_GET['id'];

$data = findTransactionById($connection, $transactionId);
$currencies = showCurrency($connection);
$symbols = findAllSymbols($connection);
?>

<h1>Update transaction</h1>

<form class="needs-validation" novalidate action="/update-transaction" method="post">

    <input type="hidden" id="transactionId" name="transactionId" value="<?php echo $transactionId ?>" >
    <input type="hidden" id="currencyId" name="currency_id" value="<?php echo $data['currency_id']; ?>">

    <div class="form-floating mb-3">
        <select class="form-select" id="transactionType" name="transactionType" required>
            <?php foreach ($currencies as $currency) {
                $selected = ($currency['id'] == $data['transactiontypeid'] || $currency['name'] == $data['transactiontypename']) ? 'selected' : '';
                echo "<option $selected value='{$currency['id']}'>{$currency['name']}</option>";
            } ?>
        </select>
        <label for="transactionType">Transaction type</label>
        <div class="invalid-feedback">
            Please choose transaction type
        </div>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" id="stockID" name="stockID" required>
            <?php foreach ($symbols as $symbol) {
                $selected = ($symbol['id'] == $data['stock_id'] || $symbol['symbol'] == $data['symbol']) ? 'selected' : '';
                echo "<option $selected value='{$symbol['id']}'>{$symbol['symbol']}</option>";
            } ?>
        </select>
        <label for="stockID">Stock symbol</label>
        <div class="invalid-feedback">
            Please choose stock symbol
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="number" step="0.00001" value="<?php echo $data['volume']?>" class="form-control" id="volume" name="volume" placeholder="example: 1" required>
        <label for="volume">Volume</label>
        <div class="invalid-feedback">
            Please insert volume
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="number" step="0.0001" value="<?php echo $data['price']?>" class="form-control" id="price" name="price" placeholder="example: 3.500"
               required>
        <label for="price">Transaction price</label>
        <div class="invalid-feedback">
            Please insert price
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" value="<?php echo $data['transaction_date']?>" name="date" id="date" required>
        <label for="date">Transaction date</label>
        <div class="invalid-feedback">
            Please insert date
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
</form>

<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<?php require __DIR__ . '/../../parts/footer.php'; ?>

