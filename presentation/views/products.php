<div class="container">
    <div class="row mb-4 bg-info rounded p-2 justify-content-sm-between justify-content-center"
         style="margin: 0px 1px;">
        <h5 class="text-white mt-2 d-none d-sm-block">PRODUCTS</h5>
        <form class="form-inline" action="../handlers/productHandler.php" method="post">
            <div class="input-group input-group-sm">
                <?php if (empty($_POST)) { ?>
                    <select class="custom-select custom-select-sm" name="select">
                        <option value="PROD_NAME" selected>Name</option>
                        <option value="PROD_DESCRIPTION">Description</option>
                    </select>
                    <input class="form-control" type="search" aria-label="Search" name="searchString">
                    <div class="input-group-append">
                        <input class="btn btn-secondary" type="submit" value="Search">
                    </div>
                <?php } else { ?>
                    <input class="btn btn-sm btn-secondary" type="submit" value="Clear Search">
                <?php } ?>
            </div>
        </form>
    </div>
    <div class="row">
        <?php if ($productArray == null) { ?>
            <div class='col-12 text-center mb-3'>
                <h3 class='text-center'>No Results Found</h3>
            </div>
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
                                <a href="#" class="btn btn-sm btn-info">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
    <div class="row mb-3">
        <div class="col-4 offset-4 d-flex justify-content-center" id="pagination-container"></div>
    </div>
</div>


