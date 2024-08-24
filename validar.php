<?php 
$usuario= $_POST['usuario'];
$contraseña= $_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect('localhost','root','','hotcars');

$consulta="SELECT * FROM usuario where username = '$usuario' and pass = '$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if ($filas['tipo']==1){ //administrador
	header ("location:admin.php");
}
else if ($filas['tipo']==2) { //cliente
	header ("location:index.php");
}
else if ($filas['tipo']== 0 ) { //Datos incorrectos
	header ("location:login.php");
}
else{
	?>
	<?php
	header ("location.login.php");
   }

?>