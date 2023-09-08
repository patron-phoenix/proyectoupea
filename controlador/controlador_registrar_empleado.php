<?php
if (!empty($_POST['btnregistrar'])) {
    if (!empty($_POST['txtnombre']) and !empty($_POST['txtapellido']) and !empty($_POST['txtdni']) and !empty($_POST['txtcargo'])) {
        $nombre = $_POST['txtnombre'];
        $apellido = $_POST['txtapellido'];
        $dni = $_POST['txtdni'];
        $cargo = $_POST['txtcargo'];

        $sql = $conexion->query(" SELECT COUNT(*) as 'total' FROM empleado WHERE dni= '$dni' ");

        if ($sql->fetch_object()->total > 0) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Error",
                        type: "error",
                        text: "El empleado <?= $nombre; ?> con dni <?= $dni; ?>  ya existe",
                        styling: "bootstrap3"
                    });
                });
            </script>
            <?php } else {

            $registro = $conexion->query("INSERT into empleado(nombre,apellido,dni,cargo) values(' $nombre','$apellido','$dni',$cargo);");

            if ($registro==true) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Correcto",
                            type: "success",
                            text: "El empleado <?= $nombre; ?> se ha registrado correctamente",
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
                            text: "Error al registrar al empleado",
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