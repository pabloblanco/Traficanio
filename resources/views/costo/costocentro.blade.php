@extends('layouts.app')

@section('content')

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
                    <div class="row">
                      <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Ingresar La Fecha</label>
                          <div class="form-group">
                            <div class='input-group date' id='myDatepicker3'>
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

                      <button id="buscarcosto2" class="btn btn-primary  btn-sm">Buscar</button>
                      <button id="limpiarbusqueda2" class="btn btn-success  btn-sm">Limpiar</button>
                    </div>
                  </div>
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
              <h2>Administrar Costos Por Centro</h2>
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

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Ingresar La Fecha</label>
                      <div class="form-group">
                        <div class='input-group date' id='myDatepicker2'>
                          <input id="datebuscar" type='text' class="form-control" />
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
               <br>
               <br>

                  <button id="buscarcosto" class="btn btn-primary  btn-sm">Buscar</button>
                  <button id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</button>
                </div>
              </div>
              <div class="ln_solid"></div>
            <!-- <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="">
                <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-ver">Ver Costo por centro</button>
              </li>
            </ul> -->
            <br>
            <br>
            <div class="clearfix"></div>
            <div class="col-md-12">

              <div class="x_title">
                <h2>Datos Generales<small>Sessions</small></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <input type="hidden" name="fechaobj" id="fechaobj">
                <input type="hidden" name="idcosto" id="idcosto">


                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Oper/Hora</label>
                        <input type="text" id="Operhora" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Cantidad de Gas por mes</label>
                        <input type="text" id="GasCantidad" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Gas/Mes</label>
                        <input type="text" id="GasMes" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Gas/m<sup>3</sup></label>
                        <input type="text" id="Gasm3" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="x_title">
                <h2>Transporte</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">


                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Mes</label>
                        <input type="text" id="TransporteMes" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tons/Mes</label>
                        <input type="text" id="TransporteTonsMes" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Coeficiente</label>
                        <input type="text" id="TransporteCoeficiente" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>

              </div>
              <div class="x_title">
                <h2>Horno</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">


                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Cantidad Oper.</label>
                        <input type="text" id="HornoCantOper" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Horas Trabajadas</label>
                        <input type="text" id="HornoHsTrabajadas" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Coeficiente</label>
                        <input type="text" id="HornoCoeficiente" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">m<sup>3</sup></label>
                        <input type="text" id="Hornom3ton" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tons/Mes</label>
                        <input type="text" id="HornoTon" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tons (MOD)</label>
                        <input type="text" id="HornotonsMOD" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="x_title">
                <h2>Bateas</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Cantidad Oper.</label>
                        <input type="text" id="BateaCantOper" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Horas Trabajdas</label>
                        <input type="text" id="BateaHsTrabajadas" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Coeficiente</label>
                        <input type="text" id="BateaCoeficiente" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Consumos.</label>
                        <input type="text" id="BateaConsumos" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">m<sup>3</sup></label>
                        <input type="text" id="Bateam3ton" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tons/Mes</label>
                        <input type="text" id="BateaTon" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="x_title">
                <h2>Trefila y Punta</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Gastos Varios</label>
                        <input type="text" id="TYPGastosvarios" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Horas Trefila</label>
                        <input type="text" id="TYPHsTrefila" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Coeficiente</label>
                        <input type="text" id="TYPCoeficiente" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tons. Trefila</label>
                        <input type="text" id="TYPTonTrefila" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Horas Punta</label>
                        <input type="text" id="TYPHsPunta" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tons Punta</label>
                        <input type="text" id="TYPTonPunta" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
              </div>

              <div class="x_title">
                <h2>Enderezado</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Horas Trabajdas</label>
                        <input type="text" id="EnderezadoHsEnderezado" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tons/Mes</label>
                        <input type="text" id="EnderezadoTonEnderezado" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Coeficiente</label>
                        <input type="text" id="EnderezadoCoeficiente" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>

              </div>

              <div class="x_title">
                <h2>Corte</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Horas Trabajdas</label>
                        <input type="text" id="CorteHsTrabajadas" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Kg/mts</label>
                        <input type="text" id="CorteKGmts" class="form-control col-md-7 col-xs-12">
                      </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Cantidad de tubos</label>
                        <input type="text" id="CorteCantTubos" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name"> Coeficiente</label>
                        <input type="text" id="CorteCoeficiente" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="x_title">
                <h2>Servicios -<small>Zincador</small></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tons/Mes</label>
                        <input type="text" id="ZincadorTonsMes" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Zincador</label>
                        <input type="text" id="Zincador" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Coeficiente</label>
                        <input type="text" id="ZincadorCoeficiente" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>

              </div>
              <div class="x_title">
                <h2>Servicios -<small>Cortador</small></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Tons/Mes</label>
                        <input type="text" id="PrecioCortador" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Cortador</label>
                        <input type="text" id="ToneladasCortador" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Coeficiente</label>
                        <input type="text" id="CoeficienteCortador" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-delete">Cancelar</button>
                    <button id="addcosto" class="btn btn-primary">Guardar</button>
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
  $(document).ready(function(){
    function changeOperHora(){
        changeGas();
        changeHorno();
        changeBatea();
        changeTP();
        changeEnderezado();
        changeCorte();

    }
    /////// EVENT ON CHANGE INPUT /////////
    $("#Operhora").on("change", changeOperHora);
    $("#GasCantidad").on("change", changeGas);
    $("#GasMes").on("change", changeGas);
    $("#HornoHsTrabajadas").on("change", changeHorno);
    $("#HornoCantOper").on("change", changeHorno);
    $("#Hornom3ton").on("change", changeHorno);
    $("#BateaCantOper").on("change", changeBatea);
    $("#BateaHsTrabajadas").on("change", changeBatea);
    $("#BateaConsumos").on("change", changeBatea);
    $("#Bateam3ton").on("change", changeBatea);
    $("#TYPGastosvarios").on("change", changeTP);
    $("#TYPHsTrefila").on("change", changeTP);
    $("#TYPHsPunta").on("change", changeTP);
    $("#EnderezadoHsEnderezado").on("change", changeEnderezado);
    $("#CorteHsTrabajadas").on("change", changeCorte);
    $("#CorteKGmts").on("change", changeCorte);
    $("#CorteCantTubos").on("change", changeCorte);
    $("#TransporteMes").on("change", changeTrans);
    $("#ZincadorTonsMes").on("change", changeSerZ);
    $("#Zincador").on("change", changeSerZ);
    $("#PrecioCortador").on("change", changeSerC);
    $("#ToneladasCortador").on("change", changeSerC);
    //////////// END EVENT ON CHANGE ////////////

    /////////////// METODOS CHANGE INPUT ///////////////
    function changeGas(){
        gas = ($("#GasMes").val())/$("#GasCantidad").val();
        if(isNaN(gas) || !(isFinite(gas))){
            $("#Gasm3").val('');
        }else{
            $("#Gasm3").val(gas.toFixed(3));
        }
        changeHorno();
        changeBatea();
    }

    function changeHorno(){
        tonMod = ((($("#Operhora").val())*($("#HornoCantOper").val())*($("#HornoHsTrabajadas").val()))/($("#HornoTon").val()));
        if(isNaN(tonMod) || !(isFinite(tonMod))){
            $("#HornotonsMOD").val('');
        }else{
            $("#HornotonsMOD").val(tonMod.toFixed(3));
        }

        coeficienteH = ((($("#Gasm3").val())*($("#Hornom3ton").val()))+parseFloat($("#HornotonsMOD").val()));
        if(isNaN(coeficienteH) || !(isFinite(coeficienteH))){
            $("#HornoCoeficiente").val('');
        }else{
            $("#HornoCoeficiente").val(coeficienteH.toFixed(3));
        }

    }

    function changeBatea(){

        par1 = (($("#Bateam3ton").val()) * $("#Gasm3").val());
        par2 = (($("#BateaCantOper").val()) * ($("#BateaHsTrabajadas").val()) * ($("#Operhora").val()));
        coeficienteB = ((parseFloat($("#BateaConsumos").val()) + parseFloat(par1) + parseFloat(par2) )/$("#BateaTon").val());
        if(isNaN(coeficienteB) || !(isFinite(coeficienteB))){
            $("#BateaCoeficiente").val('');
        }else{
            $("#BateaCoeficiente").val(coeficienteB.toFixed(3));
        }

    }

    function changeTP(){
        parP = ((($("#TYPHsPunta").val()) * $("#Operhora").val())/$("#TYPTonPunta").val());
        parT = (((($("#TYPHsTrefila").val()) * $("#Operhora").val()) + parseFloat($("#gastosTP").val()))/$("#TYPTonTrefila").val());
        coeficienteTP = (parseFloat(parP) + parseFloat(parT));
        if(isNaN(coeficienteTP) || !(isFinite(coeficienteTP))){
            $("#TYPCoeficiente").val('');
        }else{
            $("#TYPCoeficiente").val(coeficienteTP.toFixed(3));
        }

    }

    function changeEnderezado(){
        coeficienteE = ((($("#EnderezadoHsEnderezado").val()) * $("#Operhora").val())/$("#EnderezadoTonEnderezado").val());
        if(isNaN(coeficienteE) || !(isFinite(coeficienteE))){
            $("#EnderezadoCoeficiente").val('');
        }else{
            $("#EnderezadoCoeficiente").val(coeficienteE.toFixed(3));
        }

    }

    function changeCorte(){

        parc1 = (($("#CorteHsTrabajadas").val()) * $("#Operhora").val());
        parc2 = (($("#CorteKGmts").val()) * $("#CorteCantTubos").val());
        coeficienteC = (parc1/parc2);
        if(isNaN(coeficienteC) || !(isFinite(coeficienteC))){
            $("#CorteCoeficiente").val('');
        }else{
            $("#CorteCoeficiente").val(coeficienteC.toFixed(3));
        }

    }

    function changeTrans(){
        coeficienteTrans = ($("#TransporteMes").val()/$("#TransporteTonsMes").val());
        if(isNaN(coeficienteTrans) || !(isFinite(coeficienteTrans))){
            $("#TransporteCoeficiente").val('');
        }else{
            $("#TransporteCoeficiente").val(coeficienteTrans.toFixed(3));
        }

    }

    function changeSerZ(){
        coeficienteSerZ = ($("#ZincadorTonsMes").val()/$("#Zincador").val());
        if(isNaN(coeficienteSerZ) || !(isFinite(coeficienteSerZ))){
            $("#ZincadorCoeficiente").val('');
        }else{
            $("#ZincadorCoeficiente").val(coeficienteSerZ.toFixed(3));
        }

    }

    function changeSerC(){
        coeficienteSerC = ($("#PrecioCortador").val()/$("#ToneladasCortador").val());
        if(isNaN(coeficienteSerC) || !(isFinite(coeficienteSerC))){
            $("#CoeficienteCortador").val('');
        }else{
            $("#CoeficienteCortador").val(coeficienteSerC.toFixed(3));
        }

    }

    /////////////// END METODOS CHANGE INPUT ///////////////
    $("#limpiarbusqueda").on('click', function(){
      $("#datebuscar").val("");
    });

    ///////////////////////BUSCAR COSTO////////////////////////
    $("#buscarcosto").on('click', function(){
    function convertirFechaAFormato(fecha_recibida)
    {
      var nuevafecha = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[0]+"-"+nuevafecha[1];
      return nuevafecha;
    }
      var date = $("#datebuscar").val();

      var fechaConv = convertirFechaAFormato(date);

      $.ajax({
        type: "get",
        url: "{{route('buscarcostoporcentro')}}",
        data: {
          'fecha': fechaConv
        },
        success: function(data){
          if (data !== "false"){
            var arrayReturn = data.resultado;
            console.log(arrayReturn);
            $("#Operhora").val(arrayReturn.Operhora);
            $("#GasCantidad").val(arrayReturn.GasCantidad);
            $("#GasMes").val(arrayReturn.GasMes);
            $("#Gasm3").val(arrayReturn.Gasm3);
            $("#TransporteMes").val(arrayReturn.TransporteMes);
            $("#TransporteTonsMes").val(arrayReturn.TransporteTonsMes);
            $("#TransporteCoeficiente").val(arrayReturn.TransporteCoeficiente);
            $("#HornoCantOper").val(arrayReturn.HornoCantOper);
            $("#HornoHsTrabajadas").val(arrayReturn.HornoHsTrabajadas);
            $("#HornoCoeficiente").val(arrayReturn.HornoCoeficiente);
            $("#Hornom3ton").val(arrayReturn.Hornom3ton);
            $("#HornoTon").val(arrayReturn.HornoTon);
            $("#HornotonsMOD").val(arrayReturn.HornotonsMOD);
            $("#BateaCantOper").val(arrayReturn.BateaCantOper);
            $("#BateaHsTrabajadas").val(arrayReturn.BateaHsTrabajadas);
            $("#BateaCoeficiente").val(arrayReturn.BateaCoeficiente);
            $("#BateaConsumos").val(arrayReturn.BateaConsumos);
            $("#Bateam3ton").val(arrayReturn.Bateam3ton);
            $("#BateaTon").val(arrayReturn.BateaTon);
            $("#TYPGastosvarios").val(arrayReturn.TYPGastosvarios);
            $("#TYPHsTrefila").val(arrayReturn.TYPHsTrefila);
            $("#TYPCoeficiente").val(arrayReturn.TYPCoeficiente);
            $("#TYPTonTrefila").val(arrayReturn.TYPTonTrefila);
            $("#TYPHsPunta").val(arrayReturn.TYPHsPunta);
            $("#TYPTonPunta").val(arrayReturn.TYPTonPunta);
            $("#EnderezadoHsEnderezado").val(arrayReturn.EnderezadoHsEnderezado);
            $("#EnderezadoTonEnderezado").val(arrayReturn.EnderezadoTonEnderezado);
            $("#EnderezadoCoeficiente").val(arrayReturn.EnderezadoCoeficiente);
            $("#CorteHsTrabajadas").val(arrayReturn.CorteHsTrabajadas);
            $("#CorteKGmts").val(arrayReturn.CorteKGmts);
            $("#CorteCantTubos").val(arrayReturn.CorteCantTubos);
            $("#CorteCoeficiente").val(arrayReturn.CorteCoeficiente);
            $("#fechaobj").val(arrayReturn.Fecha);
            $("#idcosto").val(arrayReturn.id);
          }
          else {
            $.toast({
                text : "Costo no Encontrado", 
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

    $("#addcosto").on('click', function(){
      var fechacosto = $("#fechaobj").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({
        type: "post",
        url: "{{route('addcostoporcentro')}}",
        data: {
          'fecha': fechacosto,
          'Operhora': $("#Operhora").val(),
          'GasCantidad': $("#GasCantidad").val(),
          'GasMes': $("#GasMes").val(),
          'Gasm3': $("#Gasm3").val(),
          'TransporteMes': $("#TransporteMes").val(),
          'TransporteTonsMes': $("#TransporteTonsMes").val(),
          'TransporteCoeficiente': $("#TransporteCoeficiente").val(),
          'HornoCantOper': $("#HornoCantOper").val(),
          'HornoHsTrabajadas': $("#HornoHsTrabajadas").val(),
          'HornoCoeficiente': $("#HornoCoeficiente").val(),
          'Hornom3ton': $("#Hornom3ton").val(),
          'HornoTon': $("#HornoTon").val(),
          'HornotonsMOD': $("#HornotonsMOD").val(),
          'BateaCantOper': $("#BateaCantOper").val(),
          'BateaHsTrabajadas': $("#BateaHsTrabajadas").val(),
          'BateaCoeficiente' : $("#BateaCoeficiente").val(),
          'BateaConsumos': $("#BateaConsumos").val(),
          'Bateam3ton': $("#Bateam3ton").val(),
          'BateaTon': $("#BateaTon").val(),
          'TYPGastosvarios': $("#TYPGastosvarios").val(),
          'TYPHsTrefila': $("#TYPHsTrefila").val(),
          'TYPCoeficiente' : $("#TYPCoeficiente").val(),
          'TYPTonTrefila': $("#TYPTonTrefila").val(),
          'TYPHsPunta': $("#TYPHsPunta").val(),
          'TYPTonPunta': $("#TYPTonPunta").val(),
          'EnderezadoHsEnderezado': $("#EnderezadoHsEnderezado").val(),
          'EnderezadoTonEnderezado': $("#EnderezadoTonEnderezado").val(),
          'EnderezadoCoeficiente': $("#EnderezadoCoeficiente").val(),
          'CorteHsTrabajadas': $("#CorteHsTrabajadas").val(),
          'CorteKGmts': $("#CorteKGmts").val(),
          'CorteCantTubos': $("#CorteCantTubos").val(),
          'CorteCoeficiente': $("#CorteCoeficiente").val(),
          'ZincadorTonsMes': $("#ZincadorTonsMes").val(),
          'Zincador': $("#Zincador").val(),
          'ZincadorCoeficiente': $("#ZincadorCoeficiente").val(),
          'PrecioCortador': $("#PrecioCortador").val(),
          'ToneladasCortador': $("#ToneladasCortador").val(),
          'CoeficienteCortador': $("#CoeficienteCortador").val(),
          'id_costo': $('#idcosto').val()
        },
        success: function(data){
          if (data === "true"){
            location.reload();
          }
          else{
            alert("Error al Guardar Costos");
          }

        }

      });

    });

  });
</script>
@endsection
