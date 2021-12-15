@extends('layouts.app')

@section('content')

	  			<!-- page content -->
	  			<div class="right_col" role="main">
	  				<div class="">
	  				
	  					<div class="clearfix"></div>

	  					<div class="row">
	  						<div class="col-md-12">
	  							<div class="x_panel">
	  								<div class="x_title">
	  									<h2>Eventos Del Calendario</h2>
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

	  									<div id='calendar'></div>

	  								</div>
	  							</div>
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  			<!-- /page content -->

	  			
	  		</div>
	  	</div>

	  	<!-- calendar modal -->
	  	<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  		<div class="modal-dialog">
	  			<div class="modal-content">

	  				<div class="modal-header">
	  					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	  					<h4 class="modal-title" id="myModalLabel">Ingrese Nuevo Evento</h4>
	  				</div>
	  				<div class="modal-body">
	  					<div id="testmodal" style="padding: 5px 20px;">
	  						<form id="antoform" class="form-horizontal calender" role="form">
	  							<div class="form-group">
	  								<label class="col-sm-3 control-label">Título</label>
	  								<div class="col-sm-9">
	  									<input type="text" class="form-control" id="title" name="title">
	  								</div>
	  							</div>
	  							<div class="form-group">
	  								<label class="col-sm-3 control-label">Descripción</label>
	  								<div class="col-sm-9">
	  									<textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
	  								</div>
	  							</div>
	  						</form>
	  					</div>
	  				</div>
	  				<div class="modal-footer">
	  					<button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cancelar</button>
	  					<button type="button" class="btn btn-primary antosubmit">Guardar</button>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  	<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  		<div class="modal-dialog">
	  			<div class="modal-content">

	  				<div class="modal-header">
	  					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	  					<h4 class="modal-title" id="myModalLabel2">Editar Calendario</h4>
	  				</div>
	  				<div class="modal-body">

	  					<div id="testmodal2" style="padding: 5px 20px;">
	  						<form id="antoform2" class="form-horizontal calender" role="form">
	  							<div class="form-group">
	  								<label class="col-sm-3 control-label">Título</label>
	  								<div class="col-sm-9">
	  									<input type="text" class="form-control" id="title2" name="title2">
	  								</div>
	  							</div>
	  							<div class="form-group">
	  								<label class="col-sm-3 control-label">Descripción</label>
	  								<div class="col-sm-9">
	  									<textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
	  								</div>
	  							</div>

	  						</form>
	  					</div>
	  				</div>
	  				<div class="modal-footer">
	  				<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Cancelar</button>
	  					<button type="button" class="btn btn-primary antosubmit2">Guardar</button>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

	  	<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
	  	<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
	  	<!-- /calendar modal -->
@endsection