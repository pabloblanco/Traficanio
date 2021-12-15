@extends('layouts.app')

@section('content')

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-ver">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Costo General</h4>
              </div>



              <div class="modal-body cuerpo-modal">
               <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="row">
                      <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Ingresar La Fecha</label>
                          <div class="form-group">
                            <div class='input-group date' id='myDatepicker5'>
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
              </div>
            </div>
            <div class="ln_solid"></div>


            <div class="table-responsive">
              <table id="" class="table table-striped table-bordered table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Total Tons Terminadas</th>
                    <th>Tons Reventa</th>
                    <th>Tons MP Traficaño</th>
                    <th>Tons Producida</th>
                    <th>Gastos Generales (Total)</th>
                    <th>Gastos Generales (Reventa)</th>
                    <th>Gastos Generales (Traficaño)</th>
                    <th>Gastos Generales (Producción)</th>
                    <th>Gastos MO Total</th>
                    <th>Gastos MO Reventa</th>
                    <th>Gastos MO Traficaño</th>
                    <th>Gastos MO Producción</th>
                    
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
                  </tr>
                </tbody>
              </table>
            </div>
            

          </div>
          

        </div>

      </div>
    </div>
  </div>  <!-- /modals Ver Costo General->

  <!-- Fin de las ventanas modales-->

  <div class="right_col" role="main">



    <div class="">  

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Administrar Costos Generales</h2>
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
                      <div class='input-group date' id='myDatepicker4'>
                        <input id="date" type='text' class="form-control" />
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

                <button type="" id="buscar_date" class="btn btn-primary  btn-sm">Buscar</button>
                <button type="" class="btn btn-success  btn-sm">Limpiar</button>
              </div>
            </div>

          </br>
          <div class="ln_solid"></div>
          <!-- <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="">
              <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-ver">Ver Costo General</button>
            </li>
          </ul> -->
          <div class="clearfix"></div>
          <div class="col-md-12">

            <div class="x_title">
              <h2>Gastos Generales</h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">


               <form id="demo-form2" action="{{route('addcostoGeneral')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row">
                    <div class="form-group">

                       <input name="fecha" type="hidden" id="fecha" value="" class="form-control col-md-7 col-xs-12">
                       <input name="id_costo" id="id_costo" type="hidden" value="" class="form-control col-md-7 col-xs-12">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Gastos Reventa</label>
                        <input name="gastosGeneralesReventa" type="text" id="gastosGeneralesReventa" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Gastos De Producción</label>
                        <input name="gastosGeneralesPro" type="text" id="gastosGeneralesPro" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Gastos Totales</label>
                        <input name="gastosGenerales" type="text" id="gastosGenerales" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Ton. Reventa</label>
                        <input name="toneladasReventa" type="text" id="toneladasReventa" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Ton. Producción</label>
                        <input name="toneladasPro" type="text" id="toneladasPro" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Ton. Totales</label>
                        <input name="toneladasTotales" type="text" id="toneladasTotales" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>

              </div>
              <div class="x_title">
                <h2>Gastos Por Mano de Obra</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                  <div class="row">
                    <div class="form-group">

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Gasto MO Total</label>
                        <input name="gastoTotalesMO" type="text" id="gastoTotalesMO" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Gasto MO Reventa</label>
                        <input name="gastoReventaMO" type="text" id="gastoReventaMO" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Gasto MO Producción</label>
                        <input name="gastoProMO" type="text" id="gastoProMO" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-delete">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                  
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
       <!-- /page content -->

@endsection

@section('js_extra')
<script type="text/javascript">
  $(function(){

  $('#buscar_date').on('click', function(){
    var date = $("#date").val();
    $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
    });
    var url = "showcostoGeneral/";
    $.ajax({  
        type: "get",
        url: url,
        data: {
          'date' : date
        },
        success: function(data){
          if (data != "false"){
            var datos = JSON.parse(data);
            $("#gastosGeneralesReventa").val(datos.gastosGeneralesReventa);
            $("#gastosGeneralesMPT").val(datos.gastosGeneralesMPT);
            $("#gastosGeneralesPro").val(datos.gastosGeneralesPro);
            $("#gastosGenerales").val(datos.gastosGenerales);
            $("#toneladasReventa").val(datos.toneladasReventa);
            $("#toneladasPro").val(datos.toneladasPro);
            $("#toneladasTotales").val(datos.toneladasTotales);
            $("#gastoTotalesMO").val(datos.gastoTotalesMO);
            $("#gastoReventaMO").val(datos.gastoReventaMO);
            $("#toneladasTotales").val(datos.toneladasTotales);
            $("#gastoProMO").val(datos.gastoProMO);
            $("#fecha").val(datos.fecha);
            $("#id_costo").val(datos.id);

          }
          else{
            $("#gastosGeneralesReventa").val("");
            $("#gastosGeneralesMPT").val("");
            $("#gastosGeneralesPro").val("");
            $("#gastosGenerales").val("");
            $("#toneladasReventa").val("");
            $("#toneladasPro").val("");
            $("#toneladasTotales").val("");
            $("#gastoTotalesMO").val("");
            $("#gastoReventaMO").val("");
            $("#toneladasTotales").val("");
            $("#gastoProMO").val("");
            $("#fecha").val(date);
            $("#id_costo").val("0");
          }
        }
    });
  });


  });
</script>
@endsection