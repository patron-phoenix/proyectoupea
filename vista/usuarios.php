<?php

session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:login/login.php');
}

?>


<style>
    ul li:nth-child(1) .activo {
        background: rgb(11, 150, 214) !important;
    }
</style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">USUARIOS</h4>

    <?php

    include "../modelo/conexion.php";
    include "../controlador/controlador_modificar_usuario.php";
    include "../controlador/controlador_eliminar_usuario.php";

    $sql = $conexion->query("SELECT * FROM usuario");
    ?>

    <a href="registro_usuario.php" class="btn btn-primary btn-rounded mb-4"> <i class="fa-solid fa-plus"></i> Agregar</a>

    <table class="table table-bordered table-hover col-12" id="example">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">USUARIO</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($datos = $sql->fetch_object()) : ?>
                <tr>
                    <td><?= $datos->id_usuario ?></td>
                    <td><?= $datos->nombre ?></td>
                    <td><?= $datos->apellido ?></td>
                    <td><?= $datos->usuario ?></td>

                    <td>
                        <a href="usuarios.php" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $datos->id_usuario ?> "><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="usuarios.php?id=<?= $datos->id_usuario ?> " class="btn btn-danger" onclick="advertencia(event)"><i class="fa-solid fa-trash"></i></a>
                    </td>

                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $datos->id_usuario ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between">
                                <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div hidden class="fl-flex-label mb-4 px-2 col-12 ">
                                        <input type="text" name="txtid" id="txtid" class="input input__text" placeholder="ID" value="<?= $datos->id_usuario ?>">
                                    </div>
                                    <div class="fl-flex-label mb-4 px-2 col-12 ">
                                        <input type="text" name="txtnombre" id="txtnombre" class="input input__text" placeholder="Nombre" value="<?= $datos->nombre ?>">
                                    </div>
                                    <div class="fl-flex-label mb-4 px-2 col-12 ">
                                        <input type="text" name="txtapellido" id="txtapellido" class="input input__text" placeholder="Apellido" value="<?= $datos->apellido ?>">
                                    </div>
                                    <div class="fl-flex-label mb-4 px-2 col-12 ">
                                        <input type="text" name="txtusuario" id="txtusuario" class="input input__text" placeholder="Usuario" value="<?= $datos->usuario ?>">
                                    </div>
                                    <div class="fl-flex-label mb-4 px-2 col-12 ">
                                        <input type="password" name="txtpassword" id="txtpassword" class="input input__text" placeholder="Contraseña*" value="<?= $datos->password ?>">
                                    </div>

                                    <div class="text-right p-2">
                                        <a href="usuarios.php" class="btn btn-secondary btn-rounded">Atras</a>
                                        <button type="submit" value="ok" class="btn btn-primary btn-rounded" name="btnmodificar">Modificar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>



            <?php endwhile; ?>

        </tbody>
    </table>

</div>
</div>
<!-- fin del contenido principal -->

<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>