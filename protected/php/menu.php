<?php 

include 'seguridad.php';

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

				<div class="col-12 mx-auto" style="background: linear-gradient(180deg, #E30016 0%, #E30016 50%, #E5E5E5 50%, #E5E5E5 98.96%);">
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
				</div>
			</div>
		</div>

		<script src="../js/vue.js"></script>
		<script src="../js/axios.min.js"></script>
		<script src="../js/sweetalert2.min.js"></script>
		<!-- <script src="assets/causas.js"></script> -->
		<script>
			new Vue({
				el: '#app'
			})
		</script>
 	
 </body>
 </html>