<header>
    <nav class="headerColor navbar navbar-expand-lg">
        <div class="col-12 text-center">
            <div class="row col-12 m-0">
                <div class="col-md-3 align-self-center">
                    <div class="btn pt-1 ps-4 pe-4">
                        <a class="text-decoration-none text-white" href="?controller=Home&action=showHome"><h2>Your Product Online</h2></a>
                    </div>  
                </div>
                <div class="col-md-4 align-self-center">
                    <div class="pt-1 pb-1 ps-4 pe-4">
                        <form class="d-flex">
                            <input id="searchCategory" class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </div>
                <div class="col-md-5 align-self-center">
                    <div class="row pt-1 pb-1 ps-4 pe-4">
                        <div class="col">
                            <!-- TODO: Add cursor pointer -->
                            <div class="">
                                <div class="d-inline">
                                    <a href="?controller=CarShop&action=showShopCar"><img id="btnCart" src="./public/assets/icons/cart4.svg" alt="Car" width="32" height="32"></a>
                                    <span id="cantCartShop"class="badge standardPurple rounded-pill"></span>
                                </div>
                            </div>
                        </div>
                        <div  class="col text-white">
                            <img src="./public/assets/icons/person-circle.svg" alt="user" width="32" height="32"><div><?php echo " ".$_SESSION['userName']; ?></div>
                            <input type="hidden" id="valSession" value="<?php echo $_SESSION['userName']; ?>">
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
                        <a id="ascendantBtn" class="btn nav-link">Ascending price</a>
                    </li>
                    <li class="nav-item">
                        <a id="descendantBtn" class="btn nav-link">Descending price</a>
                    </li>
                    <li class="nav-item">
                        <a href="?controller=Home&action=showPurchaseHistory" class="btn nav-link">Show purchase history</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
