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

						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Asunto</label>
								<input autocomplete="off" name="asunto" type="text" id="asunto" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Para</label>
								<select name="paraUserid" id="paraUserid" class="form-control">
									@foreach ($usuarios as  $usuario)
										<option value="{{$usuario->id}}">{{$usuario->usuario}}</option>
									@endforeach 
								</select>
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Cliente Relacionado</label>
								<select name="clienteid" id="clienteid" class="form-control">
									@foreach ($clientes as  $cliente)
										<option value="{{$cliente->id}}">{{$cliente->nombreFantasia}}</option>
									@endforeach
								</select>
							</div> 
						</div>
						<div class="row">
							
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Fecha y Hora</label>
								<div class='input-group date' id='myDatepickerCrearNota'>
									<input autocomplete="off" name="fecha" id="fecha" type='text' class="form-control" />
									<span class="input-group-addon">
										<span class="fa fa-calendar"></span>
									</span>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<label class="control-label" for="first-name">Descripción</label>
								<input autocomplete="off" name="descripcion" id="descripcion" type="text"  class="form-control col-md-7 col-xs-12">
							</div> 

						</div>
					</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
					<button id="enviar_m" class="btn btn-primary">Guardar</button>
				</div>

			</div>

		</div>
	</div>
</div>
<!-- /modals modificar-->

<!--  modal Agregar Nota-->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-nota">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel2">Agregar Nota</h4>
			</div>
			<div class="modal-body cuerpo-modal">
				<form id="demo-form2" action="{{route('create_nota')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Asunto</label>
								<input autocomplete="off" name="asunto" type="text" id=""  class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Para</label>
								<select name="paraUserid" id="" class="form-control">
									@foreach ($usuarios as  $usuario)
										<option value="{{$usuario->id}}">{{$usuario->usuario}}</option>
									@endforeach 
								</select>
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Cliente Relacionado</label>
								<select name="clienteid" id="" class="form-control">
									@foreach ($clientes as  $cliente)
										<option value="{{$cliente->id}}">{{$cliente->nombreFantasia}}</option>
									@endforeach
								</select>
							</div> 
						</div>
						<div class="row">
							
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Fecha y Hora</label>
								<div class='input-group date' id='DatepickerAddNota'>
									<input autocomplete="off" name="fecha" type='text' class="form-control" />
									<span class="input-group-addon">
										<span class="fa fa-calendar"></span>
									</span>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<label class="control-label" for="first-name">Descripción</label>
								<input autocomplete="off" name="descripcion" type="text"  class="form-control col-md-7 col-xs-12">
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
						<h2>Buscar Nota</h2>
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
						<form action="{{route('nota')}}" method="get" autocomplete="off">
							<input type="hidden" name="type" value="1">
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="control-label" for="first-name">Estado</label>
										<select id="estadoidb" name="estadoidb" class="form-control">
											@foreach ($estados as  $estado)
												<option value="{{$estado->id}}">{{$estado->descripcion}}</option>
											@endforeach 
										</select>
									</div> 
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="control-label" for="first-name">Cliente</label>
										<select id="clienteidb" name="clienteidb" class="form-control">
											@foreach ($clientes as  $cliente)
												<option value="{{$cliente->id}}">{{$cliente->razon}}</option>
											@endforeach 
										</select>
									</div> 
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="control-label" for="first-name">Para</label>
										<select id="paraidb" name="paraidb" class="form-control">
											@foreach ($usuarios as  $usuario)
												<option value="{{$usuario->id}}">{{$usuario->usuario}}</option>
											@endforeach 
										</select>
									</div> 
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="control-label" for="first-name">Asunto</label>
										<input id="asuntob" name="asuntob" autocomplete="off" type="text" id=""  class="form-control col-md-7 col-xs-12">
									</div> 

									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="control-label" for="first-name">Fecha</label>
										<div class='input-group date' id='myDatepickerNota'>
											<input id="fechab" type='text' class="form-control" />
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
									<button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-nota">Agregar Nota</button>


								</li>
								
							</ul>
							<div class="clearfix"></div>
							<div class="x_content">
								<div class="row">
									<div class="">
										<table id="datatable-buttons"  class="table table-striped table-bordered table-hover" style="width: 100%">
											<thead>
												<tr>
													<th>Asunto</th>
													<th>Fecha/Hora</th>
													<th>De</th>
													<th>Para</th>
													<th>Estado</th>
												</tr>
											</thead>
											<tbody>
												@forelse ($arraynotas as $nota)
												<tr data-id="{{$nota->id}}">
													<td>{{$nota->asunto}}</td>
													<td>{{$nota->fecha}}</td>
													<td>{{$nota->de}}</td>
													<td>{{$nota->para}}</td>
													<td>{{$nota->estado}}</td>
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
									<button id="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
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

      if($(this).hasClass('selected-table')){
        $(this).removeClass('selected-table');
      }else{
        $("tbody tr.selected-table").removeClass('selected-table');
        $(this).addClass('selected-table');
      }

    });

    $('#limpiarbusqueda').on('click', function(){
    	$("#estadoidb").val("");
    	$("#paraidb").val("");
    	$("#clienteidb").val("");
    	$("#asuntob").val("");
    	$("#fechab").val("");

    });

    $('#modificar').on('click', function(){
        console.log("Modicar: ", idSeleccionado);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });
        var url = "notas/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            console.log(data);
            $("#paraUserid").val(data.paraUserid);
            $("#clienteid").val(data.clienteid);
            $("#estadoid").val(data.estadoid);
            $("#asunto").val(data.asunto);
            $("#fecha").val(data.fecha);
            $("#descripcion").val(data.descripcion);

          }
        });
    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "deleteNota/" + idSeleccionado;
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

    $('#enviar_m').on('click', function(){
      var paraUserid = $("#paraUserid").val();
      var clienteid = $("#clienteid").val();
      var estadoid = $("#estadoid").val();
      var asunto = $("#asunto").val();
      var fecha = $("#fecha").val();
      var descripcion = $("#descripcion").val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "notas/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'paraUserid' : paraUserid,
          'clienteid' : clienteid,
          'estadoid' : estadoid,
          'asunto' : asunto,
          'fecha' : fecha,
          'descripcion' : descripcion
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