@extends('layouts.app')

@section('content')

      <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-hidden="true" id="ccalidad">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Control de Calidad</h4>
            </div>
            <div class="modal-body">
              <form id="formccalidad" class="form-horizontal form-label-left">


                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <h4>Medidades reales (mm):</h4>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Diametro ext. min.:</label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="diamextmin" type="text" class="form-control" placeholder="Requerido">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Diametro ext. max.:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="diamextmax" type="text" class="form-control" placeholder="Requerido">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Espesor mínimo:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="espesormin" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Espesor máximo:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="espesormax" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Largo mínimo:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="largomin" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Largo máximo:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="largomax" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Espesor en costura mín:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="espesorminEc" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Espesor en costura máx:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="espesormaxEc" type="text" class="form-control">
                        </div>
                      </div> 

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <h4>Composición química:</h4>
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">% Carbono:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="carbono" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br> 
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">% Manganeso:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="manganeso" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br> 
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">% Fósforo:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fosforo" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br> 
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">% Azufre:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="azufre" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>  
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">% Silicio:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="silicio" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>             
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <hr>
                      <h4>Ensayos:</h4>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Tipo de ensayo:</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="tipoensayo" type="text" class="form-control">
                            @foreach($ensayos as $ensayo)
                              <option value="{{$ensayo->id}}">{{$ensayo->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Aboc. al lím. de rotu. (%):</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="abocardado" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Alargamiento Min (%):</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alargamientomin" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                         <label class="control-label col-md-6 col-sm-6 col-xs-12">Alargamiento Máx (%):</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alargamientomax" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                         <label class="control-label col-md-6 col-sm-6 col-xs-12">Dureza en el tubo(HRB):</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="durezatubo" type="text" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                         <label class="control-label col-md-6 col-sm-6 col-xs-12">Dureza en costura(HRB):</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="durezacostura" type="text" class="form-control">
                        </div>
                      </div>
                       <br>
                      <br>
                      <div class="form-groupa">
                         <label class="control-label col-md-6 col-sm-6 col-xs-12">Carga de rotura Min.:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cargaroturamin" type="text" placeholder="(Kgf/cm2 - Mpa)" class="form-control">
                        </div>
                      </div> 
                       <br>
                      <br>
                      <div class="form-groupa">
                         <label class="control-label col-md-6 col-sm-6 col-xs-12">Carga de rotura Máx.:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cargaroturamax" type="text" placeholder="(Kgf/cm2 - Mpa)" class="form-control">
                        </div>
                      </div> 
                      <br>
                      <br>
                      <div class="form-groupa">
                         <label class="control-label col-md-6 col-sm-6 col-xs-12">Resistencia a la Fluencia Min:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="resistenciamin" type="text" placeholder="(Kgf/cm2 - Mpa)" class="form-control">
                        </div>
                      </div>
                      <br>
                      <br>
                      <div class="form-groupa">
                         <label class="control-label col-md-6 col-sm-6 col-xs-12">Resisten. a la Fluencia Max:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="resistenciamax" type="text" placeholder="(Kgf/cm2 - Mpa)" class="form-control">
                        </div>
                      </div>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <hr>
                      <h4>Otras especificaciones:</h4>
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Nº de colada:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nrocolada" type="text" class="form-control">
                        </div>
                      </div>
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Nº de certificado:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nrocertificado" type="text" class="form-control">
                        </div>
                      </div>
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Estencilado:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="checkbox" id="estencilado" value="" style="margin-top: 10px;">
                        </div>
                      </div>
                      <div class="form-groupa" id="textareaEste" style="display: none;">
                        <br>
                        <br>
                        <label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="leyendaEstencilado" class="resizable_textarea form-control"></textarea>
                        </div>
                      </div>
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Biselado:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="checkbox" id="biselado" value="" style="margin-top: 10px;">
                        </div>
                      </div>
                      <br>
                      <br>
                      <div class="form-groupa">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Aplastado:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="checkbox" id="aplastado" value="" style="margin-top: 10px;">
                        </div>
                      </div>
                      <br>
                        <br>
                      <div class="form-groupa" id="textareaEste">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Observaciones:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="observaciones" class="resizable_textarea form-control"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>               
                
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="finmodal">Finalizar</button>
            </div>
          </div>
        </div>
      </div>

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
              <form accept-charset="utf-8">
                <div class="form-group">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Diametro Exterior</label>
                    <input type="text" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Espesor Exterior</label>
                    <input type="text" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Largo mínimo</label>
                    <input type="text" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Largo Máximo</label>
                    <input type="text" id="first-name" autocomplete="off" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Tipo Acero</label>
                    <select id="heard" class="form-control" >
                      <option value=""></option>
                      @foreach ($tipoaceros as $tipoacero)
                        <option value="{{$tipoacero->id}}">{{$tipoacero->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Tipo Costura</label>
                    <select id="heard" class="form-control" >
                      <option value=""></option>
                      @foreach ($tipocosturas as $tipocostura)
                        <option value="{{$tipocostura->id}}">{{$tipocostura->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Tratamiento Térmico</label>
                    <select id="heard" class="form-control" >
                      <option value=""></option>
                      @foreach ($tratamientos as $tratamiento)
                        <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Norma</label>
                    <select id="heard" class="form-control" >
                      <option value=""></option>
                      @foreach ($normas as $norma)
                        <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>


                  <div class="x_content"><br><br>
                    <table class="table table-stripped table-bordered">
                      <thead>
                        <tr>
                          <th>Medida</th>
                          <th>Stock (kgs)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>x 0 x CCB</th>
                          <td>0</td>
                        </tr>
                        <tr>
                          <th>x 0 x CCB</th>
                          <td>0</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Buscar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /cerrar modals Bucar Medida-->
      <!--  modal Control de calidad-->
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-calidad">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Control De Calidad</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form accept-charset="utf-8">
                <div class="row">
                  <div class="col-md-6 col-sm-6 div-input-modal"><h5>Medidas reales (mm)</h5>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Diametro ext.min</label>
                        <input type="text" id="diametroExteriorMinimoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Diametro ext.max</label>
                        <input type="text" id="diametroExteriorMaximoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Espesor mínimo</label>
                        <input type="text" id="espesorMinimoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Espesor máx</label>
                        <input type="text" id="espesorMaximoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Largo mínimo</label>
                        <input type="text" id="largoMinimoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Largo máx</label>
                        <input type="text" id="largoMaximoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Espesor costura mín</label>
                        <input type="text" id="espesorCosturaMinimaCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Espesor costura máx</label>
                        <input type="text" id="espesorCosturaMaximaCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6 col-sm-6 div-input-modal"><h5>Composición Química</h5>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">% Carbono</label>
                        <input type="text" id="porcentajeCarbonoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">% Manganeso</label>
                        <input type="text" id="porcentajeManganesoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">% Fósforo</label>
                        <input type="text" id="porcentajeFosforoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">% Azufre</label>
                        <input type="text" id="porcentajeAzufreCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">% Silicio</label>
                        <input type="text" id="porcentajeSilicioCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6 div-input-modal"><h5>Ensayos</h5>
                    <div class="form-group">
                      <div class="col-md-12 col-sm-12 div-input-modal">
                        <label for="" for="">Tipo de ensayo</label>
                        <select id="tipoensayocl" class="form-control" >
                          @foreach ($tipoensayos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-12 col-sm-12 div-input-modal">
                        <label for="" for="">Abocardado límite de rotura (%)</label>
                        <input type="text" id="abocardadocl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Alargamiento Min (%)</label>
                        <input type="text" id="alargamientoMinimoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Alargamiento Máx (%)</label>
                        <input type="text" id="alargamientoMaximoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Dureza en el tubo (HRB)</label>
                        <input type="text" id="durezaTuboCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Dureza en costura (HRB)</label>
                        <input type="text" id="durezaCosturaCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Carga de rotura Min (kgf/cm2 - Mpa)</label>
                        <input type="text" id="cargaRoturaMinimaCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Carga de rotura Max (kgf/cm2 - Mpa)</label>
                        <input type="text" id="cargaRoturaMaximaCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Resistencia a la Fluencia Min (Kgf/cm2 - Mpa)</label>
                        <input type="text" id="ResistenciaFluenciaMinimaCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Resistencia a la Fluencia Max (Kgf/cm2 - Mpa)</label>
                        <input type="text" id="ResistenciaFluenciaMaximaCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6 col-sm-6 div-input-modal"><h5>Otras Especificaciones</h5>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Nº de colada</label>
                        <input type="text" id="nroColadaCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <label for="" for="">Nº de certificado</label>
                        <input type="text" id="nroCertificadoCl" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <span>Estencilado</span>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="estenciladoCl" value=""> 
                          </label>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 div-input-modal">
                        <label for="" for="">Leyenda</label>
                        <textarea name="" id="leyendaEstanciladoCl" cols="40" rows="10"></textarea>                     
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <span>Biselado</span>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="biseladoCl" value=""> 
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 div-input-modal">
                        <span>Aplastado</span>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" id="aplastadoCl" value=""> 
                          </label>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 div-input-modal">
                        <label for="" for="">Observaciones</label>
                        <textarea name="" id="observacionesCl" cols="40" rows="10"></textarea>
                        
                      </div>
                    </div>

                  </div>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
              <button id="sendControl" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- CERRAR  modal Control de calidad-->
      <!--  modal Eliminar -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">¿Está seguro que desea eliminar?</h4>
            </div>
            
            <div class="modal-footer">
              <button id="delete_paquete" type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn  btn-delete" data-dismiss="modal">Cancelar</button>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /modal Eliminar-->
    <!--TERMINA SECCION DE LOS MODALS-->
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Complete los datos y proceda a la carga de paquetes</h2>
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
                <!-- Smart Wizard -->
                <div id="wizard" class="form_wizard wizard_horizontal">
                  <div id="step-1">
                    <form id="formIngreso">
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <label class="control-label" for="first-name">Proveedor</label>
                            <select id="proveedorid" name="proveedorid" class="form-control" >
                              <option value=""></option>
                              @foreach ($proveedores as $proveedor)
                                <option value="{{$proveedor->id}}">{{$proveedor->razon}}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <label class="control-label" for="first-name">Nº Remito del Provedor</label>
                            <input type="text" id="nroremito" name="nroremito" autocomplete="off" class="form-control col-md-7 col-xs-12">
                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <label class="control-label" for="first-name">Fecha<span class="req">*</span></label>
                            <div class='input-group date' id='myDatepicker'>
                              <input name="fecha" id="fecha" value="{{Carbon\Carbon::parse($fechaMovimiento)->format('d/m/Y') }}" type='text' class="form-control" />
                              <span class="input-group-addon">
                               <span class="fa fa-calendar"></span>
                             </span>
                           </div>



                         </div>

                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                       <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="compra">Nº Orden de compra</label>
                          <input type="text" id="numeroOrden" name="numeroOrden" autocomplete="off" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <label class="control-label" for="first-name">Medida</label>
                          <select id="medida" name="medida" class="form-control" >
                            <option value=""></option>
                            @foreach ($medidas as $medida)
                              <option value="{{$medida->id}}">{{$medida->medida}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <a data-toggle="modal" data-target="#modal-medida" type="" class="btn btn-primary btn-buscar btn-sm">Buscar Medida</a>

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Precio MP/KG</label>
                          <input type="text" id="precioMP" name="precioMP" autocomplete="off" class="form-control col-md-7 col-xs-12">
                        </div>
                        
                      </div>
                    </div>

                    @if($datexp=="error")
                      <div class="row">
                        <br>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <strong>Debe cargar la cotizacion del día.</strong>
                          </div>
                        </div>
                      </div>
                    @else
                      <div class="row">
                        <br>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <div class="alert alert-info alert-dismissible fade in" role="alert">
                            <strong>La cotización del día es : {{$datexp->cambio}}</strong>
                          </div>
                        </div>
                      </div>
                    @endif

                    <div class="row">
                      <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Tipo de Moneda</label>
                          <select id="moneda" name="moneda" class="form-control" >
                            <option value=""></option>
                            @foreach ($monedas as $moneda)
                              <option value="{{$moneda->id}}">{{$moneda->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Cantidad de Paquetes<span class="req">*</span></label>
                          <input type="text" id="nropaquetes" name="nropaquetes" autocomplete="off" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Cantidad de Kilos<span class="req">*</span></label>
                          <input type="text" id="kilogramos" name="kilogramos" autocomplete="off" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Estado</label>
                          <select id="estadoid" name="estadoid" class="form-control" >
                            <option value=""></option>
                            @foreach ($estados_materias as $estado)
                              <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                        <!--<div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Forma</label>
                          <select id="formaid" name="formaid" class="form-control" >
                            <option value=""></option>
                            @foreach ($formas as $forma)
                              <option value="{{$forma->id}}">{{$forma->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Rubro</label>
                          <select id="rubroid" name="rubroid" class="form-control" >
                            <option value=""></option>
                            @foreach ($rubros as $rubro)
                              <option value="{{$rubro->id}}">{{$rubro->descripcion}}</option>
                            @endforeach
                          </select>
                        </div> -->
                        
                      </div>
                    </div>

                  </form>
                </div><br>
                <div id="step-2" style="display: none;">
                  <h5><strong>Cargar Paquete</strong></h5>
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Nº Trazabilidad</label>
                        <input type="text" id="nro_tranzabilidada" name="nrotrazabilidad" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Kilogramos</label>
                        <input name="kilos" type="text" id="kilogramos" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Nº Tubos</label>
                        <input name="nrotubos" type="text" id="nro_tubos" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Ubicación 1</label>
                        <select id="ubicaciona" name="ubicacion" class="form-control" >
                            <option value=0>Seleccione</option>
                            <option value=1> Moreno 2 </option>
                            <option value=2> San Martín </option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <label class="control-label" for="first-name"></label>
                        <select id="letrasa" class="form-control alto-select" >
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <label class="control-label" for="first-name"></label>
                        <select id="numerosa" class="form-control alto-select" >
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Ubicación 2</label>
                        <select id="ubicacion2a" class="form-control" >
                          <option value=0>Seleccione</option>
                          <option value=1> Moreno 2 </option>
                          <option value=2> San Martín </option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <label class="control-label" for="first-name"></label>
                        <select id="letras2a" class="form-control alto-select" >
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <label class="control-label" for="first-name"></label>
                        <select id="numeros2a" class="form-control alto-select" >
                        </select>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 btn-top ">
                        <button id="guardar_paquete" class="btn btn-primary  btn-sm">Guardar</button>
                        <button type="" class="btn btn-delete btn-sm">Cancelar</button>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                      <table id="tabla_paquete" class="table table-striped table-responsive" >
                        <thead>
                          <tr>
                            <th width="60">Nº Trazabilidad</th>
                            <th width="80">Kilogramos</th>
                            <th width="70">Nº Tubos</th>
                            <th width="70">Ubicacion</th>
                            <th width="60">Control Calidad</th>
                            <th width="60">Eliminar</th>
                          </tr>
                        </thead>
                        <tbody id="tbody_paquete">

                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-md-1">
                          <button type="button" class="btn btn-default btn-sm">Cargar Paquete</button>
                        </div>
                        <div class="col-md-1 col-md-offset-1">
                          <button id="guardar_stock" type="button" class="btn btn-primary btn-sm">Guardar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 btn-top ">
                      <button id="cargarp" class="btn btn-primary  btn-sm">Cargar Paquete</button>
                    </div>
                  </div>

                </div>

                <div class="row" id="formsPaquetes" style="display: none;">
                  <form id="formpaq">
                    <hr>
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Nº Trazabilidad<span class="req">*</span></label>
                        <input type="text" id="nro_tranzabilidad" name="nro_tranzabilidad" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Kilogramos</label>
                        <input name="kilogramos" type="text" id="kilogramos" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Nº Tubos</label>
                        <input name="nro_tubos" type="text" id="nro_tubos" autocomplete="off" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Ubicación</label>
                        <select id="ubicacion" name="ubicacion" class="form-control" >
                            <option value=1> Moreno 2 </option>
                            <option value=2> San Martín </option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <label class="control-label" for="first-name"></label>
                        <select id="letras" class="form-control alto-select" >
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <label class="control-label" for="first-name"></label>
                        <select id="numeros" class="form-control alto-select" >
                        </select>
                      </div>
                    </div>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>

                    <div class="ubi2" style="display: none;">
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Ubicación 2</label>
                          <select id="ubicacion2" name="ubicacion" class="form-control" >
                              <option value=1> Moreno 2 </option>
                              <option value=2> San Martín </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <label class="control-label" for="first-name"></label>
                          <select id="letras2" class="form-control alto-select" >
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <label class="control-label" for="first-name"></label>
                          <select id="numeros2" class="form-control alto-select" >
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 btn-top ">
                        <a type="" id="addubi">+ Agregar</a>
                      </div>
                    </div>   

                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 btn-top ">
                          <a class="btn btn-info  btn-sm" id="saveTraza">Guardar</a>
                          <a type="" id="clearpaq" class="btn btn-default btn-sm">Cancelar</a>
                        </div>
                      </div>                    
                  </form>
                </div>

                <div class="row" id="tbtraza" style="display: none;">
                  <hr>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-9 col-xs-12 btn-top ">
                    <h4>Paquetes cargados</h4>
                      <table id="tabletraza" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Nº Trazabilidad</th>
                            <th>Kilogramos</th>
                            <th>Nº tubos</th>
                            <th>Ubicacion</th>
                            <th>Control Calidad</th>
                            <th>Copiar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  
                  </div>
                </div>  

               

                <div class="row">
                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 btn-top ">
                      <button id="finalizar" class="btn btn-primary  btn-sm">Finalizar</button>
                      <button type="" id="clear" class="btn btn-delete btn-sm">Limpiar</button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End SmartWizard Content -->
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

      var tr_id = 0;

    function validate_stock(){
      var totalpaq = $('#nropaquetes').val();
      var totalkilos = $('#kilogramos').val();
      var fecha = $('#fecha').val();
      console.log('totalpaq',totalpaq)
      
      if(!totalpaq.length>0){
        AlertToast("Debe ingresar el total de paquetes", "red");
        return false;
      }

      if(!fecha.length>0){
        AlertToast("Debe ingresar la fecha", "red");
        return false;
      }

      if(!totalkilos.length>0){
        AlertToast("Debe ingresar el total de kilos", "red");
        return false;
      }

      var kilos = 0;

      var tablepaquetes = $('#tabletraza tbody tr');
      
      var totalpaqcount = tablepaquetes.length;
      console.log('tablepaquetes',tablepaquetes)
      tablepaquetes.each(function( index ) {
        var kg = $(this).find('td').eq(1).data('kilogramos');
        kilos = kilos + kg;
      });

      if (totalpaqcount != totalpaq){
           AlertToast('Debe coincidir los paquetes cargados con el nro de paquetes del pedido', 'red');
           return false;
      }

      if (kilos != totalkilos){
           AlertToast('Los kilogramos ingresados por paquete y el total no coinciden.', 'red');
           return false;
      }

      return true;


    }

    function TravelModal(){
      var obj = {};

      obj['id'] = tr_id;

      var inputsmodal = $('#formccalidad input');
      var selectsmodal = $('#formccalidad select');
      var textareasmodal = $('#formccalidad textarea');

      inputsmodal.each(function( index ) {
        if($(this).attr('type')!=="checkbox"){
          obj[$(this).attr('id')] = $(this).val();
        }
        else{
          obj[$(this).attr('id')] = $(this).prop('checked');
          
        }
      });

      selectsmodal.each(function( index ) {
        obj[$(this).attr('id')] = $(this).val();
      });

      textareasmodal.each(function( index ) {
        obj[$(this).attr('id')] = $(this).val();
      });

      return obj;

    }

    $('#finmodal').on('click', function(){
      var dataModal = JSON.stringify(TravelModal());
      var tr = $("tr[data-id='"+tr_id+"']");
      tr.data('cc', dataModal);
      clearModal();
      changeTD(tr.find('td.open_modal'));
      
      $('#ccalidad').modal('hide');    
    });

    function changeTD(td){
      td.css('background', '#00c853');
      td.css('color', 'black');
      td.text('OK');
    }

    function loadModal(tr){

      var datamodal = JSON.parse(tr.data('cc'));

      $.each(datamodal, function(i, item) {
          if(i!=="id"){
            var ele = $('#'+i);
            if (i=="biselado" || i=="aplastado"){
              ele.prop('checked', item);
            }
            else if(i=="estencilado"){
              if(item)
                $('#textareaEste').css('display', 'block');
              
              ele.prop('checked', item);
            }
            else{
              ele.val(item);
            }
          }
      });

      return true;
    }

    function clearModal(){
      var inputsmodal = $('#formccalidad input');
      var selectsmodal = $('#formccalidad select');
      var textareasmodal = $('#formccalidad textarea');

      inputsmodal.each(function( index ) {
        if($(this).attr('type')!=="checkbox"){
          $(this).val("");
        }
        else{
          $(this).prop('checked', false);
          
        }
      });

      selectsmodal.each(function( index ) {
        $(this).val(1);
      });

      textareasmodal.each(function( index ) {
        $(this).val("");
      });

      $('#textareaEste').css('display', 'none');
    }

    $('span.req').css('color', 'red');

    $('#estencilado').on('click', function(){
      if($(this).prop('checked')){
        $('#textareaEste').fadeIn();
      }
      else{
        $('#textareaEste').fadeOut();
      }
    });

    function AlertToast(dataText="", colorFont="green"){
      $.toast({ 
        text : dataText, 
        showHideTransition : 'slide',  
        bgColor : colorFont,              
        textColor : '#eee',            
        allowToastClose : false,     
        hideAfter : 5000,              
        stack : 5,                    
        textAlign : 'left',            
        position : 'top-right'       
      });
    }

    $('#saveTraza').on('click', function(){
      if(validateTraza()){
        $('#tbtraza').css('display', 'block');
        saveTable();
      }
    });

    var count = 1;

    function saveTable(){
      var tableinputs = $('#formpaq input');

      $('#tabletraza tbody').append("<tr data-id='"+count+"'></tr>");

      var last_tr = $("tr[data-id='"+count+"']");

      tableinputs.each(function( index ) {
        var td =  `<td data-${$(this).attr('id')}="${$(this).val()}">${$(this).val()}</td>`;
        last_tr.append(td);
      });

      var ubi = $('#ubicacion').val();
      var inserdata = "";

      if($('.ubi2').css('display')=="none"){
        var str = $('#letras').val()+" "+$('#numeros').val()+$("#ubicacion option[value='"+ubi+"']").text();
        inserdata = $('#letras').val()+" "+$('#numeros').val();

      }
      else{
        var str = $('#letras').val()+" "+$('#numeros').val()+" "+$('#letras2').val()+" "+$("#numeros2").val()+$("#ubicacion option[value='"+ubi+"']").text();
        inserdata = $('#letras').val()+" "+$('#numeros').val()+" "+$('#letras2').val()+" "+$("#numeros2").val();
      }

      last_tr.append("<td data-ubicacion='"+inserdata+"'>"+str+"</td>");


      insertControlCalidad(last_tr);
      insertCopy(last_tr);
      insertDelete(last_tr);

      count ++;

      clearpaq();
    }

    function insertDelete(tr){
      var td = `<td style="text-align:center;"><a class="js-deletepaq"><i class="fa fa-trash"></i></a></td>`;
      tr.append(td);
    }

    $(document).on('click', '.js-deletepaq', function(){
      $(this).parents('tr').remove();
    });

    $(document).on('click', '.js-copy', function(){
      var tr_prev_cc = $(this).parents('tr').prev().data('cc');
      if(tr_prev_cc!==undefined){
        $(this).parents('tr').data('cc', tr_prev_cc);
        changeTD($(this).parents('tr').find('td.open_modal'));
      }
    });

    function insertControlCalidad(tr){
      var td = `<td class="open_modal" style="background:#d50000; text-align:center; color:#FFF;">C Calidad</td>`;
      tr.append(td);
    }

    $(document).on('click', '.open_modal', function(){
      clearModal();

      tr_id = $(this).parents('tr').data('id');

      if($(this).parents('tr').data('cc')!==undefined){
        loadModal($(this).parents('tr'));
      }

      $('#ccalidad').modal('show');
    });

    function insertCopy(tr){
      if(count==1){
        var td = `<td style="text-align:center;"> <i class="fa fa-close"></i></td>`;
      }
      else{
        var td = `<td style="text-align:center;"> <a class="js-copy"><i class="fa fa-copy"></i></a></td>`;

      }
      tr.append(td);
    }

    var dolarhoy = "{{$dolarhoy}}";

    function validateTraza(){
      var traza = $('#nro_tranzabilidad').val().length;
      if(!traza>0){
        $('#nro_tranzabilidad').focus();
        AlertToast("Complete el campo N° Trazabilidad", "red");
        return false;
      }

      return true;
    }

    $('#addubi').on('click', function(){
      if($('.ubi2').css('display')=='none'){
        $('.ubi2').css('display', 'block');
        $(this).text('- Quitar');
        $(this).css('color', 'red');
      }
      else{
        $('.ubi2').css('display', 'none');
        $(this).text('+ Agregar');
        $(this).css('color', '');
      }
    });

    $("#addubi").hover(function(){
      $(this).css('cursor', 'pointer');
    });

    $('#clearpaq').on('click', function(){
      clearpaq();
    });

    function clearpaq(){
      $('#formsPaquetes').css('display', 'none');
      $('.ubi2').css('display', 'none');
      $('#addubi').text('+ Agregar');
      $('#addubi').css('color', '');

      $('#formpaq input').each(function( index ) {
        $(this).val("");
      });

      $('#formpaq select').each(function( index ) {
        $(this).val(1);
      });

    }

    $('#cargarp').on('click', function(){
      $('#formsPaquetes').css('display', 'block');
    });

    function TravelObj(){
      var inputs = $('#formIngreso input');
      var selects = $('#formIngreso select');

      var obj = {};

      inputs.each(function( index ) {
        obj[$(this).attr('id')] = $(this).val();
      });

      selects.each(function( index ) {
        obj[$(this).attr('id')] = $(this).val();
      });

      //-----Paquetes-----//

      var tablepaquetes = $('#tabletraza tbody tr');

      var listPaquetes = [];

      tablepaquetes.each(function( index ) {
        var objPaq = {};

        var tr = $(this).find('td');

        objPaq['nrotrazabilidad'] = tr.eq(0).data('nro_tranzabilidad');
        objPaq['kilos'] = tr.eq(1).data('kilogramos');
        objPaq['nrotubos'] = tr.eq(2).data('nro_tubos');
        objPaq['ubicacion'] = tr.eq(3).data('ubicacion');

        if($(this).data('cc')!==undefined){
          objPaq['cc'] = JSON.parse($(this).data('cc'));
        }
        else{
          objPaq['cc'] = "";
        }

        listPaquetes.push(objPaq);

      });

      obj['paquetes'] = JSON.stringify(listPaquetes);

      return obj;

    }

    function ClearTravelObj(){
      var inputs = $('#formIngreso input');
      var selects = $('#formIngreso select');


      inputs.each(function( index ) {
        $(this).val("");
      });

      selects.each(function( index ) {
        $(this).val("");
      });

      return true;

    }

    function procesarMateriaPrima(obj){
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('procesarMateriaPrima')}}",
        data: obj,
        success: function(data){
          AlertToast("Su ingreso se realizo con exito");
          
          setTimeout(function(){ location.reload();  }, 1900);
        }
      });
    }

    $('#clear').on('click', function(){
      ClearTravelObj();
      clearpaq();
    });


    $('#finalizar').on('click', function(){
      if(validate_stock()){
        var obj = TravelObj();
        procesarMateriaPrima(obj);
      }
    });


    function changeMonSt(dolar){
      var tipo = parseFloat($("#precioMP").val());
      if (tipo>0){
          if ($("#moneda").val()==2)
               $("#precioMP").val(redondear((tipo*dolar),3));
          else
               $("#precioMP").val(redondear((tipo/dolar),3));
      }
    }

    function redondear(cantidad,decimales) {
        var cant = parseFloat(cantidad);
        var dec = parseFloat(decimales);
        decimales = (!dec ? 2 : dec);
        return Math.round(cant * Math.pow(10, decimales)) / Math.pow(10, decimales);
    }


    $('#moneda').on('change', function(){
      changeMonSt(dolarhoy);
    });







    //------------------------------------------------------------------------------------

      var contador = 1;
      var actualPaquete = 0;
      var arrayData =[];
      var arrayControlCalidad = [];
      
     /* var objetoEnviar = {
        "proveedor": $(),
        "paquetes": arrayData
      };

      JSON.stringify(objetoEnviar);*/


      function alphabetRange (start, end) {
        return new Array(end.charCodeAt(0) - start.charCodeAt(0)).fill().map((d, i) => String.fromCharCode(i + start.charCodeAt(0)));
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
        //var namemedida = $(this).data('medida');
        $("#medida").val(medida_id);
        
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


      $(document).on("change", "#ubicacion", function(){
        changeUbi($(this).val());
      });

      changeUbi(1);
      changeUbi2(1);

      function changeUbi(value){
          var arrayx;
          if(value==1){
            arrayx = alphabetRange("E","Z");
          }
          if(value==2){
            arrayx = alphabetRange("A","D");
          }
          $("#letras").empty();
          arrayx.forEach(function(value){
            $("#letras").append(
              '<option value="'+value+'">'+value+'</option>\
            ');
          });

      }

      function changeUbi2(value){
          var arrayx;
        if(value==1){
          arrayx = alphabetRange("E","Z");
        }
        if(value==2){
          arrayx = alphabetRange("A","D");
        }
        
        $("#letras2").empty();

        arrayx.forEach(function(value){
          $("#letras2").append(
            '<option value="'+value+'">'+value+'</option>\
          ');
        });
      }

      $("#ubicacion2").on("change",function(){
        changeUbi2($(this).val());
      });

      function loadPackage()
      {
        for(var i=1;i<31;i++){
          $("#numeros").append(
            '<option value="'+i+'">'+i+'</option>\
          ');

          $("#numeros2").append(
            '<option value="'+i+'">'+i+'</option>\
          ');
          
        }
      }




      loadPackage();




      function recorrer()
      {
        array = []
        $(".js-paquetes").each(function(){

            var idpaquete =$(this).data("identificador");
            var kilogramoTd   = $(this).find("td.js-kilogramo")[0];
            var kilogramoValor = $(kilogramoTd).data("variable");
            var nrotranzabilidad = $(this).find("th.js-tranzabilidadnro")[0];
            var nrotranzabilidadValor = $(nrotranzabilidad).data("variable");
            var nrotubos = $(this).find("td.js-nrotubos")[0];
            var nroTuboValor = $(nrotubos).data("variable");
            var ubicacion  = $(this).find("td.js-ubicacion")[0];
            var ubicacionValor = $(ubicacion).data("variable");
            var rubroValor  = $(this).data("rubro");
            var medidaValor = $(this).data("medida");
            var formaValor  = $(this).data("forma");
            var estadoValor = $(this).data("estado");

            //console.log(nroTuboValor);
            
            /*
            var nroTubos  = $().data("");
            var ubicacion = $().data("");
            */
            
            var paquete = arrayControlCalidad.find(function(elx){  
              if(elx.idpaquete==idpaquete) 
                return true;
            });
            //console.log($(this));
            //console.log(kilogramoValor);

            array.push({"kilogramo": kilogramoValor, "nrotranzabilidad": nrotranzabilidadValor, "nroTuboValor": nroTuboValor, "ubicacionValor": ubicacionValor, "rubro": rubroValor, "medida": medidaValor, "forma": formaValor, "estado": estadoValor, "paquetecalidad": paquete});
        });

        //console.log(array);
        return array;
      }


      function limpiarCamposCalidad()
      {
            $("#diametroExteriorMaximoCl").val("");
            $("#diametroExteriorMinimoCl").val("");
            $("#espesorMinimoCl").val("");
            $("#espesorMaximoCl").val("");
            $("#largoMinimoCl").val("");
            $("#largoMaximoCl").val("");
            $("#espesorCosturaMinimaCl").val("");
            $("#espesorCosturaMaximaCl").val("");
            $("#porcentajeAzufreCl").val("");
            $("#porcentajeSilicioCl").val("");
            $("#porcentajeFosforoCl").val("");
            $("#porcentajeManganesoCl").val("");
            $("#porcentajeCarbonoCl").val("");
            $("#tipoensayocl").val("");
            $("#abocardadocl").val("");
            $("#alargamientoMaximoCl").val("");
            $("#alargamientoMinimoCl").val("");
            $("#durezaCosturaCl").val("");
            $("#durezaTuboCl").val("");
            $("#cargaRoturaMinimaCl").val("");
            $("#cargaRoturaMaximaCl").val("");
            $("#ResistenciaFluenciaMinimaCl").val("");
            $("#ResistenciaFluenciaMaximaCl").val("");
            $("#nroColadaCl").val("");
            $("#nroCertificadoCl").val("");
            $("#estenciladoCl").prop('checked', false);
            $("#leyendaEstanciladoCl").val("");
            $("#biseladoCl").prop('checked', false);
            $("#aplastadoCl").prop('checked', false);
            $("#observacionesCl").val("");
      }


      function limpiarMaestro()
      {
            $("#proveedor_id").val("");
            $("#nro_remito").val("");
            $("#fecha").val("");
            $("#numeroOrden").val("");
            $("#cantidad_paquetes").val("");
            $("#cantidad_kilos").val("");
            $("#forma_id").val("");
            $("#rubro_id").val("");
            $("#estadomateria_id").val("");
            $("#preciomp").val("");
            $("#medida_id").val("");
            $("#tipomoneda_id").val("");
            $("#nro_tubos").val("");
            $("#nro_tranzabilidad").val("");
            $("#kilogramos").val("");
            $("#tbody_paquete").html("");
            contador = 1;
            actualPaquete = 0;
            arrayData =[];
            arrayControlCalidad = [];
      }



      $("#sendControl").on("click", function(){
        console.log($("#first-name-dd").val());
        var diametroExteriorMaximoCl = $("#diametroExteriorMaximoCl").val();
        var diametroExteriorMinimoCl = $("#diametroExteriorMinimoCl").val();
        var espesorMaximoCl = $("#espesorMaximoCl").val();
        var espesorMinimoCl = $("#espesorMinimoCl").val();
        var largoMinimoCl = $("#largoMinimoCl").val();
        var largoMaximoCl = $("#largoMaximoCl").val();
        var espesorCosturaMaximaCl = $("#espesorCosturaMaximaCl").val();
        var espesorCosturaMinimaCl = $("#espesorCosturaMinimaCl").val();
        var porcentajeCarbonoCl = $("#porcentajeCarbonoCl").val();
        var porcentajeManganesoCl = $("#porcentajeManganesoCl").val();
        var porcentajeFosforoCl = $("#porcentajeFosforoCl").val();
        var porcentajeSilicioCl = $("#porcentajeSilicioCl").val();
        var porcentajeAzufreCl  = $("#porcentajeAzufreCl").val();
        var tipoensayocl  = $("#tipoensayocl").val();
        var abocardadocl = $("#abocardadocl").val();
        var alargamientoMinimoCl = $("#alargamientoMinimoCl").val();
        var alargamientoMaximoCl = $("#alargamientoMaximoCl").val();
        var durezaCosturaCl = $("#durezaCosturaCl").val();
        var durezaTuboCl  = $("#durezaTuboCl").val();
        var cargaRoturaMaximaCl = $("#cargaRoturaMaximaCl").val();
        var cargaRoturaMinimaCl = $("#cargaRoturaMinimaCl").val();
        var ResistenciaFluenciaMaximaCl = $("#ResistenciaFluenciaMaximaCl").val();
        var ResistenciaFluenciaMinimaCl = $("#ResistenciaFluenciaMinimaCl").val();
        var nroColadaCl  = $("#nroColadaCl").val();
        var nroCertificadoCl = $("#nroCertificadoCl").val();
        var estenciladoCl =  $("#estenciladoCl").is(":checked") ? 1 : 0;
        var leyendaEstanciladoCl = $("#leyendaEstanciladoCl").val();
        var biseladoCl    = $("#biseladoCl").is(":checked") ? 1 : 0;
        var aplastadoCl   = $("#aplastadoCl").is(":checked") ? 1 : 0;
        var observacionesCl = $("#observacionesCl").val();


        if(actualPaquete!=0){
          arrayControlCalidad = arrayControlCalidad.filter(function(elx){ 
              if(elx.idpaquete!=actualPaquete) 
                return true;  
          });
          arrayControlCalidad.push(
          {
            "diametroExteriorMaximoCl": diametroExteriorMaximoCl,
            "diametroExteriorMinimoCl": diametroExteriorMinimoCl,
            "espesorMinimoCl": espesorMinimoCl,
            "espesorMaximoCl": espesorMaximoCl,
            "largoMinimoCl": largoMinimoCl,
            "largoMaximoCl": largoMaximoCl,
            "espesorCosturaMinimaCl": espesorCosturaMinimaCl,
            "espesorCosturaMaximaCl": espesorCosturaMaximaCl,
            "porcentajeAzufreCl": porcentajeAzufreCl,
            "porcentajeSilicioCl": porcentajeSilicioCl,
            "porcentajeFosforoCl": porcentajeFosforoCl,
            "porcentajeManganesoCl": porcentajeManganesoCl,
            "porcentajeCarbonoCl": porcentajeCarbonoCl,
            "tipoensayocl": tipoensayocl,
            "abocardadocl": abocardadocl,
            "alargamientoMaximoCl": alargamientoMaximoCl,
            "alargamientoMinimoCl": alargamientoMinimoCl,
            "durezaCosturaCl": durezaCosturaCl,
            "durezaTuboCl": durezaTuboCl,
            "cargaRoturaMinimaCl": cargaRoturaMinimaCl,
            "cargaRoturaMaximaCl": cargaRoturaMaximaCl,
            "ResistenciaFluenciaMinimaCl": ResistenciaFluenciaMinimaCl,
            "ResistenciaFluenciaMaximaCl": ResistenciaFluenciaMaximaCl,
            "nroColadaCl": nroColadaCl,
            "nroCertificadoCl": nroCertificadoCl,
            "estenciladoCl": estenciladoCl,
            "leyendaEstanciladoCl": leyendaEstanciladoCl,
            "biseladoCl": biseladoCl,
            "aplastadoCl": aplastadoCl,
            "observacionesCl": observacionesCl,
            "idpaquete": actualPaquete
          });
        }

        $('#modal-calidad').modal('hide');

        console.log(arrayControlCalidad);
      });


      $(document).on("click", ".js-ver", function(){
        console.log($(this).data("identificador"));
        actualPaquete = $(this).data("identificador");

        if(actualPaquete!=0)
        {
          var paquete = arrayControlCalidad.find(function(elx){  
              if(elx.idpaquete==actualPaquete) 
                return true;
          });

          console.log(paquete);

          if(paquete===undefined){
            limpiarCamposCalidad();

          }else{
            $("#first-name-dd").val(paquete.diametro);
            $("#diametroExteriorMaximoCl").val(paquete.diametroExteriorMaximoCl);
            $("#diametroExteriorMinimoCl").val(paquete.diametroExteriorMinimoCl);
            $("#espesorMinimoCl").val(paquete.espesorMinimoCl);
            $("#espesorMaximoCl").val(paquete.espesorMaximoCl);
            $("#largoMinimoCl").val(paquete.largoMinimoCl);
            $("#largoMaximoCl").val(paquete.largoMaximoCl);
            $("#espesorCosturaMinimaCl").val(paquete.espesorCosturaMinimaCl);
            $("#espesorCosturaMaximaCl").val(paquete.espesorCosturaMaximaCl);
            $("#porcentajeAzufreCl").val(paquete.porcentajeAzufreCl);
            $("#porcentajeSilicioCl").val(paquete.porcentajeSilicioCl);
            $("#porcentajeFosforoCl").val(paquete.porcentajeFosforoCl);
            $("#porcentajeManganesoCl").val(paquete.porcentajeManganesoCl);
            $("#porcentajeCarbonoCl").val(paquete.porcentajeCarbonoCl);
            $("#tipoensayocl").val(paquete.tipoensayocl);
            $("#abocardadocl").val(paquete.abocardadocl);
            $("#alargamientoMaximoCl").val(paquete.alargamientoMaximoCl);
            $("#alargamientoMinimoCl").val(paquete.alargamientoMinimoCl);
            $("#durezaCosturaCl").val(paquete.durezaCosturaCl);
            $("#durezaTuboCl").val(paquete.durezaTuboCl);
            $("#cargaRoturaMinimaCl").val(paquete.cargaRoturaMinimaCl);
            $("#cargaRoturaMaximaCl").val(paquete.cargaRoturaMaximaCl);
            $("#ResistenciaFluenciaMinimaCl").val(paquete.ResistenciaFluenciaMinimaCl);
            $("#ResistenciaFluenciaMaximaCl").val(paquete.ResistenciaFluenciaMaximaCl);
            $("#nroColadaCl").val(paquete.nroColadaCl);
            $("#nroCertificadoCl").val(paquete.nroCertificadoCl);
            $("#estenciladoCl").prop('checked', paquete.estenciladoCl);
            $("#leyendaEstanciladoCl").val(paquete.leyendaEstanciladoCl);
            $("#biseladoCl").prop('checked', paquete.biseladoCl);
            $("#aplastadoCl").prop('checked', paquete.aplastadoCl);
            $("#observacionesCl").val(paquete.observacionesCl);
          }
        }
      });



      $(document).on("click", ".js-eliminar", function(){
        var identificador = $(this).data("identificador");
        $("tr[data-identificador="+identificador+"]").remove();
        arrayControlCalidad = arrayControlCalidad.filter(function(elx){ 
              if(elx.idpaquete!=identificador) 
                return true;  
        });

        console.log(arrayControlCalidad);
      });


      function crearPaquete(nro_tranzabilidad, nro_tubos, ubicacion, kilos)
      {

        var variable  = 20 + contador;
        var formaVal  = $("#forma_id").val();
        var rubroVal  = $("#rubro_id").val();
        var estadoVal = $("#estadomateria_id").val();
        var medidaVal =  $("#medida_id").val();


        if(medidaVal!="" && formaVal!="" && rubroVal!="" && estadoVal!=""){

          var templatePaquete = ` <tr class="js-paquetes" data-identificador="${contador}" data-rubro="${rubroVal}" data-estado="${estadoVal}" data-forma="${formaVal}" data-medida="${medidaVal}">
                                    <th class="js-tranzabilidadnro" data-variable="${nro_tranzabilidad}">${nro_tranzabilidad}</th>
                                    <td class="js-kilogramo" data-variable="${kilos}">${kilos} kg</td>
                                    <td class="js-nrotubos" data-variable="${nro_tubos}">${nro_tubos}</td>
                                    <td class="js-ubicacion" data-variable="${ubicacion}">${ubicacion}</td>
                                    <td><button data-identificador="${contador}" data-toggle="modal" data-target="#modal-calidad" type="" class="btn btn-primary btn-calidad btn-sm js-ver"><i class="fa fa-search"></i></button></td>
                                    <td><button data-identificador="${contador}" type="" class="btn btn-primary btn-eliminar btn-sm js-eliminar"><i class="fa fa-trash"></i></button></td>
                                  </tr>`;

          $("#tbody_paquete").append(templatePaquete);
          contador = contador + 1;
          recorrer();
        }


      }

      $('#search_medida').on('click', function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "buscar_medida/";
        $.ajax({  
          type: "GET",
          url: url,
          data: {
            'diametroExterior': $("#diametroExterior").val(),
            'espesorNominal': $("#espesorNominal").val(),
            'largoMaximo': $("#largoMaximo").val(),
            'largoMinimo': $("#largoMinimo").val(),
            'tipoCostura': $("#tipoCostura").val(),
            'tipoAceroSAE': $("#tipoAceroSAE").val(),
            'tratamientoTermico': $("#tratamientoTermico").val(),
            'normaid': $("#normaid").val()
          },
          success: function(data){
            console.log(data);
          }

        });
    
      });

      var stock_paquetes = [];

      /*
      swal(
        'Good job!',
        'You clicked the button!',
        'success'
      )

      */


      function validarCampos(kilos, nro_tranzabilidad, nro_tubos, ubicacion, fecha)
      {
        var valido = true;

        if(kilos.trim().length===0 || kilos===undefined){
          swal({
            type: 'error',
            title: 'Oops...',
            text: 'Kilos no puede estar vacio',
          });
          return false;
        }

        if(!($.isNumeric(kilos.trim())))
        {
          swal({
            type: 'error',
            title: 'Oops...',
            text: 'Kilos debe ser un número',
          });
          return false;
        }

        if(nro_tranzabilidad.trim().length===0 || kilos===undefined)
        {
          //
          return false;
        }

        /*

        if(!($.isNumeric(nro_tranzabilidad.trim())))
        {
          //
          return false;
        }*/


        if(nro_tubos.trim().length===0 || nro_tubos===undefined)
        {
          //Alert
          return false;
        }


        if(!($.isNumeric(nro_tubos.trim())))
        {
          //Alert
          return false;
        }

        if(ubicacion.trim().length===0 || ubicacion===undefined)
        {
          //Alert
          return false;
        }

        if(fecha.trim().length===0)
        {
          return false;
        }



        return valido;

      }

      $('#guardar_paquete').on('click', function(){

        var kilos = $("#kilogramos").val();
        var nro_tranzabilidad = $("#nro_tranzabilidad").val();
        var nro_tubos = $("#nro_tubos").val();
        //var ubicacion = $('select[name="ubicacion"] option:selected').text();
        var letraUbi   = $('#letras option:selected').text();
        var numerosUbi  = $('#numeros option:selected').text();
        var letra2Ubi   = $('#letras2 option:selected').text();
        var numeros2Ubi = $('#numeros2 option:selected').text();
        var ubicacion2  = $('#ubicacion2').val();
        var ubicacion1  = $("#ubicacion").val();
        var ubicacion   = "";
        var fecha       = $("#fecha").val();

        
        if(ubicacion1!=0){
          ubicacion   = letraUbi+numerosUbi;
        }
        
        if(ubicacion2!=0)
        {
          ubicacion = ubicacion+" "+letra2Ubi+numeros2Ubi
        }

        ubicacion = ubicacion.trim();

        console.log(letraUbi);
        console.log(numerosUbi);

        if(validarCampos(kilos, nro_tranzabilidad, nro_tubos, ubicacion, fecha)){
          crearPaquete(nro_tranzabilidad, nro_tubos, ubicacion, kilos);
        }

      });

      $('#guardar_stock').on('click', function(){
          var paquetesRegistrados = recorrer();


          if(paquetesRegistrados.length!=parseInt($("#cantidad_paquetes").val())){
            $.toast({ 
              text : "No Coincide la Cantidad de Paquetes con los Paquetes Guardados", 
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

          var fecha = $("#fecha").val();


          if(fecha.trim().length==0)
          {
            $.toast({ 
              text : "Debe rellenar la fecha", 
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



          console.log(paquetesRegistrados);
          $.ajaxSetup({
              headers: {
                  'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
              }
          });

          $.ajax({  
            type: "POST",
            url: "{{route('addingreso')}}",
            data: {
              'proveedor_id': $("#proveedor_id").val(),
              'nro_remito': $("#nro_remito").val(),
              'fecha': $("#fecha").val(),
              'numeroOrden': $("#numeroOrden").val(),
              'cantidad_paquetes': $("#cantidad_paquetes").val(),
              'cantidad_kilos': $("#cantidad_kilos").val(),
              'forma_id': $("#forma_id").val(),
              'rubro_id': $("#rubro_id").val(),
              'estadomateria_id': $("#estadomateria_id").val(),
              'preciomp': $("#preciomp").val(),
              'medida_id': $("#medida_id").val(),
              'tipomoneda_id': $("#tipomoneda_id").val(),
              'paquetes' : JSON.stringify(paquetesRegistrados)
            },
            success: function(data){
              console.log(data);
              if(data=="true")
              {
                $.toast({ 
                  text : "Ingreso Creado con Exito", 
                  showHideTransition : 'slide',  
                  bgColor : 'green',              
                  textColor : '#eee',            
                  allowToastClose : false,     
                  hideAfter : 5000,              
                  stack : 5,                    
                  textAlign : 'left',            
                  position : 'top-right'       
                });

                limpiarMaestro();
              }else{

                $.toast({ 
                  text : data, 
                  showHideTransition : 'slide',  
                  bgColor : 'red',              
                  textColor : '#eee',            
                  allowToastClose : false,     
                  hideAfter : 5000,              
                  stack : 5,                    
                  textAlign : 'left',            
                  position : 'top-right'       
                });

              }
            },
            error: function(){
              
                $.toast({ 
                  text : "Problemas: Verifique que los campos esten llenados correctamente", 
                  showHideTransition : 'slide',  
                  bgColor : 'red',              
                  textColor : '#eee',            
                  allowToastClose : false,     
                  hideAfter : 5000,              
                  stack : 5,                    
                  textAlign : 'left',            
                  position : 'top-right'       
                });
            }
          });
      });
    
    });

  </script>

@endsection