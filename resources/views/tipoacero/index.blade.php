@extends('layouts.app')

@section('content')
  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Agregar Tipo de acero</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form action="{{route('tipoaceros.store')}}" method="post" accept-charset="utf-8">
          	<input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">

              <div class="col-md-12 col-sm-12 div-input-modal">
                <label for="first-name" for="first-name">Nombre</label>
                <input name="descripcion" type="text" id="first-name1" required="required" class="form-control col-md-7 col-xs-12">
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
  <!-- /modals agregar Tipo de acero-->

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
  <!--  modal modifcar Tipo de acero -->

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar Tipo de acero</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form action="  " method="get" accept-charset="utf-8">

            <div class="form-group">

              <div class="col-md-12 col-sm-12 div-input-modal">
                <label for="first-name" for="first-name">Nombre</label>
                <input name="descripcion" id="descripcion" type="text" id="first-name1" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
          <button type="button" id="enviar_m" class="btn btn-primary">Guardar</button>
        </div>

      </div>

    </div>
  </div>
<!-- /modals modificar-->


<!-- page content -->
<div class="right_col" role="main">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Administrar Tipo de acero</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="">
            <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar tipo de acero</button>


          </li>

        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width: 100%;">
          <thead>
            <tr>
              <th>Nombre</th>
            </tr>
          </thead>
          <tbody>
          	@forelse ($tipos as $tipo)
            <tr data-id='{{$tipo->id}}'>
              <td>{{$tipo->descripcion}}</td>
              
            </tr>
            @empty
            	No hay Registros
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-md-1">
          <button type="button" id="modificar" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Modificar</button>
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

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "tipoaceros/" + idSeleccionado;
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });
        var url = "tipoaceros/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            $("#descripcion").val(data.descripcion);
          }
        });
    });

    $('#enviar_m').on('click', function(){
      var descripcion = $("#descripcion").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "tipoaceros/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'descripcion' : descripcion
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