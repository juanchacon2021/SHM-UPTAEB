<?php

function conectarBD() : mysqli {
    $db = mysqli_connect('localhost','root','123456','shm_uptaeb');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    
    return $db;
}