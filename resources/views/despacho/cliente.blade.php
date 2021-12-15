@extends('layouts.app')

@section('content')

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Despacho</h2>
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
								<div class="row profile_title">
									<div class="col-md-12">
										<span class="titulo-cliente">Despacho N°:{{$idorden}}</span>
									</div>
								</div>
								@if ($res)
									<div class="row profile_title">
										<div class="col-md-12">
											<span class="titulo-cliente">Cliente: {{$res->cliente}}</span>

										</div>
									</div>
									<div class="row profile_title">
										<div class="col-md-4">
											<span class="span-titulos"><strong>Fecha Creación: {{$res->fechaCreacion}}</strong></span>

										</div>
									</div>
									<div class="row profile_title">
										<div class="col-md-4">
											<span class="span-titulos"><strong>Fecha Entrega: {{Carbon\Carbon::parse($res->fechaEntrega)->format('d/m/Y')}}</strong></span>

										</div>
									</div><br>
								@else
									<div class="row profile_title">
										<div class="col-md-12">
											<span class="titulo-cliente">Cliente:</span>

										</div>
									</div>
									<div class="row profile_title">
										<div class="col-md-4">
											<span class="span-titulos"><strong>Fecha Creación: </strong></span>

										</div>
									</div>
									<div class="row profile_title">
										<div class="col-md-4">
											<span class="span-titulos"><strong>Fecha Entrega: </strong></span>

										</div>
									</div><br>
								@endif
								<div class="row">
									<div class="col-md-12">
										<a id="addorden"  class="btn btn-primary btn-sm">Agregar Orden</a>
										<button type="button" class="btn btn-primary btn-sm">Preforma</button>
										<a id="cancelar" type="button" class="btn btn-primary btn-sm">Cancelar</a>
									</div>
								</div>
								<input type="hidden" id="cliente_id" value="{{$cliente_id}}">
								<input type="hidden" id="ordenid" value="{{$idorden}}">


								<div class="x_content">
									<div class="row">
										<div class="">
											<div class="table-responsive">
												<table class="table table-striped jambo_table bulk_action">
													<thead>
														<tr class="headings">
															<th class="column-title">PO N°</th>
															<th class="column-title">Estado</th>
															<th class="column-title">Código De Pieza</th>
															<th class="column-title">Ext</th>
															<th class="column-title">Esp</th>
															<th class="column-title">Cost</th>
															<th class="column-title">Kilos</th>
															<th class="column-title">Piezas</th>
															<th class="column-title">Metros</th>
															<th class="column-title">Paquetes</th>
															<th class="column-title">Certificado</th>
															<th class="column-title">Orden De Compra</th>
															<th class="column-title">Lugar De Entrega</th>
															<th class="column-title">Transporte</th>
															<th class="column-title">N° Remito</th>
															<th class="column-title">Precio</th>
															<th class="column-title">Unidad</th>
															<th class="column-title">Precio De Orden</th>
															<th class="column-title">Moneda</th>
														</tr>
													</thead>
													<tbody>
														@if (count($datos)>0 and count($otras) > 0)
															@foreach ($datos as $tabla)
																<tr class="even pointer">
																	<td>{{$tabla->Orden}}</td>
																	<td>{{$tabla->estado}}</td>
																	<td>{{$tabla->codPieza}}</td>
																	<td>{{$tabla->DiaExtCot}}</td>
																	<td>{{$tabla->EspCot}}</td>
																	<td>{{$tabla->Cost}}</td>
																	<td>{{$tabla->kilos}}</td>
																	<td>{{$tabla->piezas}}</td>
																	<td>{{$tabla->metros}}</td>
																	<td>{{$tabla->paquetes}}</td>
																	<td>{{$tabla->Certificado}}</td>
																	<td>{{$tabla->OrdenCompra}}</td>
																	<td>{{$tabla->lugarEntrega}}</td>
																	<td>{{$tabla->transporte}}</td>
																	<td>{{$tabla->numeroRemito}}</td>
																	<td>{{$tabla->Precio}}</td>
																	<td>{{$tabla->UM}}</td>
																	<td>{{number_format($tabla->PrecioOrden,2)}}</td>
																	<td>{{$tabla->moneda}}</td>		
																</tr>
															@endforeach
															@foreach ($otras as $r)
															<tr>
																<td colspan="16"></td>				
																<td>{{$r->titulo}}</td>
																<td>{{$r->valor}}</td>
																<td>{{$r->moneda}}</td>
															</tr>
															@endforeach

														@else
															<tr class="even pointer">
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
																<td></td>
																<td></td>								
															</tr>
														@endif
													</tbody>
												</table>
											</div><br>
											<div class="row">
												<div class="col-md-12">
													<button type="button" class="btn btn-primary btn-sm">Modificar</button>
													<button type="button" class="btn btn-danger btn-sm">Eliminar</button>

												</div>
											</div>
											<div class="x_content">
												<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
													@if ($res)
														<div class="row">
															<div class="form-group">
																<div class="col-md-4 col-sm-4 col-xs-12">
																<label class="control-label" for="first-name">Fecha De Entrega</label>
																	<div class='input-group date' id='myDatepicker16'>

																		<input id="fechaentregad" value="{{Carbon\Carbon::parse($res->fechaEntrega)->format('d/m/Y')}}" type='text' class="form-control" />
																		<span class="input-group-addon">
																			<span class="fa fa-calendar"></span>
																		</span>
																	</div>
																</div>
																<div class="col-md-4 col-sm-4 col-xs-12">
																	<label class="control-label" for="first-name">IBB (%)</label>
																	<input id="iibbd" value="{{$res->iibb}}" type="text"  class="form-control col-md-7 col-xs-12">
																</div>
																<div class="col-md-4 col-sm-4 col-xs-12">
																	<label class="control-label" for="first-name">Anticipos</label>
																	<input id="anticipod" value="{{$res->anticipo}}" type="text"  class="form-control col-md-7 col-xs-12">
																</div>

															</div>
														</div>

														<div class="row">
															<div class="form-group">
																<div class="col-md-8 col-sm-8 col-xs-12">
																	<label class="control-label" for="first-name">Observaciones</label>
																	<textarea class="text-area" name="" id="observacionesd" >{{$res->observaciones}}</textarea>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3 col-sm-3 col-xs-12">
																<label class="checkbox">A Procesar
																	@if ($res->reprocesar == 1)
																		<input id="procesard" type="checkbox" checked="">
																	@else
																		<input id="procesard" type="checkbox">
																	@endif
																	<span class="check"></span>
																</label>
															</div>
														</div>
													@else
														<div class="row">
															<div class="form-group">
																<div class="col-md-4 col-sm-4 col-xs-12">
																<label class="control-label" for="first-name">Fecha De Entrega</label>
																	<div class='input-group date' id='myDatepicker16'>

																		<input id="fechaentregad" type='text' class="form-control" />
																		<span class="input-group-addon">
																			<span class="fa fa-calendar"></span>
																		</span>
																	</div>
																</div>
																<div class="col-md-4 col-sm-4 col-xs-12">
																	<label class="control-label" for="first-name">IBB (%)</label>
																	<input id="iibbd" type="text" id=""  class="form-control col-md-7 col-xs-12">
																</div>
																<div class="col-md-4 col-sm-4 col-xs-12">
																	<label class="control-label" for="first-name">Anticipos</label>
																	<input id="anticipod" type="text" id=""  class="form-control col-md-7 col-xs-12">
																</div>

															</div>
														</div>

														<div class="row">
															<div class="form-group">
																<div class="col-md-8 col-sm-8 col-xs-12">
																	<label class="control-label" for="first-name">Observaciones</label>
																	<textarea id="observacionesd" class="text-area" name="" id="" ></textarea>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3 col-sm-3 col-xs-12">
																<label class="checkbox">A Procesar
																	<input id="procesard" type="checkbox">
																	<span class="check"></span>
																</label>
															</div>
														</div>
													@endif

												</form>
											</div>

											<div class="row">
												<div class="col-md-12">
													<a id="guardar" class="btn btn-primary btn-sm">Guardar</a>
													<a id="facturar" class="btn btn-primary btn-sm">Facturar</a>
													<a href="{{route('autorizacion')}}"  class="btn btn-primary btn-sm">Volver</a>
												</div>
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
   	var idorden = $('#ordenid').val();
   	var cliente = $('#cliente_id').val();

   	$("#addorden").on('click', function(){
	   	var urldirec = window.location.origin + "/public/index.php/agregar_despacho/" + idorden+ "/" + cliente;
	   	window.location.href = urldirec;
   	});

   	$("#facturar").on('click', function(){

   		$.ajaxSetup({
   		    headers: {
   		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
   		    }
   		});

   		$.ajax({  
   		  type: "put",
   		  url: "{{route('estadodespacho')}}",
   		  data: {
   		  	'id': idorden
   		  },
   		  success: function(data){

   		  }
   		});

   	});

   	function convertirFechaAFormato(fecha_recibida)
   	{
   	  //console.log(fecha_recibida);
   	  var nuevafecha = fecha_recibida.split("/");
   	  nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
   	  return nuevafecha;
   	}


   	$("#guardar").on('click', function(){

   		var fecha = $('#fechaentregad').val();
   		var obs = $('#observacionesd').val();
   		var anti = $('#anticipod').val();
   		var procesar =  $('#procesard').is(':checked');
   		var iibb = $('#iibbd').val();
   		var p = 0;

   		if (fecha){
   		  var fecha = convertirFechaAFormato(fecha);
   		  
   		}
   		else {
   		  var fecha = null;
   		}

   		if (procesar == true)
   			p = 1;

   		$.ajaxSetup({
   		    headers: {
   		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
   		    }
   		});

   		$.ajax({  
   		  type: "post",
   		  url: "{{route('guardar_despacho')}}",
   		  data: {
   		  	'id': idorden,
   		  	'fecha': fecha,
   		  	'obs': obs,
   		  	'iibb': iibb,
   		  	'anticipo': anti,
   		  	'aprocesar': p
   		  },
   		  success: function(data){
   		  	if (data == "true"){
   		  		$.toast({ 
   		  		  text : "Su Cotizacion se ha Creado con Exito", 
   		  		  showHideTransition : 'slide',  
   		  		  bgColor : 'green',              
   		  		  textColor : '#eee',            
   		  		  allowToastClose : false,     
   		  		  hideAfter : 5000,              
   		  		  stack : 5,                    
   		  		  textAlign : 'left',            
   		  		  position : 'top-right'       
   		  		});
   		  		return;
   		  	}
   		  	$.toast({ 
   		  	  text : "Error al Crear Cotizacion", 
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
   		});

   	});

   	$("#cancelar").on('click', function(){
   		$.ajaxSetup({
   		    headers: {
   		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
   		    }
   		});

   		$.ajax({  
   		  type: "delete",
   		  url: "{{route('cancelar_despacho')}}",
   		  data: {
   		  	'id': idorden
   		  },
   		  success: function(data){
   		  	if (data == "true"){
   		  		$.toast({ 
   		  		  text : "Se ha Cancelado Con Exito", 
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
   		  }
   		});
   	});



   });
</script>

@endsection