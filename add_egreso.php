<?php
include_once('header.php');

if (isset($_POST['descripcion'])) {
    $descripcion = remove_junk($db->escape($_POST['descripcion']));
    $monto = remove_junk($db->escape($_POST['monto']));
    $estado = remove_junk($db->escape($_POST['estado']));

    $query  = "INSERT INTO egreso(descripcion, monto, estado) VALUES (";
    $query .= "'{$descripcion}', '{$monto}', '{$estado}'";
    $query .= ")";

    if ($db->query($query)) {
        // Éxito
        $session->msg('s', "Egreso ha sido creado!");
        // redireccionar a la página de egresos
        redirect('egreso.php', true);
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se pudo crear el Egreso!');
        // redireccionar a la página de egresos
        redirect('egreso.php', true);
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
                    <h1 class="m-0">Crear Egreso</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Egreso</a></li>
                        <li class="breadcrumb-item active">Egreso</li>
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
                        <h3 class="card-title">Registro de Egreso</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="add_egreso.php">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Egreso</label>
                                <input type="number" class="form-control" name="codigo" id="codigo" placeholder="codigo"
                                    readonly>
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
                                <select class="form-control" id="estado" name="estado">
                                    <option value="A">Activo</option>
                                    <option value="I"disabled>Inactivo</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>

                            <a href="egreso.php" class="btn btn-danger">Cancelar</a>
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
