<?php 
    require_once("comunes/librerias.php");

    require 'includes/database.php';
    $db = conectarBD();

    $consulta = "SELECT COUNT(*) AS total_pacientes FROM paciente"; 
    $consultados = "SELECT COUNT(*) AS total_usuarios FROM login";
    $resultadodos = $db->query($consultados);
    $resultado = $db->query($consulta);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $total_pacientes = $row["total_pacientes"];
    } else {
        echo "Error al obtener el número de pacientes";
    }

    if ($resultadodos->num_rows > 0) {
        $row = $resultadodos->fetch_assoc();
        $total_usuarios = $row["total_usuarios"];
    } else {
        echo "Error al obtener el numero de usuario";
    }

?>
<body class="bg-gray-100">
<?php require_once("comunes/head.php"); ?>
    <article class="inicio bg-white p-4">
        <h1 class="texto-bienvenida">Hola, Bienvenido</h1>
    </article>

    <section class="dashboard w-full flex justify-end space-x-16 p-14">
        <div class="card-inicio bg-white rounded-lg p-10">
            <img src="icons/user.svg" alt="logo de paciente" class="w-14">
            <div class="card-text">
                <h2>Pacientes Registrados</h2>
                <h1><?php echo $total_pacientes ?></h1>
            </div>
        </div>

        <div class="card-inicio bg-white rounded-lg p-10">
            <img src="icons/users.svg" alt="logo de usuarios" class="w-20">
            <div class="card-text">
                <h2>Usuarios Registrados</h2>
                <h1><?php echo $total_usuarios ?></h1>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>

    
</body>
</html>