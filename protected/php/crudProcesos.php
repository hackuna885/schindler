<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');
session_start();

include_once 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

//NOMBRE DE USUARIO
$area = (isset($_SESSION['area'])) ? $_SESSION['area'] : '';
$nombre = (isset($_SESSION['nombre'])) ? $_SESSION['nombre'] : '';


$_POST = json_decode(file_get_contents("php://input"), true);

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$proceso = (isset($_POST['proceso'])) ? $_POST['proceso'] : '';

$fechaCap = date('d-m-Y');
$horaCap = date('g:i:s a');
$fechaHoraReg = $fechaCap.' '.$horaCap;


switch ($opcion) {
	case 1:
		$consulta = "INSERT INTO listaProcesos (proceso, area, idUsuario, fechaHoraReg) VALUES('$proceso','$area', '$nombre', '$fechaHoraReg')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
		break;

	case 2:
		$consulta = "UPDATE listaProcesos SET proceso='$proceso' WHERE id='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		break;

	case 3:
		$consulta = "DELETE FROM listaProcesos WHERE id='$id'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
		break;

	case 4:
			$consulta = "SELECT id, proceso, area, idUsuario, fechaHoraReg FROM listaProcesos WHERE area = '$area'";
	        $resultado = $conexion->prepare($consulta);
	        $resultado->execute();
	        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		break;
}

echo json_encode($data);

$conexion = NULL;

 ?>