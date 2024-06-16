<?php
    // Aqui debe estar la Base de Datos



    // Aqui se va a consultar para obtener los pacientes de la base de datos



    // aqui se hara el arreglo junto con mensajes de errores



// aqui se Ejecutara el codigo despues de que el usuario envia el formulario



        // Aqui se validara la informacion antes de enviar



        // aqui se revisara que el arreglo de errores este vacio para enviar


        // Aqui se Redireccionara al usuario

        


        


    require '../comunes/librerias.php';
    require '../comunes/header.php'
?>

<body class="form-paciente bg-gray-100">

    <section class="contenedor text-zinc-900">
        <h1 class="text-2xl py-2">Pacientes</h1>

        <p class="text-zinc-400 bg-white border-8 rounded-lg border-white w-96">&nbsp; &nbsp; &nbsp; Agregar Paciente &nbsp; &nbsp; > &nbsp; &nbsp;<span class="text-amber-500 font-bold">   Nuevo Paciente</span></p>
        <p class="text-zinc-400 py-2 my-2">Las casillas con * son obligatorias</p>

        <a href="vista/inicio" class="boton px-4 cursor-pointer" style="margin-top: 200px;">Volver</a>

        <h1 class="text-2xl py-4">Informacion General</h1>
        <form action=""  method="POST" >
            <fieldset class="formulario bg-white p-10 rounded-lg">
                <div>
                    <label for="">Nombres *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="nombre" id="nombre" value="<?php ?>">
                </div>

                <div>
                    <label for="">Apellidos *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="apellido" id="apellido" value="<?php ?>">
                </div>
                
                <div>
                    <label for="">Cedula *</label>
                    <br>
                    <input type="number" class="bg-gray-200 rounded-lg border-white" name="cedula" id="cedula" value="<?php ?>">
                </div>

                <div>
                    <label for="">Fecha de Nacimiento *</label>
                    <br>
                    <input type="date" class="bg-gray-200 rounded-lg border-white" name="fechanac" id="fechanac" value="<?php ?>">
                </div>

                <div>
                    <label for="">Edad *</label>
                    <br>
                    <input type="number" class="bg-gray-200 rounded-lg border-white" name="edad" id="edad" value="<?php ?>">
                </div>

                <div>
                    <label for="">Telefono *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="telefono" id="telefono" value="<?php ?>">
                </div>

                <div>
                    <label for="">Ocupacion *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="ocupacion" id="ocupacion" value="<?php ?>">
                </div>

                <div>
                    <label for="">Direccion *</label>
                    <br>
                    <input type="text" class="bg-gray-200 rounded-lg border-white" name="direccion" id="direccion" value="<?php ?>">
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
                
        </form>
    </section>

    <input type="submit" value="Guardar Historia Medica" class="boton float-end cursor-pointer w-80 py-2 px-4 my-10">

</body>