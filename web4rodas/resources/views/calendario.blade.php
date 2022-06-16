@extends('layouts.main')



@section('content')

<!DOCTYPE html>
<html>

<head>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body>
    
    {{-- @foreach($agendamentos as $agendamento)
    
    <div>{{$agendamento}}</div>
        
@endforeach --}}


    
    
    <div style="width: 80%; display: inline-block;" id='calendar'></div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>


let events = []
var data = {{ Js::from($agendamentos) }};
console.log(data)

data.forEach(element => {
    events.push({
      id:element.id,
      title: element.nome,
      start: element.data_inicio,
      end: (new Date(element.data_fim)).setHours(23,59) ,
   
    //   location: $location.val(),
    //   details: $details.val()
    });
});
        
        $(document).ready(function() {

            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                events: function(start, end, timezone, callback) {
			    let arr = events 
                callback(arr);
                    },
                    
                displayEventTime: false,
                eventColor: '#ED1C24',
                contentHeight: 700,
                
                
            });

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }


        </script>


   <!-- <script>



        var events = []
events=parselocalstorage('events')
var renderPopup = function (jsEvent, start, end, calEvent) {
  var $popup = $('#calendar-popup');
  var $eventForm = $('#event-form');
  $event = $('#event');
  var $selectedElmt = $(jsEvent.target);

  var relativeStartDay = start.calendar(null, { lastDay: '[yesterday]', sameDay: '[today]'});
  var endNextDay = '';

  if(relativeStartDay === 'yesterday') {
    endNextDay = '[Today at] ';
  }
  else if(relativeStartDay === 'today') {
    endNextDay = '[Tomorrow at] ';
  }
  else {
    endNextDay = 'dddd ';
  }

  /*$('.start-time').html(
    ' <p><i class="fa fa-play" aria-hidden="true"></i>' + (start.isSameOrBefore(moment()) ? 'Started' : 'Starts') + '</p>'
      + '<time datetime="' + start.format() + '">'
      + start.calendar(null, {
        lastWeek: 'L LT',
        nextWeek: 'dddd LT',
        sameElse: 'L LT'
      })
      + '</time>'
  );
  $('.end-time').html(
    '<p><i class="fa fa-stop" aria-hidden="true"></i> '
      + (end.isSameOrBefore(moment()) ? 'Ended' : 'Ends')
      + (end.isSame(start, 'day') ? ' at' : '')
      + '</p>'
      + '<time datetime="' + end.format() + '">'
      + end.calendar(start, {
        sameDay: 'LT',
        nextDay: endNextDay + 'LT',
        nextWeek: 'dddd LT',
        sameElse: 'L LT'
      })
      + '</time>'
  );*/

 
  

  var topPosition = (calEvent ? jsEvent.originalEvent.pageY : $selectedElmt.offset().top) - $popup.height() - 15;

  if((topPosition <= window.pageYOffset)
    && !((topPosition + $popup.height()) > window.innerHeight)) {
      $popup.css('top', jsEvent.originalEvent.pageY + 15);
      $prong.css('top', -($popup.height() + 12))
        .children('div:first-child').removeClass('bottom-prong-dk').addClass('top-prong-dk')
        .next().removeClass('bottom-prong-lt').addClass('top-prong-lt');
  }
  else {
    $popup.css('top', topPosition);
    $prong.css({'top': 0, 'bottom': 0})
      .children('div:first-child').removeClass('top-prong-dk').addClass('bottom-prong-dk')
      .next().removeClass('top-prong-lt').addClass('bottom-prong-lt');
  }

  $popup.show();
  $popup.find('input[type="text"]:first').focus();
}

