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
         <div id='calendar'></div>
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
                             agendamentos: SITEURL + "/calendario",
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
                             select: function (data_incio, data_fim, allDay) {
                                 var descricao = prompt('Titulo de Agendamentos:');
                                 if (descricao) {
                                     var data_incio = moment(data_incio, "DD-MM-YYYY").format("DD-MM-YYYY");
                                     var data_fim = moment(data_fim, "DD-MM-YYYY").format("DD-MM-YYYY");
                                     $.ajax({
                                         url: SITEURL + "/calendariorAjax",
                                         type: "POST",
                                         data: {
                                             descricao: descricao,
                                             data_incio: data_incio,
                                             data_fim: data_fim,
                                             type: 'add'
                                         },
                                         
                                         success: function (data) {
                                             displayMessage("Agendamento criado com sucesso");
           
                                             calendar.fullCalendar('renderagendamentos',
                                                 {
                                                     id: data.id,
                                                     descricao: descricao,
                                                     data_incio: data_incio,
                                                     data_fim: data_fim,
                                                     allDay: allDay
                                                 },true);
           
                                             calendar.fullCalendar('unselect');
                                         }
                                     });
                                 }
                             },
                             agendamentoDrop: function (agendamento, delta) {
                                 var data_incio = moment(data_incio, "DD-MM-YYYY").format("DD-MM-YYYY");
                                 var data_fim = moment(data_fim, "DD-MM-YYYY").format("DD-MM-YYYY");
           
                                 $.ajax({
                                     url: SITEURL + '/calendarioAjax',
                                     type: "POST",
                                     data: {
                                        descricao: descricao,
                                        data_incio: data_incio,
                                        data_fim: data_fim,
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
                                         url: SITEURL + '/calendarioAjax',
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