const url = 'http://127.0.0.1:8080/ShopOnline-MarioQuirosL-B76090-Semestre1-2021/';
const url_API = 'http://127.0.0.1:8080/API-Rest-MarioQuirosL-B76090-Semestre1-2021/API-REST.php';
const loading = "<div class='spinner-border' role='status'><span class='visually-hidden'>Loading...</span></div>";
const littleLoading = "<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>";

//MODULE CLIENT

function getCategories() {
    $.ajax(
        {
            url: '?controller=Home&action=loadCategories',
            type: 'GET',
            beforeSend: function () {
                $('#informationCategory').html(loading);
            },
            success: function (response) {
                $('#informationCategory').html('<img id="btnList" src="./public/assets/icons/list.png" alt="list" width="40" height="40">');
                $('#listCategories').html(response);
                $.getScript("public/js/filterCategory.js");
            },error: function (){
                console.log('error');
            }
        }
    );
}

function getProducts() {
    $.ajax(
        {
            url: '?controller=Home&action=loadProducts',
            type: 'GET',
            beforeSend: function () {
                $('#informationProducts').html(loading);
            },
            success: function (response) {
                $('#informationProducts').html("");
                $('#listProducts').html(response);
                $.getScript("public/js/itemProductEvents.js");
            },error: function (){
                console.log('error');
            }
        }
    );
}

function getProductsOrderPrice(_orderPrice) {
    var data = {"order":_orderPrice};
    $.ajax(
        {
            data: data,
            url: '?controller=Home&action=loadProductsOrderPrice',
            type: 'GET',
            beforeSend: function () {
                $('#informationProducts').html(loading);
            },
            success: function (response) {
                $('#informationProducts').html("");
                $('#listProducts').html(response);
                $.getScript("public/js/itemProductEvents.js");
            },error: function (){
                console.log('error');
            }
        }
    );
}

function getCantCartShop(){
    $.ajax(
        {
            url: '?controller=CarShop&action=getCantCartShop',
            type: 'GET',
            beforeSend: function () {
                $('#cantCartShop').html(littleLoading);
            },
            success: function (response) {
                $('#cantCartShop').text(response);
            }
        }
    );
}

function getCantUsersAdmin(){
    $.ajax(
        {
            url: '?controller=AdminHome&action=getCantUsersAdminDB',
            type: 'GET',
            beforeSend: function () {
                $('#cantUsersAccount').html(littleLoading);
            },
            success: function (response) {
                $('#cantUsersAccount').text(response);
            }
        }
    );
}

function getCountCantPurchases(){
    $.ajax(
        {
            url: '?controller=Purchase&action=getCountCantPurchases',
            type: 'GET',
            beforeSend: function () {
                $('#countCantPurchases').html(littleLoading);
            },
            success: function (response) {
                $('#countCantPurchases').text(response);
            }
        }
    );
}

function getProfitsSales(){
    $.ajax(
        {
            url: '?controller=Purchase&action=getProfitsSales',
            type: 'GET',
            beforeSend: function () {
                $('#profitsSales').html(littleLoading);
            },
            success: function (response) {
                $('#profitsSales').text(response);
            }
        }
    );
}

function getMonthsPurchases(){
    $.ajax(
        {
            url: '?controller=Purchase&action=getMonthsPurchases',
            type: 'GET',
            beforeSend: function () {
                $('#listMonth').html(littleLoading);
            },
            success: function (response) {
                $('#listMonth').html(response);
            }
        }
    );
}

function getDaysPurchases(){
    $.ajax(
        {
            url: '?controller=Purchase&action=getDaysPurchases',
            type: 'GET',
            beforeSend: function () {
                $('#listDay').html(littleLoading);
            },
            success: function (response) {
                $('#listDay').html(response);
            }
        }
    );
}

function getHistoryPurchaseClient(){
    $.ajax(
        {
            url: '?controller=Purchase&action=getHistoryClient',
            type: 'POST',
            beforeSend: function () {
                $('#listPurchaseHistory').html(loading);
            },
            success: function (response) {
                $('#listPurchaseHistory').html(response);
            }
        }
    );
}

