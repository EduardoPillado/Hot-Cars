<?php
require '../config/config.php';
require '../config/database.php';
$db = new Database();
$con = $db->conectar();

error_reporting(0);
$varsession= $_SESSION['usuario'];
if ($varsession==null || $varsession = '') {
	header("location:../login.php");
	die();
}
?>