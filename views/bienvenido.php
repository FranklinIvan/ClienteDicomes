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
          right: 'dayGridMonth,dayGridWeek,dayGridDay ayuda'
        },
        customButtons: {
          ayuda: {
            text: "help",
            click: function() {
              $('#QAyuda').modal();
            }
          }
        },

        dateClick: function(info) {
          $('#fecha').val(info.dateStr);
          $('#dayModal').modal();
          //console.log(info);
          /* calendar.addEvent({
            title: "Evento x",
            date: info.dateStr
          }); */
        },

        // Mostrar datos al seleccionar evento
        eventClick: function(info) {
          day = (info.event.start.getDate());
          month = (info.event.start.getMonth() + 1);
          year = (info.event.start.getFullYear());

          $('#tituloEvento').html(info.event.title);
          $('#fechaEvento').html(month + "/" + day + "/" + year);
          $('#ubicacionEvento').html(info.event.extendedProps.ubicacion);
          $('#horaIniEvento').html(info.event.extendedProps.hora_inicio);
          $('#horaFinEvento').html(info.event.extendedProps.hora_final);
          $('#tipoServEvento').html(info.event.extendedProps.tipo_servicio);
          $('#tipoEvenEvento').html(info.event.extendedProps.tipo_evento);
          $('#cantidadPerEvento').html(info.event.extendedProps.cantidad_personas);
          $('#tituloEventoDes').html(info.event.title);
          $('#descripcionEvento').html(info.event.extendedProps.description);
          $('#eventsModal').modal();
        },

        // Listar eventos desde la BD
        events: '../admin/calendar/eventos.php',
        eventColor: '#eb164b'

        //initialView: 'dayGridMonth'
        // End of Custom
      });
      calendar.setOption('locale', 'es');
      calendar.render();

      /* $('#btnEnviar').click(function() {
        //ObjEvento=
        recolectarDatosGUI("POST");
        //EnviarInfo('',ObjEvento);
      }); */

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
        <div class="modal-header" style="background-color: #68086c;">
          <h5 class="modal-title text-white" id="dayModal">Agendar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="../admin/calendar/procesarServicio.php" method="post">

          <div class="modal-body">

            <div class="form-group">
              <label> <span class="font-weight-bold">De:</span>Franklin Iván</label>
              <input type="hidden" name="nombre" id="nombre" value="Fraklooon loco">
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
              <div class="row">
                <div class="col-md-6">
                  <label class="font-weight-bold">Hora Inicio:</label>
                  <input type="time" class="form-control font-italic" name="horaInicio" id="horaInicio" placeholder="hora inicial..." required>
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold">Hora Final:</label>
                  <input type="time" class="form-control font-italic" name="horaFinal" id="horaFinal" placeholder="hora final..." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label class="font-weight-bold">Tipo de Servicio:</label>
                  <div class="input-group mb-3">
                    <select name="tipoServicio" id="tipoServicio" class="custom-select">
                      <option value="graduacion" id="graduacion">Graduación</option>
                      <option value="congreso" id="congreso">Congreso</option>
                      <option value="seminario" id="seminario">Seminario</option>
                      <option value="presentacion" id="presentacion">Presentación</option>
                      <option value="evento" id="evento">Evento</option>
                      <option value="otro" id="evento">Otro</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold">Tipo de evento:</label>
                  <div class="input-group mb-3">
                    <select name="tipoEvento" id="tipoEvento" class="custom-select">
                      <option value="publico" id="publico">Público</option>
                      <option value="privado" id="privado">Privado</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Cantidad de personas:</label>
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

  <!-- Events Modal -->
  <div class="modal fade" id="eventsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #68086c;">
          <h5 class="modal-title text-white" id="tituloEvento"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label> <span class="font-weight-bold">De:</span> Franklin Iván</label>
            <input type="hidden" name="nombre" id="nombre" value="Fraklooon loco">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Fecha del Evento:</label>
            <label class="form-control font-italic" id="fechaEvento">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ubicación:</label>
            <label class="form-control font-italic" id="ubicacionEvento">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="font-weight-bold">Hora Inicio:</label>
                <label class="form-control font-italic" id="horaIniEvento">
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Hora Final:</label>
                <label class="form-control font-italic" id="horaFinEvento">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="font-weight-bold">Tipo de Servicio:</label>
                <label class="form-control font-italic" id="tipoServEvento">
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Tipo de evento:</label>
                <label class="form-control font-italic" id="tipoEvenEvento">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label> <span class="font-weight-bold">Cantidad de personas:</span></label>
            <label class="form-control font-italic" id="cantidadPerEvento">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Título Evento:</label><br>
            <label class="form-control font-italic" id="tituloEventoDes">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Descripción:</label><br>
            <textarea class="form-control font-italic" readonly id="descripcionEvento" cols="57" rows=5></textarea>
          </div>
          <!-- <div class="form-group text-center" style="color:#eb164b;">
            <hr>
            <i class="fas fa-exclamation fa-fw"></i>
            <label>Este evento aún no ha sido agendado por DICOMES...</label>
          </div> -->

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
        </div>

      </div>
    </div>
  </div>

  <!-- QAyuda Modal -->
  <div class="modal fade text-gray-900" id="QAyuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Calendario de Eventos?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Este es el calendario de eventos, en donde se listarán todos las coberturas de los eventos por parte de DICOMES.<br>---<br>Para solicitar una cobertura de eventos, seleciona un día libre e ingresa los datos solicitados. Una vez enviado la solicitud, tendrás que esperar la confirmación por parte de DICOMES.<br>---<br>El evento estará en color rojo si aún no ha sido aceptado.<br>El evento estará en color verde si fue aceptado.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn text-white" data-dismiss="modal" style="background-color: #68086c;">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- End Calendar -->

</div>

<!-- End of Main Content -->


<?php
require('../views/sections/inferior.php');
?>