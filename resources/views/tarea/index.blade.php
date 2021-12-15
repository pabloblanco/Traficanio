@extends('layouts.app')

@section('content')

      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Agregar Tarea/Objetivo</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="{{route('tareas.store')}} " method="post" accept-charset="utf-8">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                  <div class="form-group">

                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Tipo</label>
                      <select name="tipoTareaid" id="heard" class="form-control">
                      @foreach ($tipotareas as  $tipotarea)
	                    	<option value="{{$tipotarea->id}}">{{$tipotarea->descripcion}}</option>
	                    @endforeach
                      </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Ferecuencia</label>
                      <select name="frecuenciaid" id="heard" class="form-control">
                        @foreach ($frecuencias as  $frecuencia)
	                    	<option value="{{$frecuencia->id}}">{{$frecuencia->descripcion}}</option>
	                    @endforeach
                      </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Usuario</label>
                      <select name="userid" id="heard" class="form-control">
                        @foreach ($usuarios as  $usuario)
	                    	<option value="{{$usuario->id}}">{{$usuario->usuario}}</option>
	                    @endforeach
                      </select>
                    </div>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                   <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Prioridad</label>
                    <select name="prioridadid" id="heard" class="form-control">
                      @foreach ($prioridades as  $prioridad)
	                    	<option value="{{$prioridad->id}}">{{$prioridad->descripcion}}</option>
	                  @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Estado</label>
                    <select name="estadoid" id="heard" class="form-control">
                      @foreach ($estadotareas as  $estado)
	                    	<option value="{{$estado->id}}">{{$estado->descripcion}}</option>
	                  @endforeach
                    </select>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="first-name">Asunto</label>
                  <input name="tareaobjetivo" type="text" id="" class="form-control col-md-7 col-xs-12">
                </div> 

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="first-name">Fecha</label>
                  <div class='input-group date' id='DatepickerTarea'>
                    <input name="fechaPrometida" type='text' class="form-control" />
                    <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                    </span>
                  </div>
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
    <!-- /modals agregar -->

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
  <!--  modal modifcar -->

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar</h4>
        </div>
                    <div class="modal-body cuerpo-modal">
                      <form action="{{route('tareas.store')}} " method="post" accept-charset="utf-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                          <div class="form-group">

                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Tipo</label>
                              <select name="tipoTareaid" id="tipoTareaid" class="form-control">
                                @foreach ($tipotareas as  $tipotarea)
                                <option value="{{$tipotarea->id}}">{{$tipotarea->descripcion}}</option>
                              @endforeach
                              </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Ferecuencia</label>
                              <select name="frecuenciaid" id="frecuenciaid" class="form-control">
                                @foreach ($frecuencias as  $frecuencia)
                                <option value="{{$frecuencia->id}}">{{$frecuencia->descripcion}}</option>
                              @endforeach
                              </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Usuario</label>
                              <select name="userid" id="userid" class="form-control">
                                @foreach ($usuarios as  $usuario)
                                <option value="{{$usuario->id}}">{{$usuario->usuario}}</option>
                              @endforeach
                              </select>
                            </div>
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                           <div class="col-md-4 col-sm-4 col-xs-12">
                            <label class="control-label" for="first-name">Prioridad</label>
                            <select name="prioridadid" id="prioridadid" class="form-control">
                              @foreach ($prioridades as  $prioridad)
                                <option value="{{$prioridad->id}}">{{$prioridad->descripcion}}</option>
                            @endforeach
                            </select>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <label class="control-label" for="first-name">Estado</label>
                            <select name="estadoid" id="estadoid" class="form-control">
                              @foreach ($estadotareas as  $estado)
                                <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Asunto</label>
                          <input type="text" id="tareaobjetivo" class="form-control col-md-7 col-xs-12">
                        </div> 

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Fecha</label>
                          <div class='input-group date' id='DatepickerTareaPUT'>
                            <input autocomplete="off" name="fechaPrometida" id="fechaPrometida" type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                  </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
          <button id="enviar_m" type="button" class="btn btn-primary">Guardar</button>
        </div>
      </form>

      </div>

    </div>
  </div>
</div>  <!-- /modals modificar-->






<!-- Fin de las ventanas modales-->

