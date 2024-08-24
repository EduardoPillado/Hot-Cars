<?php 

include("../clases/Tipo.php");

$tipo=new Tipo();

$nombre_tipo=$_POST['nombre_tipo'];
$fk_categoria=$_POST['fk_categoria'];




$respuesta=$tipo->insertar($nombre_tipo, $fk_categoria);

if ($respuesta) {
	echo "<meta http-equiv='REFRESH' content='0; url=../formulario_tipo.php'><script>alert('Agregada') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../formulario_tipo.php'><script>alert('No se registro') </script>";
}

?>