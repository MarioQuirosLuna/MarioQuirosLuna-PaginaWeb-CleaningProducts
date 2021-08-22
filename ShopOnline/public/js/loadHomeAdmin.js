$(function() {

    getHistoryPurchaseHistory();
    getCantUsersAdmin();
    getCountCantPurchases();
    getProfitsSales();
    getMonthsPurchases();
    getDaysPurchases();

    $('#ascendantAdminBtn').on('click', function(){
        getPurchaseHistoryAscendant();
        getCantUsersAdmin();
        getProfitsSales();
        getCountCantPurchases();
        getMonthsPurchases();
        getDaysPurchases();
    });

    $('#descendantAdminBtn').on('click', function(){
        getPurchaseHistoryDescendant();
        getCantUsersAdmin();
        getProfitsSales();
        getCountCantPurchases();
        getMonthsPurchases();
        getDaysPurchases();
    });

    $('#listMonth').on('change', function(){
        if($('#listMonth').val()>0 && $('#listMonth').val()<13){
            getPurchaseHistoryMonthDB($('#listMonth').val());
            getDaysPurchases();
        }
    });

    $('#listDay').on('change', function(){
        if($('#listDay').val()>0 && $('#listDay').val() < 32){
            getPurchaseHistoryDayDB($('#listDay').val());
            getMonthsPurchases();
        }
    });

    
});