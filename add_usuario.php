<?php include_once('header.php'); 

if(isset($_POST['nombre'])){

$nombre = remove_junk($db->escape($_POST['nombre']));
$usuario = remove_junk($db->escape($_POST['usuario']));
$clave = remove_junk($db->escape($_POST['clave']));
$tipo_usuario = remove_junk($db->escape($_POST['tipo_usuario']));
$estado = remove_junk($db->escape($_POST['estado']));


$query  = "INSERT INTO usuario( nombre, usuario, clave,  tipo_usuario,estado) values (";
$query .=" '{$nombre}', '{$usuario}','{$clave}','{$tipo_usuario}','{$estado}'";
$query .=")";
if($db->query($query)){
//sucess
$session->msg('s',"Usuario ha sido creado! ");
//redirect('usuarios.php', true);

} else {
//failed
$session->msg('d','Lamentablemente no se pudo crear el Usuario!');
//redirect('usuarios.php', true);
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
            <h1 class="m-0">Crear Usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Usuario</a></li>
              <li class="breadcrumb-item active"> Usuario</li>
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

        <div   class="card card-primary col-lg-7">
              <div class="card-header">
                <h3 class="card-title">Registro de Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="usuarios.php">
                <div class="card-body">
                 
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Id usuario</label>
                    <input type="number" class="form-control"  name="codigo" id="codigo" placeholder="codigo" readonly>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" class="form-control"  name="nombre" id="nombre" placeholder="Nombre">
                  </div>

                  
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="usuario">
                  </div>


                  
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Clave</label>
                    <input type="password" class="form-control"  name="clave" id="clave" placeholder="Password">
                  </div>


                  
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Repetir Clave</label>
                    <input type="password" class="form-control" name="claver" id="claver"placeholder="Password">
                  </div>


                  <div class="form-group">
                  <label for="exampleInputPassword1">Tipo Usuario</label>
                  <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                    <option value="ADM">Administrador</option>
                    <option value="USR">Usuario Simple</option>
                  </select>
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
                
                  <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
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