<?php
/*
 * Hog Store Website Version 1
 * index.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This is the main page for the website.
 */

require_once "presentation/views/_header.php";
?>


<div class="container" style="max-width: 600px;">
    <?php
    if ($_SESSION['principal'] == true) : ?>
        <h3 class="text-center my-5">You are logged in as <?php echo $_SESSION["username"] ?></h3>
        <div class="text-center">
            <a href="presentation/handlers/productHandler.php" class="btn btn-info my-2" role="button"
               style="width: 200px;">Products</a>
        </div>
    <?php else : ?>
        <h3 class="text-center my-4">You are not yet logged in!</h3>
        <div class="text-center">
            <a href="presentation/views/_login.php" class="btn btn-info my-2" role="button"
               style="width: 200px;">Login</a>
        </div>
        <div class="text-center">
            <a href="presentation/views/_register.php" class="btn btn-info my-2" role="button" style="width: 200px;">Register</a>
        </div>
        <div class="text-center">
            <a href="presentation/handlers/productHandler.php" class="btn btn-info my-2" role="button"
               style="width: 200px;">Products</a>
        </div>
    <?php endif; ?>
</div>

<?php
require_once  "presentation/views/_footer.php";
?>
