@extends('layouts.app')

@section('content')

<div class="right_col" role="main">
      <div class="">  
        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Administrar Coeficiente Por Centro</h2>
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
                <form id="demo-form2"  method="get" autocomplete="off">
                  <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                  <input type="hidden" name="type" value="1">
                  <div class="row">
                    <div class="form-group">

                     <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Ingresar La Fecha</label>
                      <div class="form-group">
                        <div class='input-group date' id='myDatepicker6'>
                          <input autocomplete="off" name="fecha" type='text' class="form-control" />
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

                  <button type="submit" class="btn btn-primary  btn-sm">Buscar</button>
                  <button type="" class="btn btn-success  btn-sm">Limpiar</button>
                </div>
              </div>
              <br>
              <div class="ln_solid"></div>


            </form>
            
            <div class="clearfix"></div>
            <div class="col-md-12">

              <div class="x_title">
                <h2>Coeficientes</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">


                <form id="demo-form2" action="{{route('addcoeficiente')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Transporte</label>
                        <input type="text" name="coeficienteTransporte"  class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Horno</label>
                        <input type="text" name="coeficienteHorno"  class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Bateas</label>
                        <input type="text" name="coeficienteBatea"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Trefila y Punta</label>
                        <input type="text" name="coeficienteTP"  class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Enderazado</label>
                        <input type="text" name="coeficienteEnderezado"  class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Corte</label>
                        <input type="text" name="coeficienteCorte"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>

                  
              </div>
              <div class="x_title">
                <h5>Coeficientes a utilizar en el cálculo de ventas (Precio por costos)</h5>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">


                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Transporte (*)</label>
                        <input value="{{$coeficiente_last->coeficienteTransporte}}" type="text" id=""  class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Horno (*)</label>
                        <input value="{{$coeficiente_last->coeficienteHorno}}" type="text" id=""  class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Bateas (*)</label>
                        <input value="{{$coeficiente_last->coeficienteBatea}}" type="text" id=""  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Trefila y Punta (*)</label>
                        <input value="{{$coeficiente_last->coeficienteTP}}" type="text" id=""  class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Enderazado (*)</label>
                        <input value="{{$coeficiente_last->coeficienteEnderezado}}" type="text" id=""  class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Corte (*)</label>
                        <input value="{{$coeficiente_last->coeficienteCorte}}" type="text" id=""  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-delete">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
                  
                </form>
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


  });
</script>
@endsection