<div class="container border border-info rounded p-s5 my-5" style="max-width: 400px;">
    <h3 class="text-center my-5">Payment Information</h3>
    <form action="../handlers/cartHandler.php" method="post">
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="NameCard">Name On Card:</label>
                    <input type="text" name="NameCard" id="NameCard" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="CCNumber">Credit Card Number</label>
                    <input type="text" name="CCNumber" id="CCNumber" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="CVV">CVV:</label>
                    <input type="text" name="CVV" id="CVV" class="form-control" required>
                </div>
            </div>
            <div class="col">
                <label for="Month">Exp Month:</label>
                <select class="form-control" name="Month" id="Month" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="col">
                <label for="Year">Exp Year:</label>
                <select class="form-control" name="Year" id="Year">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="route" value="pay">
        <input type="submit" value="Pay" class="btn btn-info btn-block btn-lg my-5">
    </form>
</div>
