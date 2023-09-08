<?php

session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:login/login.php');
}

?>


<style>
    ul li:nth-child(3) .activo {
        background: rgb(11, 150, 214) !important;
    }
</style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">LISTA DE CARGOS</h4>

    <?php

    include "../modelo/conexion.php";
    include "../controlador/controlador_modificar_cargo.php";
    include "../controlador/controlador_eliminar_cargo.php";

    $sql = $conexion->query("SELECT * FROM cargo");
    ?>

    <a href="registro_cargo.php" class="btn btn-primary btn-rounded mb-4"> <i class="fa-solid fa-plus"></i> Agregar</a>

    <table class="table table-bordered table-hover col-12" id="example">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>

                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($datos = $sql->fetch_object()) : ?>
                <tr>
                    <td><?= $datos->id_cargo ?></td>
                    <td><?= $datos->nombre ?></td>


                    <td>
                        <a href="cargo.php" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $datos->id_cargo ?> "><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="cargo.php?id=<?= $datos->id_cargo ?> " class="btn btn-danger" onclick="advertencia(event)"><i class="fa-solid fa-trash"></i></a>
                    </td>

                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $datos->id_cargo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between">
                                <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Cargo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div hidden class="fl-flex-label mb-4 px-2 col-12 ">
                                        <input type="text" name="txtid" id="txtid" class="input input__text" placeholder="ID" value="<?= $datos->id_cargo ?>">
                                    </div>
                                    <div class="fl-flex-label mb-4 px-2 col-12 ">
                                        <input type="text" name="txtnombre" id="txtnombre" class="input input__text" placeholder="Nombre" value="<?= $datos->nombre ?>">
                                    </div>
                              
                                    <div class="text-right p-2">
                                        <a href="cargo.php" class="btn btn-secondary btn-rounded">Atras</a>
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