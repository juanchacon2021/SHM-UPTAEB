<?php require_once("../comunes/librerias.php"); ?>
<body class="bg-gray-100">
<?php require_once("../comunes/header.php"); ?>
    <article class="inicio bg-orange-100 p-4">
        <h1 class="texto-bienvenida">Hola<?php  ?>, Bienvenido</h1>
    </article>

    <section class="dashboard w-full flex justify-end space-x-16 p-14">
        <div class="card-inicio bg-white rounded-lg p-10">
            <img src="../icons/paciente.svg" alt="logo de paciente" class="w-14">
            <div class="card-text">
                <h2>Pacientes Registrados</h2>
                <h1><?php echo '3' ?></h1>
            </div>
        </div>

        <div class="card-inicio bg-white rounded-lg p-10">
            <img src="../icons/usuarios.svg" alt="logo de usuarios" class="w-20">
            <div class="card-text">
                <h2>Usuarios Registrados</h2>
                <h1><?php echo '3' ?></h1>
            </div>
        </div>
    </section>

    <script src="../js/script.js"></script>

    
</body>
</html>