$(document).ready(function() {
  $('#calendar').fullCalendar({
    header: {
    left: 'title',
      right: 'prev,next today'
    },
    timezone: 'local',
    defaultView: 'month',
    allDayDefault: false,
    allDaySlot: false,
    slotEventOverlap: true,
    slotDuration: "01:00:00",
    slotLabelInterval: "01:00:00",
    snapDuration: "00:15:00",
    contentHeight: 700,
    scrollTime :  "8:00:00",
    axisFormat: 'h:mm a',
    timeFormat: 'h:mm A()',
    selectable: true,
    events: function(start, end, timezone, callback) {
			let arr = parselocalstorage('events')  
      callback(arr);
    },
    eventColor: '#dec5c9',
    eventClick: function (calEvent, jsEvent) {
      
      renderPopup(jsEvent, calEvent.start, calEvent.end, calEvent);

      
    },
    eventRender: function(event, element) {
            element.append( `<span class='I_delete'><i class="fa fa-remove fa-2x"></i></span>` );
            element.append( `<span class='I_edit'><i class="fa fa-edit fa-2x"></i></span>` );
            element.find(".I_delete").click(function() {
            $('#calendar-popup').hide();
            if(confirm('are you sure want to delete event?')) {
             $('#calendar').fullCalendar('removeEvents',event._id);
            var index=events.map(function(x){ return x.id; }).indexOf(event.id);
            events.splice(index,1);
            localStorage.setItem('events', JSON.stringify(events));
           
            events=parselocalstorage('events')   

       }
            });
        element.find(".I_edit").click(function() {
            $('#calendar-popup').hide();

          $('#eventname').val(event.title)
          $('#location').val(event.location)
          $('#eventdetails').val(event.details)
          $('input#eventstart').val(event.start._i)
           $('input#eventend').val(event.end._i)
          $('#simplemodal').show();
         
          
          //update events
          var that=event;
           $('#edit-form').on('submit', function(e) {
           e.preventDefault();
           $form = $(e.currentTarget);

         $title = $form.find('input#eventname');
         $location = $form.find('input#location');
         $details = $form.find('textarea#eventdetails');
             $start= $form.find('input#eventstart');
             $end= $form.find('input#eventend');
            //update value
             that.title=$title.val();
              that.location=$location.val();
             that.details=$details.val();
                that.start=$start.val();               
               that.end=$end.val();
            
            $('#calendar').fullCalendar('updateEvent', that);
             console.log('after update',events)
              $('#simplemodal').hide();
              $('#calendar-popup').hide();
           });
           $('#calendar').fullCalendar('updateEvent', event);
         
         // 
           // 		localStorage.setItem('events', JSON.stringify(events));
            });
      
      $('#close-btnid').click(function(){
                  $('#simplemodal').hide();
      })
    
      var modal=document.getElementById('simplemodal')

     window.addEventListener('click',clickOutside)
      function clickOutside(e){
      if(e.target==modal){
        modal.style.display='none';

        }
        }
        }
    ,
    select: function(start, end, jsEvent) {
        $('.btn-primary').css('opacity',1)
          $('.btn-primary').click(function(){
        renderPopup(jsEvent, start.local(), end.local());
      }) 
      renderPopup(jsEvent, start.local(), end.local());
    
    }
  });

  $('#event-form').on('submit', function(e) {
    e.preventDefault();

    $form = $(e.currentTarget);

    $title = $form.find('input#event-title');
    $location = $form.find('input#event-location');
    $details = $form.find('textarea#event-details');
 $ID = '_' + Math.random().toString(36).substr(2, 9)
    events.push({
      id:$ID,
      title: $title.val(),
      start: $form.find('input#event-start').val(),
      end: $form.find('input#event-end').val(),
      location: $location.val(),
      details: $details.val()
    });

    $title.val('');
    $location.val('');
    $details.val('');

    $form.parent().blur().hide();
   localStorage.setItem('events', JSON.stringify(events));
    $('#calendar').fullCalendar('refetchEvents');

  });

  

  //Set hide action for ESC key event
  $('#calendar-popup').on('keydown', function(e) {
    $this = $(this);
    console.log($this);
    if($this.is(':visible') && e.which === 27) {
      $this.blur();
    }
  })
  //Set hide action for lost focus event
  .on('focusout', function(e) {
    $this = $(this);
    if($this.is(':visible') && !$(e.relatedTarget).is('#calendar-popup, #calendar-popup *')) {
      $this.hide();
    }
  });
});

/*** TESTING/DEMO ***/
var date = new Date();
var today = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();
today = today < 10 ? '0' + today.toString() : today;
var tomorrow = today + 1 < 10 ? '0' + (today + 1).toString() : today + 1; //today not last day
var yesterday = today - 1 < 10 ? '0' + (today - 1).toString() : today - 1; //today not first day
      localStorage.clear()

var str=	localStorage.getItem('events');
      var obj=JSON.parse(str)||[]
			let arr = Object.keys(obj).map((k) => obj[k])
      console.log('what is in aarrr1',events)
