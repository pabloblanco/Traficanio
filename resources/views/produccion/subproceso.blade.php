@extends('layouts.app')

@section('content')
			
			<!--  modal input Stock click-->
				    <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-stock">
			          <div class="modal-dialog modal-md">
			            <div class="modal-content">
			              <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
			                </button>
			                <h4 class="modal-title" id="">Subprocesos</h4>
			              </div>
			              <div class="modal-body cuerpo-modal">
			                <form action="  " method="get" accept-charset="utf-8">
			                  <div class="form-group">
			                    <div class="row">
			                    	<div id="datamodal" class="col-md-12">
			                    		
			                    	</div>
			                    </div>                   
			                   
			                  </div>
			                </form>
			              </div>
			              <div class="modal-footer">
			              	<button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
			                <a type="button" id="cargarstock" data-dismiss="modal" class="btn btn-primary">Aceptar</a>
			              </div>
			            </div>
			          </div>
			        </div>
			<!-- /cerrar modals Stock input click-->

			<!--  modal Eliminar  -->
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-auto">
			  <div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
			        </button>
			        <h5 class="modal-title" id="myModalLabel2">Hay Procesos de preparacion de MP que requieren autorización para continuar por exceso.</h5>
			      </div>
			      
			    </div>
			  </div>
			</div>
			<!-- /modals eliminar norma-->

			<!--  modal Eliminar  -->
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-faltante">
			  <div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
			        </button>
			        <h5 class="modal-title" id="hfaltante"></h5>
			      </div>
			      
			      <div class="modal-footer">
			      	<button type="button" id="cancel_faltante" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
			        <button id="send_faltante" type="button" class="btn btn-primary">Aceptar</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /modals eliminar norma-->

			<!-- SECCION DE LOS MODALS-->
			<!--  modal modificar-->
			<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title" id="myModalLabel2">Modificar Información De Rechazo</h4>
						</div>
						<div class="modal-body cuerpo-modal">
							<form>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">N° De Orden</label>
											<input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Kilos</label>
											<input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Metros</label>
											<input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Cliente</label>
											<input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Fecha - Desde</label>
											<div class='input-group date' id='myDatepickerRechazoModalDesde'>
												<input type='text' class="form-control" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Fecha - Hasta</label>
											<div class='input-group date' id='myDatepickerRechazoModalHasta'>
												<input type='text' class="form-control" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 col-sm-9 col-xs-12 radio">
											<label>
												<input type="radio" class="flat" checked name="iCheck"> Todos
											</label>
											<label>
												<input type="radio" class="flat" checked name="iCheck"> Interno
											</label>
											<label>
												<input type="radio" class="flat" checked name="iCheck"> Externo
											</label>
										</div>
									</div>
								</div>

							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Guardar</button>
							<button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>

						</div>
					</div>
				</div>
			</div>
			<!-- /cerrar modals Bucar Modificar-->
			<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Procesos En Ejecución</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#">Settings 1</a>
												</li>
												<li><a href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="" role="tabpanel" data-example-id="togglable-tabs">
										<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
											<li role="presentation" class="active"><a href="#tab_content1" id="tabpreparacion" role="tab" data-toggle="tab" aria-expanded="true">Preparación MP</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content2" role="tab" id="tabhorno" data-toggle="tab" aria-expanded="false">Horno</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content3" role="tab" id="tabbatea" data-toggle="tab" aria-expanded="false">Batea</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content4" role="tab" id="tabpunta" data-toggle="tab" aria-expanded="false">Punta</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content5" role="tab" id="tabtrefila" data-toggle="tab" aria-expanded="false">Trefila</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content6" role="tab" id="tabenderezadora" data-toggle="tab" aria-expanded="false">Enderezadora</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content7" role="tab" id="tabcorte" data-toggle="tab" aria-expanded="false">Corte</a>
											</li>
										</ul>
										<div id="loader2"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
										<div id="myTabContent" class="tab-content">
											<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
												<div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
												<div class="table-responsive">
													<table class="table table-striped jambo_table bulk_action">
														<thead>
															<tr class="headings">
																<th>Ejecutar</th>
																<th class="column-title">Fecha</th>
																<th class="column-title">Cliente</th>
																<th class="column-title">Dia. Ext.</th>
																<th class="column-title">Espesor</th>
																<th class="column-title">Mts</th>
																<th class="column-title">Kgs </th>
																<th class="column-title">Piezas</th>
																<th class="column-title">Est. Fab.</th>
																<th class="column-title">N° Orden</th>
																<th class="column-title">Urgente</th>
																<th class="column-title">Proveedor</th>
																<th class="column-title">Dia. Ext.</th>
																<th class="column-title">Espesor</th>
																<th class="column-title">Tipo</th>
																<th class="column-title">Lg</th>
																<th class="column-title">Trazabilidad</th>
																<th class="column-title">Stock</th>
																<th class="column-title">Virgen</th>
																<th class="column-title">Kilos Total</th>
																<th class="column-title">Horno</th>
																<th class="column-title">Batea</th>
																<th class="column-title">A Repro</th>
																<th class="column-title">Cort.</th>
																<th class="column-title">Operario</th>
															</tr>
														</thead>
														<tbody id="bodymp">
															
														</tbody>
													</table>
												</div><br>
												
											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">		

												<div class="table-responsive">
													<table class="table table-striped jambo_table bulk_action">
														<thead>
															<tr class="headings">
																<th>Ejecutar</th>
																<th class="column-title">Fecha</th>
																<th class="column-title">Cliente</th>
																<th class="column-title">Dia. Ext.</th>
																<th class="column-title">Espesor</th>
																<th class="column-title">Mts</th>
																<th class="column-title">Kgs </th>
																<th class="column-title">Piezas</th>
																<th class="column-title">Est. Fab.</th>
																<th class="column-title">N° Orden</th>
																<th class="column-title">Urgente</th>
																<th class="column-title">Proveedor</th>
																<th class="column-title">Dia. Ext.</th>
																<th class="column-title">Espesor</th>
																<th class="column-title">Hora cargada por Medida</th>
																<th class="column-title">Caños por Camada</th>
																<th class="column-title">Largo del caño</th>
																<th class="column-title">Kg/Mt Camada</th>
																<th class="column-title">Kg por Camada</th>
																<th class="column-title">Kilos Total Lote</th>
																<th class="column-title">Entrada Sold/OP</th>
																<th class="column-title">Salida Sold/OP</th>
																<th class="column-title">Registro m<sup>3</sup> gas</th>
																<th class="column-title">T de MUFLA</th>
																<th class="column-title">Veloc. M/H</th>
																<th class="column-title">Color Salida</th>
																<th class="column-title">Aire</th>
																<th class="column-title">Gas</th>
																<th class="column-title">Operario</th>
															</tr>
														</thead>
														<tbody id="bodyhor">
															
														</tbody>
													</table>
												</div><br>
												
											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="pro
											file-tab">
												<div class="table-responsive">
													<table class="table table-striped jambo_table bulk_action">
														<thead>
															<tr class="headings">
																<th>Ejecutar</th>
																<th class="column-title">Fecha</th>
																<th class="column-title">Cliente</th>
																<th class="column-title">Dia. Ext.</th>
																<th class="column-title">Espesor</th>
																<th class="column-title">Mts</th>
																<th class="column-title">Kgs </th>
																<th class="column-title">Piezas</th>
																<th class="column-title">Est. Fab.</th>
																<th class="column-title">N° Orden</th>
																<th class="column-title">Urgente</th>
																<th class="column-title">Proveedor</th>
																<th class="column-title">Dia. Ext.</th>
																<th class="column-title">Espesor</th>
																<th class="column-title">Tipo</th>
																<th class="column-title">Lg</th>

																<th class="column-title">Largo MTS</th>
																<th class="column-title">Cant. Paq</th>
																<th class="column-title">Tubos por Paq.</th>
																<th class="column-title">Kg De Enjab</th>
																<th class="column-title">Kg De Otros</th>
																<th class="column-title">Fecha</th>
																<th class="column-title">Hora Inicial</th>
																<th class="column-title">Hora Fin</th>
																<th class="column-title">Operario</th>
																<th class="column-title">Desvío</th>
																<th class="column-title">Observaciones</th>
															</tr>
														</thead>
														<tbody id="bodybatea">
															
														</tbody>
												</table>
											</div><br>
											
										</div>
										<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">

											<div class="table-responsive">
												<table class="table table-striped jambo_table bulk_action">
													<thead>
														<tr class="headings">
															<th>Ejecutar</th>
															<th class="column-title">Fecha</th>
															<th class="column-title">Cliente</th>
															<th class="column-title">Dia. Ext.</th>
															<th class="column-title">Espesor</th>
															<th class="column-title">Mts</th>
															<th class="column-title">Kgs </th>
															<th class="column-title">Piezas</th>
															<th class="column-title">Est. Fab.</th>
															<th class="column-title">N° Orden</th>
															<th class="column-title">Urgente</th>
															<th class="column-title">Proveedor</th>
															<th class="column-title">Dia. Ext.</th>
															<th class="column-title">Espesor</th>
															<th class="column-title">Tipo</th>
															<th class="column-title">Lg</th>

															<th class="column-title">Máquina</th>
															<th class="column-title">Kilos</th>
															<th class="column-title">Tubos</th>
															<th class="column-title">Fecha</th>
															<th class="column-title">Hora Inicial Pre.</th>
															<th class="column-title">Hora Inicial OP</th>                              
															<th class="column-title">Hora Fin OP</th>                              
															<th class="column-title">Operario</th>
															<th class="column-title">Observaciones</th>
														</tr>
													</thead>
													<tbody id="bodypunta">
														
													</tbody>
											</table>
										</div><br>
									
									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">

										<div class="table-responsive">
											<table class="table table-striped jambo_table bulk_action">
												<thead>
													<tr class="headings">
														<th>Ejecutar</th>
														<th class="column-title">Fecha</th>
														<th class="column-title">Cliente</th>
														<th class="column-title">Dia. Ext.</th>
														<th class="column-title">Espesor</th>
														<th class="column-title">Mts</th>
														<th class="column-title">Kgs </th>
														<th class="column-title">Piezas</th>
														<th class="column-title">Est. Fab.</th>
														<th class="column-title">N° Orden</th>
														<th class="column-title">Urgente</th>
														<th class="column-title">Proveedor</th>
														<th class="column-title">Dia. Ext.</th>
														<th class="column-title">Espesor</th>
														<th class="column-title">Tipo</th>
														<th class="column-title">Lg</th>

														<th class="column-title">N° Trefila</th>
														<th class="column-title">I/F</th>
														<th class="column-title">Fecha</th>
														<th class="column-title">Hora Ini. PRE</th>
														<th class="column-title">Hora Inicial OP</th>
														<th class="column-title">Hora Fin OP</th>                              
														<th class="column-title">Operario</th>
														<th class="column-title">Observaciones</th>
														<th class="column-title">Desvío</th>
														<th class="column-title">Observaciones Desvío</th>

													</tr>
												</thead>
												<tbody id="bodytrefila">
													
												</tbody>
										</table>
									</div><br>
									
								</div>
								<div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">

									<div class="table-responsive">
										<table class="table table-striped jambo_table bulk_action">
											<thead>
												<tr class="headings">
													<th>Ejecutar</th>
													<th class="column-title">Fecha</th>
													<th class="column-title">Cliente</th>
													<th class="column-title">Dia. Ext.</th>
													<th class="column-title">Espesor</th>
													<th class="column-title">Mts</th>
													<th class="column-title">Kgs </th>
													<th class="column-title">Piezas</th>
													<th class="column-title">Est. Fab.</th>
													<th class="column-title">N° Orden</th>
													<th class="column-title">Urgente</th>
													<th class="column-title">Proveedor</th>
													<th class="column-title">Dia. Ext.</th>
													<th class="column-title">Espesor</th>
													<th class="column-title">Tipo</th>
													<th class="column-title">Lg</th>

													<th class="column-title">Tipo End</th>
													<th class="column-title">Fecha</th>
													<th class="column-title">Hora Inicial Pre</th>

													<th class="column-title">Hora Inicial OP</th>
													<th class="column-title">Hora Fin OP</th>                              
													<th class="column-title">Operario</th>
													<th class="column-title">Observaciones</th>

												</tr>
											</thead>
											<tbody id="bodyenderezadora">
												
											</tbody>
									</table>
								</div><br>
								
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">

								<div class="table-responsive">
									<table class="table table-striped jambo_table bulk_action">
										<thead>
											<tr class="headings">
												<th>Ejecutar</th>
												<th class="column-title">Fecha</th>
												<th class="column-title">Cliente</th>
												<th class="column-title">Dia. Ext.</th>
												<th class="column-title">Espesor</th>
												<th class="column-title">Mts</th>
												<th class="column-title">Kgs </th>
												<th class="column-title">Piezas</th>
												<th class="column-title">Est. Fab.</th>
												<th class="column-title">N° Orden</th>
												<th class="column-title">Urgente</th>
												<th class="column-title">Proveedor</th>
												<th class="column-title">Dia. Ext.</th>
												<th class="column-title">Espesor</th>
												<th class="column-title">Tipo</th>
												<th class="column-title">Lg</th>

												<th class="column-title">N° Cortadora</th>
												<th class="column-title">Fecha</th>
												<th class="column-title">Hora Inicial Pre</th>

												<th class="column-title">Hora Inicial OP</th>
												<th class="column-title">Hora Fin OP</th>                              
												<th class="column-title">Operario</th>
												<th class="column-title">Observaciones</th>

											</tr>
										</thead>
										<tbody id="bodycorte">
											
										</tbody>
								</table>
							</div><br>
							
						</div>						
					</div>

					<div class="row">
						<div class="col-md-1">
							<button type="button" id="procesar" class="btn btn-primary btn-sm">Ejecutar</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /page content -->


