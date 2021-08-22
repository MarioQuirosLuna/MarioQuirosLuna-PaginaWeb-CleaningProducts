<?php
    include_once 'public/php/header.php';
    include_once 'public/php/validationSessionOn.php';
    include_once 'public/php/validationAdminUser.php';
    include_once 'public/php/navMenuAdmin.php';
?>

    <div class="container-fluid containerHeight">
        <div class="row justify-content-around text-center mt-5">
            <div class="cont col-lg-3">
                <div class="container">
                    <div class="row pt-3 pb-3 text-white">
                        <h5>New Promotion</h5>
                    </div>
                    <div class="">
                        <form class="justify-content-center">
                            <div class="pt-3 pb-3">
                                <select class="form-select" name="namesProduct" id="namesProduct">
                                    <option selected>Select Product</option>
                                    <?php 
                                        foreach($vars['data'] as $item){
                                            if(!$item[1]==""){
                                    ?>
                                        <option value="<?php echo $item[1] ?>"><?php echo $item[1] ?></option>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="pt-3 pb-3">
                                <select class="form-select" name="cantDiscount" id="cantDiscount">
                                    <option selected>Select Discount</option>
                                    <option value="3">3%</option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                    <option value="15">15%</option>
                                    <option value="25">25%</option>
                                    <option value="40">40%</option>
                                    <option value="50">50%</option>
                                    <option value="75">75%</option>
                                </select>
                            </div>
                            <div class="pt-3 pb-3">
                                <input type="date" data-date="" data-date-format="YYYY MMMM DD" name="dateStart" id="dateStart" placeholder="Date Start" required>
                            </div>
                            <div class="pt-3 pb-3">
                                <input type="date" data-date="" data-date-format="YYYY MMMM DD" name="dateEnd" id="dateEnd" placeholder="Date End" required>
                            </div>
                            <div class="pt-3 pb-3">
                                <button id="addNewPromotion" type="button" class="btn btnPurple">Add Promotion</button>
                            </div>
                            <div id="informationPromotion" class="text-center mt-5 mb-5"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once 'public/php/footer.php';
?>
    <script src="public/js/moment/moment.js"></script>
    <script src="public/js/promotionsFunctions.js"></script>
<?php
    include_once 'public/php/endFooter.php';
?>