/**
 * Created by Daniel on 17/11/14.
 */
$(document).ready(function() {
    $('#data_dtp').datetimepicker({
        language: 'pt-BR',
        format: 'yyyy-mm-dd hh:ii',
        daysOfWeekDisabled:'0,6',
        minuteStep: 15
    });
});