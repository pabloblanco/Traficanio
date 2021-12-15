@extends('layouts.app')

@section('content')

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
									<h2>Procesos Tour</h2>
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
								<h5>Listado para tour en fábrica según los procesos</h5>
								<div class="x_content">
									<div class="" role="tabpanel" data-example-id="togglable-tabs">
										<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
											<li role="presentation" class="active"><a href="#tab_content1" id="tabmp" role="tab" data-toggle="tab" aria-expanded="true">Preparación MP</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content2" role="tab" id="tabhorno" data-toggle="tab" aria-expanded="false">Horno</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content3" role="tab" id="tabbatea" data-toggle="tab" aria-expanded="false">Batea</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content4" role="tab" id="tabpunta" data-toggle="tab" aria-expanded="false">Punta</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content5" role="tab" id="tabtrefila" data-toggle="tab" aria-expanded="false">Trefila</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content6" role="tab" id="tabenderezado" data-toggle="tab" aria-expanded="false">Enderezadora</a>
											</li>
											<li role="presentation" class=""><a href="#tab_content7" role="tab" id="tabcorte" data-toggle="tab" aria-expanded="false">Corte</a>
											</li>
										</ul>
										<div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
										<div id="myTabContent" class="tab-content">    
											<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
												<div class="table-responsive">
												<h6><strong>Operación MP Pendientes</strong></h6>
												<span>Sólo operaciones con paquetes <input type="checkbox" class="flat" id="b-paquetes" name="table_records">
												<a id="buscarpaq" type="button" class="btn btn-default btn-sm">Buscar</a>
												 
												</span> 
													<table class="table table-striped jambo_table bulk_action">
														<thead>
															<tr class="headings">
																<th class="column-title">Fecha</th>
																<th class="column-title">Cliente</th>
																<th class="column-title">Dia. Ext.</th>
																<th class="column-title">Espesor</th>
																<th class="column-title">Mts</th>
																<th class="column-title">Kgs </th>
																<th>Kgs a preparar</th>
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

												<h6><strong>Hornos Pendientes</strong></h6>
													<table class="table table-striped jambo_table bulk_action">
														<thead>
															<tr class="headings">
																<th class="column-title">Fecha</th>
																<th class="column-title">Cliente</th>
																<th class="column-title">Dia. Ext.</th>
																<th class="column-title">Espesor</th>
																<th class="column-title">Mts</th>
																<th class="column-title">Kgs </th>
																<th class="column-title">Kgs a preparar</th>
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
																<th class="column-title">HRB Entrada</th>
																<th class="column-title">HRB Salida</th>
																<th class="column-title">Registro m<sup>3</sup> gas</th>
																<th class="column-title">T de MUFLA</th>
																<th class="column-title">Veloc. M/H</th>
																<th class="column-title">Color Salida</th>
																<th class="column-title">Aire</th>
																<th class="column-title">Gas</th>
																<th class="column-title">Operario</th>
															</tr>
														</thead>
														<tbody id="bodyhorno">
															
														</tbody>
													</table>
												</div><br>
											
											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
												<div class="table-responsive">
													<h6><strong>Puntas Pendientes</strong></h6>

													<table class="table table-striped jambo_table bulk_action">
														<thead>
															<tr class="headings">
																<th class="column-title">Fecha</th>
																<th class="column-title">Cliente</th>
																<th class="column-title">Dia. Ext.</th>
																<th class="column-title">Espesor</th>
																<th class="column-title">Mts</th>
																<th class="column-title">Kgs </th>
																<th class="column-title">Kgs a prepara </th>
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
															</tr>
														</thead>
														<tbody id="bodybatea">
															
														</tbody>
												</table>
											</div><br>
											
										</div>
										<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
											<div class="table-responsive">
												<h6><strong>Puntas Pendientes</strong></h6>

												<table class="table table-striped jambo_table bulk_action">
													<thead>
														<tr class="headings">
															<th class="column-title">Fecha</th>
															<th class="column-title">Cliente</th>
															<th class="column-title">Dia. Ext.</th>
															<th class="column-title">Espesor</th>
															<th class="column-title">Mts</th>
															<th class="column-title">Kgs </th>
															<th class="column-title">Kgs a preparar</th>
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
															<th class="column-title">Hora Ini OP</th>                              
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
											<h6><strong>Trefilas Pendientes</strong></h6>

											<table class="table table-striped jambo_table bulk_action">
												<thead>
													<tr class="headings">
													    <th class="column-title">Nº Trefila</th>
														<th class="column-title">Fecha</th>
														<th class="column-title">Cliente</th>
														<th class="column-title">Dia. Ext.</th>
														<th class="column-title">Espesor</th>
														<th class="column-title">Mts</th>
														<th class="column-title">Kgs </th>
														<th class="column-title">Kgs a preparar</th>
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
														<th class="column-title">Hora Inicial Prep</th>
														<th class="column-title">Hora Ini OP</th>                              
														<th class="column-title">Hora Fin OP</th>                          
														<th class="column-title">Operario</th>
														<th class="column-title">Observaciones</th>
														

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
													<th class="column-title">Fecha</th>
													<th class="column-title">Cliente</th>
													<th class="column-title">Dia. Ext.</th>
													<th class="column-title">Espesor</th>
													<th class="column-title">Mts</th>
													<th class="column-title">Kgs </th>
													<th class="column-title">Kgs a preparar </th>
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
											<tbody id="bodyenderezado">
												
											</tbody>
									</table>
								</div><br>
								
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
								<div class="table-responsive">
									<table class="table table-striped jambo_table bulk_action">
										<thead>
											<tr class="headings">
												<th class="column-title">Fecha</th>
												<th class="column-title">Cliente</th>
												<th class="column-title">Dia. Ext.</th>
												<th class="column-title">Espesor</th>
												<th class="column-title">Mts</th>
												<th class="column-title">Kgs </th>
												<th class="column-title">Kgs a preparar</th>
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

				</div>
			</div>
			<div id="buttonejecutar" class="row">
				
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
	//// CONVERTIR FECHA ////

	var intcadena = 0;

	function FechaAFormato(fecha_recibida)
	{
	  var nuevafecha = fecha_recibida.split("-");
	  nuevafecha  = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
	  return nuevafecha;
	}

	//END CONVERTIR FECHA //


	function cargabotton(cadena, tipo){
	  	var valor = nombreproceso(tipo);

		if (cadena.length>0){
			intcadena = cadena.length;
			var button = `<div class="col-md-1">
		  	  			<button type="button" id="procesar" class="btn btn-primary btn-sm">Ejecutar</button>
			  	  		</div>`;	  	  		
			$('#buttonejecutar').append(button);
			return true;
		}
		else{
			$('#buttonejecutar div').remove();
			var button = `<div class="col-md-3">
					<p>No hay ${valor} pendientes de impresión</p>	  	  		
		  	  		</div>`;	  	  		
		 	$('#buttonejecutar').append(button);
		 	return false;
		}	  	  		
	}

	function nombreproceso(tipo){
		if (tipo == 1){
			return "Preparacion MP";
		}
		else if(tipo == 2){
			return "Horno";
  		}
  		else if(tipo == 3){
  			return "Batea";	  	  			
  		}
  		else if(tipo == 4){
  			return "Punta";	  	  			
  		}
  		else if(tipo == 5){
  			return "Trefila";	  	  			
  		}
 		else if(tipo == 6){
			return "Enderezadora";	  	  			
  		}
  		else if(tipo == 7){
  			return "Corte";	  	  			
  		}
  		else{
 			return "No Encontrado/Sin proceso";  	  			
  		}
  	}

  	function open_tour(cadena, tipo){

  		if (tipo == 1)
  			intcadena = 0;

  		$.ajaxSetup({
  		    headers: {
  		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  		    }
  		});
  		$.ajax({  
  		  type: "PUT",
  		  url: "{{route('openTour')}}",
  		  data: {
  		  	'dataids': JSON.stringify(cadena),
  		  	'tipo': tipo
  		  },
  		  success: function(data){
  		  	if (data == "true"){
  		  		location.reload();
  		  	}
  		  }
  		})

  		return true;

  	}
	
	mostrarprocesos(1, 0);		

	////EVENTOS CLICK D LOS TAB ////

	$("#tabmp").on("click", function(){
		if (intcadena > 0){
			$('#buttonejecutar div').remove();
			var button = `<div class="col-md-1">
		  	  			<button type="button" id="procesar" class="btn btn-primary btn-sm">Ejecutar</button>
			  	  		</div>`;	  	  		
			$('#buttonejecutar').append(button);
		}
		else{
			$('#buttonejecutar div').remove();
			var button = `<div class="col-md-3">
					<p>No hay PreparacionMP pendientes de impresión</p>	  	  		
		  	  		</div>`;	  	  		
		 	$('#buttonejecutar').append(button);
		}
		return;
	});

	$("#tabhorno").on("click", function(){
		mostrarprocesos(2, 0);
	});

	$("#tabbatea").on("click", function(){
		mostrarprocesos(3, 0);
	});

	$("#tabpunta").on("click", function(){
		mostrarprocesos(4, 0);
	});

	$("#tabtrefila").on("click", function(){
		mostrarprocesos(5, 0);
	});

	$("#tabenderezado").on("click", function(){
		mostrarprocesos(6, 0);
	});

	$("#tabcorte").on("click", function(){
		mostrarprocesos(7, 0);
	});
	///////// END EVENT TAB ////////

	  ///////METODO VISUALIZAR REGISTROS///////
	  function mostrarprocesos(tipo, paq){
	  	console.log(paq);
	  	$.ajax({  
	  	  type: "get",
	  	  url: "{{route('mostrarprocesos')}}",
	  	  data: {
	  	    'tipo' : tipo,
	  	    'eje': 0,
	  	    'accion': 0,
	  	    'paq': paq
	  	  },
	  	  beforeSend: function() {
	  	    $('#loader').show();
	  	  },
	  	  complete: function(){
	  	    $('#loader').hide();
	  	  },
	  	  success: function(data){
	  	  	var arrayReturn = data.resultado;
	  	  	var cadena = [];

	  	  	cadena = arrayReturn.cadena;

	  	  	if (tipo == 1){
	  	  		tablepreparacionmp(arrayReturn);
	  	  		
	  	  	}
	  	  	else if (tipo == 2){
	  	  		tablehorno(arrayReturn);
	  	  		
	  	  	}
	  	  	else if (tipo == 3){
	  	  		tablebatea(arrayReturn);
	  	  		
	  	  	}
	  	  	else if (tipo == 4){
	  	  		tablepunta(arrayReturn);
	  	  		
	  	  	}
	  	  	else if (tipo == 5){
	  	  		tabletrefila(arrayReturn);
	  	  		
	  	  	}
	  	  	else if (tipo == 6){
	  	  		tableenderezado(arrayReturn);
	  	  		
	  	  	}
	  	  	else if (tipo == 7){
	  	  		tablecorte(arrayReturn);
	  	  		
	  	  	}
	  	  	else{
	  	  		return false;
	  	  	}

	  	  	cargabotton(cadena, tipo);

	  	  	////////BUTTON EJECUTAR /////////
		  	$("#procesar").on("click", function(){
		  		open_tour(cadena, tipo);
		  	});  
	  	  	///////END BUTTON EJECUTAR ////////

	  	  }
	  	});

	  	return true;
	  }
	///////END METODO VISIALIZAR REGISTROS ///////

	$("#buscarpaq").on("click", function(){

		var paquetes = $('#b-paquetes').is(':checked');
		$('#bodymp tr').remove();	
		$('#buttonejecutar div').remove();

		var p = 0;

		if (paquetes == true){
			p = 1;

			mostrarprocesos(1, p);
		}
		else{
			mostrarprocesos(1, p);
		}
		return;


	});

	//////// METODOS VER TABLAS /////////
	function tablepreparacionmp(data){
		var registros = data.procesos;
		var cadenas = data.cadena;

		for (var i = 0; i < registros.length; i++) {
			var e = registros[i];

			var fecha = e.fechapedido;
			var cliente = e.cliente;
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
			var kilosap = e.kilosap;
			var lg = e.lg;

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

			if (lg == null){
			  lg = 0;
			}

			if (kilosap == null){
			  kilosap = 0;
			}


	  		var tr = `<tr class="even pointer">
							<td class=" ">${f}</td>
							<td class=" ">${cliente}</td>
							<td class=" ">${diamex}</td>
							<td class=" ">${esp}</td>
							<td class=" ">${mts}</td>
							<td class="a-right a-right ">${kgs}</td>
							<td class=" last">0${kilosap}</td>
							<td class=" last">${piezas}</td>
							<td class=" last">${tratamiento}</td>
							<td class=" ">${orden}</td>
							<td>${urg}</td>
							<td>${proveedor}</td>
							<td>${diametroExterior}</td>
							<td class=" ">${espesor}</td>
							<td class=" ">${costura}</td>
							<td>${lg}</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>`;

			$('#bodymp').append(tr);
		}
	}

	function tablehorno(data){
		var registros = data.procesos;
		var cadenas = data.cadena;

		for (var i = 0; i < registros.length; i++) {
			var e = registros[i];

			var fecha = e.fechapedido;
			var cliente = e.cliente;
			var diamex = e.diamex;
			var esp = e.espe;
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
			var kilosap = e.kilosap;

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

			if (kilosap == null){
			  kilosap = 0;
			}

			var tr = `<tr class="even pointer">
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
						<td class=" "></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					  </tr>`;

			$('#bodyhorno').append(tr);
		}

	}

	function tablebatea(data){
		var registros = data.procesos;
		var cadenas = data.cadena;

		for (var i = 0; i < registros.length; i++) {
			var e = registros[i];

			var fecha = e.fechapedido;
			var cliente = e.cliente;
			var diamex = e.diamex;
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
			var kilosap = e.kilosap;
			var lg      = e.lg;

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

			if (kilosap == null){
			  kilosap = 0;
			}

			if (lg == null){
			  lg = 0;
			}

			var tr = `<tr class="even pointer">
													<td class=" ">${f}</td>
													<td class=" ">${cliente}</td>
													<td class=" ">${diamex}</td>
													<td class=" ">${esp}</td>
													<td class=" ">${mts}</td>
													<td class="a-right a-right ">${kgs}</td>
													<td class=" last">${kilosap}</td>
													<td class=" last">${tratamiento}</td>
													<td class=" ">${orden}</td>
													<td>${urg}</td>
													<td>${proveedor}</td>
													<td>${diametroExterior}</td>
													<td class=" ">${espesor}</td>
													<td class=" ">${costura}</td>
													<td>${lg}</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
					                                <td></td>
												   <td></td>
												
											</tr>`;

			$('#bodybatea').append(tr);


		}
	}

	function tablepunta(data){
		var registros = data.procesos;
		var cadenas = data.cadena;

		for (var i = 0; i < registros.length; i++) {
			var e = registros[i];

			var fecha = e.fechapedido;
			var cliente = e.cliente;
			var diamex = e.diamex;
			var esp = e.espe;
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
			var kilosap = e.kilosap;
			var lg      = e.lg;
			
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

			if (kilosap == null){
			  kilosap = 0;
			}

			if (lg == null){
			  lg = 0;
			}

			var tr = `<tr class="even pointer">
							<td class=" ">${f}</td>
							<td class=" ">${cliente}</td>
							<td class=" ">${diamex}</td>
							<td class=" ">${esp}</td>
							<td class=" ">${mts}</td>
							<td class="a-right a-right ">${kgs}</td>
							<td class=" last">${kilosap}</td>
							<td class=" last">${piezas}</td>
							<td class=" ">${tratamiento}</td>
							<td class=" ">${orden}</td>
							<td>${urg}</td>
							<td>${proveedor}</td>
							<td>${diametroExterior}</td>
							<td class=" ">${espesor}</td>
							<td class=" ">${costura}</td>
							<td>${lg}</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						
					  </tr> `;	

			$('#bodypunta').append(tr);
		}


	}

	function tabletrefila(data){
		var registros = data.procesos;
		var cadenas = data.cadena;

		for (var i = 0; i < registros.length; i++) {
			var e = registros[i];

			var nrotrefila = e.nrotrefila;
			var fecha = e.fechapedido;
			var cliente = e.cliente;
			var diamex = e.diamext;
			var esp = e.espe;
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
			var kilosap = e.kilosap;
			var lg      = e.lg;

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

			if (kilosap == null){
			  kilosap = 0;
			}

			if (lg == null){
			  lg = 0;
			}

			if (nrotrefila == null){
			  nrotrefila = 0;
			}

			var tr = `<tr class="even pointer">
								<td class=" ">${f}</td>
								<td class=" ">${cliente}</td>
								<td class=" ">${diamex}</td>
								<td class=" ">${esp}</td>
								<td class=" ">${mts}</td>
								<td class="a-right a-right ">${kgs}</td>
								<td class=" last">${kilosap}</td>
								<td class=" last">${tratamiento}</td>
								<td class=" ">${orden}</td>
								<td>${urg}</td>
								<td>${proveedor}</td>
								<td>${diametroExterior}</td>
								<td class=" ">${espesor}</td>
								<td class=" ">${costura}</td>
								<td>${lg}</td>
								<td>${nrotrefila}</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							    <td></td>
							    <td></td>
							    <td></td>
							    <td></td>
							
						</tr>`;

			$('#bodytrefila').append(tr);
		}
	}

	function tableenderezado(data){
		var registros = data.procesos;
		var cadenas = data.cadena;

		for (var i = 0; i < registros.length; i++) {
			var e = registros[i];

			var fecha = e.fechapedido;
			var cliente = e.cliente;
			var diamex = e.diamex;
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
			var kilosap = e.kilosap;
			var lg      = e.lg;


			var tr = `<tr class="even pointer">
						<td class=" ">${f}</td>
						<td class=" ">${cliente}</td>
						<td class=" ">${diamext}</td>
						<td class=" ">${esp}</td>
						<td class=" ">${mts}</td>
						<td class="a-right a-right ">${kgs}</td>
						<td class=" last">${kilosap}</td>
						<td class=" last">${tratamiento}</td>
						<td class=" ">${orden}</td>
						<td>${urg}</td>
						<td>${proveedor}</td>
						<td>${diametroExterior}</td>
						<td class=" ">${espesor}</td>
						<td class=" ">${costura}</td>
						<td>${lg}</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					    <td>r</td>
					    <td></td>
					    <td></td>
					
					  </tr>`;

			$('#bodyenderezado').append(tr);
		}
	}

	function tablecorte(data){
		var registros = data.procesos;
		var cadenas = data.cadena;

		for (var i = 0; i < registros.length; i++) {
			var e = registros[i];

			var fecha = e.fechapedido;
			var cliente = e.cliente;
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
			var kilosap = e.kilosap;
			var lg      = e.lg;

			var tr = `<tr class="even pointer">
						<td class=" ">${f}</td>
						<td class=" ">${cliente}</td>
						<td class=" ">${diamex}</td>
						<td class=" ">${esp}</td>
						<td class=" ">${mts}</td>
						<td class="a-right a-right ">${kgs}</td>
						<td class=" last">${kilosap}</td>
						<td class=" ">${piezas}</td>
						<td class=" last">${tratamiento}</td>
						<td>${orden}</td>
						<td>${urg}</td>
						<td>${proveedor}</td>
						<td class=" ">${diametroExterior}</td>
						<td class=" ">${espesor}</td>
						<td>${costura}</td>
						<td>${lg}</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
				
				      </tr>`;

			$('#bodycorte').append(tr);
		}
	}
	///////// END METODO VER TABLAS ////////



});
</script>

@endsection