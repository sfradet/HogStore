<?php
/*
 * Hog Store Website Version 1
 * login.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This page is for logging into the website
 */
require_once "_header.php";
?>

<div class="container border border-info rounded p-s5 my-5" style="max-width: 400px;">
    <h3 class="text-center my-5">Login</h3>
    <form action="../handlers/loginHandler.php" method="post">
        <div class="form-row my-3">
            <div class="col">
                <input type="text" name="Username" id="" placeholder="Username" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <input type="password" name="Password" id="" placeholder="Password" class="form-control" required>
            </div>
        </div>
        <input type="submit" value="Login" class="btn btn-info btn-block btn-lg my-5">
    </form>
</div>

<?php
require_once  "_footer.php";
?>
