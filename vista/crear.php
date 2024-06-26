<?php
    // Aqui debe estar la Base de Datos
    require 'includes/database.php';
    $db = conectarBD();

    // Aqui se va a consultar para obtener los pacientes de la base de datos
    $consulta = 'SELECT * FROM paciente';
    $resultado = mysqli_query($db, $consulta);

    // aqui se hara el arreglo junto con mensajes de errores
    $errores = [];

    $cedula = '';
    $nombre = '';
    $apellido = '';
    $fechanac = '';
    $edad = '';
    $telefono = '';
    $ocupacion = '';
    $direccion = '';
    $estcivil = '';


// aqui se Ejecutara el codigo despues de que el usuario envia el formulario
        
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cedula = mysqli_real_escape_string( $db, $_POST['cedula'] );
        $nombre = mysqli_real_escape_string( $db, $_POST['nombre'] );
        $apellido = mysqli_real_escape_string( $db, $_POST['apellido'] );
        $fechanac = mysqli_real_escape_string( $db, $_POST['fechanac'] );
        $edad = mysqli_real_escape_string( $db, $_POST['edad'] );
        $telefono = mysqli_real_escape_string( $db, $_POST['telefono'] );
        $ocupacion = mysqli_real_escape_string( $db, $_POST['ocupacion'] );
        $direccion = mysqli_real_escape_string( $db, $_POST['direccion'] );
        $estcivil = mysqli_real_escape_string( $db, $_POST['estcivil'] );


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

        if(!$fechanac) {
            $errores[] = "La fecha de nacimiento es obligatoria";
        }

        if(!$edad) {
            $errores[] = "La edad es obligatorio";
        }

        if(!$telefono) {
            $errores[] = "El telefono es obligatorio";
        }
        
        if(!$ocupacion) {
            $errores[] = "La ocupacion es obligatoria";
        }

        if(strlen( $direccion) <20 ) {
            $errores[] = "La direccion es obligatoria y debe tener al menos 20 caracteres";
        }
        
        if(!$estcivil) {
            $errores[] = "El estado civil es obligatorio";
        }

        // aqui se revisara que el arreglo de errores este vacio para enviar
        if(empty($errores)) {
            $query = " INSERT INTO paciente(cedula, nombre, apellido, fechanac, edad, telefono, ocupacion, direccion, estcivil ) VALUES ( '$cedula',
            '$nombre', '$apellido', '$fechanac', '$edad', '$telefono', '$ocupacion', '$direccion', '$estcivil' ) ";
    
            $resultado = mysqli_query($db, $query);

        // Aqui se Redireccionara al usuario
        if($resultado) {
            // Redireccionar al usuario
           
            header('Location: ?pagina=pacientes');
        }
        
        }
    }


    require 'comunes/librerias.php';
    require 'comunes/head.php';
    require 'comunes/modal.php';
?>

