/*
 * webroot/js/ready.js 
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

// JavaScript Document
$(document).ready(function() {

    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
		
		header: {
    		left:   'title',
    		center: '',
    		right:  'today agendaDay,agendaWeek,month prev,next'
		},
		defaultView: 'agendaWeek',
		firstHour: 8,
		weekMode: 'variable',
		aspectRatio: 2,
		editable: true,
		events: plgFcRoot + "/events/feed",
        //options para pt-br
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'], dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'], dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'], buttonText: {   prev: '&nbsp;&#9668;&nbsp;',    next: '&nbsp;&#9658;&nbsp;',    prevYear: '&nbsp;&lt;&lt;&nbsp;',   nextYear: '&nbsp;&gt;&gt;&nbsp;',   today: 'hoje',  month: 'mês',   week: 'semana', day: 'dia'  },  titleFormat: {  month: 'MMMM yyyy', week: "d [ yyyy]{ '&#8212;'[ MMM] d MMM yyyy}", day: 'dddd, d MMM, yyyy'    },  columnFormat: { month: 'ddd',   week: 'ddd d/M',    day: 'dddd d/M' },  allDayText: 'dia todo', axisFormat: 'H:mm', timeFormat: {   '': 'H(:mm)',   agenda: 'H:mm{ - H:mm}' },
		eventRender: function(event, element) {
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
			var url = plgFcRoot + "/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00&allday="+allday;
			$.post(url, function(data){});
		},
		eventResizeStart: function(event) {
			$(this).qtip("destroy");
		},
		eventResize: function(event) {
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
			var url = plgFcRoot + "/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00";
			$.post(url, function(data){});
		}
    })

});
