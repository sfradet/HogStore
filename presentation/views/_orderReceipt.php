<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="mb-3 text-left">Order #<?php echo $orderID ?></h3>
        </div>
        <div class="col-md-6">
            <h3 class="mb-3 text-md-right">Thank you for your order!</h3>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead class="bg-info text-white">
            <tr>
                <th >Item</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Total Cost</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($d_array as $details) {
                $product = $productService->getProductByID($details->getProductID());
                echo "<tr>";
                echo "<td>" . $product->getName() . "</td>";
                echo "<td class='text-right'>" . $details->getQuantity() . "</td>";
                echo "<td class='text-right'>$" . number_format($details->getCost() * $details->getQuantity(), 2, '.', ',') . "</td>";
            } ?>
            </tbody>
            <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tfoot>
        </table>
        <h5 class="text-right">Order Total: $<?php echo number_format($cartTotal, 2, '.', ',') ?></h5>
        <h5 class="text-right">Order Discount: -$<?php echo number_format($orderDiscount, 2, '.', ',') ?></h5>
        <h5 class="text-right">Payment Total: $<?php echo number_format($orderTotal, 2, '.', ',') ?></h5></h5>
    </div>
</div>
