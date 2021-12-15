@extends('layouts.app')

@section('content')

	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2">Eliminar</h4>
				</div>
				<div class="modal-body cuerpo-modal">
					<form action="  " method="get" accept-charset="utf-8">

						<div class="form-group">

							<div class="col-md-6 col-sm-6 div-input-modal">
								<label for="first-name" for="first-name">Usuario</label>
								<input type="text" id="first-name"  class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-6 col-sm-6 div-input-modal">
								<label for="first-name" for="first-name">Contraseña</label>
								<input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" >
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
					<!-- <button id="send" type="button" class="btn btn-primary">Guardar</button> -->
				</div>
				
			</div>
		</div>
	</div>
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

							<div class="col-md-6 col-sm-6 div-input-modal">
								<label for="first-name" for="first-name">Usuario</label>
								<input type="text" id="first-name"  class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-6 col-sm-6 div-input-modal">
								<label for="first-name" for="first-name">Contraseña</label>
								<input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" >
							</div>
						</div>
					</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary">Guardar</button>
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





<!-- Fin de las ventanas modales-->


<div class="right_col" role="main">



	<div class="">  

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Búsqueda</h2>
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
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="control-label" for="first-name">Cliente</label>
										<select id="clienteidb" class="form-control" required>
											<option value=""></option>
											@foreach ($clientes as $cliente)
												<option value="{{$cliente->id}}">{{$cliente->razon}}</option>
											@endforeach
										</select>
									</div> 
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="control-label" for="first-name">Usuario</label>
										<select id="usuarioidb" class="form-control" required>
											<option value=""></option>
											@foreach ($usuarios as $usuario)
												<option value="{{$usuario->id}}">{{$usuario->usuario}}</option>
											@endforeach
										</select>
									</div> 
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="control-label" for="first-name">Prioridad</label>
										<select id="prioridadidb" class="form-control" required>
											<option value=""></option>
											@foreach ($prioridades as $prioridad)
												<option value="{{$prioridad->id}}">{{$prioridad->descripcion}}</option>
											@endforeach
										</select>
									</div> 
								</div>
								
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="control-label" for="first-name">Fecha Prometida - Desde</label>
										<div class='input-group date' id='DatepickerPrometidaDesde'>
											<input id="fechaprometidadesdeb" type='text' class="form-control" />
											<span class="input-group-addon">
												<span class="fa fa-calendar"></span>
											</span>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="control-label" for="first-name">Fecha Prometida - Hasta</label>
										<div class='input-group date' id='DatepickerPrometidaHasta'>
											<input id="fechaprometidahastab" type='text' class="form-control" />
											<span class="input-group-addon">
												<span class="fa fa-calendar"></span>
											</span>
										</div>
									</div>


								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="control-label" for="first-name">Fecha Real - Desde</label>
										<div class='input-group date' id='DatepickerRealDesde'>
											<input id="fecharealdesdeb" type='text' class="form-control" />
											<span class="input-group-addon">
												<span class="fa fa-calendar"></span>
											</span>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="control-label" for="first-name">Fecha Real - Hasta</label>
										<div class='input-group date' id='DatepickerRealHasta'>
											<input id="fecharealhastab" type='text' class="form-control" />
											<span class="input-group-addon">
												<span class="fa fa-calendar"></span>
											</span>
										</div>
									</div>


								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="control-label" for="first-name">Descripción</label>
										<textarea class="text-area" name="" id="descripcion" cols="" rows=""></textarea>
									</div> 
								</div>

								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12 ">
										<button id="buscarseguimiento" class="btn btn-primary  btn-sm">Buscar</button>
										<button id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</button>
									</div>
								</div>
							<div class="col-md-4 col-sm-4 col-xs-12">

							</div>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li class="">
									<button id="buscarcortizacion" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-cotizacion">Cotización</button>
								</li>
								<li class="">
									<button id="buscarordencliente" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-produccion">Orden de producción</button>


								</li>

							</ul>
							<div class="clearfix"></div>
							<div class="x_content">
								<div class="row">
									<div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
									<div class="">
										<table id="datatable-buttonsseguimiento" class="table table-striped table-bordered table-hover" style="width: 100%">
											<thead>
												<tr>
													<th>Cliente</th>
													<th>Usuario</th>
													<th>Fecha Prometida</th>
													<th>Fecha Real</th>
													<th>Título</th>
													<th>Comentario</th>
													<th>Prioridad</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
										</table>
									</div>
								</div>


							</div>
							<div class="row">
								<div class="col-md-1">
									<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Modificar</button>
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

    var table = $("#table_egreso").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
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

    $("#loadingSpinner").hide();

    var idSeleccionado = 0;

    $('table').on('click', 'tr', function(){
      idSeleccionado = $(this).data('id');

      if($(this).hasClass('selected-table')){
        $(this).removeClass('selected-table');
      }else{
        $("tbody tr.selected-table").removeClass('selected-table');
        $(this).addClass('selected-table');
      }

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



    function validarNumero(elemento)
    {
      var is_numerico = $.isNumeric(elemento);
      return is_numerico;
    }

    function limpiarFormularioBusqueda()
    {
      $("#clienteidb").val("");
      $("#usuarioidb").val("");
      $("#prioridadidb").val("");
      $("#fechaprometidadesdeb").val("");
      $("#fechaprometidahastab").val("");    
      $("#fecharealdesdeb").val("");
      $("#fecharealhastab").val("");
      $("#descripcion").val("");

    }

    $("#limpiarbusqueda").on("click", function(){
      limpiarFormularioBusqueda();
    });

    function convertirFechaAFormato(fecha_recibida)
    {
      var nuevafecha = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
      return nuevafecha;
    }

    function getDate(dateString)
    {
      var dateNew = dateString.split("-");
      return new Date(dateNew[0], dateNew[1]-1, dateNew[2]);
    }

    $("#buscarseguimiento").on('click', function(){
      var clienteid = $("#clienteidb").val();
      var usuarioid = $("#usuarioidb").val();
      var prioridadid = $("#prioridadidb").val();
      var fechaprometidadesde = $("#fechaprometidadesdeb").val();
      var fechaprometidahasta = $("#fechaprometidahastab").val();
      var fecharealdesde = $("#fecharealdesdeb").val();
      var fecharealhasta = $("#fecharealhastab").val();
      var descripcion = $("#descripcion").val();

      var d1 = null;
      var d2 =  null;
      var d3 = null;
      var d4 =  null;

      if(fechaprometidadesde!==undefined && fechaprometidadesde!=""){
        fechaprometidadesde = convertirFechaAFormato(fechaprometidadesde);
        console.log(fechaprometidadesde);
        d1 = getDate(fechaprometidadesde);
      }

      if(fechaprometidahasta!==undefined && fechaprometidahasta!=""){
        fechaprometidahasta = convertirFechaAFormato(fechaprometidahasta);
        console.log(fechaprometidahasta);
        d2 = getDate(fechaprometidahasta);
      }

      if(fecharealdesde!==undefined && fecharealdesde!=""){
        fecharealdesde = convertirFechaAFormato(fecharealdesde);
        console.log(fecharealdesde);
        d3 = getDate(fecharealdesde);
      }

      if(fecharealhasta!==undefined && fecharealhasta!=""){
        fecharealhasta = convertirFechaAFormato(fecharealhasta);
        console.log(fecharealhasta);
        d4 = getDate(fecharealhasta);
      }

      if(d1!=null && d2!=null)
      {
        if(d1>d2)
        {
	      console.log("entro d1 > d2");
          $.toast({ 
            text : "La Fecha Desde no puede ser mayor que la Fecha Hasta", 
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
      }

      if(d3!=null && d4!=null)
      {
        if(d3>d4)
        {
	      console.log("entro d3 > d4");
          $.toast({ 
            text : "La Fecha Desde no puede ser mayor que la Fecha Hasta", 
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
      }
      
    $("#loadingSpinner").show();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

    var urledit = "buscarseguimiento";
      $.ajax({  
        type: "post",
        url: urledit,
        data: {
          'clienteid': clienteid,
          'usuarioid': usuarioid,
          'prioridadid': prioridadid,
          'fechaprometidadesde': fechaprometidadesde,
          'fechaprometidahasta': fechaprometidahasta,
          'fecharealdesde': fecharealdesde,
          'fecharealhasta': fecharealhasta,
          'descripcion': descripcion
        },
        beforeSend: function() {
          $('#loader').show();
        },
        complete: function(){
          $('#loader').hide();
        },
        success: function(data){
        var arrayReturn = data.resultado;
        console.log(arrayReturn);
        table.destroy();
        if (arrayReturn != undefined){
	        table = $("#datatable-buttonsseguimiento").DataTable({
	          "data": arrayReturn,
	          "columns": [
	            {"data": "razon"},
	            {"data": "usuario"},
	            {"data": "fecha_prometida"},
	            {"data": "fecha_real"},
	            {"data": "Titulo"},
	            {"data": "Comentarios"},
	            {"data": "Prioridad"}, 
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
        	table = $("#datatable-buttonsseguimiento").DataTable({
        	  "data": [],
        	  "columns": [
        	    {"data": ""},
        	    {"data": ""},
        	    {"data": ""},
        	    {"data": ""},
        	    {"data": ""},
        	    {"data": ""},
        	    {"data": ""}
        	  ],
        	  "language": {
        	      "sProcessing":     "Procesando.....",
        	      "sLengthMenu":     "Mostrar _MENU_ registros",
        	      "sZeroRecords":    "No se encontraron resultados",
        	      "sEmptyTable":     "No se encontraron resultados de busqueda",
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
        
        


        console.log(data.resultado);
        }

      });


    });



   });
</script>
@endsection