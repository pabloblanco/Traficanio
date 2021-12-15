@extends('layouts.app')

@section('content')

 <!--  modal Agregar Matrizl  Matriz Simple Widia-->

      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Agregar Matriz Simple Widia</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="{{route('matrizsimwidias.store')}}" method="post" accept-charset="utf-8">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                 <div class="col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label">Diametro</label>
                  <input name="diametro" type="text" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label">Diametro Exterior</label>
                  <input name="de" type="text" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label">Diametro Nominal</label>
                  <input name="dn" type="text" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label">HN</label>
                  <input name="hn" type="text" class="form-control col-md-7 col-xs-12">
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label">DC</label>
                  <input name="dc" type="text" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label">HC</label>
                  <input name="hc" type="text" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-8 col-xs-12">
                  <label class="control-label">Observaciones</label>
                  <input name="observaciones" type="text" class="form-control col-md-7 col-xs-12">
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
    <!-- /modals agregar  Matriz Simple Widia-->

    
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
  <!--  modal modifcar  Matriz Simple Widia -->

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar Matriz Simple Widia</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form action="  " method="get" accept-charset="utf-8">

            <div class="form-group">

              <div class="col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Diametro</label>
                  <input name="diametro" id="diametro" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Diametro Exterior</label>
                  <input name="de" id="de" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Diametro Nominal</label>
                  <input name="dn" id="dn" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">HN</label>
                  <input name="hn" id="hn" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">DC</label>
                  <input name="dc" id="dc" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">HC</label>
                  <input name="hc" id="hc" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-8 col-xs-12">
                  <label class="control-label" for="first-name">Observaciones</label>
                  <input name="observaciones" id="observaciones" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
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
        <h2>Administrar Matriz Simple Widia</h2>

        <div class="x_content">
          <br>

          <form action="{{route('matrizsimwidias.index')}}" method="get" autocomplete="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type" value="1">

            <div class="form-group">

             <div class="col-md-3 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Diametro</label>
              <input name="diametrob" type="text" id="diametrob" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Diametro Exterior</label>
              <input name="diametroeb" type="text" id="diametroeb" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Diametro Nominal</label>
              <input name="diametroNominalb" type="text" id="diametroNominalb" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">HN</label>
              <input name="hnb" type="text" id="hnb" class="form-control col-md-7 col-xs-12">
            </div> 
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">DC</label>
              <input name="dcb" type="text" id="dcb" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">HC</label>
              <input name="hcb" type="text" id="hcb" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-4 col-sm-8 col-xs-12">
              <label class="control-label" for="first-name">Observaciones</label>
              <input name="observacionesb" type="text" id="observacionesb" class="form-control col-md-7 col-xs-12">
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
          <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Matriz Simple Widia</button>


        </li>

      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Diametro</th>
            <th>Ang</th>
            <th>Diametro Exterior</th>
            <th>Diametro Nominal</th>
            <th>HN</th>
            <th>DC</th>
            <th>HC</th>
            <th>Observaciones</th>
          </tr>
        </thead>
        <tbody>
         @forelse ($matrizes as $matriz)
          <tr data-id="{{$matriz->id}}">
            <td>{{$matriz->diametro}}</td>
            <td>{{$matriz->ang}}</td>
            <td>{{$matriz->de}}</td>
            <td>{{$matriz->dn}}</td>
            <td>{{$matriz->hn}}</td>
            <td>{{$matriz->dc}}</td>
            <td>{{$matriz->hc}}</td>
            <td>{{$matriz->observaciones}}</td>
          </tr>
         @empty
         	No hay registros
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
      $('#diametroeb').val("");
      $('#diametroNominalb').val("");
      $('#hnb').val("");
      $('#dcb').val("");
      $('#hcb').val("");
      $('#observacionesb').val("");
    });

    $('#modificar').on('click', function(){
        console.log("Modicar: ", idSeleccionado);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });
        var url = "matrizsimwidias/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            $("#diametro").val(data.diametro);
            $("#de").val(data.de);
            $("#dn").val(data.dn);
            $("#hn").val(data.hn);
            $("#dc").val(data.dc);
            $("#hc").val(data.hc);
            $("#observaciones").val(data.observaciones);
          }
        });
    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "matrizsimwidias/" + idSeleccionado;
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

    $('#enviar_m').on('click', function(){
      var diametro = $("#diametro").val();
      var de = $("#de").val();
      var dn = $("#dn").val();
      var hn = $("#hn").val();
      var dc = $("#dc").val();
      var hc = $("#hc").val();
      var observaciones = $("#observaciones").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "matrizsimwidias/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'diametro' : diametro,
          'de' : de,
          'dn' : dn,
          'hn' : hn,
          'dc' : dc,
          'hc' : hc,
          'observaciones' : observaciones,
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