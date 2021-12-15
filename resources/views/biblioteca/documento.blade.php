@extends('layouts.app')

@section('content')


    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Agregar Documento</h4>
          </div>
          <div class="modal-body cuerpo-modal">
            <form method="post" action="{{route('documentos.store')}}" autocomplete="on" files='true' enctype='multipart/form-data'>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">

                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Título Del documento</label>
                  <input name="titulo" type="text" id="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Código</label>
                  <input name="codigo" type="text" id="" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Estado</label>
                  <select name="estadoid" id="" class="form-control" >
                    @foreach ($estados as  $estado)
                    	<option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                    @endforeach 
                  </select>
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Tipo</label>
                  <select name="tipoid" id="" class="form-control" >
                    @foreach ($tipos as  $tipo)
                    	<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                    @endforeach 
                  </select>
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Versión</label>
                  <input name="version" type="text" id="" class="form-control col-md-7 col-xs-12">
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Comentario</label>
                  <textarea name="comentario" class="resizable_textarea form-control" placeholder="This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out..."></textarea>
                </div>    
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name"></label>
                  <input name="file" type="file" id="" class="form-control col-md-7 col-xs-12  file-input">
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
    <!-- /modals agregar  Documento-->

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
  <!--  modal modifcar Documento-->

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar Documento</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form action="  " method="get" accept-charset="utf-8">

            <div class="form-group">

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Título Del documento</label>
                <input name="titulo" type="text" id="titulo" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Código</label>
                <input name="codigo" type="text" id="codigo" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Estado</label>
                <select name="estadoid" id="estadoid" class="form-control" >
                  @foreach ($estados as  $estado)
                    <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                  @endforeach 
                </select>
              </div> 
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Tipo</label>
                <select name="tipoid" id="tipoid" class="form-control" >
                  @foreach ($tipos as  $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach 
                </select>
              </div> 
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Versión</label>
                <input name="version" type="text" id="version" class="form-control col-md-7 col-xs-12">
              </div> 
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Comentario</label>
                <textarea name="comentario" id="comentario" class="resizable_textarea form-control"></textarea>
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

<!-- Fin de las ventanas modales-->

<!-- /modals modificar-->
<div class="right_col" role="main">



  <div class="">  

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Administrar Documento</h2>
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
            <form action="{{route('documentos.index')}}" method="get" autocomplete="off">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="type" value="1">

              <div class="form-group">

              <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="first-name">Título Del documento</label>
                  <input type="text" name="titulob" id="titulob" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Código</label>
                  <input type="text" name="codigob" id="codigob" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="first-name">Estado</label>
                  <select name="estadoidb" id="estadoidb" class="form-control" >
                    @foreach ($estados as  $estado)
                      <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                    @endforeach 
                  </select>
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="first-name">Tipo</label>
                  <select name="tipoidb" id="tipoidb" class="form-control" >
                    @foreach ($tipos as  $tipo)
                      <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                    @endforeach 
                  </select>
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="first-name">Versión</label>
                  <input type="text" name="versionb" id="versionb" class="form-control col-md-7 col-xs-12">
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
            <div class="col-md-4 col-sm-4 col-xs-12">

            </div>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="">
                <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Documento</button>


              </li>

            </ul>
            <div class="clearfix"></div>
            <div class="x_content">

              <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th>Título</th>
                    <th>Código</th>
                    <th>Versión</th>
                    <th>Tipo de documento</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                 @forelse ($arraydoc as $doc)
                  <tr data-id="{{$doc->id}}">
                    <td>{{$doc->titulo}}</td>
                    <td>{{$doc->codigo}}</td>
                    <td>{{$doc->version}}</td>
                    <td>{{$doc->tipo}}</td>
                    <td>{{$doc->estado}}</td>
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
                <button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
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
      $('#titulob').val("");
      $('#codigob').val("");
      $('#estadoidb').val("");
      $('#tipoidb').val("");
      $('#versionb').val("");
    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "documentos/" + idSeleccionado;
        console.log(url);
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
        var url = "documentos/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            console.log(data);
            $("#titulo").val(data.titulo);
            $("#codigo").val(data.codigo);
            $("#estadoid").val(data.estadoid);
            $("#tipoid").val(data.tipoid);
            $("#version").val(data.version);
            $("#comentario").val(data.comentario);

          }
        });
    });

    $('#enviar_m').on('click', function(){
      var titulo = $("#titulo").val();
      var codigo = $("#codigo").val();
      var estadoid = $("#estadoid").val();
      var tipoid = $("#tipoid").val();
      var version = $("#version").val();
      var comentario = $("#comentario").val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "documentos/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'titulo' : titulo,
          'codigo' : codigo,
          'estadoid' : estadoid,
          'tipoid' : tipoid,
          'version' : version,
          'comentario' : comentario
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