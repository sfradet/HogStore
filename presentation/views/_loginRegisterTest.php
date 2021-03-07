<?php
/*
 * Hog Store Website Version 1
 * _loginRegisterTest.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This page is a test page for a split login/register view.
 */
require_once "_header.php";
?>

<div class="container">
    <div class="row justify-content-around">
        <div class="col-5 border border-info rounded p-s5 my-5 align-self-center">
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
        <div class="col-5 border border-info rounded p-s5 my-5">
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
    </div>
</div>


<?php
require_once  "_footer.php";
?>
