<?php
    // Validar la URL por id valido
    $cedula = $_GET['cedula'];
    $cedula = filter_var($cedula, FILTER_VALIDATE_INT);

//    if(!$cedula) {
//        header('Location: ?personal=crear');
//    }    

    // Base de Datos
    require 'includes/database.php';
    $db = conectarBD();

    // Obtener los datos de la propiedad
    $consulta = "SELECT * FROM personal WHERE cedula = ${cedula}";
    $resultado = mysqli_query($db, $consulta);
    $personal = mysqli_fetch_assoc($resultado);


    // Consultar para obtener los vendedores
//    $consulta = 'SELECT * FROM personal WHERE id =';
//    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $cedula = $personal['cedula'];
    $nombre = $personal['nombre'];
    $apellido = $personal['apellido'];
    $correo = $personal['correo'];
    $telefono = $personal['telefono'];
    $rol = $personal['rol'];

// Ejecutar el codigo despues de que el usuario envia el formulario
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


        // Revisar que el array de errores este vacio
        if(empty($errores)) {
            $query = " UPDATE personal SET nombre = '{$nombre}', apellido = '{$apellido}', correo = '{$correo}',telefono = '{$telefono}',rol = '{$rol}' WHERE cedula = ${cedula} ";


            $resultado = mysqli_query($db, $query);

        // Aqui se Redireccionara al usuario
            if($resultado) {
                // Redireccionar al usuario
            
                header('Location:?pagina=personal');
            }
        
        }
        
    }

    require 'comunes/librerias.php';
    require 'comunes/head.php';
    require 'comunes/modal.php';
?>

<body class="form-personal bg-gray-100">

    <section class="contenedor text-zinc-900">
        <h1 class="text-2xl py-2">Personal</h1>

        <p class="text-zinc-400 bg-white border-8 rounded-lg border-white w-96">&nbsp; &nbsp; &nbsp; Agregar Personal &nbsp; &nbsp; > &nbsp; &nbsp;<span class="text-red-600 font-bold">   Nuevo Personal</span></p>
        <p class="text-zinc-400 py-2 my-2">Las casillas con * son obligatorias</p>

        <a href="?pagina=personal" class="boton px-4 cursor-pointer" style="margin-top: 200px;">Volver</a>

        <?php foreach ($errores as $error): ?>
        <div class="error" style="padding: .5rem; text-align: center; color: white; font-weight: 900; text-transform: uppercase; margin: 1rem 0; background-color: rgb(255, 28, 28);">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <h1 class="text-2xl py-4">Informacion General</h1>
        <form class="ffformulario" method="POST"  enctype="multipart/form-data">
            <fieldset class="formulario bg-white p-10 rounded-lg">
                <div>
                    <label for="">Nombres *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="nombre" id="nombre" value="<?php echo $nombre ?>">
                </div>

                <div>
                    <label for="">Apellidos *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="apellido" id="apellido" value="<?php echo $apellido ?>">
                </div>
                
                <div>
                    <label for="">Cedula *</label>
                    <br>
                    <input type="number" class="bg-gray-200 rounded-lg border-white" name="cedula" id="cedula" value="<?php echo $cedula ?>">
                </div>
                
                <div>
                    <label for="">Correo *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="correo" id="correo" value="<?php echo $correo ?>">
                </div>
                
                <div>
                    <label for="">Telefono *</label>
                    <br>
                    <input type="tel" class="bg-gray-200 rounded-lg border-white" name="telefono" id="telefono" value="<?php echo $telefono ?>">
                </div>

                <div>
                    <label for="">Rol *</label>
                    <br>
                    <select name="rol" id="rol" class="bg-gray-200 rounded-lg border-white" style="font-family: 'Arial';">
                        <option value="">-- Seleccione --</option>
                        <option value="1">Doctor</option>
                        <option value="2">Enfermera</option>
                    </select>
                </div>
<!-- MODAL DE REGISTRO EXITOSO -->

<button type="submit" class="botonazul btn btn-primary m-8 p-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Registrar personal
            </button>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">¡Personal Modificado!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="registro-animacion" class="modal-body d-flex justify-content-center">
                            <span class="fas fa-check-circle" style="font-size: 80px; color: green;"></span>
                            <h1 class="py-4">¡Personal Modificado Exitosamente!</h1>
                        </div>
                    </div>
                </div>
            </div>
<!-- FIN DEL MODAL-->
        </form>

        <div class="fixed-bottom d-flex justify-content-end m-4" id="scroll-to-top">
            <a href="#top" class="btn btn-primary" style="background-color: rgb(220 38 38); border: solid rgb(220 38 38);">
                <i class="fas fa-arrow-up"></i>
                <span>Volver Arriba</span>
            </a>
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>