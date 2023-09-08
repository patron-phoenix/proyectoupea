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

<?php

include "../modelo/conexion.php";
include "../controlador/controlador_registrar_usuario.php";

$sql = $conexion->query("SELECT * FROM usuario");
?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">AGREGAR USUARIO</h4>

    <div class="row">
        <form action="" method="POST">
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" name="txtnombre" id="txtnombre" class="input input__text" placeholder="Nombre">
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" name="txtapellido" id="txtapellido" class="input input__text" placeholder="Apellido">
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" name="txtusuario" id="txtusuario" class="input input__text" placeholder="Usuario">
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="password" name="txtpassword" id="txtpassword" class="input input__text" placeholder="Contraseña*">
            </div>

            <div class="text-right p-2">
                <a href="usuarios.php" class="btn btn-secondary btn-rounded">Atras</a>
                <button type="submit" value="ok" class="btn btn-primary btn-rounded" name="btnregistrar">Registrar</button>
            </div>
        </form>
    </div>



</div>
</div>
<!-- fin del contenido principal -->

<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>