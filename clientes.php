<?php
include_once('header.php');

// Checkin What level user has permission to view this page
//page_require_level(1);
$all_clientes = find_all('cliente');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Clientes</h1>
                    <br>
                    <a class="btn btn-primary btn-social pull-right" href="add_cliente.php" title="agregar"
                        data-toggle="tooltip">
                        <i class="fa fa-plus"></i> Agregar
                    </a>
                    <?php echo display_msg($msg); ?>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Clientes</li>
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

                <div class="col-12">

                    <div class="row">
                        <div class="col-sm-12">

                            <table id="example1"
                                class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending">Id Cliente</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">Nombre</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">Cedula</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">Telefono</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">Direccion</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">Estado</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($all_clientes as $a_cliente): ?>
                                    <tr class="odd">
                                        <td><?php echo remove_junk(ucwords($a_cliente['idcliente']))?></td>
                                        <td><?php echo remove_junk(ucwords($a_cliente['nombre']))?></td>
                                        <td><?php echo remove_junk(ucwords($a_cliente['cedula']))?></td>
                                        <td><?php echo remove_junk(ucwords($a_cliente['telefono']))?></td>
                                        <td><?php echo remove_junk(ucwords($a_cliente['direccion']))?></td>
                                        <td><?php echo remove_junk(ucwords($a_cliente['estado']))?> </td>
                                        <td>
                                            <a href="edit_cliente.php?id=<?php echo (int)$a_cliente['idcliente'];?>"
                                                class="btn btn-block btn-info" data-toggle="tooltip" title="Editar">
                                                Editar
                                            </a>
                                        </td>

                                    </tr>
                                    <?php endforeach;?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Id Cliente</th>
                                        <th rowspan="1" colspan="1">Nombre</th>
                                        <th rowspan="1" colspan="1">Cedula</th>
                                        <th rowspan="1" colspan="1">Telefono</th>
                                        <th rowspan="1" colspan="1">Direccion</th>
                                        <th rowspan="1" colspan="1">Estado</th>
                                        <th rowspan="1" colspan="1"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>

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

    <?php
include_once('footer.php');
?>
