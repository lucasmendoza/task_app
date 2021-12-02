<?php

//INICIAMOS UNA SESION
session_start();

$conexion = mysqli_connect ('localhost', 'root', '', 'tasker_app');

/*
if(isset($conexion)) {
    echo "Conexion exitosa";
} else {
    echo "Sin Conexion";
}
*/
?>