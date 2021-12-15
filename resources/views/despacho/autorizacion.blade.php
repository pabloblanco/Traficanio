@extends('layouts.app')

@section('content')

      <!-- page content -->
      <!-- SECCION DE LOS MODALS-->
      <!--  modal eliminar-->
      <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
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
              <button type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cancelar</button>

            </div>
          </div>
        </div>
      </div>
      
      <!-- /cerrar modals Eliminar-->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Autorización y Entrega</h2>
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
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Crear Despacho</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Búsqueda De Despacho</a>
                      </li>
                      
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div class="form-group">
                            <div class="row">
                            <form action="{{route('autorizacion')}}" method="get" autocomplete="off">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="type" value="1">
                              
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Estado</label>
                                <select name="estadoidb" id="estadoidb" class="form-control">
                                  <option></option>
                                  @foreach ($estados as $estado)
                                    <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Tipo De Orden</label>
                                <select name="tipoordenidb" id="tipoordenidb" class="form-control">
                                  <option></option>
                                  @foreach ($tipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Zona</label>
                                <select name="zonaidb" id="zonaidb" class="form-control">
                                  <option></option>
                                  @foreach ($zonas as $zona)
                                    <option value="{{$zona->id}}">{{$zona->descripcion}}</option>
                                  @endforeach
                                </select>
                              </div>

                            </div>
                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Cliente</label>
                                <select id="clienteidb" name="clienteidb" class="form-control">
                                  <option></option>
                                  @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Fecha Desde</label>
                                <div class="form-group">
                                  <div class='input-group date' id='DatepickerDesdeDespacho'>
                                    <input id="fechadesdeb" name="fechadesdeb" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                      <span class="fa fa-calendar"></span>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Fecha Hasta</label>
                                <div class="form-group">
                                  <div class='input-group date' id='DatepickerHastaDespacho'>
                                    <input id="fechahastab" name="fechahastab" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                      <span class="fa fa-calendar"></span>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          

                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                              <button type="submit" class="btn btn-primary  btn-sm">Buscar</button>
                              <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
                            </div>
                          </div>
                        </form>
                        <br>

                        <div class="ln_solid"></div>
                        <div class="clearfix"></div>
                        <div class="x_content">
                          <div class="row">
                            <div class="table-responsive">
                              <table id="table_despachos" class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                    <th>Ejecutar</th>
                                    <th class="column-title">N° De Orden</th>
                                    <th class="column-title">Estado</th>
                                    <th class="column-title">Cliente</th>
                                    <th class="column-title">Dia. Ext.</th>
                                    <th class="column-title">Espesor</th>
                                    <th class="column-title">Cost</th>

                                    <th class="column-title">Kilos</th>
                                    <th class="column-title">Piezas</th>
                                    <th class="column-title">Metros</th>
                                    <th class="column-title">Longitud</th>
                                    <th class="column-title">Norma</th> 
                                    <th class="column-title">OC</th> 
                                    <th class="column-title">Saldo Kilo</th>
                                    <th class="column-title">Saldo Piezas</th> 
                                    <th class="column-title">Saldo Metros</th>                  
                                    <th class="column-title"> Kilos a Entregar</th>
                                    <th class="column-title">Piezas a Entregar</th>
                                    <th class="column-title">Metros a Entregar</th>

                                    <th class="column-title">Lugar De Entrega</th>
                                    <th class="column-title">Transporte</th>
                                    <th class="column-title">Código Cliente</th>
                                    <th class="column-title">Zona</th>
                                    <th class="column-title">Precio</th>
                                    <th class="column-title">Moneda</th>
                                    <th class="column-title">UM</th>
                                    <th class="column-title">Observaciones</th>
                                    <th class="column-title">Historial</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($results as $result)
                                    <tr data-des="des" id="trcl-{{$result->versionid}}" data-clienteid="{{$result->clienteid}}" class="even pointer">
                                      <td class="a-center ">
                                        <input type="checkbox" class="flat" value="{{$result->versionid}}" name="table_records">
                                      </td>
                                      <td class=" ">{{$result->Ordenp}}</td>
                                      <td class=" ">{{$result->estado}}</td>
                                      <td class=" ">{{$result->Cliente}}</td>
                                      <td class=" ">{{$result->DiaExt}}</td>
                                      <td class=" ">{{$result->Esp}}</td>
                                      <td class="">{{$result->Cost}}</td>
                                      <td class="">{{number_format($result->Kilos,2,'.','')}}</td>
                                      <td class="">{{number_format($result->Piezas,2,'.','')}}</td>
                                      <td class="">{{number_format($result->Metros,2,'.','')}}</td>
                                      <td class=" ">{{number_format($result->longitudTubos,2,'.','')}}</td>
                                      <td class=" ">{{$result->norma}}</td>
                                      <td class=" ">{{$result->OrdenCompra}}</td>
                                      <td class="">{{$result->kilos_saldo}}</td>
                                      <td class="">{{$result->piezas_saldo}}</td>
                                      <td class="">{{$result->metros_saldo}}</td>
                                      <td><input class="input-rechazo" type="text" name="" id="kilosen-{{$result->versionid}}"></td>
                                      <td><input class="input-rechazo" type="text" name="" id="piezasen-{{$result->versionid}}"></td>
                                      <td><input class="input-rechazo" type="text" name="" id="metrosen-{{$result->versionid}}"></td>
                                      <td><input class="input-rechazo" type="text" value="{{$result->entrega}}" name="" id="entrega-{{$result->versionid}}"></td>
                                       <td> <select id="transporte-{{$result->versionid}}" class="form-control select-rechazo" required>
                                        <option></option>
                                        @foreach ($transportes as $transporte)
                                          <option value="{{$transporte->id}}">{{$transporte->razon}}</option>
                                        @endforeach
                                       </select>
                                       </td>
                                      <td class="">{{$result->Codigo}}</td>
                                      <td class="">{{$result->Zona}}</td>
                                      <td><input class="input-rechazo" type="text" value="{{$result->precio}}" id="precio-{{$result->versionid}}"></td>
                                      <td class="">{{$result->Moneda}}</td>
                                      <td class="">{{$result->UM}}</td>
                                      <td class="">{{$result->observacionVenta}}</td>
                                      <td align="center"><a href="{{route('historial_despacho', ['id'=>$result->versionid, 'type'=>'despacho'])}}"><i class="fa fa-history"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        @if (count($results) > 0)
                          <form action="">
                            <div  class="row">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                 <label class="control-label" for="first-name">Fecha</label>
                                  <div class="form-group">
                                    <div class='input-group date' id='DatepickerProcesoDes'>
                                      <input id="fechad" type='text' class="form-control" />
                                      <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                      </span>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">IIBB(%)</label>
                                <input type="text" id="iibbd" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Anticipos</label>
                                <input type="text" id="anticiposd" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                             <div class="row">
                              <div class="form-group">
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <label class="control-label" for="first-name">Observaciones</label>
                                  <textarea class="text-area" name="" id="observacionesd" ></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <label class="checkbox">A Procesar
                                  <input id="procesard" type="checkbox">
                                  <span class="check"></span>
                                </label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-1">
                                <a id="ejecutardespacho" class="btn btn-primary  btn-sm">Ejecutar</a>
                              </div>
                            </div>
                          </form>
                        @endif
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">N° De Despacho</label>
                                <input type="text" id="nrodespachobd" class="form-control col-md-7 col-xs-12">
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Estado</label>
                                <select id="estadoidbd" class="form-control">
                                  <option></option>
                                  @foreach ($estadosdes as $estado)
                                    <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Zona</label>
                                <select name="zona_id" id="zonaidbd" class="form-control">
                                  <option></option>
                                  @foreach ($zonas as $zona)
                                    <option value="{{$zona->id}}">{{$zona->descripcion}}</option>
                                  @endforeach
                                </select>
                              </div>
                              
                            </div>
                            <div class="row">
                              <div class="col-md-2 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Transporte</label>
                                <select id="transporteidbd" class="form-control">
                                  <option></option>
                                  @foreach ($transportes as $transporte)
                                    <option value="{{$transporte->id}}">{{$transporte->razon}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-2 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Cliente</label>
                                <select id="clienteidbd" class="form-control">
                                  <option></option>
                                  @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Fecha Desde</label>
                                <div class="form-group">
                                  <div class='input-group date' id='DatepickerDesdeBuscar'>
                                    <input type='text' id="desdebd" class="form-control" />
                                    <span class="input-group-addon">
                                      <span class="fa fa-calendar"></span>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Fecha Hasta</label>
                                <div class="form-group">
                                  <div class='input-group date' id='DatepickerHastaBuscar'>
                                    <input type='text' id="hastabd" class="form-control" />
                                    <span class="input-group-addon">
                                      <span class="fa fa-calendar"></span>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>


                          </div>
                          

                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                              <button id="buscardespacho" class="btn btn-primary  btn-sm">Buscar</button>
                              <button id="limpiarbusquedad" class="btn btn-success  btn-sm">Limpiar</button>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="clearfix"></div>
                          <div class="x_content">
                            <div class="row">
                              <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                              <div class="">
                                <table id="datatable-buttonsdespacho" class="table table-striped table-bordered table-hover" style="width: 100%">
                                  <thead>
                                    <tr>
                                      <th>N° De Despacho</th>
                                      <th>Cliente</th>
                                      <th>Fecha De Entrega</th>
                                      <th>Zona</th>
                                      <th>Fecha De Creación</th>
                                      <th>A Procesar</th>
                                      <th>Estado</th>
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
                              <button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
                            </div>
                          </div>
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

    var table = $("#datatable-buttonsdespacho").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    var table2 = $("#table_despachos").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    $("#loadingSpinner").hide();



    function validarNumero(elemento)
    {
      var is_numerico = $.isNumeric(elemento);
      return is_numerico;
    }

    function limpiarFormularioBusqueda()
    {
      $("#clienteidb").val("");
      $("#tipoordenidb").val("");
      $("#zonaidb").val("");
      $("#estadoidb").val("");
      $("#fechadesdeb").val("");    
      $("#fechahastab").val("");
      table2.clear().draw();
    }

    $('table').on('click', 'tr', function(){
      tablase = $(this).data('des');
      console.log(tablase);
      if (tablase == "des"){
        return;
      }
      else{
        idSeleccionado = $(this).data('id');
        var urldirec = window.location.origin + "/public/index.php/cliente_despacho/" + idSeleccionado;
        window.location.href = urldirec;       
        
      }


    });

    function convertirFechaAFormato(fecha_recibida)
    {
      //console.log(fecha_recibida);
      var nuevafecha = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
      return nuevafecha;
    }

    $("#limpiarbusqueda").on("click", function(){
      limpiarFormularioBusqueda();
    });


    var checkedBox = [];

    $(document).on('click', 'input:checkbox', getCheckedBox);

    getCheckedBox();

    function getCheckedBox() {
      
      checkedBox = $.map($('input:checkbox:checked'), 
                             function(val, i) {
                                return val.value;
                             });

    }


    $("#ejecutardespacho").on("click", function(){
      var datades = [];

      var anticipo = $('#anticiposd').val();
      var iibb = $('#iibbd').val();
      var fecha = $('#fechad').val();
      var obs = $('#observacionesd').val();
      var procesar = $('#procesard').is(':checked');
      var p = 0;

      if (fecha){
        var fecha = convertirFechaAFormato(fecha);
        
      }
      else {
        var fecha = null;
      }

      if (procesar == true)
        p = 1;


      for (var i=0; i<checkedBox.length; i++) {
        var versionid = checkedBox[i];
        var kilosen = $('#kilosen-' +versionid).val(); 
        var metrosen = $('#metrosen-' +versionid).val(); 
        var piezasen = $('#piezasen-' +versionid).val(); 
        var precio = $('#precio-' +versionid).val();
        var entrega = $('#entrega-' +versionid).val();
        var transporte = $('#transporte-' +versionid).val();
        var clienteid = $('#trcl-'+versionid).data('clienteid');

        if (versionid !== "on"){
          obj = {
            'versionid': versionid,
            'kilos' : kilosen,
            'metros' : metrosen,
            'piezas' : piezasen,
            'entrega' : entrega,
            'precio' : precio,
            'transporte': transporte,
            'clienteid' : clienteid
          }

          datades.push(obj);          
        }


      }

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      console.log(datades);

      $.ajax({  
        type: "post",
        url: "{{route('procesar_despacho')}}",
        data: {
          'anticipo' : anticipo,
          'iibb' : iibb,
          'observaciones' : obs,
          'aprocesar' : p,
          'fecha' : fecha,
          'detalles' : JSON.stringify(datades)
        },
        success: function(data){
          if (data == "true"){
            $.toast({ 
              text : "Procesado con Exito", 
              showHideTransition : 'slide',  
              bgColor : 'green',              
              textColor : '#eee',            
              allowToastClose : false,     
              hideAfter : 5000,              
              stack : 5,                    
              textAlign : 'left',            
              position : 'top-right'       
            });

            console.log("Entro");
            setTimeout(function(){ location.reload();  }, 2000);

            return;
          }
          else{
            $.toast({ 
              text : "Error al Procesar", 
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
      });

    });

    $("#limpiarbusquedad").on("click", function(){
      $("#nrodespachobd").val("");
      $("#estadoidbd").val("");
      $("#zonaidbd").val("");
      $("#transporteidbd").val("");
      $("#clienteidbd").val("");
      $("#hastabd").val("");      
      $("#desdebd").val("");
      table.clear().draw();
    });

    function convertirFechaAFormato(fecha_recibida)
    {
      var nuevafecha = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
      return nuevafecha;
    }

    // function getDate(dateString)
    // {
    //   var dateNew = dateString.split("-");
    //   return new Date(dateNew[0], dateNew[1]-1, dateNew[2]);
    // }

    $("#buscardespacho").on('click', function(){
      var clienteidbd = $("#clienteidbd").val();
      var zonaidbd = $("#zonaidbd").val();
      var estadoidb = $("#estadoidbd").val();
      var transporteidbd = $("#transporteidbd").val();
      var nrodespachobd = $("#nrodespachobd").val();
      var fechadesde = $("#desdebd").val();
      var fechahasta = $("#hastabd").val();

      if(fechadesde!==undefined && fechadesde!=""){
        fechadesde = convertirFechaAFormato(fechadesde);
      }

      if(fechahasta!==undefined && fechahasta!=""){
        fechahasta = convertirFechaAFormato(fechahasta);
      }

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('buscardespachos')}}",
        data: {
          'clienteidbd': clienteidbd,
          'zonaidbd': zonaidbd,
          'estadoidb': estadoidb,
          'nrodespachobd': nrodespachobd,
          'transporteidbd': transporteidbd,
          'fechadesde': fechadesde,
          'fechahasta': fechahasta
        },
        beforeSend: function() {
           $('#loader').show();
        },
        complete: function(){
           $('#loader').hide();
        },
        success: function(data){
          var arrayReturn = data.resultado;
          table.destroy();
          table = $("#datatable-buttonsdespacho").DataTable({
            "data": arrayReturn,
            "columns": [
              {"data": "NdeDespacho"},
              {"data": "Cliente"},
              {"data": "FechadeEntrega"},
              {"data": "Zona"},
              {"data": "FechadeCreacion"},
              {"data": "AReprocesar"},
              {"data": "Estado"},
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

      });


    });



   });
</script>
@endsection