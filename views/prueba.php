<?php
require('../views/sections/superior.php');
?>

<div class="container text-gray-900">
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
              <th>botón</th>
              <th>nombre</th>
              <th>id</th>
            </tr>
          </thead>
          <tbody class="text-gray-900">
            <tr data-toggle="modal" data-id="1" data-target="#modal">
                <td>ver</td>
                <td>Juan</td>
                <td>1</td>
            </tr>
            <tr data-toggle="modal" data-id="2" data-target="#modal">
                <td>ver</td>
                <td>María</td>
                <td>2</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal fade text-gray-900" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <label class="form-control font-italic" value=""></label>
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

<script>
  $(function(){
    $('#modal').modal({
        keyboard: true,
        backdrop: "static",
        show:false,
        
    }).on('show', function(){
          var getIdFromRow = $(event.target).closest('tr').data('id');
        //make your ajax call populate items or what even you need
        $(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow  + '</b>'))
    });
});
</script>


<?php
require('../views/sections/inferior.php');
?>