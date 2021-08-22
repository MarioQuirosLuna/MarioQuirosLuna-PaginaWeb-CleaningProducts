<?php
    include_once 'public/php/header.php';
    include_once 'public/php/validationSessionOn.php';
    include_once 'public/php/navMenu.php';
?>

    <div class="container containerHeight">
        <div class="cont row justify-content-around text-center mt-5">
            <div class="cont1 col-lg-8 themed-grid-col">
                <div class="table-responsive text-white">
                    <h3>Purchase History</h3>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Id</th> 
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody id="listPurchaseHistory" class="text-white">
                            
                        </tbody>
                    </table>
                </div>
                <div id="informationTemporalCar" class="text-center mt-5 mb-5"></div>
            </div>
        </div>
    </div>

<?php
    include_once 'public/php/footer.php';
?>
<script src="public/js/loadHistoryPurchaseClient.js"></script>
<?php
    include_once 'public/php/endFooter.php';
?>