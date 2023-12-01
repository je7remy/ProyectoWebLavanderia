<?php
include_once('header.php');

// Verificar el nivel de permiso del usuario para ver esta página
// page_require_level(1);

if (isset($_POST['submit'])) {
    // Procesar el formulario cuando se envíe
    $idegreso = (int)$_POST['idegreso'];
    $estado = remove_junk($db->escape($_POST['estado']));

    // Consulta SQL para actualizar solo el estado del ingreso
    $query = "UPDATE ingreso SET estado = '{$estado}' WHERE idegreso = {$idegreso}";

    if ($db->query($query)) {
        // Éxito
        $session->msg('s', "Estado del Ingreso actualizado!");
        redirect('ingreso.php', true);
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se pudo actualizar el estado del Ingreso!');
        redirect('ingreso.php', true);
    }
}
?>

<!-- Formulario de Actualización de Estado del Ingreso -->
<div class="content-wrapper">
    <div class="content-header">
        <h1 class="m-0">Actualizar Estado del Ingreso</h1>
        <?php echo display_msg($msg); ?>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary col-lg-7">
                <div class="card-header">
                    <h3 class="card-title">Actualizar Estado del Ingreso</h3>
                </div>

                <form method="post" action="anular_ingreso.php">
                    <div class="card-body">
                        <!-- Campo del formulario -->
                        <div class="form-group">
                            <label for="idegreso">ID Ingreso</label>
                            <input type="number" class="form-control" name="idegreso" id="idegreso" required>
                        </div>

                        <div class="form-group">
                            <label for="estado">Nuevo Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Actualizar Estado</button>
                        <a href="ingreso.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once('footer.php');
?>
