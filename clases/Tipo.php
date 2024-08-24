<?php 
class Tipo{
	function __construct()
	{
		require_once("Conexion.php");
		$this->conexion=new Conexion();
	}
	function insertar($nombre_tipo, $fk_categoria){
		$consulta="INSERT INTO tipo (pk_tipo, nombre_tipo, fk_categoria, estatus) VALUES (NULL, '{$nombre_tipo}','{$fk_categoria}',1)";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}
	function mostrar(){
		$consulta="SELECT * FROM tipo WHERE estatus=1";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}
	function mostrarTodo(){
		$consulta="SELECT * FROM tipo";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}

}

 ?>
