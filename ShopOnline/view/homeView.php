<?php
    include_once 'public/php/header.php';
    include_once 'public/php/validationSessionOn.php';
    include_once 'public/php/navMenu.php';
?>
    
    <div class="containerHeight">
        <article id="listCont" class="cont pt-3 pb-3 col-lg-2 themed-grid-col fixed-bottom">
            <ul id="listCategories" class="list-group">
                <!-- TODO: Load with Ajax -->
            </ul>
        </article>
        <div id="contentHome" class="col-12">
            <div class="container-fluid mt-4">
                <div class="row justify-content-around">
                    <div class="cont2 pt-3 pb-3 col-lg-10 themed-grid-col">
                        <div id="informationProducts" class="text-center"></div>
                        <div id="listProducts" class="cont row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4 listProducts">
                            <!-- TODO: Load with Ajax -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menuCategoriesBtn" class="fixed-bottom ms-3 mb-3 text-center" style="width: 6em;">
            <div class="col-12">
                <a id="informationCategory" class="btn text-center"></a>
            </div>
           <div class="col-12">
               <span>Categories</span>
           </div>
        </div>
    </div>
    
<?php
    include_once 'public/php/footer.php';
?>
    <div id="forScripts"></div>
    <script src="public/js/loadHome.js"></script>
<?php
    include_once 'public/php/endFooter.php';
?>