<div class="right_col" role="main">



  <div class="">  

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Administrar Tareas/Objetivos</h2>
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
              <form action="{{route('tareas.index')}}" method="get">
                

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Tipo</label>
                    <select id="tipotareaidb" name="tipotareaid" class="form-control">
                      <option value=""></option>
                      @foreach ($tipotareas as  $tipotarea)
                        <option value="{{$tipotarea->id}}">{{$tipotarea->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Ferecuencia</label>
                    <select id="frecuenciaidb" name="frecuenciaid" class="form-control">
                      <option value=""></option>
                      @foreach ($frecuencias as  $frecuencia)
                        <option value="{{$frecuencia->id}}">{{$frecuencia->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Usuario</label>
                    <select id="usuarioidb" name="usuarioid" class="form-control">
                      <option value=""></option>
                      @foreach ($usuarios as  $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->usuario}}</option>
                      @endforeach
                    </select>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="form-group">
                 <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Prioridad</label>
                  <select id="prioridadidb" name="prioridadid" class="form-control">
                    <option value=""></option>
                      @foreach ($prioridades as  $prioridad)
                        <option value="{{$prioridad->id}}">{{$prioridad->descripcion}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Estado</label>
                  <select id="estadosidb" name="estadoid" class="form-control">
                    <option value=""></option>
                      @foreach ($estadotareas as  $estado)
                        <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                      @endforeach
                  </select>
                </div>
              </div>

            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 ">
                <button type="submit" class="btn btn-primary  btn-sm">Buscar</button>
                <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
              </div>
            </div>
          </form>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="">
              <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Tarea/Objetivo</button>


            </li>

          </ul>
          <div class="clearfix"></div>
          <div class="x_content">

            <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width: 100%">
              <thead>
                <tr>
                  <th>Tipo</th>
                  <th>Tarea/Objetivo</th>
                  <th>Fecha Prometida</th>
                  <th>Usuario</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
              	@forelse ($arraytarea as $tarea)
                <tr data-id="{{$tarea->id}}">
                  <td>{{$tarea->tipotarea}}</td>
                  <td>{{$tarea->tarea}}</td>
                  <td>{{Carbon\Carbon::parse($tarea->fecha)->format('d/m/Y') }}</td>
                  <td>{{$tarea->usuario}}</td>
                  <td>{{$tarea->estado}}</td>
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

    $("#limpiarbusqueda").on('click', function(){
      $("#tipotareaidb").val("");
      $("#frecuenciaidb").val("");
      $("#usuarioidb").val("");
      $("#estadosidb").val("");
      $("#prioridadidb").val(""); 
    });


    $("#buscartarea").on('click', function(){
      var tipotareaid = $("#tipotareaidb").val();
      var frecuenciaid= $("#frecuenciaidb").val();
      var usuarioid = $("#usuarioidb").val();
      var estadoid = $("#estadosidb").val();
      var prioridadid = $("#prioridadidb").val();
      console.log("entro");

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      var urledit = "{{route('tareas.index')}}";

      $.ajax({  
        type: "get",
        url: urledit,
        data: {
          'tipotareaid': tipotareaid,
          'frecuenciaid': frecuenciaid,
          'usuarioid': usuarioid,
          'estadoid': estadoid,
          'prioridadid': prioridadid
        },
        success: function(data){
        
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
        var url = "tareas/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            console.log(data);
            $("#tipoTareaid").val(data.tipoTareaid);
            $("#frecuenciaid").val(data.frecuenciaid);
            $("#userid").val(data.userid);
            $("#prioridadid").val(data.prioridadid);
            $("#tareaobjetivo").val(data.tareaObjetivo);
            $("#fechaPrometida").val(data.fechaPrometida);
            $("#detalle").val(data.detalle);
            $("#estadoid").val(data.estadoid);
          }
        });
    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "tareas/" + idSeleccionado;
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
      var tipoTareaid = $("#tipoTareaid").val();
      var frecuenciaid = $("#frecuenciaid").val();
      var userid = $("#userid").val();
      var prioridadid = $("#prioridadid").val();
      var tareaObjetivo = $("#tareaobjetivo").val();
      var fechaPrometida = $("#fechaPrometida").val();
      var detalle = $("#detalle").val();
      var estadoid = $("#estadoid").val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "tareas/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'tipoTareaid' : tipoTareaid,
          'frecuenciaid' : frecuenciaid,
          'userid' : userid,
          'prioridadid' : prioridadid,
          'tareaObjetivo' : tareaObjetivo,
          'fechaPrometida' : fechaPrometida,
          'detalle' : detalle,
          'estadoid' : estadoid
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
