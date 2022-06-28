@extends('layouts.app')



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


   
</body>

</html>
