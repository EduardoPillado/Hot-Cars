<?php 
class Categoria{
	function __construct()
	{
		require_once("Conexion.php");
		$this->conexion=new Conexion();
	}
	function insertar($nom_cat){
		$consulta="INSERT INTO categoria (pk_categoria, nombre_categoria, estatus) VALUES (NULL, '{$nom_cat}',1)";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}
	function mostrar(){
		$consulta="SELECT * FROM categoria WHERE estatus=1";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}
	function mostrarTodo(){
		$consulta="SELECT * FROM categoria";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}

}

 ?>
