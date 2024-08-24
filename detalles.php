<?php 
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
  echo "Error al procesar tu peticion";
  exit;
}
else{
  $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

  if($token == $token_tmp) {

$sql = $con->prepare("SELECT count(pk_producto) FROM producto WHERE pk_producto=? AND estatus=1");
$sql->execute([$id]);
if($sql->fetchColumn() > 0){

$sql = $con->prepare("SELECT nombre, descripcion,precio,descuento,foto FROM producto WHERE pk_producto=? AND estatus=1 LIMIT 1");
$sql->execute([$id]);
$row = $sql->fetch(PDO::FETCH_ASSOC);
$nombre = $row['nombre'];
$descripcion = $row['descripcion'];
$precio = $row['precio'];
$descuento = $row['descuento'];
$foto = $row['foto'];
$precio_desc = $precio - (($precio * $descuento)/100);
}

  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle del producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="css/estilos.css">
     <link href="imagenes/logo-hw.png" rel="icon">
  </head>
  <body>
 <?php include "header.php"?>
 <br><br><br><br>
<main>
  	<div class="container">
  	  <div class="row">

       <div class="col-md-6 order-md-1">
<img style="width: 450px; height: 550px" src="<?php echo $foto; ?>">      
 </div> 

       <div class="col-md-6 order-md-2">
         <h2><?php echo $nombre; ?></h2>

         <?php if($descuento >0){ ?>
          <p><del><?php echo MONEDA . number_format($precio, 2, '.',','); ?></del></p>
          <h2>
            <?php echo MONEDA . number_format($precio_desc, 2, '.',','); ?>
            <small class="text-success"> <?php echo $descuento; ?>% de descuento</small>
            </h2>

          <?php } else{ ?>

         <h2><?php echo MONEDA . number_format($precio, 2, '.',','); ?></h2>
       <?php } ?>

         <p class="lead">
           <?php echo $descripcion; ?>
         </p>

         <div class="d-grid gap-3 col-10 mx-auto">
              <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>,'<?php  echo $token_tmp; ?>')"> Agregar al carrito </button>
         </div>
       </div> 
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
  </body>
</html>