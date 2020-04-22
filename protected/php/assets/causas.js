Vue.component('causas',{
	template: /*html*/
	`
									<div class="row text-white">
										<div class="col-md-8 my-2 order-1 order-md-1">
											<label>Causa o Raíz</label>
											<input type="text" class="form-control" placeholder="Causa o Raíz..." v-model="nCausa"/>
											<small class="form-text">Nombre de la Causa o Raíz</small>
										</div>
										<div class="col-md-4 my-2 d-flex justify-content-center align-items-center order-11 order-md-2" style="height: 100px;" v-if="nCausa === ''">
											<button class="btn btn-primary form-control d-flex justify-content-center align-items-center" style="height: 50px;" disabled><img src="../img/icons/agregar.svg"> Agregar</button>
										</div>
										<div class="col-md-4 my-2 d-flex justify-content-center align-items-center order-11 order-md-2" style="height: 100px;" v-else>
											<button class="btn btn-primary form-control d-flex justify-content-center align-items-center" style="height: 50px;" @click="agregarCausa"><img src="../img/icons/agregar.svg"> Agregar</button>
										</div>
										<div class="col-md-6 my-2 order-3 order-md-3">
											<label>Consecuencia</label>
											<select class="form-control" v-model="nConsecuencia">
												<option value="" selected>---------</option>
												<option v-for="consec of optConsec" :value="consec">{{consec}}</option>
											</select>
											<small class="form-text">Selecciona una opción</small>
										</div>
										
										<div class="col-md-3 my-2 order-4 order-md-4">
											<label>Probabilidad</label>
											<select class="form-control" v-model="nProbabilidad">
												<option value="" selected>---------</option>
												<option v-for="prob of optProbabilidad" :value="prob">{{prob}}</option>
											</select>
											<small class="form-text">Selecciona una opción</small>
										</div>

										<div class="col-md-3 my-2 order-5 order-md-5">
											<label>Impacto</label>
											<select class="form-control" v-model="nImpacto">
												<option value="" selected>---------</option>
												<option v-for="impact of optImpacto" :value="impact">{{impact}}</option>
											</select>
											<small class="form-text">Selecciona una opción</small>
										</div>

										<div class="col-md-12 my-2 order-6 order-md-6">
											<label>Calificación del Riesgo</label>
											<div class="row">
												<div class="col-6 mx-auto text-center rounded my-3" :class="colorCalificacion" style="height: 50px;">
													<b style="font-size: 2em;">{{calcCalificacion}}</b>
												</div>
											</div>
										</div>
										<div class="col-md-5 my-2 order-7 order-md-7">
											<label>Estatus</label>
											<select class="form-control" v-model="nEstatus">
												<option value="" selected>---------</option>
												<option v-for="estatus of optEstatus" :value="estatus">{{estatus}}</option>
											</select>
											<small class="form-text">Selecciona una opción</small>
										</div>
										<div class="col-md-7 my-2 order-8 order-md-8">
											<label>Fecha de Identificación</label>
											<input type="date" class="form-control" placeholder="Identificación..." v-model="nFechaIdent"/>
											<small class="form-text">Fecha de Identificación del Riesgo</small>
										</div>
										<div class="col-md-6 my-2 order-9 order-md-9">
											<label>Nombre del Responsable</label>
											<input type="text" class="form-control" placeholder="Responsable..." v-model="nNombre"/>
											<small class="form-text">Responsable de Atención del Riesgo</small>
										</div>
										<div class="col-md-6 my-2 order-10 order-md-10">
											<label>Acciones de Mitigación</label>
											<input type="text" class="form-control" placeholder="Acciones..." v-model="nAcciones"/>
											<small class="form-text">Escribe una Acciones</small>
										</div>

										<div class="col-12 my-2 mx-auto order-12 order-md-12 text-dark">
											<div class="card" style="min-height: 500px;">
												<div class="card-body">
													<h5 class="card-title">Lista Causa o Raíz</h5>
													<div class="list-group" v-for="liCau of causas">
														<div class="list-group-item">
													    	<div class="row">
													    		<div class="col-8">
														    		<h5 class="mb-1">{{liCau.causaCau}}</h5>
														    		<p class="mb-1" style="font-size: .9em">└─<b class="mx-1">Consecuencia: </b>{{liCau.consecuenciaCau}}</p>
														    		<p class="mb-1" style="font-size: .9em">└─<b class="mx-1">Probabilidad: </b>{{liCau.probabilidadCau}}</p>
														    		<p class="mb-1" style="font-size: .9em">└─<b class="mx-1">Impacto: </b>{{liCau.impactoCau}}</p>
														    		<p class="mb-1" :class="[{'bg-success text-white': liCau.calificacionCau <= 10}, {'bg-amarillo': liCau.calificacionCau > 10 && liCau.calificacionCau <= 20}, {'bg-warning text-white': liCau.calificacionCau > 20 && liCau.calificacionCau <= 30}, {'bg-danger text-white': liCau.calificacionCau > 30}]" style="font-size: .9em">└─<b class="mx-1">Calificación: </b>{{liCau.calificacionCau}}</p>
														    		<p class="mb-1" style="font-size: .9em">└─<b class="mx-1">Estatus: </b>{{liCau.estatusCau}}</p>
														    		<p class="mb-1" style="font-size: .9em">└─<b class="mx-1">Fecha de Identificación: </b>{{liCau.fechaIdentCau}}</p>
														    		<p class="mb-1" style="font-size: .9em">└─<b class="mx-1">Responsable: </b>{{liCau.nombreCau}}</p>
														    		<p class="mb-1" style="font-size: .9em">└─<b class="mx-1">Acciones: </b>{{liCau.accionesCau}}</p>
															    	<small><i>{{liCau.areaCau}}-{{liCau.idUsuarioCau}}</i><br>{{liCau.fechaHoraRegCau}}</small>
													    		</div>
														    	<div class="col-4">
														    		<div class="text-center">
																	    <button class="btn btn-primary" @click="btnEditar(liCau.id, liCau.causaCau, liCau.consecuenciaCau, liCau.probabilidadCau, liCau.impactoCau, liCau.estatusCau, liCau.fechaIdentCau, liCau.nombreCau, liCau.accionesCau)"><img src="../img/icons/editar.svg"></button>
																	    <button class="btn btn-secondary" @click="btnEliminar(liCau.id, liCau.causaCau)"><img src="../img/icons/borrar.svg"></button>
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
	data () {
		return{

					causas: [],
					optConsec: [
						'Ambiental',
						'Económica',
						'Imagen',
						'Legales o Normativa',
						'Operativa',
						'Otros'
					],
					optProbabilidad: [2,5,7,9],
					optImpacto: [2,4,6],
					optEstatus: ['Abierto','Cerrado','En Atención'],
					causaCau: '',
					consecuenciaCau: '',
					probabilidadCau: '',
					impactoCau: '',
					calificacionCau: '',
					estatusCau: '',
					fechaIdentCau: '',
					nombreCau: '',
					accionesCau: '',
					fechaHoraRegCau: '',

					nCausa: '',
					nConsecuencia: '',
					nProbabilidad: '',
					nImpacto: '',
					nCalificacion: 0,
					nEstatus: '',
					nFechaIdent: '',
					nNombre: '',
					nAcciones: '',

		}
	},

	methods: {

					btnEditar: async function(id,causaCau,consecuenciaCau,probabilidadCau,impactoCau,estatusCau,fechaIdentCau,nombreCau,accionesCau){
						await Swal.fire({
				        title: 'EDITAR',
				        html:
				        '<div class ="form-group"><div class="row"><div class="col-md-6 mx-auto"><label>Causa o Raíz</label><input id="causaCau" value="'+causaCau+'" type="text" class="form-control"></div><div class="col-md-6 mx-auto"><label>Consecuencia</label><select class="form-control" id="consecuenciaCau"><option value="'+consecuenciaCau+'" selected>'+consecuenciaCau+'</option><option value="">---------</option><option value="Ambiental">Ambiental</option><option value="Económica">Económica</option><option value="Imagen">Imagen</option><option value="Legales o Normativa">Legales o Normativa</option><option value="Operativa">Operativa</option><option value="Otros">Otros</option></select></div></div></div><div class="form-group"><div class="row"></div></div><div class="form-group"><div class="row"><div class="col-md-3 mx-auto"><label>Probabilidad</label><select class="form-control" id="probabilidadCau"><option value="'+probabilidadCau+'" selected>'+probabilidadCau+'</option><option value="">---------</option><option value="2">2</option><option value="5">5</option><option value="7">7</option><option value="9">9</option></select></div><div class="col-md-3 mx-auto"><label>Impacto</label><select class="form-control" id="impactoCau"><option value="'+impactoCau+'" selected>'+impactoCau+'</option><option value="">---------</option><option value="2">2</option><option value="4">4</option><option value="6">6</option></select></div><div class="col-md-6 mx-auto"><label>Estatus</label><select class="form-control" id="estatusCau"><option value="'+estatusCau+'" selected>'+estatusCau+'</option><option value="">---------</option><option value="Abierto">Abierto</option><option value="Cerrado">Cerrado</option><option value="En Atención">En Atención</option></select></div></div></div><div class="form-group"><div class="row"><div class="col-md-6 mx-auto"><label>Fecha de Identificación</label><input id="fechaIdentCau" value="'+fechaIdentCau+'" type="date" class="form-control"></div><div class="col-md-6 mx-auto"><label>Nombre del Responsable</label><input id="nombreCau" value="'+nombreCau+'" type="text" class="form-control"></div></div></div><div class="form-group"><div class="row"><div class="col-md-6"><label>Acciones de Mitigación</label><input id="accionesCau" value="'+accionesCau+'" type="text" class="form-control"></div></div></div>', 
				        focusConfirm: false,
				        showCancelButton: true,                         
				        }).then((result) => {
				          if (result.value) {
				            causaCau = document.getElementById('causaCau').value,
				            consecuenciaCau = document.getElementById('consecuenciaCau').value,
				            probabilidadCau = document.getElementById('probabilidadCau').value
				            impactoCau = document.getElementById('impactoCau').value,
				            estatusCau = document.getElementById('estatusCau').value,
				            fechaIdentCau = document.getElementById('fechaIdentCau').value,
				            nombreCau = document.getElementById('nombreCau').value,
				            accionesCau = document.getElementById('accionesCau').value
				            
				            this.editarCausa(id,causaCau,consecuenciaCau,probabilidadCau,impactoCau,estatusCau,fechaIdentCau,nombreCau,accionesCau);
				            Swal.fire(
				              '¡Actualizado!',
				              'El registro ha sido actualizado.',
				              'success'
				            )                  
				          }
				        });

					},

					btnEliminar: function(id, causaCau){
						Swal.fire({
				          title: '¿Está seguro de borrar el registro: '+causaCau+" ?",         
				          type: 'warning',
				          showCancelButton: true,
				          confirmButtonColor:'#d33',
				          cancelButtonColor:'#3085d6',
				          confirmButtonText: 'Borrar'
				        }).then((result) => {
				          if (result.value) {            
				            this.borrarCausa(id);             
				            //y mostramos un msj sobre la eliminación  
				            Swal.fire(
				              '¡Eliminado!',
				              'El registro ha sido borrado.',
				              'success'
				            )
				          }
				        })

					},

					listaCausa () {
				        axios.post('../listaCausas/crud.app', {opcion:4}).then(response =>{
				           this.causas = response.data;
				        });
				    },

					//Procedimiento CREAR.
				    agregarCausa () {
				        axios.post('../listaCausas/crud.app', {opcion:1, causaCau:this.nCausa, consecuenciaCau:this.nConsecuencia, probabilidadCau:this.nProbabilidad, impactoCau:this.nImpacto, calificacionCau:this.nCalificacion, estatusCau:this.nEstatus, fechaIdentCau:this.nFechaIdent, nombreCau:this.nNombre, accionesCau:this.nAcciones}).then(response =>{
				            this.listaCausa();
				        });
				         this.nCausa = "",
				         this.nConsecuencia = "",
				         this.nProbabilidad = "",
				         this.nImpacto = "",
				         this.nCalificacion = "",
				         this.nEstatus = "",
				         this.nFechaIdent = "",
				         this.nNombre = "",
				         this.nAcciones = ""
				    },

				    //Procedimiento EDITAR.
				    editarCausa (id,causaCau,consecuenciaCau,probabilidadCau,impactoCau,estatusCau,fechaIdentCau,nombreCau,accionesCau) {       
				       axios.post('../listaCausas/crud.app', {opcion:2, id:id, causaCau:causaCau, consecuenciaCau:consecuenciaCau, probabilidadCau:probabilidadCau, impactoCau:impactoCau, estatusCau:estatusCau, fechaIdentCau:fechaIdentCau, nombreCau:nombreCau, accionesCau:accionesCau}).then(response =>{           
				           this.listaCausa();
				        });                              
				    },

				    //Procedimiento BORRAR.
				    borrarCausa (id) {
				        axios.post('../listaCausas/crud.app', {opcion:3, id:id}).then(response =>{           
				            this.listaCausa();
				            });
				    }
										

	},

	created() {            
					   this.listaCausa();
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
	}


})

new Vue({
	el: '#app'
})