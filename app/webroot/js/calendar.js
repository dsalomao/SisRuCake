/**
 * Created by daniel on 07/08/14.
 */
$(document).ready(function() {

    //setting new wizard step if event_type == refeição
    $('#EventEventTypeId').on('change', function(event){

            var selected = $('#EventEventTypeId option:selected').val();

            if(selected == 0){
                console.log('isso ai');
                $('#EventMeals').prop( "disabled", false );
                $('#EventMeals').removeClass('hidden');
                $('#modal-step3 label').removeClass('hidden');
            }
            else{
                console.log('fudeu');
                $('#EventMealId').prop( "disabled", true );
                $('#EventMealId').addClass('hidden');
                $('#modal-step3 label').addClass('hidden');
            }
    });

    //loading the 2 datetimepickers
    $('#EventStart').datetimepicker({
        lang:'pt',
        format:'Y-m-d H:i:i',
        formatTime:'H:i:i'
    });

    $('#EventEnd').datetimepicker({
        lang:'pt',
        format:'Y-m-d H:i:i',
        formatTime:'H:i:i'
    });

    //At the end of the form inside the wizard modal
    $('#modal-wizard').wizard().on('finished', function(event) {

        var form_data = $('#EventIndexForm').serializeArray();
        //console.log(form_data);

        $.post('/SisRuCake/events/post_event', form_data)
            .done(function (data){
                var parsedData = jQuery.parseJSON(data);
                $('#calendar').fullCalendar( 'renderEvent', parsedData[0] , 'stick');

                bootbox.dialog({
                    message: "Seu novo evento foi salvo com sucesso.",
                    buttons: {
                        "success" : {
                            "label" : "OK",
                            "className" : "btn-sm btn-primary"
                        }
                    }
                });
            })
            .fail(function (){
                bootbox.dialog({
                    message: "Algo de errado ocorreu, por favor tente novamente.",
                    buttons: {
                        "success" : {
                            "label" : "OK",
                            "className" : "btn-sm btn-primary"
                        }
                    }
                });
            });

        $('#modal-wizard').modal('hide');

    });

    $('#modal-wizard .wizard-actions .btn-prev').attr('disabled', true);

});

jQuery(function($) {

    /* initialize the external events
     -----------------------------------------------------------------*/

    $('#external-events div.external-event').each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });

    /* getting all events with get_all action from EventsController
     -----------------------------------------------------------------*/

    $.getJSON("/SisRuCake/events/get_all").then(function(data) {
        initializeCalendar(data);
    });

    /* initialize the calendar
     -----------------------------------------------------------------*/

    var initializeCalendar = function(events) {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();


        var calendar = $('#calendar').fullCalendar({
            //isRTL: true,
            buttonText: {
                prev: '<i class="ace-icon fa fa-chevron-left"></i>',
                next: '<i class="ace-icon fa fa-chevron-right"></i>'
            },

            //options for pt-br
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'], dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'], dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'], buttonText: {   today: 'hoje',  month: 'mês',   week: 'semana', day: 'dia'  },  titleFormat: {  month: 'MMMM yyyy', week: "d [ yyyy]{ '&#8212;'[ MMM] d MMM yyyy}", day: 'dddd, d MMM, yyyy'    },  columnFormat: { month: 'ddd',   week: 'ddd d/M',    day: 'dddd d/M' },  allDayText: 'dia todo', axisFormat: 'H:mm', timeFormat: {   '': 'H(:mm)',   agenda: 'H:mm{ - H:mm}' },

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'agendaWeek',
            firstHour: 10,
            events: events,
            aspectRatio: 2,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                var $extraEventClass = $(this).attr('data-class');


                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            }
            ,
            selectable: false,
            selectHelper: false,
            eventClick: function(calEvent, jsEvent, view) {

                //display a modal for editing clicked event
                var modal =
                    '<div class="modal fade">\
                      <div class="modal-dialog">\
                       <div class="modal-content">\
                         <div class="modal-body">\
                           <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
                           <form action="/SisRuCake/events/edit/'+calEvent.id+'" id="EventEditForm" class="no-margin" method="post" accept-charset="utf-8">\
                               <fieldset style="padding: 16px">\
                                   <input type="hidden" name="data[Event][id]" value="'+calEvent.id+'" id="EventId" />\
                                      <div class="form-group">\
                                          <label class="col-sm-3 control-label no-padding-right" for="EventTitle">Título &nbsp;</label>\
                                          <input name="data[Event][title]" class="middle" maxlength="255" type="text" value="'+calEvent.title+'" id="EventTitle" required="required"><br>\
                                      </div>\
                                      <div class="form-group">\
                                          <label class="col-sm-3 control-label no-padding-right" for="EventDetails">Detalhes &nbsp;</label>\
                                          <textarea name="data[Event][details]" class="middle" cols="30" rows="6" id="EventDetails" value="'+calEvent.datails+'"></textarea><br>\
                                      </div>\
                                      <div class="form-group">\
                                          <label class="col-sm-3 control-label no-padding-right" for="EventAllDay">Integral &nbsp;</label>\
                                          <input class="middle" type="checkbox" name="data[Event][all_day]" id="EventAllDay"><br>\
                                      </div>\
                                      <div class="form-group">\
                                          <label class="col-sm-3 control-label no-padding-right" for="EventStatus">Status &nbsp;</label>\
                                          <select name="data[Event][status]" id="EventStatus">\
                                                <option value="agendado">Agendado</option>\
                                                <option value="confirmado">Confirmado</option>\
                                                <option value="em progresso">Em progresso</option>\
                                                <option value="reagendado">Reagendado</option>\
                                                <option value="completo">Completo</option>\
                                          </select>\
                                      </div>\
                               </fieldset>\
                               <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
                           </form>\
                         </div>\
				         <div class="modal-footer">\
                            <button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
                            <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				         </div>\
			           </div>\
			          </div>\
			        </div>';

                console.log(calEvent.allDay);
                var modal = $(modal).appendTo("body");
                modal.modal('show');
                modal.find('#EventId').val(calEvent.id);
                modal.find('#EventTitle').val(calEvent.title);
                modal.find('#EventDetails').val(calEvent.details);
                modal.find('#EventStart').val(calEvent.start);
                modal.find('#EventEnd').val(calEvent.end);
                if(calEvent.allDay == 1)
                    modal.find('#EventAllDay').prop('checked', true);
                modal.find('#EventStatus').val(calEvent.status);

                modal.find('form').on('submit', function(ev){
                    calEvent.title = $(this).find("#EventTitle").val();
                    calendar.fullCalendar('updateEvent', calEvent);
                    modal.modal("hide");
                });

                modal.find('button[data-action=delete]').on('click', function() {
                    calendar.fullCalendar('removeEvents' , function(ev){

                        return (ev._id == calEvent._id);
                    })
                    modal.modal("hide");
                });

                modal.modal('show').on('hidden', function(){
                    modal.remove();
                });


                console.log(calEvent);
                console.log(jsEvent);
                console.log(view);

                // change the border color just for fun
                $(this).css('border-color', 'transparent');

            }

        });
    };


})