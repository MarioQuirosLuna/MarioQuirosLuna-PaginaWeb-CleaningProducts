$(function() {
    var bool = true;
    $('#listCategories .category_item[category="All"]').addClass('active');
    $('#listCont').hide();

    $('.category_item').on('click', function(){
        var nameCategory = $(this).attr('category');

        $('.category_item').removeClass('active');
        $(this).addClass('active');

        $('.product_item').hide();

        if(nameCategory === 'All'){
            $('.product_item').fadeIn('slow').removeClass('hidden'); 
        }else{
            $('.product_item[category="'+nameCategory+'"]').fadeIn('slow').removeClass('hidden'); 
        }
    });

    $('#btnList').on('click', function(){
        if(bool){
            $('#listCont').fadeIn('slow').removeClass('hidden'); 
            bool = false;
        }else{
            $('#listCont').fadeOut('slow').addClass('hidden');
            bool = true;
        }
    });

});
