<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">
	<title>Schindler Mexico</title>
</head>
<body class="fondo">
	<div id="app" class="container-fluid">
			<div class="row d-flex justify-content-center">
                    <div class="col-md-8 align-self-center">
                        <div class="animated fadeIn card mx-auto border-primary" style="width: 18rem;">
                            <img class="img-fluid" src="../img/logo.svg" class="card-img-top" alt="logo" style="width: 180px; margin:auto; padding-top: 20px;">
                            <div class="card-body">
                                <h5 class="card-title text-center text-primary">Agregar Usuario</h5>
                                <form action="insertar/insertar.app" method="POST" id="formulario">
                                	<input type="text" class="form-control my-3 border-primary formTransparente"  name="txtNombre" placeholder="Nombre de Usuario" required/>
                                	<select name="optArea" id="" class="form-control my-3" required>
                                		<option v-for="area of areas" :value="area">{{area}}</option>
                                	</select>
                                	<select name="optUsr" id="" class="form-control my-3" required>
                                        <option value="1">Administrador</option>
                                		<option value="2" selected>Usuario</option>
                                	</select>
                                    <input type="email" class="form-control my-3 border-primary formTransparente" name="txtCorreo" placeholder="Correo electrónico" required/>
                                    <input type="password" class="form-control my-3 border-primary formTransparente" name="txtPassUno" placeholder="Contraseña" v-model="pwUno" required/>
                                    <input type="password"  class="form-control my-3 border-primary formTransparente inactive" name="txtPassDos" placeholder="Confirmar contraseña" v-model="pwDos" required/>
                                    <span v-if="pwUno === pwDos && pwUno > ''">
                                    	<input type="submit" value="Agregar" class="btn form-control btn-primary" />
                                    </span>
                                    <span v-else>
                                    	<input type="submit" value="Agregar" class="btn form-control btn-primary" disabled="disabled"/>
                                    </span>
                                    
                                </form>
                                <br>
                                <a href=".." class="btn form-control btn-secondary">Regresar</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
	</div>
	<script src="../js/forms.js"></script>
	<script src="../js/vue.js"></script>
	<script>
	new Vue({
		el:'#app',
		data: {
			areas: [
                'Dirección de Finanzas',
                'Dirección de Instalaciones Existentes',
                'Dirección de Nuevas Instalaciones',
                'Dirección de Recursos Humanos',
                'Dirección General',
                'Dirección Técnica'
            ],
			pwUno: '',
			pwDos: '',
		}
	});
	</script>
</body>
</html>