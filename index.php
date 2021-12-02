<?php
include("conexion_db.php");
include("includes/encabezado.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!--validamos para crear aviso de tarea guardar con exito-->
            <!--agregamos codigo boostrap para mostrar alerta estilizada-->
            <?php if (isset($_SESSION['mensaje'])) { ?>

                <div class="alert alert-<?= $_SESSION['mensaje_tipo'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!--esta funcion permite limpiar los datos que la sesion haya ejecutado-->
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="titulo de tu tarea" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="descripcion de tarea"></textarea>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar Tarea">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo </th>
                        <th>Descripcion </th>
                        <th> Creado el</th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $consulta = "SELECT * FROM tareas";
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($fila = mysqli_fetch_array($resultado)) { ?>

                        <tr>
                            <td> <?php echo $fila['titulo'] ?> </td>
                            <td> <?php echo $fila['descripcion'] ?> </td>
                            <td> <?php echo $fila['creado'] ?> </td>

                            <td>
                                <a href="editar.php?id=<?php echo $fila['id'] ?>" class="btn btn-warning">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>

                                <a href="borrar.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include("includes/pie_pagina.php") ?>