<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniciar sesion</title>
	<link rel="icon" href="./imagenes/logo-hw.png">
	<link rel="stylesheet"href="./css/style_login.css?a=1">
</head>
<body class="body_login">
<div class="containerLOGIN">
	<div class="formulario_login">
		<img class="img_login" src="./imagenes/logo-hw.png">
		<h2 class="h2_login">Iniciar sesión</h2>

     
     <form action="validar.php" method="post">
	
	 <label for="Usuario">Usuario</label>
	 <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>

	 <label for="contra"> Contraseña </label>
	 <input type="password" name="contraseña" id="pass" placeholder="Contraseña" required>

	 <a href="registrarse.php">¿No tienes cuenta?, Registrarse</a>
	 <input class="boton_login" type="submit" value="Iniciar sesion">

	</form>
	</div>
</div>
</body>
</html>