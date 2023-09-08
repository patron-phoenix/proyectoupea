<?php
if (!empty($_POST['btnregistrar'])) {
    if (!empty($_POST['txtnombre']) ) {
        $nombre = $_POST['txtnombre'];

        $sql = $conexion->query(" SELECT COUNT(*) as 'total' FROM cargo WHERE nombre= '$nombre' ");

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

            $registro = $conexion->query("INSERT INTO cargo(nombre)VALUES('$nombre');");

            if ($registro==true) { ?>
                <script>
                    $(function notificacion() {
                        new PNotify({
                            title: "Correcto",
                            type: "success",
                            text: "El cargo <?= $nombre; ?> se ha registrado correctamente",
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
                            text: "Error al registrar el cargo",
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