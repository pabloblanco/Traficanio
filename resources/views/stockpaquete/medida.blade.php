@extends('layouts.app')

@section('content')

  <!-- Inicio de las ventanas modales-->

  <!--  modal Eliminar  -->
  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">¿Está Seguro que desea Eliminar?</h4>
        </div>
        <div class="modal-body cuerpo-modal">
        </div>
        <div class="modal-footer">
          <button id="" type="button" class="btn btn-primary">Aceptar</button>
          <button type="button" class="btn btn-delete" data-dismiss="modal">Cancelar</button>

        </div>

      </div>
    </div>
  </div>
  <!-- /modals eliminar -->
  <!-- Fin de las ventanas modales-->
  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Medidas</h2>
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
              <h5>Consulte el stock por medida</h5>
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">

                  <div  class="row">
                    <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                      <label class="control-label" for="first-name">Diámetro Exterior</label>
                    </div>
                    <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
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
                      <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Hasta</label>
                      <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                      <label class="control-label" for="first-name">Largo Mínimo</label>
                    </div>
                    <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                      <label class="control-label" for="first-name">Largo Máximo</label>
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
                      <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Hasta</label>
                      <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="first-name">Tipo De Acero:</label>
                      <span><a id="alternar-check-1">Elegir <span class="fa fa-chevron-down"></span></a></span>

                    </div>
                    <div id="respuesta-check-1" style="display: none;">
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

                      </div>

                    </div> 
                  </div> 
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="first-name">Tipo De Costura:</label>
                      <span><a id="alternar-check-2">Elegir <span class="fa fa-chevron-down"></span></a></span>

                    </div>
                    <div id="respuesta-check-2" style="display: none;">
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
                        
                      </div>
                      
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="control-label" for="first-name">Norma:</label>
                      <span><a id="alternar-check-3">Elegir <span class="fa fa-chevron-down"></span></a></span>
                      
                    </div>
                    <div id="respuesta-check-3" style="display: none;">
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
                        

                      </div><!-- Cierra row id respuesta-check-3-->

                    </div> <!-- Cierra div id respuesta-check-3-->
                  </div>  <!-- Cierra row general-->
                  <div  class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Tratamiento Térmico</label>
                    </div>
                    <div class="col-md-9  col-sm-9  col-xs-9">
                      <label class="control-label" for="first-name">Ubicación</label>
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                     
                      <select  id="" class="form-control" required>
                        <option value=""> 1</option>
                        <option value="press"> 2</option>
                        <option value=""> 3</option>
                      </select>
                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <select  id="" class="form-control" required>
                        <option value=""> 1</option>
                        <option value="press"> 2</option>
                        <option value=""> 3</option>
                      </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <select  id="" class="form-control" required>
                        <option value=""> 1</option>
                        <option value="press"> 2</option>
                        <option value=""> 3</option>
                      </select>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                     <select  id="" class="form-control" required>
                      <option value=""> 1</option>
                      <option value="press"> 2</option>
                      <option value=""> 3</option>
                    </select>
                  </div>
                </div>
                

              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 ">

                  <button type="" class="btn btn-primary  btn-sm">Buscar</button>
                  <button type="" class="btn btn-success  btn-sm">Limpiar</button>
                </div>
              </div>
            </form>


            <div class="clearfix"></div>
            <div class="x_content">
              <div class="row">
                <div class="table-responsive">
                  <table id="" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Valor 1</th>
                        <th>Valor 2</th>
                        <th>Valor 3</th>
                        <th>Valor 4</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
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

                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-1">
                <button type="button" class="btn btn-primary btn-sm">Guardar</button>
              </div>


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