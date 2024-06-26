<div class="modal fade" id="editar<?php echo $row['cod_emergencia'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="background: -webkit-linear-gradient(90deg, #ff0000,#ff7575);/* Chrome 10-25, Safari 5.1-6 */ background: linear-gradient(90deg, #ff0000,#ff7575);/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */                                             ">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Emergencia del paciente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
        <h2>Paciente:</h2><br>
      <?php echo 'Nombre y apellido: '.$row['nombre'].' '. $row['apellido'].'<br>';?> 
      <?php echo 'Cedula: '.$row['cedulae'];?>
      <hr>  
      </div>
      <div class="modal-body">
        <?php echo 'Fecha de la emergencia:'.$row['fechadeingreso'].'<br>'.'Hora de ingreso:'.$row['horaingreso'];?>
      </div>
      <div class="modal-body">
        <h2>Motivo de ingreso:</h2>
        <br>
        <?php echo $row['motingreso'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
        
      </div>
    </div>
  </div>
</div>