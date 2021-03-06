<?php
/*
 * Hog Store Website Version 1
 * registrationFail.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This page returns registration failure messages.
 */
require_once "_header.php";
?>

<div class="container" style="max-width: 600px;">
    <h3 class="text-center my-5"><?php echo $_SESSION['error_msg'] ?></h3>
</div>

<?php
require_once  "_footer.php";
?>
