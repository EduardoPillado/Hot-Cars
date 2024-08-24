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
	<title>Productos Inactivos</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link href="imagenes/logo-hw.png" rel="icon">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="producto">
<?php 
include("clases/Producto.php");
$producto=new Producto();

$arregloDatos=$producto->mostrar_baja();

?>
<br>
<div class="container">
	<h2 style="color: black;">Lista de productos dadas de baja</h2>
	<table class="table table-dark table-striped">
		<tr>
			<th>Productos</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Foto</th>
			<th>Stock</th>
			<th>Opciones</th>
		</tr>
		<?php
		while ($fila=mysqli_fetch_array($arregloDatos)) {
		?>
		<tr>
			<td><?=$fila["nombre"]?></td>
			<td><?=$fila["descripcion"]?></td>
			<td><?=$fila["precio"]?></td>
			<td><?=$fila["foto"]?></td>
			<td><?=$fila["stock"]?></td>

			<td>
				<a href="funciones/activar_producto.php?pk_producto=<?=$fila['pk_producto']?>">
					<i title="Volver a Activar" class="bi bi-eye-fill"></i>
					<img style="width: 50px;" src="imagenes/reciclar.png" >
				</a>
			</td>
		</tr>
		<?php

			} 

		?>
	</table>
</div>
<a href="admin.php" class="btn btn-primary btn-margen">Regresar</a>
<style type="text/css">
	.btn-margen {
		margin: 60px 48%;
	}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>


