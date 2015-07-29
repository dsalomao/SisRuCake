    /**
 * Created by Daniel on 13/11/14.
 */
    $(document).ready(function() {

        $('#EventStartWrapper').datetimepicker({
            language: 'pt-BR',
            format: 'yyyy-mm-dd hh:00:00',
            minView: 'day',
            startView: 'month',
            maxVIew: 'year',
            viewSelect: 'day',
            daysOfWeekDisabled:'0,6',
            minuteStep: 15
        });

        $('#EventEndWrapper').datetimepicker({
            language: 'pt-BR',
            format: 'yyyy-mm-dd hh:ii:00',
            minView: 'hour',
            startView: 'month',
            maxVIew: 'year',
            viewSelect: 'hour',
            daysOfWeekDisabled:'0,6',
            minuteStep: 15
        });

        $('#EventEventTypeId').on('change', function(event){

            var selected = $('#EventEventTypeId option:selected').text();
            if(selected == "Refeição"){
                console.log('refeição');
                $('#EventMealId').prop( "disabled", false );
                $('#EventStatus').prop( "disabled", false );
                $('#EventAllDay').prop( "disabled", false );
                $('#EventEndWrapper').prop("disabled", false);
                $('#EventEndWrapper').parent().removeClass("hidden");
                $("div[name='mealIdFormGroup']").removeClass('hidden');
            }
            else if (selected == "Lembrete"){
                console.log('lembrete');
                $('#EventMealId').prop( "disabled", true );
                $('#EventStatus').val('confirmado');
                $('#EventStatus').prop( "disabled", true );
                $('#EventAllDay').prop( "disabled", true );
                $('#EventEndWrapper').prop("disabled", true);
                $('#EventEndWrapper').parent().addClass("hidden");
                $("div[name='mealIdFormGroup']").addClass('hidden');
            }
        });

    });

