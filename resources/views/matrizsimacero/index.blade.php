@extends('layouts.app')

@section('content')

           <!--  modal Agregar Matrizl  Matriz Simple Acero-->
           <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
             <div class="modal-dialog modal-md">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                   </button>
                   <h4 class="modal-title" id="myModalLabel2">Agregar Matriz Simple Acero</h4>
                 </div>
                 <div class="modal-body cuerpo-modal">
                   <form action="{{route('matrizsimaceros.store')}}" method="post" accept-charset="utf-8">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="form-group">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Número</label>
                       <input autocomplete="off" name="numero" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Diametro Nominal</label>
                       <input autocomplete="off" name="diametroNominal" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Entrada</label>
                       <input autocomplete="off" name="entrada" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Alt. Zona Util</label>
                       <input autocomplete="off" name="altZonaUtil" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                     </div> 
                      <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Diametro Matriz</label>
                       <input autocomplete="off" name="diametroMatriz" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Alt Matriz</label>
                       <input autocomplete="off" name="altoMatriz" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-12 col-sm-12 col-xs-12">
                       <label class="control-label" for="first-name">Observaciones</label>
                       <input autocomplete="off" name="observaciones" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
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
         <!-- /modals agregar  Matriz Simple Acero-->

         
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
       <!--  modal modifcar  Matriz Simple Acero -->

       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
         <div class="modal-dialog modal-md">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Modificar Matriz Simple Acero</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form action="  " method="get" accept-charset="utf-8">

                 <div class="form-group">

                   <div class="col-md-4 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Número</label>
                     <input autocomplete="off" name="numero" type="text" id="numero" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-4 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Diametro Nominal</label>
                     <input autocomplete="off" name="diametroNominal" type="text" id="diametroNominal" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-4 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Entrada</label>
                     <input autocomplete="off" name="entrada" type="text" id="entrada" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-4 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Alt. Zona Util</label>
                     <input autocomplete="off" name="altZonaUtil" type="text" id="altZonaUtil" class="form-control col-md-7 col-xs-12">
                   </div> 
                    <div class="col-md-4 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Diametro Matriz</label>
                     <input autocomplete="off" name="diametroMatriz" type="text" id="diametroMatriz" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-4 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Alt Matriz</label>
                     <input autocomplete="off" name="altoMatriz" type="text" id="altoMatriz" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class="control-label" for="first-name">Observaciones</label>
                     <input autocomplete="off" name="observaciones" type="text" id="observaciones" class="form-control col-md-7 col-xs-12">
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
             <h2>Administrar Matriz Simple Acero</h2>

             <div class="x_content">
               <br>

               <form action="{{route('matrizsimaceros.index')}}" method="get" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="type" value="1">

                 <div class="form-group">

                      <div class="col-md-3 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Número</label>
                       <input type="text" name="numerob" id="numerob" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Diametro Nominal</label>
                       <input type="text" name="diametroNominalb" id="diametroNominalb" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Entrada</label>
                       <input name="entradab" type="text" id="entradab" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Alt. Zona Util</label>
                       <input name="altZonaUtilb" type="text" id="altZonaUtilb" class="form-control col-md-7 col-xs-12">
                     </div> 
                      <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Diametro Matriz</label>
                       <input name="diametroMatrizb" type="text" id="diametroMatrizb" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Alt Matriz</label>
                       <input name="altoMatrizb" type="text" id="altoMatrizb" class="form-control col-md-7 col-xs-12">
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
               <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Matriz Simple Acero</button>


             </li>

           </ul>
           <div class="clearfix"></div>
         </div>
         <div class="x_content">

           <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
             <thead>
               <tr>
                 <th>Número</th>
                 <th>Diametro Nominal</th>
                 <th>Ang</th>
                 <th>Entrada</th>
                 <th>Alt. Zona Util</th>
                 <th>Diametro Matriz</th>
                 <th>Alt Matriz</th>
                 <th>Observaciones</th>
               </tr>
             </thead>
             <tbody>
              @forelse ($matrizes as $matriz)
               <tr data-id="{{$matriz->id}}">
                 <td>{{$matriz->numero}}</td>
                 <td>{{$matriz->diametroNominal}}</td>
                 <td>{{$matriz->ang}}</td>
                 <td>{{$matriz->entrada}}</td>
                 <td>{{$matriz->altZonaUtil}}</td>
                 <td>{{$matriz->diametroMatriz}}</td>
                 <td>{{$matriz->altoMatriz}}</td>
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

    $('#limpiarbusqueda').on('click', function(){
      $('#numerob').val("");
      $('#diametroNominalb').val("");
      $('#entradab').val("");
      $('#altZonaUtilb').val("");
      $('#diametroMatrizb').val("");
      $('#altoMatrizb').val("");
      $('#observacionesb').val("");
    });


    $('#modificar').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });
        var url = "matrizsimaceros/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            $("#numero").val(data.numero);
            $("#diametroNominal").val(data.diametroNominal);
            $("#ang").val(data.ang);
            $("#entrada").val(data.entrada);
            $("#altZonaUtil").val(data.altZonaUtil);
            $("#diametroMatriz").val(data.diametroMatriz);
            $("#altoMatriz").val(data.altoMatriz);
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

        var url = "matrizsimaceros/" + idSeleccionado;
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
      var diametroNominal = $("#diametroNominal").val();
      var ang = $("#ang").val();
      var entrada = $("#entrada").val();
      var altZonaUtil = $("#altZonaUtil").val();
      var diametroMatriz = $("#diametroMatriz").val();
      var altoMatriz = $("#altoMatriz").val();
      var observaciones = $("#observaciones").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "matrizsimaceros/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'numero' : numero,
          'diametroNominal' : diametroNominal,
          'ang' : ang,
          'entrada' : entrada,
          'altZonaUtil' : altZonaUtil,
          'diametroMatriz' : diametroMatriz,
          'altoMatriz' : altoMatriz,
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