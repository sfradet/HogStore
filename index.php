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
    <?php else : ?>
        <h3 class="text-center my-4">You are not yet logged in!</h3>
        <div class="text-center">
            <a href="presentation/views/login.php" class="btn btn-info my-2" role="button"
               style="width: 200px;">Login</a>
        </div>
        <div class="text-center">
            <a href="presentation/views/register.php" class="btn btn-info my-2" role="button" style="width: 200px;">Register</a>
        </div>
        <div class="text-center">
            <a href="presentation/views/loginRegisterTest.php" class="btn btn-info my-2" role="button"
               style="width: 200px;">Login/Register Dual Page</a>
        </div>
        <div class="text-center">
            <a href="presentation/handlers/productHandler.php" class="btn btn-info my-2" role="button"
               style="width: 200px;">Products</a>
        </div>
    <?php endif; ?>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>
