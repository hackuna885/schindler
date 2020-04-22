		Vue.component('procedimientos',{
			template: /*html*/
			`
			<div class="row text-white">
				<div class="col-md-8 my-2 order-1 order-md-1">
					<label>Procedimiento</label>
					<input type="text" class="form-control" placeholder="Procedimiento..." v-model="nProcedimiento">
					<small class="form-text">Nombre del procedimiento</small>
				</div>
				<div class="col-md-4 my-2 d-flex justify-content-center align-items-center order-4 order-md-2" style="height: 100px;" v-if="nProcedimiento === ''">
					<button class="btn btn-primary form-control d-flex justify-content-center align-items-center" style="height: 50px;" disabled><img src="../img/icons/agregar.svg"> Agregar</button>
				</div>
				<div class="col-md-4 my-2 d-flex justify-content-center align-items-center order-4 order-md-2" style="height: 100px;" v-else>
					<button class="btn btn-primary form-control d-flex justify-content-center align-items-center" style="height: 50px;" @click="agregarProcedimiento"><img src="../img/icons/agregar.svg"> Agregar</button>
				</div>
				<div class="col-md-8 my-2 order-2 order-md-2">
					<label>Descripción del Riesgo</label>
					<textarea cols="30" rows="3" class="form-control" placeholder="Riesgo..." v-model="nDescripDelRiesgo"></textarea>
					<small class="form-text">Breve descripción del riesgo</small>
				</div>
				<div class="col-md-4 my-2 order-3 order-md-3">
					<label>Factor de Riesgo</label>
					<select class="form-control" v-model="nfactDeRiesgoPro">
						<option value="" selected>---------</option>
						<option v-for="fact of optFact" :value="fact">{{fact}}</option>
					</select>
					<small class="form-text">Selecciona una opción</small>
				</div>

				<div class="col-12 my-2 mx-auto order-5 order-md-5 text-dark">
					<div class="card" style="min-height: 500px;">
						<div class="card-body">
							<h5 class="card-title">Lista de Procedimientos</h5>
							<div class="list-group" v-for="liPro of procedimientos">
								<div class="list-group-item">
							    	<div class="row">
							    		<a :href="'../causa/pro.app?nomProceso='+liPro.procesoPro+'&nomProcedimiento='+liPro.procedimientoPro" class="col-8 list-group-item-action">
								    		<h5 class="mb-1">{{liPro.procedimientoPro}}</h5>
								    		<p class="mb-1 text-secondary" style="font-size: .9em">└─<b class="mx-1">Descripción :</b>{{liPro.descripDelRiesgoPro}}</p>
								    		<p class="mb-1 text-secondary" style="font-size: .9em">└─<b class="mx-1">Factor:</b>{{liPro.factDeRiesgoPro}}</p>
									    	<small><i>{{liPro.areaPro}} - {{liPro.idUsuarioPro}}</i><br>{{liPro.fechaHoraRegPro}}</small>
							    		</a>
								    	<div class="col-4">
								    		<div class="text-center">
											    <button class="btn btn-primary" @click="btnEditar(liPro.id, liPro.procedimientoPro, liPro.descripDelRiesgoPro, liPro.factDeRiesgoPro)"><img src="../img/icons/editar.svg"></button>
											    <button class="btn btn-secondary" @click="btnEliminar(liPro.id, liPro.procedimientoPro)"><img src="../img/icons/borrar.svg"></button>
											</div>
								    	</div>
							    	</div>
							    </div>
							</div>
						</div>
					</div>
				</div>

			</div>

			
				

			`,
			data() {
				return {
					procedimientos: [],
					optFact: [
						'Económico',
						'Humano',
						'Infraestructura país',
						'Medioambiental',
						'Negocio',
						'Político',
						'Social',
						'Tecnológico'
					],
					procesoPro: '',
					procedimientoPro: '',
					descripDelRiesgoPro: '',
					factDeRiesgoPro: '',
					fechaHoraRegPro: '',

					nProcesoPro: '',
					nProcedimiento: '',
					nDescripDelRiesgo: '',
					nfactDeRiesgoPro: ''
				}
			},
			methods: {

					btnEditar: async function(id, procedimientoPro,descripDelRiesgoPro,factDeRiesgoPro){
						await Swal.fire({
				        title: 'EDITAR',
				        html:
				        '<div class="form-group"><div class="row"><label class="col-md-3 col-form-label">Procedimiento</label><div class="col-md-7"><input id="procedimientoPro" value="'+procedimientoPro+'" type="text" class="form-control"></div></div></div><div class="form-group"><div class="row"><label class="col-md-3 col-form-label">Descripción</label><div class="col-md-7"><input id="descripDelRiesgoPro" value="'+descripDelRiesgoPro+'" type="text" class="form-control"></div></div></div><div class="form-group"><div class="row"><label class="col-md-3 col-form-label">Factor</label><div class="col-md-7"><select class="form-control" id="factDeRiesgoPro"><option value="'+factDeRiesgoPro+'" selected>'+factDeRiesgoPro+'</option><option value="">---------</option><option value="Económico">Económico</option><option value="Humano">Humano</option><option value="Infraestructura país">Infraestructura país</option><option value="Medioambiental">Medioambiental</option><option value="Negocio">Negocio</option><option value="Político">Político</option><option value="Social">Social</option><option value="Tecnológico">Tecnológico</option></select></div></div></div>', 
				        focusConfirm: false,
				        showCancelButton: true,                         
				        }).then((result) => {
				          if (result.value) {
				            procedimientoPro = document.getElementById('procedimientoPro').value,
				            descripDelRiesgoPro = document.getElementById('descripDelRiesgoPro').value,
				            factDeRiesgoPro = document.getElementById('factDeRiesgoPro').value
				            
				            this.editarProcedimiento(id,procedimientoPro,descripDelRiesgoPro,factDeRiesgoPro);
				            Swal.fire(
				              '¡Actualizado!',
				              'El registro ha sido actualizado.',
				              'success'
				            )                  
				          }
				        });

					},

					btnEliminar: function(id, procedimientoPro){
						Swal.fire({
				          title: '¿Está seguro de borrar el registro: '+procedimientoPro+" ?",         
				          type: 'warning',
				          showCancelButton: true,
				          confirmButtonColor:'#d33',
				          cancelButtonColor:'#3085d6',
				          confirmButtonText: 'Borrar'
				        }).then((result) => {
				          if (result.value) {            
				            this.borrarProcedimiento(id);             
				            //y mostramos un msj sobre la eliminación  
				            Swal.fire(
				              '¡Eliminado!',
				              'El registro ha sido borrado.',
				              'success'
				            )
				          }
				        })

					},

					listaProcedimiento () {
				        axios.post('../listaProcedimientos/crud.app', {opcion:4}).then(response =>{
				           this.procedimientos = response.data;
				        });
				    },

					//Procedimiento CREAR.
				    agregarProcedimiento () {
				        axios.post('../listaProcedimientos/crud.app', {opcion:1, procedimientoPro:this.nProcedimiento, descripDelRiesgoPro:this.nDescripDelRiesgo, factDeRiesgoPro:this.nfactDeRiesgoPro}).then(response =>{
				            this.listaProcedimiento();
				        });
				         this.nProcedimiento = "",
				         this.nDescripDelRiesgo = "",
				         this.nfactDeRiesgoPro = ""
				    },

				    //Procedimiento EDITAR.
				    editarProcedimiento (id, procedimientoPro, descripDelRiesgoPro, factDeRiesgoPro) {       
				       axios.post('../listaProcedimientos/crud.app', {opcion:2, id:id, procedimientoPro:procedimientoPro, descripDelRiesgoPro:descripDelRiesgoPro, factDeRiesgoPro:factDeRiesgoPro}).then(response =>{           
				           this.listaProcedimiento();
				        });                              
				    },

				    //Procedimiento BORRAR.
				    borrarProcedimiento (id) {
				        axios.post('../listaProcedimientos/crud.app', {opcion:3, id:id}).then(response =>{           
				            this.listaProcedimiento();
				            });
				    }

					

			},

			created() {            
				   this.listaProcedimiento();
			},

			computed: {
					calcCalificacion (){
						this.nCalificacion = 0;
						this.nCalificacion = this.nProbabilidad * this.nImpacto;
						return this.nCalificacion;
					},
					colorCalificacion () {
	                    return {
	                        'bg-success': this.calcCalificacion <= 10,
	                        'bg-amarillo': this.calcCalificacion > 10 && this.calcCalificacion <= 20,
	                        'bg-warning': this.calcCalificacion > 20 && this.calcCalificacion <= 30,
	                        'bg-danger': this.calcCalificacion > 30,
	                    }
	                }
			},

		});


		new Vue({
			el: '#app'
		});