@extends('layouts.app')

@section('content')
	<!-- Inicio de las ventanas modales-->
	<!--  modal Eliminar  -->

	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2">¿Está seguro que desea eliminar?</h4>
				</div>
				<div class="modal-body cuerpo-modal">
					
				</div>
				<div class="modal-footer">
					
					<button id="send_delete" type="button" class="btn btn-primary">Aceptar</button>
					<button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
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
					<h4 class="modal-title" id="myModalLabel2">Modificar Medida</h4>
				</div>
				<div class="modal-body cuerpo-modal">
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

					<div class="form-group">
						<div class="row">

							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Díametro Exterior</label>
								<input type="text" id="diamexu" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Espesor Nominal</label>
								<input type="text" id="espesoru" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Largo Mínimo</label>
								<input type="text" id="largominu" class="form-control col-md-7 col-xs-12">
							</div> 


						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Largo Máximo</label>
								<input type="text" id="largomaxu" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Tipo Costura</label>
								<select id="costuraidu" class="form-control">
									<option></option>
									@foreach($tipocostura as $tipo)
										<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
									@endforeach
								</select>
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Tipo De Acero</label>
								<select id="aceroidu" class="form-control">
									<option></option>
									@foreach($tipoacero as $tipo)
										<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
									@endforeach
								</select>
							</div> 

						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Tratamiento Térmico</label>
								<select id="tratamientou" class="form-control">
									<option></option>
									@foreach($tratamiento as $tipo)
										<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
									@endforeach
								</select>
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Norma</label>
								<select id="normau" class="form-control">
									<option></option>
									@foreach($normas as $tipo)
										<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
									@endforeach
								</select>
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Observación</label>
								<textarea class="text-area" name="" id="" ></textarea>
							</div>
						</div>



					</form>

				</div>
				<div class="modal-footer">
					
					<a id="enviar_m" class="btn btn-primary">Guardar</a>
					<button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
				</div>

			</div>

		</div>
	</div>
</div>
<!-- /modals modificar-->

