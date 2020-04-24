<?php 

include 'seguridad.php';

$con = new SQLite3("../data/riesgos.db");
$csAbiertos = $con -> query("SELECT COUNT(estatusCau) AS cuantosAbiertos FROM listaCausas WHERE estatusCau = 'Abierto'");
	while ($liCAbiertos = $csAbiertos->fetchArray()) { $cuantosAbiertos = $liCAbiertos['cuantosAbiertos']; }

$csCerrados = $con -> query("SELECT COUNT(estatusCau) AS cuantosCerrados FROM listaCausas WHERE estatusCau = 'Cerrado'");
	while ($liCCerrados = $csCerrados->fetchArray()) { $cuantosCerrados = $liCCerrados['cuantosCerrados']; }

$csEnAten = $con -> query("SELECT COUNT(estatusCau) AS cuantosEnAten FROM listaCausas WHERE estatusCau = 'En Atención'");
	while ($licEnAten = $csEnAten->fetchArray()) { $cuantosEnAten = $licEnAten['cuantosEnAten']; }

$csBajos = $con -> query("SELECT COUNT(calificacionCau) AS cuantosBajo FROM listaCausas WHERE calificacionCau <= 10");
	while ($liCBajos = $csBajos->fetchArray()) { $cuantosBajo = $liCBajos['cuantosBajo']; }

$csMedios = $con -> query("SELECT COUNT(calificacionCau) AS cuantosMedio FROM listaCausas WHERE calificacionCau > 10 AND calificacionCau <= 20");
	while ($liCMedios = $csMedios->fetchArray()) { $cuantosMedio = $liCMedios['cuantosMedio']; }

$csAltos = $con -> query("SELECT COUNT(calificacionCau) AS cuantosAlto FROM listaCausas WHERE calificacionCau > 20 AND calificacionCau <= 30");
	while ($liCAltos = $csAltos->fetchArray()) { $cuantosAlto = $liCAltos['cuantosAlto']; }

$csCriticos = $con -> query("SELECT COUNT(calificacionCau) AS cuantosCritico FROM listaCausas WHERE calificacionCau > 30");
	while ($liCCriticos = $csCriticos->fetchArray()) { $cuantosCritico = $liCCriticos['cuantosCritico']; }
	
