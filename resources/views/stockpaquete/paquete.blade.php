@extends('layouts.app')

@section('content')

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">¿Esta seguro que desea eliminar?</h4>
          </div>
          <div class="modal-body cuerpo-modal">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
          <button id="send" type="button" class="btn btn-primary">Guardar</button>
        </div>

      </div>
    </div>
  </div>
  <!-- /modals eliminar ajuste-->


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




  <!-- Fin de las ventanas modales-->

  <div class="right_col" role="main">
    <div class="">  
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Paquete</h2>
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
             <h5>Consulte el stock por paquete</h5>

              <div class="row">
                <div class="form-group">

                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="documento">Medida</label>
                    <input disabled="" type="text" id="medidaidb" class="form-control col-md-7 col-xs-12">

                  </div> 
                  <div class="col-md-1 col-sm-1 col-xs-12">
                    <button data-toggle="modal" data-target="#modal-medida" type="" class="btn btn-primary btn-calidad btn-sm btn-margin"><i class="fa fa-search"></i></button>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="documento">Nº de Trazabilidad</label>
                    <input type="text" id="tranzabilidadb" class="form-control col-md-7 col-xs-12">
                  </div> 

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Proveedor</label>
                    <select id="proveedoridb" class="form-control">
                      <option></option>
                      @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->razon}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label"  for="first-name">Diámetro Exterior Máx</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Exterior Mín</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametroextmaxdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametroextmaxhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametroextmindesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametroextminhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor Máx</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor Mín</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesormaxdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesormaxhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesormindesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesorminhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Largo Máx</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Largo Mín</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="largomaxdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="largomaxhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="largomindesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="largominhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Kilogramos</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Kg/Metros</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="kilodesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="kilohastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="kilometrosdesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="kilometroshastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Tipo De Acero:</label>
                    <span><a id="alternar-check-4">Elegir <span class="fa fa-chevron-down"></span></a></span>

                  </div>
                  <div id="respuesta-check-4" style="display: none; margin-left:10px;">

                    <select multiple="multiple" id="my-select-3" name="my-select-tipoaceroid[]" >
                      @foreach ($tipoaceros as $norma)
                        <option value='{{$norma->id}}'>{{$norma->descripcion}}</option>
                      @endforeach
                    </select>
                    <!---
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
                    <label class="control-label" for="first-name">Tipo De Costura:</label>
                    <span><a id="alternar-check-5">Elegir <span class="fa fa-chevron-down"></span></a></span>

                  </div>
                  <div id="respuesta-check-5" style="display: none; margin-left:10px;">
                    <select multiple="multiple" id="my-select-2" name="my-select[]" >
                    @foreach ($tipocosturas as $tipo)
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
                </div>  <!-- Cierra row general-->
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Estado</label>
                    <select id="estadoidb" class="form-control">
                      <option></option>
                      @foreach ($estados as $estado)
                        <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Rubro</label>
                    <select id="rubroidb" class="form-control">
                      <option></option>
                      @foreach ($rubros as $rubro)
                        <option value="{{$rubro->id}}">{{$rubro->descripcion}}</option>
                      @endforeach  
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Forma</label>
                    <select id="formaidb" class="form-control">
                      <option></option>
                      @foreach ($formas as $forma)
                        <option value="{{$forma->id}}">{{$forma->descripcion}}</option>
                      @endforeach  
                    </select>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <label class="control-label" for="first-name">Ubicación</label>  
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <label class="control-label" for="first-name">Orden 1</label>  
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <label class="control-label" for="first-name">Orden 2</label>  
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-2 col-sm-2 col-xs-2">
                    <select id="select_p1" class="form-control">
                      <option value="-1">Todos</option>
                      <option value=1> Moreno 2 </option>
                      <option value=2> San Martín </option>
                    </select>
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-1">
                    <select id="select_p2" class="form-control">
                      <option value='-1'>Todos</option>
                    </select>
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-1">
                    <select id="select_p3" class="form-control">
                      <option value="-1">Todos</option>
                    </select>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <select id="" class="form-control">
                      <option value=""> 1</option>
                      <option value="press"> 2</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <select id="" class="form-control">
                      <option value=""> 1</option>
                      <option value="press"> 2</option>
                    </select>
                  </div>
                </div>


              </div>



              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 ">

                  <button id="buscarpaquete" class="btn btn-primary  btn-sm">Buscar</button>
                  <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
                </div>
              </div>



            <div class="clearfix"></div>
            <br>
            <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
            <div class="x_content">
              <div  class="table-responsive">
                <table id="datatable-buttonspaquetes" class="table table-striped table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>N° De Trazabilidad</th>
                      <th>Diam. Exterior</th>
                      <th>Espesor Nominal</th>
                      <th>Largo</th>
                      <th>Costura</th>
                      <th>Térmico</th>
                      <th>Acero</th>
                      <th>Norma</th>
                      <th>Proveedor</th>
                      <th>Stock (Kgs)</th>
                      <th>Kg/m</th>
                      <th>Tubos</th>
                      <th>Forma</th>
                      <th>Rubro</th>
                      <th>Estado</th>
                      <th>Ubicación</th>
                      <th>Diametro Máx</th>
                      <th>Diametro Mín</th>
                      <th>Espesor Máx</th>
                      <th>Espesor Mín</th>
                      <th>Largo Máx</th>
                      <th>Largo Mín</th>
                      <th>Duerza Cost</th>
                      <th>Dureza Tubo</th>
                      <th>Abocardado (%)</th>
                      <th>Carbono (%)</th>
                      <th>Manganeso (%)</th>
                      <th>Fósforo (%)</th>
                      <th>Azufre (%)</th>
                      <th>Sílicio (%)</th>
                      <th>Resistencia Mín</th>
                      <th>Resistencia Máx</th>
                      <th>Carga Rotura Mín</th>
                      <th>Carga Rotura Máx</th>
                      <th>Biselado</th>
                      <th>Estencialdo</th>
                      <th>Tipo Ensayo</th>
                      <th>Nº Crtificado</th>
                      <th>Nº Colada</th>
                      <th>Alarg. Mín</th>
                      <th>Alarg. Máx</th>
                      <th>Observaciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
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
<!-- /page content -->


