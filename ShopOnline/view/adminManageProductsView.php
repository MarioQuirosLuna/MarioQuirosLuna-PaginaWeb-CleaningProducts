<?php
    include_once 'public/php/header.php';
    include_once 'public/php/validationSessionOn.php';
    include_once 'public/php/validationAdminUser.php';
    include_once 'public/php/navMenuAdmin.php';
?>

<div class="container-fluid containerHeight">
    <div class="row justify-content-around text-center mt-5">
        <div class="cont2 col-lg-10 align-self-center">
            <div class="cont1 container justify-content-center ">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Update</th>
                            </tr>
                        </thead>
                        <tbody class="cont text-white">                                    
                            <?php 
                                if(isset($vars['data'])){
                                    foreach($vars['data'] as $item){
                                        if(!$item[1]==""){
                            ?>
                                <tr>
                                    <td><?php echo $item[1]; ?></td>
                                    <td><?php echo $item[2]; ?></td>
                                    <td><?php echo $item[7]; ?></td>
                                    <td>
                                        <form action="?controller=ProductAdmin&action=deleteProduct" method="post">
                                            <input type="hidden" name="DELETE" value="DELETE">
                                            <?php echo '<input type="hidden" name="idProduct" value="'.$item[0].'">'; ?>
                                            <button class="btnPurple" type="submit"><img src='./public/assets/icons/trash-fill.svg' alt='trash' width='16' height='16'/></button>
                                        </form>
                                    </td>
                                    <td>
                                        <?php echo '<button class="showUpdateProductBtn btnPurple" idProducts="'.$item[0].'" type="button"><img src="./public/assets/icons/pen-fill.svg" alt="trash" width="16" height="16"/></button>'; ?>
                                    </td>
                                </tr>
                                <?php echo '<tr class="formUpdateProduct" idProduct="'.$item[0].'">'; ?>
                                    <form class="" action="?controller=ProductAdmin&action=updateProduct" method="post">
                                        <input type="hidden" name="PUT" value="PUT">
                                        <?php echo '<input style="width: 2em;" type="hidden" name="idProduct" value="'.$item[0].'">'; ?>
                                        <td><input style="width: 10em;" type="text" name="updateName" placeholder="Name"></td>
                                        <td><input style="width: 5em;" type="number" name="updatePrice" placeholder="Price"></td>
                                        <td><input style="width: 5em;" type="number" name="updateStock" placeholder="Stock"></td>
                                        <td></td>
                                        <td><button class="btnPurple" type="submit" class="btn btn-primary">Apply</button><td>
                                    </form>        
                                </tr>    
                            <?php 
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'public/php/footer.php';
?>
    <script src="public/js/functionsCRUDProduct.js"></script>
<?php
    include_once 'public/php/endFooter.php';
?>