<?php

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $conexion->query("DELETE FROM cargo WHERE id_cargo=$id");

    if ($sql) { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "Correcto",
                    type: "success",
                    text: "Cargo eliminado correctamente",
                    styling: "bootstrap3"
                });
            });
        </script>
    <?php } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "Incorrecto",
                    type: "error",
                    text: "Error al eliminar cargo",
                    styling: "bootstrap3"
                });
            });
        </script>
<?php } ?>


<script>
    setTimeout(() => {
        window.history.replaceState(null,null,window.location.pathname);
    }, 0);
</script>


<?php }?>