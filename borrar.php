<?php 

    include("conexion_db.php");

    //verificamos que el id existe
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $consulta = "DELETE FROM tareas WHERE id = $id";
        $resultado = mysqli_query($conexion, $consulta);

        //comprobamos sino existe resultado, terminamos la ejecucion
        if(!$resultado) {
            die("¡Fallo la consulta!");
        }

        $_SESSION['mensaje'] = '¡Tarea eliminada!';
        $_SESSION['mensaje_tipo'] = 'danger';
        header("Location: index.php");
    }


?>