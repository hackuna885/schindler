		Vue.component('procesos',{
			template: /*html*/
			`
			<div>
				<table class="my-4">
					<tr>
						<td>
							<input type="text" class="form-control" placeholder="Nuevo Proceso" v-model="nuevoProceso"/>
						</td>
						<td>
							<span v-if="nuevoProceso === ''">
								<button class="btn btn-primary" disabled><img src="../img/icons/agregar.svg"> Agregar</button>
							</span>
							<span v-else>
								<button class="btn btn-primary" @click="agregarProcesos"><img src="../img/icons/agregar.svg"> Agregar</button>
							</span>
						</td>
					</tr>
				</table>

				<div class="card" style="min-height: 500px;">
					<div class="card-body">
						<h5 class="card-title">Lista de Procesos</h5>
						<div class="list-group" v-for="listPro of procesos">
							<div class="list-group-item">
								<div class="row">
									<a :href="'../procedimiento/pro.app?nomProceso='+listPro.proceso" class="col-8 list-group-item-action">
										<h5 class="mb-1">{{listPro.proceso}}</h5>
										<small><i>{{listPro.area}} - {{listPro.idUsuario}}</i><br>{{listPro.fechaHoraReg}}</small>
							    	</a>
							    	<div class="col-4">
							    		<div class="text-center">
							    			<button class="btn btn-primary" @click="btnEditar(listPro.id,listPro.proceso)"><img src="../img/icons/editar.svg"></button>
							    			<button class="btn btn-secondary" @click="btnEliminar(listPro.id, listPro.proceso)"><img src="../img/icons/borrar.svg"></button>
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
					titulo: 'Identificación de Riesgos y Oportunidades',
					procesos: [],
					nuevoProceso: '',
					proceso: '',
					area: '',
					idUsuario: '',
					fechaHoraReg: ''
				}
			},
			methods: {

				btnEditar: async function(id, proceso){
					await Swal.fire({
			        title: 'EDITAR',
			        html:
			        '<div class="form-group"><div class="row"><label class="col-sm-3 col-form-label">Proceso</label><div class="col-sm-7"><input id="proceso" value="'+proceso+'" type="text" class="form-control"></div></div></div>', 
			        focusConfirm: false,
			        showCancelButton: true,                         
			        }).then((result) => {
			          if (result.value) {                                             
			            proceso = document.getElementById('proceso').value                  
			            
			            this.editarProcesos(id,proceso);
			            Swal.fire(
			              '¡Actualizado!',
			              'El registro ha sido actualizado.',
			              'success'
			            )                  
			          }
			        });

				},

				btnEliminar: function(id, proceso){
					Swal.fire({
			          title: '¿Está seguro de borrar el registro: '+proceso+" ?",         
			          type: 'warning',
			          showCancelButton: true,
			          confirmButtonColor:'#d33',
			          cancelButtonColor:'#3085d6',
			          confirmButtonText: 'Borrar'
			        }).then((result) => {
			          if (result.value) {            
			            this.borrarProcesos(id);             
			            //y mostramos un msj sobre la eliminación  
			            Swal.fire(
			              '¡Eliminado!',
			              'El registro ha sido borrado.',
			              'success'
			            )
			          }
			        })

				},


				listaProcesos () {
			        axios.post('../listaProcesos/crud.app', {opcion:4}).then(response =>{
			           this.procesos = response.data;
			        });
			    },

			    //Procedimiento CREAR.
			    agregarProcesos () {
			        axios.post('../listaProcesos/crud.app', {opcion:1, proceso:this.nuevoProceso, area:this.area, idUsuario:this.idUsuario, fechaHoraReg:this.fechaHoraReg}).then(response =>{
			            this.listaProcesos();
			        });        
			         this.nuevoProceso = "",
			         this.area = "",
			         this.idUsuario = "",
			         this.fechaHoraReg = ""

			    },

			    //Procedimiento EDITAR.
			    editarProcesos (id, proceso, procedimiento, descripDelRiesgo, factDeRiesgo) {       
			       axios.post('../listaProcesos/crud.app', {opcion:2, id:id, proceso:proceso, procedimiento:procedimiento, descripDelRiesgo:descripDelRiesgo, factDeRiesgo:factDeRiesgo }).then(response =>{           
			           this.listaProcesos();           
			        });                              
			    },

			    //Procedimiento BORRAR.
			    borrarProcesos (id) {
			        axios.post('../listaProcesos/crud.app', {opcion:3, id:id}).then(response =>{           
			            this.listaProcesos();
			            });
			    }
			},
			created() {            
			   this.listaProcesos();            
			},

		});


		new Vue({
			el: '#app'
		});