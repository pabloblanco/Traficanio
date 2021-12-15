@extends('layouts.app')

@section('content')

<!-- page content -->
<div id="modalpc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="title_ps"></h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table">
						<tbody id="data_ps">
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>


<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Estado Subprocesos</h2>
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
						<div class="col-md-12">
							<span class="titulo-cliente">Cliente: {{$resultado->cliente}}</span>

						</div>
					</div>
					<div class="row profile_title">
						<div class="col-md-4 ">
							<span class="span-titulos"><strong>Fecha Pedido: {{$fechapedido}}</strong></span>

						</div>
						<div class="col-md-4">
							<span class=""><strong>Fecha Prometida: {{$fechaprometida}}</strong></span>

						</div>
						<div class="col-md-4">
							<span class=""><strong>Semana:{{$semana}}</strong></span>

						</div>
					</div>


					<div class="x_content">
						<div class="row">
							<div class="">
								<div class="table-responsive">
									<table class="table table-striped jambo_table bulk_action">
										<thead>
											<tr class="headings">
												<th class="column-title">N° Orden</th>
												<th class="column-title">Ext</th>
												<th class="column-title">Esp</th>
												<th class="column-title">Int</th>
												<th class="column-title">T/Cos</th>
												<th class="column-title">Term</th>
												<th class="column-title">KG/m</th>
												<th class="column-title">Ext MP</th>
												<th class="column-title">Kgs</th>
												<th class="column-title">Kgs a Preparar</th>
												<th class="column-title">Usos</th>
												<th class="column-title">Embalaje</th>
											</tr>
										</thead>
										<tbody>
											<tr class="even pointer">
												<td>{{$resultado->orden}}</td>
												<td>{{$resultado->diamex}}</td>
												<td>{{$resultado->esp}}</td>
												<td>{{$resultado->diamein}}</td>
												<td>{{$resultado->costura}}</td>
												<td>{{$resultado->term}}</td>
												<td>{{$resultado->kgm}}</td>
												<td>{{$resultado->extmp}}</td>
												<td>{{$resultado->kgs}}</td>
												<td>{{$resultado->kilosap}}</td>
												<td>{{$resultado->uso}}</td>
												<td>{{$resultado->embalaje}}</td>
											</tr>
										</tbody>
									</table>
								</div><br>
								<div class="row profile_title">
									<div class="col-md-12 " id="textplan">
										

										
										
									</div>
									
									
								</div>
								<div class="row profile_title">
									<div class="col-md-6  caja-subproceso" style="width: 800px;">
										<div class="row">
											<div class="col-md-6">
												<span id="imensaje">
												</span><br>
											</div>
										</div>
										<div class="row">
											
											<div class="col-md-12">
													<ul style="padding-left: 10px;" id="estado">
														
													</ul>													
											</div>
										</div>
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<a id="volver" class="btn btn-primary btn-sm">Cerrar</a>
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
	<input type="hidden" id="mensaje" value="{{$mensaje}}">
	<input type="hidden" id="mensajearray" value="{{$mensajearray}}">
	<input type="hidden" id="mensajeplan" value="{{$mensajeplan}}">
	<input type="hidden" id="dataProcesos" value="{{$dataProcesos}}">

@endsection

