$(function() {
    $('.deleteItemCarShop').on("click",function() {
        var nameItem= $(this).attr('nameItem');

        deleteItemCartShop($('#valSession').val(),nameItem);
    });
});