@extends('layouts.app')

@section('content')

<!-- page content -->

    <!--  modal Agregar punzon-->	
	    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
	      <div class="modal-dialog modal-md">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	            </button>
	            <h4 class="modal-title" id="myModalLabel2">Agregar Transporte</h4>
	          </div>
	          <div class="modal-body cuerpo-modal">
	              								<div class="row">
	              										<div class="x_content">
	              											<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
	              												<div class="row">
	              													<div class="form-group">
	              														<div class="col-md-4 col-sm-4 col-xs-12">
	              															<label class="control-label" for="first-name">Razón Social</label>
	              															<input type="text" id="razona" class="form-control col-md-7 col-xs-12">
	              														</div>
	              														<div class="col-md-4 col-sm-4 col-xs-12">
	              															<label class="control-label" for="first-name">Dierección</label>
	              															<input type="text" id="direcciona" class="form-control col-md-7 col-xs-12">
	              														</div>
	              														<div class="col-md-4 col-sm-4 col-xs-12">
	              															<label class="control-label" for="first-name">Código Postal</label>
	              															<input type="text" id="codigoPostala" class="form-control col-md-7 col-xs-12">
	              														</div>
	              													</div>
	              												</div>
	              												<div class="row">
	              													<div class="form-group">
	              														<div class="col-md-6 col-sm-6 col-xs-12">
	              															<label class="control-label" for="first-name">Email</label>
	              															<input type="text" id="emaila" class="form-control col-md-7 col-xs-12">
	              														</div>
	              														<div class="col-md-6 col-sm-6 col-xs-12">
	              															<label class="control-label" for="first-name">Contacto</label>
	              															<input type="text" id="contactoa" class="form-control col-md-7 col-xs-12">
	              														</div>
	              													</div>
	              												</div>
	              												<div class="row">
	              													<div class="form-group">
	              														<div class="col-md-4 col-sm-4 col-xs-12">
	              															<label class="control-label" for="first-name">Teléfono 1</label>
	              															<input type="text" id="telefono1a" class="form-control col-md-7 col-xs-12">
	              														</div>
	              														<div class="col-md-4 col-sm-4 col-xs-12">
	              															<label class="control-label" for="first-name">Teléfono 2</label>
	              															<input type="text" id="telefono2a" class="form-control col-md-7 col-xs-12">
	              														</div>
	              														<div class="col-md-4 col-sm-4 col-xs-12">
	              															<label class="control-label" for="first-name">Teléfono 3</label>
	              															<input type="text" id="telefono3a" class="form-control col-md-7 col-xs-12">
	              														</div>
	              													</div>
	              												</div>
	              												<div class="row">
	              													<div class="form-group">
	              														<div class="col-md-4 col-sm-4 col-xs-12">
	              															<label class="control-label" for="first-name">Celular</label>
	              															<input type="text" id="celulara" class="form-control col-md-7 col-xs-12">
	              														</div>
	              														<div class="col-md-4 col-sm-4 col-xs-12">
	              															<label class="control-label" for="first-name">Horario de Recepción</label>
	              															<input type="text" id="horarioRecepciona" class="form-control col-md-7 col-xs-12">
	              														</div>
	              														<div class="col-md-4 col-sm-4 col-xs-12">
	              															<label class="control-label" for="first-name">Localidad</label>
	              															<input type="text" id="localidadida" class="form-control col-md-7 col-xs-12">
	              														</div>
	              													</div>
	              												</div>
	              												<div class="row">
	              													<div class="form-group">
	              														
	              														<div class="col-md-8 col-sm-8 col-xs-12">
	              														<label class="control-label" for="first-name">Observaciones</label>
	              															<textarea class="text-area" name="" id="observacionesa" ></textarea>
	              														</div>
	              													</div>
	              												</div>
	              											</form>
	              										</div>
	              								</div>

	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
	            <a id="guardar" class="btn btn-primary">Guardar</a>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- /modals agregar Punzones-->

