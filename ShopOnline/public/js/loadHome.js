$(function() {

    getCategories();
    getProducts();
    getCantCartShop();
    
    $('#ascendantBtn').on('click', function() {
        getCategories();
        getProductsOrderPrice('ascendant');
        getCantCartShop();
    });

    $('#descendantBtn').on('click', function() {
        getCategories();
        getProductsOrderPrice('descendant');
        getCantCartShop();
    });
});