/**
 * Created by Daniel on 11/12/14.
 */
jQuery(function($) {
    $('#date_of_submission_dtp').datetimepicker({
        language: 'pt-BR',
        format: 'yyyy-mm-dd hh:ii',
        daysOfWeekDisabled:'0,6',
        minuteStep: 15
    });

});
