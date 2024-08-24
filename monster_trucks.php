<?php
	include("clases/Producto.php");
	
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT * FROM producto p INNER JOIN  tipo t ON  p.fk_tipo=t.pk_tipo INNER JOIN categoria c ON t.fk_categoria = c.pk_categoria WHERE t.fk_categoria=2");
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
	<title>Monster Trucks</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <?php include "header.php"?>
  <br><br><br><br><br>
  <body style="background-color: whitesmoke;">
     <h2 style="text-align: center;font-size: 35px; font-family: Open sans;">Monster Trucks</h2>
    <hr>
    <div style="margin-left: 110px;" class="dropdown">
  <button style="width: 200px;" type="button" class="btn btn-primary dropdown-toggle" id="simpleDropdown" data-bs-toggle="dropdown" aria-expanded="false">Categorias 
  </button>
<ul class="dropdown-menu">
        <li><a href="vehiculos.php" class="dropdown-item">Vehiculos</a></li>
        <li><a href="monster_trucks.php" class="dropdown-item nav-link active">Monster trucks</a></li>
         <hr>
            <li><a href="fys.php" class="dropdown-item">Fast and furious</a></li>
        <li><a href="leyendas_de_la_velocidad.php" class="dropdown-item">Legends of speed</a></li>
        <li><a href="speed_blur.php" class="dropdown-item">Speed blur</a></li>
        <li><a href="customs.php" class="dropdown-item">Customs</a></li>
        <li><a href="turbo.php" class="dropdown-item">Turbo</a></li>
        <li><a href="#" class="dropdown-item">Mas Prox...</a></li>
</ul>
</div>
<main>
  	<div class="container">
  		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

<?php foreach ($resultado as $row){ ?>
        <div class="col">
          <div class="card shadow-sm">

            <div class="card-body">
              <img style="width: 335px; height: 370px" src="<?php echo $row['foto']; ?>">
              <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
               <p class="card-text">$<?php echo number_format($row['precio'],2,'.',','); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                	<a href="detalles.php?id=<?php echo $row['pk_producto'];?>&token=<?php echo hash_hmac('sha1',$row['pk_producto'],KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                </div>
               <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['pk_producto']; ?>,'<?php echo hash_hmac('sha1',$row['pk_producto'],KEY_TOKEN); ?>')"> Agregar al carrito </button>
              </div>
            </div>
          </div>
        </div>
<?php } ?>

  	</div>
 </div>
  </main>


 <!--IMPORTAR JS DE BOOSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

     <script type="text/javascript">
      function addProducto(id,token){
      let url = 'clases/carrito.php'
      let formData = new FormData()
      formData.append('id',id)
      formData.append('token',token)

      fetch(url,{
        method: 'POST',
        body: formData,
        mode: 'cors'
      })
      .then(response => response.json())
      .then(data =>{
        if (data.ok) {
          let elemento = document.getElementById("num_cart")
          elemento.innerHTML = data.numero
        }
      })
    }
    </script>
<?php include "footer.php"?>
  </body>
</html>