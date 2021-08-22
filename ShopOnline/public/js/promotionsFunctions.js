$(function() {
    $('#dateStart').on('change', function(){
        this.setAttribute("data-date", moment(this.value, "DD/MMMM/YYYY").format(this.getAttribute("data-date-format")));
    }).trigger("change");

    $('#dateEnd').on('change', function(){
        this.setAttribute("data-date", moment(this.value, "DD/MMMM/YYYY").format(this.getAttribute("data-date-format")));
    }).trigger("change");
    

    $('#addNewPromotion').on('click', function(){
        if($('#dateStart').val() != '' && $('#dateEnd').val() != '' && $('#namesProduct').val() != 'Select Product' && $('#cantDiscount').val() != 'Select Discount'){
            if($('#dateStart').val() < $('#dateEnd').val()){
                addNewPromotion(
                    $('#namesProduct').val(),
                    $('#cantDiscount').val(),
                    $('#dateStart').val(),
                    $('#dateEnd').val());
                $('#informationPromotion').html("");
            }else{
                $('#informationPromotion').html("<div class='btn btn-danger disabled'>Check the dates</div>");
            }
        }else{
            $('#informationPromotion').html("<div class='btn btn-danger disabled'>Check the form</div>");
        }
        
    });
});