$con -> close();						

 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/sweetalert2.min.css">
	<link rel="stylesheet" href="../css/sistema.css">
	<style>
		a:link {
			text-decoration:none;
			}
		.btnAnimado:hover {
                background-color: #FFF4F4;
                transition: all 500ms ease;
            }
        .btnAnimado {
                transition: all 500ms ease;
            }
	</style>
 	<title>Menu</title>
 </head>
 <body style="background-color: #E5E5E5;">

 		<div id="app" class="container-fluid" <?php echo $ocultar; ?>>
			<div class="row">
				<?php include 'barraNavega.php'; ?>

				<div class="col-12 mx-auto" style="background: linear-gradient(180deg, #E30016 0%, #E30016 70%, #E5E5E5 70%, #E5E5E5 100%);">
					<div class="row">
						<div class="col-md-8 col-lg-5 mx-auto m-5">
							<div class="my-3">
								<h2 class="text-white">¡Hola! <?php echo $nombre; ?></h2>

								<div class="row mt-5">

									<div class="col-md-6 my-2 mx-auto text-dark">
										<?php 

										if ($tipoUsuario === '1') {
											echo '

											<a href="../matrizRiesgosA/tabla.app" class="card btnAnimado">
												<div class="card-body text-center">
													<div class="row d-flex justify-content-center align-items-center" style="height: 170px;">
														<div class="col-12">
															<img src="../img/menu/matriz.svg" style="width: 50%;">
														</div>
														<div class="col-12">
															<h5 class="card-title text-muted" style="font-size: .9em;">Matriz de Riesgos</h5>
														</div>													
													</div>
													
												</div>
											</a>


											';
										}else{

											echo '

											<a href="../matrizRiesgos/tabla.app" class="card btnAnimado">
												<div class="card-body text-center">
													<div class="row d-flex justify-content-center align-items-center" style="height: 170px;">
														<div class="col-12">
															<img src="../img/menu/matriz.svg" style="width: 50%;">
														</div>
														<div class="col-12">
															<h5 class="card-title text-muted" style="font-size: .9em;">Matriz de Riesgos</h5>
														</div>													
													</div>
													
												</div>
											</a>


											';

										}

										 ?>
										
									</div>
									<div class="col-md-6 my-2 mx-auto text-dark">
										<a href="../proceso/pro.app" class="card btnAnimado">
											<div class="card-body text-center">
												<div class="row d-flex justify-content-center align-items-center" style="height: 170px;">
													<div class="col-12">
														<img src="../img/menu/agregarRiesgo.svg" style="width: 50%;">
													</div>
													<div class="col-12">
														<h5 class="card-title text-muted" style="font-size: .9em;">Identificación de Riesgos</h5>
													</div>													
												</div>
												
											</div>
										</a>
									</div>
									
								</div>

								
							</div>

						</div>
					</div>

					<?php

					if ($tipoUsuario === '1') {
						echo '

						<div class="row">
							<div class="col-12">
								<div class="card" style="min-height: 500px;">
									<div class="card-body">
										<div class="list-group">
											<h5 class="card-title">Gráficas</h5>
											<div class="list-group-item mx-2 mb-3 p-0">
												<div class="row">
													<div class="col-md-6 mx-auto my-3">
														<canvas id="gRiesgos" height="250px;"></canvas>
													</div>
													<div class="col-md-6 mx-auto my-3">
														<canvas id="gNivelRiesgo" height="250px;"></canvas>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						';
					}
					
					?>
								
				</div>
			</div>
		</div>

		<script src="../js/vue.js"></script>
		<script src="../js/axios.min.js"></script>
		<script src="../js/sweetalert2.min.js"></script>
		<script src="../js/chart.js"></script>
		<script>
			var ctx = document.getElementById('gRiesgos').getContext('2d');
			var chart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			    	labels: ['Riesgos'],
			        datasets: [

			        { label: 'Abierto', data: [<?php echo $cuantosAbiertos; ?>,0], backgroundColor: ['rgba(255,53,72,0.9)'],borderColor: ['rgba(255,53,72,1)'], borderWidth: 1},
			        { label: 'Cerrado', data: [<?php echo $cuantosCerrados; ?>,0], backgroundColor: ['rgba(1,200,81,0.9)'],borderColor: ['rgba(1,200,81,1)'], borderWidth: 1},
			        { label: 'En Atención', data: [<?php echo $cuantosEnAten; ?>,0], backgroundColor: ['rgba(255,187,52,0.9)'],borderColor: ['rgba(255,187,52,1)'], borderWidth: 1},

			        ]
			    }
			});

			var ctx = document.getElementById('gNivelRiesgo').getContext('2d');
			var chart = new Chart(ctx, {

			    type: 'bar',
			    data: {
			    	labels: ['Nivel de Riesgo'],
			        datasets: [

			        { label: 'Bajo', data: [<?php echo $cuantosBajo; ?>,0], backgroundColor: ['rgba(1,200,81,0.9)'],borderColor: ['rgba(1,200,81,1)'], borderWidth: 1},
			        { label: 'Moderado', data: [<?php echo $cuantosMedio; ?>,0], backgroundColor: ['rgba(255,255,0,0.9)'],borderColor: ['rgba(255,255,0,1)'], borderWidth: 1},
			        { label: 'Alto', data: [<?php echo $cuantosAlto; ?>,0], backgroundColor: ['rgba(255,187,52,0.9)'],borderColor: ['rgba(255,187,52,1)'], borderWidth: 1},
			        { label: 'Critico', data: [<?php echo $cuantosCritico; ?>,0], backgroundColor: ['rgba(255,53,72,0.9)'],borderColor: ['rgba(255,53,72,1)'], borderWidth: 1},

			        ]
			    }
			});
		</script>
 	
 </body>
 </html>