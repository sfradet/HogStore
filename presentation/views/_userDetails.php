<div class="container" style="max-width: 400px;">
    <div class="my-5">
        <h2 class="text-center">User Details</h2>
    </div>
    <form action="../handlers/userHandler.php" method="post">
        <div class="form-row my-3">
            <div class="col">
                <label for="firstname" >First Name:</label>
                <h6><?PHP echo htmlspecialchars($user->getFirstname()); ?></h6>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="lastname" >Last Name:</label>
                <h6><?PHP echo htmlspecialchars($user->getLastname()); ?></h6>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="username">Username:</label>
                <h6><?PHP echo htmlspecialchars($user->getUsername()); ?></h6>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col">
                <label for="email">Email:</label>
                <h6><?PHP echo htmlspecialchars($user->getEmail()); ?></h6>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user->getId()); ?>">
        <input type="hidden" name="route" value="edit">
        <input type="submit" value="Edit" class="btn btn-info btn-block btn-lg mt-5">
    </form>
    <button class="btn btn-info btn-block btn-lg mt-3" onclick="location.href='userHandler.php'">User List</button>
</div>