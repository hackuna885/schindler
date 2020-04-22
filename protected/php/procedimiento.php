<?php 

include 'seguridad.php';

$nomProceso = (isset($_GET['nomProceso'])) ? $_GET['nomProceso'] : '';

$_SESSION['nomProceso'] = $nomProceso;


 ?>


 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/sweetalert2.min.css">
	<link rel="stylesheet" href="../css/sistema.css">
 	<title>Procedimiento</title>
 </head>
 <body>

 		<div id="app" class="container-fluid" <?php echo $ocultar; ?>>
			<div class="row">
				<?php include 'barraNavega.php'; ?>
				<div class="col-12 mx-auto" style="background-color: #B1B3B4;">
					<div class="row">
						<div class="col-md-8 col-lg-5 mx-auto m-5">
							<div class="my-3">
								<h2 class="text-white">Proceso: <?php echo $nomProceso; ?></h2>
								<procedimientos></procedimientos>

								<div class="row my-4">
									<div class="col-md-6 mx-auto my-2">
										<a href="../proceso/pro.app" class="btn btn-secondary form-control d-flex justify-content-center align-items-center" style="height: 50px;"><img src="../img/icons/regresar.svg" class="mx-1">Regresar</a>
									</div>
									<div class="col-md-6 mx-auto my-2">
									</div>
								</div>
									
							</div>

							

						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="../js/vue.js"></script>
		<script src="../js/axios.min.js"></script>
		<script src="../js/sweetalert2.min.js"></script>
		<script src="assets/procedimientos.js"></script>
 	
 </body>
 </html>