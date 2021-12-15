@extends('layouts.app')

@section('content')


        <!-- Inicio de las ventanas modales-->

        <!--  modal modifcar  -->

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-planta">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Selecione las OP</h4>
              </div>
              <div class="modal-body cuerpo-modal">

               <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th>Elegir</th>
                      <th class="column-title">N° De Orden </th>
                      <th class="column-title">Versión</th>
                      <th class="column-title">Cliente</th>
                      <th class="column-title">Tipo</th>
                      <th class="column-title">Medida</th>
                      <th class="column-title">Fecha Pedido</th>
                      <th class="column-title">Fecha Entrega</th>
                    </tr>
                  </thead>

                  <tbody >
                    
                  </tbody>
                </table>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Ejecutar</button>
              <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
            </div>

          </div>

        </div>
      </div>
    </div>
    <!-- /modals modificar-->
    



    <!-- Fin de las ventanas modales-->


    <div class="right_col" role="main">
      <div class="">  
        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Buscar Orden de Producción</h2>
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
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                  <div class="form-group">

                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label" for="first-name">N° de Orden</label>
                        <input type="text" id="nroordenb" required="required" class="form-control col-md-7 col-xs-12">
                      </div> 
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label" for="first-name">Estado</label>
                        <select id="estadob" class="form-control" required>
                          <option></option>
                          @foreach ($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                          @endforeach
                        </select>
                      </div> 
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label" for="first-name">Cliente</label>
                        <input type="text" id="clienteb" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label" for="first-name">Códig. Del Cliente</label>
                        <input type="text" id="codigoclienteb" required="required" class="form-control col-md-7 col-xs-12">
                      </div>  
                    </div>

                    <div  class="row">
                      <div class="col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-5 col-xs-12">
                        <label class="control-label" for="first-name">Fecha De Entrega</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Desde</label>
                        <div class='input-group date' id='DatepickerDesdeEntrega'>
                          <input type='text' id="fechadesde" class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Hasta</label>
                        <div class='input-group date' id='DatepickerHastaEntrega'>
                          <input type='text' id="fechahasta" class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>


                    </div>
                    <div  class="row">
                      <div class="col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-5 col-xs-12">
                        <label class="control-label" for="first-name">Fecha a Planta</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Desde</label>
                        <div class='input-group date' id='DatepickerPlantaDesde'>
                          <input type='text' id="fechaplantadesde" class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Hasta</label>
                        <div class='input-group date' id='DatepickerPlantaHasta'>
                          <input type='text' id="fechaplantahasta" class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>


                    </div>



                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Exterior</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Ext. Min</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="diamexdesde" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="diamexhasta" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="diamexmindesde" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="diamexminhasta" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>


                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Ext. Máx</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Largo</label>
                      </div>
                    </div>

                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="diamexmaxdesde" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="diamexmaxhasta" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Máximo</label>
                        <input type="text" id="largomin" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Mínimo</label>
                        <input type="text" id="largomax" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                      </div>

                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12 col-xs-3 col-xs-offset-5">
                        <label class="control-label" for="first-name">Kilos</label>
                      </div>

                    </div>

                    <div  class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="kilosdesde" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="kiloshasta" placeholder="" required="required" class="form-control col-md-7 col-xs-6">
                      </div>

                    </div>

                    <div class="row">
                     <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="first-name">Tipo de acero</label>
                      <select id="tipoacerob" class="form-control" required>
                        <option></option>
                        @foreach ($tipoacero as $tipo)
                          <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                        @endforeach
                      </select>
                    </div> 
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="first-name">Tipo de costura</label>
                      <select id="tipocosturab" class="form-control" required>
                        <option></option>
                        @foreach ($tipocostura as $tipo)
                          <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                        @endforeach
                      </select>
                    </div> 
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="first-name">Tratamiento Térmico</label>
                      <select id="tratamientob" class="form-control" required>
                        <option></option>
                        @foreach ($tratamiento as $tipo)
                          <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                        @endforeach
                      </select>
                    </div> 
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="first-name">Tipo de norma</label>
                      <select id="tiponormab" class="form-control" required>
                        <option></option>
                        @foreach ($normas as $tipo)
                          <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                        @endforeach
                      </select>
                    </div> 

                  </div>
                  <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de orden</label>
                    <select id="tipoordenb" class="form-control" required>
                      <option></option>
                      @foreach ($tipoorden as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div> 
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Uso</label>
                    <select id="usob" class="form-control" required>
                      <option></option>
                      @foreach ($uso as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div> 


                </div>


                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Interior</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Int. Mín</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diameindesde" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diameinhasta" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diameinmindesde" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diameinminhasta" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>

                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Int. Máx</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diameinmaxdesde" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diameinmaxhasta" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesordesde" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesorhasta" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>

                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor Mínimo Exterior</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor Máximo Exterior</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesorminextdesde" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesorminexthasta" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesormaxextdesde" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesormaxexthasta" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>




                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 ">

                    <a id="buscarorden" class="btn btn-primary  btn-sm">Buscar</a>
                    <a id="limpiar" class="btn btn-success  btn-sm">Limpiar</a>
                  </div>
                </div>

              </div>
            </form>
            
            <div class="clearfix"></div>
            <div class="x_content">
              <div class="row">
                <div class="table-responsive">
                  <table id="table-ordenes" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Nº de Orden</th>
                        <th>Cliente</th>
                        <th>Cód</th>
                        <th>URG</th>
                        <th>Sem</th>
                        <th>Proc. actual</th>
                        <th>Pase a Planta</th>
                        <th>Fecha Pedido</th>
                        <th>Ext</th>
                        <th>Esp</th>
                        <th>Piezas</th>
                        <th>Mts</th>
                        <th>Ks</th>
                        <th>Cost.</th>
                        <th>T. Termico</th>
                        <th>Prov</th>
                        <th>Ext MP</th>
                        <th>Esp MP</th>
                        <th>Kg a prep</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Certificado</th>
                        <th>Proceso</th>
                        <th>Cód. Pieza</th>
                        <th>RV-PR-MP</th>
                        <th>Fecha Prometida</th>
                        <th>Versión</th>
                        <th>Historial</th>
                        <th>Descargar</th>
                      </tr>
                    </thead>
                    <tbody id="bodyordenes">
                      
                    </tbody>
                  </table>
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

  $('#table-ordenes').DataTable();

  function validarnro(){
    if ($('#nroordenb').val() == "" || $('#nroordenb').val() == undefined){
      return false;
    }
    return true;
  }

  $('table').on('click', 'tr', function(){
    tablase = $(this).data('id');
    idSeleccionado = $(this).data('id');
    cotiselect = $(this).data('coti');
    var urldirec = window.location.origin + "/public/ver_orden/" + idSeleccionado+"/"+cotiselect;
    window.location.href = urldirec;       
      

  });

  function FechaAFormato(fecha_recibida)
  {
    var nuevafecha = fecha_recibida.split("-");
    nuevafecha  = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
    return nuevafecha;
  }

  function busquedaordenes(){
    $.ajax({  
      type: "get",
      url: "{{route('buscarordenes')}}",
      data: {
        'nroordenb':$('#nroordenb').val(),
        'estadob':$('#estadob').val(),
        'clienteb':$('#clienteb').val(),
        'codigoclienteb':$('#codigoclienteb').val(),
        'fechadesde':$('#fechadesde').val(),
        'fechahasta':$('#fechahasta').val(),
        'fechaplantadesde':$('#fechaplantadesde').val(),
        'fechaplantahasta':$('#fechaplantahasta').val(),
        'diamexdesde':$('#diamexdesde').val(),
        'diamexhasta':$('#diamexhasta').val(),
        'diamexmindesde':$('#diamexmindesde').val(),
        'diamexminhasta':$('#diamexminhasta').val(),
        'diamexmaxdesde':$('#diamexmaxdesde').val(),
        'diamexmaxhasta':$('#diamexmaxhasta').val(),
        'largomax':$('#largomax').val(),
        'largomin':$('#largomin').val(),
        'kilosdesde':$('#kilosdesde').val(),
        'kiloshasta':$('#kiloshasta').val(),
        'tipoacerob':$('#tipoacerob').val(),
        'tipocosturab':$('#tipocosturab').val(),
        'tratamientob':$('#tratamientob').val(),
        'tiponormab':$('#tiponormab').val(),
        'tipoordenb':$('#tipoordenb').val(),
        'usob':$('#usob').val(),
        'diameindesde':$('#diameindesde').val(),
        'diameinhasta':$('#diameinhasta').val(),
        'diameinmindesde':$('#diameinmindesde').val(),
        'diameinminhasta':$('#diameinminhasta').val(),
        'diameinmaxdesde':$('#diameinmaxdesde').val(),
        'diameinmaxhasta':$('#diameinmaxhasta').val(),
        'espesordesde':$('#espesordesde').val(),
        'espesorhasta':$('#espesorhasta').val(),
        'espesorminextdesde':$('#espesorminextdesde').val(),
        'espesorminexthasta':$('#espesorminexthasta').val(),
        'espesormaxextdesde':$('#espesormaxextdesde').val(),
        'espesormaxexthasta':$('#espesormaxexthasta').val()
      },
      success: function(data){
        $('#bodyordenes tr').remove();

        if (data !== "false"){
          var arrayReturn = data.resultado;
          var Paseaplanta = "";
          var FechaPedido = "";
          var Fechaprometida = "";
          for (var i = 0; i < arrayReturn.length; i++) {
            var e = arrayReturn[i];
            var id = e.id;
            var coti = e.idcotizacion;
            var Norden = e.Norden;
            var Cliente = e.Cliente;
            var Codigo = e.Codigo;
            var URG = e.URG;
            var Sem = e.Sem;
            var Procesoactual = e.Procesoactual;
            if (e.Paseaplanta)
              Paseaplanta = FechaAFormato(e.Paseaplanta);

            if (e.FechaPedido)
              FechaPedido = FechaAFormato(e.FechaPedido);
            var Ext = e.Ext;
            var Esp = e.Esp;
            var Pzas = e.Pzas;
            var Mts = e.Mts;
            var Kgs = e.Kgs;
            var Cost = e.Cost;
            var TTermico = e.TTermico;
            var Prov = e.Prov;
            var ExtMP = e.ExtMP;
            var EspMP = e.EspMP;
            var Kgsaprep = e.Kgsaprep;
            var Tipo = e.Tipo;
            var Estado = e.Estado;
            var Certificado = e.Certificado;
            var PROCESOS = e.PROCESOS;
            var CodPieza = e.CodPieza;
            var RVPRMP = e.RVPRMP;
            if (e.Fechaprometida)
              Fechaprometida = FechaAFormato(e.Fechaprometida);
            var Version = e.Version;
            var TTdetalle = e.TTdetalle;

            var tr = `<tr data-id="${id}" data-coti="${coti}">
                        <td>${Norden}</td>
                        <td>${Cliente}</td>
                        <td>${Codigo}</td>
                        <td>${URG}</td>
                        <td>${Sem}</td>
                        <td>${Procesoactual}</td>
                        <td>${Paseaplanta}</td>
                        <td>${FechaPedido}</td>
                        <td>${Ext}</td>
                        <td>${Esp}</td>
                        <td>${Pzas}</td>
                        <td>${Mts}</td>
                        <td>${Kgs}</td>
                        <td>${Cost}</td>
                        <td>${TTermico}</td>
                        <td>${Prov}</td>
                        <td>${ExtMP}</td>
                        <td>${EspMP}</td>
                        <td>${Kgsaprep}</td>
                        <td>${Tipo}</td>
                        <td>${Estado}</td>
                        <td>${Certificado}</td>
                        <td>${PROCESOS}</td>
                        <td>${CodPieza}</td>
                        <td>${RVPRMP}</td>
                        <td>${Fechaprometida}</td>
                        <td>${Version}</td>
                        <td align="center"><a href="/public/historial_despacho/${id}/orden"><i class="fa fa-history ico-history"></i></a></td>
                        <td align="center">
                          <a href="/public/exportar/${id}"><i class="fa fa-file-pdf-o color-ico-pdf "></i></a>
                        </td>


                      </tr>
                      `;

            $('#bodyordenes').append(tr);

            $(`tr[data-id="${id}"] td`).each(function( index ) {
              if($( this ).text() == "null")
                $(this).text("");
            });  
          }

          return;
        }
        $.toast({ 
              text : "No se han encontrado ordenes.", 
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
    });

  }

  $('#buscarorden').on('click', function(){
    busquedaordenes();      
    // if (validarnro() == true){
    // }
    // else{
    //   $.toast({ 
    //         text : "Debe ingresar un numero de orden", 
    //         showHideTransition : 'slide',  
    //         bgColor : 'red',              
    //         textColor : '#eee',            
    //         allowToastClose : false,     
    //         hideAfter : 5000,              
    //         stack : 5,                    
    //         textAlign : 'left',            
    //         position : 'top-right'       
    //   });
    //   return;
    // }

  });

  $('#limpiar').on('click', function(){
    $('#nroordenb').val("");
    $('#estadob').val("");
    $('#clienteb').val("");
    $('#codigoclienteb').val("");
    $('#fechadesde').val("");
    $('#fechahasta').val("");
    $('#fechaplantadesde').val("");
    $('#fechaplantahasta').val("");
    $('#diamexdesde').val("");
    $('#diamexhasta').val("");
    $('#diamexmindesde').val("");
    $('#diamexminhasta').val("");
    $('#diamexmaxdesde').val("");
    $('#diamexmaxhasta').val("");
    $('#largomax').val("");
    $('#largomin').val("");
    $('#kilosdesde').val("");
    $('#kiloshasta').val("");
    $('#tipoacerob').val("");
    $('#tipocosturab').val("");
    $('#tratamientob').val("");
    $('#tiponormab').val("");
    $('#tipoordenb').val("");
    $('#usob').val("");
    $('#diameindesde').val("");
    $('#diameinhasta').val("");
    $('#diameinmindesde').val("");
    $('#diameinminhasta').val("");
    $('#diameinmaxdesde').val("");
    $('#diameinmaxhasta').val("");
    $('#espesordesde').val("");
    $('#espesorhasta').val("");
    $('#espesorminextdesde').val("");
    $('#espesorminexthasta').val("");
    $('#espesormaxextdesde').val("");
    $('#espesormaxexthasta').val("");
  });

});
</script> 
@endsection