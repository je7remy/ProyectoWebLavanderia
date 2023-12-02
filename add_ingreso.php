<?php
include_once('header.php');

if (isset($_POST['idegreso'])) {
    $idegreso = remove_junk($db->escape($_POST['idegreso']));
    $descripcion = remove_junk($db->escape($_POST['descripcion']));
    $monto = remove_junk($db->escape($_POST['monto']));
    $estado = remove_junk($db->escape($_POST['estado']));

    $query  = "INSERT INTO ingreso(idegreso, descripcion, monto, estado) VALUES (";
    $query .= "'{$idegreso}', '{$descripcion}', '{$monto}', '{$estado}'";
    $query .= ")";

    if ($db->query($query)) {
        // Éxito
        $session->msg('s', "Ingreso ha sido creado!");
        // redireccionar a la página de ingresos
        redirect('ingreso.php', true);
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se pudo crear el Ingreso!');
        // redireccionar a la página de ingresos
        redirect('ingreso.php', true);
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
                    <h1 class="m-0">Crear Ingreso</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Ingreso</a></li>
                        <li class="breadcrumb-item active">Ingreso</li>
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

                <div class="card card-primary col-lg-7">
                    <div class="card-header">
                        <h3 class="card-title">Registro de Ingreso</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="add_ingreso.php">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Id Egreso</label>
                                <input type="number" class="form-control" name="idegreso" id="idegreso"
                                    placeholder="Id Egreso">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    placeholder="Descripción">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Monto</label>
                                <input type="text" class="form-control" name="monto" id="monto" placeholder="Monto">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Estado</label>
                                <select class="form-control" name="estado" id="estado">
                                    <option value="A">Activo</option>
                                    <option value="I"disabled>Inactivo</option>
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
