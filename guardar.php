<?php

include("conexion_db.php");

//verificamos lo que recibimos por POST
if(isset($_POST['guardar_tarea'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    

    $consulta = "INSERT INTO tareas (titulo, descripcion) VALUES ('$titulo', '$descripcion')";

    $resultado = mysqli_query($conexion, $consulta);
        if(!$resultado) {
            die('consulta fallida');
        } 

            $_SESSION['mensaje'] = 'tarea guardada con exito';
            $_SESSION['mensaje_tipo'] = 'success';

            header("Location: index.php");
        
}

?>