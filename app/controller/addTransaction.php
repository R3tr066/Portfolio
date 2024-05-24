<?php
declare(strict_types=1);
require __DIR__ . '/../../parts/head.php';
?>

<form>
    <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option value="1">Buy</option>
        </select>
        <label for="floatingSelect">Transaction type</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="stockSymbol" placeholder="example: SXR8.DE">
        <label for="stockSymbol">Stock symbol</label>
    </div>



</form>


<?php require __DIR__ . '/../../parts/footer.php'; ?>
