@extends('layouts.app')

@section('content')

<!--  modal Eliminar  -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h5 class="modal-title" id="myModalLabel2">¿Está seguro que desea eliminar?</h5>
            </div>

            <div class="modal-footer">
              <button id="send_delete" type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /modals eliminar norma-->
	  			<!-- /modals eliminar -->
	  			<!--  modal modifcar  -->

	  			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
	  				<div class="modal-dialog modal-md">
	  					<div class="modal-content">
	  						<div class="modal-header">
	  							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	  							</button>
	  							<h4 class="modal-title" id="myModalLabel2">Modificar</h4>
	  						</div>
	  						<div class="modal-body cuerpo-modal">
	  							<form action="  " method="get" accept-charset="utf-8">

	  								<div class="form-group">
	  									<div class="row">
	  										<div class="col-md-6 col-sm-6 col-xs-12">
	  											<label class="control-label">Cliente</label>
	  											<select id="clienteid" name="clienteid" class="form-control" >
	  												@foreach ($clientes as $cliente)
	  													<option value="{{$cliente['id']}}">{{$cliente['nombreFantasia']}}</option>
	  												@endforeach
	  											</select>
	  										</div>
	  										<div class="col-md-6 col-sm-6 col-xs-12">
	  											<label class="control-label">Tipo de contacto</label>
	  											<select id="tipoContactoid" name="tipoContactoid" class="form-control" >
	  												@foreach ($tipos as $tipo)
	  													<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
	  												@endforeach
	  											</select>
	  										</div>
	  									</div>
	  									<div class="row">
	  										<div class="col-md-6 col-sm-6 col-xs-12">
	  											<label class="control-label">Título</label>
	  											<input autocomplete="off"  name="titulo" type="text" id="titulo" class="form-control col-md-7 col-xs-12">
	  										</div>
	  										<div class="col-md-6 col-sm-6 col-xs-12">
	  											<label class="control-label">Fecha y Hora</label>
	  											<div class='input-group date' id='myDatepickerModalPUT'>
	  												<input autocomplete="off"  name="fecha" type='text' id="fecha" class="form-control" />
	  												<span class="input-group-addon">
	  													<span class="fa fa-calendar"></span>
	  												</span>
	  											</div>
	  										</div>

	  									</div>
	  									<div class="row">
	  										<div class="col-md-12 col-sm-12 col-xs-12">
	  											<label class="control-label">Descripción</label>
	  											<input autocomplete="off"  name="descripcion" type="text" id="descripcion" class="form-control col-md-7 col-xs-12">
	  										</div>


	  									</div>

	  								</div>
	  							</form>

	  						</div>
	  						<div class="modal-footer">
	  							<button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
	  							<button type="button" id="enviar_m" class="btn btn-primary">Guardar</button>
	  						</div>

	  					</div>

	  				</div>
	  			</div>
	  		</div>
	  		<!-- /modals modificar-->
	  		<!--  modal produccion-->

	  		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-produccion">
	  			<div class="modal-dialog modal-md">
	  				<div class="modal-content">
	  					<div class="modal-header">
	  						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	  						</button>
	  						<h4 class="modal-title" id="myModalLabel2">Orden de Producción</h4>
	  					</div>
	  					<div class="modal-body cuerpo-modal">

	  						<div class="row">
	  							<div id="loader3"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
	  							<div class="">
	  								<table id="datatable-produccion" class="table table-striped table-bordered table-hover" style="width: 100%">
	  									<thead>
	  										<tr>
	  											<th>N° Orden</th>
	  											<th>Medida</th>
	  											<th>Urgente</th>
	  											<th>Entrega Prometida</th>
	  											<th>Estado</th>
	  										</tr>
	  									</thead>
	  									<tbody>

	  									</tbody>
	  								</table>
	  							</div>
	  						</div>


	  					</div>
	  					<div class="modal-footer">
	  						<button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
	  						<!-- <button type="button" class="btn btn-primary">Guardar</button> -->
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  		<!-- /modals orden de produccion-->

	  	<!--  modal-cotizacion -->

	  	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-cotizacion">
	  		<div class="modal-dialog modal-md">
	  			<div class="modal-content">
	  				<div class="modal-header">
	  					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	  					</button>
	  					<h4 class="modal-title" id="myModalLabel2">Cotización</h4>
	  				</div>
	  				<div class="modal-body cuerpo-modal">

	  					<div class="row">
	  						<div id="loader2"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
	  						<div class="">
	  							<table id="datatable-cotizacion" class="table table-striped table-bordered table-hover" style="width: 100%">
	  								<thead>
	  									<tr>
	  										<th>N°</th>
	  										<th>Medida</th>
	  										<th>Fecha</th>
	  										<th>Entrega Estimada</th>
	  										<th>Estado</th>
	  									</tr>
	  								</thead>
	  								<tbody>

	  								</tbody>
	  							</table>
	  						</div>
	  					</div>


	  				</div>
	  				<div class="modal-footer">
	  					<button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
	  					<!-- <button id="send" type="button" class="btn btn-primary">Guardar</button> -->
	  				</div>

	  			</div>
	  		</div>
	  	</div>
	  	<!-- /modals cotizacion-->

	  		<!--  modal Agregar Contacto-->

	  		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-contacto">
	  			<div class="modal-dialog modal-md">
	  				<div class="modal-content">
	  					<div class="modal-header">
	  						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	  						</button>
	  						<h4 class="modal-title" id="myModalLabel2">Agregar Contacto</h4>
	  					</div>
	  					<div class="modal-body cuerpo-modal">
	  						<form id="demo-form2" action="{{route('contactocliente')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
	  							<input type="hidden" name="_token" value="{{ csrf_token() }}">

	  							<div class="form-group">
	  								<div class="row">
	  									<div class="col-md-6 col-sm-6 col-xs-12">
	  										<label class="control-label">Cliente</label>
	  										<select name="clienteid" class="form-control" >
	  											@foreach ($clientes as $cliente)
	  												<option value="{{$cliente['id']}}">{{$cliente['nombreFantasia']}}</option>
	  											@endforeach
	  										</select>
	  									</div>
	  									<div class="col-md-6 col-sm-6 col-xs-12">
	  										<label class="control-label">Tipo de contacto</label>
	  										<select name="tipoContactoid" class="form-control" >
	  											@foreach ($tipos as $tipo)
	  												<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
	  											@endforeach
	  										</select>
	  									</div>
	  								</div>
	  								<div class="row">
	  									<div class="col-md-6 col-sm-6 col-xs-12">
	  										<label class="control-label">Título</label>
	  										<input autocomplete="off"  name="titulo" type="text" id="" class="form-control col-md-7 col-xs-12">
	  									</div>
	  									<div class="col-md-6 col-sm-6 col-xs-12">
	  										<label class="control-label">Fecha y Hora</label>
	  										<div class='input-group date' id='myDatepickerModal'>
	  											<input autocomplete="off"  name="fecha" type='text' class="form-control" />
	  											<span class="input-group-addon">
	  												<span class="fa fa-calendar"></span>
	  											</span>
	  										</div>
	  									</div>

	  								</div>
	  								<div class="row">
	  									<div class="col-md-12 col-sm-12 col-xs-12">
	  										<label class="control-label">Descripción</label>
	  										<input autocomplete="off"  name="descripcion" type="text" id="" class="form-control col-md-7 col-xs-12">
	  									</div>


	  								</div>

	  						</div>
	  						<div class="modal-footer">
	  							<button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
	  							<button type="submit" class="btn btn-primary">Guardar</button>
	  						</div>
	  							</form>

	  					</div>

	  				</div>
	  			</div>
	  		</div>

	  		<!-- Fin de las ventanas modales-->


	  		<div class="right_col" role="main">
	  			<div class="">

	  				<div class="clearfix"></div>

	  				<div class="row">
	  					<div class="col-md-12 col-sm-12 col-xs-12">
	  						<div class="x_panel">
	  							<div class="x_title">
	  								<h2>Seleccione Un Cliente</h2>
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
	  								<form id="demo-form2" autocomplete="off" method="get" action="{{route('cliente')}}" data-parsley-validate class="form-horizontal form-label-left">
	  									<input type="hidden" name="_token" value="{{ csrf_token() }}">
	  									<input type="hidden" name="type" value="1">

	  									<div class="form-group">
	  										<div class="row">
	  											<div class="col-md-6 col-sm-6 col-xs-12">
	  												<label class="control-label" for="first-name">Cliente</label>
	  												<select name="clienteid" id="clienteidb" class="form-control" >
	  													@foreach ($clientes as $cliente)
	  														<option value="{{$cliente['id']}}">{{$cliente['nombreFantasia']}}</option>
	  													@endforeach
	  												</select>
	  											</div>
	  											<div class="col-md-6 col-sm-6 col-xs-12">
	  												<label class="control-label" for="first-name">Tipo de contacto</label>
	  												<select name="tipoContactoid" id="tipoContactoidb" class="form-control" >
	  													@foreach ($tipos as $tipo)
	  														<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
	  													@endforeach
	  												</select>
	  											</div>
	  										</div>
	  										<div class="row">
	  											<div class="col-md-6 col-sm-6 col-xs-12">
	  												<label class="control-label" for="first-name">Título</label>
	  												<input name="titulo" type="text" id="titulob" class="form-control col-md-7 col-xs-12">
	  											</div>

	  											<div class="col-md-6 col-sm-6 col-xs-12">
	  												<label class="control-label" for="first-name">Descripción</label>
	  												<input name="descripcion" type="text" id="descripcionb" class="form-control col-md-7 col-xs-12">
	  											</div>
	  										</div>
	  										<div class="row">
	  											<div class="col-md-6 col-sm-6 col-xs-12">
	  												<label class="control-label" for="first-name">Fecha - Desde</label>
	  												<div class='input-group date' id='myDatepickerDesde'>
	  													<input name="date_start" id="date_startb" type='text' class="form-control" />
	  													<span class="input-group-addon">
	  														<span class="fa fa-calendar"></span>
	  													</span>
	  												</div>
	  											</div>
	  											<div class="col-md-6 col-sm-6 col-xs-12">
	  												<label class="control-label" for="first-name">Fecha - Hasta</label>
	  												<div class='input-group date' id='myDatepickerHasta'>
	  													<input name="date_end" id="date_endb" type='text' class="form-control" />
	  													<span class="input-group-addon">
	  														<span class="fa fa-calendar"></span>
	  													</span>
	  												</div>
	  											</div>
	  										</div>

	  										<div class="ln_solid"></div>
	  										<div class="form-group">
	  											<div class="col-md-9 col-sm-9 col-xs-12 ">

	  												<button type="submit" class="btn btn-primary  btn-sm">Buscar</button>
	  												<a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
	  											</div>
	  										</div>
	  									</form>
	  									<div class="col-md-4 col-sm-4 col-xs-12">

	  									</div>
	  									<ul class="nav navbar-right panel_toolbox">
	  										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	  										</li>
	  										<li class="">
	  											<button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-contacto">Registrar Contacto</button>
	  										</li>
	  										<li class="">
	  											<button type="button" id="buscarcortizacion" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-cotizacion">Cotización</button>
	  										</li>
	  										<li class="">
	  											<a style="" id="buscarordencliente" class="btn btn-default btn-sm btn-orden-produccion"  data-toggle="modal" data-target="#modal-produccion">Orden de producción</a>
	  										</li>

	  									</ul>
	  									<div class="clearfix"></div>
	  									<div class="x_content">
	  										<div class="row">
	  											<div class="">
	  												<table id="datatable-buttons" class="table table-striped table-bordered table-hover">
	  													<thead>
	  														<tr>
	  															<th>Cliente</th>
	  															<th>Tipo de Contacto</th>
	  															<th>Descripción</th>
	  															<th>Fecha</th>
	  														</tr>
	  													</thead>
	  													<tbody>
	  													  @forelse ($arraycontacto as $contacto)
	  														<tr data-id="{{$contacto->id}}">
	  															<td>{{$contacto->cliente}}</td>
	  															<td>{{$contacto->tipo}}</td>
	  															<td>{{$contacto->descripcion}}</td>
	  															<td>{{$contacto->fecha}}</td>
	  														</tr>
	  													  @empty
	  													  	No hay registros
	  													  @endforelse

	  													</tbody>
	  												</table>
	  											</div>
	  										</div>


	  									</div>
	  									<div class="row">
	  										<div class="col-md-1">
	  											<button id="modificar" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Modificar</button>
	  										</div>
	  										<div class="col-md-1">
	  											<button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
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
    var idSeleccionado = 0;

    $('table').on('click', 'tr', function(){
      idSeleccionado = $(this).data('id');
      console.log(idSeleccionado);

      window.location.href = window.location.origin+'/public/index.php/vercotizacion/'+idSeleccionado;
      // if($(this).hasClass('selected-table')){
      //   $(this).removeClass('selected-table');
      // }else{
      //   $("tbody tr.selected-table").removeClass('selected-table');
      //   $(this).addClass('selected-table');
      // }



    });

    var table2 = $("#datatable-cotizacion").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    var table3 = $("#datatable-produccion").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    $("#buscarcortizacion").on("click", function(){

    	$.ajaxSetup({
    	    headers: {
    	        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
    	    }
    	});

    	$.ajax({
    	  type: "post",
    	  url: "{{route('buscarcoti')}}",
    	  data: {
    	    'id': $("#clienteidb").val()
    	  },
    	  beforeSend: function() {
    	    $('#loader2').show();
    	  },
    	  complete: function(){
    	    $('#loader2').hide();
    	  },
    	  success: function(data){
    	  	var arrayReturn = data.resultado;
    	  	console.log(arrayReturn);
    	  	table2.destroy();
    	  	if (arrayReturn != undefined){
    	  		table2 = $("#datatable-cotizacion").DataTable({
    	  		  "data": arrayReturn,
    	  		  "columns": [
    	  		    {"data": "Numero"},
    	  		    {"data": "Medida"},
    	  		    {"data": "Fecha"},
    	  		    {"data": "FechaEstimada"},
    	  		    {"data": "Estado"}
    	  		  ],
    	  		  columnDefs : [
    	  		    { targets : [2],
    	  		      render : function (data, type, row) {
    	  		        if (data){
    	  		          var nuevafecha = data.split("-");
    	  		          nuevafecha = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
    	  		          return nuevafecha;
    	  		        }
    	  		        else
    	  		          return "";
    	  		      }
    	  		    },
    	  		    { targets : [3],
    	  		      render : function (data, type, row) {
    	  		        if (data){
    	  		          var nuevafecha = data.split("-");
    	  		          nuevafecha = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
    	  		          return nuevafecha;
    	  		        }
    	  		        else
    	  		          return "";
    	  		      }
    	  		    },
    	  		  ],
    	  		  "initComplete": function(settings, json) {
    	  		      //alert("completado");
    	  		      //$("#loadingSpinner").hide();
    	  		      //$('#loadingSpinner').hide();
    	  		      //or $('#loadingSpinner').empty();
    	  		  },
    	  		  "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
    	  		          $(nRow).attr('data-id', arrayid['Numero']);
    	  		          //$('td', nRow).eq(9).append("<td align='center'><a href='"+window.location.origin+"/public/detalle_rechazo/"+arrayid['id']+"'><i class='fa fa-search'></i></a></td>" );
    	  		          //$('td', nRow).eq(9).attr('href', "/detalle_rechazo" + arrayid['id']);
    	  		  },
    	  		  "processing": true,
    	  		  "language": {
    	  		      "sProcessing":     "Procesando.....",
    	  		      "sLengthMenu":     "Mostrar _MENU_ registros",
    	  		      "sZeroRecords":    "No se encontraron resultados",
    	  		      "sEmptyTable":     "Ningún dato disponible en esta tabla",
    	  		      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    	  		      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    	  		      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    	  		      "sInfoPostFix":    "",
    	  		      "sSearch":         "Buscar:",
    	  		      "sUrl":            "",
    	  		      "sInfoThousands":  ",",
    	  		      "sLoadingRecords": "Cargando...",
    	  		      "oPaginate": {
    	  		        "sFirst":    "Primero",
    	  		        "sLast":     "Último",
    	  		        "sNext":     "Siguiente",
    	  		        "sPrevious": "Anterior"
    	  		      },
    	  		      "oAria": {
    	  		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    	  		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    	  		      }
    	  		    }

    	  		});
    	  		return;

    	  	}
    	  	else {
    	  		table2 = $("#datatable-cotizacion").DataTable({
    	  		  "data": [],
    	  		  "columns": [
    	  		    {"data": ""},
    	  		    {"data": ""},
    	  		    {"data": ""},
    	  		    {"data": ""},
    	  		    {"data": ""}
    	  		  ],
    	  		  "initComplete": function(settings, json) {
    	  		      //alert("completado");
    	  		      //$("#loadingSpinner").hide();
    	  		      //$('#loadingSpinner').hide();
    	  		      //or $('#loadingSpinner').empty();
    	  		  },
    	  		  "processing": true,
    	  		  "language": {
    	  		      "sProcessing":     "Procesando.....",
    	  		      "sLengthMenu":     "Mostrar _MENU_ registros",
    	  		      "sZeroRecords":    "No se encontraron resultados",
    	  		      "sEmptyTable":     "Ningún dato disponible en esta tabla",
    	  		      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    	  		      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    	  		      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    	  		      "sInfoPostFix":    "",
    	  		      "sSearch":         "Buscar:",
    	  		      "sUrl":            "",
    	  		      "sInfoThousands":  ",",
    	  		      "sLoadingRecords": "Cargando...",
    	  		      "oPaginate": {
    	  		        "sFirst":    "Primero",
    	  		        "sLast":     "Último",
    	  		        "sNext":     "Siguiente",
    	  		        "sPrevious": "Anterior"
    	  		      },
    	  		      "oAria": {
    	  		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    	  		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    	  		      }
    	  		    }

    	  		});
    	  		return;

    	  	}

    	  }
    	});

    });

    $("#buscarordencliente").on("click", function(){

      	$.ajaxSetup({
       	    headers: {
       	        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
       	    }
       	});

       	$.ajax({
       	  type: "post",
       	  url: "{{route('buscarordencliente')}}",
       	  data: {
       	    'id': $("#clienteidb").val()
       	  },
       	  beforeSend: function() {
       	    $('#loader3').show();
       	  },
       	  complete: function(){
       	    $('#loader3').hide();
       	  },
       	  success: function(data){
       	  	var arrayReturn = data.resultado;
       	  	table3.destroy();
       	  	if (arrayReturn != undefined){
       	  		table3 = $("#datatable-produccion").DataTable({
       	  		  "data": arrayReturn,
       	  		  "columns": [
       	  		    {"data": "Norden"},
       	  		    {"data": "Medida"},
       	  		    {"data": "URG"},
       	  		    {"data": "FechaPrometida"},
       	  		    {"data": "Estado"}
       	  		  ],
       	  		  columnDefs : [
       	  		    { targets : [3],
       	  		      render : function (data, type, row) {
       	  		        if (data){
       	  		          var nuevafecha = data.split("-");
       	  		          nuevafecha = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
       	  		          return nuevafecha;
       	  		        }
       	  		        else
       	  		          return "";
       	  		      }
       	  		    },
       	  		  ],
       	  		  "initComplete": function(settings, json) {
       	  		      //alert("completado");
       	  		      //$("#loadingSpinner").hide();
       	  		      //$('#loadingSpinner').hide();
       	  		      //or $('#loadingSpinner').empty();
       	  		  },
       	  		  "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
       	  		          $(nRow).attr('data-id', arrayid['clienteid']);
       	  		          //$('td', nRow).eq(9).append("<td align='center'><a href='"+window.location.origin+"/public/detalle_rechazo/"+arrayid['id']+"'><i class='fa fa-search'></i></a></td>" );
       	  		          //$('td', nRow).eq(9).attr('href', "/detalle_rechazo" + arrayid['id']);
       	  		  },
       	  		  "processing": true,
       	  		  "language": {
       	  		      "sProcessing":     "Procesando.....",
       	  		      "sLengthMenu":     "Mostrar _MENU_ registros",
       	  		      "sZeroRecords":    "No se encontraron resultados",
       	  		      "sEmptyTable":     "Ningún dato disponible en esta tabla",
       	  		      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
       	  		      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
       	  		      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       	  		      "sInfoPostFix":    "",
       	  		      "sSearch":         "Buscar:",
       	  		      "sUrl":            "",
       	  		      "sInfoThousands":  ",",
       	  		      "sLoadingRecords": "Cargando...",
       	  		      "oPaginate": {
       	  		        "sFirst":    "Primero",
       	  		        "sLast":     "Último",
       	  		        "sNext":     "Siguiente",
       	  		        "sPrevious": "Anterior"
       	  		      },
       	  		      "oAria": {
       	  		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
       	  		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       	  		      }
       	  		    }

       	  		});
       	  		return;

       	  	}
       	  	else{
       	  		table3 = $("#datatable-produccion").DataTable({
       	  		  "data": [],
       	  		  "columns": [
       	  		    {"data": ""},
       	  		    {"data": ""},
       	  		    {"data": ""},
       	  		    {"data": ""},
       	  		    {"data": ""}
       	  		  ],
       	  		  "initComplete": function(settings, json) {
       	  		      //alert("completado");
       	  		      //$("#loadingSpinner").hide();
       	  		      //$('#loadingSpinner').hide();
       	  		      //or $('#loadingSpinner').empty();
       	  		  },
       	  		  "processing": true,
       	  		  "language": {
       	  		      "sProcessing":     "Procesando.....",
       	  		      "sLengthMenu":     "Mostrar _MENU_ registros",
       	  		      "sZeroRecords":    "No se encontraron resultados",
       	  		      "sEmptyTable":     "Ningún dato disponible en esta tabla",
       	  		      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
       	  		      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
       	  		      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       	  		      "sInfoPostFix":    "",
       	  		      "sSearch":         "Buscar:",
       	  		      "sUrl":            "",
       	  		      "sInfoThousands":  ",",
       	  		      "sLoadingRecords": "Cargando...",
       	  		      "oPaginate": {
       	  		        "sFirst":    "Primero",
       	  		        "sLast":     "Último",
       	  		        "sNext":     "Siguiente",
       	  		        "sPrevious": "Anterior"
       	  		      },
       	  		      "oAria": {
       	  		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
       	  		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       	  		      }
       	  		    }

       	  		});
       	  		return;


       	  	}
       	  }
       	});
    });


    $('#limpiarbusqueda').on('click', function(){
    	$('#tipoContactoidb').val("");
    	$('#titulob').val("");
    	$('#descripcionb').val("");
    	$('#date_startb').val("");
    	$('#date_endb').val("");
    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "deleteCrmcontacto/" + idSeleccionado;
        console.log(url);
        $.ajax({
          type: "DELETE",
          url: url,
          success: function(data){
            if (data == "true"){
              location.reload();
            }
          }
        });

    });

    $('#modificar').on('click', function(){
        console.log("Modicar: ", idSeleccionado);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });
        var url = "ver_contacto/" + idSeleccionado;
        $.ajax({
          type: "GET",
          url: url,
          success: function(data){
            console.log(data);
            $("#tipoContactoid").val(data.tipoContactoid);
            $("#descripcion").val(data.descripcion);
            $("#fecha").val(data.fecha);
            $("#clienteid").val(data.clienteid);
            $("#titulo").val(data.titulo);

          }
        });
    });

    $('#enviar_m').on('click', function(){
      var tipoContactoid = $("#tipoContactoid").val();
      var descripcion = $("#descripcion").val();
      var fecha = $("#fecha").val();
      var clienteid = $("#clienteid").val();
      var titulo = $("#titulo").val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "update_contacto/" + idSeleccionado;
      $.ajax({
        type: "put",
        url: urledit,
        data: {
          'tipoContactoid' : tipoContactoid,
          'descripcion' : descripcion,
          'fecha' : fecha,
          'clienteid' : clienteid,
          'titulo' : titulo
        },
        success: function(data){
          if(data=="true"){
            location.reload();
          }
        }
      });
    });

  });
</script>
@endsection
