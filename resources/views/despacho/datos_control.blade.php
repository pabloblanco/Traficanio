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
									<h2>Modificar Datos De Control</h2>
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
									<div class="row">
										<div class="">
											<div class="table-responsive">
												<table class="table table-striped jambo_table bulk_action">
													<thead>
														<tr class="headings">
															<th class="column-title">N° Orden</th>
															<th class="column-title">Cliente</th>
															<th class="column-title">Di. Ext</th>
															<th class="column-title">Esp</th>
															<th class="column-title">Kilos</th>
															<th class="column-title">Piezas</th>
															<th class="column-title">Metros</th>
															<th class="column-title">Despacho</th>
															<th class="column-title">Remito</th>
															<th class="column-title">Transporte</th>
															<th class="column-title">Paquete</th>
															<th class="column-title">Ctrl. Entrada</th>
															<th class="column-title">Ctrl. Salida</th>
                                                            <th class="column-title">L/E</th>
															<th class="column-title">Control</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($resultados as $r)
															<tr class="even pointer">
																<td>{{$r->ordenid}}</td>
																<td>{{$r->cliente}}</td>		
																<td>{{$r->ext}}</td>
																<td>{{$r->esp}}</td>
																<td>{{$r->kilos}}</td>
																<td>{{$r->piezas}}</td>
																<td>{{$r->metros}}</td>
																<td>{{$r->despacho}}</td>
																<td>{{$r->remito}}</td>
																<td>{{$r->razonTransporte}}</td>
																<td>{{$r->paquetes}}</td>
																<td>{{$r->horaEntrada}}</td>
																<td>{{$r->horaSalida}}</td>
																<td>{{$r->LE}}</td>
																<td>{{$r->controlo}}</td>
															</tr>
														@endforeach
													</tbody>
												</table>
											</div><br>
											
										</div>

									</div>

								</div>

								<form action="  " method="get" accept-charset="utf-8">
									<div class="form-group">
										<div class="row">
											<div class="col-md-4 col-sm-4 col-xs-12">
												<label class="control-label" for="first-name">Despacho</label>
												<select id="despachod" class="form-control">
													<option></option>
													@foreach ($personal as $p)
														<option value="{{$p->id}}">{{$p->nombreCompleto}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<label class="control-label" for="first-name">N° De Remito</label>
												<input type="text" id="remitod" class="form-control col-md-7 col-xs-12">
											</div>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<label class="control-label" for="first-name">Transporte</label>
												<input disabled="" type="text" id="transported" class="form-control col-md-7 col-xs-12">
											</div>>

										</div>
										<div class="row">
											<div class="col-md-4 col-sm-4 col-xs-12">
												<label class="control-label" for="first-name">Paquete</label>
												<input type="text" id="paqueted" class="form-control col-md-7 col-xs-12">
											</div>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<label class="control-label" for="first-name">Control De Entrada</label>
												<input type="text" id="entradad" class="form-control col-md-7 col-xs-12">
											</div>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<label class="control-label" for="first-name">Control De Salida</label>
												<input type="text" id="salidad" class="form-control col-md-7 col-xs-12">
											</div>




										</div>
										<div class="row">
											<div class="col-md-4 col-sm-4 col-xs-12">
												<label class="control-label" for="first-name">L/E</label>
												<input type="text" id="led" class="form-control col-md-7 col-xs-12">
											</div>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<label class="control-label" for="first-name">Control</label>
												<select id="controld" class="form-control">
													<option></option>
													@foreach ($personal as $p)
														<option value="{{$p->id}}">{{$p->nombreCompleto}}</option>
													@endforeach
												</select>
											</div>
										</div>


									</div>


									<div class="form-group">
										<div class="col-md-9 col-sm-9 col-xs-12 ">
											<a id="guardardata" class="btn btn-primary  btn-sm">Guardar</a>
											<a href="{{route('despacho')}}" class="btn btn-success  btn-sm">Volver</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /page content -->
				<input type="hidden" id="ordenid" value="{{$idorden}}" name="">

@endsection

@section('js_extra')
<script type="text/javascript">
   $(function(){
	    var table = $("#datatable-buttonsdespacho").DataTable({
	      "language": {
	            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
	        }
	    });

	    var ordenid = $('#ordenid').val();

	    $("#guardardata").on("click", function(){

	    	$.ajaxSetup({
	    	    headers: {
	    	        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
	    	    }
	    	});

	    	$.ajax({  
	    	  type: "put",
	    	  url: "{{route('update_despacho')}}",
	    	  data: {
	    	  	'ordenid': ordenid,
	    	  	'opControl' : $('#controld').val(),
	    	   	'opDespacho' : $('#despachod').val(),
	    	   	'paquetes': $('#paqueted').val(),
	    	   	'cEntrada': $('#entradad').val(),
	    	   	'cSalida': $('#salidad').val(),
	    	   	'lugar': $('#led').val(),
	    	   	'remito': $('#remitod').val()
	    	  },
	    	  success: function(data){
	    	  	if (data == "true"){
	    	  		$.toast({ 
	    	  		  text : "Procesado con Exito", 
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
	    	  	  text : "Error al Procesar", 
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


	    


	});
</script> 
@endsection