function getHistoryPurchaseHistory(){
    $.ajax(
        {
            url: '?controller=Purchase&action=getHistory',
            type: 'GET',
            beforeSend: function () {
                $('#listHistoryPurchase').html(loading);
            },
            success: function (response) {
                $('#listHistoryPurchase').html(response);
            }
        }
    );
}

function getPurchaseHistoryDayDB(_day){
    var data = {"getPurchaseHistoryDay":_day};
    $.ajax(
        {
            data: data,
            url: '?controller=Purchase&action=getPurchaseHistoryDay',
            type: 'GET',
            beforeSend: function () {
                $('#listHistoryPurchase').html(loading);
            },
            success: function (response) {
                $('#listHistoryPurchase').html(response);
            }
        }
    );
}

function getPurchaseHistoryMonthDB(_month){
    var data = {"getPurchaseHistoryMonth":_month};
    $.ajax(
        {
            data: data,
            url: '?controller=Purchase&action=getPurchaseHistoryMonth',
            type: 'GET',
            beforeSend: function () {
                $('#listHistoryPurchase').html(loading);
            },
            success: function (response) {
                $('#listHistoryPurchase').html(response);
            }
        }
    );
}

function getPurchaseHistoryAscendant(){
    $.ajax(
        {
            url: '?controller=Purchase&action=getPurchaseAscendant',
            type: 'GET',
            beforeSend: function () {
                $('#listHistoryPurchase').html(loading);
            },
            success: function (response) {
                $('#listHistoryPurchase').html(response);
            }
        }
    );
}

function getPurchaseHistoryDescendant(){
    $.ajax(
        {
            url: '?controller=Purchase&action=getPurchaseDescendant',
            type: 'GET',
            beforeSend: function () {
                $('#listHistoryPurchase').html(loading);
            },
            success: function (response) {
                $('#listHistoryPurchase').html(response);
            }
        }
    );
}

function getCantProductStock(_name){
    var data = {"getCantStock":_name};
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'GET',
            beforeSend: function () {
                $('#informationProducts').html(loading);
            },
            success: function (response) {
                var obj = JSON.parse(response);
                if(!obj[0] == ""){
                    if(parseInt(obj[0].stock_product,10) > 0){
                        addItemCart($('#valSession').val(), _name);
                        $('#informationProducts').html('');
                    }else{
                        $('#informationProducts').html("<div class='btn btn-danger disabled'>Insufficient stocks</div>");
                    }
                }
            }
        }
    );
}

function addNewPromotion(_nameProduct, _cantDiscount, _dateStart, _dateEnd){
    var data = {"nameProduct":_nameProduct,"discount":_cantDiscount, "dateStart":_dateStart,"dateEnd":_dateEnd};
    console.log(data);
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'POST',
            beforeSend: function () {
                $('#informationPromotion').html(loading);
            },
            success: function (response) {
                $(location).attr("href",url+'?controller=ProductAdmin&action=showAddPromotion');
            }
        }
    );
}

function addItemCart(_nameClient, _nameProduct){
    var data = {"nameClient":_nameClient,"nameProduct":_nameProduct};
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'POST',
            beforeSend: function () {
                $('#informationProducts').html(loading);
            },
            success: function (response) {
                // $(location).attr('href',url+'?controller=Home&action=showHome');
                getCantCartShop();
            }
        }
    );
}

function addPurchaseMade(_nameClient){
    var data = {"addPurchaseMade":_nameClient};
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'POST',
            beforeSend: function () {
                $('#informationPurchase').html(loading);
            },
            success: function (response) {
                var obj = JSON.parse(response);

                if(obj[0].ERROR == "0"){
                    $('#informationPurchase').html("<div class='btn btn-danger disabled'>An error occurred, the transaction was not made</div>");
                }else{
                    $('#informationPurchase').html("");
                    $(location).attr('href',url+'?controller=CarShop&action=showShopCar');
                }
            },error: function (error){
                $('#informationPurchase').html("<div class='btn btn-danger disabled'>Error "+error+"</div>");
            }
        }
    );
}

