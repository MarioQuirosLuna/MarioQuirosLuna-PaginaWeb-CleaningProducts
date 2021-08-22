<?php
    include_once 'public/php/header.php';
    include_once 'public/php/validationSessionOn.php';
    include_once 'public/php/validationAdminUser.php';
    include_once 'public/php/navMenuAdmin.php';
?>

    <div class="containerHeight">
        <div class="col-12 text-center text-white">
            <div class="cont container mt-5">
                <div class="p-3">
                    <h2>Dashboard</h2>
                </div>
                <div class="p-3">
                    <div class="row justify-content-around">
                        <div class="col-md-3">
                            <li class="list-group-item d-flex justify-content-around align-items-center rounded">
                                <div class="col-9">
                                    <h5>Users</h5>
                                </div>
                                <div class="col-3">
                                    <span id="cantUsersAccount" class="badge standardPurple rounded-pill">0</span>
                                </div>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <li class="list-group-item d-flex justify-content-around align-items-center rounded">
                                <div class="col-9">
                                    <h5>Sales</h5>
                                </div>
                                <div class="col-3">
                                    <span id="countCantPurchases" class="badge standardPurple rounded-pill">0</span>
                                </div>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <li class="list-group-item d-flex justify-content-around align-items-center rounded">
                                <div class="col-9">
                                    <h5>Profits</h5>
                                </div>
                                <div class="col-3">
                                    <span id="profitsSales" class="badge standardPurple rounded-pill">0</span>
                                </div>
                            </li>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="col">
                        <div class="m-3">
                            <h3>Sales Report</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody id="listHistoryPurchase" class="text-white">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once 'public/php/footer.php';
?>
<script src="public/js/loadHomeAdmin.js"></script>
<?php
    include_once 'public/php/endFooter.php';
?>