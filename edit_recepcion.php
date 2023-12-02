<?php
include_once('header.php');

$e_recepcion = find_by_id('recepcion', 'idrecepcion', (int)$_GET['id']);

if (!$e_recepcion) {
    $session->msg("d", "Recepción no encontrada.");
    // redirect('recepciones.php');
}

?>

<?php
if (isset($_POST['fecha'])) {

    $fecha = remove_junk($db->escape($_POST['fecha']));
    $idusuario = remove_junk($db->escape($_POST['idusuario']));
    $idcliente = remove_junk($db->escape($_POST['idcliente']));
    $estado = remove_junk($db->escape($_POST['estado']));

    $query  = "UPDATE recepcion SET ";
    $query .= "fecha='{$fecha}', idusuario='{$idusuario}', idcliente='{$idcliente}', estado='{$estado}' ";
    $query .= "WHERE idrecepcion='{$db->escape($e_recepcion['idrecepcion'])}'";
    $result = $db->query($query);

    if ($result && $db->affected_rows() === 1) {
        // Éxito
        $session->msg('s', "Recepción se ha actualizado!");
        redirect2('recepcion.php');
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se ha actualizado la Recepción!');
        redirect2('recepcion.php');
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
                    <h1 class="m-0">Editar Recepción</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Recepción</a></li>
                        <li class="breadcrumb-item active">Editar Recepción</li>
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
                        <h3 class="card-title">Editar Recepción</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="edit_recepcion.php?id=<?php echo (int)$e_recepcion['idrecepcion']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Recepción</label>
                                <input type="number" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_recepcion['idrecepcion'])); ?>" name="codigo"
                                    id="codigo" placeholder="Código" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Fecha</label>
                                <input type="date" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_recepcion['fecha'])); ?>" name="fecha"
                                    id="fecha">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Id Usuario</label>
                                <input type="number" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_recepcion['idusuario'])); ?>" name="idusuario"
                                    id="idusuario" placeholder="Id Usuario">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Id Cliente</label>
                                <input type="number" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_recepcion['idcliente'])); ?>" name="idcliente"
                                    id="idcliente" placeholder="Id Cliente">
                            </div>

                            <div class="form-group">
    <label for="exampleInputPassword1">Estado</label>

    <!-- Campo oculto para almacenar el valor -->
    <input type="hidden" name="estado" id="estado" value="<?php echo $e_recepcion['estado']; ?>">

    <!-- Campo de solo lectura para mostrar el estado -->
    <input type="text" class="form-control" readonly value="<?php echo ($e_recepcion['estado'] === 'A') ? 'Activo' : 'Inactivo'; ?>">
</div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="recepcion.php" class="btn btn-danger">Cancelar</a>
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
