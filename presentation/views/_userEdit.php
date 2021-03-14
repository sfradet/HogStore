<div class="container" style="max-width: 400px;">
    <div class="my-5">
        <h2 class="text-center">User Update</h2>
    </div>
    <form action="../handlers/userUpdateHandler.php" method="post">
        <div class="form-row my-3">
            <div class="col">
                <label for="firstname">First Name:</label>
                <input type="text" name="Firstname" value="<?PHP echo $firstname; ?>" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="lastname">Last Name:</label>
                <input type="text" name="Lastname" id="" value="<?PHP echo $lastname ?>" class="form-control" required>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="exampleFormControlSelect1">User Access</label>
                <select name="Role" class="form-control" id="UserAccess">
                    <option value="1">Customer</option>
                    <option value="2" <?php if($role == 2) echo "selected"; ?>>Administrator</option>
                </select>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <label for="username">Username:</label>
                <input type="text" name="Username" id="" value="<?PHP echo $username ?>" class="form-control" required>
                <span class="text-danger ml-2"><?PHP echo $_SESSION['error_msg_user']; ?></span>
            </div>
        </div>
        <div class="form-row mb-2">
            <div class="col">
                <label for="email">Email:</label>
                <input type="email" name="Email" id="" value="<?PHP echo $email ?>" class="form-control" required>
                <span class="text-danger ml-2"><?PHP echo $_SESSION['error_msg_email']; ?></span>
            </div>
        </div>
        <input type="hidden" name="route" value="update">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" value="Update" class="btn btn-info btn-block btn-lg my-3">
    </form>
    <button class="btn btn-info btn-block btn-lg mt-3" onclick="location.href='userHandler.php'">Cancel</button>
</div>
