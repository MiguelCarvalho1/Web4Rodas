<!DOCTYPE html>
<html>
   <head>
      <title>Calendario</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
   </head>
   <body>
      <div class="container">
         <div class="jumbotron">
            <div class="container text-center">
               <h1>Calendario</h1>
            </div>
         </div>
         <div id='calendario'></div>
      </div>
      <script>
         $(document).ready(function () {
            
         var SITEURL = "{{ url('/') }}";
           
         $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
           
         var calendar = $('#calendar').fullCalendar({
                             editable: true,
                             agendamentos: SITEURL + "/inicial",
                             displayAgendamentosTime: false,
                             editable: true,
                             agendamentosRender: function (agendamentos, element, view) {
                                 if (agendamentos.allDay === 'true') {
                                         agendamentos.allDay = true;
                                 } else {
                                         agendamentos.allDay = false;
                                 }
                             },
                             selectable: true,
                             selectHelper: true,
                             select: function (dataincio, datafim, allDay) {
                                 var descricao = prompt('Titulo de Agendamentos:');
                                 if (descricao) {
                                     var dataincio = $.calendar.formatDate(dataincio, "DD-MM-YYYY");
                                     var datafim = $.calendar.formatDate(datafim, "DD-MM-YYYY");
                                     $.ajax({
                                         url: SITEURL + "/fullcalenderAjax",
                                         data: {
                                             descricao: title,
                                             dataincio: start,
                                             datafim: end,
                                             type: 'add'
                                         },
                                         type: "POST",
                                         success: function (data) {
                                             displayMessage("Agendamento criado com sucesso");
           
                                             calendar.fullCalendar('renderagendamentos',
                                                 {
                                                     id: data.id,
                                                     descricao: title,
                                                     dataincio: start,
                                                     datafim: end,
                                                     allDay: allDay
                                                 },true);
           
                                             calendar.fullCalendar('unselect');
                                         }
                                     });
                                 }
                             },
                             agendamentoDrop: function (agendamento, delta) {
                                 var dataincio = $.fullCalendar.formatDate(agendamentos.dataincio, "DD-MM-YYYY");
                                 var datafim = $.fullCalendar.formatDate(agendamentos.datafim, "DD-MM-YYYY");
           
                                 $.ajax({
                                     url: SITEURL + '/inicialAjax',
                                     data: {
                                        descricao: title,
                                        dataincio: start,
                                        datafim: end,
                                         id: agendamento.id,
                                         type: 'update'
                                     },
                                     type: "POST",
                                     success: function (response) {
                                         displayMessage("Agendamento alterado com Sucesso!");
                                     }
                                 });
                             },
                             agendamentosClick: function (agendamentos) {
                                 var deleteMsg = confirm("Tens certeza que queres apagar o Agendamento?");
                                 if (deleteMsg) {
                                     $.ajax({
                                         type: "POST",
                                         url: SITEURL + '/incialAjax',
                                         data: {
                                                 id: agendamentos.id,
                                                 type: 'delete'
                                         },
                                         success: function (response) {
                                             calendar.fullCalendar('removeagendamentos', agendametos.id);
                                             displayMessage("Agendamento apagado com Sucesso");
                                         }
                                     });
                                 }
                             }
          
                         });
          
         });
          
         function displayMessage(message) {
             toastr.success(message, 'Agendamento');
         } 
           
      </script>
   </body>
</html>