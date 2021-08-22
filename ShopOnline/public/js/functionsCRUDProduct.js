$(function(){

    var visible = false;

    $('.showUpdateProductBtn').on('click', function(){

        var idProduct = $(this).attr('idProducts');
        
        $('.formUpdateProduct').hide();

        if(visible){
            $('.formUpdateProduct[idProduct="'+idProduct+'"]').fadeOut('slow').addClass('hidden');
            visible = false;
        }else{
            $('.formUpdateProduct[idProduct="'+idProduct+'"]').fadeIn('slow').removeClass('hidden'); 
            visible = true;
        }
        
    });
    
});