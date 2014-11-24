    /**
 * Created by Daniel on 13/11/14.
 */
    $(document).ready(function() {

        $('#start_dtp').datetimepicker({
            language: 'pt-BR',
            format: 'yyyy-mm-dd hh:ii',
            daysOfWeekDisabled:'0,6',
            minuteStep: 15
        });

        $('#end_dtp').datetimepicker({
            language: 'pt-BR',
            format: 'yyyy-mm-dd hh:ii',
            daysOfWeekDisabled:'0,6',
            minuteStep: 15
        });

        $('#EventEventTypeId').on('change', function(event){

            var selected = $('#EventEventTypeId option:selected').val();

            if(selected == 0){
                console.log('isso ai');
                $('#EventMealId').prop( "disabled", false );
                $("div[name='mealIdFormGroup']").removeClass('hidden');
            }
            else{
                console.log('fudeu');
                $('#EventMealId').prop( "disabled", true );
                $("div[name='mealIdFormGroup']").addClass('hidden');
            }
        });

    });
