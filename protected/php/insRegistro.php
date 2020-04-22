<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
include 'info.php';


############### Inicia Compro de Campos ###############

if (isset($_POST['txtNombre']) && !empty($_POST['txtNombre']) &&
	isset($_POST['optArea']) && !empty($_POST['optArea']) &&
	isset($_POST['optUsr']) && !empty($_POST['optUsr']) &&
	isset($_POST['txtCorreo']) && !empty($_POST['txtCorreo']) &&
	isset($_POST['txtPassUno']) && !empty($_POST['txtPassUno']) &&
	isset($_POST['txtPassDos']) && !empty($_POST['txtPassDos'])) {

	$nombre = $_POST['txtNombre'];
	$area = $_POST['optArea'];
	$tipoUsr = $_POST['optUsr'];
	$correo = $_POST['txtCorreo'];
	$pwUno = $_POST['txtPassUno'];
	$pwDos = $_POST['txtPassDos'];


	if ($pwUno === $pwDos) {

		$nombre = mb_strtoupper($nombre, 'UTF-8');
		$usrCryptPre = md5($nombre);
		$area = mb_strtoupper($area, 'UTF-8');
		$correoMD5 = md5($correo);
		$pwCode = md5($pwUno);

		$varNavega = $info["browser"];	
		$varVersio = $info["version"];
		$varSitemaO = $info["os"];
		$fechaCap = date("d-m-Y");
		$horaCap = date("g:i:s a");
		$fechaHoraReg = $fechaCap.' '.$horaCap;

		

		$resBus = '';

		$con = new SQLite3("../data/riesgos.db");
		$busCorreo = $con -> query("SELECT correoMd5 FROM registroUsr WHERE correoMd5 = '$usrCryptPre'");

			while ($usrCrypt = $busCorreo->fetchArray()) {
				$resBus = $usrCrypt['correoMd5'];
			}

		if ($resBus === $correoMD5) {

			echo "<script> window.location='../../error/alerta.aspx?error=correoRegistrado&idCorreo=".$_POST['txtCorreo']."';</script>";

			$con -> close();

		}else{

			$cs = $con -> query("INSERT INTO registroUsr (nombre, userMd5, area, correo, correoMd5, password, passDecrypt, usrNavega, usrSO, usrVerSO, usrFechaHoraReg, tipoUsuario, usrActivo) VALUES ('$nombre', '$usrCryptPre', '$area', '$correo', '$correoMD5','$pwUno', '$pwCode', '$varNavega', '$varVersio', '$varSitemaO', '$fechaHoraReg', '$tipoUsr', 1)");

			$con -> close();

			echo "<script> window.location='../../mail/confirmacion.aspx';</script>";
		}
		

		
	}else{
		echo "<script> window.location='../../error/alerta.aspx?error=pswNoCoincide';</script>";
	}

}else{
	echo "<script> window.location='../../error/alerta.aspx?error=404';</script>";
}

############### Termina Compro de Campos ###############

?>