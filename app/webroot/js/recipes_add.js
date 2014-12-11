/**
 * Created by daniel on 15/08/14.
 */
jQuery(function($) {

    $('#RecipeIncome').ace_spinner({
        value:0,
        min:0,
        max:350,
        step:5,

        btn_up_class:'btn-info' ,
        btn_down_class:'btn-info'
    })
        .on('change', function(){
            //alert(this.value)
        });

    $('.chosen-select').chosen();

    $(window).on('resize.chosen', function() {
        //get its parent width
        var w = $('.chosen-select').parent().width();
        $('.chosen-select').siblings('.chosen-container').css({'width':w});
    }).triggerHandler('resize.chosen');

});