<?php
    include_once 'public/php/header.php';
    include_once 'public/php/validationSessionOn.php';
    include_once 'public/php/navMenu.php';
?>
    <div class="container containerHeight">
        <div class="cont row justify-content-around text-center mt-5">
            <div class="col-lg-8 themed-grid-col">
                <div class="table-responsive text-white">
                    <h3>Shopping Cart Summary</h3>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="listTemporalCar">
                            
                        </tbody>
                    </table>
                </div>
                <div id="informationTemporalCar" class="text-center mt-5 mb-5"></div>
            </div>
            <div class="m-0 row col themed-grid-col text-white">
                    <form>
                        <div class="m-3">
                            <h2>Purchase</h2>
                        </div>
                        <div class="">
                            <label for="total">Dollar purchase value:</label>
                        </div>
                        <div class="input-group m-1 justify-content-center">
                            <span class="input-group-text">₡</span>
                            <input type="text" disabled name="dollarPurchaseValue" id="dollarPurchaseValue" placeholder="Dollar purchase value" value="<?php echo $_SESSION['PURCHASE']; ?>" required>
                        </div>
                        <div class="">
                            <label for="total">Dollar sale value:</label>
                        </div>
                        <div class="input-group m-1 justify-content-center">
                            <span class="input-group-text">₡</span>
                            <input type="text" disabled name="dollarSaleValue" id="dollarSaleValue" placeholder="Dollar sale value" value="<?php echo $_SESSION['SALE']; ?>" required>
                        </div>
                        <div class="">
                            <label for="total">Total Discount:</label>
                        </div>
                        <div class="input-group m-1 justify-content-center">
                            <span class="input-group-text">$</span>
                            <input type="text" disabled name="discount" id="discount" placeholder="Discount" required>
                        </div>
                        <div class="">
                            <label for="total">Total Price Dollar:</label>
                        </div>
                        <div class="input-group m-1 justify-content-center">
                            <span class="input-group-text">$</span>
                            <input class="" type="text" disabled name="totalDollar" id="totalDollar" placeholder="Total Dollars" required>
                        </div>
                        <div class="">
                            <label for="total">Total Price Colon:</label>
                        </div>
                        <div class="input-group m-1 justify-content-center">
                            <span class="input-group-text">₡</span>
                            <input class="" type="text" disabled name="totalColon" id="totalColon" placeholder="Total Colons" required>
                        </div>
                        <div class="">
                            <label for="total">Credit Cart:</label>
                        </div>
                        <div class="input-group m-1 justify-content-center">
                            <span class="input-group-text"><img src="./public/assets/icons/credit-card-fill.svg" alt="card" width="16" height="16" /></span>
                            <input type="text" name="creditCard" id="creditCard" placeholder="Enter Card Number" required>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col">
                                <span class="help-block small-font" >ExpiryMonth</span>
                                <input type="text" class="form-control" placeholder="MM" />
                            </div>
                            <div class="col">
                                <span class="help-block small-font" >ExpiryYear</span>
                                <input type="text" class="form-control" placeholder="YY" />
                            </div>
                            <div class="col">
                                <span class="help-block small-font" >CCV</span>
                                <input type="text" class="form-control" placeholder="CCV" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 pad-adjust">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked class="text-muted"> Save details for fast payments <a href="#"> learn how ?</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="m-3">
                            <button id="payNowBtn" class="btn btnPurple" type="button">Pay Now</button>
                        </div>
                        <div id="informationPurchase" class="text-center mt-5 mb-5"></div>
                    </form>
                </div>
        </div>
    </div>
<?php
    include_once 'public/php/footer.php';
?>
    <div id="forScripts"></div>
    <script src="public/js/loadTemporalCar.js"></script>

<?php
    include_once 'public/php/endFooter.php';
?>