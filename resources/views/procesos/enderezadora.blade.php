

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
									<h2>Proceso - Enderezadora</h2>
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

									<form action="{{route('procesoenderezadora', $id)}}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="type" value="1">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-xs-12">
													<label class="control-label" for="first-name">Tipo</label>
													<select id="" name="tipo" class="form-control" required>
														@foreach ($tipos as $tipo)
															@if ($enderezadoObj != null)
																@if ($enderezadoObj->tipo == $tipo->id)
																	<option value="{{$enderezadoObj->tipo}}" selected="selected">{{$tipo->descripcion}}</option>
																@else
																	<option value="{{$tipo->id}}}">{{$tipo->descripcion}}</option>
																@endif
															@else
																<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>												
															@endif
														@endforeach
													</select>
												</div>
											</div>
											<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-12">
													<label class="control-label" for="first-name">Observaciones</label>
													@if ($enderezadoObj != null)
														<textarea  class="text-area" name="obser" id="" cols="" rows="">{{$enderezadoObj->observaciones}}</textarea>
													@else
														<textarea  class="text-area" name="obser" id="" cols="" rows=""></textarea>
													@endif
												</div>
											</div>
											<div class="ln_solid"></div>
										</form>
											<div class="form-group">
												<div class="row">
													<div id="formenv" class="col-md-1">
													</div>
													<div class="col-md-1">
														<a href="{{route('procesosindex', $id)}}" class="btn btn-danger btn-sm">Cerrar</a>
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