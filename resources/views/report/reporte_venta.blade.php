@extends('layouts.app')

@section('content')

 <!-- /top navigation -->
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
              <h4 class="modal-title" id="myModalLabel2">Modificar Reporte De Venta</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="">
                <div class="form-group">

                  <div class="row">

                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="first-name">Nombre</label>
                      <select id="" class="form-control">
                        <option value=""></option>
                        @foreach ($reportes as $reporte)
                          <option value="{{$reporte->id}}">{{$reporte->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>

                  </div><br>
                  <div class="row">
                    <div class="col-md-1">
                      <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Cargar</button>
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="btn btn-delete  btn-sm">Limpiar</button>
                    </div>
                  </div><br>
                   <div class="x_title">
                      <h5>Datos De Cotización</h5>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Cliente</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <label class="control-label" for="first-name">Código del Cliente</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                        <label class="control-label" for="first-name">Fecha De Entrega</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Desde</label>
                        <div class='input-group date' id='DatepickerModalModifcarEntregaDesde'>
                          <input type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Hasta</label>
                        <div class='input-group date' id='DatepickerModalModifcarEntregaHasta'>
                          <input type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="x_title">
                      <h5>Estados</h5>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Sin Cotizar
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">En Seguimiento
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Aprobada
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Anulada
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Rechazada
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Finalizada
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                    </div>
                        <div class="x_title">
                      <h5>Medidas</h5>
                      <div class="clearfix"></div>
                    </div>

                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Exterior</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Diámetro Exterior Min</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Exterior Máx</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Diámetro Interior</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Interior Min</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Diámetro Interior Máx</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Espesor</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Espesor Min.</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Espesor Máx.</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Kilos</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>

                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Largo Máximo</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Largo Mínimo</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tipo de Acero</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($tipoaceros as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tipo de Costura</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($tipocosturas as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tratamiento Térmico</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($tratamientos as $tratamiento)
                            <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Norma</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($normas as $norma)
                            <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tipo de Orden</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($tipoordenes as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Uso</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($usos as $uso)
                            <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <label class="control-label" for="first-name">Forma</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($formas as $forma)
                            <option value="{{$forma->id}}">{{$forma->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <label class="control-label" for="first-name">Embalaje</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($embalajes as $embalaje)
                            <option value="{{$embalaje->id}}">{{$embalaje->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <label class="control-label" for="first-name">Código Del Material</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Biselado
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Urgente
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                       </div>
                    </div>
                     <div class="x_title">
                    <h5>Control de Calidad</h5>
                    <div class="clearfix"></div>
                  </div>

                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                      <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                      <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Rugosidad</label>
                      <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                      <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-6">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Certificado</label>
                      <select id="" class="form-control">
                        <option value=""></option>
                        @foreach ($certificados as $certificado)
                          <option value="{{$certificado->id}}">{{$certificado->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Pestañado
                        <input type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Aplastado
                        <input type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>

                  </div><br>
                  <div class="x_title">
                    <h5>Datos De Venta</h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Condición De Venta</label>
                      <select id="" class="form-control">
                        <option value=""></option>
                        @foreach ($condiciones as $condicion)
                          <option value="{{$condicion->id}}">{{$condicion->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div><br>

                  
        
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
              <h4 class="modal-title" id="myModalLabel2">Agregar Reporte De Venta</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="">

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="first-name">Nombre</label>
                      <select id="" class="form-control">
                        <option value=""></option>
                        @foreach ($reportes as $reporte)
                          <option value="{{$reporte->id}}">{{$reporte->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div><br>
                  <div class="row">
                      <div class="col-md-1">
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Cargar</button>
                      </div>
                      <div class="col-md-1">
                        <button type="button" class="btn btn-delete  btn-sm">Limpiar</button>
                      </div>
                    </div><br>
                    <div class="x_title">
                      <h5>Datos De Cotización</h5>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Cliente</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <label class="control-label" for="first-name">Código del Cliente</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                        <label class="control-label" for="first-name">Fecha De Entrega</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Desde</label>
                        <div class='input-group date' id='DatepickerModalAgregarEntregaDesde'>
                          <input type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Hasta</label>
                        <div class='input-group date' id='DatepickerModalAgregarEntregaHasta'>
                          <input type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="x_title">
                      <h5>Estados</h5>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Sin Cotizar
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">En Seguimiento
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Aprobada
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Anulada
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Rechazada
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Finalizada
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                    </div>

                    <div class="x_title">
                      <h5>Medidas</h5>
                      <div class="clearfix"></div>
                    </div>

                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Exterior</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Diámetro Exterior Min</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Exterior Máx.</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Diámetro Interior</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Interior Min</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Diámetro Interior Máx</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Espesor</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Espesor Min.</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Espesor Máx.</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Kilos</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Desde</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>

                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Largo Máximo</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Largo Mínimo</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tipo de Acero</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($tipoaceros as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tipo de Costura</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($tipocosturas as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tratamiento Térmico</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($tratamientos as $tratamiento)
                            <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Norma</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($normas as $norma)
                            <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tipo de Orden</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($tipoordenes as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Uso</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($usos as $uso)
                            <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <label class="control-label" for="first-name">Forma</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($formas as $forma)
                            <option value="{{$forma->id}}">{{$forma->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <label class="control-label" for="first-name">Embalaje</label>
                        <select id="" class="form-control">
                          <option value=""></option>
                          @foreach ($embalajes as $embalaje)
                            <option value="{{$embalaje->id}}">{{$embalaje->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <label class="control-label" for="first-name">Código Del Material</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Biselado
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Urgente
                          <input type="checkbox">
                          <span class="check"></span>
                        </label>
                       </div>
                    </div>
                   <div class="x_title">
                    <h5>Control de Calidad</h5>
                    <div class="clearfix"></div>
                  </div>

                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                      <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                      <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Rugosidad</label>
                      <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                      <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-6">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Certificado</label>
                      <select id="" class="form-control">
                        <option value=""></option>
                        @foreach ($certificados as $certificado)
                          <option value="{{$certificado->id}}">{{$certificado->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Pestañado
                        <input type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Aplastado
                        <input type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>

                  </div><br>
                  <div class="x_title">
                    <h5>Datos De Venta</h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Condición De Venta</label>
                      <select id="" class="form-control">
                        <option value=""></option>
                        @foreach ($condiciones as $condicion)
                          <option value="{{$condicion->id}}">{{$condicion->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div><br>
                
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
                <h2>Reportes de Venta</h2>
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
              <div class="x_title">
                <h5>Cargar Reporte</h5>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">

                    <div class="row">
                      <input id="idreport" name="" type="hidden">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="control-label" for="first-name">Nombre</label>
                        <select id="nombrereporteidb" class="form-control">
                          <option value=""></option>
                          @foreach ($reportes as $reporte)
                            <option value="{{$reporte->id}}">{{$reporte->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-1">
                        <a id="cargarreport" class="btn btn-default btn-sm">Cargar</a>
                      </div>
                      <div class="col-md-1">
                        <a id="limpiarbusqueda2" class="btn btn-delete  btn-sm">Limpiar</a>
                      </div>
                    </div><br>
                    <div class="x_title">
                      <h5>Datos De Cotización</h5>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Cliente</label>
                        <select id="clienteidb" class="form-control">
                          <option></option>
                          @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <label class="control-label" for="first-name">Código del Cliente</label>
                        <input type="text" id="codigob" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                        <label class="control-label" for="first-name">Fecha De Entrega</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Desde</label>
                        <div class='input-group date' id='DatepickerVentaReportDesde'>
                          <input id="desdeb" type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Hasta</label>
                        <div class='input-group date' id='DatepickerVentaReportHasta'>
                          <input id="hastab" type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="x_title">
                      <h5>Estados</h5>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Sin Cotizar
                          <input id="sincotizarb" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">En Seguimiento
                          <input id="enseguimientob" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Aprobada
                          <input id="aprobadab" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Anulada
                          <input id="anuladab" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Rechazada
                          <input id="rechazadab" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Finalizada
                          <input id="finalizadab" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                    </div>

                    <div class="x_title">
                      <h5>Medidas</h5>
                      <div class="clearfix"></div>
                    </div>

                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Exterior</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Diámetro Interior</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" id="diametroexb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <!-- <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div> -->
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" id="diametroinb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                     <!--  <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div> -->
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Exterior Máx.</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Diámetro Interior Max</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" id="diametroexmaxb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <!-- <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div> -->
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" id="diametroinmaxb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <!-- <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div> -->
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Diámetro Exterior Min</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Diámetro Interior Min</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" id="diametroexminb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <!-- <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div> -->
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" id="diametroinminb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <!-- <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div> -->
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Espesor</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Espesor Min.</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" id="espesorb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <!-- <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div> -->
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" id="espesorminb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <!-- <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div> -->
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                        <label class="control-label" for="first-name">Espesor Máx.</label>
                      </div>
                      <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                        <label class="control-label" for="first-name">Kilos</label>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" id="espesormaxb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                    <!--   <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Hasta</label>
                        <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div> -->
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <input type="text" id="kilosdesdeb" placeholder="Desde" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <input type="text" id="kiloshastab" placeholder="Hasta" class="form-control col-md-7 col-xs-3">
                      </div>
                    </div>

                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Largo Máximo</label>
                        <input type="text" id="largomaxb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Largo Mínimo</label>
                        <input type="text" id="largominb" placeholder="" class="form-control col-md-7 col-xs-3">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tipo de Acero</label>
                        <select id="tipoaceroidb" class="form-control">
                          <option value=""></option>
                          @foreach ($tipoaceros as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tipo de Costura</label>
                        <select id="tipocosturaidb" class="form-control">
                          <option value=""></option>
                          @foreach ($tipocosturas as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tratamiento Térmico</label>
                        <select id="tratamientoidb" class="form-control">
                          <option value=""></option>
                          @foreach ($tratamientos as $tratamiento)
                            <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Norma</label>
                        <select id="normaidb" class="form-control">
                          <option value=""></option>
                          @foreach ($normas as $norma)
                            <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Tipo de Orden</label>
                        <select id="tipoordenidb" class="form-control">
                          <option value=""></option>
                          @foreach ($tipoordenes as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <label class="control-label" for="first-name">Uso</label>
                        <select id="usoidb" class="form-control">
                          <option value=""></option>
                          @foreach ($usos as $uso)
                            <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div  class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <label class="control-label" for="first-name">Forma</label>
                        <select id="formaidb" class="form-control">
                          <option value=""></option>
                          @foreach ($formas as $forma)
                            <option value="{{$forma->id}}">{{$forma->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <label class="control-label" for="first-name">Embalaje</label>
                        <select id="embalajeidb" class="form-control">
                          <option value=""></option>
                          @foreach ($embalajes as $embalaje)
                            <option value="{{$embalaje->id}}">{{$embalaje->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <label class="control-label" for="first-name">Código Del Material</label>
                        <input type="text" id="codigomaterialb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Biselado
                          <input id="biseladob" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Urgente
                          <input id="urgenteb" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>

                    </div>

                  </div>
                  <div class="x_title">
                    <h5>Control de Calidad</h5>
                    <div class="clearfix"></div>
                  </div>

                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                      <input type="text" id="durezaminb" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Dureza Maxima (HRB)</label>
                      <input type="text" id="durezamaxb" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Rugosidad</label>
                      <input type="text" id="rugosidadb" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                      <input type="text" id="flechab" placeholder="" class="form-control col-md-7 col-xs-6">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Certificado</label>
                      <select id="certificadoidb" class="form-control">
                        <option value=""></option>
                        @foreach ($certificados as $certificado)
                          <option value="{{$certificado->id}}">{{$certificado->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Pestañado
                        <input id="pestanadob" type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Aplastado
                        <input id="aplastadob" type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>

                  </div><br>
                  <div class="x_title">
                    <h5>Datos De Venta</h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Condición De Venta</label>
                      <select id="condicionb" class="form-control">
                        <option value=""></option>
                        @foreach ($condiciones as $condicion)
                          <option value="{{$condicion->id}}">{{$condicion->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div><br>
                  <div class="x_title">
                    <h5>Guardar/Ejecutar Reporte</h5>
                    <div class="clearfix"></div>
                  </div>

                  <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Nombre del Reporte</label>
                      <input type="text" id="" class="form-control col-md-7 col-xs-12">
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
              <div class="clearfix"></div>
              <div class="x_content">
                <div class="row">
                  <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                  <div class="table-responsive">
                    <table id="datatable-buttonsreport" class="table table-striped table-bordered table-hover" style="width: 100%">
                      <thead>
                        <tr>
                          <th>Medida</th>
                          <th>Fecha</th>
                          <th>N° Cotización</th>
                          <th>Estado</th>
                          <th>Uso</th>
                          <th>T. Térmico</th>
                          <th>Mts</th>
                          <th>Kilos</th>
                          <th>Precio</th>
                          <th>Kg</th>
                          <th>Monedas</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
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

    var table = $("#datatable-buttonsreport").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    $('#limpiarbusqueda2').on('click', function(){
      $('#nombrereporteidb').val("");
    });

    $('#cargarreport').on('click', function(){
      //vaciado();
      var reportcargado = $('#nombrereporteidb').val();
      if (reportcargado){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        $.ajax({  
          type: "post",
          url: "{{route('cargarreport')}}",
          data: {
            'type': 2,
            'id': reportcargado
          },
          success: function(data){
            //$('#sinprocesob').prop('checked', true);
            $('#clienteidb').val(data.clienteb);
            $('#desdeb').val(data.febdesde);
            $('#hastab').val(data.febhasta);
            if (data.sinCotizar == 1)
              $("#sincotizarb").prop('checked', true);
            if (data.enSeguimiento == 1)
              $("#enseguimientob").prop('checked', true);
            if (data.aporbada == 1)
              $("#aprobadab").prop('checked', true);
            if (data.anulada == 1)
              $("#anuladab").prop('checked', true);
            if (data.rechazada == 1)
              $("#rechazadab").prop('checked', true);
            if (data.finalizada == 1)
              $("#finalizadab").prop('checked', true);
            $('#diametroexb').val(data.diamextb);
            $('#diametroinb').val(data.diamintb);
            $('#diametroexmaxb').val(data.diamextmax);
            $('#diametroexminb').val(data.diamextmin);
            $('#diametroinmaxb').val(data.diamintmax);
            $('#diametroinminb').val(data.diamintmin);
            $('#espesorb').val(data.espesorb);
            $('#espesorminb').val(data.espesormin);
            $('#espesormaxb').val(data.espesormax);
            $('#kiloshastab').val(data.kilhasta);
            $('#kilosdesdeb').val(data.kildesde);
            $('#largomaxb').val(data.largob);
            $('#largominb').val(data.largoMinb);
            $('#tipoaceroidb').val(data.tipoacerob);
            $('#tipocosturaidb').val(data.tipocosturab);
            $('#tratamientoidb').val(data.tipotratb);
            $('#normaidb').val(data.tiponormab);
            $('#tipoordenidb').val(data.revenb);
            $('#usoidb').val(data.usob);
            $('#formaidb').val(data.forma);
            $('#codigomaterialb').val(data.codigomb);
            if (data.biselado == 1)
              $("#biseladob").prop('checked', true);
            if (data.urgente == 1)
              $("#urgenteb").prop('checked', true);
            $('#durezamaxb').val(data.durezaMax);
            $('#durezaminb').val(data.durezaMin);
            $('#rugosidadb').val(data.rugosidad);
            $('#flechab').val(data.flecha);
            $('#certificadoidb').val(data.certificado);
            if (data.aplastado == 1)
              $("#aplastadob").prop('checked', true);
            $('#nombrereporte').val(data.descripcion);
            if (data.pestaniado == 1)
              $("#pestanadob").prop('checked', true);
            $('#condicionb').val(data.condvta);
            $('#idreport').val(data.id);
            return;
          }

        });    

      }
      else{
        $.toast({ 
          text : "Debe Seleccionar un Reporte a Cargar", 
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

    function vaciado(){
      $('#clienteidb').val("");
      $('#codigob').val("");
      $('#desdeb').val("");
      $('#hastab').val("");
      $("#sincotizarb").removeAttr('checked');
      $("#enseguimientob").removeAttr('checked');
      $("#aprobadab").removeAttr('checked');
      $("#anuladab").removeAttr('checked');
      $("#rechazadab").removeAttr('checked');
      $("#finalizadab").removeAttr('checked');
      $('#diametroexb').val("");
      $('#diametroinb').val("");
      $('#diametroexmaxb').val("");
      $('#diametroexminb').val("");
      $('#diametroinmaxb').val("");
      $('#diametroinminb').val("");
      $('#espesorb').val("");
      $('#espesorminb').val("");
      $('#espesormaxb').val("");
      $('#kiloshastab').val("");
      $('#kilosdesdeb').val("");
      $('#largomaxb').val("");
      $('#largominb').val("");
      $('#tipoaceroidb').val("");
      $('#tipocosturaidb').val("");
      $('#tratamientoidb').val("");
      $('#normaidb').val("");
      $('#tipoordenidb').val("");
      $('#usoidb').val("");
      $('#formaidb').val("");
      $('#embalajeidb').val("");
      $('#codigomaterialb').val("");
      $("#biseladob").removeAttr('checked');
      $("#urgenteb").removeAttr('checked');
      $('#durezamaxb').val("");
      $('#durezaminb').val("");
      $('#rugosidadb').val("");
      $('#flechab').val("");
      $('#certificadoidb').val("");
      $("#pestanadob").removeAttr('checked');
      $("#aplastadob").removeAttr('checked');
      $('#condicionb').val("");

    }

    $('#limpiarbusqueda').on('click', function(){
      vaciado();
    });

    $('#buscarreport').on('click', function(){
      var nombrereporteidb = $('#nombrereporteidb').val();
      var clienteidb = $('#clienteidb').val();
      var codigob = $('#codigob').val();
      var desdeb = $('#desdeb').val();
      var hastab = $('#hastab').val();
      var sincotizarb = $("#sincotizarb").is(':checked');
      var enseguimientob = $("#enseguimientob").is(':checked');
      var aprobadab = $("#aprobadab").is(':checked');
      var anuladab = $("#anuladab").is(':checked');
      var rechazadab = $("#rechazadab").is(':checked');
      var finalizadab = $("#finalizadab").is(':checked');
      var diametroexb = $('#diametroexb').val();
      var diametroinb = $('#diametroinb').val();
      var diametroexmaxb = $('#diametroexmaxb').val();
      var diametroexminb = $('#diametroexminb').val();
      var diametroinmaxb = $('#diametroinmaxb').val();
      var diametroinminb = $('#diametroinminb').val();
      var espesorb = $('#espesorb').val();
      var espesorminb = $('#espesorminb').val();
      var espesormaxb = $('#espesormaxb').val();
      var kiloshastab = $('#kiloshastab').val();
      var kilosdesdeb = $('#kilosdesdeb').val();
      var largomaxb = $('#largomaxb').val();
      var largominb = $('#largominb').val();
      var tipoaceroidb = $('#tipoaceroidb').val();
      var tipocosturaidb = $('#tipocosturaidb').val();
      var tratamientoidb = $('#tratamientoidb').val();
      var normaidb = $('#normaidb').val();
      var tipoordenidb = $('#tipoordenidb').val();
      var usoidb = $('#usoidb').val();
      var formaidb = $('#formaidb').val();
      var embalajeidb = $('#embalajeidb').val();
      var codigomaterialb = $('#codigomaterialb').val();
      var biseladob = $("#biseladob").is(':checked');
      var urgenteb = $("#urgenteb").is(':checked');
      var durezamaxb = $('#durezamaxb').val();
      var durezaminb = $('#durezaminb').val();
      var rugosidadb = $('#rugosidadb').val();
      var flechab = $('#flechab').val();
      var certificadoidb = $('#certificadoidb').val();
      var pestanadob = $("#pestanadob").is(':checked');
      var aplastadob = $("#aplastadob").is(':checked');
      var condicionb = $('#condicionb').val();

      if (sincotizarb != true)
        sincotizarb = null;

      if (enseguimientob != true)
        enseguimientob = null;

      if (aprobadab != true)
        aprobadab = null;

      if (anuladab != true)
        anuladab = null;

      if (rechazadab != true)
        rechazadab = null;

      if (finalizadab != true)
        finalizadab = null;

      if (biseladob != true)
        biseladob = null;

      if (urgenteb != true)
        urgenteb = null;

      if (pestanadob != true)
        pestanadob = null;

      if (aplastadob != true)
        aplastadob = null;

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('buscar_reporteventas')}}",
        data: {
          'clienteidb' : clienteidb,
          'codigob' : codigob,
          'desdeb' : desdeb,
          'hastab' : hastab,
          'sincotizarb' : sincotizarb,
          'enseguimientob' : enseguimientob,
          'aprobadab' : aprobadab,
          'anuladab' : anuladab,
          'rechazadab' : rechazadab,
          'finalizadab' : finalizadab,
          'diametroexb' : diametroexb,
          'diametroinb' : diametroinb,
          'diametroexmaxb' : diametroexmaxb,
          'diametroexminb' : diametroexminb,
          'diametroinmaxb' : diametroinmaxb,
          'diametroinminb' : diametroinminb,
          'espesorb' : espesorb,
          'espesorminb' : espesorminb,
          'espesormaxb' : espesormaxb,
          'kiloshastab' : kiloshastab,
          'kilosdesdeb' : kilosdesdeb,
          'largomaxb' : largomaxb,
          'largominb' : largominb,
          'tipoaceroidb' : tipoaceroidb,
          'tipocosturaidb' : tipocosturaidb,
          'tratamientoidb' : tratamientoidb,
          'normaidb' : normaidb,
          'tipoordenidb' : tipoordenidb,
          'usoidb' : usoidb,
          'formaidb' : formaidb,
          'embalajeidb' : embalajeidb,
          'codigomaterialb' : codigomaterialb,
          'biseladob' : biseladob,
          'urgenteb' : urgenteb,
          'durezamaxb' : durezamaxb,
          'durezaminb' : durezaminb,
          'rugosidadb' : rugosidadb,
          'flechab' : flechab,
          'certificadoidb' : certificadoidb,
          'pestanadob' : pestanadob,
          'aplastadob' : aplastadob,
          'condicionb' : condicionb,
          'nombrereporteidb': nombrereporteidb
        },
        beforeSend: function() {
          $('#loader').show();
        },
        complete: function(){
          $('#loader').hide();
        },
        success: function(data){
          var arrayReturn = data.resultado;
          console.log(arrayReturn);
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
              {"data": "MEDIDA"},
              {"data": "FECHA"},
              {"data": "NCot"},
              {"data": "ESTADO"},
              {"data": "USO"},
              {"data": "TTermico"},
              {"data": "Mts"},
              {"data": "Kilos"},
              {"data": "PRECIOKG"},
              {"data": "kgmMP"},
              {"data": "Moneda"}
            ],
            columnDefs : [
              { targets : [1],
                render : function (data, type, row) {
                  if (data){
                    var nuevafecha = data.split("-");
                    nuevafecha = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
                    return nuevafecha;
                  }
                }
              },
            ],
          });

        }
      });
    });

      

  });
</script>
@endsection