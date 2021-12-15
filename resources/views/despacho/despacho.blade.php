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
                  <h2>Despacho</h2>
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
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Despachos</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="tabcontrol" data-toggle="tab" aria-expanded="false">Control</a>
                      </li>
                      
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form action="  " method="get" accept-charset="utf-8">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Fecha</label>
                                <div class="form-group">
                                  <div class='input-group date' id='Datepicker_1'>
                                    <input id="fechab" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                      <span class="fa fa-calendar"></span>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">N° De Orden</label>
                                <input type="text" id="ordenb" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Estado</label>
                                <select id="estadoidb" class="form-control" required>
                                  <option></option>
                                  @foreach ($estados as $estado)
                                    <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                                  @endforeach
                                </select>
                              </div>

                            </div>
                            <div class="row">
                              <div class="col-md-2 col-sm-2 col-xs-12">
                                <label class="control-label" for="first-name">Cliente</label>
                                <select id="clienteidb" class="form-control" required>
                                  <option></option>
                                  @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-2 col-sm-2 col-xs-12">
                                <label class="control-label" for="first-name">Uso</label>
                                <select id="usoidb" class="form-control" required>
                                  <option></option>
                                  @foreach ($usos as $uso)
                                    <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Fecha Entrega Desde</label>
                                <div class="form-group">
                                  <div class='input-group date' id='Datepicker_2'>
                                    <input id="fdesdeb" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                      <span class="fa fa-calendar"></span>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Fecha Entrega Hasta</label>
                                <div class="form-group">
                                  <div class='input-group date' id='Datepicker_3'>
                                    <input id="fhastab" type='text' class="form-control" />
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
                              <a id="buscar" class="btn btn-primary  btn-sm">Buscar</a>
                              <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
                            </div>
                          </div>
                        </form>
                        <div class="ln_solid"></div>
                        <div class="clearfix"></div>
                        <div class="x_content">
                          <div class="row">
                            <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                            <div class="table-responsive">
                              <table id="datatable-buttonsdespacho" class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                    <th class="column-title">N° De Orden</th>
                                    <th class="column-title">Cliente</th>
                                    <th class="column-title">Espesor</th>
                                    <th class="column-title">Ext</th>
                                    <th class="column-title">Int</th>
                                    <th class="column-title">Cost</th>
                                    <th class="column-title">Metros</th>
                                    <th class="column-title">Tubos</th>
                                    <th class="column-title">Kilos</th> 
                                    <th class="column-title">Largo</th> 
                                    <th class="column-title">Fecha De Cración</th>
                                    <th class="column-title">Fecha De Entrega</th> 
                                    <th class="column-title">Zona</th>
                                    <th class="column-title">Transporte</th>              
                                    <th class="column-title">Lugar De Entrega</th>
                                    <th class="column-title">Estado</th>
                                    <th class="column-title">N° De Remito</th>
                                    <th class="column-title">Control De Entrada</th>
                                    <th class="column-title">Control De Salida</th>
                                    <th class="column-title">Paquetes</th>
                                    <th class="column-title">Precio</th>
                                    <th class="column-title">Moneda</th>
                                    <th class="column-title">UM</th>
                                    <th class="column-title">Uso</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
