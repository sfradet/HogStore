<div class="container">
    <h3 class="mb-3">Your Cart</h3>
    <div class="row">
        <div class="col-12 col-lg-9 col-md-8">
            <div class="row">

                <?php foreach ($cart->getItems() as $productID => $qty) {
                    $product = $productService->getProductByID($productID);
                    ?>

                    <div class="col-12 border-bottom border-dark">
                        <div class="row">
                            <div class="col-12 col-lg-4 col-md-5 col-sm-6 my-3">
                                <img src="../images/<?php echo $product->getImageFileName(); ?>" class="img-thumbnail"
                                     alt="...">
                            </div>
                            <div class="col-12 col-lg-8 col-md-7 col-sm-6 my-2">
                                <div class="row justify-content-between" style="height: 100%;">
                                    <div class="col-lg-3 m-auto">
                                        <h5><?php echo $product->getName(); ?></h5>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row" style="height: 100%;">
                                            <div class="col-6 col-lg-12 m-auto">
                                                <form action="../handlers/cartHandler.php"
                                                method="post">
                                                    <h5>Qty:
                                                        <span>
                                                            <select class="form-select" name="select">
                                                                <?php for ($x = 0; $x < $product->getCount(); $x++) {
                                                                    if ($x == $qty) {
                                                                        echo "<option selected value='". $x ."'>" . $x . "</option>";
                                                                    } else {
                                                                        echo "<option value='". $x ."'>" . $x . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </span>
                                                        <span>
                                                            <input type="hidden" name="id"
                                                                   value="<?php echo $product->getId(); ?>">
                                                    <input type="hidden" name="route" value="update">
                                                    <button type="submit" class="btn text-muted btn-link px-0">Update
                                                    </button>
                                                        </span>
                                                    </h5>
                                                </form>
                                            </div>
                                            <div class="col-6 col-lg-12 m-auto">
                                                <form class="form-inline" action="../handlers/cartHandler.php"
                                                      method="post">
                                                    <input type="hidden" name="id"
                                                           value="<?php echo $product->getId(); ?>">
                                                    <input type="hidden" name="route" value="remove">
                                                    <button type="submit" class="btn text-muted btn-link px-0">Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row" style="height: 100%;">
                                            <div class="col-6 col-lg-12 m-auto">
                                                <h5 class="">$<?php echo $product->getCostAsString(); ?> Each</h5>
                                            </div>
                                            <div class="col-6 col-lg-12 m-auto">
                                                <h5 class="">
                                                    $<?php echo number_format($product->getCost() * $qty, 2, '.', ',') ?>
                                                    Total</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-4">
            <form action="../handlers/cartHandler.php" method="post">
                <h3 class="text-center my-5">Shopping Cart</h3>
                <h5 class="text-muted mx-3 mx-sm-0"><span>Total Items:<span
                                style="float: right;"><?php echo $cart->cartTotalItems(); ?></span></h5>
                <h5 class="text-secondary mx-3 mx-sm-0"><span>Total Cost:<span
                                style="float: right;">$<?php echo number_format($cart->getTotalPrice(), 2, '.', ','); ?></span>
                </h5>
                <input type="hidden" name="route" value="pay">
                <input type="submit" value="Pay Now" class="btn btn-info btn-block btn-lg my-5">
            </form>
        </div>
    </div>
</div>