@extends('layouts.app')

@section('content')

 <!--  modal Agregar Norma -->
 <div class="main_container">
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Agregar Estado Fabricacion</h4>
            </div>
              <div class="modal-body cuerpo-modal">
            <form action="{{route('fabricaciones.store')}} " method="post" accept-charset="utf-8" autocomplete="off">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">

                  <div class="col-md-12 col-sm-12 div-input-modal">
                    <label for="first-name">Nombre</label>
                    <input name="descripcion" type="text" id="first-name1" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                   <div class="col-md-12 col-sm-12 div-input-modal">
                    <label for="first-name">Detalle</label>
                    <input name="detalle" type="text" id="first-name1" required="required" class="form-control col-md-7 col-xs-12">
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
      <!-- /modals agregar norma-->


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
      <!--  modal modifcar Norma -->

      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Modificar Estado Fabricacion</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="  " method="get" accept-charset="utf-8" autocomplete="off">

                <div class="form-group">
                  <div class="col-md-12 col-sm-12 div-input-modal">
                    <label for="first-name">Nombre</label>
                    <input name="descripcione" id="descripcione" type="text" id="first-name1" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                   <div class="col-md-12 col-sm-12 div-input-modal">
                    <label for="first-name">Detalle</label>
                    <input name="detallee" id="detallee" type="text" id="first-name1" required="required" class="form-control col-md-7 col-xs-12">
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
 </div>



    <!-- page content -->
    <div class="right_col" role="main">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Administrar Estado Fabricaciones</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="">
                <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Estado Fabricacion</button>


              </li>

            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Detalle</th>
                </tr>
              </thead>
              <tbody>
              	@forelse ($fabricacions as $norma)
                <tr data-id="{{$norma->id}}">
                  <td>{{$norma->descripcion}}</td>
                  <td>{{$norma->detalle}}</td>
                </tr>
                @empty
                	Sin Registros
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

      var url = "fabricaciones/" + idSeleccionado;
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
        var url = "fabricaciones/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            console.log(data);
            $("#descripcione").val(data.descripcion);
            $("#detallee").val(data.detalle);
          }
        });
    });

    $('#enviar_m').on('click', function(){
      var descripcion = $("#descripcione").val();
      var detalle = $("#detallee").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "fabricaciones/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'descripcion' : descripcion,
          'detalle' : detalle
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