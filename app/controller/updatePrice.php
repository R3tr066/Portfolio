<?php
declare(strict_types=1);

require __DIR__ . '/../../parts/head.php';

require_once __DIR__ . '/../../app/connection.php';
require_once __DIR__ . '/../../app/settings.php';
require_once __DIR__ . '/../../app/priceUpdate.php';


echo "<h1>Updating prices, please wait...</h1>";

$result = updatePrice($connection, $settings['rapidApiKey']);
?>
    <div class="row pt-3" >
        <?php foreach ($result as $symbol => $counts) { ?>
            <h3 class='mb-0'><?php echo $symbol ?></h3>
            <p>Downloaded: <?php echo $counts['downloaded'] ?>, inserted: <?php echo $counts['inserted'] ?>, existing: <?php echo $counts['existing'] ?></p>
        <?php } ?>
    </div>

<?php require __DIR__ . '/../../parts/footer.php'; ?>