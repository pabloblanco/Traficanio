@extends('layouts.app')

@section('content')

      <!-- page content -->
      <!-- SECCION DE LOS MODALS-->
      <!--  modal eliminar-->
      <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">¿Está seguro que desea eliminar?</h4>
            </div>
            <div class="modal-body cuerpo-modal">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cancelar</button>

            </div>
          </div>
        </div>
      </div>
      
      <!-- /cerrar modals Eliminar-->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Ubicación</h2>
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
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Enviar</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Buscar</a>
                      </li>
                      
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form action="{{route('addubicacion')}}" method="post" accept-charset="utf-8">
                          <div class="form-group">
                            <div class="row">

                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <label class="control-label" for="first-name">N° De Orden</label>
                                <input name="nro_orden" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              </div>


                            </div>
                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Ubicación</label>
                                
                              </div>
                            </div>
                            <div class="row">

                              <div class="col-md-2 col-sm-2 col-xs-12">

                                <select name="ubicacion" class="form-control" required>
                                  @foreach(range('A', 'G') as $letra)
                                    <option value={{$letra}}> {{$letra}} </option>
                                  @endforeach                                  
                                </select>
                              </div>
                              <div class="col-md-2 col-sm-2 col-xs-12">

                                <select name="ubicacion2" class="form-control" required>
                                  @for ($i = 1; $i < 24; $i++)
                                     <option value="{{$i}}"> {{ $i }} </option>
                                  @endfor
                                </select>
                              </div>
                                @if (session('status'))
                                    <div class="alert alert-success col-md-2 col-sm-2 col-xs-2">
                                        {{ session('status') }}
                                    </div>
                                @endif

                            </div>



                          </div>
                          

                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                              <button type="submit" class="btn btn-primary  btn-sm">Guardar</button>
                              
                            </div>
                          </div>
                        </form>
                        

                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                        <div class="ln_solid"></div>
                        <div class="clearfix"></div>
                        <div class="x_content">
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label class="control-label" for="first-name">N° De Orden</label>
                                  <input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                </div> 
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label class="control-label" for="first-name">Cliente</label>
                                  <select id="" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($clientes as $cliente)
                                      <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                
              
                              </div>

                               <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label class="control-label" for="first-name">Ubicación</label>
                                  </div> 
                                </div>
                              <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 
                                  <input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  
                                  <input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                              </div>
                               <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label class="control-label" for="first-name">Diametro Exterior</label>
                                  </div> 
                                </div>
                              <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <label class="control-label" for="first-name">Desde</label>
                                  <input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label class="control-label" for="first-name">Hasta</label>
                                  <input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                              </div>
                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label class="control-label" for="first-name">Diametro Interior</label>
                                  </div> 
                                </div>
                              <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <label class="control-label" for="first-name">Desde</label>
                                  <input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label class="control-label" for="first-name">Hasta</label>
                                  <input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                              </div>
                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label class="control-label" for="first-name">Espesor</label>
                                  </div> 
                                </div>
                              <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <label class="control-label" for="first-name">Desde</label>
                                  <input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                </div> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label class="control-label" for="first-name">Hasta</label>
                                  <input type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
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
                          <div class="row">
                           <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr class="headings">
                                  <th>Ejecutar</th>
                                  <th class="column-title">N° De Orden</th>
                                  <th class="column-title">Estado</th>
                                  <th class="column-title">Cliente</th>
                                  <th class="column-title">Ubicación</th>
                                  <th class="column-title">Di. Ext</th>
                                  <th class="column-title">Esp</th>
                                  <th class="column-title">Cost</th>

                                  <th class="column-title">Kilos</th>

                                  <th class="column-title">Piezas</th> 
                                  <th class="column-title">Transporte</th>
                                  <th class="column-title">Metros</th>
                                  <th class="column-title">Longitud</th>
                                  <th class="column-title">Norma</th>
                                  <th class="column-title">OC</th>
                                  <th class="column-title">Saldo Kilos</th>
                                  <th class="column-title">Saldo Piezas</th>
                                  <th class="column-title">Saldo Metros</th>
                                  <th class="column-title">Kilos a Entregar</th>
                                  <th class="column-title">Piezas a Entregar</th> 
                                  <th class="column-title">Metros a Entregar</th>
                                  <th class="column-title">Lugar de Entrega</th> 
                                  <th class="column-title">Transporte</th>
                                  <th class="column-title">Código Cliente</th> 
                                  <th class="column-title">Precio</th> 
                                  <th class="column-title">Moneda</th>
                                  <th class="column-title">Observaciones</th>
                                  <th class="column-title">Ejecutar</th>
                                  <th class="column-title">Historial</th> 
                                 </tr>
                              </thead>
                              <tbody>
                                <tr class="even pointer">
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
                                 <td align="center"><a href="historial.html"><i class="fa fa-history"></i></a></td>

                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1">
                      <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Ejecutar</button>
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
</div>
<!-- /page content -->

@endsection