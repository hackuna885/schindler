<?php 
if ($tipoUsuario === '1') {
	$tUsr = 'Administador';
}else{
	$tUsr = 'Usuario';
}

echo '


				<div class="col-12 mx-auto bg-white">
					<nav class="navbar navbar-light">
						<a class="navbar-brand" href="#">
							<img src="../img/logo.svg" width="100" class="d-inline-block align-top">
						</a>
						<form class="form-inline my-2 my-lg-0">
							<span class="navbar-text mx-2">
								<img src="../img/icons/login.svg">
								'.$tUsr.'
							</span>
							<a href="../index.php" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Salir</a>
					    </form>
					</nav>
				</div>

';


 ?>