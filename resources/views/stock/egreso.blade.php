@extends('layouts.app')

@section('content')

      <!--  modal Agregar Ajuste-->

      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Stock Ajuste</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="  " method="get" accept-charset="utf-8">

                <div class="form-group">

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="user">Usuario</label>
                    <input type="text" id="user"  class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="pass">Contarseña</label>
                    <input type="password" id="pass"  class="form-control col-md-7 col-xs-12">
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Sector</label>
                    <select id="sector" class="form-control" required>
                      <option value="">Stock</option>
                      <option value="press">Ventas</option>
                      <option value="">Despacho</option>
                      <option value="press">Calidad</option>
                    </select>
                  </div>               
                </div>
              </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /modals agregar  ajuste-->

      <!--  modal Eliminar ajuste -->

      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar-matriz">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Eliminar Ajuste</h4>
            </div>
            <div class="modal-body cuerpo-modal">
             <form action="  " method="get" accept-charset="utf-8">

              <div class="form-group">

                <div class="col-md-6 col-sm-6 div-input-modal">
                  <label for="first-name" for="first-name">Usuario</label>
                  <input type="text" id="first-name"  class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-6 col-sm-6 div-input-modal">
                  <label for="first-name" for="pass">Contraseña</label>
                  <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" >
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
            <button id="send" type="button" class="btn btn-primary">Guardar</button>
          </div>

        </div>
      </div>
    </div>
    <!-- /modals eliminar ajuste-->
    <!--  modal modifcar ajuste-->

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Modificar Ajuste</h4>
          </div>
          <div class="modal-body cuerpo-modal">
            <form action="  " method="get" accept-charset="utf-8">

              <div class="form-group">

                <div class="col-md-6 col-sm-6 div-input-modal">
                  <label for="first-name" for="first-name">Usuario</label>
                  <input type="text" id="first-name"  class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-6 col-sm-6 div-input-modal">
                  <label for="first-name" for="pass">Contraseña</label>
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
  </div>  <!-- /modals modificar-->

   <!--  modal Bucar Medida-->
  <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-medida">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Buscar Medida</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form autocomplete="off">
            <div class="form-group">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Diametro Exterior</label>
                <input type="text" id="diametroexteriorbm" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Espesor</label>
                <input type="text" id="espesorbm" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Largo mínimo</label>
                <input type="text" id="largominbm" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Largo Máximo</label>
                <input type="text" id="largomaxbm" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Tipo Acero</label>
                <select id="tipoaceroidbm" class="form-control">
                  <option></option>
                  @foreach ($tipoaceros as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Tipo Costura</label>
                <select id="tipocosturaidbm" class="form-control">
                  <option></option>
                  @foreach ($tipocosturas as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Tratamiento Térmico</label>
                <select id="tratamientoidbm" class="form-control">
                  <option></option>
                  @foreach ($tratamientos as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Norma</label>
                <select id="normaidbm" class="form-control">
                  <option></option>
                  @foreach ($normas as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach
                </select>
              </div>


              <div class="x_content"><br><br>
                <table id="datatable-buttonsmedidas" class="table table-stripped table-bordered">
                  <thead>
                    <tr>
                      <th>Medida</th>
                      <th>Stock (kgs)</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
          <button id="buscarmedida" class="btn btn-primary">Buscar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /cerrar modals Bucar Medida-->

  <!--  modal Bucar Trazabilidad-->
  <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-trazabilidad">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Buscar N° De Trazabilidad</h4>
        </div>
        <div class="modal-body cuerpo-modal">
         
              <div class="x_content"><br><br>
                <table class="table table-stripped table-bordered">
                  <thead>
                    <tr>
                      <th>N° De Trazabilidad</th>
                      <th>Estado</th>
                      <th>Ubicación</th>
                      <th>Cantidad Actual</th>
                      <th>Ajuste (+/-)</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>10</th>
                      <td><span class="label label-success">Terminado</span></td>
                      <th></th>
                      <td>0</td>
                      <td><input class="ancho-input" type="text"></td>
                      <td><input disabled="" class="ancho-input" type="text"></td>
                    </tr>
                    <tr>
                      <th>10</th>
                      <td><span class="label label-info">Virgen</span></td>
                      <th></th>
                      <td>0</td>
                      <td><input class="ancho-input" type="text"></td>
                      <td><input disabled="" class="ancho-input" type="text"></td>
                    </tr>

  
                  </tbody>
                </table>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Buscar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /cerrar modals Bucar Trazabilidad-->

  <!-- Fin de las ventanas modales-->

  <div class="right_col" role="main">



    <div class="">  

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Administrar Egreso</h2>
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
                <div class="row">
                  <div class="form-group">

                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="documento">Nº Orden</label>
                      <input type="text" id="nro_orden"  class="form-control col-md-7 col-xs-12">
                    </div> 

                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Fecha</label>
                      <div class='input-group date' id='myDatepickerEgreso'>
                        <input id="fecha" type='text' class="form-control" />
                        <span class="input-group-addon">
                         <span class="fa fa-calendar"></span>
                       </span>
                     </div>
                   </div>

                   <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="observaciones">Observaciones</label>
                    <input type="text" id="observaciones"  class="form-control col-md-7 col-xs-12">
                  </div> 


                </div>

                
              </div>
              <div class="row">
                <div class="form-group">

                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="documento">Medida</label>
                    <input data-id="" id="medida_id" disabled="" type="text" id="documento" class="form-control col-md-7 col-xs-12">
                    
                  </div> 
                  <div class="col-md-1 col-sm-1 col-xs-12">
                    <button data-toggle="modal" data-target="#modal-medida" type="" class="btn btn-primary btn-calidad btn-sm btn-margin"><i class="fa fa-search"></i></button>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="documento">Nº de Trazabilidad</label>
                    <input type="text" id="traza"  class="form-control col-md-7 col-xs-12">
                  </div> 
                  <div class="col-md-1 col-sm-1 col-xs-12">
                    <button id="trazabilidadbusqueda" type="" class="btn btn-primary btn-calidad btn-sm btn-margin"><i class="fa fa-search"></i></button>
                  </div>



                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Proveedor</label>
                    <select id="proveedor_id" class="form-control" required>
                      <option ></option>
                      @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->razon}}</option>
                      @endforeach
                    </select>
                  </div>


                </div>

                
              </div>



              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 ">
                  <button id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</button>
                </div>
              </div>
              <br />
                  <br />
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
            <div class="x_content">
            <!--
              <table class="table table-stripped table-bordered" id="tablatrazabilidad">
                  <thead>
                    <tr>
                      <th>N° De Trazabilidad</th>
                      <th>Estado</th>
                      <th>Ubicación</th>
                      <th>Cantidad Actual</th>
                      <th>Ajuste (+/-)</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>10</th>
                      <td><span class="label label-success">Terminado</span></td>
                      <th></th>
                      <td>0</td>
                      <td><input class="ancho-input" type="text"></td>
                      <td><input disabled="" class="ancho-input" type="text"></td>
                    </tr>
                    <tr>
                      <th>10</th>
                      <td><span class="label label-info">Virgen</span></td>
                      <th></th>
                      <td>0</td>
                      <td><input class="ancho-input" type="text"></td>
                      <td><input disabled="" class="ancho-input" type="text"></td>
                    </tr>
  
                  </tbody>
              </table>-->

              <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th>Paquete (N° Traza)</th>
                    <th>Medida</th>
                    <th>Estado</th>
                    <th>Ubicación Actual</th>
                    <th>Proveedor</th>
                    <th>Disponibilidad</th>
                    <th>Cantidad Deseada</th>
                    <th>Cantidad Final</th>
                  </tr>
                </thead>
                <tbody id="cuerpo_tabla_egreso">

                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-md-1">
                <button type="button" class="btn btn-default btn-sm" id="finalizar">Finalizar</button>
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

    $("#loadingSpinner").hide();


    function getDate(dateString)
    {
      var dateNew = dateString.split("-");
      return new Date(dateNew[0], dateNew[1]-1, dateNew[2]);
    }

    function validarNumero(elemento)
    {
      var is_numerico = $.isNumeric(elemento);
      return is_numerico;
    }

    ////////// SCRIPT SEARCH MEDIDA ////////////////

    //// Valores a reemplazar o añadir : [
    //// 1 - nombre de la tabla de medidas -----> ('#datatable-buttonsmedidas')
    //// 2 - id de los input para buscar las medidas 
    //// 3 - id del boton de buscar medidas -----> ('#buscarmedida')
    //// 4 - valor del campo del buscador principal -----> ('medida_id')
    /// ] 
    var medida_id = 0;

    var table = $("#datatable-buttonsmovimiento").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    $('#datatable-buttonsmedidas').on('click', 'tr', function(){
      medida_id = $(this).attr('id');
      namemedida = $(this).data('medida');
      $("#medida_id").val(namemedida);
      
      if($(this).hasClass('selected-table')){
        $(this).removeClass('selected-table');
      }else{
        $("#datatable-buttonsmedidas tbody tr.selected-table").removeClass('selected-table');
        $(this).addClass('selected-table');
      }

      $(function () {
         $('#modal-medida').modal('toggle');
      });

      ejecutarAjaxTabla(medida_id, "M");

    });

    $("#trazabilidadbusqueda").on("click", function(){
      var numero = $("#traza").val();
      ejecutarAjaxTabla(numero, "NT");
    });


    $("#buscarmedida").on('click', function(){
      var diametroexteriorbm = $("#diametroexteriorbm").val();
      var espesorbm = $("#espesorbm").val();
      var largominbm = $("#largominbm").val();
      var largomaxbm = $("#largomaxbm").val();
      var tipoaceroidbm = $("#tipoaceroidbm").val();
      var tipocosturaidbm = $("#tipocosturaidbm").val();
      var tratamientoidbm = $("#tratamientoidbm").val();
      var normaidbm = $("#normaidbm").val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('buscarmedidas')}}",
        data: {
          'diametroexteriorbm': diametroexteriorbm,
          'espesorbm': espesorbm,
          'largominbm': largominbm,
          'largomaxbm': largomaxbm,
          'tipoaceroidbm': tipoaceroidbm,
          'tipocosturaidbm': tipocosturaidbm,
          'tratamientoidbm': tratamientoidbm,
          'normaidbm': normaidbm          

        },
        success: function(data){
          var arrayReturn = data.resultado;
          var arrayid = [];
          var arrayNameMedida = [];
          for (var i = 0; i < arrayReturn.length; i++) {
            arrayid.push(arrayReturn[i].id);
            arrayid.push(arrayReturn[i].MEDIDA);
          }
          table.destroy();
          table = $("#datatable-buttonsmedidas").DataTable({
            "data": arrayReturn,
            "columns": [
              {"data": "MEDIDA"},
              {"data": "Stockkgs"},
            ],
            "paging":   false,
            "ordering": false,
            "info":     false,
            "searching": false,

            "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
                    $(nRow).attr('id', arrayid['id']);
                    $(nRow).attr('data-medida', arrayid['MEDIDA']);
            },

            "initComplete": function(settings, json) {
                //alert("completado");
                //$("#loadingSpinner").hide();
                //$('#loadingSpinner').hide();
                //or $('#loadingSpinner').empty();
            },

          });

        }

      });

    });
      ////////////// END SEARCH MEDIDA ///////////////

    function limpiarFormularioBusqueda()
    {
      $("#fecha").val("");
      $("#nro_orden").val("");
      $("#observaciones").val("");
      $("#medida_id").val("");
      $("#traza").val("");
      $("#proveedor_id").val("");     
    }

    $("#limpiarbusqueda").on("click", function(){
      limpiarFormularioBusqueda();
    });


    $("#finalizar").on("click", function(){

      var paquetes = [];
      var orden =  $("#nro_orden").val();
      var observaciones =  $("#observaciones").val();
      var fecha  =  $("#fecha").val();

      fecha = fecha.split(" ");

      fecha  = fecha[0];
      fecha  = fecha.split("/");
      fecha  = fecha[2]+"-"+fecha[1]+"-"+fecha[0];

      $("#cuerpo_tabla_egreso tr").each(function(index, elemento){
        var estado = $(elemento).data("estado");
        var idpaquete = $(elemento).data("id");
        var medida  = $(elemento).data("medida");
        var input_cantidad  = $(elemento).find("input.js-cantidadeseada")[0];
        var cantidad = $(input_cantidad).val();

        if($.isNumeric(cantidad))
        {
          paquetes.push({"id":idpaquete,"estado": estado, "cantidad": cantidad, "medida": medida });
        }
        
      });

      var data = {
        paquetes: JSON.stringify(paquetes),
        orden: orden,
        observaciones: observaciones,
        fecha: fecha,
        tipo: "EGRESO"
      };

      if(paquetes.length==0)
      {
        $.toast({ 
          text : "Debe tener al menos un registro para actualizar", 
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

      console.log(data);


      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      

      $.ajax({  
        type: "post",
        url: "{{route('actualizaregreso')}}",
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function(data){
          console.log(data);

          var resultado = data;

          if(resultado=="true"){
            $.toast({ 
              text : "Egreso Ejecutado con exito", 
              showHideTransition : 'slide',  
              bgColor : 'green',              
              textColor : '#eee',            
              allowToastClose : false,     
              hideAfter : 5000,              
              stack : 5,                    
              textAlign : 'left',            
              position : 'top-right'       
            });

          }



        }

      });

      
    });

    $("#proveedor_id").on("change", function(){
      var identificador = $("#proveedor_id").val();
      ejecutarAjaxTabla(identificador, "P");

    });


    function ejecutarAjaxTabla(identificador, tipo)
    {
      $("#cuerpo_tabla_egreso").html("");


      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('buscaregreso')}}",
        data: {
          'identificador':identificador,
          'tipobusqueda':tipo       
        },
        success: function(data){
          console.log(data);

          var objetos = data.resultado;

          for(var i=0;  i< objetos.length; i++)
          {
            var template = `<tr data-id="${objetos[i].id}" data-estado="${objetos[i].estadoid}" data-medida="${objetos[i].medidaid}">
                            <td>${objetos[i].numeroTrazabilidad}</td>
                            <td>${objetos[i].medida}</td>
                            <td><span class="label label-info">${objetos[i].esta}</span></td>
                            <td>${objetos[i].ubicacion}</td>
                            <td>${objetos[i].prove}</td>
                            <td>${objetos[i].cantidad}</td>
                            <td><input type="text" name="" class="js-cantidadeseada" data-max="${objetos[i].cantidad}"></td>
                            <td><input disabled="" type="text" class="js-cantidadfinal"></td>
                            </tr>`;

            $("#cuerpo_tabla_egreso").append(template);
          }
        }

      });
    }


    $(document).on("change", ".js-cantidadeseada", function(){

      var valorActual = $(this).val();
      var max         = $(this).data('max');
      var padreTr     = $(this).parent().parent();
      var hermanoTdTotal = $(padreTr).find("input.js-cantidadfinal")[0];

      console.log(valorActual);
      console.log(max);
      console.log();

      if($.isNumeric(valorActual))
      {

        valorActual = parseInt(valorActual);
        max        = parseInt(max);

        if(valorActual<=0)
        {
          $.toast({ 
            text : "Debe ingresar un numero mayor a cero", 
            showHideTransition : 'slide',  
            bgColor : 'red',              
            textColor : '#eee',            
            allowToastClose : false,     
            hideAfter : 5000,              
            stack : 5,                    
            textAlign : 'left',            
            position : 'top-right'       
          });

          $(this).val("");

          return;
        }

        if(max<valorActual)
        {
          $.toast({ 
            text : "La cantidad deseada no puede superar el stock", 
            showHideTransition : 'slide',  
            bgColor : 'red',              
            textColor : '#eee',            
            allowToastClose : false,     
            hideAfter : 5000,              
            stack : 5,                    
            textAlign : 'left',            
            position : 'top-right'       
          });

          $(this).val("");

          return;

        }

        var diferencia = max-valorActual;

        $(hermanoTdTotal).val(diferencia);

      }
    });

    function convertirFechaAFormato(fecha_recibida)
    {
      console.log(fecha_recibida);
      var nuevafecha = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
      return nuevafecha;
    }

   });
</script>
@endsection