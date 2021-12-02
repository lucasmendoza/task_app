<?php

include("conexion_db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM tareas WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);

    //verificamos
    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_array($resultado);
        $titulo = $fila['titulo'];
        $descripcion = $fila['descripcion'];
    }
}


if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $consulta = "UPDATE tareas SET titulo='$titulo', descripcion='$descripcion' WHERE id = $id";

    $resultado = mysqli_query($conexion, $consulta);
    

    $_SESSION['mensaje'] = '¡Tarea modificada!';
    $_SESSION['mensaje_tipo'] = 'info';

    header("Location: index.php");

}

?>

<?php include("includes/encabezado.php") ?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="post">

                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="actualizar titulo">
                    </div>
                        <br>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="actualizar descripcion"><?php echo $descripcion; ?></textarea>
                    </div>
                        <br>
                    <button class="btn btn-success" name="actualizar">
                       Modificar
                    </button>

                </form>

            </div>


        </div>

    </div>

</div>

<?php include("includes/pie_pagina.php"); ?>