<!DOCTYPE html>
<?php 
    include ("conecta.php");
 ?>
<meta charset="UTF-8">
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<title>CRUD PHP & SQLSERVER</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
   <div class="col-md-8 col-md-offset-2">
   	<h1>CRUD PHP-SQL</h1>
   	  <form method="POST" action="formulario.php">
   	  <div class="form-group">
   	  	<label>Nombre:</label>
   	  	<input type="text" name="Nombre" class="form-control" placeholder="ingrese su nombre"> <br />
   	  </div> 
   	    <div class="form-group">
   	  	<label>Contraseña:</label>
   	  	<input type="password" name="Pass" class="form-control" placeholder="ingrese su contraseña"> <br />
   	  </div> 
   	    <div class="form-group">
   	  	<label>Email:</label>
   	  	<input type="text" name="Email" class="form-control" placeholder="ingrese su email"> <br />
   	  </div> 
   	    <div class="form-group">
   	  	<input type="submit" name="Insert" class="btn-bnt-warning" value="insertar datos"> <br />
   	  </div> 
   	   </form>
   	</div>
   	<br /> <br /> <br />

   	<?php
   	   if (isset($_POST['Insert'])) 
   	   {
   	   	$Usuario = $_POST['Nombre'];
   	   	$Pass = $_POST['Pass'];
   	   	$Email = $_POST['Email'];

   	   	$insertar = "INSERT INTO Usuario(Usuario,Password,Email) VALUES ('$Usuario','$Pass','$Email')";

   	   	$ejecutar = sqlsrv_query($conn_sis,$insertar);

   	   	if ($ejecutar) {
   	   	 	echo "<h3>Insertado correctamente</h3>";
   	   	 } 
   	   }
   	?>

   	   <div class="col-md-8 col-md-offset-2">
   	   	<table class="table table-bordered table-responsive">
   	   	<tr>
   	   	 <td>ID</td>
   	   	 <td>Usuario</td>
   	   	 <td>Password</td>
   	   	 <td>Email</td>
   	   	 <td>Acción</td>
   	   	 <td>Acción</td>
   	   	</tr>
         <?php
           $consulta = "SELECT * FROM Usuario";
           $ejecutar = sqlsrv_query($conn_sis,$consulta);

           $i=0;

           while ($fila=sqlsrv_fetch_array($ejecutar)) {
           	$id=$fila['ID'];
           	$usuario=$fila['Usuario'];
           	$password=$fila['Password'];
           	$email=$fila['Email'];
           	$i++;
           
         ?>
   	   	   	<tr align="center">
   	   	 <td><?php echo $id;?></td>
   	   	 <td><?php echo $usuario;?></td>
   	   	 <td><?php echo $password;?></td>
   	   	 <td><?php echo $email;?></td>
   	   	 <td><a href="formulario.php?editar=<?php echo $id;?>">Editar</a></td>
   	   	 <td><a href="formulario.php?borrar=<?php echo $id;?>">Borrar</a></td>
   	   	</tr>
       <?php } ?>
     </table>
   	   </div>

        <?php
        if (isset($_GET['editar'])) {
          include('editar.php');
        }
        ?>

        <?php
  if (isset($_GET['borrar'])) {
    $borrar_id=$_GET['borrar'];
    $borrar="DELETE FROM Usuario where ID='$borrar_id'";
    $ejecutar = sqlsrv_query($conn_sis,$borrar);
    if ($ejecutar) {
          echo "<script>alert('El usuario a sido borrado')</script>";
          echo "<script>windows.open('formulario.php','_self')</script>";
         } 
  }
?>
</body>
</html>