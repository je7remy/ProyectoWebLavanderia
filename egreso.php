<?php
include_once('header.php');

// Verificar el nivel de permiso del usuario para ver esta página
// page_require_level(1);
$all_egresos = find_all('egreso');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Egresos</h1>
                    <br>
                    <a class="btn btn-primary btn-social pull-right" href="add_egreso.php" title="agregar"
                        data-toggle="tooltip">
                        <i class="fa fa-plus"></i> Agregar
                    </a>
                    <?php echo display_msg($msg); ?>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Egresos</li>
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
                                            aria-label="Id Egreso: activate to sort column ascending">Id Egreso</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Descripcion: activate to sort column ascending">Descripcion</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Monto: activate to sort column ascending">Monto</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Estado: activate to sort column ascending">Estado</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($all_egresos as $a_egreso): ?>
                                    <tr class="odd">
                                        <td><?php echo remove_junk(ucwords($a_egreso['idegreso']))?></td>
                                        <td><?php echo remove_junk(ucwords($a_egreso['descripcion']))?></td>
                                        <td><?php echo remove_junk(ucwords($a_egreso['monto']))?></td>
                                        <td><?php echo remove_junk(ucwords($a_egreso['estado']))?></td>
                                        <td>
                                            <a href="edit_egreso.php?id=<?php echo (int)$a_egreso['idegreso'];?>"
                                                class="btn btn-block btn-info" data-toggle="tooltip" title="Editar">
                                                Editar
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Id Egreso</th>
                                        <th rowspan="1" colspan="1">Descripcion</th>
                                        <th rowspan="1" colspan="1">Monto</th>
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
