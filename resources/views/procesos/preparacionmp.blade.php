@extends('layouts.app')

@section('content')


<div class="right_col" role="main">
	<div class="">  
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Preparación MP</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								
								<a class="btn btn-primary btn-sm btn-regresar" href="proceso.html"><i class="fa fa-mail-reply"></i></a>                      
							</li>
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
						<form action="{{route('procesopreparacionmp', $id)}}" autocomplete="off">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="type" value="1">
							<div class="form-group">
								@if ($preparacionmpObj != null)
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label class="control-label" for="first-name">Medida</label>
											<input value="{{$preparacionmpObj->medidaid}}"  type="text" name="medidab" id="medidab" class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Largo Final</label>
											<input type="text" name="largofinalb" id="largofinalb" class="form-control col-md-7 col-xs-12">
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Reducción (%)</label>
											<input type="text" name="reduccionb" id="reduccionb" class="form-control col-md-7 col-xs-12">
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Esto es el precio 1</label>
											<input value="{{$preparacionmpObj->precio}}"  type="text" name="preciob" id="preciob" class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label class="control-label" for="first-name">Observaciones</label>
											<textarea class="text-area" name="observacionesb" id="observacionesb" cols="" rows="">{{$preparacionmpObj->observaciones}}</textarea>
										</div>
									</div>
								@else
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label class="control-label" for="first-name">Medida</label>
											<input  type="text" name="medidab" id="medidab" class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Largo Final</label>
											<input type="text" name="largofinalb" id="largofinalb" class="form-control col-md-7 col-xs-12">
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Reducción (%)</label>
											<input type="text" name="reduccionb" id="reduccionb" class="form-control col-md-7 col-xs-12">
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<label class="control-label" for="first-name">Esto es el precio 1</label>
											<input  type="text" name="preciob" id="preciob" class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label class="control-label" for="first-name">Observaciones</label>
											<textarea class="text-area" name="observacionesb" id="observacionesb" cols="" rows=""></textarea>
										</div>
									</div>
								@endif
								
								<div class="form-group"><br>
									<div id="formenv" class="col-md-9 col-sm-9 col-xs-12 ">
										
									</div>
								</div>
							</form>
							<div class="ln_solid"></div>
							
							<div class="clearfix"></div>
							<div class="x_content">
								<div class="row">
									<div class="">
										<table id="" class="table table-striped table-bordered table-hover" style="width: 100%">
											<thead>
												<tr>
													<th>Ext</th>
													<th>Esp</th>
													<th>Int</th>
													<th>T/cost</th>
													<th>Term</th>
													<th>Kg/m</th>
													<th>Mts</th>
													<th>MP/KG</th>
													<th>Ext</th>
													<th>Esp</th>
													<th>Lg</th>
													<th>Kg/m MP</th>
													<th>Bateas</th>
													<th>Trefilas</th>
													<th>Horno</th>
													<th>Kilos</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Industria Plas</td>
													<td>534535</td>
													<td>Industria Plas</td>
													<td>Lorem ipsum dolor sit amet, consectetur adipi</td>
													<td>Capital Federal</td>
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

											</tbody>
										</table>
									</div>
								</div>
								

								<div  class="row">
									<div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
										<label class="control-label" for="first-name">Diámetro Exterior</label>
									</div>
									<div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
										<label class="control-label" for="first-name">Espesor</label>
									</div>
								</div>
								<div  class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Desde</label>
										<input type="text" id="diametroextdesde" placeholder="" class="form-control col-md-7 col-xs-12">
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Hasta</label>
										<input type="text" id="diametroexthasta" placeholder="" class="form-control col-md-7 col-xs-3">
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Desde</label>
										<input type="text" id="espesordesde" placeholder="" class="form-control col-md-7 col-xs-3">
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Hasta</label>
										<input type="text" id="espesorhasta" placeholder="" class="form-control col-md-7 col-xs-3">
									</div>
								</div>
								<div  class="row">
									<div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
										<label class="control-label" for="first-name">Largo Máx</label>
									</div>
									<div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
										<label class="control-label" for="first-name">Largo Mín</label>
									</div>
								</div>
								<div  class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Desde</label>
										<input type="text" id="largomaxdesde" placeholder="" class="form-control col-md-7 col-xs-12">
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Hasta</label>
										<input type="text" id="largomaxhasta" placeholder="" class="form-control col-md-7 col-xs-3">
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Desde</label>
										<input type="text" id="largomindesde" placeholder="" class="form-control col-md-7 col-xs-3">
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Hasta</label>
										<input type="text" id="largominhasta" placeholder="" class="form-control col-md-7 col-xs-3">
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label class="control-label" for="first-name">Tipo de acero</label>
										<select id="tipoaceroid" class="form-control">
											<option></option>
											@foreach ($tipoaceros as $tipoproceso)
												<option value="{{$tipoproceso->id}}">{{$tipoproceso->descripcion}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label class="control-label" for="first-name">Tipo de costura</label>
										<select id="tipocosturaid" class="form-control">
											<option></option>
											@foreach ($tipocostura as $tipoproceso)
												<option value="{{$tipoproceso->id}}">{{$tipoproceso->descripcion}}</option>
											@endforeach>
										</select>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label class="control-label" for="first-name">Tratamiento Térmico</label>
										<select id="tratamientoid" class="form-control">
											<option></option>
											@foreach ($tratamientos as $tipoproceso)
												<option value="{{$tipoproceso->id}}">{{$tipoproceso->descripcion}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label class="control-label" for="first-name">Tipo de norma</label>
										<select id="normaid" class="form-control">
											<option></option>
											@foreach ($normas as $tipoproceso)
												<option value="{{$tipoproceso->id}}">{{$tipoproceso->descripcion}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label class="checkbox">Estándar
											<input id="estandar" type="checkbox">
											<span class="check"></span>
										</label>
									</div>
								</div>
								<div  class="row">
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Reducción Min (%)</label>
										<input type="text" id="reduccionmin" placeholder="" class="form-control col-md-7 col-xs-12">
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Reducción Máx (%)</label>
										<input type="text" id="reduccionmax" placeholder="" class="form-control col-md-7 col-xs-3">
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Plus entre Diam. Int y Punzón</label>
										<input type="text" id="plus" placeholder="" class="form-control col-md-7 col-xs-3">
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3">
										<label class="control-label" for="first-name">Hasta</label>
										<input type="text" id="hasta" placeholder="" class="form-control col-md-7 col-xs-3">
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label class="checkbox">Pasada al Aire
											<input id="pasada" type="checkbox">
											<span class="check"></span>
										</label>
									</div>
								</div>
								

							</form>

						</div><br>
						<div class="row">
							<div class="col-md-1">
								<button type="button" id="buscarregistro" class="btn btn-primary btn-sm">Buscar</button>
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-danger btn-sm">Cerrar</button>
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

  			var button = "<button type='submit' class='btn btn-primary btn-sm'>Finalizar</button>";
  			$('#formenv').append(button);
  	 		
  	 		$("form").submit(function(event){
  	 		    event.preventDefault(); //prevent default action 
  	 		    var post_url = $(this).attr("action"); //get form action url
  	 		    var request_method = $(this).attr("method"); //get form GET/POST method
  	 		    var form_data = $(this).serialize(); //Encode form elements for submission

  	 		    if ($("#preciob").val().length == 0){
  	 		    	$.toast({ 
  	 		    	    text : "Debe completar el precio", 
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
  	 		    
  	 		    $.ajax({
  	 		        url : post_url,
  	 		        type: request_method,
  	 		        data : form_data
  	 		    }).done(function(response){ //
  	 		        $.toast({ 
  	 	              text : "Operacion Exitosa", 
  	 	              showHideTransition : 'slide',  
  	 	              bgColor : 'green',              
  	 	              textColor : '#eee',            
  	 	              allowToastClose : false,     
  	 	              hideAfter : 5000,              
  	 	              stack : 5,                    
  	 	              textAlign : 'left',            
  	 	              position : 'top-right'       
  	 	            });
  	 		    });
  	 		});

  	$('#estandar').on('click', function(){
  		if ($("#estandar").is(':checked') ){
  		     $("#reduccionmin").attr('disabled','disabled');
  		     $("#reduccionmax").attr('disabled','disabled');
  		}
  		else {
  		     $("#reduccionmin").removeAttr('disabled');
  		     $("#reduccionmax").removeAttr('disabled');

  		}
  	});

  	$('#buscarregistro').on('click', function(){

  		var pasada = null;
  		if ($("#pasada").is(':checked') ){
  			pasada = 1;

  		}

  		$.ajaxSetup({
  		    headers: {
  		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  		    }
  		});

  		$.ajax({  
  		  type: "post",
  		  url: "{{route('buscarmedidapreparacionmp')}}",
  		  data: {
  		  	'diametroextdesde' : $("#diametroextdesde").val(),
  		  	'diametroexthasta' : $("#diametroexthasta").val(),
  		  	'espesordesde' : $("#espesordesde").val(),
  		  	'espesorhasta' : $("#espesorhasta").val(),
  		  	'largomaxdesde' : $("#largomaxdesde").val(),
  		  	'largomaxhasta' : $("#largomaxhasta").val(),
  		  	'largomindesde' : $("#largomindesde").val(),
  		  	'largominhasta' : $("#largominhasta").val(),
  		  	'tipoaceroid' : $("#tipoaceroid").val(),
  		  	'tipocosturaid' : $("#tipocosturaid").val(),
  		  	'tratamientoid' : $("#tratamientoid").val(),
  		  	'normaid' : $("#normaid").val(),
  		  	'reduccionmin' : $("#reduccionmin").val(),
  		  	'reduccionmax' : $("#reduccionmax").val(),
  		  	'plus' : $("#plus").val(),
  		  	'hasta' : $("#hasta").val(),
  		  	'pasada' : pasada

  		  },
  		  success: function(data){
  		    
  		  }
  		});

  	});

    

  });
</script>
@endsection