@endsection

@section('js_extra')
<script type="text/javascript">
$(function(){
  // var table = $("#datatable-buttonsrechazo").DataTable({
  //   "language": {
  //         "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
  //     }
  // });

  var idmp = 0;
  var cantst = 0;

  function FechaAFormato(fecha_recibida)
  {
    var nuevafecha = fecha_recibida.split("-");
    nuevafecha  = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
    return nuevafecha;
  }

  function listarstockmp(mpid, ordenid, medidaid){

  	$.ajaxSetup({
  	    headers: {
  	        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  	    }
  	});

  	$.ajax({  
  	  type: "post",
  	  url: "{{route('SeleTraza')}}",
  	  data: {
  	    'mpid' : mpid,
  	    'ordenid': ordenid,
  	    'medidaid': medidaid,
  	    'seleccion': 0
  	  },
  	  success: function(data){
  	  	if (data !== "false"){
				// console.log(data)
  	  		var arrayReturn = data.resultado;
  	  		cantst = arrayReturn.length;
  	  		$('#datamodal div').remove();

  	  		for (var i = 0; i < arrayReturn.length; i++) {
  	  			var e = arrayReturn[i];
  	  			console.log(e);
  	  			var nrotraza = e.nrotrazabilidad;
  	  			var id       = e.id;
  	  			var cantidad = e.cantidad;
  	  			var medida = e.medida;

  	  			var tr = `
  	  					<div class="form-group form-check">
              			    <input type="checkbox" id="stmp-${mpid}-${i}" class="form-check-input" value="${id}">
              			    <input type="hidden" id="nrotraza-${id}" value="${nrotraza}">
              			    <input type="hidden" id="cant-${id}" value="${cantidad}">
              			    <input type="hidden" id="medi-${id}" value="${medida}">
              			    <label class="form-check-label" for="">${nrotraza} (Stock ${cantidad}Kgs)</label>
              			</div>
  	  					`;

  	  			$('#datamodal').append(tr);
  	  		}

  	  	}  	  	
  	  	else {
  	  		$('#datamodal div').remove();
  	  		$('#datamodal').append("Sin Stock");
  	  	}
  	  }
  	});
  }

  $('table').on('click', 'tr', function(){
	
  	idmp = $(this).data('id');
  	iden = $(this).data('iden');
  	var medori = $(this).data('medori');
  	var nro = $(this).data('nro');
	  console.log('click',idmp,nro,medori)
  	if(valuepr==1)
  		listarstockmp(idmp, nro, medori);
  	
  	return;
  });
  

  $('#cargarstock').on('click', function(){
  	var list = [];

  	for (var i = 0; i < cantst; i++) {
	  	var val = '#stmp-'+idmp+'-'+i;

	  	if ($(val).is(':checked') == true){
	  		var a = $(val).val();
	  		list.push(a);
	  	}

  	}

  	if (list.length>0){
  		$('#traza-'+idmp+' input').remove();
  		$('#traza-'+idmp+' div').remove();
  		//$('#traza-'+idmp+' label').remove();
  		//$('#traza-'+idmp+' br').remove();

	  	for (var j = 0; j<list.length; j++) {
	  		var e = list[j];
	  		var nrotraza = $('#nrotraza-'+e).val();
	  		var cant = $('#cant-'+e).val();

	  		var tr = `<div class="trazadiv-${idmp}">
	  					<input type="hidden" id="idtraza-${idmp}-${j}" value="${e}">
	  					<input type="hidden" id="cant-${idmp}-${j}" value="${cant}">
	  					<input id="trazai-${idmp}-${j}" data-toggle="modal" data-target="#modal-stock" placeholder="Click" value="${nrotraza}" type="text" name=""><br> <input class="input-subproceso" style="width: 80px; margin-left: 40px; margin-top: 5px;" placeholder="" type="text" name="" id="kgsi-${idmp}-${j}">
						<label for="">Kgs</label><br>
						<label style="margin-left: 40px;" class="span-subproceso">Kilos máx ${cant}</label>
	  				<div> `;

			$('#traza-'+idmp).append(tr);
	  	} 
  	}
  });

  function tablepreparacionmp(data){
  	registros = data.procesos;
  	operarios = data.operarios;

  	for (var i = 0; i < registros.length; i++) {

  		var e = registros[i];
  		var idmp = e.idmp;
  		var fecha = e.fechapedido;
  		var cliente = e.cliente;
  		var diamex = e.diamext;
  		var esp = e.espesor;
  		var metros = e.metros;
  		var kilos = e.kilos;
  		var piezas = e.piezas;
  		var tratam = e.tratamiento;
  		var orden = e.nro;
  		var urg = e.urg;
  		var provee = e.provee;
  		var diametroExterior = e.diametroExterior;
  		var espesor = e.espesorNominal;
  		var costura = e.costura;
  		var lg = e.lg;
  		//input hidden//
  		var cotizacionid = e.cotizacionid;
  		var medida = e.medida;
  		var op = e.op;
  		var ver = e.ver;
  		var stock = e.stock;
  		var nrodetraza = e.nrodetraza;

  		if (fecha == null){
  		  f = "";
  		}
  		else{
  		  f = FechaAFormato(fecha);
  		}

  		if (cliente == null){
  		  cliente = "";
  		}

  		if (diamex == null){
  		  diamex = "";
  		}

  		if (esp == null){
  		  esp = "";
  		}

  		if (metros == null){
  		  metros = 0;
  		}

  		if (kilos == null){
  		  kilos = 0;
  		}

  		if (piezas == null){
  		  piezas = 0;
  		}

  		if (tratam == null){
  		  tratam = "";
  		}

  		if (orden == null){
  		  orden = 0;
  		}

  		if (urg == null){
  		  urg = "";
  		}

  		if (provee == null){
  		  provee = "";
  		}

  		if (diametroExterior == null){
  		  diametroExterior = "";
  		}

  		if (espesor == null){
  		  espesor = 0;
  		}

  		if (costura == null){
  		  costura = 0;
  		}

  		if (lg == null){
  		  lg = "";
  		}

  		if (cotizacionid == null){
  		  cotizacionid = 0;
  		}

  		if (medida == null){
  		  medida = "";
  		}

  		if (op == null){
  		  op = 0;
  		}

  		if (ver == null){
  		  ver = 0;
  		}

  		if (stock == null){
  		  stock = 0;
  		}

  		if (nrodetraza == null){
  		  nrodetraza = 0;
  		}

  		var tr = `<tr class="even pointer" data-id="${idmp}" data-medori="${medida}" data-nro="${orden}">
						<td class="a-center ">
							<input type="checkbox" value="${idmp}" id="eje1" class="flat" name="table_records">
						</td>
						<td style="display:none;">
						<input class="input-rechazo" type="text" name="hidden" id="kilos-${idmp}" value="${kilos}">
                        <input type='hidden' value='${e.medOri}' name='medida-${idmp}' />
                        <input type='hidden' value='${e.cotizacionid}' name='coti-${idmp}' />
                        <input type='hidden' value='${e.nro}' name='op-${idmp}' />
                        <input type='hidden' value='${e.idVer}' name='ver-${idmp}' />
                        <input type='hidden' value='${e.stock}' name='stock-${idmp}' />

						</td>
						<td class=" ">${f}</td>
						<td class=" ">${cliente}</td>
						<td class=" ">${diamex}</td>
						<td class=" ">${esp}</td>
						<td class=" ">${metros}</td>
						<td class="a-right a-right ">${kilos}</td>
						<td class=" last">${piezas}</td>
						<td class=" last">${tratam}</td>
						<td class=" ">${orden}</td>
						<td>${urg}</td>
						<td>${provee}</td>
						<td>${diametroExterior}</td>
						<td class=" ">${espesor}</td>
						<td class=" ">${costura}</td>
						<td>${lg}</td>
						<td id="traza-${idmp}"><input type="text" name="${idmp}" readonly="readonly" value="click" data-toggle="modal" data-target="#modal-stock"></td>
						<td>${stock}</td>
						<td><input class="input-rechazo" type="text" name="" id="virgen-${idmp}"></td>
						<td><input class="input-rechazo" type="text" name="" id="ktotal-${idmp}"></td>
						<td><input class="input-rechazo" type="text" name="" id="horno-${idmp}"></td>
						<td><input class="input-rechazo" type="text" name="" id="batea-${idmp}"></td>
						<td><input class="input-rechazo" type="text" name="" id="arepro-${idmp}"></td>
						<td><input class="input-rechazo" type="text" name="" id="cont-${idmp}"></td>
						<td> <select id="operario-${idmp}" class="form-control select-rechazo">
							<option></option>
							
						</select></td>
						<td style="display:none;"><input class="input-rechazo" type="hidden" name="" id="cotizacionid-${idmp}" value="${cotizacionid}"></td>
						<td style="display:none;"><input class="input-rechazo" type="hidden" name="" id="medida-${idmp}" value="${medida}"></td>
						<td style="display:none;"><input class="input-rechazo" type="hidden" name="" id="op-${idmp}" value="${op}"></td>
						<td style="display:none;"><input class="input-rechazo" type="hidden" name="" id="ver-${idmp}" value="${ver}"></td>
						<td style="display:none;"><input class="input-rechazo" type="hidden" name="" id="stock-${idmp}" value="${stock}"></td>
						<td style="display:none;"><input class="input-rechazo" type="hidden" name="" id="nrodetraza-${idmp}" value="${nrodetraza}"></td>
					</tr>`;

		$('#bodymp').append(tr);

		for (var j = 0; j < operarios.length; j++) {
			var op = operarios[j];
			var opt = `<option value="${op.id}">${op.nombreCompleto}</option>`;
			$('#operario-'+idmp).append(opt);

		}

  	}

  return;

  }

  function tablehorno(data){
  	registros = data.procesos;
  	operarios = data.operarios;

  	for (var i = 0; i < registros.length; i++) {
  		var e = registros[i];
  		var fecha = e.fechapedido;
  		var cliente = e.cliente;
  		var idhor = e.idhor;
  		var diamex = e.diamext;
  		var esp = e.esp;
  		var mts = e.metros;
  		var kgs = e.kilos;
  		var piezas = e.piezas;
  		var tratamiento = e.tratamiento;
  		var orden = e.nro;
  		var urg = e.urg;
  		var proveedor = e.provee;
  		var diametroExterior = e.diametroExterior;
  		var espesor = e.espesorNominal;
  		var costura = e.costura;

  		if (fecha == null){
  		  f = "";
  		}
  		else{
  		  f = FechaAFormato(fecha);
  		}

  		if (cliente == null){
  		  cliente = "";
  		}

  		if (diamex == null){
  		  diamex = "";
  		}

  		if (esp == null){
  		  esp = "";
  		}

  		if (mts == null){
  		  mts = 0;
  		}

  		if (kgs == null){
  		  kgs = 0;
  		}

  		if (piezas == null){
  		  piezas = 0;
  		}

  		if (tratamiento == null){
  		  tratamiento = "";
  		}

  		if (orden == null){
  		  orden = 0;
  		}

  		if (urg == null){
  		  urg = "";
  		}

  		if (proveedor == null){
  		  proveedor = "";
  		}

  		if (diametroExterior == null){
  		  diametroExterior = "";
  		}

  		if (espesor == null){
  		  espesor = 0;
  		}

  		if (costura == null){
  		  costura = 0;
  		}

  		var tr = `<tr class="even pointer">
  					<td class="a-center ">
  						<input type="checkbox" class="flat" value="${idhor}" id="eje2" name="table_records">
  					</td>
  					<td class=" ">${f}</td>
  					<td class=" ">${cliente}</td>
  					<td class=" ">${diamex}</td>
  					<td class=" ">${esp}</td>
  					<td class=" ">${mts}</td>
  					<td class="a-right a-right ">${kgs}</td>
  					<td class=" last">${piezas}</td>
  					<td class=" last">${tratamiento}</td>
  					<td class=" ">${orden}</td>
  					<td>${urg}</td>
  					<td>${proveedor}</td>
  					<td>${diametroExterior}</td>
  					<td class=" ">${espesor}</td>
  					<td class=" ">${costura}</td>
  					<td><input class="input-rechazo" type="text" name="" id="horacarga-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="canioxcam-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="largocanio-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="kgcamada-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="kiloslote-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="entradasol-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="salidasol-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="mtsgas-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="mufla-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="veloc-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="color-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="aire-${idhor}"></td>
  					<td><input class="input-rechazo" type="text" name="" id="gas-${idhor}"></td>
  					<td> <select id="operario-${idhor}" class="form-control select-rechazo" required>
  						<option></option>
  						
  					</select></td>
  				</tr>`;

  		$('#bodyhor').append(tr);

  		for (var j = 0; j < operarios.length; j++) {
  			var op = operarios[j];
  			var opt = `<option value="${op.id}">${op.nombreCompleto}</option>`;
  			$('#operario-'+idhor).append(opt);

  		}


  	}
  	return;

  }

  function tablebatea(data){
  	registros = data.procesos;
  	operarios = data.operarios;

  	for (var i = 0; i < registros.length; i++) {
  		var e = registros[i];
  		var fecha = e.fechapedido;
  		var cliente = e.cliente;
  		var idbatrun = e.idbatrun;
  		var diamex = e.diamext;
  		var esp = e.esp;
  		var mts = e.metros;
  		var kgs = e.kilos;
  		var piezas = e.piezas;
  		var tratamiento = e.tratamiento;
  		var orden = e.nro;
  		var urg = e.urg;
  		var proveedor = e.provee;
  		var diametroExterior = e.diametroExterior;
  		var espesor = e.espesor;
  		var costura = e.costura;

  		if (fecha == null){
  		  f = "";
  		}
  		else{
  		  f = FechaAFormato(fecha);
  		}

  		if (cliente == null){
  		  cliente = "";
  		}

  		if (diamex == null){
  		  diamex = "";
  		}

  		if (esp == null){
  		  esp = "";
  		}

  		if (mts == null){
  		  mts = 0;
  		}

  		if (kgs == null){
  		  kgs = 0;
  		}

  		if (piezas == null){
  		  piezas = 0;
  		}

  		if (tratamiento == null){
  		  tratamiento = "";
  		}

  		if (orden == null){
  		  orden = 0;
  		}

  		if (urg == null){
  		  urg = "";
  		}

  		if (proveedor == null){
  		  proveedor = "";
  		}

  		if (diametroExterior == null){
  		  diametroExterior = "";
  		}

  		if (espesor == null){
  		  espesor = 0;
  		}

  		if (costura == null){
  		  costura = 0;
  		}

  		var date = new Date();
  		hoy = date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();

  		var tr = `<tr class="even pointer">
						<td class="a-center ">
							<input type="checkbox" value="${idbatrun}" id="eje3" class="flat" name="table_records">
						</td>
						<td class=" ">${f}</td>
						<td class=" ">${cliente}</td>
						<td class=" ">${diamex}</td>
						<td class=" ">${esp}</td>
						<td class="a-right a-right ">${mts}</td>
						<td class=" ">${kgs}</td>
						<td class=" last">${piezas}</td>
						<td class=" last">${tratamiento}</td>
						<td class=" ">${orden}</td>
						<td>${urg}</td>
						<td>${proveedor}</td>
						<td>${diametroExterior}</td>
						<td class=" ">${espesor}</td>
						<td class=" ">${costura}</td>
						<td></td>
						<td><input class="input-rechazo" type="text" name="" id="largo-${idbatrun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="cantpaq-${idbatrun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="tubosxpaq-${idbatrun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="kgenja-${idbatrun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="kgotros-${idbatrun}"></td>
						<td><input class="input-rechazo" type="text" name="" value="${hoy}" id="fecha-${idbatrun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="horaini-${idbatrun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="horafin-${idbatrun}"></td>
						<td> <select id="operario-${idbatrun}" class="form-control select-rechazo">
							<option></option>
						</select>
					</td>
					<td align="center">
						<input type="checkbox" id="desvio-${idbatrun}" class="flat" name="table_records">
					</td>
					<td><input class="input-rechazo" type="text" name="" id="obs-${idbatrun}"></td>
					
				</tr>`;

		$('#bodybatea').append(tr);

		for (var j = 0; j < operarios.length; j++) {
			var op = operarios[j];
			var opt = `<option value="${op.id}">${op.nombreCompleto}</option>`;
			$('#operario-'+idbatrun).append(opt);

		}


  	}
  }

  function tablepunta(data){
  	registros = data.procesos;
  	console.log(registros)
  	operarios = data.operarios;

  	for (var i = 0; i < registros.length; i++) {
  		var e = registros[i];
  		var fecha = e.fechapedido;
  		var cliente = e.cliente;
  		var idpun = e.idpun;
  		var diamex = e.diamext;
  		var esp = e.esp;
  		var mts = e.metros;
  		var kgs = e.kilos;
  		var piezas = e.piezas;
  		var tratamiento = e.tratamiento;
  		var orden = e.nro;
  		var urg = e.urg;
  		var proveedor = e.provee;
  		var diametroExterior = e.diametroExterior;
  		var espesor = e.espesor;
  		var costura = e.costura;

  		if (fecha == null){
  		  f = "";
  		}
  		else{
  		  f = FechaAFormato(fecha);
  		}

  		if (cliente == null){
  		  cliente = "";
  		}

  		if (diamex == null){
  		  diamex = "";
  		}

  		if (esp == null){
  		  esp = "";
  		}

  		if (mts == null){
  		  mts = 0;
  		}

  		if (kgs == null){
  		  kgs = 0;
  		}

  		if (piezas == null){
  		  piezas = 0;
  		}

  		if (tratamiento == null){
  		  tratamiento = "";
  		}

  		if (orden == null){
  		  orden = 0;
  		}

  		if (urg == null){
  		  urg = "";
  		}

  		if (proveedor == null){
  		  proveedor = "";
  		}

  		if (diametroExterior == null){
  		  diametroExterior = "";
  		}

  		if (espesor == null){
  		  espesor = 0;
  		}

  		if (costura == null){
  		  costura = 0;
  		}

  		var date = new Date();
  		hoy = date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();

  		var tr = `<tr class="even pointer">
						<td class="a-center ">
							<input type="checkbox" value="${idpun}" id="eje4" class="flat" name="table_records">
						</td>
						<td class=" ">${f}</td>
						<td class=" ">${cliente}</td>
						<td class=" ">${diamex}</td>
						<td class=" ">${esp}</td>
						<td class=" ">${mts}</td>
						<td class="a-right a-right ">${kgs}</td>
						<td class=" last">${piezas}</td>
						<td class=" last">${tratamiento}</td>
						<td class=" ">${orden}</td>
						<td>${urg}</td>
						<td>${proveedor}</td>
						<td>${diametroExterior}</td>
						<td class=" ">${espesor}</td>
						<td class=" ">${costura}</td>
						<td></td>
						<td><input class="input-rechazo" type="text" name="" id="maquina-${idpun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="kilos-${idpun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="tubos-${idpun}"></td>
						<td><input class="input-rechazo" value="${hoy}" type="text" name="" id="fecha-${idpun}"></td>
						
						<td><input class="input-rechazo" type="text" name="" id="horaprep-${idpun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="horainiop-${idpun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="horafinop-${idpun}"></td>
						<td> <select id="operario-${idpun}" class="form-control select-rechazo">
							<option></option>
						</select>
					</td>
					<td><input class="input-rechazo" type="text" name="" id="obs-${idpun}"></td>
					
				  </tr>`;

		$('#bodypunta').append(tr);

		console.log($('#operario-'+idpun));

		for (var j = 0; j < operarios.length; j++) {
			var op = operarios[j];
			var opt = `<option value="${op.id}">${op.nombreCompleto}</option>`;
			$('#bodypunta #operario-'+idpun).append(opt);

		}

  	}
  }

  function tabletrefila(data){

  	registros = data.procesos;
  	operarios = data.operarios;

  	for (var i = 0; i < registros.length; i++) {
  		var e = registros[i];
  		var fecha = e.fechapedido;
  		var cliente = e.cliente;
  		var idtrerun = e.idtrerun;
  		var diamex = e.diamext;
  		var esp = e.esp;
  		var mts = e.metros;
  		var kgs = e.kilos;
  		var piezas = e.piezas;
  		var tratamiento = e.tratamiento;
  		var orden = e.nro;
  		var urg = e.urg;
  		var proveedor = e.provee;
  		var diametroExterior = e.diametroExterior;
  		var espesor = e.espesor;
  		var costura = e.costura;

  		if (fecha == null){
  		  f = "";
  		}
  		else{
  		  f = FechaAFormato(fecha);
  		}

  		if (cliente == null){
  		  cliente = "";
  		}

  		if (diamex == null){
  		  diamex = "";
  		}

  		if (esp == null){
  		  esp = "";
  		}

  		if (mts == null){
  		  mts = 0;
  		}

  		if (kgs == null){
  		  kgs = 0;
  		}

  		if (piezas == null){
  		  piezas = 0;
  		}

  		if (tratamiento == null){
  		  tratamiento = "";
  		}

  		if (orden == null){
  		  orden = 0;
  		}

  		if (urg == null){
  		  urg = "";
  		}

  		if (proveedor == null){
  		  proveedor = "";
  		}

  		if (diametroExterior == null){
  		  diametroExterior = "";
  		}

  		if (espesor == null){
  		  espesor = 0;
  		}

  		if (costura == null){
  		  costura = 0;
  		}

  		var date = new Date();
  		hoy = date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();

  		var tr = `<tr class="even pointer">
						<td class="a-center ">
							<input type="checkbox" value="${idtrerun}" id="eje5" class="flat" name="table_records">
						</td>
						<td class=" ">${f}</td>
						<td class=" ">${cliente}</td>
						<td class=" ">${diamex}</td>
						<td class=" ">${esp}</td>
						<td class=" ">${mts}</td>
						<td class="a-right a-right ">${kgs}</td>
						<td class=" last">${piezas}</td>
						<td class=" last">${tratamiento}</td>
						<td class=" ">${orden}</td>
						<td>${urg}</td>
						<td>${proveedor}</td>
						<td>${diametroExterior}</td>
						<td class=" ">${espesor}</td>
						<td class=" ">${costura}</td>
						<td></td>
						<td><input class="input-rechazo" type="text" name="" id="nrotrefila-${idtrerun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="canioxcam-${idtrerun}"></td>
						<td><input class="input-rechazo" type="text" name="" value="${hoy}" id="fecha-${idtrerun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="horaprep-${idtrerun}"></td>
						
						<td><input class="input-rechazo" type="text" name="" id="horainiop-${idtrerun}"></td>
						<td><input class="input-rechazo" type="text" name="" id="horafinop-${idtrerun}"></td>
						<td> <select id="operario-${idtrerun}" class="form-control select-rechazo" >
							<option></option>
							
						</select>
						</td>
						<td><input class="input-rechazo" type="text" name="" id="obs-${idtrerun}"></td>
						<td align="center">
							<input type="checkbox" id="desvio-${idtrerun}" class="flat" name="table_records">
						</td>
						
						<td><input disabled='disabled' class="input-rechazo" type="text" name="" id="obsdesvio-${idtrerun}"></td>
					
					</tr>`;

		$('#bodytrefila').append(tr);

		for (var j = 0; j < operarios.length; j++) {
			var op = operarios[j];
			var opt = `<option value="${op.id}">${op.nombreCompleto}</option>`;
			$('#operario-'+idtrerun).append(opt);

		}


  	}
  }

  function tableenderezamiento(data){

  	registros = data.procesos;
  	operarios = data.operarios;

  	for (var i = 0; i < registros.length; i++) {
  		var e = registros[i];
  		var fecha = e.fechapedido;
  		var cliente = e.cliente;
  		var idend = e.idend;
  		var diamex = e.diamext;
  		var esp = e.esp;
  		var mts = e.metros;
  		var kgs = e.kilos;
  		var piezas = e.piezas;
  		var tratamiento = e.tratamiento;
  		var orden = e.nro;
  		var urg = e.urg;
  		var proveedor = e.provee;
  		var diametroExterior = e.diametroExterior;
  		var espesor = e.espesor;
  		var costura = e.costura;

  		if (fecha == null){
  		  f = "";
  		}
  		else{
  		  f = FechaAFormato(fecha);
  		}

  		if (cliente == null){
  		  cliente = "";
  		}

  		if (diamex == null){
  		  diamex = "";
  		}

  		if (esp == null){
  		  esp = "";
  		}

  		if (mts == null){
  		  mts = 0;
  		}

  		if (kgs == null){
  		  kgs = 0;
  		}

  		if (piezas == null){
  		  piezas = 0;
  		}

  		if (tratamiento == null){
  		  tratamiento = "";
  		}

  		if (orden == null){
  		  orden = 0;
  		}

  		if (urg == null){
  		  urg = "";
  		}

  		if (proveedor == null){
  		  proveedor = "";
  		}

  		if (diametroExterior == null){
  		  diametroExterior = "";
  		}

  		if (espesor == null){
  		  espesor = 0;
  		}

  		if (costura == null){
  		  costura = 0;
  		}

  		var date = new Date();
  		hoy = date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();

  		var tr = `<tr class="even pointer">
						<td class="a-center ">
							<input value="${idend}" type="checkbox" id="eje6" class="flat" name="table_records">
						</td>
						<td class=" ">${f}</td>
						<td class=" ">${cliente}</td>
						<td class=" ">${diamex}</td>
						<td class=" ">${esp}</td>
						<td class=" ">${mts}</td>
						<td class="a-right a-right ">${kgs}</td>
						<td class=" last">${piezas}</td>
						<td class=" last">${orden}</td>
						<td class=" ">${tratamiento}</td>
						<td>${urg}</td>
						<td>${proveedor}</td>
						<td>${diametroExterior}</td>
						<td class=" ">${espesor}</td>
						<td class=" ">${costura}</td>
						<td></td>
						<td><input class="input-rechazo" type="text" name="" id="tipoenderazado-${idend}"></td>
						<td><input class="input-rechazo" type="text" name="" value="${hoy}" id="fecha-${idend}"></td>
						<td><input class="input-rechazo" type="text" name="" id="horaprep-${idend}"></td>
						<td><input class="input-rechazo" type="text" name="" id="horainiop-${idend}"></td>
						
						<td><input class="input-rechazo" type="text" name="" id="horafinop-${idend}"></td>
						<td> <select id="operario-${idend}" class="form-control select-rechazo">
							<option></option>
						</select>
					</td>
					<td><input class="input-rechazo" type="text" name="" id="obs-${idend}"></td>
					
				  </tr>`;

		$('#bodyenderezadora').append(tr);

		for (var j = 0; j < operarios.length; j++) {
			var op = operarios[j];
			var opt = `<option value="${op.id}">${op.nombreCompleto}</option>`;
			$('#operario-'+idend).append(opt);

		}
  	}

  }

  function tablecorte(data){

  	registros = data.procesos;
  	operarios = data.operarios;

  	for (var i = 0; i < registros.length; i++) {
  		var e = registros[i];
  		var fecha = e.fechapedido;
  		var cliente = e.cliente;
  		var idcorun = e.idcorun;
  		var diamex = e.diamext;
  		var esp = e.esp;
  		var mts = e.metros;
  		var kgs = e.kilos;
  		var piezas = e.piezas;
  		var tratamiento = e.tratamiento;
  		var orden = e.nro;
  		var urg = e.urg;
  		var proveedor = e.provee;
  		var diametroExterior = e.diametroExterior;
  		var espesor = e.espesor;
  		var costura = e.costura;

  		if (fecha == null){
  		  f = "";
  		}
  		else{
  		  f = FechaAFormato(fecha);
  		}

  		if (cliente == null){
  		  cliente = "";
  		}

  		if (diamex == null){
  		  diamex = "";
  		}

  		if (esp == null){
  		  esp = "";
  		}

  		if (mts == null){
  		  mts = 0;
  		}

  		if (kgs == null){
  		  kgs = 0;
  		}

  		if (piezas == null){
  		  piezas = 0;
  		}

  		if (tratamiento == null){
  		  tratamiento = "";
  		}

  		if (orden == null){
  		  orden = 0;
  		}

  		if (urg == null){
  		  urg = "";
  		}

  		if (proveedor == null){
  		  proveedor = "";
  		}

  		if (diametroExterior == null){
  		  diametroExterior = "";
  		}

  		if (espesor == null){
  		  espesor = 0;
  		}

  		if (costura == null){
  		  costura = 0;
  		}

  		var date = new Date();
  		hoy = date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();

  		var tr = `<tr class="even pointer">
							<td class="a-center ">
								<input type="checkbox" value="${idcorun}" id="eje7" class="flat" name="table_records">
							</td>
							<td class=" ">${f}</td>
							<td class=" ">${cliente}</td>
							<td class=" ">${diamex}</td>
							<td class=" ">${esp}</td>
							<td class=" ">${mts}</td>
							<td class="a-right a-right ">${kgs}</td>
							<td class=" last">${piezas}</td>
							<td class=" last">${tratamiento}</td>
							<td class=" ">${orden}</td>
							<td>${urg}</td>
							<td>${proveedor}</td>
							<td>${diametroExterior}</td>
							<td class=" ">${espesor}</td>
							<td class=" ">${costura}</td>
							<td></td>
							<td><input class="input-rechazo" type="text" name="" id="nrocorta-${idcorun}"></td>
							<td><input class="input-rechazo" type="text" name="" value="${hoy}" id="fecha-${idcorun}"></td>
							<td><input class="input-rechazo" type="text" name="" id="horaprep-${idcorun}"></td>
							<td><input class="input-rechazo" type="text" name="" id="horainiop-${idcorun}"></td>
							
							<td><input class="input-rechazo" type="text" name="" id="horafinop-${idcorun}"></td>
							<td> <select id="operario-${idcorun}" class="form-control select-rechazo">
								<option></option>
							</select>
						</td>
						<td><input class="input-rechazo" type="text" name="" id="obs-${idcorun}"></td>
						
				  </tr>`;

		$('#bodycorte').append(tr);

		for (var j = 0; j < operarios.length; j++) {
			var op = operarios[j];
			var opt = `<option value="${op.id}">${op.nombreCompleto}</option>`;
			$('#operario-'+idcorun).append(opt);

		}
  	}

  }

  // function resultados(){
  // 	var a = [{'autorequired':2, 'kgn':150, 'op':40, 'ver':40, 'coti':51}, {'autorequired':2, 'kgn':20, 'op':85, 'ver':82, 'coti':83}];

  // 	var obj = {'listprocess':a, 'auto':"true"};
  // 	return obj;
  // }

  //var dataLis = resultados();
  var dataLis = [];
  var pasada = 0;
  var otro = false;

  	function new_orden(obj){
  		$.ajaxSetup({
  		    headers: {
  		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  		    }
  		});

  		$.ajax({  
  		  type: "post",
  		  url: "{{route('generarxdif')}}",
  		  data: obj,
  		  beforeSend: function() {
  		    //$('#loader2').show();
  		  },
  		  complete: function(){
  		    //$('#loader2').hide();
  		  },
  		  success: function(data){
  		  	AlertToast('Se ha generado la orden Nº'+data);
  		  }
  		});
  	}

  	function processRequired(list){

  		if(pasada>=list.listprocess.length){//quiere decir que hay mas de dos registros
  			if(list.auto=="true"){
  				setTimeout(function(){ $('#modal-auto').modal('show');
	  				setTimeout(function(){ location.href = "{{route('autorizarMP')}}"; }, 800);
	  			 }, 600);
  				//modal para que vea los procesos MP que requieren autorizacion
  			}
  			else{

  				if(list.listprocess.length>0){
  					AlertToast("Se ha cargado PreparacionMP exitosamente")
  					setTimeout(function(){ location.reload();	 }, 2000);
  				}
  				else{
		  			
		  			AlertToast("Se ha cargado PreparacionMP exitosamente")
		  			setTimeout(function(){ location.reload();	 }, 600);  					
  				}
  			}

  			dataLis = [];
  			return false;//aqui sale y es cuando se debe recargar la pagina
  		}
  		else{// hay uno solo
	  		var e = list.listprocess[pasada];
	  		if(e.autorequired==2){
	  			if(otro){
	  				setTimeout(function(){ $('#modal-faltante').modal('show'); }, 600);
	  			}
	  			else{
		  			$('#modal-faltante').modal('show');

	  			}
	  			$('#hfaltante').text('La orden Nº '+e.op+' tiene un faltante. ¿Desea generar una orden por la diferencia?');
	  			pasada++;
	  		}	
  		}



  		return true;
  	}

  function ejecutarproceso(listado, tipo){

  	var objetos = [];

  	if (tipo == 1){
	  	for (var i = 0; i < listado.length; i++) {
	  		var e = listado[i]; //idmp
	  		var arraytraza = [];

	  		var divs = $(".trazadiv-"+e).length;
	  		if (divs > 0){
	  			for (var k = 0; k < divs; k++) {
	  				var iptraza = $('#trazai-'+e+'-'+k).val();
	  				var ipcant = $('#cant-'+e+'-'+k).val(); /// kilos max para validar campos
	  				var ipkgs = $('#kgsi-'+e+'-'+k).val();
	  				var id = $('#idtraza-'+e+'-'+k).val();

	  				var obj2 = {
	  					'nrotrazabilidad': iptraza,
	  					'kgs': ipkgs,
	  					'id' : id
	  				}
	  				arraytraza.push(obj2);
	  			}
	  		}

	  		var virgen = $('#virgen-'+e).val();
	  		var ktotal = $('#ktotal-'+e).val();
	  		var horno = $('#horno-'+e).val();
	  		var batea = $('#batea-'+e).val();
	  		var arepro = $('#arepro-'+e).val();
	  		var cont = $('#cont-'+e).val();
	  		var operario = $('#operario-'+e).val();
	  		var cotizacionid = $('#cotizacionid-'+e).val();
	  		var medida = $('#medida-'+e).val();
	  		var op = $('#op-'+e).val();
	  		var ver = $('#ver-'+e).val();
	  		var stock = $('#stock-'+e).val();
	  		var nrodetraza = $('#nrodetraza-'+e).val();
	  		var kil = $('#kilos-'+e).val();

	  		var obj = {
	  			'kgs':kil,
	  			'nrodetraza': nrodetraza,
	  			'idproceso' :  e,
	  			'virgen' : virgen,
	  			'ktotal' : ktotal,
	  			'horno' : horno,
	  			'batea' : batea,
	  			'arepro' : arepro,
	  			'cont' : cont,
	  			'operario' : operario,
	  			'cotizacionid' : cotizacionid,
	  			'medida' : medida,
	  			'op' : op,
	  			'ver' : ver,
	  			'stock' : stock,
	  			'cargatraza': JSON.stringify(arraytraza)
	  		}
	  		objetos.push(obj);
	  	} 	
  	}
  	else if (tipo == 2){

  		for (var i = 0; i < listado.length; i++) {
	  		var e = listado[i];
	  		var horacarga = $('#horacarga-'+e).val();
	  		var canioxcam = $('#canioxcam-'+e).val();
	  		var largocanio = $('#largocanio-'+e).val();
	  		var kgcamada = $('#kgcamada-'+e).val();
	  		var kiloslote = $('#kiloslote-'+e).val();
	  		var entradasol = $('#entradasol-'+e).val();
	  		var salidasol = $('#salidasol-'+e).val();
	  		var mtsgas = $('#mtsgas-'+e).val();
	  		var mufla = $('#mufla-'+e).val();
	  		var veloc = $('#veloc-'+e).val();
	  		var color = $('#color-'+e).val();
	  		var aire = $('#aire-'+e).val();
	  		var gas = $('#gas-'+e).val();
	  		var operario = $('#operario-'+e).val();

	  		var obj = {
	  			'idproceso': e,
	  			'horacarga':  horacarga,
	  			'canioxcam':  canioxcam,
	  			'largocanio':  largocanio,
	  			'kgcamada':  kgcamada,
	  			'kiloslote':  kiloslote,
	  			'entradasol':  entradasol,
	  			'salidasol':  salidasol,
	  			'mtsgas':  mtsgas,
	  			'mufla':  mufla,
	  			'veloc':  veloc,
	  			'color':  color,
	  			'aire':  aire,
	  			'gas':  gas,
	  			'operario':  operario
	  		}  	

	  		objetos.push(obj);		
  		}


  	}
  	else if (tipo == 3){
  		
  		for (var i = 0; i < listado.length; i++) {
	  		var e = listado[i];
	  		var largo = $('#largo-'+e).val();
	  		var cantpaq = $('#cantpaq-'+e).val();
	  		var tubosxpaq = $('#tubosxpaq-'+e).val();
	  		var kgenja = $('#kgenja-'+e).val();
	  		var kgotros = $('#kgotros-'+e).val();
	  		var fecha = $('#fecha-'+e).val();
	  		var horaini = $('#horaini-'+e).val();
	  		var horafin = $('#horafin-'+e).val();
	  		var obs = $('#obs-'+e).val();
	  		var operario = $('#operario-'+e).val();
	  		var desvio = $('#desvio-'+e).is(':checked');

	  		var d = 0;

	  		if (desvio == true)
	  			d = 1;

	  		var obj = {
	  			'idproceso': e,
	  			'largo': largo,
	  			'cantpaq': cantpaq,
	  			'tubosxpaq': tubosxpaq,
	  			'kgenja': kgenja,
	  			'kgotros': kgotros,
	  			'fecha': fecha,
	  			'horaini': horaini,
	  			'horafin': horafin,
	  			'obs': obs,
	  			'operario': operario,
	  			'desvio': d
	  		}  	

	  		objetos.push(obj);
	  	}

  	}
  	else if (tipo == 4){
  		
  		for (var i = 0; i < listado.length; i++) {
  			var e = listado[i];
  			var maquina = $('#maquina-'+e).val();
  			var kilos = $('#kilos-'+e).val();
  			var tubos = $('#tubos-'+e).val();
  			var fecha = $('#fecha-'+e).val();
  			var horaprep = $('#horaprep-'+e).val();
  			var horainiop = $('#horainiop-'+e).val();
  			var horafinop = $('#horafinop-'+e).val();
  			var operario = $('#operario-'+e).val();
  			var obs = $('#obs-'+e).val();

  			var obj = {
  				'idproceso': e,
  				'maquina': maquina,
  				'kilos': kilos,
  				'tubos': tubos,
  				'fecha': fecha,
  				'horaprep': horaprep,
  				'horainiop': horainiop,
  				'horafinop': horafinop,
  				'operario': operario,
  				'obs': obs
  			}

  			objetos.push(obj);
  		}
  	}
  	else if (tipo == 5){

  		for (var i = 0; i < listado.length; i++) {
  			var e = listado[i];
  			var nrotrefila = $('#nrotrefila-'+e).val();
  			var canioxcam = $('#canioxcam-'+e).val();
  			var fecha = $('#fecha-'+e).val();
  			var horaprep = $('#horaprep-'+e).val();
  			var horainiop = $('#horainiop-'+e).val();
  			var horafinop = $('#horafinop-'+e).val();
  			var operario = $('#operario-'+e).val();
  			var obs = $('#obs-'+e).val();
	  		var desvio = $('#desvio-'+e).is(':checked');
	  		var obsdesvio = $('#obsdesvio-'+e).val();

	  		var d = 0;

	  		if (desvio == true)
	  			d = 1;

	  		var obj = {
	  			'idproceso': e,
	  			'nrotrefila': nrotrefila,
	  			'canioxcam': canioxcam,
	  			'fecha': fecha,
	  			'horaprep': horaprep,
	  			'horainiop': horainiop,
	  			'horafinop': horafinop,
	  			'operario': operario,
	  			'obs': obs,
		  		'desvio': d,
		  		'obsdesvio': obsdesvio
	  		}

	  		objetos.push(obj);
  		}

  	}
  	else if (tipo == 6){
  		
  		for (var i = 0; i < listado.length; i++) {
  			var e = listado[i];
  			var tipoenderazado = $('#tipoenderazado-'+e).val();
  			var fecha = $('#fecha-'+e).val();
  			var horaprep = $('#horaprep-'+e).val();
  			var horainiop = $('#horainiop-'+e).val();
  			var horafinop = $('#horafinop-'+e).val();
  			var operario = $('#operario-'+e).val();
  			var obs = $('#obs-'+e).val();
	  	}

	  	var obj = {
	  		'idproceso': e,
	  		'tipoenderazado': tipoenderazado,
	  		'fecha': fecha,
	  		'horaprep': horaprep,
	  		'horainiop': horainiop,
	  		'horafinop': horafinop,
	  		'operario': operario,
	  		'obs': obs
	  	}

	  	objetos.push(obj);

  	}
  	else if (tipo == 7){

  		for (var i = 0; i < listado.length; i++) {
  			var e = listado[i];
  			var nrocorta = $('#nrocorta-'+e).val();
  			var fecha = $('#fecha-'+e).val();
  			var horaprep = $('#horaprep-'+e).val();
  			var horainiop = $('#horainiop-'+e).val();
  			var horafinop = $('#horafinop-'+e).val();
  			var operario = $('#operario-'+e).val();
  			var obs = $('#obs-'+e).val();
  			
		  	var obj = {
		  		'idproceso': e,
		  		'nrocorta': nrocorta,
		  		'fecha': fecha,
		  		'horaprep': horaprep,
		  		'horainiop': horainiop,
		  		'horafinop': horafinop,
		  		'operario': operario,
		  		'obs': obs
		  	}

		  	objetos.push(obj);
	  	}

  	}
  	else {
  		return "false";
  	}


  	$.ajaxSetup({
  	    headers: {
  	        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  	    }
  	});

  	$.ajax({  
  	  type: "put",
  	  url: "{{route('ejeprocesos')}}",
  	  data: {
  	    'tipo' : tipo,
  	    'eje': 1,
  	    'datos': JSON.stringify(objetos)
  	  },
  	  beforeSend: function() {
  	    $('#loader2').show();
  	  },
  	  complete: function(){
  	    $('#loader2').hide();
  	  },
  	  success: function(data){
  	  	dataLis = data;
  	  	if(valuepr==1)
  	  		processRequired(data);
  	  	else
  	  		location.reload();
  	  }
  	});

  }

  $('#send_auto').on('click', function(){
  	console.log("Entro");
  });

  $('#send_faltante').on('click', function(){
  	new_orden(dataLis.listprocess[pasada-1])
  	$('#modal-faltante').modal('toggle');
  	otro = true;
  	processRequired(dataLis);
  });

   $('#cancel_faltante').on('click', function(){
  	$('#modal-faltante').modal('toggle');
  	otro = true;
  	processRequired(dataLis);
  });


  function correrproceso (val2){
	  $.ajax({  
	    type: "get",
	    url: "{{route('runprocesos')}}",
	    data: {
	      'tipo' : val2,
	      'eje': 0
	    },
	    beforeSend: function() {
	      $('#loader').show();
	    },
	    complete: function(){
	      $('#loader').hide();
	    },
	    success: function(data){
	    	if (data == "false"){
	    		return;	
	    	}
			var arrayReturn = data.resultado;
			
			console.log('arrayReturn',arrayReturn,val2)

	    	if (val2 == 1){ //preparacionmp
	    		$('#bodymp tr').remove();
	    		tablepreparacionmp(arrayReturn);
	    		return;
	    	}
	    	else if(val2 == 2){ //horno
	    		$('#bodyhor tr').remove();
	    		tablehorno(arrayReturn);
	    		return;
	    	}
	    	else if(val2 == 3){ //batea
	    		$('#bodybatea tr').remove();
	    		tablebatea(arrayReturn);
	    		return;
	    	}
	    	else if(val2 == 4){ //batea
	    		$('#bodypunta tr').remove();
	    		tablepunta(arrayReturn);
	    		return;
	    	}
	    	else if(val2 == 5){ //batea
	    		$('#bodytrefila tr').remove();
	    		tabletrefila(arrayReturn);
	    		return;
	    	}
	    	else if(val2 == 6){ //batea
	    		$('#bodyenderezadora tr').remove();
	    		tableenderezamiento(arrayReturn);
	    		return;
	    	}
	    	else if(val2 == 7){ //batea
	    		$('#bodycorte tr').remove();
	    		tablecorte(arrayReturn);
	    		return;
	    	}
	    	else {
	    		return;
	    	}

	    }
	  });
  }

  var valuepr = 1;
  var ajax = correrproceso(valuepr);


  $("input[name='traza']").on("click", function(){
  	var idmp = $(this).attr('id');
  });

  $("#tabpreparacion").on("click", function(){
  	valuepr = 1;

  	correrproceso(valuepr);

  });

  $("#tabhorno").on("click", function(){
  	valuepr = 2;

  	correrproceso(valuepr);

  });


  $("#tabbatea").on("click", function(){
  	valuepr = 3;

  	correrproceso(valuepr);

  });

  $("#tabpunta").on("click", function(){
  	valuepr = 4;

  	correrproceso(valuepr);

  });

  $("#tabtrefila").on("click", function(){
  	table = "trefila";
  	valuepr = 5;

  	correrproceso(valuepr);

  });

  $("#tabenderezadora").on("click", function(){
  	valuepr = 6;

  	correrproceso(valuepr);

  });

  $("#tabcorte").on("click", function(){
  	valuepr = 7;

  	correrproceso(valuepr);

  });

  

  $("#procesar").on("click", function(){

  	//processRequired(resultados());
  	//return;
  	var checkedBox = [];

  	var valor = '#eje'+valuepr;
  	getCheckedBox(valor);

  	function getCheckedBox(id) {
  	  
  	  checkedBox = $.map($(id+':checked'), 
  	                         function(val, i) {
  	                            return val.value;
  	                         });

  	  if (checkedBox.length == 0){
  	  	$.toast({ 
  	  	  text : "Debe de Ejecutar al menos un Proceso!", 
  	  	  showHideTransition : 'slide',  
  	  	  bgColor : 'red',              
  	  	  textColor : '#eee',            
  	  	  allowToastClose : false,     
  	  	  hideAfter : 5000,              
  	  	  stack : 5,                    
  	  	  textAlign : 'left',            
  	  	  position : 'top-right'       
  	  	});
  	  	return;

  	  }

  	  console.log(checkedBox);

  	  var valid = true;
  	  if(valuepr==1)
  	  	valid = validCheckMP(checkedBox);

  	  if(valid){
  	  	ejecutarproceso(checkedBox, valuepr);
		$("#procesar").prop('disabled', true);  	  	
  	  }

  	}

  });

  // $.ajaxSetup({
  //     headers: {
  //         'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  //     }
  // });

  
  function validCheckMP(list){
  	var cont=false;
  	var supera = false;

  	for (var i = 0; i < list.length; i++) {
  		var e = list[i]; //idmp

  		if($('#ktotal-'+e).val().length>0){
	  		var divs = $(".trazadiv-"+e).length;
	  		if (divs > 0){
	  			cont = true;
	  			for (var k = 0; k < divs; k++) {
	  				var traza = $('#trazai-'+e+'-'+k);
	  				var kilosingresados = $('#kgsi-'+e+'-'+k).val();
	  				var max = $('#cant-'+e+'-'+k).val(); /// kilos max para validar campos
	  				var id = $('#idtraza-'+e+'-'+k).val();
	  				if(kilosingresados.length>0){
		  				if(parseInt(kilosingresados)>parseInt(max)){
		  					$('#kgsi-'+e+'-'+k).focus();
		  					supera = true;
		  					cont = false;
		  				}  					
	  				}
	  				else{
	  					$('#kgsi-'+e+'-'+k).focus();
	  					cont = false;
	  				}
	  			}
	  		}  			
  		}
  		else{
  			cont = false;
  			$('#ktotal').focus();
  		}
  	}

  	if(!cont){
  		if(supera){
  			AlertToast("La cantidad seleccionada es superior al stock de kilos.", "red");
  		}
  		else{
	  		AlertToast("Debe seleccionar la orden y completar los kilogramos", "red");
  		}
  	}
  	return cont;
  }


  function AlertToast(dataText="", colorFont="green"){
  	$.toast({ 
  	  text : dataText, 
  	  showHideTransition : 'slide',  
  	  bgColor : colorFont,              
  	  textColor : '#eee',            
  	  allowToastClose : false,     
  	  hideAfter : 5000,              
  	  stack : 5,                    
  	  textAlign : 'left',            
  	  position : 'top-right'       
  	});
  }


});

</script>
@endsection