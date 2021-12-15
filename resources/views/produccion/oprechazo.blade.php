@extends('layouts.app')

@section('content')

      <!-- page content -->
      <!-- Inicio de las ventanas modales-->
      <!--  modal Guardar  -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-guardar">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h5 class="modal-title" id="myModalLabel2">¿Desea Guardar los Cambios?</h5>
            </div>
            
            <div class="modal-footer">
              <button id="send_put" type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /modals Guardar-->

      <!--  modal Ver Costo Por Centro -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-ver">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Costo Por Centros</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Ingresar La Fecha</label>
                          <div class="form-group">
                            <div class='input-group date' id='DatepickerCostoCentro2'>
                              <input type='text' class="form-control" />
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
                        <button type="" class="btn btn-primary  btn-sm">Buscar</button>
                        <button type="" class="btn btn-success  btn-sm">Limpiar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="table-responsive">
                <table id="" class="table table-striped table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Oper/Hora</th>
                      <th>Cantidad de Gas</th>
                      <th>Gas (Mes)</th>
                      <th>Gas (m<sup>3</sup>)</th>
                      <th>Transporte (Mes)</th>
                      <th>Transporte (Ton/Mes)</th>
                      <th>Transporte (Coeficiente)</th>
                      <th>Horno (Cant.Oper)</th>
                      <th>Horno (Hrs. Trabjadas)</th>
                      <th>Horno (m <sup>3</sup>/Ton)</th>
                      <th>Horno (Ton)</th>
                      <th>Horno (Ton/MOD)</th>
                      <th>Horno (Coeficiente)</th>
                      <th>Batea (Can. Oper)</th>
                      <th>Batea (Hrs. Trabajada)</th>
                      <th>Batea (m<sup>3</sup>)/Ton</th>
                      <th>Batea (Ton)</th>
                      <th>Batea (Consumos)</th>
                      <th>Batea (Coeficiente)</th>
                      <th>TYP (Gastos varios)</th>
                      <th>TYP (Ton. Trefila)</th>
                      <th>TYP (Hrs. Trefila)</th>
                      <th>TYP (Hrs. Punta)</th>
                      <th>TYP (Ton. Punta)</th>
                      <th>TYP (Coeficiente)</th>
                      <th>Enderezado (Hrs.Enderezado)</th>
                      <th>Enderezado (Ton.Enderezado)</th>
                      <th>Enderezado (Hrs.Coeficiente)</th>
                      <th>Corte (Kg/mts)</th>
                      <th>Corte(Cant. Tubos)</th>
                      <th>Corte (Hrs. Trabajada)</th>
                      <th>Corte (Coeficiente)</th>
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
    </div>  <!-- /modals Ver Costo Por Centro-->
    <!-- Fin de las ventanas modales-->
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Información De Orden de Producción</h2>
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
              	@if ($accion == "M")
	                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
	                  @if ($resultado)
	                  <div class="form-group">
	                    <div class="col-md-12 col-sm-12 col-xs-12 ">
	                      @if ($resultado->est == 1 || $resultado->est == 2 || $resultado->est == 5)
	                        <a target="_blank" href="{{route('subprocesoplanificado', $id)}}" class="btn btn-primary  btn-sm">Subprocesos planificados</a>
	                      @endif
	                      <a target="_blank" href="{{route('subprocesoenejecucion', $id)}}" class="btn btn-success  btn-sm">Subprocesos en Ejecución</a>
	                      <a target="_blank" href="{{route('controlfinal', $id)}}" class="btn btn-success  btn-sm">Control Final</a>
	                      <a target="_blank" href="{{route('controlcalidad', $id)}}" class="btn btn-success  btn-sm">Control Calidad</a>
	                      <a href="{{route('exportar', $id)}}" class="btn btn-default  btn-sm"><i class="fa fa-print"></i></a>
	                    </div>
	                  </div>
	                  <div class="ln_solid"></div>
	                  @endif
	                </form>
              	@endif 
              	<div class="col-md-4 col-sm-4 col-xs-4 ">
              		<i class="fa fa-check-circle" style="font-size:48px;color:green"></i>
              		SU ORDEN HAS SIDO GENRADA!
              	</div>
              	<br>
              	<br>
              	<br>
                <div class="col-md-12 col-sm-12 col-xs-12 ">
                  <span><strong>Orden De Producción Nº: {{$NRO_ORDEN}}</strong></span>
                </div>
                <br>
                <div class="col-md-12 col-sm-12 col-xs-12 or" style="display: none;">
                  <span><strong></strong></span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Nº De Orden Compra</label>
                          <input type="text" id="nroorden" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Estado</label>
                          <select disabled="" id="estadoop" class="form-control" required>
                            <option ></option>
                            @foreach ($estadosop as $est)
                              <option value="{{$est->id}}">{{$est->descripcion}}</option>
                            @endforeach                            
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Cliente</label>
                          <select id="clienteid" disabled="" class="form-control" required>
                            <option></option>
                            @foreach ($clientes as $cliente)
                              <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Fecha De Pedido</label>
                        <div class="form-group">
                          <div class='input-group date' id='myDatepicker13'>
                            <input id="fechapedido" type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Fecha Inicio</label>
                        <div class="form-group">
                          <div class='input-group date' id='myDatepicker14'>
                            <input id="fechainicio" type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Fecha Prometida</label>
                        <div class="form-group">
                          <div class='input-group date' id='myDatepicker15'>
                            <input id="fechaprometida" type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Tipo De Orden</label>
                        <select id="reventa" class="form-control" required>
                          <option></option>
                          @foreach ($tiporeventa as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Forma</label>
                        <select id="forma" class="form-control" required>
                          <option></option>
                          @foreach ($formas as $forma)
                            <option value="{{$forma->id}}">{{$forma->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div><br>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Urgente
                          <input id="urgente" type="checkbox">
                          <span class="check"></span>
                        </label>
                        <label class="checkbox">Crítico
                          <input id="critico" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      
                    </div>
                  </div>
                </form>
              </div>
              <div class="x_title">
                <h2>Medida</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Ext. Nominal</label>
                      <input type="text" id="diamex" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Ext. Mínimo</label>
                      <input type="text" id="diamexmin" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Ext. Máximo</label>
                      <input type="text" id="diamexmax" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Int. Nominal</label>
                      <input type="text" id="diamein" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Int. Mínimo</label>
                      <input type="text" id="diameinmin" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Int. Máximo</label>
                      <input type="text" id="diameinmax" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Espesor Ext. Nominal (mm)</label>
                      <input type="text" id="espesor" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Espesor Ext. Mínimo (mm)</label>
                      <input type="text" id="espesormin" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Espesor Ext. Máximo (mm)</label>
                      <input type="text" id="espesormax" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Largo multiplo mín(mm)</label>
                      <input type="text" id="multiplomin" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Largo multiplo máx (mm)</label>
                      <input type="text" id="multiplomax" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Largo mín. entrega (mm)</label>
                      <input type="text" id="largomin" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Largo máx. entrega (mm)</label>
                      <input type="text" id="largomax" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Tratamiento T</label>
                      <select id="tratamiento" class="form-control" required>
                        <option ></option>
                        @foreach ($tratamientos as $tratamiento)
                          <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Ensayo de expansión(mm)</label>
                      <input type="text" id="ensayo" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Tipo de costura</label>
                      <select id="costura" class="form-control" required>
                        <option ></option>
                        @foreach ($costuras as $tratamiento)
                          <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Norma</label>
                      <select id="norma" class="form-control" required>
                        <option ></option>
                        @foreach ($normas as $tratamiento)
                          <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="x_title">
                    <h5>Otros Datos</h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Lugar de entrega</label>
                      <select id="lugar" class="form-control" required>
                        <option value=""> </option>
                        @foreach ($lugares as $lugar)
                          <option value="{{$lugar->id}}">{{$lugar->dire}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Uso</label>
                      <select id="uso" class="form-control" required>
                        <option></option>
                        @foreach ($usos as $lugar)
                          <option value="{{$lugar->id}}">{{$lugar->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Embalaje</label>
                      <select id="embalaje" class="form-control" required>
                        <option></option>
                        @foreach ($embalajes as $lugar)
                          <option value="{{$lugar->id}}">{{$lugar->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Código del Material</label>
                      <input type="text" id="codigo" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Kilos</label>
                      <input type="text" id="kilo" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Piezas</label>
                      <input type="text" id="pieza" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Metros</label>
                      <input type="text" id="metro" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Kg/M</label>
                      <input type="text" id="kgm" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="checkbox">Biscelado
                        <input id="biselado" type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Estencilado
                        <input id="estencilado" type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                  </div>
                  <div id="dataestenci" style="display: none;">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Largo Máx.</label>
                        <input type="text" id="largomaxest" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Largo Mín.</label>
                        <input type="text" id="largominest" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Nº de Colada</label>
                        <input type="text" id="nrocolada" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Medida</label>
                        <input type="text" id="medidaest" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tipo De Costura</label>
                        <select id="costuraest" class="form-control" required>
                          <option ></option>
                          @foreach ($costuras as $tratamiento)
                            <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Norma</label>
                        <select id="normaest" class="form-control" required>
                          <option ></option>
                          @foreach ($costuras as $tratamiento)
                            <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <label class="control-label" for="first-name">Observaciones</label>
                          <textarea class="text-area" name="" id="obsest" ></textarea>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </form>
              </div>
              <div class="x_title">
                <h2>Control de Calidad</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Dureza mínima (HRB)</label>
                        <input type="text" id="durezamin" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Dureza máxima (HRB)</label>
                        <input type="text" id="durezamax" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tipo de Acero</label>
                        <select id="tipoacero" class="form-control" required>
                          <option ></option>
                          @foreach ($aceros as $tratamiento)
                            <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Certificado</label>
                        <select id="certificado" class="form-control" required>
                          <option ></option>
                          @foreach ($certificados as $tratamiento)
                            <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Rugosidad</label>
                        <input type="text" id="rugosidad" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                        <input type="text" id="flecha" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="checkbox">Pestañado
                        <input id="pestanado" type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Aplastado
                        <input id="aplastado" type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <label class="control-label" for="first-name">Observaciones</label>
                        <textarea class="text-area" name="" id="obsprod" ></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="x_title">
                <h2>Datos De Ventas</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label class="checkbox">Condición De Venta:
                        <span id="condicion"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label class="checkbox">Precio Kilo:
                        <span id="pkilo"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label class="checkbox">Precio Metro:
                        <span id="pmetro"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label class="checkbox">Precio Pieza:
                        <span id="ppieza"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label class="checkbox">Precio Pasado:
                      <span id="ppesado"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="checkbox">Tipo De Moneda:
                      <span id="tipomoneda"></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="checkbox">Precio 45%:
                      <span id="p45"></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="checkbox">Precio Contribución:
                      <span id="pcontribucion"></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="checkbox">Observaciones:
                      <span id="obsventa"></span>
                    </label>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
                  <div class="col-md-1">
                    <button type="button" id="procesar" class="btn btn-primary btn-sm">Guardar</button>
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
<input type="hidden" id="ordernew" value="{{$orderNew}}" name="">
<input type="hidden" id="accion" value="{{$accion}}" name="">
<input type="hidden" id="nro" value="{{$NRO_ORDEN}}" name="">
<input type="hidden" id="orden" value="{{$row}}" name="">
<input type="hidden" id="idmedi" value="">
<input type="hidden" id="esteid" value="">
<input type="hidden" id="version" value="">
<input type="hidden" id="kilosv" value="">
<input type="hidden" id="metrosv" value="">
<input type="hidden" id="piezasv" value="">
@if($orderNew == 1)
  <input type="hidden" id="idcot" value="{{$id}}" name="">  
@endif
@endsection

@section('js_extra')
<script type="text/javascript">
$(function(){
	var jsonE = JSON.parse($('#orden').val());
    var ordernew = parseInt($('#ordernew').val());

    if (ordernew == 0){
		mostrardata(jsonE);
     var idcot = jsonE.idCoti;
     console.log(idcot);
     // if($('#idcot').val())
     //  var idcot = parseInt($('#idcot').val());

     // var accion = $('#accion').val();

     // $.ajax({  
     //   type: "GET",
     //   url: "{{route('data_verproduct')}}",
     //   data: {
     //    'accion': accion,
     //    'id': idcot
     //   },
     //   success: function(data){
     //     if (data !== "false"){
     //      mostrardata(data[0]);
     //     }

     //   }
     // });

     function mostrardata(data){
  	  var strongele = $('div.or span strong');

      $('#idmedi').val(data.medid);
      $('#esteid').val(data.estenciladoid);
      if(data.versionAnt)
        $('#version').val(data.versionAnt);

      if(data.ordenReferencia){
      	$('div.or').css('display', 'block');
      	strongele.text("Orden de Referencia: "+data.ordenReferencia);
      }

      $('#kilosv').val(data.kilos);
      $('#metrosv').val(data.metros);
      $('#piezasv').val(data.piezas);

      var NRO_ORDEN = parseInt($('#nro').val());

      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!

      var yyyy = today.getFullYear();
      if (dd < 10) {
        dd = '0' + dd;
      } 
      if (mm < 10) {
        mm = '0' + mm;
      } 

      var today = dd + '/' + mm + '/' + yyyy;

      if (accion=='M')
          NRO_ORDEN = "{{$NRO_ORDEN}}";

          var fechaPrometida = "";
          if (data.fechaPrometida)
            fechaPrometida = convertirFechaAFormato(data.fechaPrometida)

          $('#nroorden').val(data.ordenCompra);
          $('#estadoop').val(1);
          $('#clienteid').val(data.clienteid);
          $('#fechaprometida').val(fechaPrometida);
          $('#fechapedido').val(today);
          $('#reventa').val(data.tipoReventa);
          $('#forma').val(data.formaid);
          if (data.urgente == 1)
            $('#urgente').prop("checked", true);

          if (data.critico == 1)
            $('#critico').prop("checked", true);

          $('#diamex').val(data.diametroExteriorNominal);
          $('#diamexmax').val(data.diametroExteriorMaximo);
          $('#diamexmin').val(data.diametroExteriorMinimo);
          $('#diamein').val(data.diametroInteriorNominal);
          $('#diameinmax').val(data.diametroInteriorMaximo);
          $('#diameinmin').val(data.diametroInteriorMinimo);
          $('#espesor').val(data.espesorNominal);
          $('#espesormax').val(data.espesorMaximo);
          $('#espesormin').val(data.espesorMinimo);
          $('#multiplomin').val(data.largoMinimo);
          $('#multiplomax').val(data.largoMaximo);
          $('#largomin').val(data.largoMinEntrega);
          $('#largomax').val(data.largoMaxEntrega);
          $('#tratamiento').val(data.tratamientoTermico);
          $('#ensayo').val(data.ensayoExpansion);
          $('#costura').val(data.costuraid);
          $('#norma').val(data.normaid);
          $('#lugar').val(data.lugarEntrega);
          $('#uso').val(data.uso);
          $('#embalaje').val(data.tipoEmbalaje);
          $('#codigo').val(data.codigoPieza);

          $('#kilo').val(data.kilos);
          $('#pieza').val(data.piezas);
          $('#metro').val(data.metros);

          var kgm = data.kilogrametro;
          if (data.kilogrametro == "" || data.kilogrametro == 0.00){
            kgm = kilogrametro(data.diametroExteriorNominal, data.espesorNominal);

          }
          $('#kgm').val(kgm);

          if (data.biselado == 1)
            $('#biselado').prop("checked", true);

          if (data.estenciladoid!==null){
            $('#dataestenci').css('display', 'block');

            $('#estencilado').prop("checked", true);
            $('#largomaxest').val(data.largomaxest);
            $('#largominest').val(data.largominest);
            $('#nrocolada').val(data.coladaest);
            $('#medidaest').val(data.med);
            $('#costuraest').val(data.tipocosturaest);
            $('#normaest').val(data.tiponormaest);
            $('#obsest').val(data.observaeste);

          }
          else{
            $('#dataestenci').css('display', 'none');            
          }

          $('#durezamax').val(data.durezaMaxima);
          $('#durezamin').val(data.durezaMinima);
          $('#tipoacero').val(data.tipoAcero);
          $('#certificado').val(data.certificadoid);
          $('#rugosidad').val(data.rugosidad);

          $('#flecha').val(data.flecha);

          if (data.pestaniado == 1)
            $('#pestanado').prop("checked", true);

          if (data.aplastado == 1)
            $('#aplastado').prop("checked", true);

          $('#obsprod').val(data.observacionProduccion);

          var pmetro = 0;
          var pkilo = 0;

          if (data.precioMetro == ""){
              pmetro = Math.round(data.precioKilo * kgm,2);
              pkilo = data.precioKilo;
          }
          else{
              pkilo = Math.round(data.precioMetro / kgm,2);
              pmetro = data.precioMetro;
          }
          var ppsado = precP(data.precioPasado);

          $('#condicion').text(data.condicionvta);
          $('#pkilo').text(pkilo);
          $('#pmetro').text(pmetro);
          $('#ppieza').text(data.precioPieza);
          $('#ppesado').text(ppsado);
          $('#tipomoneda').text(data.moneda);
          $('#pcontribucion').text(data.precioxContribucion);
          $('#p45').text(data.pesosx45);
          $('#obsventa').text(data.observacionVenta);


     }

     function precP(char){
         if (char=='k')
             return "KILOS";
         if (char=='m')
             return 'METROS';
         if (char=='p')
             return 'PIEZAS';
     }

     function kilogrametro($de,$es){

         var data = ($de-$es)*$es*0.0246;
         return data.toFixed(3);

     }

     function convertirFechaAFormato(fecha_recibida)
         {
           var nuevafecha = fecha_recibida.split("-");
           nuevafecha  = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
           return nuevafecha;
         }

    }

    $('#send_put').on('click', function(){
      var obj = objorden();
      PutOrden(obj);
    });

    function objorden(){
      var obj = {};
      obj.action = "M";
      obj.nroorden = $('#nroorden').val();
      obj.estado = $('#estadoop').val();
      obj.cliente = $('#clienteid').val();
      obj.fecha = $('#fechapedido').val();
      obj.fechaRun = $('#fechainicio').val();
      obj.fechaprom = $('#fechaprometida').val();
      obj.reventa = $('#reventa').val();
      obj.tipocostura = $('#costura').val();
      obj.tipoacero = $('#tipoacero').val();
      obj.forma = $('#forma').val();
      obj.urgente = $('#urgente').is(":checked") ? 1 : 0;
      obj.critico = $('#critico').is(":checked") ? 1 : 0;
      obj.estencilado = $('#estencilado').is(":checked") ? 1 : 0;
      obj.idmedi = $('#idmedi').val();
      obj.diamExtNom = $('#diamex').val();
      obj.espesorNom = $('#espesor').val();
      obj.espesorMax = $('#espesormax').val();
      obj.espesorMin = $('#espesormin').val();
      obj.largoMin = $('#multiplomin').val();
      obj.largoMax = $('#multiplomax').val();
      obj.diamExtMax = $('#diamexmax').val();
      obj.diamExtMin = $('#diamexmin').val();
      obj.diamIntNom = $('#diamein').val();
      obj.diamIntMax = $('#diameinmax').val();
      obj.diamIntMin = $('#diameinmin').val();
      obj.largoMaxEn = $('#largomax').val();
      obj.largoMinEn = $('#largomin').val();
      obj.tiponorma = $('#norma').val();
      obj.lugar = $('#lugar').val();
      obj.versionAnt = $('#version').val();
      obj.new = 1;
      obj.idCoti = idcot;
      obj.idOrden = "{{$NRO_ORDEN}}";
      obj.tipoembalaje = $('#embalaje').val();
      obj.durezaMax = $('#durezamax').val();
      obj.durezaMin = $('#durezamin').val();
      obj.biselado = $('#biselado').is(":checked") ? 1 : 0;
      obj.tiporev = $('#reventa').val();
      obj.kilosv = $('#kilosv').val();
      obj.metrosv = $('#metrosv').val();
      obj.piezas = $('#piezasv').val();
      obj.kgmetro = $('#kgm').val();
      obj.uso = $('#uso').val();
      obj.observacionesPro = $('#obsprod').val();
      obj.numerooc = $('#nroorden').val();
      obj.flecha = $('#flecha').val();
      obj.tratamiento = $('#tratamiento').val();
      obj.ensayoexpansion = $('#ensayo').val();
      obj.rugosidad = $('#rugosidad').val();
      obj.pestanado = $('#pestanado').is(":checked") ? 1 : 0;
      obj.aplastado = $('#aplastado').is(":checked") ? 1 : 0;
      obj.certificado = $('#certificado').val();
      obj.codigoPieza = $('#codigo').val();
      //estencilado//
      obj.largoMinEst = $('#largominest').val();
      obj.largoMaxEst = $('#largomaxest').val();
      obj.tiponormaest = $('#normaest').val();
      obj.numeroColada = $('#nrocolada').val();
      obj.med = $('#medidaest').val();
      obj.tipocosturaest = $('#costuraest').val();
      obj.observaeste = $('#obsest').val();
      obj.estenciladoid = $('#esteid').val();
      obj.idverOP = "{{$versionid}}";
      return obj;
    }

    function PutOrden(obj){
      $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        $.ajax({  
          type: "POST",
          url: "{{route('procesarProduccion')}}",
          data: obj,
          beforeSend: function() {
            
          },
          success: function(data){
            location.href = "{{route('indexcotizacion')}}";
            $('#modal-guardar').modal('hide');             
          }
        });
    }

    $('#estencilado').on('click', function(){
      if($(this).prop('checked')){
        $('#dataestenci').fadeIn();
      }
      else{
        $('#dataestenci').fadeOut();
      }
    });


  function thisForm(){
    var valid = true;
    var cont=0;

    var fecha1=$("#fechapedido").val();
    var fecha2=$("#fechaprometida").val();
    var fecha3=$("#fechainicio").val();

    if ((fecha3!="" && $("#fechainicio").length>0) && fecha2!=""){
        
        alertToast("No puede cargar fecha de inicio y prometida simultaneamente", "red");
        return false;
        
    }

    f2=new Date(fechaMMDDAAAA(fecha2));
    f3=new Date(fechaMMDDAAAA(fecha3));

    if (f2<f3 ) {
        alertToast("Le fecha de inicio no puede ser mayor que la de entrega", "red");
        return false;
    }

    return valid;
  }

  function fechaMMDDAAAA(fe) {

    return fe.replace(/^(\d{2})\/(\d{2})\/(\d{4})$/, "$2/$1/$3");

  }


  $('#procesar').on('click', function(){
    var valid = thisForm();
    if(valid)
      $('#modal-guardar').modal('show');     
  });



  function alertToast(textAlert="", colorAlert="green"){
    $.toast({ 
      text : textAlert, 
      showHideTransition : 'slide',  
      bgColor : colorAlert,              
      textColor : '#eee',            
      allowToastClose : false,     
      hideAfter : 5000,              
      stack : 5,                    
      textAlign : 'left',            
      position : 'top-right'       
    });    
  }

});
</script>
@endsection