<!--  modal Agregar Medida-->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-nota">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel2">Agregar Medida</h4>
			</div>
			<div class="modal-body cuerpo-modal">
				<form id="demo-form2" action="{{route('medidas.store')}}" method="post" autocomplete="off" data-parsley-validate class="form-horizontal form-label-left">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="form-group">
						<div class="row">

							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Díametro Exterior</label>
								<input type="text" id="" name="diamex" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Espesor Nominal</label>
								<input type="text" id="" name="espesor" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Largo Mínimo</label>
								<input type="text" id="" name="largomin" class="form-control col-md-7 col-xs-12">
							</div> 


						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Largo Máximo</label>
								<input type="text" id="" name="largomax" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Tipo Costura</label>
								<select name="costuraida" class="form-control">
									<option></option>
									@foreach($tipocostura as $tipo)
										<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
									@endforeach
								</select>
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Tipo De Acero</label>
								<select name="aceroida" class="form-control">
									<option></option>
									@foreach($tipoacero as $tipo)
										<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
									@endforeach
								</select>
							</div> 

						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Tratamiento Térmico</label>
								<select name="tratamientoa" class="form-control">
									<option></option>
									@foreach($tratamiento as $tipo)
										<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
									@endforeach
								</select>
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Norma</label>
								<select name="normaa" class="form-control">
									<option></option>
									@foreach($normas as $tipo)
										<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
									@endforeach
								</select>
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Observación</label>
								<textarea class="text-area" name="observacion" id="" ></textarea>
							</div>
						</div>




				</div>
				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
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
						<h2>Consulte el stock por medida</h2>
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
						<form id="busqueda" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<div  class="row">
								  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
								    <label class="control-label" for="first-name">Diámetro Exterior</label>
								  </div>
								  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
								    <label class="control-label" for="first-name">Espesor</label>
								  </div>
								</div>
								<div  class="row">
								  <div class="col-md-3 col-sm-3 col-xs-3">
								    <label class="control-label" for="first-name">Desde</label>
								    <input type="text" id="diamextdesde" placeholder="" class="form-control col-md-7 col-xs-12">
								  </div>
								  <div class="col-md-3 col-sm-3 col-xs-3">
								    <label class="control-label" for="first-name">Hasta</label>
								    <input type="text" id="diamexthasta" placeholder="" class="form-control col-md-7 col-xs-3">
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
								    <label class="control-label" for="first-name">Largo mínimo</label>
								  </div>
								  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
								    <label class="control-label" for="first-name">Largo máximo</label>
								  </div>
								</div>
								<div  class="row">
								  <div class="col-md-3 col-sm-3 col-xs-3">
								    <label class="control-label" for="first-name">Desde</label>
								    <input type="text" id="largomindesde" placeholder="" class="form-control col-md-7 col-xs-12">
								  </div>
								  <div class="col-md-3 col-sm-3 col-xs-3">
								    <label class="control-label" for="first-name">Hasta</label>
								    <input type="text" id="largominhasta" placeholder="" class="form-control col-md-7 col-xs-3">
								  </div>
								  <div class="col-md-3 col-sm-3 col-xs-3">
								    <label class="control-label" for="first-name">Desde</label>
								    <input type="text" id="largomaxdesde" placeholder="" class="form-control col-md-7 col-xs-3">
								  </div>
								  <div class="col-md-3 col-sm-3 col-xs-3">
								    <label class="control-label" for="first-name">Hasta</label>
								    <input type="text" id="largomaxhasta" placeholder="" class="form-control col-md-7 col-xs-3">
								  </div>
								</div>
								

								<div class="row">
								  <div class="col-md-3 col-sm-3 col-xs-12">
								    <label class="control-label" for="first-name">Tipo Acero:</label>
								    <span><a id="alternar-check-4">Elegir <span class="fa fa-chevron-down"></span></a></span>

								  </div>
								  <div id="respuesta-check-4" style="display: none; margin-left:10px;">

								    <select multiple="multiple" id="my-select-3" name="my-select-tipoaceroid[]" >
								      @foreach ($tipoacero as $norma)
								        <option value='{{$norma->id}}'>{{$norma->descripcion}}</option>
								      @endforeach
								    </select>

								  </div> 
								</div> 
								<div class="row">
								  <div class="col-md-3 col-sm-3 col-xs-12">
								    <label class="control-label" for="first-name">Tipo Costura:</label>
								    <span><a id="alternar-check-5">Elegir <span class="fa fa-chevron-down"></span></a></span>

								  </div>
								  <div id="respuesta-check-5" style="display: none; margin-left:10px;">
								    <select multiple="multiple" id="my-select-2" name="my-select[]" >
								    @foreach ($tipocostura as $tipo)
								      <option value='{{$tipo->id}}'>{{$tipo->descripcion}}</option>
								    @endforeach
								      
								    </select>


								    <!--
								    <div class="row">
								      <div class="col-md-12 col-sm-12 col-xs-12">
								        <input type="checkbox" class="flat" name="table_records">
								        <label class="control-label" for="first-name">Seleccione</label>
								      </div>
								      <div class="col-md-12 col-sm-12 col-xs-12">
								        <input type="checkbox" class="flat" name="table_records">
								        <label class="control-label" for="first-name">Seleccione</label>
								      </div>
								      <div class="col-md-12 col-sm-12 col-xs-12">

								        <input type="checkbox" class="flat" name="table_records">
								        <label class="control-label" for="first-name">Seleccione</label>

								      </div>

								    </div>-->

								  </div> 
								</div>
								<div class="row">
								  <div class="col-md-3 col-sm-3 col-xs-12">
								    <label class="control-label" for="first-name">Norma:</label>
								    <span><a id="alternar-check-6">Elegir <span class="fa fa-chevron-down"></span></a></span>


								  </div>

								  <div id="respuesta-check-6" style="display: none; margin-left:10px;">
								    <select multiple="multiple" id="my-select" name="my-select[]" >
								      @foreach ($normas as $norma)
								        <option value='{{$norma->id}}'>{{$norma->descripcion}}</option>
								      @endforeach
								    </select>

								    <!--
								    <div class="row">
								      <div class="col-md-12 col-sm-12 col-xs-12">
								        <input type="checkbox" class="flat" name="table_records">
								        <label class="control-label" for="first-name">Seleccione</label>
								      </div>
								      <div class="col-md-12 col-sm-12 col-xs-12">
								        <input type="checkbox" class="flat" name="table_records">
								        <label class="control-label" for="first-name">Seleccione</label>
								      </div>
								      <div class="col-md-12 col-sm-12 col-xs-12">

								        <input type="checkbox" class="flat" name="table_records">
								        <label class="control-label" for="first-name">Seleccione</label>

								      </div>-->


								    </div><!-- Cierra row id respuesta-check-3-->

								  </div> <!-- Cierra div id respuesta-check-3-->

								  <div class="row">
								  	<div class="col-md-6 col-sm-6 col-xs-12">
								  		<label class="control-label" for="first-name">Tratamiento Térmico</label>
								  		<select id="tipotrat" class="form-control">
								  			<option></option>
								  			@foreach($tratamiento as $tipo)
								  				<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
								  			@endforeach
								  		</select>
								  	</div> 

								  </div>

								  <div  class="row">
								    <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
								      <label class="control-label" for="first-name">Kilogramos</label>
								    </div>
								    <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
								      <label class="control-label" for="first-name">KG / Metro</label>
								    </div>
								  </div>
								  <div  class="row">
								    <div class="col-md-3 col-sm-3 col-xs-3">
								      <label class="control-label" for="first-name">Desde</label>
								      <input type="text" id="kgsdesde" placeholder="" class="form-control col-md-7 col-xs-12">
								    </div>
								    <div class="col-md-3 col-sm-3 col-xs-3">
								      <label class="control-label" for="first-name">Hasta</label>
								      <input type="text" id="kgshasta" placeholder="" class="form-control col-md-7 col-xs-3">
								    </div>
								    <div class="col-md-3 col-sm-3 col-xs-3">
								      <label class="control-label" for="first-name">Desde</label>
								      <input type="text" id="kgmetrosdesde" placeholder="" class="form-control col-md-7 col-xs-3">
								    </div>
								    <div class="col-md-3 col-sm-3 col-xs-3">
								      <label class="control-label" for="first-name">Hasta</label>
								      <input type="text" id="kgmetroshasta" placeholder="" class="form-control col-md-7 col-xs-3">
								    </div>
								  </div>

								  <div  class="row">
								    <div class="col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 col-xs-12 col-xs-3 col-xs-offset-0">
								      <label class="control-label" for="first-name">Ubicacion:</label>
								    </div>
								  </div>

								   <div  class="row">

								    <div class="col-md-3 col-sm-3 col-xs-3">
								      <select name="deposito" id="deposito" class="form-control">
								      	<option value="-1">Todos</option>
								      	<option value="1">Moreno</option>
								      	<option value="2">San Martin</option>
								      </select>
								    </div>

								    <div class="col-md-2 col-sm-2 col-xs-2">
								      <select name="selectubi" id="selectubi" class="form-control">
								      	<option value="-1">Todos</option>
								      </select>
								    </div>

								    <div class="col-md-2 col-sm-2 col-xs-2">
								      <select name="select3" id="select3" class="form-control">
								      	<option value="-1">Todos</option>
								      </select>
								    </div>

								  </div>


								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12 ">

										<a id="buscarmedida" class="btn btn-primary  btn-sm">Buscar</a>
										<a id="limpiar" class="btn btn-success  btn-sm">Limpiar</a>
									</div>
								</div>


							</form>
							<div class="col-md-4 col-sm-4 col-xs-12">

							</div>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li class="">
									<!-- <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-nota">Agregar Medida</button> -->


								</li>
								
							</ul>
							<div class="row">
								<div class="x_content">

								<div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
								  <table id="datatable-medida" class="table table-striped table-bordered table-hover">
								    <thead>
								      {{-- <tr>
								        <th>Paquetes Asociados</th>
								        <th>verPaquetesxMedida</th>
								        <th>VER</th>
									  </tr> --}}
									  <tr>
								        <th>Diametro exterior</th>
										<th>Espersor horizontal</th>
										<th>Largo</th>
										<th>Costura</th>
										<th>T Térmico</th>
										<th>Acero</th>
										<th>norma</th>
										<th>estado</th>
										<th>Stock (kgs)</th>
										<th>kg/m</th>
										<th>Observaciones</th>
								        <th>VER</th>
								      </tr>
								    </thead>
								    <tbody>
								    	
								    </tbody>
								  </table>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-md-1">
									<button id="modificar" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Modificar</button>
								</div>
								<div class="col-md-1">
									<button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->
	@include('medida.modalpaquetedetalles')
