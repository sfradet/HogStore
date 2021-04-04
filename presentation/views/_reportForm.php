<?php
require_once "_header.php";
?>

<div class="container border border-info rounded p-s5 my-5" style="max-width: 400px;">
    <h3 class="text-center my-5">Product Report</h3>
    <form action="../handlers/reportHandler.php" method="post">

        <div class="form-row my-3">
            <div class="col">
                <label for="date1">Start Date:</label>
            </div>
            <div class="col">
                <input type="date" id="date1" name="date1">
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="date2">End Date:</label>
            </div>
            <div class="col">
                <input type="date" id="date2" name="date2">
            </div>
        </div>
        <input type="submit" value="Create Report" class="btn btn-info btn-block btn-lg my-5">

    </form>
</div>


<?php
require_once  "_footer.php";
?>
