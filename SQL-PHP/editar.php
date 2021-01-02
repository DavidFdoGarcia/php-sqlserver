<?php
  if (isset($_GET['editar'])) {
  	$editar_id=$_GET['editar'];
  	$consulta="SELECT * FROM Usuario where ID='$editar_id'";
  	$ejecutar = sqlsrv_query($conn_sis,$consulta);
  	$fila=sqlsrv_fetch_array($ejecutar);
  	$usuario=$fila['Usuario'];
  	$password=$fila['Password'];
  	$email=$fila['Email'];
  }
?>
</br>

<div class="col-md-8 col-md-offset-2">
  
   	  <form method="POST" action="">
   	  <div class="form-group">
   	  	<label>Nombre:</label>
   	  	<input type="text" name="Nombre" class="form-control" value="<?php echo $usuario; ?>"> <br />
   	  </div> 
   	    <div class="form-group">
   	  	<label>Contraseña:</label>
   	  	<input type="password" name="Pass" class="form-control" value="<?php echo $password; ?>"> <br />
   	  </div> 
   	    <div class="form-group">
   	  	<label>Email:</label>
   	  	<input type="text" name="Email" class="form-control" value="<?php echo $email; ?>"> <br />
   	  </div> 
   	    <div class="form-group">
   	  	<input type="submit" name="Actualizar" class="btn-bnt-warning" value="actualizar datos"> <br />
   	  </div> 
   	   </form>
   	</div>
   		<?php
   	   if (isset($_POST['Actualizar'])) 
   	   {
   	   	$actualizar_nombre = $_POST['Nombre'];
   	   	$actualizar_password = $_POST['Pass'];
   	   	$actualizar_email = $_POST['Email'];

   	   	$consulta = "UPDATE Usuario SET Usuario='$actualizar_nombre',Password='$actualizar_password',Email='$actualizar_email' WHERE ID='$editar_id'";

   	   	$ejecutar = sqlsrv_query($conn_sis,$consulta);

   	   	if ($ejecutar) {
   	   	 	echo "<script>alert('Datos actualizados')</script>";
   	   	 	echo "<script>windows.open('formulario.php','_self')</script>";
   	   	 } 
   	   }
   	?>