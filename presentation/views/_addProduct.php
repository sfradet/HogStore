<div class="container" style="max-width: 400px;">
    <div class="my-5">
        <h2 class="text-center">Add New Product</h2>
    </div>
    <form action="../handlers/addProductHandler.php" method="post">
        <div class="form-row my-3">
            <div class="col">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="cost">Cost:</label>
                <input type="text" name="cost" id="cost" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="count">Inventory:</label>
                <input type="text" name="count" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="imageFile">Image File Name:</label>
                <input type="text" name="imageFileName" class="form-control" required>
            </div>
        </div>
        <input type="hidden" name="route" value="add">
        <input type="submit" value="Add" class="btn btn-info btn-block btn-lg mt-5">
    </form>
    <button class="btn btn-info btn-block btn-lg mt-3" onclick="location.href='productAdminHandler.php'">Cancel</button>
</div>