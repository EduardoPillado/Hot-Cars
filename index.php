<?php 

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT pk_producto,nombre, precio FROM producto WHERE estatus=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

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
	
	<title>H O T&nbsp&nbspC A R S</title>
	<link href="imagenes/logo-hw.png" rel="icon">
</head>
<body>
<!--HEADER INCLUIDO-->
<?php include "header.php"?>
<br><br><br><br>
<link rel="stylesheet"href="css/index.css?a=8">
<!--CONTENIDO GENERAL DE LA PAGINA-->
<main class="main">
	
	<br><br><br>	
     <div>
        <section class="circulos">
        	<div>
        		<a  class="xd" href="vehiculos.php">
        			 <img src="./imagenes/car.png">
        		    <h4>Vehiculos</h4>
        		</a>
        	</div>

        	<div>
        		<a  class="xd" href="monster_trucks.php">
        			 <img src="./imagenes/moster.png">
        		    <h4>Monster Trucks</h4>
        		</a>
        	</div>
        </section>
     <br><br><br>
<!--SECCCION RETROS-->

 <section class="diseño2">
            <div class="textos">
            	<br><br><br><br><br>
	 		<h2 class="subtitulo">Vehiculos > Customs</h2>
	 		<p class="parrafo">Set de Coches Hot Wheels creados por nuestra comunidad, encuentralos en este apartado custom y atrevete a correr.</p>
	 		<a href="customs.php"><button class="boton_d">Comprar Ahora</button></a>
	 	    </div>
	  
	 	   <div class="fondo__sec">
	 	 	<figure>
	 	 		<br>
	 		<a href="customs.php"><img src="./imagenes/park.png" class="fotos_motos"></a>
	 	    </figure>
	 	    </div>
	 </section>
	
<!--SECCCION COLECCIONABLES-->	     
	 <section class="diseño">  
	 	    <div class="fondo__sec">
	 	 	<figure>
	 	 		<br>
	 		<a href="speed_blur.php"><img src="./imagenes/spe.png" class="fotos_motos"></a>
	 	    </figure>
	 	    </div>

	 	    <div class="textos">
	 	    	<br><br><br><br><br>
	 		<h2 class="subtitulo">Vehiculos > Speed Blur</h2>
	 		<p class="parrafo">Estos coches Hot Wheels se componen de metal fundido con piezas de plástico que son ideales para cualquier tipo de aventura interior o exterior.</p>
	 		<a href="speed_blur.php"><button class="boton_d">Comprar Ahora</button></a>
	 	    </div>
	 </section>
	
<!--SECCCION BASICOS-->
    
	 <section class="diseño2">
	 	    <div class="textos">
	 	    	<br><br><br><br><br>
	 		<h2 class="subtitulo">Vehiculos > Turbo</h2>
	 		<p class="parrafo">¡Te gusta la velocidad? Perfecto, aqui tenemos los mejores hot wheels tuneados para ti!</p>
	 		<a href="turbo.php"><button class="boton_d">Comprar Ahora</button></a>
	 	    </div>
	 	    <div class="fondo__sec">
	     	<figure>
	     		<br>
	 		 <a href="turbo.php"><img src="./imagenes/turbo.png" class="fotos_motos"></a>
	 	    </figure>
	 	    </div>
	 </section>
	 
<!--SECCCION CUATRIMOTOS RECIENTEMENTE AÑADIDAS-->	     
	 <section class="diseño">  
	 	    <div class="fondo__sec">
	 	 	<figure>
	 	 		<br>
	 		<a href="leyendas_de_la_velocidad.php"><img src="./imagenes/Legends_of_Speed1.png" class="fotos_motos"></a>
	 	    </figure>
	 	    </div>

	 	    <div class="textos">
	 	    	<br><br><br><br><br>
	 		<h2 class="subtitulo">Vehiculos > Legends of speed</h2>
	 		<p class="parrafo">¿Podras ser capas de dominar a todas estas leyendas en un mano a mano a toda velocidad?</p>
	 		<a href="leyendas_de_la_velocidad.php"><button class="boton_d">Comprar Ahora</button></a>
	 	    </div>
	 </section>	
</main>
<!--FOOTER INCLUIDO-->
<?php include "footer.php"?>
</body>
</html>