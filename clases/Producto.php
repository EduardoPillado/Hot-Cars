<?php 
class Producto{ 

	
	function __construct()
	{
		require_once("Conexion.php");
		$this->conexion=new Conexion();
	}
	function insertar($nombre, $descripcion, $precio, $foto, $stock, $tipo ){
		$consulta="INSERT INTO producto (pk_producto, nombre, descripcion, precio, descuento, foto, stock, fk_tipo, estatus) VALUES (NULL, '{$nombre}', '{$descripcion}', '{$precio}', 0, '{$foto}', '{$stock}', '{$tipo}' ,1)";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}
	function mostrar(){
		$consulta="SELECT * FROM producto WHERE estatus=1";
		$resultado=$this->conexion->query($consulta);
		return $resultado;
	}
	function baja($pk_producto){
        $consulta="UPDATE producto SET estatus=0 WHERE pk_producto='{$pk_producto}'";
        $resultado=$this->conexion->query($consulta);
        return $resultado;
    }
	function activar($pk_producto){
        $consulta="UPDATE producto SET estatus=1 WHERE pk_producto='{$pk_producto}'";
        $resultado=$this->conexion->query($consulta);
        return $resultado;
    }
	function mostrar_baja(){
        $consulta="SELECT * FROM producto WHERE estatus=0";
        $resultado=$this->conexion->query($consulta);
        return $resultado;
    }
	
}

 ?>