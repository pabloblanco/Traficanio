@extends('layouts.app')

@section('content')

      <!--  modal Agregar Cabeza de Turco-->

      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Agregar Cabeza de Turco</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="{{route('cabezaturcos.store')}}" method="post" accept-charset="utf-8">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">

               <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Número</label>
                  <input autocomplete="off" name="numero" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Medida Entrada</label>
                  <input autocomplete="off" name="diametroEntrada" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Medida Rodillo</label>
                  <input autocomplete="off" name="medidaRodillo" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
    <!-- /modals agregar  Cabeza de Turco-->

    
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
  <!--  modal modifcar  Cabeza de Turco -->

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar Cabeza Turco</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form action="" method="post" accept-charset="utf-8">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">

              <div class="col-md-4 col-sm-4 col-xs-12">
                 <label class="control-label" for="first-name">Número</label>
                 <input autocomplete="off" name="numero" id="numero" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                 <label class="control-label" for="first-name">Medida Entrada</label>
                 <input autocomplete="off" name="diametroEntrada" id="diametroEntrada" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                 <label class="control-label" for="first-name">Medida Rodillo</label>
                 <input autocomplete="off" name="medidaRodillo" id="medidaRodillo" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
</div>
<!-- /modals modificar-->


<!-- page content -->

<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Administrar Cabeza Turco</h2>

        <div class="x_content">
          <br>

          <form action="{{route('cabezaturcos.index')}}" method="get" autocomplete="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type" value="1">

            <div class="form-group">

             <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Número</label>
              <input name="numerob" type="text" id="numerob" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Medida Entrada</label>
              <input name="medidaentradab" type="text" id="medidaentradab" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Medida Rodillo</label>
              <input name="medidarodillob" type="text" id="medidarodillob" class="form-control col-md-7 col-xs-12">
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
          <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Cabeza Turco</button>


        </li>

      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Número</th>
            <th>Medida de Entrada</th>
            <th>Medida Rodillo</th>
          </tr>
        </thead>
        <tbody>
         @forelse ($cabezas as $cabeza)
          <tr data-id="{{$cabeza->id}}">
            <td>{{$cabeza->numero}}</td>
            <td>{{$cabeza->diametroEntrada}}</td>
            <td>{{$cabeza->medidaRodillo}}</td>
          </tr>
         @empty
         	No hay registros
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



    $('#modificar').on('click', function(){
        console.log("Modicar: ", idSeleccionado);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });
        var url = "cabezaturcos/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            console.log(data.medidaRodillo);
            $("#numero").val(data.numero);
            $("#diametroEntrada").val(data.diametroEntrada);
            $("#medidaRodillo").val(data.medidaRodillo);
          }
        });
    });

    $('#limpiarbusqueda').on('click', function(){
      $('#medidarodillob').val("");
      $('#medidaentradab').val("");
      $('#numerob').val("");

    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "cabezaturcos/" + idSeleccionado;
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
      var numero = $("#numero").val();
      var diametroEntrada = $("#diametroEntrada").val();
      var medidaRodillo = $("#medidaRodillo").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "cabezaturcos/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'numero' : numero,
          'diametroEntrada' : diametroEntrada,
          'medidaRodillo' : medidaRodillo
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