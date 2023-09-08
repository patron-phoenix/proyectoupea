<?php

if (!empty($_POST['btnmodificar'])) {
    if (!empty($_POST['txtnombre']) and !empty($_POST['txtapellido']) and !empty($_POST['txtdni']) and !empty($_POST['txtcargo'])) {
        $nombre = $_POST['txtnombre'];
        $apellido = $_POST['txtapellido'];
        $dni = $_POST['txtdni'];
        $cargo = $_POST['txtcargo'];
        $id = $_POST['txtid'];

        $sql = $conexion->query(" SELECT COUNT(*) as 'total' FROM empleado WHERE dni= '$dni' and id_empleado!= $id");

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
            $modificar = $conexion->query("UPDATE empleado SET nombre='$nombre',apellido='$apellido',dni= '$dni',cargo=$cargo WHERE id_empleado=$id; ");

            if ($modificar) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Correcto",
                            type: "success",
                            text: "El empleado <?= $nombre; ?> se ha modificado correctamente",
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
                            text: "Error al modificar al empleado",
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