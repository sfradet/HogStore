<div class="container">
    <div class="table-responsive">
        <table class="table table-striped" id="table_id">
            <thead class="bg-info text-white">
            <tr>
                <th scope="col">Actions</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($userArray as $user) {
                echo "<tr>";
                ?>
                <td>
                    <div class="btn-group">
                        <form class="form-inline ml-1" action="../handlers/userHandler.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $user->getId() ?>">
                            <input type="hidden" name="route" value="view">
                            <button type="submit" class="btn btn-sm btn-secondary">
                                View
                            </button>
                        </form>
                        <form class="form-inline ml-1" action="../handlers/userHandler.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $user->getId() ?>">
                            <input type="hidden" name="route" value="edit">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </form>
                        <form class="form-inline ml-1" action="../handlers/userHandler.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $user->getId() ?>">
                            <input type="hidden" name="route" value="delete">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
                <?php
                echo "<td>" . $user->getFirstname() . "</td>";
                echo "<td>" . $user->getLastname() . "</td>";
                echo "<td>" . $user->getUsername() . "</td>";
                echo "<td>" . $user->getEmail() . "</td>";
                echo "</tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>
