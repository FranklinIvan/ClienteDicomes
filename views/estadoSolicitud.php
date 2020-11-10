<?php
require('../views/sections/superior.php');
?>

<!-- Main Content -->
<div class="container text-gray-900">

  <h2>Estado de Solicitudes</h2><br>

  <!-- Table of Users DB -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="text-gray-900 d-inline">Lista del estado de las solicitudes enviadas por ti</h6>
      <span type="button" data-toggle="modal" data-target="#QEstado" class="font-weight-bold float-right">?</span>
      <!-- <span class="font-weight-bold">?</span> -->
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-gray-900" style="background-color: #e6e6e7;">
            <tr>
              <th>Ver</th>
              <th>Fecha</th>
              <th>Solicitante</th>
              <th>Descripción</th>
              <th>Actualizar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody class="text-gray-900">
            <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>22/11/20</td>
              <td>Franklin Iván</td>
              <td>Sinceramente creo que el barca, esta temporada, no ganará nada, me jode pero siendo honesto creo que será así.</td>
              <td>
                <button data-toggle="modal" data-target="#btnActualizar" class="btn text-white" style="background-color: #0f9bd0;">Actualizar</button>
              </td>
              <td class="text-center">
                <button data-toggle="modal" data-target="#btnEliminar" class="btn text-white" style="background-color: #b9181f;"><i class="fas fa-trash-alt fa-fw"></i></button>
              </td>
            </tr>
            <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>24/11/20</td>
              <td>Rocío Ñañez</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est illo maxime quis harum amet sed culpa vero voluptates.</td>
              <td>
                <button data-toggle="modal" data-target="#btnActualizar" class="btn text-white" style="background-color: #0f9bd0;">Actualizar</button>
              </td>
              <td class="text-center">
                <button data-toggle="modal" data-target="#btnEliminar" class="btn text-white" style="background-color: #b9181f;"><i class="fas fa-trash-alt fa-fw"></i></button>
              </td>
            </tr>
            <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>26/11/20</td>
              <td>Ricardo Ye</td>
              <td>Cha pero ta priti loco, qué locura con los botones esos loco chaa la vida.</td>
              <td>
                <button data-toggle="modal" data-target="#btnActualizar" class="btn text-white" style="background-color: #0f9bd0;">Actualizar</button>
              </td>
              <td class="text-center">
                <button data-toggle="modal" data-target="#btnEliminar" class="btn text-white" style="background-color: #b9181f;"><i class="fas fa-trash-alt fa-fw"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- End Table of Users DB -->

</div>

<!-- End of Main Content -->


<!-- Modals -->

<!-- QEstado Modal -->
<div class="modal fade text-gray-900" id="QEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estado de Solicitudes?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Esta lista muestra el estado actual de las solicitudes de cobertura enviadas por ti.<br>---<br>Las solicitudes con estado "pendiente" puede ser canceladas. Las solicitudes con estado "aceptado" pueden ser actualizadas o canceladas.<br>---<br>Las actualizaciones permiten modificar campos para la cobertura del evento. Una vez actualizada la información, el departamento de Dirección de Comunicación Estratégica (DICOMES) podrá aceptar o rechazar la solicitud de actualización.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal" style="background-color: #68086c;">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- info Modal -->
<div class="modal fade text-gray-900" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label class="font-weight-bold">De:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Fecha del Evento:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Ubicación:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Hora Inicio:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Hora Final:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Tipo de Servicio:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Tipo de Evento:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Cantidad de Personas:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Descripción:</label>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Actualizar Modal -->
<div class="modal fade fade text-gray-900" id="btnActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="font-weight-bold">Fecha:</label>
          <input type="date" class="form-control font-italic" name="fecha" placeholder="fecha..." required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Ubicación:</label>
          <input type="text" class="form-control font-italic" name="ubicacion" placeholder="ubicación..." required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Hora Inicial:</label>
          <input type="time" class="form-control font-italic" name="horaInicial" placeholder="hora inicial..." required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Hora Final:</label>
          <input type="time" class="form-control font-italic" name="horaFinal" placeholder="hora final..." required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Descripción:</label><br>
          <textarea name="descripcion" id="" cols="57" rows=5></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" style="background-color: #0f9bd0;">Solicitar cambio</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Eliminar Modal -->
<div class="modal fade fade text-gray-900" id="btnEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que quieres eliminar este evento?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" style="background-color: #b9181f;">Eliminar</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php
require('../views/sections/inferior.php');
?>