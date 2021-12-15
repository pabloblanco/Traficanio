@extends('layouts.app')

@section('content')

    <!--  modal Eliminar  -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">¿Está seguro que desea eliminar el producto?</h4>
          </div>
          <div class="modal-body cuerpo-modal">
          </div>
          <div class="modal-footer">
            <button id="send_delete" type="button" class="btn btn-primary">Aceptar</button>
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
            <h4 class="modal-title" id="myModalLabel2">Modificar Detalles Del Producto</h4>
          </div>
          <div class="modal-body cuerpo-modal">
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
               <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Diámetro Exterior</label>
                  <input type="text" id="e-diamex" class="form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol + Diám. Exterior</label>
                  <input type="text" id="e-tolmasdiamex" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol - Diám. Exterior</label>
                  <input type="text" id="e-tolmenosdiamex" class="form-control col-md-7 col-xs-12">
                </div>

              </div>

              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Espesor</label>
                  <input type="text" id="e-espesor" placeholder="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol + Espesor</label>
                  <input type="text" id="e-tolmasespesor" placeholder="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol - Espesor</label>
                  <input type="text" id="e-tolmenosespesor" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>

              </div>

              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Diámetro Interior</label>
                  <input type="text" id="e-diamein" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol + Diám. Interior</label>
                  <input type="text" id="e-tolmasdiamein" placeholder="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol - Diám. Interior</label>
                  <input type="text" id="e-tolmenosdiamein" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>

              </div>

              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tipo Acero</label>
                  <select id="e-sae" class="form-control">
                    <option></option>
                    @foreach ($tiposaceros as $tipo)
                      <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tipo Costura</label>
                    <select id="e-tcost" class="form-control">
                      <option></option>
                      @foreach ($tipocostura as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Estado Fabricación</label>
                  <select id="e-estfabricacion" class="form-control">
                      <option></option>
                      @foreach ($estados as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
              </div>

              </div>
              <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Norma</label>
                <select id="e-norma_id" class="form-control">
                  <option></option>
                  @foreach ($normas as $norma)
                    <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Forma</label>
                <select id="e-forma_id" class="form-control">
                  <option></option>
                  @foreach ($formas as $norma)
                    <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12" style="display:none">
                <label class="control-label" >Rubros</label>
                <select id="e-rubro_id" class="form-control">
                  <option></option>
                  @foreach ($rubros as $norma)
                    <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Observaciones</label>
                <textarea type="text" id="e-obs" placeholder="" class="form-control col-md-7 col-xs-3"></textarea>
              </div>
            </div>


            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Estado
                  <input type="checkbox" id="estadoe">
                  <span class="check"></span>
                </label>
              </div>
            </div><br>

          </form>
            </div>
            <div class="modal-footer">
              <button type="button" id="enviar_m" class="btn btn-primary">Guardar</button>
              <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /modals modificar-->

    <!--  modal Editar Producto-->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Editar Detalles Del Producto</h4>
          </div>
          <div class="modal-body cuerpo-modal">

           <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
               <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Diámetro Exterior</label>
                  <input type="text" id="" class="form-control col-md-7 col-xs-12">
                </div>
                
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol + Diám. Exterior</label>
                  <input type="text" id="" class="form-control col-md-7 col-xs-12">
                </div>
                
              </div>
              
              
              
              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol - Diám. Exterior</label>
                  <input type="text" id="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Espesor</label>
                  <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol + Espesor</label>
                  <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                </div>
                
              </div>
              
              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol - Espesor</label>
                  <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Diámetro Interior</label>
                  <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol + Diám. Interior</label>
                  <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                </div>
                
              </div>
              
              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol - Diám. Interior</label>
                  <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >SAE</label>
                  <select id="e-sae" class="form-control">
                    <option></option>
                    @foreach ($tiposaceros as $tipo)
                      <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >T/Cost</label>
                  <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>
                
              </div>
              <div class="row">
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Est. Fabricación</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Norma</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-6">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Forma</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-6">
              </div>
            </div>
            
            
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Estado
                  <input type="checkbox" checked="checked">
                  <span class="check"></span>
                </label>
              </div>
            </div><br>

          </form>

              <div class="modal-footer">

                <button type="button" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  modal Agregar Cotizacion-->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-cotizar">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Agregar Detalles Del Producto</h4>
            </div>
            <div class="modal-body cuerpo-modal">

              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
               <div class="row">
              
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Diámetro Exterior</label>
                  <input type="text" id="diamex" class="form-control col-md-7 col-xs-12">
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol + Diám. Exterior</label>
                  <input type="text" id="tolmasdiamex" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol - Diám. Exterior</label>
                  <input type="text" id="tolmenosdiamex" class="form-control col-md-7 col-xs-12">
                </div>

              </div>

              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Espesor</label>
                  <input type="text" id="espesor" placeholder="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol + Espesor</label>
                  <input type="text" id="tolmasespesor" placeholder="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol - Espesor</label>
                  <input type="text" id="tolmenosespesor" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>

              </div>

              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Diámetro Interior</label>
                  <input type="text" id="diamein" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol + Diám. Interior</label>
                  <input type="text" id="tolmasdiamein" placeholder="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tol - Diám. Interior</label>
                  <input type="text" id="tolmenosdiamein" placeholder="" class="form-control col-md-7 col-xs-3">
                </div>

              </div>

              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tipo Acero</label>
                  <select id="sae" class="form-control">
                    <option></option>
                    @foreach ($tiposaceros as $tipo)
                      <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Tipo Costura</label>
                    <select id="tcost" class="form-control">
                      <option></option>
                      @foreach ($tipocostura as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Estado Fabricación</label>
                    <select id="estfabricacion" class="form-control">
                        <option></option>
                        @foreach ($estados as $tipo)
                          <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                        @endforeach
                      </select>
                </div>

              </div>
              <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Norma</label>
                <select id="norma_id" class="form-control">
                  <option></option>
                  @foreach ($normas as $norma)
                    <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Forma</label>
                <select id="forma_id" class="form-control">
                  <option></option>
                  @foreach ($formas as $norma)
                    <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12" style="display:none">
                <label class="control-label" >Rubros</label>
                <select id="rubro_id" class="form-control">
                  <option></option>
                  @foreach ($rubros as $norma)
                    <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Observaciones</label>
                <textarea type="text" id="obs" placeholder="" class="form-control col-md-7 col-xs-3"></textarea>
              </div>
            </div>
            <br>

          </form>
          <div class="modal-footer">

            <button type="button" id="guardarp" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Fin de las ventanas modales-->


  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Detalles Del Producto</h2>
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
                  
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Diámetro Exterior</label>
                    <input type="text" id="b-diamex" class="form-control col-md-7 col-xs-12">
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Tol + Diám. Exterior</label>
                    <input type="text" id="b-tolmasdiamex" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Tol - Diám. Exterior</label>
                    <input type="text" id="b-tolmenosdiamex" class="form-control col-md-7 col-xs-12">
                  </div>

                </div>

                <div  class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Espesor</label>
                    <input type="text" id="b-espesor" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Tol + Espesor</label>
                    <input type="text" id="b-tolmasespesor" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Tol - Espesor</label>
                    <input type="text" id="b-tolmenosespesor" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>

                </div>

                <div  class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Diámetro Interior</label>
                    <input type="text" id="b-diamein" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Tol + Diám. Interior</label>
                    <input type="text" id="b-tolmasdiamein" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Tol - Diám. Interior</label>
                    <input type="text" id="b-tolmenosdiamein" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>

                </div>

                <div  class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Tipo Acero</label>
                    <select id="b-sae" class="form-control">
                      <option></option>
                      @foreach ($tiposaceros as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Tipo Costura</label>
                    <select id="b-tcost" class="form-control">
                      <option></option>
                      @foreach ($tipocostura as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                   <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" >Estado Fabricación</label>
                    <select id="b-estfabricacion" class="form-control">
                        <option></option>
                        @foreach ($estados as $tipo)
                          <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                        @endforeach
                      </select>
                  </div>

                </div>
                <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Norma</label>
                  <select id="b-norma_id" class="form-control">
                    <option></option>
                    @foreach ($normas as $norma)
                      <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Forma</label>
                  <select id="b-forma_id" class="form-control">
                    <option></option>
                    @foreach ($formas as $norma)
                      <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12" style="display:none">
                  <label class="control-label" >Rubros</label>
                  <select id="b-rubro_id" class="form-control">
                    <option></option>
                    @foreach ($rubros as $norma)
                      <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" >Observaciones</label>
                  <textarea type="text" id="b-obs" placeholder="" class="form-control col-md-7 col-xs-3"></textarea>
                </div>
              </div>


              <br>         

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 ">
                    <button id="buscarpr" class="btn btn-primary  btn-sm">Buscar</button>
                    <button id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</button>
                  </div>
                </div>
              </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
            </div>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="">
                <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-cotizar">Agregar Producto</button>
              </li>
            </ul>
            <div class="clearfix"></div>
            <div class="x_content">
              <div class="row">
                <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                <div class="table-responsive">
                  <table id="datatable-pr" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Estado</th>
                        <th>Diámetro Exterior</th>
                        <th>Tol + Diám. Exterior</th>
                        <th>Tol - Diám. Exterior</th>
                        <th>Espesor</th>
                        <th>Tol + Espesor</th>
                        <th>Tol - Espesor</th>
                        <th>Diámetro Interior</th>
                        <th>Tol + Diám. Interior</th>
                        <th>Tol - Diám. Interior</th>
                        <th>Tipo Acero</th>
                        <th>Tipo Costura</th>
                        <th>Norma</th>
                        <th>Forma</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-1">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar" id="udpatep">Modificar</button>
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

@section('js_extra')
<script type="text/javascript">
  $(function(){

    var table = $("#datatable-pr").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    var idSeleccionado = 0;

    $('table').on('click', 'tr', function(){
      idSeleccionado = $(this).data('id');

      if($(this).hasClass('selected-table')){
        $(this).removeClass('selected-table');
      }else{
        $("tbody tr.selected-table").removeClass('selected-table');
        $(this).addClass('selected-table');
      }

    });

    /////////FORMULA/////////

    function calcular_campos(valor, pasador){
      if (valor == null){
        var valesp = $('#espesor').val();
        var valdiame = $('#diamex').val();
        var valdiamein = $('#diamein').val();

        var esp = $('#espesor'); 
        var de = $('#diamex');        
        var di = $('#diamein'); 
      }
      else{
        var valesp = $('#'+valor+'-espesor').val();
        var valdiame = $('#'+valor+'-diamex').val();
        var valdiamein = $('#'+valor+'-diamein').val();

        var esp = $('#'+valor+'-espesor'); 
        var de = $('#'+valor+'-diamex');        
        var di = $('#'+valor+'-diamein');
      }

      if (pasador == 1){ ///cambie espesor
        di.val("");
      }
      else if (pasador == 2){///cambie el diametro exterior
        di.val("");
      }
      else if(pasador==3){
        esp.val("");
      }
      else{ /// cambie el diametro interior
        de.val("");
      }

      //si tiene diametro interior y exterior calcula espesor
      if ((di.val().length != 0 && di.val() != 0) && (de.val().length != 0 && de.val() != 0)){
        var esps = (parseFloat(valdiame) - parseFloat(valdiamein)) / 2;
        var r = parseFloat(esps).toFixed(2);
        esp.val(r);
        return;
      } //si tiene espesor y diametro exterior calcula diametro interior
      else if ((esp.val().length != 0 && esp.val() != 0) && (de.val().length != 0 && de.val() != 0)){
        var den = parseFloat(valdiame) - ( 2 * parseFloat(valesp));
        var r = parseFloat(den).toFixed(2);
        di.val(r).toFixed(2);
        return;
      } // si tiene espesor y diametro interor calcula diametro exterior
      else if ((esp.val().length != 0 && esp.val() != 0) && (di.val().length != 0 && di.val() != 0)){
        var den = parseFloat(valdiamein) + (2* parseFloat(valesp));
        var r = parseFloat(den).toFixed(2);
        de.val(r);
        return;
      }
      return;
    }


    $('#espesor').on('change', function(){
      var pas = 1;
      if ($('#diamein').val()!=="")
        pas = 4;

      calcular_campos(null, pas);
    });

    $('#diamein').on('change', function(){
      var pas = 1;
      if ($('#diamex').val()!=="")
        pas = 3;

      calcular_campos(null, pas);
    });

     $('#diamex').on('change', function(){
      calcular_campos(null, 2);
    });

     $('#b-espesor').on('change', function(){
      var pas = 1;
      if ($('#b-diamein').val()!=="")
        pas = 4;

      calcular_campos("b", pas);
    });

    $('#b-diamein').on('change', function(){
      var pas = 1;
      if ($('#b-diamex').val()!=="")
        pas = 3;

      calcular_campos("b", pas);
    });

     $('#b-diamex').on('change', function(){
      calcular_campos("b", 2);
    });

    $('#e-espesor').on('change', function(){
      var pas = 1;
      if ($('#e-diamein').val()!=="")
        pas = 4;

      calcular_campos("e", pas);
    });

    $('#e-diamein').on('change', function(){
      var pas = 1;
      if ($('#e-diamex').val()!=="")
        pas = 3;

      calcular_campos("e", pas);
    });

     $('#e-diamex').on('change', function(){
      calcular_campos("e", 2);
    });

    /////////END FORMULA/////////

    ////CREATE////
    $('#guardarp').on('click', function(){

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      var estado = $('#estado').is(':checked');
      var est = 0;

      if (estado == true)
        est = 1;

      $.ajax({  
        type: "POST",
        url: "{{route('productos.store')}}",
        data: {
          'nombre' : $('#nombre').val(),
          'diamex' : $('#diamex').val(),
          'tolmasdiamex' : $('#tolmasdiamex').val(),
          'tolmenosdiamex' : $('#tolmenosdiamex').val(),
          'espesor' : $('#espesor').val(),
          'tolmasespesor' : $('#tolmasespesor').val(),
          'tolmenosespesor' : $('#tolmenosespesor').val(),
          'diamein' : $('#diamein').val(),
          'tolmasdiamein' : $('#tolmasdiamein').val(),
          'tolmenosdiamein' : $('#tolmenosdiamein').val(),
          'sae' : $('#sae').val(),
          'tcost' : $('#tcost').val(),
          'estfabricacion' : $('#estfabricacion').val(),
          'normaid' : $('#norma_id').val(),
          'formaid' : $('#forma_id').val(),
          'rubroid' : $('#rubro_id').val(),
          'largomax' : $('#largomax').val(),
          'largomin' : $('#largomin').val(),
          'obs' : $('#obs').val(),
          'estado' : est
        },

        success: function(data){
          if (data == "true"){
            location.reload();
          }
          else {

            $.toast({ 
              text : "Ha ocurrido un error al insertar el registro", 
              showHideTransition : 'slide',  
              bgColor : 'red',              
              textColor : '#eee',            
              allowToastClose : false,     
              hideAfter : 5000,              
              stack : 5,                    
              textAlign : 'left',            
              position : 'top-right'       
            });

            return false;

          }

        }
      });

    });

    //UPDATE//

    $('#udpatep').on('click', function(){
        var url = "productos/" + idSeleccionado;

        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            $("#e-diamein").val(data.diamein);
            $("#e-diamex").val(data.diametroExterior);
            $("#e-espesor").val(data.espesorNominal);
            $("#e-estfabricacion").val(data.tratamientoTermico);
            $("#e-forma_id").val(data.forma_id);
            $("#e-nombre").val(data.nombre);
            $("#e-norma_id").val(data.normaid);
            $("#e-sae").val(data.tipoAceroSAE);
            $('#e-rubro_id').val(data.rubro_id);
            $("#e-tcost").val(data.tipoCostura);
            $("#e-tolmasdiamein").val(data.tolmasdiamein);
            $("#e-tolmasdiamex").val(data.tolmasdiamex);
            $("#e-tolmasespesor").val(data.tolmasespesor);
            $("#e-tolmenosdiamein").val(data.tolmenosdiamein);
            $("#e-tolmenosdiamex").val(data.tolmenosdiamex);
            $("#e-tolmenosespesor").val(data.tolmenosespesor);
            $("#e-obs").val(data.observaciones);


            if (data.estado == 1){
              $('#estadoe').prop( "checked", true );
            }
            else{
              $('#estadoe').prop( "checked", false );
            }

            return;
          }
        });
    });

    $('#limpiarbusqueda').on('click', function(){
      $("#b-diamein").val("");
      $("#b-diamex").val("");
      $("#b-espesor").val("");
      $("#b-estfabricacion").val("");
      $("#b-forma_id").val("");
      $("#b-nombre").val("");
      $("#b-norma_id").val("");
      $("#b-sae").val("");
      $("#b-tcost").val("");
      $("#b-tolmasdiamein").val("");
      $("#b-tolmasdiamex").val("");
      $("#b-tolmasespesor").val("");
      $("#b-tolmenosdiamein").val("");
      $("#b-tolmenosdiamex").val("");
      $("#b-tolmenosespesor").val("");
      $('#estadob').removeAttr('checked');
      table.clear().draw();
    });
    

    $('#buscarpr').on('click', function(){

      var estado = $('#estadob').is(':checked');

      var est = 0;

      if (estado == true)
        est = 1;

      $.ajax({  
        type: "GET",
        url: "{{route('buscarproducto')}}",
        data: {
          'nombre' : $('#b-nombre').val(),
          'diamex' : $('#b-diamex').val(),
          'tolmasdiamex' : $('#b-tolmasdiamex').val(),
          'tolmenosdiamex' : $('#b-tolmenosdiamex').val(),
          'espesor' : $('#b-espesor').val(),
          'tolmasespesor' : $('#b-tolmasespesor').val(),
          'tolmenosespesor' : $('#b-tolmenosespesor').val(),
          'diamein' : $('#b-diamein').val(),
          'tolmasdiamein' : $('#b-tolmasdiamein').val(),
          'tolmenosdiamein' : $('#b-tolmenosdiamein').val(),
          'sae' : $('#b-sae').val(),
          'tcost' : $('#b-tcost').val(),
          'estfabricacion' : $('#b-estfabricacion').val(),
          'normaid' : $('#b-norma_id').val(),
          'formaid' : $('#b-forma_id').val(),
          'rubroid' : $('#b-rubro_id').val(),
          'largomax' : $('#b-largomax').val(),
          'largomin' : $('#b-largomin').val(),
          'obs' : $('#b-obs').val(),
          'estado' : est
        },
        beforeSend: function() {
          $('#loader').show();
        },
        success: function(data){
          $('#loader').hide();
          if (data !== "false"){
            table.destroy();
            console.log(data);
            table = $("#datatable-pr").DataTable({
              "data": data,
              "columns": [
                {"data": "estado",
                  render: function(data, type, now){
                    if (data == 1)
                      return "Activo";
                    else
                      return "Inactivo";
                  }
                },
                {"data": "diametroExterior"},
                {"data": "tolmasdiamex"},
                {"data": "tolmenosdiamex"},
                {"data": "espesorNominal"},
                {"data": "tolmasespesor"},
                {"data": "tolmenosespesor"},
                {"data": "diamein"},
                {"data": "tolmasdiamein"},
                {"data": "tolmenosdiamein"},
                {"data": "sae"},
                {"data": "tcost"},
                {"data": "normades"},
                {"data": "formades"}
              ],
              "order": [],   
              "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
                      $(nRow).attr('data-id', arrayid['id']);
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
            return true;
          }
          else{
            table.clear().draw();

            $.toast({ 
              text : "No se han encontrado resultados", 
              showHideTransition : 'slide',  
              bgColor : 'red',              
              textColor : '#eee',            
              allowToastClose : false,     
              hideAfter : 5000,              
              stack : 5,                    
              textAlign : 'left',            
              position : 'top-right'       
            });

            return flse;

          }
          
        }
      });
      
    });

    $('#enviar_m').on('click', function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      var estado = $('#estadoe').is(':checked');
      var est = 0;

      if (estado == true)
        est = 1;

      var urledit = "productos/" + idSeleccionado;

      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'nombre' : $('#e-nombre').val(),
          'diamex' : $('#e-diamex').val(),
          'tolmasdiamex' : $('#e-tolmasdiamex').val(),
          'tolmenosdiamex' : $('#e-tolmenosdiamex').val(),
          'espesor' : $('#e-espesor').val(),
          'tolmasespesor' : $('#e-tolmasespesor').val(),
          'tolmenosespesor' : $('#e-tolmenosespesor').val(),
          'diamein' : $('#e-diamein').val(),
          'tolmasdiamein' : $('#e-tolmasdiamein').val(),
          'tolmenosdiamein' : $('#e-tolmenosdiamein').val(),
          'sae' : $('#e-sae').val(),
          'tcost' : $('#e-tcost').val(),
          'estfabricacion' : $('#e-estfabricacion').val(),
          'normaid' : $('#e-norma_id').val(),
          'formaid' : $('#e-forma_id').val(),
          'rubroid' : $('#e-rubro_id').val(),
          'largomax' : $('#e-largomax').val(),
          'largomin' : $('#e-largomin').val(),
          'obs' : $('#e-obs').val(),
          'estado' : est
        },
        success: function(data){
          if(data=="true"){
            location.reload();
          }
        }
      });
    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "productos/" + idSeleccionado;
        $.ajax({  
          type: "DELETE",
          url: url,
          success: function(data){
            if (data == "true"){
              location.reload();
            }
          }
        });

    });


  });
</script>

@endsection