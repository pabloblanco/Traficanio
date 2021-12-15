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
						<h2>Proceso - Corte</h2>
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

						<form action="{{route('procesocorte', $id)}}" method="get" autocomplete="off">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="type" value="1">
							<div class="form-group">
								<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
										<label class="checkbox">Corte Punta
											@if ($corteObj != null)
												@if ($corteObj->cortePunta == 1)
													<input name="cortep" type="checkbox" checked="checked">
												@else
													<input name="cortep" type="checkbox">
												@endif
											@else
												<input name="cortep" type="checkbox">
											@endif
											<span class="check"></span>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label class="control-label" for="first-name">Elemento Corte</label>
										<select name="elemento" id="" class="form-control">
											@if ($corteObj != null)
												@if ($corteObj->elemento == 1)
													<option value="1" selected="selected">Sierra</option>
													<option value="2">Disco</option>
												@else if ($corteObj->elemento == 2)
													<option value="1">Sierra</option>
													<option value="2" selected="selected">Disco</option>
												@endif
											@else
												<option value="1">Sierra</option>
												<option value="2">Disco</option>
											@endif
											
											
										</select>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label class="control-label" for="first-name">Tipo De Corte</label>
										<select name="tipocorteid" id="" class="form-control">
											<option></option>
											@foreach ($tipos as $tipo)
												@if ($corteObj != null)
													@if ($corteObj->tipoCorteid == $tipo->id)
														<option value="{{$corteObj->tipoCorteid}}" selected="selected">{{$tipo->descripcion}}</option>
													@else
														<option value="{{$tipo->id}}}">{{$tipo->descripcion}}</option>
													@endif
												@else
													<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>												
												@endif
											@endforeach
										</select>
									</div>
									@if ($corteObj != null)
											<div class="col-md-3 col-sm-3 col-xs-12">
												<label class="control-label" for="first-name">Cantidad De Cortes</label>
												<input type="text" id="" name="cantidad" value="{{$corteObj->cortes}}" class="form-control col-md-7 col-xs-12">
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12">
												<label class="control-label" for="first-name">Resto/Scrap</label>
												<input type="text" id="" value="{{$corteObj->resto}}" name="resto" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label class="control-label" for="first-name">Observaciones</label>
												<textarea class="text-area" name="obser" id="" cols="" rows="">{{$corteObj->observaciones}}</textarea>
											</div>
										</div>
									@else
											<div class="col-md-3 col-sm-3 col-xs-12">
												<label class="control-label" for="first-name">Cantidad De Cortes</label>
												<input type="text" id="" name="cantidad" class="form-control col-md-7 col-xs-12">
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12">
												<label class="control-label" for="first-name">Resto/Scrap</label>
												<input type="text" id="" name="resto" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label class="control-label" for="first-name">Observaciones</label>
												<textarea class="text-area" name="obser" id="" cols="" rows=""></textarea>
											</div>
										</div>
									@endif
								<div class="ln_solid"></div>
							</form>
								<div class="form-group">
									<div class="row">
										<div id="formenv" class="col-md-1">

										</div>
										<div class="col-md-1">
											<a type="button" href="{{route('procesosindex', $id)}}" class="btn btn-danger btn-sm">Cerrar</a>
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
 		var button = "<button type='submit' class='btn btn-primary btn-sm'>Finalizar</button>";
 		$('#formenv').append(button);

  		$("form").submit(function(event){
  		    event.preventDefault(); //prevent default action 
  		    var post_url = $(this).attr("action"); //get form action url
  		    var request_method = $(this).attr("method"); //get form GET/POST method
  		    var form_data = $(this).serialize(); //Encode form elements for submission
  		    
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

  });
 </script>
 @endsection