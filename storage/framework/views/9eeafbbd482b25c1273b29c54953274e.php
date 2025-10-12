<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda da Clínica</title>

  <!-- FullCalendar CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">

  <!-- FullCalendar JS (global) -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/dist/index.global.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fffafc;
      color: #c9184a;
      padding: 20px;
      text-align: center;
    }
    #calendar {
      max-width: 1000px;
      margin: 0 auto;
      background: white;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      padding: 10px;
    }
    h1 {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<h1>📅 Agenda da Clínica</h1>
<div id="calendar"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'pt-br',
        selectable: true,
        events: '/schedulings/fetch', // rota do Laravel que retorna JSON

        select: function(info) {
            const client = prompt('Nome do cliente:');
            const service = prompt('Serviço:');

            if(client && service) {
                axios.post('/schedulings', {
                    client_name: client,
                    service: service,
                    start: info.startStr,
                    end: info.endStr
                }, {
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    }
                })
                .then(() => {
                    alert('Agendamento criado!');
                    calendar.refetchEvents(); // recarrega os eventos
                })
                .catch(err => console.error(err));
            }
        }
    });

    calendar.render();
});
</script>

</body>
</html>
<?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/schedulings/index.blade.php ENDPATH**/ ?>