@endsection

@section('js_extra')
<script type="text/javascript">
  $(function(){

    var table = $("#datatable-medida").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    $('#limpiar').on('click', function(){
    	$('#diamexb').val("");
    	$('#espesorb').val("");
    	$('#largominb').val("");
    	$('#largomaxb').val("");
    	$('#costuraidb').val("");
    	$('#aceroidb').val("");
    	$('#tratamientob').val("");
    	$('#normab').val("");
    	table.clear().draw();
    });

    $('table').on('click', 'tr', function(){
      idSeleccionado = $(this).data('id');

      if($(this).hasClass('selected-table')){
        $(this).removeClass('selected-table');
      }else{
        $("tbody tr.selected-table").removeClass('selected-table');
        $(this).addClass('selected-table');
      }

    });

    $('#modificar').on('click', function(){

        var url = 'medidas/'+idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
          	$('#diamexu').val(data.diametroExterior);
          	$('#espesoru').val(data.espesorNominal);
          	$('#largominu').val(data.largoMinimo);
          	$('#largomaxu').val(data.largoMaximo);
          	$('#costuraidu').val(data.tipoCostura);
          	$('#aceroidu').val(data.tipoAceroSAE);
          	$('#tratamientou').val(data.tratamientoTermico);
          	$('#normau').val(data.normaid);

          	return;
            
          }
        });
    });

    function TravelObj(){
    	var inputs = $('#busqueda input');
    	var selects = $('#busqueda select');

    	var obj = {};

    	inputs.each(function( index ) {
		  obj[$(this).attr('id')] = $(this).val();
		});

		selects.each(function( index ) {
		  obj[$(this).attr('id')] = $(this).val();
		});

		return obj;

    }


    $('#buscarmedida').on('click', function(){

    	var dataform = TravelObj();
    	console.log(dataform);

    	$.ajax({  
    	  type: "get",
    	  url: "{{route('SearchMedida')}}",
    	  data: dataform,
    	  beforeSend: function() {
    	     $('#loader').show();
    	  },
    	  complete: function(){
    	     $('#loader').hide();
    	  },
    	  success: function(data){
    	  	if(data.length>0){
    	  		var arrayReturn = data;
				  console.log(arrayReturn)
    	  		table.destroy();

    	  		table = $("#datatable-medida").DataTable({
    	  		    	 	"data": arrayReturn,
    	  		    	 	"columns": [
    	  		    	 	  {"data": "Diametro Exterior"},
							  {"data": "Espesor Nominal"},
							  {"data": "Largo"},
							  {"data": "Costura"},
							  {"data": "T Térmico"},
							  {"data": "Acero"},
							  {"data": "Norma"},
							  {"data": "Estado"},
							  {"data": "Stock (kgs)"},
							  {"data": "Kg / m"},
							  {"data": "Observaciones"},

    	  		    	 	  {"data": null, 
    	  		    	 	    render : function (data, type, row) {
    	  		    	 	      return `<button type="button" class="btn btn-link" onclick="openModal(${row.id})">
									Ver
									</button>`;
    	  		    	 	    }
    	  		    	 	  },
    	  		    	 	],
    	  		    	 	"order": [],
    	  		    	 	"initComplete": function(settings, json) {
    	  		    	 	    //alert("completado");
    	  		    	 	    //$("#loadingSpinner").hide();
    	  		    	 	    //$('#loadingSpinner').hide();
    	  		    	 	    //or $('#loadingSpinner').empty();
    	  		    	 	},

    	  		    	 	"fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
    	  		    	 	        $(nRow).attr('data-id', arrayid['id']);
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

    	  	}
    	  	else{
    	  		table.clear().draw();
    	  	}
    	  }
    	});
    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "medidas/" + idSeleccionado;
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
      var codigo = $("#codigo").val();
      var diametroNominal = $("#diametroNominal").val();
      var tipoMaterialid = $("#tipoMaterialid").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "medidas/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'diamexu': $('#diamexu').val(),
          'espesoru': $('#espesoru').val(),
          'largominu': $('#largominu').val(),
          'largomaxu': $('#largomaxu').val(),
          'costuraidu': $('#costuraidu').val(),
          'aceroidu': $('#aceroidu').val(),
          'tratamientou': $('#tratamientou').val(),
          'normau': $('#normau').val()
        },
        success: function(data){
          if(data=="true"){
            location.reload();
          }
        }
      });
    });

    for (var i = 1; i < 31; i++) {
    	var opt = "<option value='"+i+"'>"+i+"</option>";
    	$('#select3').append(opt);
    }

    $('#deposito').on('click', function(){
    	cambio_dep(0, $(this).val(), "dep1");
    });

    function cambio_dep(idp,val,dep){

    	$.ajax({  
    	  type: "get",
    	  url: "{{route('deposito')}}",
    	  data: {
    	    'idp': idp,
    	    'val': val,
    	    'dep': dep
    	  },
    	  success: function(data){
    	    $('#selectubi option').remove();

    	    for (var i = 0; i < data.letras.length; i++) {
    	    	var letra = data.letras[i];

    	    	var opt = "<option value='"+letra+"'>"+letra+"</option>";
    	    	$('#selectubi').append(opt);
    	    }
    	  }
    	});

    }

  });
</script> 
@endsection