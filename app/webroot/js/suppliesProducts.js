/**
 * Created by daniel on 07/07/14.
 */
jQuery(function($) {
    $('#date_of_entry_dtp').datetimepicker({
        language: 'pt-BR',
        format: 'yyyy-mm-dd',
        minView: 'month',
        startView: 'month',
        maxVIew: 'year',
        viewSelect: 'month',
        daysOfWeekDisabled:'0,6',
        minuteStep: 15
    });

    $('#expiration').datetimepicker({
        language: 'pt-BR',
        format: 'yyyy-mm-dd',
        minView: 'month',
        startView: 'month',
        maxVIew: 'year',
        viewSelect: 'month',
        minuteStep: 15
    });

    $('.chosen-select').chosen();

    $(window).on('resize.chosen', function() {
        //get its parent width
        var w = $('.chosen-select').parent().width();
        $('.chosen-select').siblings('.chosen-container').css({'width':w});
    }).triggerHandler('resize.chosen');


   $('#SuppliesProductInvoice').mask('000.000.000.000');
});




