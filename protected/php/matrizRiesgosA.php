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
 	<title>Matriz Riesgos</title>
 	<style>
 		.bg-amarillo {
 			background-color: #FFFF00;
		    color: #000;
 		}
 	</style>
 </head>
 <body style="background-color: #E5E5E5;">
 	<div id="app" class="container-fluid" <?php echo $ocultar; ?>>
			<div class="row">
				<div class="col-12 mx-auto bg-white">
					<nav class="navbar navbar-light">
						<a class="navbar-brand" href="#">
							<img src="../img/logo.svg" width="100" class="d-inline-block align-top">
						</a>
						<form class="form-inline my-2 my-lg-0">
							<span class="navbar-text mx-2">
								<img src="../img/icons/login.svg">
								Usuario
							</span>
							<a href="../index.php" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Salir</a>
					    </form>
					</nav>
				</div>
				<div class="col-12 mx-auto" style="background-color: #3D3D3D;">
					<div class="row">
						<div class="col-md-11 mx-auto m-5">
							<div class="my-3">
								<h2 class="text-white">Matriz de Riesgos y Oportunidades</h2>


								<div class="card mt-5" style="min-height: 500px;">
									<div class="card-body">
										
										<div class="list-group">

											<?php 

											$con = new SQLite3("../data/riesgos.db");

											$procesos = $con -> query("SELECT area,proceso FROM listaProcesos GROUP BY area,proceso ORDER BY area");

											while ($liPro = $procesos->fetchArray()) {
												$areaPro = $liPro['area'];
												$procesoPro = $liPro['proceso'];

												echo '

											<h5 class="card-title">Area: '.$areaPro.'</h5>
											<h6 class="ml-1">Proceso: '.$procesoPro.'</h6>
											<div class="list-group-item mx-2 mb-3 p-0 overflow-auto ">
												<div class="" style="font-size: .7em;">
														<table class="">
															<thead class="text-white bg-primary">
																<tr>
																	<th class="p-2" style="width: 200px;">Procedimiento</th>
																	<th class="p-2" style="width: 300px;">Descripción del Riesgo</th>
																	<th class="p-2" style="width: 200px;">Factor de Riesgo</th>
																	<th class="p-2" style="width: 200px;">Causa o Raíz</th>
																	<th class="p-2" style="width: 150px;">Consecuencia</th>
																	<th class="p-2" style="width: 150px;">Probabilidad</th>
																	<th class="p-2" style="width: 150px;">Impacto</th>
																	<th class="p-2" style="width: 150px;">Calificación del Riesgo</th>
																	<th class="p-2" style="width: 100px;">Estatus</th>
																	<th class="p-2" style="width: 300px;">Fecha de Identificación del Riesgo</th>
																	<th class="p-2" style="width: 300px;">Nombre del Responsable de Atención del Riesgo</th>
																	<th class="p-2" style="width: 300px;">Acciones de Mitigación</th>
																</tr>
															</thead>
															<tbody>
															';


												$procedimientos = $con -> query("SELECT procedimientoPro,descripDelRiesgoPro,factDeRiesgoPro FROM listaProcedimientos WHERE procesoPro = '$procesoPro' AND areaPro ='$areaPro' ORDER BY procedimientoPro");

												while ($liProced = $procedimientos->fetchArray()) {
													$procedimientoPro = $liProced['procedimientoPro'];
													$descripDelRiesgoPro = $liProced['descripDelRiesgoPro'];
													$factDeRiesgoPro = $liProced['factDeRiesgoPro'];




												echo'
																<tr>
																	<td class="p-2">'.$procedimientoPro.'</td>
																	<td class="p-2">'.$descripDelRiesgoPro.'</td>
																	<td class="p-2">'.$factDeRiesgoPro.'</td>
												';

												
												$causas = $con -> query("SELECT causaCau,consecuenciaCau,probabilidadCau,impactoCau,calificacionCau,estatusCau,fechaIdentCau,nombreCau,accionesCau FROM listaCausas WHERE procedimientoCau = '$procedimientoPro' AND areaCau ='$areaPro' ORDER BY causaCau");

												$i= 0;

												while ($liPCau = $causas->fetchArray()) {
													$causaCau = $liPCau['causaCau'];
													$consecuenciaCau = $liPCau['consecuenciaCau'];
													$probabilidadCau = $liPCau['probabilidadCau'];
													$impactoCau = $liPCau['impactoCau'];
													$calificacionCau = $liPCau['calificacionCau'];
													$estatusCau = $liPCau['estatusCau'];
													$fechaIdentCau = $liPCau['fechaIdentCau'];
													$nombreCau = $liPCau['nombreCau'];
													$accionesCau = $liPCau['accionesCau'];
													$i++;

													//COLOR DE CELDA

													if ($calificacionCau <= 10) {
														$colorCelda = 'class="p-2 bg-success text-center text-white"';
													} elseif ($calificacionCau > 10 && $calificacionCau <= 20) {
														$colorCelda = 'class="p-2 bg-amarillo text-center"';
													} elseif ($calificacionCau > 20 && $calificacionCau <= 30) {
														$colorCelda = 'class="p-2 bg-warning text-center"';
													} else{
														$colorCelda = 'class="p-2 bg-danger text-center text-white"';
													}

													//SI TIENE MAS UNA CAUSA

														if ($i > 1) {
															echo '
																	<tr>
																		<td class="p-2"></td>
																		<td class="p-2"></td>
																		<td class="p-2"></td>
																		<td class="p-2">'.$causaCau.'</td>
																		<td class="p-2">'.$consecuenciaCau.'</td>
																		<td class="p-2 text-center">'.$probabilidadCau.'</td>
																		<td class="p-2 text-center">'.$impactoCau.'</td>
																		<td '.$colorCelda.'>'.$calificacionCau.'</td>
																		<td class="p-2">'.$estatusCau.'</td>
																		<td class="p-2">'.$fechaIdentCau.'</td>
																		<td class="p-2">'.$nombreCau.'</td>
																		<td class="p-2">'.$accionesCau.'</td>
																	</tr>
															';
														}else{

															echo'
																		<td class="p-2">'.$causaCau.'</td>
																		<td class="p-2">'.$consecuenciaCau.'</td>
																		<td class="p-2 text-center">'.$probabilidadCau.'</td>
																		<td class="p-2 text-center">'.$impactoCau.'</td>
																		<td '.$colorCelda.'>'.$calificacionCau.'</td>
																		<td class="p-2">'.$estatusCau.'</td>
																		<td class="p-2">'.$fechaIdentCau.'</td>
																		<td class="p-2">'.$nombreCau.'</td>
																		<td class="p-2">'.$accionesCau.'</td>
																	</tr>
															';
														}
													}
												}
													echo'

															</tbody>
														</table>
												</div>												
										    </div>

												';
											}

											 ?>


											<!-- <h5 class="card-title">Area:</h5>
											<h6 class="ml-1">Proceso:</h6>
											<div class="list-group-item mx-2 mb-3 p-0 overflow-auto ">
												<div class="" style="font-size: .7em;">
														<table class="">
															<thead class="text-white bg-secondary">
																<tr>
																	<th class="p-2" style="width: 200px;">Procedimiento</th>
																	<th class="p-2" style="width: 300px;">Descripción del Riesgo</th>
																	<th class="p-2" style="width: 200px;">Factor de Riesgo</th>
																	<th class="p-2" style="width: 200px;">Causa o Raíz</th>
																	<th class="p-2" style="width: 150px;">Consecuencia</th>
																	<th class="p-2" style="width: 150px;">Probabilidad</th>
																	<th class="p-2" style="width: 150px;">Impacto</th>
																	<th class="p-2" style="width: 150px;">Calificación del Riesgo</th>
																	<th class="p-2" style="width: 100px;">Estatus</th>
																	<th class="p-2" style="width: 300px;">Fecha de Identificación del Riesgo</th>
																	<th class="p-2" style="width: 300px;">Nombre del Responsable de Atención del Riesgo</th>
																	<th class="p-2" style="width: 300px;">Acciones de Mitigación</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																	<td class="p-2"></td>
																</tr>
															</tbody>
														</table>
												</div>												
										    </div> -->

										    
										</div>

									</div>
								</div>


							</div>

						</div>
					</div>

					<div class="col-md-8 col-lg-5 mx-auto mb-5">
						<div class="row my-4">
							<div class="col-md-6 mx-auto my-2">
								<a href="../menu/inicio.app" class="btn btn-secondary form-control d-flex justify-content-center align-items-center" style="height: 50px;"><img src="../img/icons/regresar.svg" class="mx-1">Regresar</a>
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
 	
 </body>
 </html>