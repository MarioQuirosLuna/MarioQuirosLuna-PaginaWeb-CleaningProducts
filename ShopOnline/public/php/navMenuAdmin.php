<header>
    <nav class="cont navbar navbar-expand-lg">
        <div class="col-12 text-center">
            <div class="row col-12">
                <div class="col-md-6 mt-2 mb-2 text-white">
                    <h1>Your Product Online</h1>
                </div>
                <div class="col-md-6 mt-2 mb-2 align-self-center">
                    <div class="row justify-content-around">
                        <div  class="col text-white">
                            <img src="./public/assets/icons/person-circle.svg" alt="user" width="32" height="32"><?php echo " ".$_SESSION['userName']; ?>
                        </div>
                        <div  class="col">
                            <button id="LogOutBtn" class="btn btn-danger" type="button">LogOut</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=AdminHome&action=showAdminHome">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=AdminHome&action=showAddAdmin">New Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=ProductAdmin&action=showAdminAddProduct">New Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=ProductAdmin&action=showAdminManageProduct">Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=CategoryAdmin&action=showAdminAddCategory">Manage Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=ProductAdmin&action=showAddPromotion">New Promotion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="ascendantAdminBtn">Ascending order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="descendantAdminBtn">Descending order</a>
                    </li>
                    <li class="nav-item">
                        <select class="form-select" name="listMonth" id="listMonth" aria-label="Select Month">
                                
                        </select>
                    </li>
                    <li class="nav-item">
                        <select class="form-select" name="listDay" id="listDay" aria-label="Select Day">
                                
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>