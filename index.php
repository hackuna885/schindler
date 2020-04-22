<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();
session_destroy();

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Schindler Mexico</title>
</head>
<body class="fondo">
	<div id="app" class="container-fluid">
		<login></login>
	</div>
	<script src="js/vue.js"></script>
	<script src="assets/jquery-3.3.1.slim.min"></script>
</body>
</html>