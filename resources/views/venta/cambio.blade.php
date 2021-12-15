@extends('layouts.app')

@section('content')

 <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Ingrese el valor de cambio del día</h2>
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
                  <h5><strong>Última Cotización: ${{$cambio->cambio}} - El {{Carbon\Carbon::parse($cambio->fecha)->format('d/m/Y') }}</strong></h5>
                  <form id="demo-form2" action="{{route('addcambio')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                    <div class="row">
                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Precio del dólar</label>
                          <input name="cambio" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                      
                    </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                          <button type="" class="btn btn-primary  btn-sm">Guardar</button>
                          <button type="" class="btn btn-danger  btn-sm">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                  </div>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

@endsection