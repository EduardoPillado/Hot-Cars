<?php 

include("../clases/Categoria.php");

$categoria=new Categoria();

$nom_cat=$_POST['nom_cat'];


$respuesta=$categoria->insertar($nom_cat);

if ($respuesta) {
	echo "<meta http-equiv='REFRESH' content='0; url=../formulario_categoria.php'><script>alert('Agregada') </script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=../formulario_categoria.php'><script>alert('No se registro') </script>";
}

?>