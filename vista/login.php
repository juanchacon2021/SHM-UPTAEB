<?php
    require 'includes/database.php';
    require 'comunes/librerias.php';
?>
<body id="fond">
    <img class="wave" src="img/wave.png">
    <div class="container-login">
        <div class="img">
        <img src="img/bg.svg">
    </div>
    <div class="login-content">
        <form method="POST" action="" class="formulario-login">
            <center><img src="img/logo.png" alt="logo"></center>
            <h2 class="title">BIENVENIDO</h2>

            <?php
                require 'controlador/login.php';
            ?>

            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Usuario</h5>
                    <input id="usuario" type="text" class="input border-0" name="usuario">
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Contraseña</h5>
                    <input type="password" id="input" class="input" name="clave">
                </div>
            </div>
            <div class="view">
                <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>

            <div class="text-center">
                <a class="enlace font-italic isai5" href="">Olvidé mi contraseña</a>
                <a class="enlace font-italic isai5" href="">Registrarse</a>
            </div>
            <input name="btningresar" class="btn botoncito" type="submit" value="INICIAR SESION">
         </form>
      </div>
   </div>
   <script src="js/fontawesome.js"></script>
   <script src="js/main.js"></script>
   <script src="js/main2.js"></script>
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.bundle.js"></script>

</body>
</html>

