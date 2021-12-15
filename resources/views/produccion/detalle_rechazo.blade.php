@extends('layouts.app')

@section('content')



<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Datos De Rechazo</h2>
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
						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
						  <form action="  " method="get" accept-charset="utf-8" id="formrechazo">
						    <div class="form-group">
						      <div class="row">
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">N° De Orden</label>
						          <input type="text" id="Norden" value="{{$res->ordenProduccion}}" class="form-control col-md-7 col-xs-12">
						          <span style="color:red;">*</span>
						        </div>
						        <div id="dataorden">
						        

						        </div>
						        <div class="col-md-5 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Motivo</label>
						          <select id="motivo" class="form-control">
						            <option value="">{{$motivos->descripcion}}</option>
						            
						          </select>
						        </div>

						      </div>
						      <div class="row">
						        <div class="col-md-2 col-sm-2 col-xs-12 check-rechazo">
						          <label class="checkbox">Es Interno
						          	@if($res->interno==1)
							            <input type="checkbox" checked="checked" id="interno" disabled="">
						          	@else
						          		<input type="checkbox" id="interno" disabled="">
						          	@endif
						            <span class="check"></span>
						          </label>
						        </div>
						      </div>
						      <div class="row">
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Piezas Rechazadas</label>
						          <input type="text" id="piezas" value="{{$res->piezasR}}" class="form-control col-md-7 col-xs-12">
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Metros Rechazados</label>
						          <input type="text" id="metrosRE" value="{{$res->kilosR}}" class="form-control col-md-7 col-xs-12">
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Kilos Rechazados</label>
						          <input type="text" id="kgs" value="{{$res->metrosR}}" class="form-control col-md-7 col-xs-12">
						          <span style="color:red;">*</span>
						        </div>
						      </div>
						      <div class="row">
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Detalle</label>
						          <input type="text" id="detalle" value="{{$res->detalle}}" class="form-control col-md-7 col-xs-12">
						          <span style="color:red;">*</span>
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Acción Correctiva</label>
						          <input type="text" id="accion_correctiva" value="{{$res->accion_correctiva}}" class="form-control col-md-7 col-xs-12">
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Ubicación</label>
						          <input type="text" id="ubicacion" value="{{$res->ubicacion}}" class="form-control col-md-7 col-xs-12">
						        </div>
						      </div>
						      <div class="row">
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Estado</label>
						          <select id="estado_id" class="form-control">
						            <option value="">{{$estados->descripcion}}</option>
						          </select>
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Forma</label>
						          <select id="forma_id" class="form-control">
						            <option value="">{{$formas->descripcion}}</option>
						          </select>
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Rubro</label>
						          <select id="rubro_id" class="form-control">
						            <option value="">{{$rubros->descripcion}}</option>
						          </select>
						        </div>
						      </div>
						      <h5>Información para reingresar Mp final</h5>
						      <div class="x_title"> </div>
						      <div class="row">
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Precio MP</label>
						          <input type="text" id="precioMP" value="{{$res->precioMP}}" class="form-control col-md-7 col-xs-12">
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Largo Del Tubo</label>
						          <input type="text" id="longitud" value="{{$res->longitudTubos}}" class="form-control col-md-7 col-xs-12">
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Paquetes</label>
						          <input type="text" id="paq" value="{{$res->paquetes}}" class="form-control col-md-7 col-xs-12">
						        </div>

						        <div id="paqadd">
						          
						        </div>
						          
						      </div>
						      <div class="row">
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">Fecha Rechazo</label>
						          <div class="form-group">
						            <div class='input-group date' id='DatepickerFechaRechazo'>
						              <input type='text' id="fechaR" value="{{Carbon\Carbon::parse($res->fechaRechazo)->format('d/m/Y')}}" class="form-control" />
						              <span class="input-group-addon">
						                <span class="fa fa-calendar"></span>
						              </span>
						            </div>
						          </div>
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">N° De Factura</label>
						          <input type="text" id="nFactura" value="{{$res->numeroFactura}}" class="form-control col-md-7 col-xs-12">
						        </div>
						        <div class="col-md-4 col-sm-4 col-xs-12">
						          <label class="control-label" for="first-name">N° De Remito</label>
						          <input type="text" id="nRemito" value="{{$res->numeroRemito}}" class="form-control col-md-7 col-xs-12">
						        </div>
						      </div>
						      <div class="row">
						        <div class="col-md-6 col-sm-6 col-xs-12">
						          <label class="control-label" for="first-name">Responsable de Ventas</label>
						          <select id="resVentas" class="form-control">
						            <option value="">{{$personaventa->nombreCompleto}}</option>
						          </select>
						        </div>
						        <div class="col-md-6 col-sm-6 col-xs-12">
						          <label class="control-label" for="first-name">Responsable Expedición</label>
						          <select id="resExpedicion" class="form-control">
						            <option value="">{{$personalexpe->nombreCompleto}}</option>
						          </select>
						        </div>
						      </div>

						    </div>
						  </form>
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

	var inputs = $('form input');
	var selects = $('form select');

	inputs.each(function( index ) {
	  $(this).prop('disabled', true);
	});

	selects.each(function( index ) {
	  $(this).prop('disabled', true);
	});

	function clearDataOrden(){
	  $('#dataorden br').remove();
	  $('#dataorden div').remove();
	}

	cargarMPrechazo("{{$res->ordenProduccion}}");

	function cargarMPrechazo(value){
	  $.ajax({  
	   type: "get",
	   url: "{{route('mpRechazo')}}",
	   data: {
	    'nro':value
	   },
	   success: function(data){
	    clearDataOrden();
	     if(data!=="false" && data.tipo==1){
	      data.dataarray[0] = parseFloat(data.dataarray[0]).toFixed(2);
	      data.dataarray[1] = parseFloat(data.dataarray[1]).toFixed(2);
	      data.dataarray[2] = parseFloat(data.dataarray[2]).toFixed(2);
	      data.dataarray[6] = parseFloat(data.dataarray[6]).toFixed(2);

	      if(data.db.metros==undefined)
	        data.db.metros = 0;


	      $('#dataorden').append(
	        ` 
	        <br> <br> <br> <br> <br>
	        <div class="row" style="padding-left: 9px;">
	            <div class="col-md-7 col-sm-4 col-xs-12">
	              <h2>${data.db.razon}</h2>
	              <div class="">
	                <table id="datatable-mprechazo" class="table table-striped table-bordered table-hover" style="width: 100%">
	                  <thead>
	                    <tr>
	                      <th>Ø Exterior</th>
	                      <th>Espesor</th>
	                      <th>Ø Interior</th>
	                      <th>Costura</th>
	                      <th>Trat. Termico</th>
	                      <th>Kilos</th>
	                      <th>Largo</th>
	                      <th>Dureza</th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                    <td>${data.dataarray[0]}</td>
	                    <td>${data.dataarray[1]}</td>
	                    <td>${data.dataarray[2]}</td>
	                    <td>${data.dataarray[3]}</td>
	                    <td>${data.dataarray[4]}</td>
	                    <td>${data.dataarray[5]}</td>
	                    <td>${data.dataarray[6]}</td>
	                    <td>${data.dataarray[7]}</td>
	                  </tbody>
	                </table>
	              </div>
	            </div> 
	            <br>
	            <br>
	            <h4>Kilogramos preparados: ${data.db.kilos} kgs.</h4>

	            <input type="hidden" value="${data.db.kilos}" id="limk">
	            <input type="hidden" value="${data.db.metros}" id="limm">
	            <input type="hidden" value="${data.db.piezas}" id="limp">
	            <input type="hidden" value="${data.db.idVer}" id="idVer">
	            <input type="hidden" value="${data.db.idPmpRun}" id="idPmpRun">
	            <input type="hidden" value="1" id="descontar">
	            <input type="hidden" value="${data.db.opestado}" id="estadoOP">

	            <input type="hidden" value="${data.db.clienteid}" id="cliente">
	            <input type="hidden" value="${data.db.diametroExterior}" id="dex">
	            <input type="hidden" value="${data.dataarray[1]}" id="espe">
	            <input type="hidden" value="${data.db.diametroInterior}" id="din">
	            <input type="hidden" value="${data.dataarray[6]}" id="longitudTubos">
	            <input type="hidden" value="${data.db.normaid}" id="norma">
	            <input type="hidden" value="${data.db.costuraid}" id="tipocostura">
	            <input type="hidden" value="${data.db.durezaC}" id="dureza">
	            <input type="hidden" value="${data.db.tipoAcero}" id="tipoacerosae">

	        </div>
	        `
	        );
	    }
	    else if(data!=="false" && data.tipo==2){

	    	console.log(data);

	      
	      var div =  ` 
	        <br> <br> <br> <br> <br>
	        <div class="row" style="padding-left: 9px;">
	            <div class="col-md-7 col-sm-4 col-xs-12">
	              <h2>${data.db.razon}</h2>
	              <div class="">
	                <table id="datatable-mprechazo" class="table table-striped table-bordered table-hover" style="width: 100%">
	                  <thead>
	                    <tr>
	                      <th>Ø Exterior</th>
	                      <th>Espesor</th>
	                      <th>Ø Interior</th>
	                      <th>Costura</th>
	                      <th>Trat. Termico</th>
	                      <th>Kilos</th>
	                      <th>Largo</th>
	                      <th>Dureza</th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td>${data.db.costura}</td>
	                    <td>${data.db.tratat}</td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                  </tbody>
	                </table>
	              </div>
	            </div> 
	            <br>
	            <br>
	            <h4>Kilogramos preparados: kgs.</h4>
	        </div>
	        `;	      

	      $('#dataorden').append(div);

	    }
	    else{

	    }
	   }
	  });
	}


});
</script>
@endsection