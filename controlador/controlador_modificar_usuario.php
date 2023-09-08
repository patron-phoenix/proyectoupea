<?php

if (!empty($_POST['btnmodificar'])) {
    if (!empty($_POST['txtnombre']) and !empty($_POST['txtapellido']) and !empty($_POST['txtusuario']) and !empty($_POST['txtpassword'])) {
        $nombre = $_POST['txtnombre'];
        $apellido = $_POST['txtapellido'];
        $usuario = $_POST['txtusuario'];
        $password = md5($_POST['txtpassword']);
        $id = $_POST['txtid'];

        $sql = $conexion->query(" SELECT COUNT(*) as 'total' FROM usuario WHERE usuario= '$usuario' and id_usuario!= $id");

        if ($sql->fetch_object()->total > 0) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Error",
                        type: "error",
                        text: "El usuario <?= $usuario; ?> ya existe",
                        styling: "bootstrap3"
                    });
                });
            </script>
            <?php } else {
            $modificar = $conexion->query("UPDATE usuario SET nombre='$nombre',apellido='$apellido',usuario= '$usuario',password='$password' WHERE id_usuario=$id ");

            if ($modificar) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Correcto",
                            type: "success",
                            text: "El usuario <?= $usuario; ?> se ha modificado correctamente",
                            styling: "bootstrap3"
                        });
                    });
                </script>
            <?php  } else { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Incorrecto",
                            type: "error",
                            text: "Error al modificar al usuario",
                            styling: "bootstrap3"
                        });
                    });
                </script>
        <?php }
        }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "Error",
                    type: "error",
                    text: "Los campos estan vacios",
                    styling: "bootstrap3"
                });
            });
        </script>
    <?php } ?>

    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>

<?php }

?>