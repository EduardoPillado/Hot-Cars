<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrarse</title>
	<link rel="icon" href="./imagenes/logo-hw.png">
	<link rel="stylesheet"href="./css/style_registro.css?a=2">
</head>
<body class="body_registro">

<div class="container_registro">
		<form action="" method="post">
			<div class="formulario_registro">
		<img class="img_registro" src="./imagenes/logo-hw.png">
		<h2 class="h2_registro">Registrarse</h2>
<?php  
include("clases/Conexion_db.php");
include("funciones/controlador_registrar_usuario.php");
?>

	<label for="contra">Usuario</label>
	<input type="text" name="usuario" placeholder="Usuario" required>

	<label for="contra">Contraseña</label>
	<input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener al menos 8 caracteres, un digito en minúscula y una mayúscula" type="password" name="contraseña" placeholder="Contraseña" required>
	
	<label for="contra">Correo</label>
	<input pattern=".+@gmail\.com|.+@hotmail\.com" title="Solo gmail y hotmail" type="text" name="correo" placeholder="Correo electronico" required>


	<a href="login.php">¿Ya tienes cuenta?, Iniciar sesion</a>
	<input class="boton_registro" type="submit" name="registro" value="Registrarse">
	</div>
</form>
</div>
</body>
</html>