<?php
    include_once 'public/php/header.php';
    include_once 'public/php/validationSessionOn.php';
    include_once 'public/php/validationAdminUser.php';
    include_once 'public/php/navMenuAdmin.php';
?>

    <div class="container-fluid containerHeight">
        <div class="row justify-content-around text-center mt-5">
            <div class="cont col-md-7">
                <div class="row m-3">
                    <h5>New Product</h5>
                </div>
                <form class="row justify-content-center" id="formProduct" name="formProduct" method="post" action="?controller=ProductAdmin&action=addProduct" enctype="multipart/form-data"/>
                    <div class="row m-3 justify-content-around">
                        <div class="col-xxl-3 pt-2 pb-1">
                            <input type="text" name="nameProduct" id="nameProduct" placeholder="NameProduct" required>
                        </div>
                        <div class="col-xxl-3 pt-2 pb-1">
                            <input type="number" name="priceProduct" id="priceProduct" placeholder="PriceProduct" required>
                        </div>
                        <div class="col-xxl-3 pt-2 pb-1">
                            <input type="number" name="stockProduct" id="stockProduct" placeholder="StockProduct" required>
                        </div>
                    </div>
                    <div class="row m-3">
                        <textarea name="descriptionProduct" id="descriptionProduct" class="form-control" placeholder="DescriptionProduct" required></textarea>
                    </div>    
                    <div class="row m-3">
                        <div class="col-lg-6 pt-2 pb-1">
                            <input type="file" name="imgProduct" id="imgProduct" class="form-control" required>
                        </div>
                        <div class="col-lg-6 pt-2 pb-1 align-self-center">
                            <select class="col-md-6" name="categoryProduct" id="categoryProduct">
                                <option value="none">Category</option>
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
                    </div>
                    <div class="col-md-8 m-3">
                        <button class="btn btnPurple" type="submit">Add Product</button>
                        <div id="informationAddProduct" class="text-center mt-5 mb-5"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

<?php
    include_once 'public/php/footer.php';
    include_once 'public/php/endFooter.php';
?>