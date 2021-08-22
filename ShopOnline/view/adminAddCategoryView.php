<?php
    include_once 'public/php/header.php';
    include_once 'public/php/validationSessionOn.php';
    include_once 'public/php/validationAdminUser.php';
    include_once 'public/php/navMenuAdmin.php';
?>

    <div class="container-fluid containerHeight">
        <div class="row justify-content-around text-center">
            <div class="cont col-lg-3 mt-5">
                <div class="container">
                    <div class="row pt-3 pb-3 text-white">
                        <h5>New Category</h5>
                    </div>
                    <div class="">
                        <form class="justify-content-center" id="formCategory" name="formCategory" method="post" action="?controller=CategoryAdmin&action=addNewCategory">
                            <div class="pt-3 pb-3">
                                <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="CategoryName">
                                <div id="information"></div>
                            </div>
                            <div class="pt-3 pb-3">
                                <button type="submit" class="btn btnPurple">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cont2 col-lg-6 align-self-center mt-5">
                <div class="cont1 container justify-content-center ">
                    <div class="table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="cont text-white">                                    
                                    <?php 
                                        if(isset($vars['data'])){
                                            foreach($vars['data'] as $item){
                                                if(!$item[1]==""){
                                    ?>
                                        <tr>
                                            <td><?php echo $item[0]; ?></td>
                                            <td><?php echo $item[1]; ?></td>
                                            <td>
                                                <form action="?controller=CategoryAdmin&action=deleteCategory" method="post">
                                                    <input type="hidden" name="DELETE" value="DELETE">
                                                    <?php echo '<input type="hidden" name="idCategory" value="'.$item[0].'">'; ?>
                                                    <button class="btnPurple" type="submit"><img src='./public/assets/icons/trash-fill.svg' alt='trash' width='16' height='16'/></button>
                                                </form>
                                            </td>
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
    include_once 'public/php/endFooter.php';
?>