function addItemFav(_nameClient,_nameProduct){
    var data = {"nameClientFav":_nameClient,"nameProductFav":_nameProduct};
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'POST',
            beforeSend: function () {
                $('#informationProducts').html(loading);
            },
            success: function (response) {
                getProducts();
            }
        }
    );
}

function getTemporalCar(){
    $.ajax(
        {
            url: '?controller=CarShop&action=loadTemporalCar',
            type: 'GET',
            beforeSend: function () {
                $('#informationTemporalCar').html(loading);
            },
            success: function (response) {
                $('#informationTemporalCar').html("");
                $('#listTemporalCar').html(response);
                $.getScript("public/js/deleteItemCartShop.js");
            },error: function (){
                console.log('error');
            }
        }
    );
}

//TODO: Change GET to DELETE
function deleteItemCartShop(_nameClient, _nameProduct){
    var data = {"nameClientDelete":_nameClient,"nameProductDelete":_nameProduct};
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'GET',
            beforeSend: function () {
                console.log("delete...");
            },
            success: function (response) {
                $(location).attr('href',url+'?controller=CarShop&action=showShopCar');
            },error: function (error){
                console.log('Error: '+error);
            }
        }
    );
}

function deleteItemFav(_nameClient, _nameProduct){
    var data = {"nameClientDeleteFav":_nameClient,"nameProductDeleteFav":_nameProduct};
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'GET',
            beforeSend: function () {
                $('#informationProducts').html(loading);
            },
            success: function (response) {
                getProducts();
            }
        }
    );
}

function getDataTotalPricePurchase(){
    $.ajax(
        {
            url: '?controller=CarShop&action=loadDataTotalPricePurchase',
            type: 'GET',
            beforeSend: function () {
                
            },
            success: function (response) {
                $('#totalDollar').val(response);
                $('#totalColon').val(Math.trunc((response*1)*($('#dollarSaleValue').val())));
            },error: function (){
                console.log('error');
            }
        }
    );
}

function getDiscountClient(){
    $.ajax(
        {
            url: '?controller=CarShop&action=getDiscountClient',
            type: 'GET',
            beforeSend: function () {
                
            },
            success: function (response) {
                if(response>0){
                    $('#discount').val(Math.trunc((response*1)*($('#dollarSaleValue').val())));
                }else{
                    $('#discount').val(response);
                }
            },error: function (){
                console.log('error');
            }
        }
    );
}

// MODULE USER

function getUser(_name, _password){
    var data = {"name": _name,"password": _password};
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'POST',
            beforeSend: function () {
                $('#information').html(loading);
            },
            success: function (response) {
                var obj = JSON.parse(response);
                
                if(!obj[0] == ""){
                    if(obj[0].user_name === _name && _name != "" && _password != ""){
                        if(obj[0].fk_id_privilege == 1){
                            startSessionAdmin(obj[0].user_name, obj[0].fk_id_privilege);
                        }else if(obj[0].fk_id_privilege == 2){
                            startSessionUser(obj[0].user_name, obj[0].fk_id_privilege);
                        }
                        $('#information').html('');
                    }
                }else{
                    $('#information').html("<div class='btn btn-danger disabled'>Incorrect username or password</div>");
                }
            }
        }
    );
}

function addUser(_name, _lastname, _password, _age, _gender, _address){
    var data = {"newName":_name,"lastname":_lastname,"privilege":2,"password":_password,"age":_age,"gender":_gender,"address":_address};
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'POST',
            beforeSend: function () {
                $('#informationSingUp').html(loading);
            },
            success: function (response) {
                $(location).attr('href',url);
            }
        }
    );
}

function addAdmin(_name, _password){
    var data = {"newName":_name,"password":_password,"privilege":1};
    $.ajax(
        {
            data: data,
            url: url_API,
            type: 'POST',
            beforeSend: function () {
                
            },
            success: function (response) {
                $(location).attr('href',url+'?controller=AdminHome&action=showAddAdmin');
            }
        }
    );
}