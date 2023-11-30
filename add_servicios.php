<?php
include_once('header.php');

if (isset($_POST['descripcion'])) {

    $descripcion = remove_junk($db->escape($_POST['descripcion']));
    $precio = remove_junk($db->escape($_POST['precio']));
    $estado = remove_junk($db->escape($_POST['estado']));

    $query  = "INSERT INTO servicios(descripcion, precio, estado) VALUES (";
    $query .= " '{$descripcion}', '{$precio}', '{$estado}'";
    $query .= ")";

    if ($db->query($query)) {
        // éxito
        $session->msg('s', "Servicio ha sido creado!");
        redirect('servicios.php', true);
    } else {
        // falló
        $session->msg('d', 'Lamentablemente no se pudo crear el Servicio!');
        redirect('servicios.php', true);
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
                    <h1 class="m-0">Crear Servicio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Servicio</a></li>
                        <li class="breadcrumb-item active"> Servicio</li>
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
                        <h3 class="card-title">Registro de Servicio</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="add_servicios.php">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">ID Servicio</label>
                                <input type="number" class="form-control" name="idservicio" id="idservicio" placeholder="ID Servicio" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Precio</label>
                                <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Estado</label>
                                <select class="form-control" id="estado" name="estado">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>

                            <a href="servicios.php" class="btn btn-danger">Cancelar</a>
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
