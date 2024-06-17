<?php

    // Importar la conexion
    require '../includes/database.php';
    $db = conectarBD();


    // Escribir el Query
    $query = "SELECT * FROM paciente";

    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);


    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cedula = $_POST['cedula'];
        $cedula = filter_var($cedula, FILTER_VALIDATE_INT);
    
        if($id) {
            // Eliminar la paciente
            $query = "DELETE FROM paciente WHERE cedula = ${cedula}";
            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('location: ../admin?resultado=3');
            }
        }

    }

    require '../comunes/librerias.php';
    require '../comunes/header.php';
?>

<body class="form-paciente bg-gray-100">
    <section class="contenedor text-zinc-900">
        <h1 class="text-2xl py-6">Pacientes Registrados</h1>

        <?php if( intval( $resultado ) === 1): ?>
            <h1 class="text-2xl py-6 bg-red">Paciente Registrado Correctamente</h1>
        <?php elseif( intval( $resultado) === 2): ?>   
            <p class="">Paciente Actualizado Correctamente</p> 
        <?php elseif( intval( $resultado) === 3): ?>   
            <p class="">Paciente Eliminado Correctamente</p> 
        <?php endif; ?>

        <a href="../vista/crear.php" class="boton">Registrar Paciente</a>
    
        <table class="my-10">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php while($paciente = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $paciente['cedula']; ?> </td>
                    <td> <?php echo $paciente['nombre']; ?> </td>
                    <td> <?php echo $paciente['apellido']; ?></td>
                    <td> <?php echo $paciente['edad']; ?></td>
                    <td> <?php echo $paciente['telefono']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</body>
    

<?php

    // Cerrar la conexion
    mysqli_close($db);
?>