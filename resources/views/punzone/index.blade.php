@extends('layouts.app')

@section('content')

    <!--  modal Agregar punzon-->

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Agregar Punzones</h4>
          </div>
          <div class="modal-body cuerpo-modal">
            <form action="{{route('punzones.store')}}  " method="post" accept-charset="utf-8">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <div class="col-md-4 col-sm-4 div-input-modal">
                  <label for="first-name" for="first-name">Diametro</label>
                  <input type="text" name="diametro" id="first-name1" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 div-input-modal">
                  <label for="first-name" for="first-name">Rosca</label>
                  <input type="text" name="rosca" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 div-input-modal">
                  <label for="first-name" for="first-name">Espesor</label>
                  <input type="text" name="espesor" id="first-name3" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 div-input-modal">
                  <label for="first-name" for="first-name">Observaciones</label>
                  <input type="text" name="observaciones" id="first-name4" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 div-input-modal">
                  <label class="control-label" for="first-name">Tipo Material</label>
                  <select name="tipoMaterialid" id="heard" class="form-control">
                    @foreach ($tipomateriales as  $tipom)
                    <option value="{{$tipom->id}}">{{$tipom->descripcion}}</option>
                    @endforeach 
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 div-input-modal">
                  <label class="control-label" for="first-name">Tipo Punzón</label>
                  <select name="tipoPunzonid" id="heard" class="form-control">
                    @foreach ($tipos as  $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                    @endforeach 
                  </select>
                </div>
                
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
            </form>
        </div>
      </div>
    </div>
    <!-- /modals agregar Punzones-->

    <!--  modal Eliminar  -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h5 class="modal-title" id="myModalLabel2">¿Está seguro que desea eliminar?</h5>
          </div>
          
          <div class="modal-footer">
            <button id="send_delete" type="button" class="btn btn-primary">Aceptar</button>
            <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /modals eliminar norma-->
  <!--  modal modifcar Punzones -->

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar Punzones</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form action="  " method="get" accept-charset="utf-8">

            <div class="form-group">

              <div class="col-md-4 col-sm-4 div-input-modal">
                <label for="first-name" for="first-name">Diametro</label>
                <input type="text" name="diametro" id="diametro" required="required" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label for="first-name" for="first-name">Rosca</label>
                <input type="text" name="rosca" id="rosca" required="required" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label for="first-name" for="first-name">Espesor</label>
                <input type="text" name="espesor" id="espesor" required="required" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label for="first-name" for="first-name">Observaciones</label>
                <input type="text" name="observaciones" id="observaciones" required="required" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label class="control-label" for="first-name">Tipo Material</label>
                <select name="tipoMaterialid" id="tipoMaterialid" class="form-control">
                  @foreach ($tipomateriales as  $tipom)
                  <option value="{{$tipom->id}}">{{$tipom->descripcion}}</option>
                  @endforeach 
                </select>
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label class="control-label" for="first-name">Tipo Punzón</label>
                <select name="tipoPunzonid" id="tipoPunzonid" class="form-control">
                  @foreach ($tipos as  $tipo)
                  <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach 
                </select>
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
          <button id="enviar_m" type="button" class="btn btn-primary">Guardar</button>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- /modals modificar-->


<!-- page content -->

<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Administrar Punzones</h2>

        <div class="x_content">
          <br>

          <form action="{{route('punzones.index')}}" method="get" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="type" value="1">

            <div class="form-group">

              <div class="col-md-4 col-sm-4 div-input-modal">
                <label for="first-name" for="first-name">Diametro</label>
                <input type="text" name="diametrob" id="diametrob" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label for="first-name" for="first-name">Rosca</label>
                <input type="text" name="roscab" id="roscab" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label for="first-name" for="first-name">Espesor</label>
                <input type="text" name="espesorb" id="espesorb" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label for="first-name" for="first-name">Observaciones</label>
                <input type="text" name="observacionesb" id="observacionesb" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label class="control-label" for="first-name">Tipo Material</label>
                <select name="tipoMaterialidb" id="tipoMaterialidb" class="form-control">
                  <option></option>
                  @foreach ($tipomateriales as  $tipom)
                  <option value="{{$tipom->id}}">{{$tipom->descripcion}}</option>
                  @endforeach 
                </select>
              </div>
              <div class="col-md-4 col-sm-4 div-input-modal">
                <label class="control-label" for="first-name">Tipo Punzón</label>
                <select name="tipoPunzonidb" id="tipoPunzonidb" class="form-control">
                  <option></option>
                  @foreach ($tipos as  $tipo)
                  <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach 
                </select>
              </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 ">

                <button type="submit" class="btn btn-primary  btn-sm">Buscar</button>
                <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
              </div>
            </div>

          </form>
        </div>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="">
            <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Punzones</button>


          </li>

        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width: 100%;">
          <thead>
            <tr>
              <th>Díametro</th>
              <th>Rosca</th>
              <th>Espesor</th>
              <th>Observaciones</th>
              <th>Nombre/Punzón</th>
              <th>Nombre/Material</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($arraypunzon as $punzon)
            <tr data-id="{{$punzon->id}}">
              <td>{{$punzon->diametro}}</td>
              <td>{{$punzon->rosca}}</td>
              <td>{{$punzon->espesor}}</td>
              <td>{{$punzon->observaciones}}</td>
              <td>{{$punzon->tipopunzon}}</td>
              <td>{{$punzon->tipomaterial}}</td>
            </tr>
            @empty
              No hay Registros
            @endforelse

          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-md-1">
          <button id="modificar" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Modificar</button>
        </div>
        <div class="col-md-1">
          <button type="button" id="eliminar" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
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

    $('#limpiarbusqueda').on('click', function(){
      $('#diametrob').val("");
      $('#roscab').val("");
      $('#espesorb').val("");
      $('#observacionesb').val("");
      $('#tipoMaterialidb').val("");
      $('#tipoPunzonidb').val("");
    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "punzones/" + idSeleccionado;
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

    $('#modificar').on('click', function(){
        console.log("Modicar: ", idSeleccionado);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });
        var url = "punzones/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            console.log(data);
            $("#diametro").val(data.diametro);
            $("#rosca").val(data.rosca);
            $("#espesor").val(data.espesor);
            $("#observaciones").val(data.observaciones);
            $("#tipoMaterialid").val(data.tipoMaterialid);
            $("#tipoPunzonid").val(data.tipoPunzonid);

          }
        });
    });

    $('#enviar_m').on('click', function(){
      var diametro = $("#diametro").val();
      var rosca = $("#rosca").val();
      var espesor = $("#espesor").val();
      var observaciones = $("#observaciones").val();
      var tipoMaterialid = $("#tipoMaterialid").val();
      var tipoPunzonid = $("#tipoPunzonid").val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "punzones/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'diametro' : diametro,
          'rosca' : rosca,
          'espesor' : espesor,
          'observaciones' : observaciones,
          'tipoMaterialid' : tipoMaterialid,
          'tipoPunzonid' : tipoPunzonid
        },
        success: function(data){
          if(data=="true"){
            location.reload();
          }
        }
      });
    });

  });
</script>
@endsection