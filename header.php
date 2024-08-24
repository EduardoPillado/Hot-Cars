<?php 

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
  <title>header</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <link href="imagenes/logo-hw.png" rel="icon">

</head>
<body>
 <header>
  <div class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
         <a href="index.php" class="navbar-brand">
        <img href="index.php" src="imagenes/logo-hw.png" width="100px" >
        <strong>Hot Cars</strong>
         </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
               <a href="index.php" class="nav-link active">Inicio</a>
           </li>
           <li class="nav-item">
               <a href="catalogo.php" class="nav-link active">Catálogo</a>
           </li>
           <li class="nav-item">
               <a href="perfil.php" class="nav-link active"><b><?= $_SESSION['usuario'] ?></b></a>
           </li>
           <li class="nav-item">
               <a href="cerrar_sesion.php" class="nav-link active">Cerrar sesión</a>
           </li>
          </ul>
        <a href="checkout.php" class="btn btn-primary">
          <img src="imagenes/carro2.png" width="35px">  Carrito
        <span id="num_cart" class="badge bg-secondary "><?php echo $num_cart; ?></span>
        </a>
           </li>
      </div>
    </div>
  </div>
</header>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
 