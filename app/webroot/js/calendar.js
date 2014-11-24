/**
 * Created by daniel on 07/08/14.
 */
$(document).ready(function() {

    //At the end of the form inside the wizard modal
    $('#modal-wizard').wizard().on('finished', function(event) {

        var form_data = $('#EventIndexForm').serializeArray();
        console.log(form_data);
/*
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
            });*/

        $('#modal-wizard').modal('hide');

    });

    $('#modal-wizard .wizard-actions .btn-prev').attr('disabled', true);

});

jQuery(function($) {

    /* getting all events with get_all action from EventsController
     -----------------------------------------------------------------*/

    $.getJSON("/SisRuCake/events/get_all").then(function(data) {
        console.log(data);
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
            buttonIcons: false,

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
            eventRender: function(event, element) {
                element.css('border', 'transparent');
                //console.log(event.url);

                element.qtip({
                    content: event.details,
                    position: {
                        target: 'mouse',
                        adjust: {
                            x: 10,
                            y: -5
                        }
                    },
                    style: {
                        name: 'light',
                        tip: 'leftTop'
                    }
                });
            },
            eventDragStart: function(event) {
                $(this).qtip("destroy");
            },
            eventResizeStart: function(event) {
                $(this).qtip("destroy");
            },
            eventResize: function(event, delta, revertFunc) {

                var enddate = new Date(event.end);
                var endyear = enddate.getFullYear();
                var endday = enddate.getDate();
                var endmonth = enddate.getMonth()+1;
                var endhour = enddate.getHours();
                var endminute = enddate.getMinutes();

                var event_end = endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute;

                var data = {
                    id: event.id,
                    end: event_end
                };

                console.log(data);

                $.post('/SisRuCake/events/edit/'+event.id, data)
                    .done(function (){
                        bootbox.dialog({
                            message: "Seu evento foi salvo com sucesso.",
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
                        revertFunc();
                    });
            },
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventDrop: function(event) {
                var startdate = new Date(event.start);
                var startyear = startdate.getFullYear();
                var startday = startdate.getDate();
                var startmonth = startdate.getMonth()+1;
                var starthour = startdate.getHours();
                var startminute = startdate.getMinutes();
                var enddate = new Date(event.end);
                var endyear = enddate.getFullYear();
                var endday = enddate.getDate();
                var endmonth = enddate.getMonth()+1;
                var endhour = enddate.getHours();
                var endminute = enddate.getMinutes();
                if(event.allDay == true) {
                    var allday = 1;
                } else {
                    var allday = 0;
                }
                var event_start = startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute;
                var event_end = endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute;

                var data = {
                        id: event.id,
                        start: event_start,
                        end: event_end,
                        all_day: allday
                };
                console.log(data);

                $.post('/SisRuCake/events/edit/'+event.id, data)
                    .done(function (){
                        bootbox.dialog({
                            message: "Seu evento foi salvo com sucesso.",
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
            },
            eventClick: function(calEvent, jsEvent, view) {
                if(calEvent.allDay)
                    var allday = '<span class="label label-sm label-success" id="event_all_day">Sim</span>';
                else
                    allday = '<span class="label label-sm label-danger" id="event_all_day">Não</span>';

                if(calEvent.type == 'Refeição'){
                    var meal = '<div class="profile-info-row">\
                                    <div class="profile-info-name"> Refeição </div>\
                                    <div class="profile-info-value">\
                                         <a href="/SisRuCake/restaurants/view/3">'+calEvent.meal+'</a>\
                                    </div>\
                                </div>';
                }
                else
                    meal = '';

                var startdate = new Date(calEvent.start);
                var startyear = startdate.getFullYear();
                var startday = startdate.getDate();
                var startmonth = startdate.getMonth()+1;
                var starthour = startdate.getHours();
                var startminute = startdate.getMinutes();
                var enddate = new Date(calEvent.end);
                var endyear = enddate.getFullYear();
                var endday = enddate.getDate();
                var endmonth = enddate.getMonth()+1;
                var endhour = enddate.getHours();
                var endminute = enddate.getMinutes();



                console.log(calEvent.id);

                var event_start = "<span class='glyphicon glyphicon-calendar'></span> "+startyear+"-"+startmonth+"-"+startday+" <span class='glyphicon glyphicon-time'></span> "+starthour+":"+startminute;
                var event_end = "<span class='glyphicon glyphicon-calendar'></span> "+endyear+"-"+endmonth+"-"+endday+" <span class='glyphicon glyphicon-time'></span> "+endhour+":"+endminute;

                var message = '<div class="profile-user-info profile-user-info-striped">\
                                    <div class="profile-info-row">\
                                        <div class="profile-info-name"> Tipo </div>\
                                            <div class="profile-info-value">\
                                                <span class="editable" id="event_type">'+calEvent.type+'</span>\
                                            </div>\
                                        </div>\
                                        <div class="profile-info-row">\
                                            <div class="profile-info-name"> Título </div>\
                                            <div class="profile-info-value">\
                                                <span class="editable" id="event_title">'+calEvent.title+'</span>\
                                            </div>\
                                        </div>\
                                        <div class="profile-info-row">\
                                            <div class="profile-info-name"> Detalhes </div>\
                                            <div class="profile-info-value">\
                                                <span class="editable" id="product_unit_measure">'+calEvent.details+'</span>\
                                            </div>\
                                        </div>\
                                        <div class="profile-info-row">\
                                            <div class="profile-info-name"> Início </div>\
                                            <div class="profile-info-value">\
                                                <span id="product_code">'+event_start+'</span>\
                                            </div>\
                                        </div>\
                                        <div class="profile-info-row">\
                                            <div class="profile-info-name"> Fim </div>\
                                            <div class="profile-info-value">\
                                                <span class="editable" id="product_created">'+event_end+'</span>\
                                            </div>\
                                        </div>\
                                        <div class="profile-info-row">\
                                            <div class="profile-info-name"> Integral </div>\
                                            <div class="profile-info-value">'+allday+'</div>\
                                        </div>\
                                        <div class="profile-info-row">\
                                            <div class="profile-info-name"> Status </div>\
                                            <div class="profile-info-value">\
                                                 <span class="editable" id="event_status">'+calEvent.status+'</span>\
                                            </div>\
                                        </div>'+meal+'\
                                    </div>';

                bootbox.dialog({
                    title: 'O que faremos com este evento?',
                    message: message,
                    buttons: {
                        Deletar: {
                            className: "btn-danger btn-sm",
                            callback: function(){
                                bootbox.confirm("Tem certeza que gostaria de deletar este evento?", function(result) {
                                    if(result){
                                        $.get('/SisRuCake/events/delete/'+calEvent.id);
                                        $('#calendar').fullCalendar('removeEvents', calEvent.id);
                                    }
                                });
                                //
                            }
                        },
                        Cancelar: {
                            className: "btn-sm"
                        },
                        Visitar: {
                            className: "btn-info btn-sm",
                            callback: function() {
                                document.location.href = calEvent.url;
                            }
                        }
                    },
                    callback: function(result) {
                        //if(result) do something;
                    }
                });

                if(calEvent.url){
                    return false;
                }
/*
                modal.find('#EventId').val(calEvent.id);
                modal.find('#EventEventTypeId').prop("disabled", true);
                modal.find('#EventTitle').val(calEvent.title);
                modal.find('#EventDetails').val(calEvent.details);
                modal.find('#EventStart').prop("disabled", true);
                modal.find('#EventEnd').prop("disabled", true);
                modal.find('#EventMealId').prop("disabled", true);

                if(calEvent.allDay == 1)
                    modal.find('#EventAllDay').prop('checked', true);

                modal.modal('show');

                modal.find('button[data-action=delete]').on('click', function() {
                    calendar.fullCalendar('removeEvents' , function(ev){

                        return (ev._id == calEvent._id);
                    })
                    modal.modal("hide");
                });



                //console.log(calEvent);
                //console.log(jsEvent);
                //console.log(view);
*/
            },
            selectable: false,
            selectHelper: false,

        });
    };


})