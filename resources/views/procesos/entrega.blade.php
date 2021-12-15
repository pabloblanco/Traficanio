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
  						<h2>Proceso - Entrega</h2>
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

  						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  							<div class="form-group">
  								<div class="row">
  									<div class="col-md-6 col-sm-6 col-xs-12">
  										<label class="control-label" for="first-name">Tipo De Entrega</label>
  										<select id="" class="form-control" required>
  											<option></option>
  											@foreach ($tipoentregas as $procesotipo)
  												<option value="{{$procesotipo->id}}">{{$procesotipo->descripcion}}</option>
  											@endforeach
  										</select>
  									</div>
  									<div class="col-md-6 col-sm-6 col-xs-12">
  										<label class="control-label" for="first-name">Costo Por Kg</label>
  										<input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
  									</div>
  								</div>
  								<div class="row">
  								<div class="col-md-6 col-sm-6 col-xs-12">
  										<label class="control-label" for="first-name">Observaciones</label>
  										<textarea class="text-area" name="" id="" cols="" rows=""></textarea>
  									</div>
  								</div>


  							</div>
  						</form>
  					</div><br>
  					<div class="row">
  						<div class="col-md-1">
  							<button type="button" class="btn btn-primary btn-sm">Finalizar</button>
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
  <!-- /page content -->
  

  @endsection