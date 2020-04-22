Vue.component('login', {
    template: /*html*/
        `
            <div>
            
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 align-self-center">
                        <div class="animated fadeIn card mx-auto border-primary" style="width: 18rem;">
                            <img class="img-fluid" src="img/logo.svg" style="width: 180px; margin:auto; padding-top: 20px;">
                            <div class="card-body">
                                <h5 class="card-title text-center text-primary">Inicia sesión</h5>
                                <form action="valida/usuarios.aspx" method="POST">
                                    <input class="form-control my-3 border-primary formTransparente" type="email" placeholder="Correo electrónico" name="txtUsr" v-model="correoUsr">
                                    <input class="form-control my-3 border-primary formTransparente" type="password" placeholder="Contraseña" name="txtPwd" minlength="3" v-model="passUsr">
                                    <span v-if="correoUsr != '' && passUsr != ''">
                                    <input type="submit" value="Iniciar sesión" class="btn form-control btn-primary">
                                    </span>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
				
			</div>
			`,
            data () {
                return{
                    correoUsr: '',
                    passUsr: ''
                }
            }
});

new Vue({
    el: '#app'
})