/**
 * Created by daniel on 22/07/14.
 */

jQuery(function($) {
    $( document ).ready(function() {
        var e = document.getElementById("ProductsForRecipeProductId");
        var measure_unit_id = e.options[e.selectedIndex].getAttribute("data-measure-unit-id");
        var tag_name = "tag_";
        var tag_name = tag_name + measure_unit_id;
        $('#'+tag_name).toggleClass('hidden');
    });

    $('#ProductsForRecipeQuantity').ace_spinner({
        value:0,
        min:0,
        max:100,
        step:0.1,

        hold: true,
        numberFormat: "n" ,
        btn_up_class:'btn-info' ,
        btn_down_class:'btn-info',
    })
        .on('change', function(){
            //alert(this.value)
        });
    $( ".selector" ).spinner( "option", "numberFormat", "n" );

    $('.chosen-select').chosen();

    $(window).on('resize.chosen', function() {
        //get its parent width
        var w = $('.chosen-select').parent().width();
        $('.chosen-select').siblings('.chosen-container').css({'width':w});
    }).triggerHandler('resize.chosen');

    $('#ProductsForRecipeProductId').change(function() {
        $('.label-info').addClass('hidden');
        var e = document.getElementById("ProductsForRecipeProductId");
        var measure_unit_id = e.options[e.selectedIndex].getAttribute("data-measure-unit-id");
        var tag_name = "tag_";
        var tag_name = tag_name + measure_unit_id;
        $('#'+tag_name).toggleClass('hidden');
    });
});