@section('js_extra')
<script type="text/javascript">
$(function(){

	$('#volver').on('click', function(){
		console.log("entro");
	  	cerrar();
	});

	function cerrar() {        
	    window.close();
	}
	
	var mensajearray = JSON.parse($('#mensajearray').val());
	var mensaje = JSON.parse($('#mensaje').val()).mensaje;
	var planificacion = JSON.parse($('#mensajeplan').val());
	var lenplan = $.map(planificacion, function(n, i) { return i; }).length

	var dataProcesos = JSON.parse($('#dataProcesos').val());
	console.log(dataProcesos);

	if (lenplan>1){
		var textinsert = ` 
						<span class="span-titulos"><strong>FECHA INICIO:</strong> ${planificacion.fechainicio}</span></br>
						<span class="span-titulos"><strong>FECHA  PASE A PLANTA:</strong> ${planificacion.paseaplanta}</span></br>
						<span class="span-titulos"><strong>FECHA PLANIFICADA FINALIZACIÓN:</strong> ${planificacion.fechaplanfinalizacion}</span></br>
						<span class="span-titulos"><strong>TOTAL DE DÍAS:</strong> ${planificacion.totaldias}</span>

						`;
	}
	else{
		var textinsert = `
						<span class="span-titulos"><strong>Nota:</strong> ${planificacion.sinplan}</span>
						`; 
	}

	$('#textplan').append(textinsert);

	var smensaje = mensaje.split(" ");

	$('#imensaje').append(smensaje[0]+' '+smensaje[1]+': '+smensaje[2]+smensaje[3]);

	for (var i = 0; i < mensajearray.length; i++) {
		console.log(mensajearray[i]);
		var e = mensajearray[i];
		var color = e.color;
		var mensaje = e.mensaje;

		var sinf = mensaje.split(' ');

		var texto = sinf[0]+' '+sinf[1];

		if (color == "verde"){
			var divcolor = '00c853';
		}
		else if (color == "azul"){
			var divcolor = '01579b';
		}
		else if (color == "amarillo"){
			var divcolor = 'ffd600';
		}
		else if (color == "rojo"){
			var divcolor = 'd50000';
		}
		else{
			var divcolor = '000000';
		}

		$('#estado').append(`<li style="list-style-type: none;" data-position="${i}" class='proc'><div class='circulo-status-${i}' style="float: left;"></div> <p style="margin-left: 30px;">${mensaje}</p></li>`);
		
		var divCirculo = $(`div[class='circulo-status-${i}']`);
		divCirculo.css("background-color", "#"+divcolor);
		divCirculo.css("width", "25px");
		divCirculo.css("height", "25px");
		divCirculo.css("-moz-border-radius", "50%");
		divCirculo.css("-webkit-border-radius", "50%");
		divCirculo.css("border", "50%");
	}
	
	function modalopen(content, title){
		console.log(content);
		$('#title_ps').text(title);
		$('#modalpc').modal('show');
		$('#data_ps tr').remove();
		$('#data_ps').append(content);
	}

	$(document).on('click', "li[class='proc']", function(){
		var position = $(this).data('position');
		var data = dataProcesos[position].data;
		if (data.estadoid==4){
			var tp = dataProcesos[position].tp;
			var titleps = "";
			if (tp==1){//preparacionmp
				console.log(data);
				var obs = data.observaciones;
				if(data.observaciones==null)
					obs = "";

				var tableps = ` 
					<tr>
						<th>Trazabilidad:</th>
						<td>${data.trazabilidad}</td>
					</tr>
					<tr>
						<th>Kilogramos separados:</th>
						<td>${data.kilos}</td>
					</tr>
					<tr>
						<th>Stock:</th>
						<td>${data.stock}</td>
					</tr>
					<tr>
						<th>Virgen:</th>
						<td>${data.virgen}</td>
					</tr>
					<tr>
						<th>Horno:</th>
						<td>${data.horno}</td>
					</tr>
					<tr>
						<th>Batea:</th>
						<td>${data.batea}</td>
					</tr>
					<tr>
						<th>A reprocesar:</th>
						<td>${data.reprocesar}</td>
					</tr>
					<tr>
						<th>Corte:</th>
						<td>${data.corte}</td>
					</tr>
					<tr>
						<th>Operario:</th>
						<td>${data.ope}</td>
					</tr>
					<tr>
						<th>Observaciones:</th>
						<td>${obs}</td>
					</tr>
				`;

				titleps="PreparacionMP";
			}
			else if(tp==2){//horno
				titleps = "Horno";

				var obs = data.observaciones;
				if(data.observaciones==null)
					obs = "";

				var fecha = converDate2(data.fechaEjecucion);

				var tableps = ` 
					<tr>
						<th>Hora Carga:</th>
						<td>${data.horaCarga}</td>
					</tr>
					<tr>
						<th>Fecha:</th>
						<td>${fecha}</td>
					</tr>
					<tr>
						<th>Caños por camada:</th>
						<td>${data.caniosxCamada}</td>
					</tr>
					<tr>
						<th>Largo:</th>
						<td>${data.largo}</td>
					</tr>
					<tr>
						<th>Kg/Mts camada:</th>
						<td>${data.kilogrametroCamada}</td>
					</tr>
					<tr>
						<th>Kilos lote:</th>
						<td>${data.kilosLote}</td>
					</tr>
					<tr>
						<th>Dureza (HBR)entrada:</th>
						<td>${data.durezaEntrada}</td>
					</tr>
					<tr>
						<th>Dureza (HBR)salida:</th>
						<td>${data.durezaSalida}</td>
					</tr>
					<tr>
						<th>Registro m3 Gas:</th>
						<td>${data.registroGas}</td>
					</tr>
					<tr>
						<th>Temperatura Mufla:</th>
						<td>${data.temperatura}</td>
					</tr>
					<tr>
						<th>Velocidad (m/h):</th>
						<td>${data.velocidad}</td>
					</tr>
					<tr>
						<th>Relación generador aire:</th>
						<td>${data.relacionGenAire}</td>
					</tr>
					<tr>
						<th>Relación generador gas:</th>
						<td>${data.relacionGenGas}</td>
					</tr>
					<tr>
						<th>Operario:</th>
						<td>${data.ope}</td>
					</tr>
					<tr>
						<th>Observaciones:</th>
						<td>${data.observaciones}</td>
					</tr>
				`;


			}
			else if(tp==3){//batea
				var obs = data.observaciones;
				if(data.observaciones==null)
					obs = "";

				var fecha = converDate(data.fechaEjecucion);

				var tableps = ` 
					<tr>
						<th>Largo:</th>
						<td>${data.largo}</td>
					</tr>
					<tr>
						<th>Cant. paquetes:</th>
						<td>${data.cantidadPaquetes}</td>
					</tr>
					<tr>
						<th>Tubos por paquete:</th>
						<td>${data.tubosxPaquete}</td>
					</tr>
					<tr>
						<th>Kilos de enjabonado:</th>
						<td>${data.kilosEnjabonado}</td>
					</tr>
					<tr>
						<th>Kilos de otros:</th>
						<td>${data.kilosOtros}</td>
					</tr>
					<tr>
						<th>Fecha:</th>
						<td>${fecha}</td>
					</tr>
					<tr>
						<th>Hora Inicio:</th>
						<td>${data.horaInicio}</td>
					</tr>
					<tr>
						<th>Hora Fin:</th>
						<td>${data.horaFin}</td>
					</tr>
					<tr>
						<th>Operario:</th>
						<td>${data.ope}</td>
					</tr>
					<tr>
						<th>Observaciones:</th>
						<td>${obs}</td>
					</tr>
				`;
				titleps = "Batea";
			}
			else if(tp==4)
			{
				var obs = data.observaciones;
				if(data.observaciones==null)
					obs = "";

				var fecha = converDate(data.fechaEjecucion);

				var tableps = ` 
					<tr>
						<th>Máquina:</th>
						<td>${data.maquina}</td>
					</tr>
					<tr>
						<th>Tubos:</th>
						<td>${data.tubos}</td>
					</tr>
					<tr>
						<th>Kilos:</th>
						<td>${data.kilos}</td>
					</tr>
					<tr>
						<th>Fecha:</th>
						<td>${fecha}</td>
					</tr>
					<tr>
						<th>Horario preparación:</th>
						<td>${data.horarioPreparacion}</td>
					</tr>
					<tr>
						<th>Hora Inicio:</th>
						<td>${data.horaInicio}</td>
					</tr>
					<tr>
						<th>Hora Fin:</th>
						<td>${data.horaFin}</td>
					</tr>
					<tr>
						<th>Operario:</th>
						<td>${data.ope}</td>
					</tr>
					<tr>
						<th>Observaciones:</th>
						<td>${obs}</td>
					</tr>
				`;
				titleps = "Punta";
			}
			else if (tp==5)
			{
				var obs = data.observaciones;
				if(data.observaciones==null)
					obs = "";

				var pos = data.posicion;
				if(data.posicion==null)
					pos = "";

				var fecha = converDate(data.fechaEjecucion);

				var tableps = ` 
					<tr>
						<th>Nº Trefila:</th>
						<td>${data.numero}</td>
					</tr>
					<tr>
						<th>Posición:</th>
						<td>${pos}</td>
					</tr>
					<tr>
						<th>Fecha:</th>
						<td>${fecha}</td>
					</tr>
					<tr>
						<th>Horario preparación:</th>
						<td>${data.horarioPreparacion}</td>
					</tr>
					<tr>
						<th>Hora Inicio:</th>
						<td>${data.horaInicio}</td>
					</tr>
					<tr>
						<th>Hora Fin:</th>
						<td>${data.horaFin}</td>
					</tr>
					<tr>
						<th>Operario:</th>
						<td>${data.ope}</td>
					</tr>
					<tr>
						<th>Observaciones:</th>
						<td>${obs}</td>
					</tr>
				`;
				titleps = "Trefila";	
			}
			else if (tp==6)
			{
				var obs = data.observaciones;
				if(data.observaciones==null)
					obs = "";

				var fecha = converDate(data.fechaEjecucion);

				var tableps = ` 
					<tr>
						<th>Tipo:</th>
						<td>${data.tipoEnderezado}</td>
					</tr>
					<tr>
						<th>Fecha:</th>
						<td>${fecha}</td>
					</tr>
					<tr>
						<th>Horario preparación:</th>
						<td>${data.horarioPreparacion}</td>
					</tr>
					<tr>
						<th>Hora Inicio:</th>
						<td>${data.horaInicio}</td>
					</tr>
					<tr>
						<th>Hora Fin:</th>
						<td>${data.horaFin}</td>
					</tr>
					<tr>
						<th>Operario:</th>
						<td>${data.ope}</td>
					</tr>
					<tr>
						<th>Observaciones:</th>
						<td>${obs}</td>
					</tr>
				`;
				titleps = "Enderezado";	
			}
			else if(tp==7)
			{
				var obs = data.observaciones;
				if(data.observaciones==null)
					obs = "";

				var fecha = converDate(data.fechaEjecucion);

				var tableps = ` 
					<tr>
						<th>Número:</th>
						<td>${data.numero}</td>
					</tr>
					<tr>
						<th>Fecha:</th>
						<td>${fecha}</td>
					</tr>
					<tr>
						<th>Horario preparación:</th>
						<td>${data.horarioPreparacion}</td>
					</tr>
					<tr>
						<th>Hora Inicio:</th>
						<td>${data.horaInicio}</td>
					</tr>
					<tr>
						<th>Hora Fin:</th>
						<td>${data.horaFin}</td>
					</tr>
					<tr>
						<th>Operario:</th>
						<td>${data.ope}</td>
					</tr>
					<tr>
						<th>Observaciones:</th>
						<td>${obs}</td>
					</tr>
				`;
				titleps = "Corte";		
			}
			modalopen(tableps, titleps);
			
		}
		//console.log(tp);

		function converDate(fecha)
		{	
			if (fecha){
				var date = fecha.split("-");
				return date[2]+"/"+date[1]+"/"+date[0];
			}
			else{
				return "";
			}
		}


		function converDate2(fecha)
		{	
			if (fecha){
				var date = fecha.split("-");
				return date[2]+"/"+date[1]+"/"+date[0];
			}
			else{
				return "";
			}
		}
	});


	

});
</script>
@endsection