@endsection

@section('js_extra')
<script type="text/javascript">
  $(document).ready(function(){
    load_select_paquete();
  });

  function load_select_paquete(){
    var arrayx = alphabetRange("E","Z");
    arrayx.forEach(function(value){
      $("#select_p2").append(
        '<option value="'+value+'">'+value+'</option>\
      ');

      $("#select_2p2").append(
        '<option value="'+value+'">'+value+'</option>\
      ');
    });

    for(var i=1;i<31;i++){
      $("#select_p3").append(
        '<option value="'+i+'">'+i+'</option>\
      ');
      
    }
  }

  function alphabetRange (start, end) {
      return new Array(end.charCodeAt(0) - start.charCodeAt(0)).fill().map((d, i) => String.fromCharCode(i + start.charCodeAt(0)));
  }

  $(function(){


    var table = $("#datatable-buttonsmedidas").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    var tablep = $("#datatable-buttonspaquetes").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });



    ////////// SCRIPT SEARCH MEDIDA ////////////////

    //// Valores a reemplazar o añadir : [
    //// 1 - nombre de la tabla de medidas -----> ('#datatable-buttonsmedidas')
    //// 2 - id de los input para buscar las medidas 
    //// 3 - id del boton de buscar medidas -----> ('#buscarmedida')
    //// 4 - valor del campo del buscador principal -----> ('medida_id')
    /// ] 
    var medida_id = 0;

    $('#datatable-buttonsmedidas').on('click', 'tr', function(){
      medida_id = $(this).attr('id');
      var namemedida = $(this).data('medida');
      $("#medidaidb").val(namemedida);
      
      if($(this).hasClass('selected-table')){
        $(this).removeClass('selected-table');
      }else{
        $("#datatable-buttonsmedidas tbody tr.selected-table").removeClass('selected-table');
        $(this).addClass('selected-table');
      }

      $(function () {
         $('#modal-medida').modal('toggle');
      });
    });

    $("#limpiarbusqueda").on('click', function(){
      $('#medidaidb').val("");
      $('#tranzabilidadb').val("");
      $('#proveedoridb').val("");
      $('#diametroextmaxdesdeb').val("");
      $('#diametroextmaxhastab').val("");
      $('#diametroextmindesdeb').val("");
      $('#diametroextminhastab').val("");
      $('#espesormindesdeb').val("");
      $('#espesorminhastab').val("");
      $('#espesormaxhastab').val("");
      $('#espesormaxdesdeb').val("");
      $('#largominhastab').val("");
      $('#largomindesdeb').val("");
      $('#largomaxhastab').val("");
      $('#largomaxdesdeb').val("");
      $('#kilodesdeb').val("");
      $('#kilohastab').val("");
      $('#kilometroshastab').val("");
      $('#kilometrosdesdeb').val("");
      $('#estadoidb').val("");
      $('#rubroidb').val("");
      $('#formaidb').val("");
      $('#my-select').val("");
      $('#my-select-2').val("");
      $('#my-select-3').val("");
      $('#select_p1').val("");
      $('#select_p2').val("");
      $('#select_p3').val("");
      medida_id = undefined;
      tablep.clear().draw();
      $('#my-select').multiSelect('deselect_all');
      $('#my-select-2').multiSelect('deselect_all');
      $('#my-select-3').multiSelect('deselect_all');

    });

    $("#buscarpaquete").on('click', function(){
      console.log(medida_id);
      var medidaidb = $('#medidaidb').val();
      var tranzabilidadb = $('#tranzabilidadb').val();
      var proveedoridb = $('#proveedoridb').val();
      var diametroextmaxdesdeb = $('#diametroextmaxdesdeb').val();
      var diametroextmaxhastab = $('#diametroextmaxhastab').val();
      var diametroextmindesdeb = $('#diametroextmindesdeb').val();
      var diametroextminhastab = $('#diametroextminhastab').val();
      var espesormindesdeb = $('#espesormindesdeb').val();
      var espesorminhastab = $('#espesorminhastab').val();
      var espesormaxhastab = $('#espesormaxhastab').val();
      var espesormaxdesdeb = $('#espesormaxdesdeb').val();
      var largominhastab = $('#largominhastab').val();
      var largomindesdeb = $('#largomindesdeb').val();
      var largomaxhastab = $('#largomaxhastab').val();
      var largomaxdesdeb = $('#largomaxdesdeb').val();
      var kilodesdeb = $('#kilodesdeb').val();
      var kilohastab = $('#kilohastab').val();
      var kilometroshastab = $('#kilometroshastab').val();
      var kilometrosdesdeb = $('#kilometrosdesdeb').val();
      var estadoidb = $('#estadoidb').val();
      var rubroidb = $('#rubroidb').val();
      var formaidb = $('#formaidb').val();
      var normaidsb = $('#my-select').val();
      var tipocosturaidsb = $('#my-select-2').val();
      var tipoaceroidsb = $('#my-select-3').val();
      var deposito = $('#select_p1').val();
      var ubicacion1 = $('#select_p2').val();
      var ubicacion2 = $('#select_p3').val();



      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

       $.ajax({  
        type: "post",
        url: "{{route('buscarpaquetes')}}",
        data: {
          'medidaidb': medida_id,
          'tranzabilidadb': tranzabilidadb,
          'proveedoridb': proveedoridb,
          'diametroextmaxdesdeb': diametroextmaxdesdeb,
          'diametroextmaxhastab': diametroextmaxhastab,
          'diametroextmindesdeb': diametroextmindesdeb,
          'diametroextminhastab': diametroextminhastab,
          'espesormindesdeb': espesormindesdeb,  
          'espesorminhastab': espesorminhastab,  
          'espesormaxhastab': espesormaxhastab,          
          'espesormaxdesdeb': espesormaxdesdeb,  
          'largominhastab': largominhastab,  
          'largomindesdeb': largomindesdeb,
          'largomaxhastab': largomaxhastab,
          'largomaxdesdeb': largomaxdesdeb,
          'kilodesdeb': kilodesdeb,
          'kilohastab': kilohastab,
          'kilometroshastab': kilometroshastab,
          'kilometrosdesdeb': kilometrosdesdeb,
          'estadoidb': estadoidb,  
          'rubroidb': rubroidb,
          'formaidb': formaidb,
          'normaids' : normaidsb,
          'tipocosturaidsb': tipocosturaidsb,
          'tipoaceroidsb': tipoaceroidsb,
          'deposito': deposito,
          'ubicacion1': ubicacion1,
          'ubicacion2': ubicacion2
        },
        beforeSend: function() {
           $('#loader').show();
        },
        complete: function(){
           $('#loader').hide();
        },
        success: function(data){
          var arrayReturn = data.resultado;
          tablep.destroy();
          tablep = $("#datatable-buttonspaquetes").DataTable({
            "data": arrayReturn,
            "columns": [
              {"data": "Fecha"},
              {"data": "NTrazabilidad"},
              {"data": "DiametroExterior"},
              {"data": "EspesorNominal"},
              {"data": "Largo"},
              {"data": "Costura"},
              {"data": "TTermico"},
              {"data": "Acero"},
              {"data": "Norma"},
              {"data": "Proveedor"},
              {"data": "Stock(kgs)"},
              {"data": "Kg/m"},
              {"data": "Tubos"},
              {"data": "Forma"},
              {"data": "Rubro"},
              {"data": "Estado"},
              {"data": "Ubicacion"},
              {"data": "Diametromaximo"},
              {"data": "Diametrominimo"},
              {"data": "Espesormaximo"},
              {"data": "Espesorminimo"},
              {"data": "Largomaximo"},
              {"data": "Largominimo"},
              {"data": "DurezaCostura"},
              {"data": "DurezaTubo"},
              {"data": "Abocardado(%)"},
              {"data": "Carbono"},
              {"data": "Manganeso(%)"},
              {"data": "Fosforo(%)"},
              {"data": "Azufre(%)"},
              {"data": "Silicio(%)"},
              {"data": "ResistenciaMin"},
              {"data": "ResistenciaMax"},
              {"data": "CargaRoturaMin"},
              {"data": "CargaRoturaMax"},
              {"data": "Biselado"},
              {"data": "Estencilado"},
              {"data": "TipoEnsayo"},
              {"data": "NCertificado"},
              {"data": "NColada"},
              {"data": "AlargMin"},
              {"data": "AlargMax"},
              {"data": "Observaciones"}
            ],
            order: [],

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
  });
</script>

@endsection