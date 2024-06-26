<?php

    // Importar la conexion
    require 'includes/database.php';
    $db = conectarBD();

    // Escribir el Query
    $query = "SELECT * FROM paciente";

    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);


    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    

    require 'comunes/librerias.php';
    require 'comunes/head.php';
?>

<body class="form-paciente bg-gray-100">
    <section class="contenedor text-zinc-900">
        <h1 class="text-2xl py-6">Pacientes Registrados</h1>

<!--        <?php if( intval( $resultado ) === 1): ?>
            <h1 class="" style="padding: .5rem; text-align: center; color: white; font-weight: 900; text-transform: uppercase; margin: 1rem 0; background-color: green; ">Paciente Registrado Correctamente</h1>
        <?php elseif( intval( $resultado) === 2): ?>   
            <p class="" style="padding: .5rem; text-align: center; color: white; font-weight: 900; text-transform: uppercase; margin: 1rem 0; background-color: green; ">Paciente Actualizado Correctamente</p> 
        <?php elseif( intval( $resultado) === 3): ?>   
            <p class="" style="padding: .5rem; text-align: center; color: white; font-weight: 900; text-transform: uppercase; margin: 1rem 0; background-color: green; ">Paciente Eliminado Correctamente</p> 
        <?php endif; ?>
-->


        <a href="?pagina=crear" class="boton">Registrar Paciente</a>
    
        <table class="my-10">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php while($paciente = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td style="padding: 1.5rem;"> <?php echo $paciente['cedula']; ?> </td>
                    <td> <?php echo $paciente['nombre']; ?> </td>
                    <td> <?php echo $paciente['apellido']; ?></td>
                    <td> <?php echo $paciente['edad']; ?></td>
                    <td>
                        <form action="" method="POST" class="" style="display: flex; justify-content: space-between;">
                            
                            <input type="hidden" name="cedula" value="<?php echo $paciente['cedula']; ?>">
                        
                            <input type="submit" class="" value="Eliminar" style=" background-color: rgb(220 38 38);
                            border-radius: 0.5rem; border: 0.5rem solid rgb(220 38 38); color: white; width: 5.5rem;">
                        
                            <a href="?pagina=modificar&cedula=<?php echo $paciente['cedula']; ?>" style="font-family: 'Sora'; background-color: rgb(16, 175, 63);
                            border-radius: 0.5rem; border: 0.5rem solid rgb(16, 175, 63); color: white; margin: 0rem 1rem;">Modificar</a>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>

    <script script="js/script.js"></script>

</body>
    

<?php

    // Cerrar la conexion
    mysqli_close($db);
?>