<body class="form-paciente bg-gray-100">

    <section class="contenedor text-zinc-900">
        <h1 class="text-2xl py-2">Pacientes</h1>

        <p class="text-zinc-400 bg-white border-8 rounded-lg border-white w-96">&nbsp; &nbsp; &nbsp; Agregar Paciente &nbsp; &nbsp; > &nbsp; &nbsp;<span class="text-red-600 font-bold">   Nuevo Paciente</span></p>
        <p class="text-zinc-400 py-2 my-2">Las casillas con * son obligatorias</p>

        <a href="?pagina=pacientes" class="boton px-4 cursor-pointer" style="margin-top: 200px;">Volver</a>

        <?php foreach ($errores as $error): ?>
        <div class="error" style="padding: .5rem; text-align: center; color: white; font-weight: 900; text-transform: uppercase; margin: 1rem 0; background-color: rgb(255, 28, 28);">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <h1 class="text-2xl py-4">Informacion General</h1>
        <form action="?pagina=crear" class="ffformulario" method="POST"  enctype="multipart/form-data">
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
                    <label for="">Fecha de Nacimiento *</label>
                    <br>
                    <input type="date" class="bg-gray-200 rounded-lg border-white" name="fechanac" id="fechanac" value="<?php $fechanac ?>">
                </div>

                <div>
                    <label for="">Edad *</label>
                    <br>
                    <input type="number" class="bg-gray-200 rounded-lg border-white" name="edad" id="edad" value="<?php $edad ?>">
                </div>

                <div>
                    <label for="">Telefono *</label>
                    <br>
                    <input type="tel" class="bg-gray-200 rounded-lg border-white" name="telefono" id="telefono" value="<?php $telefono ?>">
                </div>

                <div>
                    <label for="">Ocupacion *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="ocupacion" id="ocupacion" value="<?php $ocupacion ?>">
                </div>

                <div>
                    <label for="">Direccion *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="direccion" id="direccion" value="<?php $direccion?>">
                </div>

                <div>
                    <label for="">Estado Civil *</label>
                    <br>
                    <select name="estcivil" id="estcivil" class="bg-gray-200 rounded-lg border-white" style="font-family: 'Arial';">
                        <option value="">-- Seleccione --</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                    </select>
                </div>

                <div class="dos-columnas">
                    <label for="">Motivo de Consulta *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="motivoconsulta" id="motivoconsulta" value="<?php ?>">
                </div>

                <div class="">
                    <label for="">H.E.A *</label>
                    <br>
                    <textarea name="hea" id="hea" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>
            </fieldset>
            

            <legend class="text-2xl py-4 my-4">Antecedentes Patologicos Familiares</legend>

            <fieldset class="formulario-dos bg-white p-10 rounded-lg">
                <div class="">
                    <label for="">Madre *</label>
                    <br>
                    <textarea name="madre" id="madre" class="bg-gray-200 rounded-lg border-white" cols="32"></textarea>
                </div>

                <div class="">
                    <label for="">Padre *</label>
                    <br>
                    <textarea name="padre" id="padre" class="bg-gray-200 rounded-lg border-white" cols="32"></textarea>
                </div>

                <div class="">
                    <label for="">Hermano *</label>
                    <br>
                    <textarea name="hermano" id="hermano" class="bg-gray-200 rounded-lg border-white" cols="32"></textarea>
                </div>
            </fieldset>

            <legend class="text-2xl py-4 my-4">Antecedentes Patologicos Personales</legend>

            <fieldset class="formulario-tres bg-white p-10 rounded-lg">
                <div class="cuatro-columnas">
                    <label for="">Antecedentes Patologicos *</label>
                    <br>
                    <textarea name="antpat" id="antpat" class="bg-gray-200 rounded-lg border-white" cols="80"></textarea>
                </div>

                <div>
                    <label for="">Alergia Medicamentos Indique cual *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="alergia" id="alergia" value="<?php ?>">
                </div>

                <div>
                    <label for="">Quirurgicos *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="quirurgicos" id="quirurgicos" value="<?php ?>">
                </div>

                <div>
                    <label for="">Transfuciones Sanguineas *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="transfuciones" id="transfuciones" value="<?php ?>">
                </div>
                
            </fieldset>

            <legend class="text-2xl py-4 my-4">Historia Psicosocial</legend>

            <fieldset class="formulario-tres bg-white p-10 rounded-lg">
                <div class="cuatro-columnas">
                    <label for="">Describa: *</label>
                    <br>
                    <textarea name="psicosocial" id="psicosocial" class="bg-gray-200 rounded-lg border-white" cols="80"></textarea>
                </div>

                <div>
                    <label for="">Habitos Toxicos *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="habtoxico" id="habtoxico" value="<?php ?>">
                </div>

                <div>
                    <label for="">Examen Fisico General *</label>
                    <br>
                    <textarea name="examenfisicog" id="examenfisicog" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>

            </fieldset>                
                
            <legend class="text-2xl py-4 my-4">Examen Fisico Regional</legend>

            <fieldset class="formulario bg-white p-10 rounded-lg">
                <div>
                    <label for="">Cabeza-Craneo *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="cabeza" id="cabeza" value="<?php ?>">
                </div>

                <div>
                    <label for="">Ojos *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="ojos" id="cabeza" value="<?php ?>">
                </div>

                <div>
                    <label for="">Nariz *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="nariz" id="cabeza" value="<?php ?>">
                </div>
                
                <div>
                    <label for="">Oidos *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="oidos" id="cabeza" value="<?php ?>">
                </div>

                <div>
                    <label for="">Boca Cerrada *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name=bocacerrada" id="cabeza" value="<?php ?>">
                </div>

                <div>
                    <label for="">Boca Abierta *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="bocaabierta" id="cabeza" value="<?php ?>">
                </div>

                <div>
                    <label for="">Tiroides *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="tiroides" id="cabeza" value="<?php ?>">
                </div>

                <div>
                    <label for="">Extremidades *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="extremidades" id="cabeza" value="<?php ?>">
                </div>
            </fieldset>
                
            <legend class="text-2xl py-4 my-4">Examen Fisico por Sistemas o Aparatos</legend>

            <fieldset class="formulario-tres bg-white p-10 rounded-lg">
                <div>
                    <label for="">Aparato Respiratorio</label>
                    <br>
                    <textarea name="" id="" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>

                <div>
                    <label for="">Aparato Cardiovascular</label>
                    <br>
                    <textarea name="" id="" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>

                <div>
                    <label for="">Abdomen</label>
                    <br>
                    <textarea name="" id="" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>
                
                <div>
                    <label for="">Extremidades</label>
                    <br>
                    <textarea name="" id="" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>

                <div>
                    <label for="">Neurologico</label>
                    <br>
                    <textarea name="" id="" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>

                <div>
                    <label for="">Paraclinicos Indicados</label>
                    <br>
                    <textarea name="" id="" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>

                <div>
                    <label for="">Resultado de los Paraclinicos</label>
                    <br>
                    <textarea name="" id="" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>

                <div>
                    <label for="">Recomendaciones</label>
                    <br>
                    <textarea name="" id="" class="bg-gray-200 rounded-lg border-white"></textarea>
                </div>
            </fieldset>        


<!-- MODAL DE REGISTRO EXITOSO -->

            <button type="submit" class="botonazul btn btn-primary m-8 p-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Registrar Paciente
            </button>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">¡Paciente Registrado!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="registro-animacion" class="modal-body d-flex justify-content-center">
                            <span class="fas fa-check-circle" style="font-size: 80px; color: green;"></span>
                            <h1 class="py-4">¡Paciente Registrado Exitosamente!</h1>
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