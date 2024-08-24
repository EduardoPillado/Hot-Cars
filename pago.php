<?php   
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if($productos != null){
  foreach ($productos as $clave =>  $cantidad) {

$sql = $con->prepare("SELECT pk_producto,nombre, precio, descuento, $cantidad AS cantidad FROM producto WHERE pk_producto=? AND estatus=1");
$sql->execute([$clave]);
$lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
  }
} else{
  header("Location:index.php");
  exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Realizar pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="imagenes/logo-hw.png" rel="icon">
  </head>
  <body>

   <?php include "header.php"?>
<br><br><br><br>
<main>
  	<div class="container">

     <div class="row">
       <div class="col-6">
         <h4>Detalles de pago</h4>
         <div id="paypal-button-container"></div>
       </div>

       <div class="col-6">
  		    <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Producto</th>
                     <th>Subtotal</th>
                     <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if($lista_carrito == null){
                  echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                } else {
              
                  $total = 0;
                  foreach($lista_carrito as $producto){
                    $_id = $producto['pk_producto'];
                    $nombre = $producto['nombre'];
                    $precio = $producto['precio'];
                    $descuento = $producto['descuento'];
                    $cantidad= $producto['cantidad'];
                    $precio_desc = $precio - (($precio * $descuento)/100);
                    $subtotal = $cantidad * $precio_desc;
                    $total += $subtotal;
                      ?>

                <tr>
                  <td><?php echo $nombre; ?></td>
                  <td>
                    <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2,'.',','); ?></div>
                  </td>
                </tr>
              <?php } ?>

                <tr>
              <td colspan="2">
                <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total,2,'.',','); ?></p>
              </td>
             </tr>
              </tbody>
            <?php } ?>
            </table>
          </div>

         
    </div>
    </div>
  </div>
</main>


 <!--IMPORTAR JS DE BOOSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

 <!--IMPORTAR JS DE PAYPAL-->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>

<script type="text/javascript">
//DISEÑO DE LOS BOTONES DE PAGOS...
    paypal.Buttons({
      style:{
        color: 'blue',
        shape: 'pill',
        label: 'pay'
      },
//CAPTURA DEL TOTAL DE LA VENTA
      createOrder: function(data, actions){
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: <?php echo $total; ?> 
            }
          }]
        });
      },
//QUE HARA LA PAGINA CUANDO EL PAGO SEA APROVADO..
            onApprove: function(data,actions){
              let  URL = 'clases/captura.php'
              actions.order.capture().then(function (detalles){
               
               console.log(detalles)

               let url = 'clases/captura.php'
               return fetch(url, {
                method: 'post',
                headers: {
                  'content-type':'application/json'
                },
                body: JSON.stringify({
                  detalles: detalles
                })
               })
              });
            },
//QUE HARA LA PAGINA CUANDO EL PAGO SEA CANCELADO...
      onCancel: function(data){
        alert("Pago cancelado");
        console.log(data);
      }
    }).render('#paypal-button-container')
  </script>
  </body>
</html>