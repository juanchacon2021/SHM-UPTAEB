<?php

    // Importar la conexion
    require 'includes/database.php';
    $db = conectarBD();

    // Escribir el Query
    $query = "SELECT * FROM emergencias";

    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);


    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    // aqui se hara el arreglo junto con mensajes de errores
    $errores = [];
    $cedulae = '';
    $fechadeingreso = '';
    $horaingreso = '';
    $motingreso = '';


// aqui se Ejecutara el codigo despues de que el usuario envia el formulario
        
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cedulae = mysqli_real_escape_string( $db, $_POST['cedulae'] );
        $fechadeingreso = mysqli_real_escape_string( $db, $_POST['fechadeingreso'] );
        $horaingreso = mysqli_real_escape_string( $db, $_POST['horaingreso'] );
        $motingreso = mysqli_real_escape_string( $db, $_POST['motingreso'] );
    

        // Aqui se validara la informacion antes de enviar
        if(!$cedulae) {
            $errores[] = "Debes colocar una cedula";
        }

        if(!$fechadeingreso) {
            $errores[] = "La fecha es obligatorio";
        }

        if(!$horaingreso) {
            $errores[] = "La hora es obligatorio";
        }

        if(!$motingreso) {
            $errores[] = "El motivo es obligatorio";
        }

        // aqui se revisara que el arreglo de errores este vacio para enviar
        if(empty($errores)) {
            $query = " INSERT INTO emergencias(cedulae, fechadeingreso, horaingreso, motingreso ) VALUES ( '$cedulae',
            '$fechadeingreso', '$horaingreso', '$motingreso') ";
    
            $resultado = mysqli_query($db, $query);

        // Aqui se Redireccionara al usuario
        if($resultado) {
            // Redireccionar al usuario
           
            header('Location: ?pagina=emergencias');
        }
        
        }
    }


    require 'comunes/librerias.php';
    require 'comunes/head.php';
    /*********************************************************************************************** */
?>
<body class="form-emergencias bg-gray-100" style="margin: 2rem 2rem 0 22rem;">

<section class="contenedor text-zinc-900">
    <h1 class="text-2xl py-2">Emergencia</h1>

    <p class="text-zinc-400 bg-white border-8 rounded-lg border-white w-100">&nbsp; &nbsp; &nbsp; Agregar Emergencia &nbsp; &nbsp; > &nbsp; &nbsp;<span class="text-red-600 font-bold"> Nueva Emergencia</span></p>
    <p class="text-zinc-400 py-2 my-2">Las casillas con * son obligatorias</p>

    <a href="?pagina=inicio" class="boton px-4 cursor-pointer" style="margin-top: 200px;">Volver</a>

    <?php foreach ($errores as $error): ?>
    <div class="error" style="padding: .5rem; text-align: center; color: white; font-weight: 900; text-transform: uppercase; margin: 1rem 0; background-color: rgb(255, 28, 28);">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <h1 class="text-2xl py-4">Registrar Emergencia    </h1>
    <form action="?pagina=emergencias"  method="POST"  enctype="multipart/form-data">
        <fieldset class="formulario bg-white p-10 rounded-lg">
            <div>
                <label for="">Cedula *</label>
                <br>
                <input type="text" class="bg-gray-200 rounded-lg border-white" name="cedulae" id="cedulae" value="<?php $cedulae ?>">
            </div>

            <div>
                <label for="">Fecha de Ingreso *</label>
                <br>
                <input type="text" class="bg-gray-200 rounded-lg border-white" name="fechadeingreso" id="fechadeingreso" value="<?php $fechadeingreso ?>">
            </div>
            
            <div>
                <label for="">Hora de Ingreso *</label>
                <br>
                <input type="number" class="bg-gray-200 rounded-lg border-white" name="horaingreso" id="horaingreso" value="<?php $horaingreso ?>">
            </div>

        </fieldset>   
        <fieldset class="formulario bg-white px-10 py-2 rounded-lg"> 
            
            <div>
             <label for="">Motivo de Ingreso</label>
              <textarea class="bg-gray-200 rounded-lg border-white" id="motingreso" name="motingreso" rows="5" cols="61" value="<?php $horaingreso ?>" >
              </textarea>
            </div>


        </fieldset>    
        
        <div class="modal fade" id="registroExitosoModal" tabindex="-1" aria-labelledby="registroExitosoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registroExitosoModalLabel">¡emergencias Registrado!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>El emergencias se ha registrado exitosamente!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" style="background-color: rgb(220 38 38); border: solid rgb(220 38 38); hover:background-color: rgb(153, 27, 27);" data-bs-dismiss="modal" onclick="redireccionarInicio()">Volver al Inicio</button>
                </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary m-8 p-3" style="background-color: rgb(220 38 38); border: solid rgb(220 38 38); hover:background-color: rgb(153, 27, 27);" data-bs-toggle="modal" data-bs-target="#registroExitosoModal" data-dismiss="modal" data-timer="5000">Registrar Emergencia</button>            
        </div> 
    </form>
</section>

<section class="contenedor text-zinc-900" style="padding: 2rem 0 4rem 0;">
    <h1 class="text-2xl py-6">Emergencia Registradas</h1>

    <table class="my-2">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Fecha</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los Resultados -->
         <?php $sql = $db->query(" SELECT * FROM paciente p INNER JOIN emergencias e ON p.cedula = e.cedulae");
            while ($row = $sql->fetch_array()) : ?>
             <tr>
                <td> <?php echo $row['cedula'];?></td>
                <td> <?php echo $row['nombre'];?></td>
                <td> <?php echo $row['fechadeingreso'];?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
   <div></div>
    <div class="fixed-bottom d-flex justify-content-center m-4" id="scroll-to-top">
        <a href="#top" class="btn btn-primary" style="background-color: rgb(220 38 38); border: solid rgb(220 38 38);">
            <i class="fas fa-arrow-up"></i>
            <span>Volver Arriba</span>
        </a>
    </div>
</section>


<script script="js/script.js"></script>

</body>