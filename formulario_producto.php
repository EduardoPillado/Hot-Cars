<?php  

include("clases/Tipo.php");
$tipo=new Tipo();

$arregloDatos=$tipo->mostrar();

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
	<title>Productos</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css?a=2">
	<link href="imagenes/logo-hw.png" rel="icon">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="producto" > 

	<!-- arriba esta una clase de estilo -->
<br>
<form action="funciones/insertar_producto.php" method="post" id="formulario" class="container2" enctype="multipart/form-data">
	<h1 style="color: black;">Agregar nuevo producto</h1>
	<label style="color: black;">Nombre:</label>
	<input required type="text" name="nombre" class="form-control">
	<br>
	<label style="color: black;">Descripcion</label>
	<input required type="text" name="descripcion" class="form-control">
	<br>
	<label style="color: black;">Precio:</label>
	<input required type="int" name="precio" placeholder="$00.00" class="form-control" aria-label="Amount (to the nearest dollar)">
	<br>
	<label style="color: black;">Foto (1600x800px)</label>
	<input required type="file" name="foto" class="form-control">
	<br>
    <label style="color: black;">Stock:</label>
	<input required type="text" name="stock" class="form-control">
	<br>
	<label style="color: black;">Tipo:</label>
	<select required type="text" name="tipo" class="form-control">
		<option value="">Seleccione una opción</option>
		<?php
		while ($fila=mysqli_fetch_array($arregloDatos)) {
		?>
		<option value="<?=$fila['pk_tipo']?>"><?=$fila["nombre_tipo"]?></option>
		<?php

			} 

		?>
	</select><br>
	
	<input class="btn btn-success" type="submit" name="Guardar"><br>
</form>
<a href="admin.php" class="btn btn-primary btn-margen">Regresar</a>
<style type="text/css">
	.btn-margen {
		margin: 60px 48%;
	}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>





