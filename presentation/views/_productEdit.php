<div class="container" style="max-width: 400px;">
    <div class="my-5">
        <h2 class="text-center">Update Product</h2>
    </div>
    <form action="../handlers/productUpdateHandler.php" method="post">
        <div class="form-row my-3">
            <div class="col">
                <label for="firstname">Name:</label>
                <input type="text" name="name" value="<?PHP echo $name; ?>" class="form-control" required>

            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="description">Last Name:</label>
                <input type="text" name="description" id="description" value="<?PHP echo $lastname ?>" class="form-control" required>

            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="username">Username:</label>
                <input type="text" name="Username" id="" value="<?PHP echo $username ?>" class="form-control" required>
                <span class="text-danger ml-2"><?PHP echo $_SESSION['error_msg_user']; ?></span>

            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="email">Email:</label>
                <input type="email" name="Email" id="" value="<?PHP echo $email ?>" class="form-control" required>
                <span class="text-danger ml-2"><?PHP echo $_SESSION['error_msg_email']; ?></span>
            </div>
        </div>
        <input type="hidden" name="route" value="update">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" value="Update" class="btn btn-info btn-block btn-lg my-5">
    </form>
</div>
