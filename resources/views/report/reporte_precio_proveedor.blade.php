@extends('layouts.app')

@section('content')

<!-- page content -->
      <!-- Inicio de las ventanas modales-->
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
              <button id="send" type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /modals eliminar -->
      <!--  modal modifcar  -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Modificar Reporte Proveedor</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="">
                <div class="form-group">   
                 <div class="x_title">
                  <h5>Precios Por Proveedor</h5>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label" for="first-name">Proveedor</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->razon}}</option>
                      @endforeach
                    </select>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Desde</label>
                    <div class='input-group date' id='DatepickerModalModifProveeDesde'>
                      <input type='text' class="form-control" />
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Hasta</label>
                    <div class='input-group date' id='DatepickerModalModifProveeHasta'>
                      <input type='text' class="form-control" />
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
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                    <label class="control-label" for="first-name">Espesor</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Largo Máximo</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Largo Mínimo</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tipo de Acero</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($tipoaceros as $tipoacero)
                        <option value="{{$tipoacero->id}}">{{$tipoacero->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tipo de Costura</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($tipocosturas as $tipocostura)
                        <option value="{{$tipocostura->id}}">{{$tipocostura->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label" for="first-name">Tratamiento Térmico</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($tratamientos as $tratamiento)
                        <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label" for="first-name">Norma</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($normas as $norma)
                        <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

              </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Guardar</button>
              <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /modals modificar-->
    <!--  modal agregar  -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Agregar Reporte Precio Por Proveedor</h4>
          </div>
          <div class="modal-body cuerpo-modal">
            <form action="">
              <div class="form-group">

                <div class="x_title">
                  <h5>Precios Por Proveedor</h5>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label" for="first-name">Proveedor</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->razon}}</option>
                      @endforeach
                    </select>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Desde</label>
                    <div class='input-group date' id='DatepickerModalAgregarProveeDesde'>
                      <input type='text' class="form-control" />
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Hasta</label>
                    <div class='input-group date' id='DatepickerModalAgregarProveeHasta'>
                      <input type='text' class="form-control" />
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
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                    <label class="control-label" for="first-name">Espesor</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>


                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Largo Máximo</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Largo Mínimo</label>
                    <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tipo de Acero</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($tipoaceros as $tipoacero)
                        <option value="{{$tipoacero->id}}">{{$tipoacero->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tipo de Costura</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($tipocosturas as $tipocostura)
                        <option value="{{$tipocostura->id}}">{{$tipocostura->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label" for="first-name">Tratamiento Térmico</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($tratamientos as $tratamiento)
                        <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label" for="first-name">Norma</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($normas as $norma)
                        <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div> 
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /modals agregar-->

  <!-- Fin de las ventanas modales-->
  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Reportes de Precio Por Proveedor</h2>
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

                  <div class="x_title">
                    <h5>Precios Por Proveedor</h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label class="control-label" for="first-name">Proveedor</label>
                      <select id="proveedoridb" class="form-control" required>
                        <option value=""></option>
                        @foreach ($proveedores as $proveedor)
                          <option value="{{$proveedor->id}}">{{$proveedor->razon}}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Fecha - Desde</label>
                      <div class='input-group date' id='DatepickerReportProveeDesde'>
                        <input id="desdeb" type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Fecha - Hasta</label>
                      <div class='input-group date' id='DatepickerReportProveeHasta'>
                        <input id="hastab" type='text' class="form-control" />
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
                    <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                      <label class="control-label" for="first-name">Espesor</label>
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Desde</label>
                      <input type="text" id="diametrodesdeb" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Hasta</label>
                      <input type="text" id="diametrohastab" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Desde</label>
                      <input type="text" id="espesordesdeb" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Hasta</label>
                      <input type="text" id="espesorhastab" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                    </div>
                  </div>


                  <div  class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Largo Máximo</label>
                      <input type="text" id="largomaxb" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Largo Mínimo</label>
                      <input type="text" id="largominb" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Tipo de Acero</label>
                      <select id="tipoaceroidb" class="form-control" required>
                        <option value=""></option>
                        @foreach ($tipoaceros as $tipoacero)
                          <option value="{{$tipoacero->id}}">{{$tipoacero->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Tipo de Costura</label>
                      <select id="tipocosturaidb" class="form-control" required>
                        <option value=""></option>
                        @foreach ($tipocosturas as $tipocostura)
                          <option value="{{$tipocostura->id}}">{{$tipocostura->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <label class="control-label" for="first-name">Tratamiento Térmico</label>
                      <select id="tratamientoidb" class="form-control" required>
                        <option value=""></option>
                        @foreach ($tratamientos as $tratamiento)
                          <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <label class="control-label" for="first-name">Norma</label>
                      <select id="normaidb" class="form-control" required>
                        <option value=""></option>
                        @foreach ($normas as $norma)
                          <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div> 
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 ">
                    <a id="buscarreport" class="btn btn-primary  btn-sm">Ejecutar</a>
                    <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
                  </div>
                </div>
              </div>
            </form>
            <div class="col-md-4 col-sm-4 col-xs-12">
            </div>
            <!-- <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="">
                <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Nuevo Reporte</button>
              </li>
            </ul> -->
            <div class="clearfix"></div>
            <div class="x_content">
              <div class="row">
                <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                <div class="table-responsive">
                  <table id="datatable-buttonsreport" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Proveedor </th>
                        <th>Medida</th>
                        <th>Fecha De Modificación</th>
                        <th>Porcentaje de Actualización</th>
                        <th>Precio</th>
                        <th>Moneda</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-1">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Modificar</button>
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

@endsection

@section('js_extra')
<script type="text/javascript">
  $(function(){

    var table = $("#datatable-buttonsreport").DataTable({
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



    $('#limpiarbusqueda').on('click', function(){
      $('#proveedoridb').val("");
      $('#desdeb').val("");
      $('#hastab').val("");
      $('#diametrohastab').val("");
      $('#diametrodesdeb').val("");
      $('#espesorhastab').val("");
      $('#espesordesdeb').val("");
      $('#largominb').val("");
      $('#largomaxb').val("");
      $('#tipocosturaidb').val("");
      $('#tipoaceroidb').val("");
      $('#tratamientoidb').val("");
      $('#normaidb').val("");
    });

    $('#buscarreport').on('click', function(){
      var proveedoridb = $('#proveedoridb').val();
      var desdeb = $('#desdeb').val();
      var hastab = $('#hastab').val();
      var diametrohastab = $('#diametrohastab').val();
      var diametrodesdeb = $('#diametrodesdeb').val();
      var espesorhastab = $('#espesorhastab').val();
      var espesordesdeb = $('#espesordesdeb').val();
      var largominb = $('#largominb').val();
      var largomaxb = $('#largomaxb').val();
      var tipocosturaidb = $('#tipocosturaidb').val();
      var tipoaceroidb = $('#tipoaceroidb').val();
      var tratamientoidb = $('#tratamientoidb').val();
      var normaidb = $('#normaidb').val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('buscar_reporteprecioproveedor')}}",
        data: {
        'proveedoridb' : proveedoridb,
        'desdeb' : desdeb,
        'hastab' : hastab,
        'diametrohastab' : diametrohastab,
        'diametrodesdeb' : diametrodesdeb,
        'espesorhastab' : espesorhastab,
        'espesordesdeb' : espesordesdeb,
        'largominb' : largominb,
        'largomaxb' : largomaxb,
        'tipocosturaidb' : tipocosturaidb,
        'tipoaceroidb' : tipoaceroidb,
        'tratamientoidb' : tratamientoidb,
        'normaidb' : normaidb
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
          if (arrayReturn == undefined){
            table = $("#datatable-buttonsreport").DataTable({
              "data": [],
              "columns": [
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
          table = $("#datatable-buttonsreport").DataTable({
            "data": arrayReturn,
            "columns": [
              {"data": "Proveedor"},
              {"data": "Medida"},
              {"data": "FechaModificacion"},
              {"data": "PorcentajeActualizacion"},
              {"data": "Precio"},
              {"data": "Moneda"}
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
      });

    });

  });
</script>
@endsection