<!--                         <div class="row">
                          <div class="col-md-1">
                            <button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
                          </div>
                        </div> -->
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                        <div class="ln_solid"></div>
                        <div class="clearfix"></div>
                        <div class="x_content">
                          <div class="row">
                            <div id="loader2"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                           <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr class="headings">
                                  <th>Ejecutar</th>
                                  <th class="column-title">N° De Orden</th>
                                  <th class="column-title">Cliente</th>
                                  <th class="column-title">Dia. Ext.</th>
                                  <th class="column-title">Espesor</th>
                                  <th class="column-title">Kilos</th>
                                  <th class="column-title">Ubicación</th>

                                  <th class="column-title">Despacho</th>

                                  <th class="column-title">Remito</th> 
                                  <th class="column-title">Transporte</th>
                                  <th class="column-title">Paquete</th>
                                  <th class="column-title">Ctrl. Entrada</th>
                                  <th class="column-title">Ctrl. Salida</th>
                                  <th class="column-title">L/E</th>
                                  <th class="column-title">Control</th>
                                  <th class="column-title">Fecha De Entrega</th>
                                  <th class="column-title">Flete Propio</th>
                                </tr>
                              </thead>
                              <tbody id="bodytable">
                                
                              </tbody>
                            </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1">
                    <button id="ejecutarcontrol" type="button" class="btn btn-primary  btn-sm">Ejecutar</button>
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

      function convertirFechaAFormato(fecha_recibida)
      {
        var nuevafecha = fecha_recibida.split("/");
        nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
        return nuevafecha;
      }

      $('table').on('click', 'tr', function(){
        tablase = $(this).data('des');
        console.log(tablase);
        return;
        if (tablase == "des"){
          return;
        }
        else{
          idSeleccionado = $(this).data('id');
          var urldirec = window.location.origin + "/traficano/public/index.php/datos_control/" + idSeleccionado;
          window.location.href = urldirec;       
          
        }


      });


      $("#limpiarbusqueda").on("click", function(){
        $("#fechab").val("");
        $("#estadoidb").val("");
        $("#ordenb").val("");
        $("#clienteidb").val("");
        $("#usoidb").val("");
        $("#fdesdeb").val("");      
        $("#fhastab").val("");
      });



      $("#tabcontrol").on("click", function(){

        $.ajax({  
          type: "get",
          url: "{{route('control_entrega')}}",
          beforeSend: function() {
            $('#loader2').show();
          },
          complete: function(){
            $('#loader2').hide();
          },
          success: function(data){
            var retorno = data.resultado;
            var despachos = data.despachos;

            if (retorno.length > 0){


              for (var i = 0; i < retorno.length; i++) {
                var e = retorno[i];

                var despachoid = e.despachoid;
                var norden = e.ordenid;
                var cliente = e.razon;
                var diameEx = e.diametroExteriorNominal;
                var espersor = e.espesorNominal;
                var kilos = e.kilos;
                var ubicacion = e.ubicacion;

                if (norden == null){
                  norden = "";
                }

                if (cliente == null){
                  cliente = "";
                }

                if (diameEx == null){
                  diameEx = "";
                }

                if (espersor == null){
                  espersor = "";
                }

                if (kilos == null){
                  kilos = "";
                }

                if (ubicacion == null){
                  ubicacion = "";
                }


                var tr = `<tr data-des="des" class="even pointer">
                              <td class="a-center ">
                                <input type="checkbox" value="${despachoid}" id="eje" class="flat" name="table_records">
                              </td>
                              <td class=" ">${norden}</td>
                              <td class=" ">${cliente}</td>
                              <td class=" ">${diameEx}</td>
                              <td class=" ">${espersor}</td>
                              <td class=" ">${kilos}</td>
                              <td class="">${ubicacion}</td>
                              <td>
                              <select id="despacho-${despachoid}" class="form-control select-rechazo" >
                                <option></option>
                              </select>
                            </td>
                            <td><input class="input-rechazo" type="text" name="" id="remito-${despachoid}""></td>
                            <td><input class="input-rechazo" type="text" name="" id="transporte-${despachoid}""></td>
                            <td><input class="input-rechazo" type="text" name="" id="paquete-${despachoid}""></td>
                            <td><input class="input-rechazo" type="text" name="" id="centrada-${despachoid}""></td>
                            <td><input class="input-rechazo" type="text" name="" id="csalida-${despachoid}"></td>
                            <td><input class="input-rechazo" type="text" name="" id="lg-${despachoid}"></td>
                            <td> <select id="control-${despachoid}"" class="form-control select-rechazo">
                              <option></option>
                            </select>
                          </td>
                          <td><input class="input-rechazo" type="text" name="" id="fechae-${despachoid}""></td>
                          <td class="a-center ">
                            <input type="checkbox" id="flete-${despachoid}"" class="flat" name="table_records">
                          </td>
                    </tr>`;


                $('#bodytable').append(tr);

                for (var j = 0; j < despachos.length; j++) {
                  var des = despachos[j];

                  var op = `<option value="${des.id}">${des.nombreCompleto}</option>`;

                  $('#despacho-'+despachoid).append(op);
                  $('#control-'+despachoid).append(op);

                }

              }

            }

          }
        });

      });

      function convertirFechaAFormato(fecha_recibida)
      {
        //console.log(fecha_recibida);
        var nuevafecha = fecha_recibida.split("/");
        nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
        return nuevafecha;
      }


      function isValidDate (value) {
        var valid = false,
            info,
            real;
        
        // Validar formato
        if (/^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}$/.test(value)) {
          
          // Validar fecha
          info = value.split(/\//);
          real = (new Date(info[2], info[1] - 1, info[0])).toISOString().substr(0,10).split('-');
          if (info[0] === real[2] && info[1] === real[1] && info[2] === real[0]) {
            valid = true;
          }
        }
        return valid;
      }

      var checkedBox = [];

      $(document).on('click', '#eje:checkbox', getCheckedBox);

      getCheckedBox();

      function getCheckedBox() {
        
        checkedBox = $.map($('input:checkbox:checked'), 
                               function(val, i) {
                                  return val.value;
                               });
        console.log(checkedBox);

      }

      $("#ejecutarcontrol").on("click", function(){
        var datades = [];

        var checklongitud = checkedBox.length;

        if (checklongitud == 0){

          $.toast({ 
            text : "Debe seleccionar al menos un despacho", 
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

        for (var i=0; i<checkedBox.length; i++) {
          var despachoid = checkedBox[i];

          var despacho = $('#despacho-' +despachoid).val();
          var remito = $('#remito-' +despachoid).val();
          var transporte = $('#transporte-' +despachoid).val();
          var paquete = $('#paquete-' +despachoid).val();
          var centrada = $('#centrada-' +despachoid).val();
          var csalida = $('#csalida-' +despachoid).val();
          var lg = $('#lg-' +despachoid).val();
          var control = $('#control-' +despachoid).val();
          var fechae = $('#fechae-' +despachoid).val();
          var flete = $('#flete-' +despachoid).is(':checked');

          var f = 0;

          if (despachoid !== "on"){
            if (fechae == "" || fechae == undefined){
              $.toast({ 
                text : "Debe ingresar la fecha de entrega", 
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

            var datevalid = isValidDate(fechae);

            if (datevalid == false){
              $('#fechae-' +despachoid).val("");

              $.toast({ 
                text : "Formato invalido, la fecha de entrega debe ser DD/MM/AAAA", 
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

            fechaentrega = convertirFechaAFormato(fechae);

            if (flete == true)
              f = 1;

              obj = {
                'despachoid': despachoid,
                'despacho' : despacho,
                'remito' : remito,
                'transporte' : transporte,
                'paquete' : paquete,
                'centrada' : centrada,
                'csalida': csalida,
                'lg' : lg,
                'control' : control,
                'fechae' : fechaentrega,
                'flete' : f
              }

              datades.push(obj);          
          }

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        $.ajax({  
          type: "post",
          url: "{{route('procesarControlEntrega')}}",
          data: {
            'data': JSON.stringify(datades)
          },
          success: function(data){
            if (data == "true")
              location.reload();

          }
        });

        console.log(datades);

      });



      $("#buscar").on('click', function(){
        var fechab = $("#fechab").val();
        var estadoidb = $("#estadoidb").val();
        var clienteidb = $("#clienteidb").val();
        var ordenb = $("#ordenb").val();
        var usoidb = $("#usoidb").val();
        var fechadesde = $("#fdesdeb").val();
        var fechahasta = $("#fhastab").val();

        if(fechadesde!==undefined && fechadesde!=""){
          fechadesde = convertirFechaAFormato(fechadesde);
        }

        if(fechahasta!==undefined && fechahasta!=""){
          fechahasta = convertirFechaAFormato(fechahasta);
        }

        if(fechab!==undefined && fechab!=""){
          fechab = convertirFechaAFormato(fechab);
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        $.ajax({  
          type: "post",
          url: "{{route('buscarentrega')}}",
          data: {
            'fechab': fechab,
            'estadoidb': estadoidb,
            'clienteidb': clienteidb,
            'ordenb': ordenb,
            'usoidb': usoidb,
            'fechadesde': fechadesde,
            'fechahasta': fechahasta
          },
          beforeSend: function() {
            $('#loader').show();
          },
          success: function(data){
            $('#loader').hide();
            var arrayReturn = data.resultado;
            var arrayid = [];
            var arrayN = [];

            for (var i = 0; i < arrayReturn.length; i++) {
              arrayid.push(arrayReturn[i].id);
            }
            for (var i = 0; i < arrayReturn.length; i++) {
              arrayN.push(arrayReturn[i].Cliente);
            }
            table.destroy();
            if (data !== "false"){
              table = $("#datatable-buttonsdespacho").DataTable({
                "data": arrayReturn,
                "columns": [
                  {"data": "OrdenN"},
                  {"data": "Cliente"},
                  {"data": "Esp"},
                  {"data": "Ext"},
                  {"data": "Cost"},
                  {"data": "Int"},
                  {"data": "Metros"},
                  {"data": "Tubos"},
                  {"data": "Kilos"},
                  {"data": "Largo"},
                  {"data": "FechadeCreacion"},
                  {"data": "FechaEntrega"},
                  {"data": "Zona"},
                  {"data": "Transporte"},
                  {"data": "LugardeEntrega"},
                  {"data": "Estado"},
                  {"data": "NdeRemito"},
                  {"data": "CtrolEntrada"},
                  {"data": "CtrolSalida"},
                  {"data": "Paquetes"},
                  {"data": "Precio"},
                  {"data": "Moneda"},
                  {"data": "UM"},
                  {"data": "Uso"},
                ],
                "order": [],
                columnDefs : [
                  { targets : [9],
                    render : function (data, type, row) {
                      if (data)
                        return data.toFixed(2);
                      else
                        return data;
                    }
                  },
                ],
                order : [],
                "fnCreatedRow": function( nRow, arrayid, arrayN, iDataIndex ) {
                        $(nRow).attr('data-id', arrayid['OrdenN']);
                        //$('td', nRow).eq(1).append("<td align='center'><a href='"+window.location.origin+"/public/detalle_rechazo/"+arrayid['id']+"'>"+ name[a]+"</td>" );
                        //$('td', nRow).eq(9).attr('href', "/detalle_rechazo" + arrayid['id']);
                },
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

            }
            else{
              table = $("#datatable-buttonsdespacho").DataTable({
                "data": [],
                "columns": [
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
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

            }

          }
        });


      });
  });
</script> 
@endsection

