<?php

if (!empty($_POST['btnmodificar'])) {
    if (!empty($_POST['txtnombre']) ) {
        $nombre = $_POST['txtnombre'];
        $id = $_POST['txtid'];

        $sql = $conexion->query(" SELECT COUNT(*) as 'total' FROM cargo WHERE nombre= '$nombre' and id_cargo!= $id");

        if ($sql->fetch_object()->total > 0) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "Error",
                        type: "error",
                        text: "El cargo <?= $nombre; ?> ya existe",
                        styling: "bootstrap3"
                    });
                });
            </script>
            <?php } else {
            $modificar = $conexion->query("UPDATE cargo SET nombre='$nombre' WHERE id_cargo=$id ");

            if ($modificar) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Correcto",
                            type: "success",
                            text: "El cargo <?= $nombre; ?> se ha modificado correctamente",
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
                            text: "Error al modificar el cargo",
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