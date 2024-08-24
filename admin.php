<?php 

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

error_reporting(0);
$varsession= $_SESSION['usuario'];
if ($varsession==null || $varsession = '') {
	header("location:login.php");
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador</title>
	<link href="imagenes/logo-hw.png" rel="icon">
	<link rel="stylesheet"href="./css/style_admin.css">
</head>
<body>
<div class="containerADMIN">
	<div class="formulario_admin">
		<img class="img_admin" src="./imagenes/logo-hw.png">
		<h2 class="h2_admin">Administración</h2>

     
     	<form method="post">
	
            <a class="nav-link active" href="formulario_categoria.php">Categorias</a>
              <a class="nav-link active" href="formulario_tipo.php">Tipos</a>
            <a class="nav-link active" href="formulario_producto.php">Productos</a>
          

            <a class="color-linea">|</a>

            <a class="nav-link active" href="lista_producto.php">Productos activos</a>
            <a class="nav-link active" href="lista_producto_baja.php">Productos dados de bajas</a>

            <br><br><br>
            <a href="cerrar_sesion.php" class="btn-bye-admin">Cerrar sesion</a>

		</form>
	</div>
</div>
</body>
</html>

