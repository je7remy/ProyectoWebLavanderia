<?php
include_once('header.php');

$e_cliente = find_by_id('cliente', 'idcliente', (int)$_GET['id']);

if (!$e_cliente) {
    $session->msg("d", "Cliente no encontrado.");
    // redirect('clientes.php');
}

?>

<?php
if (isset($_POST['nombre'])) {

    $nombre = remove_junk($db->escape($_POST['nombre']));
    $cedula = remove_junk($db->escape($_POST['cedula']));
    $telefono = remove_junk($db->escape($_POST['telefono']));
    $direccion = remove_junk($db->escape($_POST['direccion']));
    $estado = remove_junk($db->escape($_POST['estado']));

    $query  = "UPDATE cliente SET ";
    $query .= "nombre='{$nombre}', cedula='{$cedula}', telefono='{$telefono}', direccion='{$direccion}', estado='{$estado}' ";
    $query .= "WHERE idcliente='{$db->escape($e_cliente['idcliente'])}'";
    $result = $db->query($query);

    if ($result && $db->affected_rows() === 1) {
        // Éxito
        $session->msg('s', "Cliente se ha actualizado!");
        redirect2('clientes.php');
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se ha actualizado el Cliente!');
        redirect2('clientes.php');
    }
}
?>

<!-- para crear una ventana o pagina se copia desde aqui diferente -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Cliente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Cliente</a></li>
                        <li class="breadcrumb-item active">Editar Cliente</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <?php echo display_msg($msg); ?>
                <div class="card card-primary col-lg-7">
                    <div class="card-header">
                        <h3 class="card-title">Editar Cliente</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="edit_cliente.php?id=<?php echo (int)$e_cliente['idcliente']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Cliente</label>
                                <input type="number" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_cliente['idcliente'])); ?>" name="codigo"
                                    id="codigo" placeholder="Código" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre</label>
                                <input type="text" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_cliente['nombre'])); ?>" name="nombre"
                                    id="nombre" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Cédula</label>
                                <input type="text" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_cliente['cedula'])); ?>" name="cedula"
                                    id="cedula" placeholder="Cédula">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Teléfono</label>
                                <input type="text" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_cliente['telefono'])); ?>" name="telefono"
                                    id="telefono" placeholder="Teléfono">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Dirección</label>
                                <input type="text" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_cliente['direccion'])); ?>" name="direccion"
                                    id="direccion" placeholder="Dirección">
                            </div>

                            <div class="form-group">
    <label for="exampleInputPassword1">Estado</label>

    <!-- Campo oculto para almacenar el valor -->
    <input type="hidden" name="estado" id="estado" value="<?php echo $e_cliente['estado']; ?>">

    <!-- Campo de solo lectura para mostrar el estado -->
    <input type="text" class="form-control" readonly value="<?php echo ($e_cliente['estado'] === 'A') ? 'Activo' : 'Inactivo'; ?>">
</div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="clientes.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- /.control-sidebar -->
<?php include_once('footer.php'); ?>
