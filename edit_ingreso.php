<?php
include_once('header.php');

$e_ingreso = find_by_id('ingreso', 'idegreso', (int)$_GET['id']);

if (!$e_ingreso) {
    $session->msg("d", "Ingreso no encontrado.");
    // redirect('ingresos.php');
}

?>

<?php
if (isset($_POST['descripcion'])) {

    $descripcion = remove_junk($db->escape($_POST['descripcion']));
    $monto = remove_junk($db->escape($_POST['monto']));
    $estado = remove_junk($db->escape($_POST['estado']));

    $query  = "UPDATE ingreso SET ";
    $query .= "descripcion='{$descripcion}', monto='{$monto}', estado='{$estado}' ";
    $query .= "WHERE idegreso='{$db->escape($e_ingreso['idegreso'])}'";
    $result = $db->query($query);

    if ($result && $db->affected_rows() === 1) {
        // Éxito
        $session->msg('s', "Ingreso se ha actualizado!");
        redirect2('ingreso.php');
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se ha actualizado el Ingreso!');
        redirect2('ingreso.php');
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
                    <h1 class="m-0">Editar Ingreso</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Ingreso</a></li>
                        <li class="breadcrumb-item active">Editar Ingreso</li>
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
                        <h3 class="card-title">Editar Ingreso</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="edit_ingreso.php?id=<?php echo (int)$e_ingreso['idegreso']; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Ingreso</label>
                                <input type="number" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_ingreso['idegreso'])); ?>" name="codigo"
                                    id="codigo" placeholder="Código" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripción</label>
                                <input type="text" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_ingreso['descripcion'])); ?>" name="descripcion"
                                    id="descripcion" placeholder="Descripción">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Monto</label>
                                <input type="text" class="form-control"
                                    value="<?php echo remove_junk(ucwords($e_ingreso['monto'])); ?>" name="monto"
                                    id="monto" placeholder="Monto">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Estado</label>
                                <select class="form-control" name="estado" id="estado">
                                    <option <?php if ($e_ingreso['estado'] === 'A') echo 'selected="selected"'; ?>
                                        value="A">Activo</option>
                                    <option <?php if ($e_ingreso['estado'] === 'I') echo 'selected="selected"'; ?>
                                        value="I">Inactivo</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="ingreso.php" class="btn btn-danger">Cancelar</a>
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
