/**
 * Created by Daniel on 11/12/14.
 */
jQuery(function($) {
    $('#date_of_submission_dtp').datetimepicker({
        language: 'pt-BR',
        minView: 'month',
        startView: 'month',
        maxVIew: 'year',
        viewSelect: 'month',
        format: 'yyyy-mm-dd',
        daysOfWeekDisabled:'0,6'
    });

    $( document ).ready(function() {
        var e = document.getElementById("ProductOutputProductId");
        var measure_unit_id = e.options[e.selectedIndex].getAttribute("data-measure-unit-id");
        var tag_name = "tag_";
        var tag_name = tag_name + measure_unit_id;
        $('#'+tag_name).toggleClass('hidden');
    });

    //$('.chosen-select').chosen();

    $(window).on('resize.chosen', function() {
        //get its parent width
        var w = $('.chosen-select').parent().width();
        $('.chosen-select').siblings('.chosen-container').css({'width':w});
    }).triggerHandler('resize.chosen');

    $('#ProductOutputProductId').change(function() {
        $('.label-info').addClass('hidden');
        var e = document.getElementById("ProductOutputProductId");
        var measure_unit_id = e.options[e.selectedIndex].getAttribute("data-measure-unit-id");
        var tag_name = "tag_";
        var tag_name = tag_name + measure_unit_id;
        $('#'+tag_name).toggleClass('hidden');
    });
});