if(events.length===0){
  events.push(
  {id:1,title: 'event1', start: year + '-' + month + '-' + today + 'T07:00', end: year + '-' + month + '-' + today + 'T10:00', location: 'The Moon', details: 'There will be cheese'},
  {id:2,title: 'event2', start: year + '-' + month + '-' + tomorrow + 'T03:00', end: year + '-' + month + '-' + tomorrow + 'T08:00', location: 'The Moon', details: 'There will be cheese'},
  {id:3,title: 'event3', start: year + '-' + month + '-' + yesterday + 'T20:00', end: year + '-' + month + '-' + today + 'T05:00', location: 'The Moon', details: 'There will be cheese'}
);
}
/*events.push(
  {title: 'event1', start: year + '-' + month + '-' + today + 'T07:00', end: year + '-' + month + '-' + today + 'T10:00', location: 'The Moon', details: 'There will be cheese'},
  {title: 'event2', start: year + '-' + month + '-' + tomorrow + 'T03:00', end: year + '-' + month + '-' + tomorrow + 'T08:00', location: 'The Moon', details: 'There will be cheese'},
  {title: 'event3', start: year + '-' + month + '-' + yesterday + 'T20:00', end: year + '-' + month + '-' + today + 'T05:00', location: 'The Moon', details: 'There will be cheese'}
);*/

  		localStorage.setItem('events', JSON.stringify(events));

/***************/





//handle search

    var alreadyFilled = false;
    function initDialog() {
        clearDialog();
        for (var i = 0; i < events.length; i++) {
    var mS1 = {"01":'Jan', "02":'Feb', "03":'Mar', "04":'Apr', "05":'May', "06":'June', "07":'July', "08":'Aug', "09":'Sept', "10":'Oct', "11":'Nov', "12":'Dec'};

            $('.dialog').append('<div><span class="s_title">' + events[i].title +`</span><br><span class='s_des'>"` +events[i].details+
                                  
                                 `</span> <span class='duration'>`+events[i].start+`</span>`
                                    
                                + `</div>
   <ul class="vertical-date">
            <li class="list-daynumber">`+events[i].start.slice(8,10)+`</li>
            <li class="list-monthname">`+mS1[events[i].start.slice(5,7)]+`</li>
          </ul>

`);

        }
    }
    function clearDialog() {
        $('.dialog').empty();
    }
    $('.autocomplete input').click(function() {
        if (!alreadyFilled) {
            $('.dialog').addClass('open');
        }

    });
    $('body').on('click', '.dialog > div', function() {
        $('.autocomplete input').val($(this).find('.s_title').text()).focus();
        $('.autocomplete .close').addClass('visible');
        alreadyFilled = true;
    });
    $('.autocomplete .close').click(function() {
        alreadyFilled = false;
        $('.dialog').addClass('open');
        $('.autocomplete input').val('').focus();
        $(this).removeClass('visible');
    });

    function match(str) {
        str = str.toLowerCase();
        clearDialog();
        for (var i = 0; i < events.length; i++) {
            if ((events[i].title).toLowerCase().startsWith(str)) {
              
    var mS2 = {"01":'Jan', "02":'Feb', "03":'Mar', "04":'Apr', "05":'May', "06":'June', "07":'July', "08":'Aug', "09":'Sept', "10":'Oct', "11":'Nov', "12":'Dec'};

                $('.dialog').append('<div><span class="s_title">' + events[i].title+`</span><br><span class='s_des'>` +events[i].details
                                    +
                                 ` </span><span class='duration'>`+events[i].start+`</span>`
                                    +
                                    `</div>
   <ul class="vertical-date">
            <li class="list-daynumber">`+events[i].start.slice(8,10)+`</li>
            <li class="list-monthname">`+mS2[events[i].start.slice(5,7)]+`</li>
          </ul>
`);
        
            }
        }
    }
    $('.autocomplete input').on('input', function() {
        $('.dialog').addClass('open');
        alreadyFilled = false;
        match($(this).val());
    });
    $('body').click(function(e) {
        if (!$(e.target).is("input, .close")) {
            $('.dialog').removeClass('open');
        }
    });
    initDialog();


    function parselocalstorage(name){
      var str= localStorage.getItem(name);
      var obj=JSON.parse(str)||[]
      let arr = Object.keys(obj).map((k) => obj[k])||[]
      return arr
    }

    </script> -->
</body>

</html>
