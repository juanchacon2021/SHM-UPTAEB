<?php

    // Importar la conexion
    require 'includes/database.php';
    $db = conectarBD();

    // Escribir el Query
    $query = "SELECT * FROM pacientes";

    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);


    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    

    require 'comunes/librerias.php';
    require 'comunes/head.php';
?>

<body class="form-paciente bg-gray-100">
    <section class="contenedor text-zinc-900">
        <h1 class="text-2xl py-6">Historias Medicas</h1>


<!--        <a href="?pagina=crear" class="boton">Registrar Paciente</a>  -->
    
        <table class="my-10 w-full">
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
                <?php while($pacientes = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td style="padding: 1.5rem;"> <?php echo $pacientes['cedula']; ?> </td>
                    <td> <?php echo $pacientes['nombre']; ?> </td>
                    <td> <?php echo $pacientes['apellido']; ?></td>
                    <td> <?php echo $pacientes['edad']; ?></td>
                    <td>
                        <form action="" method="POST" class="" style="display: flex; justify-content: center;">
                            <a href="?pagina=crear_historia&cedula=<?php echo $pacientes['cedula']; ?>" style="font-family: 'Sora'; background-color: rgb(16, 175, 63);
                            border-radius: 0.5rem; border: 0.5rem solid rgb(16, 175, 63); color: white; margin: 0rem 1rem;">Agregar Historia Medica</a>
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