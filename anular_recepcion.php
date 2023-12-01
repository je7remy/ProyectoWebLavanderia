<?php
include_once('header.php');

// Verificar el nivel de permiso del usuario para ver esta página
// page_require_level(1);

if (isset($_POST['submit'])) {
    // Procesar el formulario cuando se envíe
    $idrecepcion = (int)$_POST['idrecepcion'];
    $estado = remove_junk($db->escape($_POST['estado']));

    // Tu lógica para actualizar el estado en la base de datos
    // ...
      // Consulta SQL para actualizar solo el estado
      $query = "UPDATE recepcion SET estado = '{$estado}' WHERE idrecepcion = {$idrecepcion}";

    if ($db->query($query)) {
        // Éxito
        $session->msg('s', "Estado de Recepción actualizado!");
        redirect('recepcion.php', true);
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se pudo actualizar el estado de la Recepción!');
        redirect('recepcion.php', true);
    }
}
?>

<!-- Formulario de Anulación de Recepción -->
<div class="content-wrapper">
    <div class="content-header">
        <h1 class="m-0">Anular Recepción</h1>
        <?php echo display_msg($msg); ?>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary col-lg-7">
                <div class="card-header">
                    <h3 class="card-title">Anular Recepción</h3>
                </div>

                <form method="post" action="anular_recepcion.php">
                    <div class="card-body">
                        <!-- Campo del formulario -->
                        <div class="form-group">
                            <label for="idrecepcion">ID Recepción</label>
                            <input type="number" class="form-control" name="idrecepcion" id="idrecepcion" required>
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
                        <a href="recepcion.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once('footer.php');
?>
