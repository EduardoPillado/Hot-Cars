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
	<title>Tipos</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link href="imagenes/logo-hw.png" rel="icon">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body class="producto">
	<?php 
include("clases/Categoria.php");
$categoria=new Categoria();

$arregloDatos=$categoria->mostrar();
?>
<br>
<form action="funciones/insertar_tipo.php" method="post" id="formulario" class="container3" enctype="multipart/form-data">
	<h1 style="color: black;">Agregar nuevo tipo</h1>
	<label style="color: black;">Nombre del Tipo:</label>
	<input required type="text" name="nombre_tipo" class="form-control">
	<br>
	<label style="color: black;">Categoria:</label>
	<select required type="text" name="fk_categoria" class="form-control">
	<option value="">Seleccione una categoria</option>
		<?php
		while ($fila=mysqli_fetch_array($arregloDatos)) {
		?>
		<option value="<?=$fila['pk_categoria']?>"><?=$fila["nombre_categoria"]?></option>
		<?php

			} 

		?>
	</select>
	
	<br>
	<input class="btn btn-success" type="submit" name="Guardar"><br>
</form>
<a href="admin.php" class="btn btn-primary btn-margen">Regresar</a>
<style type="text/css">
	.btn-margen {
		margin: 100px 48%;
	}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>








