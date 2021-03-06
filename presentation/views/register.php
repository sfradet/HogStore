<?php
/*
 * Hog Store Website Version 1
 * register.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This page provides a page for registering a new user.
 */
require_once "_header.php";
?>

<div class="container border border-info rounded p-s5 my-5" style="max-width: 400px;">
    <h3 class="text-center my-5">Register</h3>
    <form action="../handlers/registrationHandler.php" method="post">
        <div class="form-row my-3">
            <div class="col">
                <input type="text" name="Firstname" placeholder="First Name" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <input type="text" name="Lastname" id="" placeholder="Last Name" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <input type="text" name="Username" id="" placeholder="Username" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <input type="email" name="Email" id="" placeholder="Email" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <input type="password" name="Password" id="" placeholder="Password" class="form-control" required>
            </div>
        </div>
        <input type="submit" value="Register" class="btn btn-info btn-block btn-lg my-5">
    </form>
</div>


<?php
require_once  "_footer.php";
?>