<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-left">Product Report</h3>
        </div>
        <div class="col-md-6 align-self-center">
            <h5 class="text-md-right">Dates: <?php echo '"' . $date1 . '" - "' . $date2 . '"' ?></h5>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead class="bg-info text-white">
            <tr>
                <th>Item</th>
                <th class="text-right">Product ID</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Order Date</th>
                <th class="text-right">Order ID</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order_array as $details) {
                $product = $productService->getProductByID($details->getProductID());
                echo "<tr>";
                echo "<td>" . $product->getName() . "</td>";
                echo "<td class='text-right'>" . $details->getProductID() . "</td>";
                echo "<td class='text-right'>" . $details->getQuantity() . "</td>";
                echo "<td class='text-right'>" . date('Y-m-d', strtotime($details->getDateTime())) . "</td>";
                echo "<td class='text-right'>" . $details->getOrderID() . "</td>";
                echo "</tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>