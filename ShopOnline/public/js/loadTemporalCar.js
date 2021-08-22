$(function() {
    
    getTemporalCar();
    getDataTotalPricePurchase();
    getCantCartShop();
    getDiscountClient();

    $('#payNowBtn').on('click', function() {
        addPurchaseMade($('#valSession').val());
    });

});
