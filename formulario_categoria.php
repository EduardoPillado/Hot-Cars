<?php 

include("clases/Categoria.php");
$categoria=new Categoria();

$arregloDatos=$categoria->mostrar();

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
	<title>Categorias</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link href="imagenes/logo-hw.png" rel="icon">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="producto">
<br>
<form action="funciones/insertar_categoria.php" method="post" id="formulario" class="container" enctype="multipart/form-data">
	<h1 style="color: black;">Agregar nueva categoria</h1>
	<label style="color: black;">Nombre de la categoria:</label>
	<input required type="text" name="nom_cat" class="form-control">
	
	<br>
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

	




