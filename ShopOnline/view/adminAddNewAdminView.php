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
                        <h5>New Admin</h5>
                    </div>
                    <div class="">
                        <form class="justify-content-center">
                            <div class="pt-3 pb-3">
                                <input type="text" class="form-control" name="nameAdmin" id="nameAdmin" placeholder="NameAdmin">
                            </div>
                            <div class="pt-3 pb-3">
                                <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
                            </div>
                            <div class="pt-3 pb-3">
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat Password">
                            </div>
                            <div class="pt-3 pb-3">
                                <button id="addAdminBtn" type="button" class="btn btnPurple">Add Admin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cont col-lg-4 mt-5">
                <div class="table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">                                    
                                    <?php 
                                        if(isset($vars['data'])){
                                            foreach($vars['data'] as $item){
                                                if(!$item[1]=="" && $item[1] != $_SESSION['userName']){
                                    ?>
                                        <tr>
                                            <td><?php echo $item[0]; ?></td>
                                            <td><?php echo $item[1]; ?></td>
                                            <td>
                                                <form action="?controller=AdminHome&action=deleteAdmin" method="post">
                                                    <input type="hidden" name="DELETE" value="DELETE">
                                                    <?php echo '<input type="hidden" name="idAdmin" value="'.$item[0].'">'; ?>
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


<?php
    include_once 'public/php/footer.php';
    include_once 'public/php/endFooter.php';
?>