<div class="container" style="max-width: 400px;">
    <div class="my-5">
        <h2 class="text-center">Update Product</h2>
    </div>
    <form action="../handlers/addProductHandler.php" method="post">
        <div class="form-row my-3">
            <div class="col">
                <label for="name">Name:</label>
                <input type="text" value="<?php echo htmlspecialchars($product->getName()); ?>" name="name" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="description">Description:</label>
                <input type="text" value="<?php echo htmlspecialchars($product->getDescription()); ?>"name="description" id="description" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="cost">Cost:</label>
                <input type="text" value="<?php echo htmlspecialchars($product->getCost()); ?>" name="cost" id="cost" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="count">Inventory:</label>
                <input type="text" value="<?php echo htmlspecialchars($product->getCount()); ?>" name="count" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="imageFile">Image File Name:</label>
                <input type="text" value="<?php echo htmlspecialchars($product->getImageFileName()); ?>" name="imageFileName" class="form-control" required>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product->getId()); ?>">
        <input type="hidden" name="route" value="edit">
        <input type="submit" value="Update" class="btn btn-info btn-block btn-lg mt-5">
    </form>
    <button class="btn btn-info btn-block btn-lg mt-3" onclick="location.href='productAdminHandler.php'">Cancel</button>
</div>
