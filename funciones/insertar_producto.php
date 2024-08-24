<?php 


include("../clases/Producto.php");

$producto=new producto();

$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$stock=$_POST['stock'];
$tipo=$_POST['tipo'];

$archi_foto=$_FILES["foto"]["tmp_name"];
$nombre_foto=$_FILES["foto"]["name"];


move_uploaded_file($archi_foto, "../imagenes/".$nombre_foto);

$respuesta=$producto->insertar($nombre, $descripcion, $precio, $nombre_foto, $stock, $tipo);

if ($respuesta) {
	echo "<meta http-equiv='REFRESH' content='0; url=../formulario_producto.php'><script>alert('Agregado') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../formulario_producto.php'><script>alert('No se registro') </script>";
}

?>