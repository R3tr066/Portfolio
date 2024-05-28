<?php
declare(strict_types=1);

require __DIR__ . '/../../parts/head.php';

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../dbSymbolFunc.php';


$symbols = findAllSymbols($connection);
?>
<h1>Add transaction</h1>

<form class="needs-validation" novalidate action="/add-transaction" method="post">
    <div class="form-floating mb-3">
        <select class="form-select" id="transactionType" name="transactionType" required>
            <option selected disabled value="">Choose transaction type</option>
            <option value="1">Buy</option>
        </select>
        <label for="transactionType">Transaction type</label>
        <div class="invalid-feedback">
            Please choose transaction type
        </div>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" id="stockID" name="stockID" required>
            <option selected disabled value="">Choose stock symbol</option>
            <?php foreach ($symbols as $symbol)
                echo "<option value='{$symbol['id']}'>{$symbol['symbol']}</option>" ?>
        </select>
        <label for="stockID">Stock symbol</label>
        <div class="invalid-feedback">
            Please choose stock symbol
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="number" step="0.00001" class="form-control" id="volume" name="volume" placeholder="example: 1" required>
        <label for="volume">Volume</label>
        <div class="invalid-feedback">
            Please insert volume
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="number" step="0.0001" class="form-control" id="price" name="price" placeholder="example: 3.500"
               required>
        <label for="price">Transaction price</label>
        <div class="invalid-feedback">
            Please insert price
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" name="date" id="date" required>
        <label for="date">Transaction date</label>
        <div class="invalid-feedback">
            Please insert date
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-success" type="submit">Add</button>
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
