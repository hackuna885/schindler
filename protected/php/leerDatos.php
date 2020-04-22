<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

include_once 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM listaProcesos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

 ?>