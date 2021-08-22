$(function() {

    $('.btnAddItemCart').on('click',function(e){
        var nameProduct = $(this).attr('nameItem');

        getCantProductStock(nameProduct);
    });

    $('.btnAddItemFav').on('click',function(e){
        var nameProduct = $(this).attr('nameItemFav');

        addItemFav($('#valSession').val(), nameProduct);
    });

    $('.btnDeleteItemFav').on('click',function(e){
        var nameProduct = $(this).attr('nameItemNotFav');

        deleteItemFav($('#valSession').val(), nameProduct);
    });


    $('#searchCategory').on('input',function() {
        var filterText = $('#searchCategory').val();
    
        $('.product_item').each(function()
        {
            const nameProduct = $(this).children().children().children().children()[0].innerText;
            const nameCategory = $(this).attr('category');
                
                
            if(((removeAccents(nameProduct.toUpperCase())).includes(removeAccents(filterText.toUpperCase()))) || ((removeAccents(nameCategory.toUpperCase())).includes(removeAccents(filterText.toUpperCase())))){
                $(this).fadeIn('slow').removeClass('hidden'); 
            }else{
                if(!(filterText).includes(' ')){
                    $(this).fadeOut('slow').addClass('hidden');
                }
            }
        });

        return false;
    });

    const removeAccents = (str) => {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    } 
});