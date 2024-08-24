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
	<title>Perfil</title>
	<link href="imagenes/logo-hw.png" rel="icon">
</head>
<body>
<!--HEADER INCLUIDO-->
<?php include "header.php"?>
<br><br><br><br><br><br><br>

	<div class="container">
		<div align="center" class="col-md-6 order-md-1">
			<img src="imagenes/perfil.jpg">
		</div> 
	</div>

</body>
</html>