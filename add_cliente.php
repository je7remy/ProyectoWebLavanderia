<?php include_once('header.php');

if (isset($_POST['nombre'])) {
    $nombre = remove_junk($db->escape($_POST['nombre']));
    $cedula = remove_junk($db->escape($_POST['cedula']));
    $telefono = remove_junk($db->escape($_POST['telefono']));
    $direccion = remove_junk($db->escape($_POST['direccion']));
    $estado = remove_junk($db->escape($_POST['estado']));

    $query  = "INSERT INTO cliente(nombre, cedula, telefono, direccion, estado) VALUES (";
    $query .= "'{$nombre}', '{$cedula}', '{$telefono}', '{$direccion}', '{$estado}'";
    $query .= ")";

    if ($db->query($query)) {
        // Éxito
        $session->msg('s', "Cliente ha sido creado!");
        // redireccionar a la página de clientes
        redirect('clientes.php', true);
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se pudo crear el Cliente!');
        // redireccionar a la página de clientes
        redirect('clientes.php', true);
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
                    <h1 class="m-0">Crear Cliente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Cliente</a></li>
                        <li class="breadcrumb-item active">Cliente</li>
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
                        <h3 class="card-title">Registro de Cliente</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="add_cliente.php">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Cliente</label>
                                <input type="number" class="form-control" name="codigo" id="codigo" placeholder="codigo"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Cédula</label>
                                <input type="text" class="form-control" name="cedula" id="cedula"
                                    placeholder="Cédula">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    placeholder="Teléfono">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"
                                    placeholder="Dirección">
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
