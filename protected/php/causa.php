<?php 

include 'seguridad.php';

$nomProceso = (isset($_GET['nomProceso'])) ? $_GET['nomProceso'] : '';
$nomProcedimiento = (isset($_GET['nomProcedimiento'])) ? $_GET['nomProcedimiento'] : '';

$_SESSION['nomProceso'] = $nomProceso;
$_SESSION['nomProcedimiento'] = $nomProcedimiento;


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
 	<style>
 		.bg-amarillo{
		    background-color: #FFFF00;
		    color: #000;
		}
 	</style>
 </head>
 <body>

 		<div id="app" class="container-fluid" <?php echo $ocultar; ?>>
			<div class="row">
				<?php include 'barraNavega.php'; ?>
				<div class="col-12 mx-auto" style="background-color: #3D3D3D;">
					<div class="row">
						<div class="col-md-8 col-lg-5 mx-auto m-5">
							<div class="my-3">
								<h2 class="text-white">Procedimiento: <?php echo $nomProcedimiento; ?></h2>
									

									<causas></causas>

									<div class="row my-4">
										<div class="col-md-6 mx-auto my-2">
											<a href="../procedimiento/pro.app?nomProceso=<?php echo $nomProceso;?>" class="btn btn-secondary form-control d-flex justify-content-center align-items-center" style="height: 50px;"><img src="../img/icons/regresar.svg" class="mx-1">Regresar</a>
										</div>
										<div class="col-md-6 mx-auto my-2">
											<a href="../proceso/pro.app" class="btn btn-success form-control d-flex justify-content-center align-items-center" style="height: 50px;">Terminar<img src="../img/icons/terminar.svg" class="mx-1"></a>
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
		<script src="assets/causas.js"></script>
 	
 </body>
 </html>