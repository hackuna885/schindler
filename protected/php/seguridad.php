<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

session_start();

$nombre = (isset($_SESSION['nombre'])) ? $_SESSION['nombre'] : '';
$area = (isset($_SESSION['area'])) ? $_SESSION['area'] : '';
$tipoUsuario = (isset($_SESSION['tipoUsuario'])) ? $_SESSION['tipoUsuario'] : '';



if (isset($nombre) && !empty($nombre) &&
	isset($area) && !empty($area) &&
	isset($tipoUsuario) && !empty($tipoUsuario)) {
	
	$ocultar = '';

}else{
	$ocultar = 'style="display: none;"'; // --> recuerda agregar esto en "container"
	echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
}



 ?>

