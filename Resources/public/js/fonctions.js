/**
 * Created by lsabatier on 20/04/15.
 */
$(document).ready(function() {

    var hostname = window.location.hostname;
    var protocol = (window.location.protocol != "https:") ? "http:" : "https:";
    var locationId = $('#locationId').val();

    $('#calendar').fullCalendar({
        // http://fullcalendar.io/docs/
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultView: 'month',
        eventLimit: true, // allow "more" link when too many events
        events: protocol + '//'  + hostname + '/agenda/list/events.json?locationId='+locationId,
        eventRender: function(event, element) {
            element.tooltip({
                "title": truncateString( event.description ),
                "html": true,
                "placement": 'auto'
            });
        }

    });

    $('#calendarMini').fullCalendar({
        header: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },
        height: 'auto',
        timeFormat: 'H:mm',
        handleWindowResize: true,
        eventLimit: true, // allow "more" link when too many events
        events: protocol + '//'  + hostname + '/agenda/list/events.json?locationId='+locationId,
        // add event name to title attribute on mouseover
        eventMouseover: function(event, jsEvent, view) {
            if (view.name !== 'agendaDay') {
                $(jsEvent.target).attr('title', event.title);
            }
        }
        /*eventClick: function(event) {
            if (event.url) {
                window.open(event.url);
                return false;
            }
        }*/
    });    

    function truncateString( myString ) {
        var length = 100;
        return myString.substring(0,length) + '...';
    }
});