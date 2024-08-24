<?php 
include("../clases/Producto.php");
$producto=new Producto();

$pk_producto=$_GET["pk_producto"];

$resultado=$producto->activar($pk_producto);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=../lista_producto_baja.php'><script>alert('Regreso el producto') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../lista_producto_baja.php'><script>alert('No regreso el producto') </script>";
}

 ?>