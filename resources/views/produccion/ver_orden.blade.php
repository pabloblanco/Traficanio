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
                <div class="col-md-12 col-sm-12 col-xs-12 ">
                  <span><strong>Orden De Producción Nº: {{$resultado->id}}</strong></span>
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
                          <input type="text" id="orden" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Estado</label>
                          <select id="estadocotid" class="form-control" disabled="">
                            
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Cliente</label>
                          <select id="clienteid" class="form-control" disabled="">
                            
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12" id="fpedi">
                        <label class="control-label" for="first-name">Fecha De Pedido</label>
                        <div class="form-group">
                          <div class='input-group date' id='myDatepicker13'>
                            <input type='text' id="fechapedido" class="form-control" />
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
                            <input type='text' id="fechainicio" class="form-control" />
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
                            <input type='text' id="fechaprometida" class="form-control" />
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
                        <select id="reventaid" class="form-control">
                        </select>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Forma</label>
                        <select id="formaid" class="form-control">
                        </select>
                      </div>
                    </div><br>
                    <div  class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Urgente
                          <input type="checkbox" id="urgente">
                          <span class="check"></span>
                        </label>
                        <label class="checkbox">Crítico
                          <input type="checkbox" id="critico">
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
                      <input type="text" id="diamex" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Ext. Mínimo</label>
                      <input type="text" id="diamexmin" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Ext. Máximo</label>
                      <input type="text" id="diamexmax" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Int. Nominal</label>
                      <input type="text" id="diamein" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Int. Mínimo</label>
                      <input type="text" id="diameinmin" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Diámetro Int. Máximo</label>
                      <input type="text" id="diameinmax" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Espesor Ext. Nominal (mm)</label>
                      <input type="text" id="espesor" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Espesor Ext. Mínimo (mm)</label>
                      <input type="text" id="espesormin" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Espesor Ext. Máximo (mm)</label>
                      <input type="text" id="espesormax" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Largo multiplo mín(mm)</label>
                      <input type="text" id="largomin" placeholder="" class="form-control col-md-7 col-xs-12 largo">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Largo multiplo máx (mm)</label>
                      <input type="text" id="largomax" placeholder="" class="form-control col-md-7 col-xs-12 largo">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Largo mín. entrega (mm)</label>
                      <input type="text" id="largominen" placeholder="" class="form-control col-md-7 col-xs-12 largo">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Largo máx. entrega (mm)</label>
                      <input type="text" id="largomaxen" placeholder="" class="form-control col-md-7 col-xs-12 largo">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Tratamiento T</label>
                      <select id="tratamientoid" class="form-control">
                      </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <label class="control-label" for="first-name">Ensayo de expansión(mm)</label>
                      <input type="text" id="ensayoexp" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Tipo de costura</label>
                      <select id="costuraid" class="form-control">
                        
                      </select>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Norma</label>
                      <select id="normaid" class="form-control">
                        
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
                      <select id="lugarid" class="form-control">
                        
                      </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Uso</label>
                      <select id="usoid" class="form-control">
                        
                      </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Embalaje</label>
                      <select id="embalajeid" class="form-control">
                        
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Código del Material</label>
                      <input type="text" id="codigop" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Kilos</label>
                      <input type="text" id="kilos" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Piezas</label>
                      <input type="text" id="piezas" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Metros</label>
                      <input type="text" id="metros" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Kg/M</label>
                      <input type="text" id="kilogrametro" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="checkbox">Biscelado
                        <input type="checkbox" id="bicelado">
                        <span class="check"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Estencilado
                        <input type="checkbox" id="checkeste">
                        <span class="check"></span>
                      </label>
                    </div>
                  </div>
                  <div class="este">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Largo Máx.</label>
                        <input type="text" id="largoma" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Largo Mín.</label>
                        <input type="text" id="largomi" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Nº de Colada</label>
                        <input type="text" id="colada" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Medida</label>
                        <input type="text" id="namemedida" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tipo De Costura</label>
                        <select id="costuraest" class="form-control">
                        
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Norma</label>
                        <select id="normaest" class="form-control">
                        
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <label class="control-label" for="first-name">Observaciones</label>
                          <textarea class="text-area" name="" id="" ></textarea>
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
                        <input type="text" id="durezamin" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Dureza máxima (HRB)</label>
                        <input type="text" id="durezamax" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tipo de Acero</label>
                        <select id="aceroid" class="form-control">
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Certificado</label>
                        <select id="certificadoid" class="form-control">
                          
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Rugosidad</label>
                        <input type="text" id="rugosidad" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                        <input type="text" id="flecha" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="checkbox">Pestañado
                        <input type="checkbox" id="pesta">
                        <span class="check"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Aplastado
                        <input type="checkbox" id="aplas">
                        <span class="check"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <label class="control-label" for="first-name">Observaciones</label>
                        <textarea class="text-area" id="observacionVenta" ></textarea>
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
                        <span id="condicionvta"></span>
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
                      <span id="ppesado">Por Metros</span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                  </div><div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="checkbox">Tipo De Moneda:
                      <span id="tmoneda">Dólar</span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="checkbox">Precio Contribución:
                      <span></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="checkbox">Observaciones:
                      <span></span>
                    </label>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
                  <div class="col-md-1">
                    <button type="button" class="btn btn-primary btn-sm" id="procesar">Guardar</button>
                  </div>
                  <div class="col-md-1">
                    <button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Cancelar</button>
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
<input type="hidden" id="datacoti" value="{{$resobj}}">
<input type="hidden" id="estado_orden" value="{{$estado_orden}}">
<input type="hidden" id="nro" value="">
<input type="hidden" id="idmedi" value="">
<input type="hidden" id="esteid" value="">
<input type="hidden" id="version" value="">
<input type="hidden" id="kilosv" value="">
<input type="hidden" id="metrosv" value="">
<input type="hidden" id="piezasv" value="">
<input type="hidden" id="ordenProduccion" value="">
<input type="hidden" id="idverop" value="">
<input type="hidden" id="idCoti" value="">
<input type="hidden" id="fechaRunOld" value="">
<input type="hidden" id="fechapromOld" value="">

