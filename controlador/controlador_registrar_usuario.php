<?php
if (!empty($_POST['btnregistrar'])) {
    if (!empty($_POST['txtnombre']) and !empty($_POST['txtapellido']) and !empty($_POST['txtusuario']) and !empty($_POST['txtpassword'])) {
        $nombre = $_POST['txtnombre'];
        $apellido = $_POST['txtapellido'];
        $usuario = $_POST['txtusuario'];
        $password = md5($_POST['txtpassword']);

        $sql = $conexion->query(" SELECT COUNT(*) as 'total' FROM usuario WHERE usuario= '$usuario' ");

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

            $registro = $conexion->query("INSERT INTO usuario(nombre,apellido,usuario,password)VALUES('$nombre','$apellido','$usuario','$password')");

            if ($registro==true) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Correcto",
                            type: "success",
                            text: "El usuario <?= $usuario; ?> se ha registrado correctamente",
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
                            text: "Error al registrar al usuario",
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

<?php } ?>