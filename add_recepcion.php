<?php
include_once('header.php');

if (isset($_POST['fecha'])) {
    $fecha = remove_junk($db->escape($_POST['fecha']));
    $idusuario = remove_junk($db->escape($_POST['idusuario']));
    $idcliente = remove_junk($db->escape($_POST['idcliente']));
    $estado = remove_junk($db->escape($_POST['estado']));

    $query  = "INSERT INTO recepcion(fecha, idusuario, idcliente, estado) VALUES (";
    $query .= "'{$fecha}', '{$idusuario}', '{$idcliente}', '{$estado}'";
    $query .= ")";

    if ($db->query($query)) {
        // Éxito
        $session->msg('s', "Recepción ha sido creada!");
        // redireccionar a la página de recepciones
        redirect('recepcion.php', true);
    } else {
        // Fallo
        $session->msg('d', 'Lamentablemente no se pudo crear la Recepción!');
        // redireccionar a la página de recepciones
        redirect('recepcion.php', true);
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
                    <h1 class="m-0">Crear Recepción</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Recepción</a></li>
                        <li class="breadcrumb-item active">Recepción</li>
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
                        <h3 class="card-title">Registro de Recepción</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="add_recepcion.php">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Id Recepción</label>
                                <input type="number" class="form-control" name="codigo" id="codigo" placeholder="codigo"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Fecha</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Id Usuario</label>
                                <input type="number" class="form-control" name="idusuario" id="idusuario"
                                    placeholder="Id Usuario">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Id Cliente</label>
                                <input type="number" class="form-control" name="idcliente" id="idcliente"
                                    placeholder="Id Cliente">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Estado</label>
                                <select class="form-control" id="estado" name="estado">
                                    <option value="A">Activo</option>
                                    <option value="I">Inactivo</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>

                            <a href="recepciones.php" class="btn btn-danger">Cancelar</a>
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