@endsection

@section('js_extra')
<script type="text/javascript">
$(function(){

  function fechaMMDDAAAA(fe) {

    return fe.replace(/^(\d{2})\/(\d{2})\/(\d{4})$/, "$2/$1/$3");

  }

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

  function cargaestencilado(id){
    if (id == null || id == ""){
      $('div.este').fadeOut();
    }
    else{
      $('#checkeste').prop("checked", true);
    }
  }

  $('#checkeste').on('click', function(){
    var check = $(this).prop("checked");
    if (check){
      $('div.este').fadeIn();
    }
    else{
      $('div.este').fadeOut();
    }
  });

  function cargarselectores(cliente, estado, forma, reventa, tratamiento, embalaje, uso, costura, norma, entrega, costuraest, normaest, acero, certificado){

    $.ajax({  
      type: "get",
      url: "{{route('selectores')}}",
      success: function(data){

        var clientes = data.clientes;
        var estados = data.estados;
        var reventas = data.reventas;
        var formas = data.formas;
        var tratamientos = data.tratamientos;
        var embalajes = data.embalajes;
        var usos = data.usos;
        var costuras = data.costuras;
        var normas = data.normas;
        var entregas = data.entregas;
        var aceros = data.aceros;
        var certificados = data.certificados;


        $('#clienteid').append('<option></option>');
        $('#estadocotid').append('<option></option>');
        $('#formaid').append('<option></option>');
        $('#reventaid').append('<option></option>');
        $('#tratamientoid').append('<option></option>');
        $('#embalajeid').append('<option></option>');
        $('#usoid').append('<option></option>');
        $('#costuraid').append('<option></option>');
        $('#normaid').append('<option></option>');
        $('#lugarid').append('<option></option>');
        $('#costuraest').append('<option></option>');
        $('#normaest').append('<option></option>');
        $('#aceroid').append('<option></option>');
        $('#certificadoid').append('<option></option>');

        for (var i = 0; i < clientes.length; i++) {
          var e = clientes[i];
          var id = e.id;
          var desc = e.razon;
          if (cliente !== null && cliente == id){
            var tr = `
              <option value="${id}" selected>${desc}</option>
            `;
          }
          else{
            var tr = `
              <option value="${id}">${desc}</option>
            `;            
          }

          $('#clienteid').append(tr);
        }

        for (var i = 0; i < estados.length; i++) {
          var e = estados[i];
          var id = e.id;
          var desc = e.descripcion;
          var tr = `
            <option value="${id}">${desc}</option>
          `;            
          $('#estadocotid').append(tr);
        }

        $('#estadocotid').val(estado);

        for (var i = 0; i < formas.length; i++) {
          var e = formas[i];
          var id = e.id;
          var desc = e.descripcion;
          if (forma !== null && forma == id){
            var tr = `
              <option value="${id}" selected>${desc}</option>
            `;


          }
          else{
            var tr = `
              <option value="${id}">${desc}</option>
            `;            
          }

          $('#formaid').append(tr);
        }

        for (var i = 0; i < reventas.length; i++) {
          var e = reventas[i];
          var id = e.id;
          var desc = e.descripcion;
          if (reventa !== null && reventa == id){
            var tr = `
              <option value="${id}" selected>${desc}</option>
            `;


          }
          else{
            var tr = `
              <option value="${id}">${desc}</option>
            `;            
          }

          $('#reventaid').append(tr);
        }

        for (var i = 0; i < tratamientos.length; i++) {
          var e = tratamientos[i];
          var id = e.id;
          var desc = e.descripcion;
          if (tratamiento !== null && tratamiento == id){
            var tr = `
              <option value="${id}" selected>${desc}</option>
            `;


          }
          else{
            var tr = `
              <option value="${id}">${desc}</option>
            `;            
          }

          $('#tratamientoid').append(tr);
        }

        for (var i = 0; i < embalajes.length; i++) {
          var e = embalajes[i];
          var id = e.id;
          var desc = e.descripcion;
          if (embalaje > 0 && embalaje == id){
            var tr = `
              <option value="${id}" selected>${desc}</option>
            `;


          }
          else{
            var tr = `
              <option value="${id}">${desc}</option>
            `;            
          }

          $('#embalajeid').append(tr);
        }

        for (var i = 0; i < usos.length; i++) {
          var e = usos[i];
          var id = e.id;
          var desc = e.descripcion;
          if (uso > 0 && uso == id){
            var tr = `
              <option value="${id}" selected>${desc}</option>
            `;


          }
          else{
            var tr = `
              <option value="${id}">${desc}</option>
            `;            
          }

          $('#usoid').append(tr);
        }

        for (var i = 0; i < costuras.length; i++) {
          var e = costuras[i];
          var id = e.id;
          var desc = e.descripcion;
          if (costura > 0 && costura == id){
            var tr = `
              <option value="${id}" selected>${desc}</option>
            `;


          }
          else{
            var tr = `
              <option value="${id}">${desc}</option>
            `;            
          }

          $('#costuraid').append(tr);
        }

        for (var i = 0; i < normas.length; i++) {
          var e = normas[i];
          var id = e.id;
          var desc = e.descripcion;
          if (norma !== null && norma == id){
            var tr = `
              <option value="${id}" selected>${desc}</option>
            `;


          }
          else{
            var tr = `
              <option value="${id}">${desc}</option>
            `;            
          }

          $('#normaid').append(tr);
        }

        for (var i = 0; i < entregas.length; i++) {
          var e = entregas[i];
          var id = e.id;
          var desc = e.direccion;
          var tr = `
              <option value="${id}">${desc}</option>
            `;            

          $('#lugarid').append(tr);
        }

        if (entrega)
          $('#lugarid').val(entrega);

        for (var i = 0; i < costuras.length; i++) {
          var e = costuras[i];
          var id = e.id;
          var desc = e.descripcion;
          var tr = `
            <option value="${id}">${desc}</option>
          `;            

          $('#costuraest').append(tr);
        }

        $('#costuraest').val(costuraest);

        for (var i = 0; i < normas.length; i++) {
          var e = normas[i];
          var id = e.id;
          var desc = e.descripcion;
          var tr = `
            <option value="${id}">${desc}</option>
          `;            

          $('#normaest').append(tr);
        }
        $('#normaest').val(normaest);

        for (var i = 0; i < aceros.length; i++) {
          var e = aceros[i];
          var id = e.id;
          var desc = e.descripcion;
          var tr = `
            <option value="${id}">${desc}</option>
          `;            

          $('#aceroid').append(tr);
        }

        $('#aceroid').eq(0).val(acero);

        for (var i = 0; i < certificados.length; i++) {
          var e = certificados[i];
          var id = e.id;
          var desc = e.descripcion;
          if (certificado !== null && certificado == id){
            var tr = `
              <option value="${id}" selected>${desc}</option>
            `;


          }
          else{
            var tr = `
              <option value="${id}">${desc}</option>
            `;            
          }

          $('#certificadoid').append(tr);
        }

      }
    });

    return true;
  }

  var now = "{{$now}}";

  function validar_fecha(fecha,vacio=false){

          if (fecha=="" || fecha==null)
            return vacio;

          var a = $.trim(fecha);

          var date = a.split("-");
          return (($.isNumeric(date[0]) && $.isNumeric(date[1]) && $.isNumeric(date[2])));
      } 



  function cargarcotizacion(){
    var e = JSON.parse($('#datacoti').val());
    console.log('cotizacion',e);
    ///////////////////////////////////////////////////
    $('#esteid').val(e.estenciladoid);
    $('#idmedi').val(e.medid);
    $('#version').val(e.version);
    $('#kilosv').val(e.kilos);
    $('#metrosv').val(e.metros);
    $('#piezasv').val(e.piezas);
    $('#idverop').val(e.idverop);
    $('#ordenProduccion').val(e.ordenProduccion);
    $('#idCoti').val(e.idCoti);
    $('#fechaRunOld').val(e.fechaInicio);
    $('#fechapromOld').val(e.fechaPrometida);

    cargaestencilado(e.estenciladoid);
    var orden = $('#orden').val(e.ordenCompra);

    var fechapedido = e.fechaPedido==null ? FechaAFormato(now) : FechaAFormato(e.fechaPedido);
    var fechaprometida = validar_fecha(e.fechaPrometida)?FechaAFormato(e.fechaPrometida):"";

    $('#fechapedido').val(fechapedido);
    $('#fechaprometida').val(fechaprometida);

    // if (e.fechaPedido)
    //   var fechapedido = $('#fechapedido').val(FechaAFormato(e.fechaPedido));

    if(e.est == 1 || e.est==2){
      $('#fpedi').css('display', 'block');
      var fechainicio = FechaAFormato(e.fechaInicio);
      $('#fechainicio').val(fechainicio);
    }
    else{
      $('#fpedi').css('display', 'none');
    }

    //if (e.fechaInicio)
      //var fechainicio = $('#fechainicio').val(FechaAFormato(e.fechaInicio));


    //$fprom = (validar_fecha(fechaphp($row['fechaPrometida'])))?fechaphp($row['fechaPrometida']):"";


    //if (e.fechaPrometida)
      //var fechaprometida = $('#fechaprometida').val(FechaAFormato(e.fechaPrometida));

    $('#')

    if (e.urgente > 0)
      var urgente = $('#urgente').prop('checked', true);

    var diamex = $('#diamex').val(e.diametroExteriorNominal);
    var diamex = $('#diamex').val(e.diametroExteriorNominal);
    var diamexmin = $('#diamexmin').val(e.diametroExteriorMinimo);
    var diamexmax = $('#diamexmax').val(e.diametroExteriorMaximo);
    var diamein = $('#diamein').val(e.diametroInteriorMinimo);
    var diameinmin = $('#diameinmin').val(e.diametroInteriorMinimo);
    var diameinmax = $('#diameinmax').val(e.diametroInteriorMaximo);
    var espesor = $('#espesor').val(e.espesorNominal);
    var espesormin = $('#espesormin').val(e.espesorMinimo);
    var espesormax = $('#espesormax').val(e.espesorMaximo);
    var largomin = $('#largomin').val(e.largoMinimo);
    var largomax = $('#largomax').val(e.largoMaximo);
    var largomaxen = $('#largomaxen').val(e.largoMaxEntrega);
    var largominen = $('#largominen').val(e.largoMinEntrega);
    var ensayoexp = $('#ensayoexp').val(e.ensayoExpansion);
    var codigop = $('#codigop').val(e.codigoPieza);
    var kilos = $('#kilos').val(e.kilos);
    var piezas = $('#piezas').val(e.metros);
    var piezas = $('#metros').val(e.piezas); 
    var kilogrametro = $('#kilogrametro').val(e.kilogrametro);
    var largoma = $('#largoma').val(e.largomaxest);
    var largomi = $('#largomi').val(e.largominest);
    var colada = $('#colada').val(e.numeroColada);
    var namemedida = $('#namemedida').val(e.medida); 
    var costuraest = $('#costuraest').val(e.tipocosturaest); 
    var observaciones = $('#observaciones').text(e.observaeste);
    var durezamin = $('#durezamin').val(e.durezaMinima);
    var durezamax = $('#durezamax').val(e.durezaMaxima);
    var rugosidad = $('#rugosidad').val(e.rugosidad);
    var flecha = $('#flecha').val(e.flecha);
    

    if (e.aplastado > 0)
      var aplastado = $('#aplas').prop('checked', true);

    if (e.pestaniado > 0)
      var pestanado = $('#pesta').prop('checked', true);

    var observacionVenta = $('#observacionVenta').text(e.observacionProduccion);

    var condicionvta = e.condicionvta;
    $('#condicionvta').append(condicionvta);

    var precioMetro = e.precioMetro;
    $('#pmetro').append(precioMetro);

    var precioKilo = e.precioKilo;
    $('#pkilo').append(precioKilo);

    var precioPieza = e.precioPieza;
    $('#ppieza').append(precioPieza);

    var estado_o = $('#estado_orden').val();

    cargarselectores(e.clienteid, estado_o, e.formaid, e.tipoReventa, e.tratamientoTermico, e.tipoEmbalaje, e.uso, e.costuraid, e.normaid, e.lugarEntrega, e.tipocosturaest, e.tiponormaest, e.tipoAcero, e.certificadoid);

    return;
    
  }

  cargarcotizacion();

  function FechaAFormato(fecha_recibida)
  {
    var nuevafecha = fecha_recibida.split("-");
    nuevafecha  = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
    return nuevafecha;
  }
  
  $('#procesar').on('click', function(){
    var valid = thisForm();
    if(valid)
      $('#modal-guardar').modal('show');     
  });

  $(document).on('click', '#send_put', function(){
    var obj = objorden();
    PutOrden(obj);
  });

  function objorden(){
      var obj = {};
      //HIDDEN//
      obj.idmedi = $('#idmedi').val();
      obj.estenciladoid = $('#esteid').val();
      obj.versionAnt = $('#version').val();
      obj.kilosv = $('#kilos').val();
      obj.metrosv = $('#metrosv').val();
      obj.piezas = $('#piezasv').val();
      obj.idverOP = $('#idverop').val();
      obj.idOrden = $('#ordenProduccion').val();
      //END HIDDEN //
      obj.action = "M";
      obj.estado = $('#estadocotid').val();
      obj.cliente = $('#clienteid').val();
      obj.fecha = $('#fechapedido').val();
      obj.fechaRun = $('#fechainicio').val();
      obj.fechaprom = $('#fechaprometida').val();
      obj.fechaRunOld = $('#fechaRunOld').val();
      obj.reventa = $('#reventaid').val();
      obj.tipocostura = $('#costuraid').val();
      obj.tipoacero = $('#aceroid').val();
      obj.forma = $('#formaid').val();
      obj.urgente = $('#urgente').is(":checked") ? 1 : 0;
      obj.critico = $('#critico').is(":checked") ? 1 : 0;
      obj.estencilado = $('#checkeste').is(":checked") ? 1 : 0;
      obj.diamExtNom = $('#diamex').val();
      obj.espesorNom = $('#espesor').val();
      obj.espesorMax = $('#espesormax').val();
      obj.espesorMin = $('#espesormin').val();
      obj.largoMin = $('#largomin').val();
      obj.largoMax = $('#largomax').val();
      obj.diamExtMax = $('#diamexmax').val();
      obj.diamExtMin = $('#diamexmin').val();
      obj.diamIntNom = $('#diamein').val();
      obj.diamIntMax = $('#diameinmax').val();
      obj.diamIntMin = $('#diameinmin').val();
      obj.largoMaxEn = $('#largomaxen').val();
      obj.largoMinEn = $('#largominen').val();
      obj.tiponorma = $('#normaid').val();
      obj.lugar = $('#lugarid').val();
      obj.new = 0;
      obj.idCoti = $('#idCoti').val();
      obj.tipoembalaje = $('#embalajeid').val();
      obj.durezaMax = $('#durezamax').val();
      obj.durezaMin = $('#durezamin').val();
      obj.biselado = $('#bicelado').is(":checked") ? 1 : 0;
      obj.tiporev = $('#reventaid').val();
      obj.kgmetro = $('#kilogrametro').val();
      obj.uso = $('#usoid').val();
      obj.observacionesPro = $('#observacionVenta').val();
      obj.numerooc = $('#orden').val();
      obj.flecha = $('#flecha').val();
      obj.tratamiento = $('#tratamientoid').val();
      obj.ensayoexpansion = $('#ensayoexp').val();
      obj.rugosidad = $('#rugosidad').val();
      obj.pestanado = $('#pesta').is(":checked") ? 1 : 0;
      obj.aplastado = $('#aplas').is(":checked") ? 1 : 0;
      obj.certificado = $('#certificadoid').val();
      obj.codigoPieza = $('#codigop').val();
      //estencilado//
      obj.largoMinEst = $('#largomi').val();
      obj.largoMaxEst = $('#largoma').val();
      obj.tiponormaest = $('#normaest').val();
      obj.numeroColada = $('#colada').val();
      obj.med = $('#medidaest').val();
      obj.tipocosturaest = $('#costuraest').val();
      obj.observaeste = $('#obsest').val();
      obj.fechapromOld = $('#fechapromOld').val();
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
            $('#modal-guardar').modal('hide');
            //location.href = "{{route('indexcotizacion')}}";

          }
        });
    }

});
</script> 
@endsection