<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Seleccione Transporte</h2>
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
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<label class="control-label" for="first-name">Transporte</label>
									<select id="transporte" class="form-control">
										<option value="0" selected>Seleccione un Transporte</option>
										@foreach ($transportes as $transporte)
											<option value="{{$transporte->id}}">{{$transporte->razon}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 ">
									<button type="button" id="buscar" class="btn btn-primary  btn-sm">Buscar</button>
									<button type="button" id="limpiar" class="btn btn-success  btn-sm">Limpiar</button>
									<button type="button" id="update" class="btn btn-warning  btn-sm">Guardar</button>
									<button type="button" id="delete" class="btn btn-danger  btn-sm">Eliminar</button>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
							</div>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
							<div class="x_content">
								<div class="row">
									<div class="">
										<div class="x_title">
										<h2>Datos Generales</h2>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
												<div class="row">
													<div class="form-group">
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Razón Social</label>
															<input type="text" id="razon" class="form-control col-md-7 col-xs-12">
														</div>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Dierección</label>
															<input type="text" id="direccion" class="form-control col-md-7 col-xs-12">
														</div>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Código Postal</label>
															<input type="text" id="codigoPostal" class="form-control col-md-7 col-xs-12">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6 col-xs-12">
															<label class="control-label" for="first-name">Email</label>
															<input type="text" id="email" class="form-control col-md-7 col-xs-12">
														</div>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<label class="control-label" for="first-name">Contacto</label>
															<input type="text" id="contacto" class="form-control col-md-7 col-xs-12">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Teléfono 1</label>
															<input type="text" id="telefono1" class="form-control col-md-7 col-xs-12">
														</div>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Teléfono 2</label>
															<input type="text" id="telefono2" class="form-control col-md-7 col-xs-12">
														</div>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Teléfono 3</label>
															<input type="text" id="telefono3" class="form-control col-md-7 col-xs-12">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Celular</label>
															<input type="text" id="celular" class="form-control col-md-7 col-xs-12">
														</div>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Horario de Recepción</label>
															<input type="text" id="horarioRecepcion" class="form-control col-md-7 col-xs-12">
														</div>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Localidad</label>
															<input type="text" id="localidadid" class="form-control col-md-7 col-xs-12">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														
														<div class="col-md-8 col-sm-8 col-xs-12">
														<label class="control-label" for="first-name">Observaciones</label>
															<textarea class="text-area" name="" id="observaciones" ></textarea>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<ul class="nav navbar-right panel_toolbox">
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					  </li>
					  <li class="">
					    <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Transporte</button>


					  </li>

					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->

@endsection

@section('js_extra')
<script type="text/javascript">
  $(function(){
    var select_id = 0;

    var existebusqueda = 0;

    $('#transporte').on('change', function(){
    	select_id = $(this).val();
    });

    function vertransporte(){
    	$.ajaxSetup({
    	    headers: {
    	        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
    	    }
    	});

    	var url = "buscar_transporte/" + select_id;

    	$.ajax({  
    	  type: "GET",
    	  url: url,
    	  success: function(data){
    	  	existebusqueda = 1;

    	  	$("#razon").val(data.razon);
    	  	$("#direccion").val(data.direccion);
    	  	$("#codigoPostal").val(data.codigoPostal);
    	  	$("#telefono1").val(data.telefono1);
    	  	$("#telefono2").val(data.telefono2);
    	  	$("#telefono3").val(data.telefono3);
    	  	$("#fax").val(data.fax);
    	  	$("#celular").val(data.celular);
    	  	$("#contacto").val(data.contacto);
    	  	$("#horarioRecepcion").val(data.horarioRecepcion);
    	  	$("#email").val(data.email);
    	  	$("#observaciones").val(data.observaciones);
    	  	$("#localidadid").val(data.localidadid);
    	  }
    	});
    }

    $('#buscar').on('click', function(){

    	vertransporte();
    	
    });

    $('#delete').on('click', function(){
    	if (existebusqueda > 0){
    		$.ajaxSetup({
    		    headers: {
    		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
    		    }
    		});

    		var url = "deletetransporte/" + select_id;

    		$.ajax({  
    		  type: "delete",
    		  url: url,
    		  success: function(data){
    		  	if (data == "true"){
    		  		$.toast({ 
    		  		  text : "Registro Eliminado Exitosamente", 
    		  		  showHideTransition : 'slide',  
    		  		  bgColor : 'red',              
    		  		  textColor : '#eee',            
    		  		  allowToastClose : false,     
    		  		  hideAfter : 3000,              
    		  		  stack : 5,                    
    		  		  textAlign : 'left',            
    		  		  position : 'top-right'       
    		  		});

    		  		location.reload();    		  		
    		  	}
    		  	return;
    		  }
    		});
    		return;
    	}
    	$.toast({ 
    	  text : "No ha realizado ninguna busqueda!", 
    	  showHideTransition : 'slide',  
    	  bgColor : 'red',              
    	  textColor : '#eee',            
    	  allowToastClose : false,     
    	  hideAfter : 5000,              
    	  stack : 5,                    
    	  textAlign : 'left',            
    	  position : 'top-right'       
    	});
    	return false;

    });

    $('#update').on('click', function(){
    	if (existebusqueda > 0){

    		$.ajaxSetup({
    		    headers: {
    		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
    		    }
    		});

    		var url = "updatetransporte/" + select_id;

    		$.ajax({  
    		  type: "put",
    		  url: url,
    		  data:{
    		  	'razon': $("#razon").val(),
    		  	'direccion': $("#direccion").val(),
    		  	'codigoPostal': $("#codigoPostal").val(),
    		  	'telefono1': $("#telefono1").val(),
    		  	'telefono2': $("#telefono2").val(),
    		  	'telefono3': $("#telefono3").val(),
    		  	'celular': $("#celular").val(),
    		  	'contacto': $("#contacto").val(),
    		  	'horarioRecepcion': $("#horarioRecepcion").val(),
    		  	'email': $("#email").val(),
    		  	'observaciones': $("#observaciones").val(),
    		  	'localidadid': $("#localidadid").val()

    		  },
    		  success: function(data){
    		  	if (data == "true"){
    		  		$.toast({ 
    		  		  text : "Se ha Actualizado Exitosamente", 
    		  		  showHideTransition : 'slide',  
    		  		  bgColor : 'green',              
    		  		  textColor : '#eee',            
    		  		  allowToastClose : false,     
    		  		  hideAfter : 5000,              
    		  		  stack : 5,                    
    		  		  textAlign : 'left',            
    		  		  position : 'top-right'       
    		  		});
    		  	}

    		  }
    		});

    		return true;
    	}
    	$.toast({ 
    	  text : "No ha realizado ninguna busqueda!", 
    	  showHideTransition : 'slide',  
    	  bgColor : 'red',              
    	  textColor : '#eee',            
    	  allowToastClose : false,     
    	  hideAfter : 5000,              
    	  stack : 5,                    
    	  textAlign : 'left',            
    	  position : 'top-right'       
    	});
    	return false;
    	
    });

    $('#guardar').on('click', function(){

    	$.ajaxSetup({
    	    headers: {
    	        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
    	    }
    	});

    	$.ajax({  
    	  type: "post",
    	  url: "{{route('addtransporte')}}",
    	  data:{
    	  	'razon': $("#razona").val(),
    	  	'direccion': $("#direcciona").val(),
    	  	'codigoPostal': $("#codigoPostala").val(),
    	  	'telefono1': $("#telefono1a").val(),
    	  	'telefono2': $("#telefono2a").val(),
    	  	'telefono3': $("#telefono3a").val(),
    	  	'celular': $("#celulara").val(),
    	  	'contacto': $("#contactoa").val(),
    	  	'horarioRecepcion': $("#horarioRecepciona").val(),
    	  	'email': $("#emaila").val(),
    	  	'observaciones': $("#observacionesa").val(),
    	  	'localidadid': $("#localidadida").val()

    	  },
    	  success: function(data){
    	  	if (data == "true"){
    	  		$.toast({ 
    	  		  text : "Se ha Creado Exitosamente", 
    	  		  showHideTransition : 'slide',  
    	  		  bgColor : 'green',              
    	  		  textColor : '#eee',            
    	  		  allowToastClose : false,     
    	  		  hideAfter : 5000,              
    	  		  stack : 5,                    
    	  		  textAlign : 'left',            
    	  		  position : 'top-right'       
    	  		});
    	  	}

    	  }
    	});

    });

    $('#limpiar').on('click', function(){
    	existebusqueda = 0;
    	$("#razon").val("");
    	$("#direccion").val("");
    	$("#codigoPostal").val("");
    	$("#telefono1").val("");
    	$("#telefono2").val("");
    	$("#telefono3").val("");
    	$("#fax").val("");
    	$("#celular").val("");
    	$("#contacto").val("");
    	$("#horarioRecepcion").val("");
    	$("#email").val("");
    	$("#observaciones").val("");
    	$("#localidadid").val("");
    });

  });
</script>
@endsection