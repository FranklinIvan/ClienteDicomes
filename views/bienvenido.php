<?php
require('../views/sections/superior.php');
?>

<link rel='stylesheet' type='text/css' href='fullcalendar.css' />
<script type='text/javascript' src='jquery.js'></script>
<script type='text/javascript' src='fullcalendar.js'></script>

<!-- Main Content -->
<div class="container text-gray-900">

  <h2>Calendario de Eventos</h2>
  <br>

  <?php if (isset($_GET['solicitudEnviada'])) { ?>
        <div class="alert alert-success alert-dismissible fade show">
            <h5>Tus datos han sido procesados correctamente</h5>
            <small>Ahora debes esperar la confirmación de tu evento por parte de DICOMES.</small>
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
            </button>
        </div>
    <?php } else if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <span>¡Ups, ha ocurrido un error!</span>
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
            </button>
        </div>
    <?php } ?>
    <!-- End Message -->

  <!-- Calendar -->

  <!-- Assets FullCalender -->
  <link href='../fullCalendar/lib/main.css' rel='stylesheet' />
  <script src='../fullCalendar/lib/main.js'></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        // Custom
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,dayGridWeek,dayGridDay'
        },

        dateClick: function(info) {
          $('#fecha').val(info.dateStr);
          $('#dayModal').modal();
          //console.log(info);
          calendar.addEvent({
            title: "Evento x",
            date: info.dateStr
          });

          /* alert('Date: ' + info.dateStr);
          alert('Resource ID: ' + info.resource.id); */
        },

        eventClick: function(info) {
          //console.log(info);
          console.log(info.event.title);
          console.log(info.event.start);

          console.log(info.event.end);
          console.log(info.event.backgroundColor);
          console.log(info.event.extendedProps.description);
        },

        events: [{
            title: 'Jornada extensa',
            start: '2020-11-07',
            end: '2020-11-10',
            color: '#eb164b',
            description: 'Descripción del evento 1 mi loco'
          },
          {
            title: 'Repetir evento',
            start: '2020-11-09T16:00:00',
            description: 'Descripción del evento 1 mi loco'
          },
          {
            title: 'Repetir evento',
            start: '2020-11-11T16:00:00',
            description: 'Descripción del evento 2 mi loco'
          },
          {
            title: 'Todo el día loco',
            start: '2020-11-30',
            color: '#16eb3a',
            description: 'Descripción del evento 3 mi loco'
          }
        ],

        initialView: 'dayGridMonth'
        // End of Custom
      });
      calendar.setOption('locale', 'es');
      calendar.render();

      $('#btnEnviar').click(function() {
        /* ObjEvento= */
        recolectarDatosGUI("POST");
        //EnviarInfo('',ObjEvento);
      });

      function recolectarDatosGUI(method) {

        nuevoEvento = {
          solicitante: $('#nombre').val(),
          fecha: $('#fecha').val(),
          ubicacion: $('#ubicacion').val(),
          hora_inicio: $('#horaInicio').val(),
          hora_final: $('#horaFinal').val(),
          tipo_servicio: $('#tipoServicio').val(),
          tipo_evento: $('#tipoEvento').val(),
          cantidad_personas: $('#cantidadPersonas').val(),
          titulo: $('#titulo').val(),
          descripcion: $('#descripcion').val(),

          '_method': method
        }
        console.log(nuevoEvento);
      }

      /* function EnviarInfo(accion,objEvento){
        $.ajax({
          type:"POST",
          url:"../admin/procesarServicio.php"+accion,
          data:objEvento,
          success:function(msg){console.log(msg);},
          error:function(){alert("Hay un error");}
        });
      } */

    });
  </script>

  <!-- Calendar -->
  <div id='calendar' style="font-family:Arial, Helvetica, sans-serif"></div>

  <!-- Day Modal -->
  <div class="modal fade" id="dayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agendar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="../admin/procesarServicio.php" method="post">

          <div class="modal-body">

            <div class="form-group">
              <label> <span class="font-weight-bold">De:</span> <input type="hidden" name="nombre" id="nombre" value="Fraklooon loco"> Fial </label>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Fecha del Evento:</label>
              <input type="date" class="form-control font-italic" name="fecha" id="fecha" readonly>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Ubicación:</label>
              <input type="text" class="form-control font-italic" name="ubicacion" id="ubicacion" placeholder="ubicación..." required>
            </div>
            <div class="form-group">
              <label> <span class="font-weight-bold">Hora Inicio:</span></label>
              <input type="time" class="form-control font-italic" name="horaInicio" id="horaInicio" placeholder="hora inicial..." required>
            </div>
            <div class="form-group">
              <label> <span class="font-weight-bold">Hora Final:</span></label>
              <input type="time" class="form-control font-italic" name="horaFinal" id="horaFinal" placeholder="hora final..." required>
            </div>
            <div class="form-group">
              <label> <span class="font-weight-bold">Tipo de Servicio:</span></label>
              <div class="input-group mb-3">
                <select name="tipoServicio" id="tipoServicio" class="custom-select">
                  <!-- <option selected>Escoger...</option> -->
                  <option value="graduacion" id="graduacion">Graduación</option>
                  <option value="congreso" id="congreso">Congreso</option>
                  <option value="seminario" id="seminario">Seminario</option>
                  <option value="presentacion" id="presentacion">Presentación</option>
                  <option value="evento" id="evento">Evento</option>
                  <option value="otro" id="evento">Otro</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label> <span class="font-weight-bold">Tipo de evento:</span></label>
              <div class="input-group mb-3">
                <select name="tipoEvento" id="tipoEvento" class="custom-select">
                  <option value="publico" id="publico">Público</option>
                  <option value="privado" id="privado">Privado</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label> <span class="font-weight-bold">Cantidad de personas:</span></label>
              <input type="number" min="1" class="form-control font-italic" name="cantidadPersonas" id="cantidadPersonas" placeholder="cantidad..." required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Título Evento:</label><br>
              <input type="text" class="form-control font-italic" name="titulo" id="titulo" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Descripción:</label><br>
              <textarea name="descripcion" id="descripcion" id="" cols="57" rows=5 required></textarea>
            </div>

          </div>

          <div class="modal-footer">
            <button class="btn text-white" name="btnEnviar" id="btnEnviar" style="background-color: #0f9bd0;">Enviar</button>
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
          </div>

        </form>

      </div>
    </div>
  </div>
  <!-- End Day Modal -->

  <!-- End Calendar -->

</div>

<!-- End of Main Content -->


<?php
require('../views/sections/inferior.php');
?>