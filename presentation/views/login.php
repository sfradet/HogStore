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

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>