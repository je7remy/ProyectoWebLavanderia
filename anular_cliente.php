<?php
include_once('header.php');

// Verificar el nivel de permiso del usuario para ver esta página
// page_require_level(1);

if (isset($_POST['submit'])) {
    // Procesar el formulario cuando se envíe
    $idcliente = (int)$_POST['idcliente'];
    $estado = remove_junk($db->escape($_POST['estado']));

    // Consulta SQL para actualizar solo el estado del cliente
    $query = "UPDATE cliente SET estado = '{$estado}' WHERE idcliente = {$idcliente}";

    if ($db->query($query)) {
        // Éxito
        $session->msg('s', "Estado del Cliente actualizado!");
        redirect('clientes.php', true);
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se pudo actualizar el estado del Cliente!');
        redirect('clientes.php', true);
    }
}
?>

<!-- Formulario de Actualización de Estado del Cliente -->
<div class="content-wrapper">
    <div class="content-header">
        <h1 class="m-0">Actualizar Estado del Cliente</h1>
        <?php echo display_msg($msg); ?>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary col-lg-7">
                <div class="card-header">
                    <h3 class="card-title">Actualizar Estado del Cliente</h3>
                </div>

                <form method="post" action="anular_cliente.php">
                    <div class="card-body">
                        <!-- Campo del formulario -->
                        <div class="form-group">
                            <label for="idcliente">ID Cliente</label>
                            <input type="number" class="form-control" name="idcliente" id="idcliente" required>
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
                        <a href="clientes.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once('footer.php');
?>
