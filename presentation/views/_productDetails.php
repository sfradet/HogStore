<div class="container" style="max-width: 400px;">
    <div class="my-5">
        <h2 class="text-center">Product Details</h2>
    </div>
    <form action="../handlers/productAdminHandler.php" method="post">
        <div class="form-row my-3">
            <div class="col">
                <label for="firstname">Name:</label>
                <h6><?PHP echo htmlspecialchars($product->getName()); ?></h6>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="lastname" >Description:</label>
                <h6><?PHP echo htmlspecialchars($product->getDescription()); ?></h6>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="username">Cost:</label>
                <h6><?PHP echo htmlspecialchars($product->getCost()); ?></h6>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="email">Count:</label>
                <h6><?PHP echo htmlspecialchars($product->getCount()); ?></h6>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="imageName">Image:</label>
                <h6><?PHP echo htmlspecialchars($product->getImageFileName()); ?></h6>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product->getId()); ?>">
        <input type="hidden" name="route" value="edit">
        <input type="submit" value="Edit" class="btn btn-info btn-block btn-lg my-2">
    </form>
    <button class="btn btn-info btn-block btn-lg my-1" onclick="location.href='productAdminHandler.php'">Product List</button>
</div>