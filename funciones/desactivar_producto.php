<?php 
include("../clases/Producto.php");
$producto=new Producto();

$pk_producto=$_GET["pk_producto"];

$resultado=$producto->baja($pk_producto);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../lista_producto.php'><script>alert('Se borro el producto') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../lista_producto.php'><script>alert('No se borro el producto') </script>";
}

 ?>
