<?php

    // Importar la conexion
    require 'includes/database.php';
    $db = conectarBD();

    // Escribir el Query
    $query = "SELECT * FROM personal";

    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);


    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    // aqui se hara el arreglo junto con mensajes de errores
    $errores = [];

    $cedula = '';
    $nombre = '';
    $apellido = '';
    $correo = '';
    $telefono = '';
    $rol = '';


// aqui se Ejecutara el codigo despues de que el usuario envia el formulario
        
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cedula = mysqli_real_escape_string( $db, $_POST['cedula'] );
        $nombre = mysqli_real_escape_string( $db, $_POST['nombre'] );
        $apellido = mysqli_real_escape_string( $db, $_POST['apellido'] );
        $correo = mysqli_real_escape_string( $db, $_POST['correo'] );
        $telefono = mysqli_real_escape_string( $db, $_POST['telefono'] );
        $rol = mysqli_real_escape_string( $db, $_POST['rol'] );


        // Aqui se validara la informacion antes de enviar
        if(!$cedula) {
            $errores[] = "Debes colocar una cedula";
        }

        if(!$nombre) {
            $errores[] = "El nombre es obligatorio";
        }

        if(!$apellido) {
            $errores[] = "El apellido es obligatorio";
        }

        if(!$correo) {
            $errores[] = "El correo es obligatorio";
        }

        if(!$telefono) {
            $errores[] = "El telefono es obligatorio";
        }
        
        if(!$rol) {
            $errores[] = "El rol es obligatorio";
        }

        // aqui se revisara que el arreglo de errores este vacio para enviar
        if(empty($errores)) {
            $query = " INSERT INTO personal(cedula, nombre, apellido, correo, telefono, rol ) VALUES ( '$cedula',
            '$nombre', '$apellido', '$correo', '$telefono', '$rol' ) ";
    
            $resultado = mysqli_query($db, $query);

        // Aqui se Redireccionara al usuario
        if($resultado) {
            // Redireccionar al usuario
           
            header('Location: ?pagina=personal');
        }
        
        }
    }


    require 'comunes/librerias.php';
    require 'comunes/head.php';
?>

<body class="form-personal bg-gray-100" style="margin: 2rem 2rem 0 22rem;">

    <section class="contenedor text-zinc-900">
        <h1 class="text-2xl py-2">Personal</h1>

        <p class="text-zinc-400 bg-white border-8 rounded-lg border-white w-96">&nbsp; &nbsp; &nbsp; Agregar Personal &nbsp; &nbsp; > &nbsp; &nbsp;<span class="text-red-600 font-bold">   Nuevo Personal</span></p>
        <p class="text-zinc-400 py-2 my-2">Las casillas con * son obligatorias</p>

        <a href="?pagina=inicio" class="boton px-4 cursor-pointer" style="margin-top: 200px;">Volver</a>

        <?php foreach ($errores as $error): ?>
        <div class="error" style="padding: .5rem; text-align: center; color: white; font-weight: 900; text-transform: uppercase; margin: 1rem 0; background-color: rgb(255, 28, 28);">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <h1 class="text-2xl py-4">Informacion General</h1>
        <form action="?pagina=personal"  method="POST"  enctype="multipart/form-data">
            <fieldset class="formulario bg-white p-10 rounded-lg">
                <div>
                    <label for="">Nombres *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="nombre" id="nombre" value="<?php $nombre ?>">
                </div>

                <div>
                    <label for="">Apellidos *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="apellido" id="apellido" value="<?php $apellido ?>">
                </div>
                
                <div>
                    <label for="">Cedula *</label>
                    <br>
                    <input type="number" class="bg-gray-200 rounded-lg border-white" name="cedula" id="cedula" value="<?php $cedula ?>">
                </div>

                <div>
                    <label for="">Correo *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="correo" id="correo" value="<?php $correo ?>">
                </div>

                <div>
                    <label for="">Telefono *</label>
                    <br>
                    <input type="tel" class="bg-gray-200 rounded-lg border-white" name="telefono" id="telefono" value="<?php $telefono ?>">
                </div>

                <div>
                    <label for="">rol *</label>
                    <br>
                    <select name="rol" id="rol" class="bg-gray-200 rounded-lg border-white" style="font-family: 'Arial';">
                        <option value="">-- Seleccione --</option>
                        <option value="1">Doctor/a</option>
                        <option value="2">Enfermera/o</option>
                    </select>
                </div>

            </fieldset>        
            
            <div class="modal fade" id="registroExitosoModal" tabindex="-1" aria-labelledby="registroExitosoModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registroExitosoModalLabel">¡Personal Registrado!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>El Personal se ha registrado exitosamente!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="background-color: rgb(220 38 38); border: solid rgb(220 38 38); hover:background-color: rgb(153, 27, 27);" data-bs-dismiss="modal" onclick="redireccionarInicio()">Volver al Inicio</button>
                    </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary m-8 p-3" style="background-color: rgb(220 38 38); border: solid rgb(220 38 38); hover:background-color: rgb(153, 27, 27);" data-bs-toggle="modal" data-bs-target="#registroExitosoModal" data-dismiss="modal" data-timer="5000">Registrar Paciente</button>            
            </div> 
        </form>
    </section>

    <section class="contenedor text-zinc-900" style="padding: 2rem 0 4rem 0;">
        <h1 class="text-2xl py-6">Personal Registrado</h1>
    
        <table class="my-2">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>correo</th>
                    <th>Telefono</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php while($personal = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td class="py-4"> <?php echo $personal['cedula']; ?> </td>
                    <td> <?php echo $personal['nombre']; ?> </td>
                    <td> <?php echo $personal['apellido']; ?></td>
                    <td> <?php echo $personal['correo']; ?></td>
                    <td> <?php echo $personal['telefono']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="fixed-bottom d-flex justify-content-center m-4" id="scroll-to-top">
            <a href="#top" class="btn btn-primary" style="background-color: rgb(220 38 38); border: solid rgb(220 38 38);">
                <i class="fas fa-arrow-up"></i>
                <span>Volver Arriba</span>
            </a>
        </div>
    </section>

    <script script="js/script.js"></script>

</body>