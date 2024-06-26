<?php 

    if(is_file("vista/".$pagina.".php")){
  
        require_once("vista/".$pagina.".php"); 
    }
    else{
        echo "pagina en construccion";
    }

    require 'includes/conexion.php';

    $columns = [ 'cedula', 'nombre', 'apellido', 'edad', 'telefono' ];
    $table = "paciente";

    $campo = isset($_POST['campo']) ? $conexion->real_escape_string($_POST['campo']) : null;

    $db = "SELECT " . implode(", ", $columns) . " FROM $table";
    $resultado = $conexion->query($db);
    $num_rows = $resultado->num_rows;

    $html = '';

    if($num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . $row['cedula'] . '</td>';
            $html .= '<td>' . $row['nombre'] . '</td>';
            $html .= '<td>' . $row['apellido'] . '</td>';
            $html .= '<td>' . $row['edad'] . '</td>';
            $html .= '<td>' . $row['telefono'] . '</td>';
            $html .= '<td><a href="">Editar</a></td>';
            $html .= '<td><a href="">Eliminar</a></td>';
            $html .= '</tr>';
        }
    } else {
        $html .= '<tr>';
        $html .= '<td colspan="7>Sin resultados</td>';
        $html .= '</tr>';
    }

    echo json_encode($html, JSON_UNESCAPED_UNICODE);