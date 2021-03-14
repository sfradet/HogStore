<div class="container">
    <div class="table-responsive">
        <table class="table table-striped" id="table_id">
            <thead class="bg-info text-white">
            <tr>
                <th scope="col">Actions</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Cost</th>
                <th scope="col">Inventory</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productArray as $product) {
                echo "<tr>";
                ?>
                <td>
                    <div class="btn-group">
                        <form class="form-inline ml-1" action="../handlers/productAdminHandler.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product->getId() ?>">
                            <input type="hidden" name="route" value="view">
                            <button type="submit" class="btn btn-sm btn-secondary">
                                View
                            </button>
                        </form>
                        <form class="form-inline ml-1" action="../handlers/productAdminHandler.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product->getId() ?>">
                            <input type="hidden" name="route" value="edit">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </form>
                        <form class="form-inline ml-1" action="../handlers/productAdminHandler.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product->getId() ?>">
                            <input type="hidden" name="route" value="delete">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
                <?php
                echo "<td>" . $product->getName() . "</td>";
                echo "<td>" . $product->getDescription() . "</td>";
                echo "<td>" . $product->getCost() . "</td>";
                echo "<td>" . $product->getCount() . "</td>";
                echo "</tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>