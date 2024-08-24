<?php 
define("CLIENT_ID","AWjms3aRnNZ7eZs9Rjdk19RW8a6tkAU96_kUzIbb7dhRr0wj5SdkY7Qrm2cRvGEtvbuG3khiEtXxLhSY");
define("CURRENCY","MXN");

define("KEY_TOKEN","Reyes2003");
define("MONEDA","$");
session_start();

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])){
	$num_cart = count($_SESSION['carrito']['productos']);
}

?>