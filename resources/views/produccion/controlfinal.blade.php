@extends('layouts.app')

@section('content')

			<!--  modal Confirmar Envio  -->
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-enviar">
			  <div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
			        </button>
			        <h5 class="modal-title" id="myModalLabel3">¿Desea guardar los cambios?</h5>
			      </div>
			      
			      <div class="modal-footer">
			        <button id="send_control" type="button" class="btn btn-primary">Aceptar</button>
			        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /modals Confirmar Envio -->
		
		  <!--  modal Agregar Paquete-->

		  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-paquete">
		    <div class="modal-dialog modal-md">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
		          </button>
		          <h4 class="modal-title" id="myModalLabel2"></h4>
		        </div>
		        <div class="modal-body cuerpo-modal">
		          <form>
		            <div class="form-group">
		            	<div class="row">
		            		<div class="col-md-4 col-sm-4 col-xs-12">
		            			<label class="control-label">N° De Trazabilidad
		            				<input type="text" id="traza" class="form-control col-md-7 col-xs-12">
		            			</label>
		            		</div>
		            		<div class="col-md-4 col-sm-4 col-xs-12">
		            			<label class="control-label">Longitud De Tubos
		            				<input type="text" id="longitud" class="form-control col-md-7 col-xs-12">
		            			</label>
		            		</div>
		            		<div class="col-md-4 col-sm-4 col-xs-12">
		            			<label class="control-label">Cantidad De Tubos
		            				<input type="text" id="cantidad" class="form-control col-md-7 col-xs-12">
		            			</label>
		            		</div>
		            		
		            	</div>
		            	
		            	<div class="row">
		            	    <div class="col-md-4 col-sm-4 col-xs-12">
		            			<label class="control-label" for="first-name">Metros</label>
		            			<input type="text" id="metros" class="form-control col-md-7 col-xs-12">
		            		</div>
		            		
		            		
		            		
		            		<div class="col-md-4 col-sm-4 col-xs-12">
		            			<label class="control-label" for="first-name">Kilos</label>
		            			<input type="text" id="kilos" class="form-control col-md-7 col-xs-12">
		            		</div>
		            		<div class="col-md-4 col-sm-4 col-xs-12">
		            			<label class="control-label" for="first-name">Kilos Balanza</label>
		            			<input type="text" id="kilosbalanza" class="form-control col-md-7 col-xs-12">
		            		</div>
		            	</div>

		            	<div class="row">
		            		<div class="col-md-12 col-sm-12 col-xs-12">
		            			<label class="control-label" for="first-name">Nota:</label>
		            			<textarea class="text-area" name="" id="nota" cols="" rows=""></textarea>
		            		</div>
		            	</div>
		            	<div class="ln_solid"></div>
		            	
		            </div>

		      </div>
	        </form>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
		        <button type="submit" id="addpaq" class="btn btn-primary">Añadir</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- /modals agregar  Paquete-->

		<div class="right_col" role="main">
			<div class="">
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Control Final</h2>

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
								<div class="col-md-6">
									<span class="titulo-cliente" id="nro_orden"> </span>
								</div>
							</div>
							<div class="row profile_title">
								<div class="col-md-6">
									<span class="titulo-cliente" id="cliente"></span>
								</div>
							</div>
							<div class="row profile_title">
								<div class="col-md-4">
									<span class="titulo-cliente" id="codigo"></span>
								</div> 
							</div>
							<div class="row profile_title">
								<div class="col-md-4 ">
									<span class="span-titulos" id="kilogrametro"><strong></strong></span>
									
								</div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-md-5 ">
									<table class="table table-bordered">
										<thead>
										    <tr>
										      <th scope="col">Medida</th>
										      <th scope="col">Solicitado</th>
										      <th scope="col">Tol(+)</th>
										      <th scope="col">Tol(-)</th>
										      <th scope="col">Medida Final</th>
										    </tr>
										  </thead>
										<tbody>
											<tr id="diamex"><tr>
											<tr id="espesor"></tr>
											<tr id="diamein"></tr>
										</tbody>									
									</table>	
									</div>
								</div>
							</div>
							
							

							<div class="x_content">
								<div class="row">

									<div class="">

										<form>




											<div class="row">
												<div class="col-md-6 col-sm-6 col-xs-12">
  												<label class="control-label" for="first-name">Fecha</label>
  												<div class='input-group date' id='myDatepicker24'>
  													<input id="fecha_control" type='text' class="form-control" />
  													<span class="input-group-addon">
  														<span class="fa fa-calendar"></span>
  													</span>
  												</div>
  											</div>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<label class="control-label" for="first-name">Dureza</label>
													<input id="dureza" type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
												</div>



											</div>
											<div class="row">
												<div class="col-md-3 col-sm-3 col-xs-12">
													<label class="checkbox">Aplastado
														<input id="aplastado" type="checkbox">
														<span class="check"></span>
													</label>
												</div>
											</div>

											<div  class="row">
												<div class="col-md-4 col-sm-4 col-xs-12">
													<label class="control-label" for="first-name">Abocardado</label>
													<input id="abocardado" type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
												</div>
												{{-- <div class="col-md-4 col-sm-4 col-xs-12">
													<label class="control-label" for="first-name">Aprobado</label>
													<input id="aprobado" type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
												</div> --}}
												<div class="col-md-4 col-sm-4 col-xs-12">
													<label class="control-label" for="first-name">Aprobado Por:</label>
													<select id="aprobado_por" class="form-control" required>
														@foreach ($personal as $p)
															<option value="{{$p->id}}">{{$p->nombreCompleto}}</option>
														@endforeach
													</select>
												</div>


											</div>
											<div  class="row">
												<div class="col-md-6 col-sm-6 col-xs-12">
													<label class="control-label" for="first-name">Paquete</label>
													<input type="text" id="paquetes" placeholder="" class="form-control col-md-7 col-xs-12">
												</div>

												<div class="col-md-6 col-sm-6 col-xs-12">
													<label class="control-label" for="first-name">Estado</label>
													<select id="estado" class="form-control" required>
														@foreach ($estados as $estado)
															<option id="{{$estado->id}}">{{$estado->descripcion}}</option>
														@endforeach
													</select>
												</div>

											</div><br><br>
											<div class="row">
												<div class="col-md-3 col-sm-3 col-xs-12">
													<a id="addPaquete">Agregar Paquete <i class="fa fa-angle-down"></i></a>
												</div>
											</div>

											<br>

											<div class="row">
												<div style="display: none;" id="table_paq" class="col-md-10">
													<table class="table">
														<thead>
															<th>N° De trazabilidad</th>
															<th>Longitud De Tubos</th>
															<th>Cantidad De Tubos</th>
															<th>Metros</th>
															<th>Kilos</th>
															<th>Kilos Balanza</th>
															<th>Nota</th>
															<th>Editar</th>
														</thead>
														<tbody>
															
														</tbody>
													</table>
												</div>												
											</div>


											<div id="addPaquete-1" style="display:none">

												<div class="form-group">
													<div class="row">
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label">N° De Trazabilidad
																<input type="text" id="" class="form-control col-md-7 col-xs-12">
															</label>
														</div>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label">Longitud De Tubos
																<input type="text" id="" class="form-control col-md-7 col-xs-12">
															</label>
														</div>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label">Cantidad De Tubos
																<input type="text" id="" class="form-control col-md-7 col-xs-12">
															</label>
														</div>
														
													</div>
													
													<div class="row">
													    <div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Metros</label>
															<input type="text" id="" class="form-control col-md-7 col-xs-12">
														</div>
														
														
														
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Kilos</label>
															<input type="text" id="" class="form-control col-md-7 col-xs-12">
														</div>
														<div class="col-md-4 col-sm-4 col-xs-12">
															<label class="control-label" for="first-name">Kilos Balanza</label>
															<input type="text" id="" class="form-control col-md-7 col-xs-12">
														</div>
													</div>

													<div class="row">
														<div class="col-md-12 col-sm-12 col-xs-12">
															<label class="control-label" for="first-name">Nota:</label>
															<textarea class="text-area" name="" id="" cols="" rows=""></textarea>
														</div>
													</div>
													<div class="ln_solid"></div>
													
												</div>
											
											</form>
											</div><br>


											<div class="row">
												<div class="col-md-2">
													<button id="guardar" type="button" class="btn btn-primary btn-sm">Guardar</button>
												</div>
												
											</div>

										
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /page content -->
				{{-- {{dd($res)}} --}}
	@if ($res)
		<input type="hidden" id="datosOrden" value="{{$res}}">
	@endif
	<input type="hidden" id="accionC" value="{{$accionC}}">
	<input type="hidden" id="objControl" value="{{$objControl}}">
