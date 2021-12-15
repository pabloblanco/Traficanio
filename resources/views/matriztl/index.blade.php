@extends('layouts.app')

@section('content')

 <div class="main_container">
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Agregar Matriz TL</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="{{route('matriztls.store')}}  " method="post" accept-charset="utf-8">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">

                 <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Diametro Exterior</label>
                  <input name="diametroExterior" type="text" id="first-name"  class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Tipo Matriz</label>
                  <select name="tipoMatriz" id="heard" class="form-control" required>
                    @foreach ($tiposmatrizes as  $tipom)
                    <option value="{{$tipom->id}}">{{$tipom->descripcion}}</option>
                    @endforeach 
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Tipo De Punzón</label>
                  <select name="punzonid" id="heard" class="form-control" required>
                    @foreach ($punzones as  $punzon)
                    <option value="{{$punzon->id}}">{{$punzon->descripcion}}</option>
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
    <!-- /modals agregar  Matriz TL-->

    
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
  <!--  modal modifcar Matriz TL -->

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar Matriz TL</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form action="  " method="get" accept-charset="utf-8">

            <div class="form-group">

               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Diametro Exterior</label>
                <input name="diametroExterior" type="text" id="diametroExterior"  class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Tipo Matriz</label>
                <select id="tipoMatriz" name="tipoMatriz" class="form-control" required>
                  @foreach ($tiposmatrizes as  $tipom)
                  <option value="{{$tipom->id}}">{{$tipom->descripcion}}</option>
                  @endforeach 
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Tipo De Punzón</label>
                <select id="punzonid" name="punzonid" class="form-control" required>
                  @foreach ($punzones as  $punzon)
                  <option value="{{$punzon->id}}">{{$punzon->descripcion}}</option>
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
        <h2>Administrar Matriz TL</h2>

        <div class="x_content">
          <br>

          <form action="{{route('matriztls.index')}}" method="get" autocomplete="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type" value="1">

            <div class="form-group">

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Diametro Exterior</label>
                <input name="diametroExteriorb" id="diametroExteriorb" type="text"  class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Tipo Matriz</label>
                <select name="tipomatrizidb" id="tipomatrizidb" class="form-control">
                  <option></option>
                  @foreach ($tiposmatrizes as  $tipom)
                  <option value="{{$tipom->id}}">{{$tipom->descripcion}}</option>
                  @endforeach 
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Tipo De Punzón</label>
                <select name="tipopunzonidb" id="tipopunzonidb" class="form-control">
                  <option></option>
                  @foreach ($punzones as  $punzon)
                  <option value="{{$punzon->id}}">{{$punzon->descripcion}}</option>
                  @endforeach 
                </select>
              </div>               
            </div>

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
            <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Matriz TL</button>


          </li>

        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Díametro Exterior</th>
              <th>Descripción Matríz</th>
              <th>Descripción de Punzón</th>
            </tr>
          </thead>
          <tbody>
          	@forelse ($arraymatriz as $matriz)
            <tr data-id="{{$matriz->id}}">
              <td>{{$matriz->diametro}}</td>
              <td>{{$matriz->tipomatriz}}</td>
              <td>{{$matriz->punzon}}</td>
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
      $('#tipopunzonidb').val("");
      $('#tipomatrizidb').val("");
      $('#diametroExteriorb').val("");

    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "matriztls/" + idSeleccionado;
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
        var url = "matriztls/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            console.log(data);
            $("#diametroExterior").val(data.diametroExterior);
            $("#tipoMatriz").val(data.tipoMatriz);
            $("#punzonid").val(data.punzonid);
          }
        });
    });

    $('#enviar_m').on('click', function(){
      var diametroExterior = $("#diametroExterior").val();
      var tipoMatriz = $("#tipoMatriz").val();
      var punzonid = $("#punzonid").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "matriztls/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'diametroExterior' : diametroExterior,
          'tipoMatriz' : tipoMatriz,
          'punzonid' : punzonid
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