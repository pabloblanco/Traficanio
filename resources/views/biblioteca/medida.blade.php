@extends('layouts.app')

@section('content')

<div class="right_col" role="main">

  <div class="">  

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Consultar Historial Por Medida</h2>
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

            <div class="form-group">
              <div  class="row">
                <div class="col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-5 col-xs-12">
                  <label class="control-label" for="first-name">Diametro Exterior</label>
                </div>
              </div>
              <div  class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Desde</label>
                  <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Hasta</label>
                  <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div  class="row">
                <div class="col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-5 col-xs-12">
                  <label class="control-label" for="first-name">Espesor Nominal</label>
                </div>
              </div>
              <div  class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Desde</label>
                  <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Hasta</label>
                  <input type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
            

              <div  class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Motivo</label>
                  <select id="" class="form-control" required>
                    <option value=""></option>
                    @foreach ($motivos as $motivo)
                      <option value="{{$motivo->id}}">{{$motivo->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Tratamiento Térmico</label>
                  <select id="" class="form-control" required>
                    <option value=""></option>
                    @foreach ($tratamientos as $tratamiento)
                      <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Costura</label>
                  <select id="" class="form-control" required>
                    <option value=""></option>
                    @foreach ($tipos as $tipo)
                      <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label class="control-label" for="first-name">Uso</label>
                  <select id="" class="form-control" required>
                    <option value=""></option>
                    @foreach ($usos as $uso)
                      <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                    @endforeach
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
            <div class="col-md-4 col-sm-4 col-xs-12">

            </div>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              

            </ul>
            <div class="clearfix"></div>
            <div class="x_content">

              <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th>Diam. Exterior (Desde)</th>
                    <th>Diam. Exterior (Hast)</th>
                    <th>Esp. Nominal (Hasta)</th>
                    <th>Esp. Nominal (DEsde)</th>
                    <th>Motivo</th>
                    <th>Tratamineto Term.</th>
                    <th>Tipo de costura</th>
                    <th>Uso</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>23</td>
                    <td>34</td>
                    <td>43</td>
                    <td>45</td>
                    <td>Revisión</td>
                    <td ></td>
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
<!-- /page content -->

@endsection