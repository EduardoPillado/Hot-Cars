<?php 
if (!empty($_POST["registro"])) {
   if (empty($_POST["usuario"]) or empty($_POST["correo"]) or empty($_POST["contraseña"])) {
   
       echo '<script>alert("¡ERROR! Uno de los campos esta vacio... porfavor intentelo de nuevo")</script>';
   } else {
     $usuario=$_POST["usuario"];
      $contraseña=$_POST["contraseña"];
   		 $correo=$_POST["correo"];    

   	 $sql=$conexion->query("INSERT INTO usuario(username,pass,correo) VALUES ('$usuario','$contraseña','$correo') ");

   	 if ($sql==1) {
   	 	echo '<script>alert("Usuario registrado correctamente")</script>';
   	 	?><meta http-equiv="refresh" content="0;url=login.php"><?php   
   	 } else {
   	 	echo '<script>alert("Error al registrar usuario")</script>';
   	 }
  }

}

 ?>