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
					<h2>Control De Calidad</h2>
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
							<span class="titulo-cliente">N° De Orden: 1454654</span>
						</div>
					</div>
					<div class="row profile_title">
						<div class="col-md-6">
							<span class="titulo-cliente">Cliente: (INTEBA)</span>
						</div>
					</div>


					<div class="x_content">
						<div class="row">
							<div class="">
								<form>
									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-12">
											<label class="control-label" for="first-name">Fecha</label>
											<div class='input-group date' id='myDatepicker25'>
												<input type='text' class="form-control" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>

									</div>



									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-12">
											<label class="control-label" for="first-name">Observaciones:</label>
											<textarea class="text-area" name="" id="" cols="" rows=""></textarea>
										</div>
									</div>


								</form>
							</div><br>
							<div class="row">
								<div class="col-md-2">
									<button type="button" class="btn btn-primary btn-sm">Guardar</button>
									<a id="volver" class="btn btn-primary btn-sm">Cerrar</a>
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

	$('#volver').on('click', function(){
	  	cerrar();
	});

	function cerrar() {        
	    window.close();
	}
		
});
</script>

@endsection