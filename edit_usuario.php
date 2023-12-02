<?php include_once('header.php'); 


$e_usuario = find_by_id('usuario','idusuario',(int)$_GET['id']);

if(!$e_usuario){
  $session->msg("d","Missing usuarios id.");
 // redirect('usuarios.php');
}
?>

<?php
  if(isset($_POST['nombre'])){

    $nombre = remove_junk($db->escape($_POST['nombre']));
    $usuario = remove_junk($db->escape($_POST['usuario']));
    $clave = remove_junk($db->escape($_POST['clave']));
    $tipo_usuario = remove_junk($db->escape($_POST['tipo_usuario']));
    $estado = remove_junk($db->escape($_POST['estado']));
    
    $query  = "UPDATE usuario SET ";
    $query .= "nombre='{$nombre}',usuario='{$usuario}',clave='{$clave}',tipo_usuario='{$tipo_usuario}',estado='{$estado}'";
    $query .= "WHERE idusuario='{$db->escape($e_usuario['idusuario'])}'";
    $result = $db->query($query);
     if($result && $db->affected_rows() === 1){
      //sucess
      $session->msg('s',"Usuario se ha actualizado! ");;
      redirect2('usuarios.php');
    } else {
      //failed
      $session->msg('d','Lamentablemente no se ha actualizado el Usuario!');
      redirect2('usuarios.php');
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
        <?php echo display_msg($msg); ?>
        <div   class="card card-primary col-lg-7">
              <div class="card-header">
                <h3 class="card-title">Registro de Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="edit_usuario.php?id=<?php echo (int)$e_usuario['idusuario'];?>" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id usuario</label>
                    <input type="number" class="form-control"  value="<?php echo remove_junk(ucwords($e_usuario['idusuario'])); ?>" 
                    name="codigo" id="codigo" placeholder="codigo" readonly>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" class="form-control"   value="<?php echo remove_junk(ucwords($e_usuario['nombre'])); ?>"
                    name="nombre" id="nombre" placeholder="Nombre">
                  </div>

                  
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Usuario</label>
                    <input type="text" class="form-control"  value="<?php echo remove_junk(ucwords($e_usuario['usuario'])); ?>"
                    name="usuario" id="usuario" placeholder="usuario">
                  </div>


                  
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Clave</label>
                    <input type="password" class="form-control"  value="<?php echo remove_junk(ucwords($e_usuario['clave'])); ?>"
                     name="clave" id="clave" placeholder="Password">
                  </div>


                  
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Repetir Clave</label>
                    <input type="password" class="form-control" name="claver"  value="<?php echo remove_junk(ucwords($e_usuario['clave'])); ?>" id="claver"placeholder="Password">
                  </div>


                  <div class="form-group">
                  <label for="exampleInputPassword1">Tipo Usuario</label>
                  <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                    <option <?php if($e_usuario['tipo_usuario'] === 'ADM') echo 'selected="selected"';?> value="ADM"> Administrador </option>
                    <option <?php if($e_usuario['tipo_usuario'] === 'USR') echo 'selected="selected"';?> value="USR">Usuario Simple</option>
                  
                  </select>
                  </div>

          
                  <div class="form-group">
    <label for="exampleInputPassword1">Estado</label>

    <!-- Campo oculto para almacenar el valor -->
    <input type="hidden" name="estado" id="estado" value="<?php echo $e_usuario['estado']; ?>">

    <!-- Campo de solo lectura para mostrar el estado -->
    <input type="text" class="form-control" readonly value="<?php echo ($e_usuario['estado'] === 'A') ? 'Activo' : 'Inactivo'; ?>">
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