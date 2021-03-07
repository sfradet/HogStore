<div class="container">

    <!-- Product search bar -->

    <div class="row mb-4 bg-info rounded p-2 justify-content-sm-between justify-content-center"
         style="margin: 0px 1px;">
        <h5 class="text-white mt-2 d-none d-sm-block">PRODUCTS</h5>
        <form class="form-inline" action="../handlers/productHandler.php" method="post">
            <div class="input-group input-group-sm">

                <!-- Check if user searched for an item. If false, provide search bar -->

                <?php if (empty($_POST)) { ?>
                    <select class="custom-select custom-select-sm" name="select">
                        <option value="PROD_NAME" selected>Name</option>
                        <option value="PROD_DESCRIPTION">Description</option>
                    </select>
                    <input class="form-control" type="search" aria-label="Search" name="searchString">
                    <div class="input-group-append">
                        <input class="btn btn-secondary" type="submit" value="Search">
                    </div>

                    <!-- Check if user selected details on an item. If true return a button for products -->

                <?php } elseif (!empty($_POST['id'])) { ?>
                    <input class="btn btn-sm  btn-outline-light" type="submit" value="Return to Products">

                    <!-- Check return a button to clear search results-->

                <?php } else { ?>
                    <input class="btn btn-sm btn-outline-light" type="submit" value="Clear Search">
                <?php } ?>
            </div>
        </form>
    </div>
    <div class="row">

        <!-- Check if user selected to display details. If true display as card -->

        <?php if (!empty($_POST['id'])) { ?>
            <div class="col-lg-8 offset-lg-2">
                <div class="card mb-3">
                    <img class="card-img-top" src="../images/<?php echo $productArray[0]->getImageFileName() ?>"
                         alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $productArray[0]->getName() ?></h5>
                        <p class="card-text"><?php echo $productArray[0]->getDescription() ?></p>
                        <hr style="border: 1px solid;">
                        <p class="card-text d-flex space-between">
                            <span>Cost Per Unit: $<?php echo $productArray[0]->getCostAsString() ?></span>
                            <span class="ml-auto">Current Stock: <?php echo $productArray[0]->getCount() ?></span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- If user did not click details, check if array is empty. If true display no results message -->

        <?php } elseif ($productArray == null) { ?>
            <div class='col-12 text-center mb-3'>
                <h3 class='text-center'>No Results Found</h3>
            </div>

            <!-- If not displaying details and array has content, display all products as cards -->

        <?php } else {
            for ($x = 0; $x < count($productArray); $x++) { ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4 testcol">
                    <div class="card-deck h-100">
                        <div class="card h-100 border-dark">
                            <div class="card-header"><?php echo $productArray[$x]->getName() ?></div>
                            <div class="card-body text-dark">
                                <h5 class="card-title"><?php echo $productArray[$x]->getName() ?></h5>
                                <p class="card-text"><?php echo $productArray[$x]->getDescription() ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <form class="form-inline justify-content-center" action="../handlers/productHandler.php"
                                      method="post">
                                    <input type="hidden" name="id" value="<?php echo $productArray[$x]->getId() ?>">
                                    <input class="btn btn-sm btn-info" type="submit" value="Details">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>

    <!-- Pagination for going through pages of results -->

    <div class="row mb-3">
        <div class="col-4 offset-4 d-flex justify-content-center" id="pagination-container"></div>
    </div>
</div>