@endsection

@section('js_extra')
<script type="text/javascript">
$(function(){
	
	var datosOrden = JSON.parse($('#datosOrden').val());
	console.log('datosOrden')
	
	var accionC = $('#accionC').val();
	var idsPaqOld = [];

	if (datosOrden){
		$('#nro_orden').text('N° De Orden: '+datosOrden.ordenProduccion);
		$('#cliente').text('Cliente: '+datosOrden.razon);
		$('#codigo').text('Código De Pieza: '+datosOrden.codigoPieza); 
		$('#kilogrametro').text('Medida (Kg/Mt): '+datosOrden.kilogrametro);

	}

	cargar_diamex(datosOrden);
	cargar_espesor(datosOrden);
	cargar_diamein(datosOrden);


	function cargar_diamex(datosOrden){
		if (datosOrden.diametroExteriorMaximo>0 && datosOrden.diametroExteriorMinimo>0){
			var tolmax = (datosOrden.diametroExteriorMaximo-datosOrden.diametroExteriorNominal).toFixed(2);
			var tolmin = (datosOrden.diametroExteriorNominal-datosOrden.diametroExteriorMinimo).toFixed(2);
			var tds = `
						<td>DIAMETRO EXTERIOR</td>
						<td>${datosOrden.diametroExteriorNominal}</td>
						<td>${tolmax}</td>
						<td>${tolmin}</td>
						<td><input id="input_diamex" type="text"></td>
						`;
			$('#diamex').append(tds);
		}
	}

	function cargar_espesor(datosOrden){
		if (datosOrden.espesorMaximo>0 && datosOrden.espesorMinimo>0){
			var tolmax = (datosOrden.espesorMaximo-datosOrden.espesorNominal).toFixed(2);
			var tolmin = (datosOrden.espesorNominal-datosOrden.espesorMinimo).toFixed(2);
			var tds = `
						<td>ESPESOR</td>
						<td>${datosOrden.espesorNominal}</td>
						<td>${tolmax}</td>
						<td>${tolmin}</td>
						<td><input id="input_espe" type="text"></td>
						`;
			$('#espesor').append(tds);
		}
	}

	function cargar_diamein(datosOrden){
		if ((datosOrden.diametroInteriorMaximo>0 && datosOrden.diametroInteriorMinimo>0) || (datosOrden.espesorMaximo>0 && datosOrden.espesorMinimo>0) || (datosOrden.espesorMaximo>0 && datosOrden.espesorMinimo>0)){
			var tolmax = (datosOrden.diametroInteriorMaximo-datosOrden.diametroInteriorNominal).toFixed(2);
			var tolmin = (datosOrden.diametroInteriorNominal-datosOrden.diametroInteriorMinimo).toFixed(2);
			var tds = `
						<td>DIAMETRO INTERIOR</td>
						<td>${datosOrden.diametroInteriorNominal}</td>
						<td>${tolmax}</td>
						<td>${tolmin}</td>
						<td><input id="input_diamein" type="text"></td>
						`;
			$('#diamein').append(tds);
		}
	}

	$(document).on('change', '#input_diamex', function(){
		var tolmax = (datosOrden.diametroExteriorMaximo-datosOrden.diametroExteriorNominal).toFixed(2);
		var tolmin = (datosOrden.diametroExteriorNominal-datosOrden.diametroExteriorMinimo).toFixed(2);

		console.log('datosOrden',datosOrden)
		// console.log('tolmin',tolmin)

		validateTol($(this), datosOrden.diametroExteriorNominal, tolmax, tolmin);
		calcularDiametroInterior();

	});

	$(document).on('change', '#input_espe', function(){
		var tolmax = (datosOrden.espesorMaximo-datosOrden.espesorNominal).toFixed(2);
		var tolmin = (datosOrden.espesorNominal-datosOrden.espesorMinimo).toFixed(2);

		validateTol($(this), datosOrden.espesorNominal, tolmax, tolmin);
		calcularDiametroInterior();
	});

	$(document).on('change', '#input_diamein', function(){
		var tolmax = (datosOrden.diametroInteriorMaximo-datosOrden.diametroInteriorNominal).toFixed(2);
		var tolmin = (datosOrden.diametroInteriorNominal-datosOrden.diametroInteriorMinimo).toFixed(2);

		validateTol($(this), datosOrden.diametroInteriorNominal, tolmax, tolmin);
	});


	console.log(datosOrden);

	$('#volver').on('click', function(){
	  	cerrar();
	});

	function cerrar() {        
	    window.close();
	}

	function validateTol(este,nomi,tolmin,tolmax){
		
	    if (isNaN($(este).val())){
	        este.css("border-color", "red");
	        return false;
	    }
		var newval = parseFloat($(este).val());
		nomi = parseFloat(nomi)
		tolmax = parseFloat(tolmax)
		tolmin = parseFloat(tolmin)
		nomi = parseFloat(nomi)
		console.log('validacion 0',newval)
		console.log('validacion 0.5',nomi)
		
		console.log('validacion 1',nomi+Math.abs(tolmax))
		console.log('validacion 2',nomi-Math.abs(tolmin))
		console.log()

		
	    if ((newval>(nomi+Math.abs(tolmax))) || newval<(nomi-Math.abs(tolmin))){
	        error_toast();
	        este.css("border-color", "red");
	        //$(este).val(nomi);
	        return false;
	    }
	    else
	        este.css("border-color", "");
	    return false;
	}
	
	function calcularDiametroInterior()
	{
	    if (($('#input_diamex').val() !== "") && ($('#input_espe').val() !== "")){
	        $('#input_diamein').val(parseFloat($('#input_diamex').val() - 2 * $('#input_espe').val()).toFixed(2));
			console.log('un resultado ahi',parseFloat($('#input_diamex').val() - 2 * $('#input_espe').val()).toFixed(2))
	    }
	}

	function error_toast(){
		$.toast({ 
		  text : "Fuera de Rango", 
		  showHideTransition : 'slide',  
		  bgColor : 'red',              
		  textColor : '#eee',            
		  allowToastClose : false,     
		  hideAfter : 5000,              
		  stack : 5,                    
		  textAlign : 'left',            
		  position : 'top-right'       
		});
	}

	$('#addPaquete').css( 'cursor', 'pointer' );

	var obj = {};
	$('#guardar').on('click', function(){
		$('#modal-enviar').modal('show');
	});

	$('#send_control').on('click', function(){
		var Obj = recorrercampos();
		for(let index in Obj){
			
			if(Obj[index] == undefined && index	 != 'tratamientot' && index != 'norma'  ){
				console.log(Obj[index])
				$.toast({ 
				text : "Hay Campos que son Requeridos "+index, 
				showHideTransition : 'slide',  
				bgColor : 'red',              
				textColor : '#eee',            
				allowToastClose : false,     
				hideAfter : 5000,              
				stack : 5,                    
				textAlign : 'left',            
				position : 'top-right'       
				});
				$('#index').focus()
				console.log(Obj)
				return;
			}

			if(index == 'aprobado' && Obj[index] == ''){
				//if(Obj[index].aprobado == ''){
					$.toast({ 
						text : "El campo aprobado es obligatorio", 
						showHideTransition : 'slide',  
						bgColor : 'red',              
						textColor : '#eee',            
						allowToastClose : false,     
						hideAfter : 5000,              
						stack : 5,                    
						textAlign : 'left',            
						position : 'top-right'       
					});
					return 
				//}
			}
			
		}
		console.log(Obj)
		
		if (Obj!=false)
			save_control(Obj);
	});

	function recorrercampos(){
		console.log('datosOrden',datosOrden);
		if (validate()){
			obj.op = datosOrden.ordenProduccion;
			obj.demed = $('#input_diamex').val();
			obj.dimed = $('#input_diamein').val();
			obj.espmed = $('#input_espe').val();
			obj.fecha = $('#fecha_control').val();
			obj.dureza = $('#dureza').val();
			obj.aplastado = $("#aplastado").is(":checked") ? 1 : 0;
			obj.abocardado = $('#abocardado').val();
			// obj.aprobado = $('#aprobado').val();
			obj.aprobado = $('#aprobado_por').val();
			obj.cantidad_paquetes = $('#paquetes').val();
			obj.estado = $('#estado').val();
			obj.paquetes = JSON.stringify(recorrerpaquetes());
			obj.accion = accionC;
			obj.acero = datosOrden.tipoAcero;
			obj.vxoid = datosOrden.vxoid;
			obj.version = datosOrden.version;
			obj.tipoR = datosOrden.tipoReventa;
			obj.cliente = datosOrden.clienteid;
			obj.costura = datosOrden.costuraid;
			obj.tratamientot = datosOrden.tratamientoTermico;
			obj.norma = datosOrden.normaid;
			obj.forma = datosOrden.formaid;
			obj.paqOr = datosOrden.paqOr;
			obj.oldpq = idsPaqOld;
			obj.idCF = idCF;
			return obj;
		}
		else{
			$.toast({ 
			  text : "Hay Campos que son Requeridos", 
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
		}
	}


	function save_control(obj){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
		    }
		});

		$.ajax({  
		  type: "post",
		  url: "{{route('storecontrolfinal')}}",
		  data: obj,
		  success: function(data){
		  	if (data = "true"){
		  		var ruta = "{{route('autorizacion')}}";
		  		location.href = ruta;		  		
		  	}

		  }
		});

	}

	function redondear(cantidad,decimales) {
	    var cant = parseFloat(cantidad);
	    var dec = parseFloat(decimales);
	    decimales = (!dec ? 2 : dec);
	    return Math.round(cant * Math.pow(10, decimales)) / Math.pow(10, decimales);
	}

	function validate(){
		if ($('#fecha_control').val() == "")
			return false;

		if ($('#personal').val() == "")
			return false;

		if ($('#paquetes').val() == "")
			return false;

		if ($('#aprobado').val() == "")
			return false;

		return true;
	}

	var accion = null;
	var HayPaq = 0;
	var list_paquetes = [];
	var trSeleccionado = 0;
	var idCF = 0;

	$('#addPaquete').on('click', function(){
		accion = "N";
		nombre_modal(accion);
		limpiarModal();
		$('#modal-paquete').modal('show');
	});

	$('#addpaq').on('click', function(){

		if (accion == "N")
			cargar_tr();
		else
			editTr(trSeleccionado);
		
		
	});

	function cargar_tr(){
		var obj ={};

		var traza = $('#traza').val();
		var longitud = $('#longitud').val();
		var cantidad = $('#cantidad').val();
		var metros = $('#metros').val();
		var kilos = $('#kilos').val();
		var kilosbalanza = $('#kilosbalanza').val();
		var nota = $('#nota').val();

		obj.traza = traza;
		obj.longitud = longitud;
		obj.cantidad = cantidad;
		obj.metros = metros;
		obj.kilos = kilos;
		obj.kilosbalanza = kilosbalanza;
		obj.nota = nota;

		if (accion=="M")
			return obj;

		if (HayPaq==0){
			$('#table_paq').css('display', "block");
			HayPaq=1;
		}
		contador_cantidadPaq();
		insertTr(obj)
		$('#modal-paquete').modal('hide');
	}

	function contador_cantidadPaq(){
		var cant = parseInt($('#paquetes').val());
		if (cant>0){
			cant++;
			console.log(cant);
		}
		else{
			cant=1;
		}
		$('#paquetes').val(cant);
		return true;
	}

	var indexTr = 0;

	function insertTr(object){
		// console.log("entro esa mierda");
		var td = `<tr data-index="${indexTr}" data-traza="${object.traza}" data-longitud="${object.longitud}" data-cantidad="${object.cantidad}" data-metros="${object.metros}" data-kilos="${object.kilos}" data-kilosbalanza="${object.kilosbalanza}" data-nota="${object.nota}">
					<td>${object.traza}</td>
					<td>${object.longitud}</td>
					<td>${object.cantidad}</td>
					<td>${object.metros}</td>
					<td>${object.kilos}</td>
					<td>${object.kilosbalanza}</td>
					<td><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="${object.nota}">
						<i class="fa fa-sticky-note-o"></i>
					</button></td>
					<td><button id="ediPaq" type="button" class="btn btn-primary">
						<i class="fa fa-edit"></i>
					</button></td>
				   </tr>`;

		var tb = $('#table_paq table tbody');
		tb.append(td);
		
		indexTr++;
	}

	$(document).on('click', '#ediPaq', function(){
		accion = "M";
		nombre_modal(accion);

		limpiarModal();
		var tr = $(this).parents('tr');

		$('#modal-paquete').modal('show');
		$('#traza').val(tr.data('traza'));
		$('#longitud').val(tr.data('longitud'));
		$('#cantidad').val(tr.data('cantidad'));
		$('#metros').val(tr.data('metros'));
		$('#kilos').val(tr.data('kilos'));
		$('#kilosbalanza').val(tr.data('kilosbalanza'));
		$('#nota').val(tr.data('nota'));

		trSeleccionado = tr.data('index');
	});

	function editTr(idtr){
		var tr = $("tr[data-index='"+idtr+"']");
		var obj = cargar_tr();

		tr.data('traza', obj.traza);
		tr.data('longitud', obj.longitud);
		tr.data('cantidad', obj.cantidad);
		tr.data('metros', obj.metros);
		tr.data('kilos', obj.kilos);
		tr.data('kilosbalanza', obj.kilosbalanza);
		tr.data('nota', obj.nota);

		var tds = tr.children();
		
		tds.eq(0).text(obj.traza);
		tds.eq(1).text(obj.longitud);
		tds.eq(2).text(obj.cantidad);
		tds.eq(3).text(obj.metros);
		tds.eq(4).text(obj.kilos);
		tds.eq(5).text(obj.kilosbalanza);
		tds.eq(6).children().eq(0).attr('title', obj.nota);
		$('#modal-paquete').modal('hide');
	}

	function nombre_modal(v){
		if (v == "N")
			$("#myModalLabel2").text("Agregar Paquete");
		else
			$("#myModalLabel2").text("Editar Paquete");
	}

	function limpiarModal(){
		var inputs = $('#modal-paquete input');

		inputs.each(function( index ) {
			$(this).val("");
		});

		$('#nota').val("");
	}

	$('#cantidad').on('change', function(){
		chgCT($(this));
	});

	function chgCT(este){
	
	  var de = parseFloat($("#input_diamex").val());
	  var espe = parseFloat($("#input_espe").val());
	 
	  if (!(espe>0))
	      espe = ((de-$("#input_diamein").val()) / 2 );

	  if (!(de>0 && espe>0))
	       return false;
	  var kgmts = (((de-espe)*espe)*0.0246);

	  var largofijo = $("#longitud").val();
	  
	  if (!(largofijo>0))
	      return false;

	  var mts = redondear((este.val()*largofijo),3);
	  var kgs = redondear(mts*kgmts,3);
	  
	  $("#metros").val(mts);
	  $("#kilos").val(kgs);
	}

	function recorrerpaquetes(){
		var tablaPaq = $('#table_paq table tbody');
		var trsPaq = tablaPaq.children();
		list_paquetes = [];

		trsPaq.each(function( index ) {
			var obj = {};
			obj.traza = $(this).data('traza');
			obj.longitud = $(this).data('longitud');
			obj.cantidad = $(this).data('cantidad');
			obj.metros = $(this).data('metros');
			obj.kilos = $(this).data('kilos');
			obj.kilosbalanza = $(this).data('kilosbalanza');
			obj.nota = $(this).data('nota');
			list_paquetes.push(obj);			
		});

		return list_paquetes;
	}

	function verificar_carga_paquete(){

	}

	$('#paquetes').on('change', function(){
		var cantd_paq = parseInt($(this).val());
		var obj = {};

		$('#table_paq table tbody tr').remove();

		if (HayPaq==0 && cantd_paq>0){
			$('#table_paq').css('display', "block");
			HayPaq=1;
		}

		obj.traza = "";
		obj.longitud = "";
		obj.cantidad = "";
		obj.metros = "";
		obj.kilos = "";
		obj.kilosbalanza = "";
		obj.nota = "";

		for (var i = 0; i < cantd_paq; i++) {
			insertTr(obj);
		}
	});

	function formatDate(date) {
	    var d = new Date(date),
	        month = '' + (d.getMonth() + 1),
	        day = '' + d.getDate(),
	        year = d.getFullYear();

	    if (month.length < 2) month = '0' + month;
	    if (day.length < 2) day = '0' + day;

	    return [day, month, year].join('/');
	}


	///CARGAR CONTROL SI ES EDITAR///
	var objControl = 	JSON.parse($('#objControl').val());
	var encabezado = objControl.ControlFinal;

	idCF = encabezado.id;

	$('#input_diamex').val(encabezado.diametroExterior);
	$('#input_diamein').val(encabezado.diametroInterior);
	$('#input_espe').val(encabezado.espesor);
	$('#fecha_control').val(formatDate(encabezado.fecha));
	$('#dureza').val(encabezado.dureza);

	if (encabezado.aplastado==1) 
		$('#aplastado').prop('checked', true);

	$('#abocardado').val(encabezado.abocardado);
	// $('#aprobado').val(encabezado.aprobado);
	$('#aprobado_por').val(encabezado.aprobado);
	$('#paquetes').val(encabezado.paquetes);
	//$('#estado').val(encabezado.estado);


	var paquetesObj = objControl.dataCXP;
	console.log(objControl);
	for (var i = 0; i < paquetesObj.length; i++) {
		idsPaqOld.push(paquetesObj[i].id);
		var obj = {};
		obj.traza = paquetesObj[i].trazabilidad;
		obj.longitud = paquetesObj[i].longitudTubos;
		obj.cantidad = paquetesObj[i].cantidadTubos;
		obj.metros = paquetesObj[i].metros;
		obj.kilos = paquetesObj[i].kilos;
		obj.kilosbalanza = paquetesObj[i].kilosBalanza;
		obj.nota = paquetesObj[i].nota;
		insertTr(obj);

	}	

	if (HayPaq==0){
		$('#table_paq').css('display', "block");
		HayPaq=1;
	}

		
});
</script>

@endsection