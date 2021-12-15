@extends('layouts.app')

@section('content')

    <!--  modal Agregar punzon-->	
	    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
	      <div class="modal-dialog modal-md">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	            </button>
	            <h4 class="modal-title" id="myModalLabel2">Agregar Matríz Bronson</h4>
	          </div>
	          <div class="modal-body cuerpo-modal">
	            <form action="{{route('matrizbronsons.store')}}" method="post" accept-charset="utf-8">
	            	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	              <div class="form-group">

	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <label class="control-label" for="first-name">Medidas Pulgada</label>
	                  <input name="medidasPulgada" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
	                </div>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <label class="control-label" for="first-name">Medidas Milímetro</label>
	                  <input name="medidaMilimetro" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
	                </div>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <label class="control-label" for="first-name">Diametro Boca</label>
	                  <input name="diametroBoca" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
	                </div>

	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <label class="control-label" for="first-name">Tipo Material</label>
	                  <select name="tipoMaterialid" id="heard" class="form-control" >
	                    @foreach ($tipomateriales as  $tipom)
	                    	<option value="{{$tipom->id}}">{{$tipom->descripcion}}</option>
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
	          <h4 class="modal-title" id="myModalLabel2">Modificar Matríz Bronson</h4>
	        </div>
	        <div class="modal-body cuerpo-modal">
	          <form action="  " method="get" accept-charset="utf-8">

	            <div class="form-group">

	              <div class="col-md-6 col-sm-6 col-xs-12">
	                <label class="control-label" for="first-name">Medidas Pulgada</label>
	                <input name="medidasPulgada" type="text" id="medidasPulgada" class="form-control col-md-7 col-xs-12">
	              </div>
	              <div class="col-md-6 col-sm-6 col-xs-12">
	                <label class="control-label" for="first-name">Medidas Milímetro</label>
	                <input name="medidaMilimetro" type="text" id="medidaMilimetro" class="form-control col-md-7 col-xs-12">
	              </div>
	              <div class="col-md-6 col-sm-6 col-xs-12">
	                <label class="control-label" for="first-name">Diametro Boca</label>
	                <input name="diametroBoca" type="text" id="diametroBoca" class="form-control col-md-7 col-xs-12">
	              </div>

	              <div class="col-md-6 col-sm-6 col-xs-12">
	                <label class="control-label" for="first-name">Tipo Material</label>
	                <select id="tipoMaterialid" name="tipoMaterialid" id="heard" class="form-control" >
	                  @foreach ($tipomateriales as  $tipom)
	                  	<option value="{{$tipom->id}}">{{$tipom->descripcion}}</option>
	                  @endforeach 
	                </select>
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
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Administrar Matríz Bronson</h2>

	        <div class="x_content">
	          <br>

	          <form action="{{route('matrizbronsons.index')}}" method="get" autocomplete="off">
	          	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	          	<input type="hidden" name="type" value="1">

	            <div class="form-group">

	              <div class="col-md-6 col-sm-6 col-xs-12">
	                <label class="control-label" for="first-name">Medidas Pulgada</label>
	                <input name="medidaspb" type="text" id="medidaspb" class="form-control col-md-7 col-xs-12">
	              </div>
	              <div class="col-md-6 col-sm-6 col-xs-12">
	                <label class="control-label" for="first-name">Medidas Milímetro</label>
	                <input name="medidasmb" type="text" id="medidasmb" class="form-control col-md-7 col-xs-12">
	              </div>
	              <div class="col-md-6 col-sm-6 col-xs-12">
	                <label class="control-label" for="first-name">Diametro Boca</label>
	                <input name="diametrobb" type="text" id="diametrobb" class="form-control col-md-7 col-xs-12">
	              </div>
	              
	              <div class="col-md-6 col-sm-6 col-xs-12">
	                <label class="control-label" for="first-name">Tipo Material</label>
	                <select name="materialidb" id="materialidb" class="form-control" >
	                  <option></option>
	                  @foreach ($tipomateriales as  $tipom)
	                  	<option value="{{$tipom->id}}">{{$tipom->descripcion}}</option>
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
	            <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Matríz Bronson</button>


	          </li>

	        </ul>
	        <div class="clearfix"></div>
	      </div>
	      <div class="x_content">

	        <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
	          <thead>
	            <tr>
	              <th>Medidas Pulgada</th>
	              <th>Medidas Milímetro</th>
	              <th>Diametro Boca</th>
	              <th>Tipo Material</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@forelse ($arraymatriz as $matriz)
	            <tr data-id="{{$matriz->id}}">
	              <td>{{$matriz->medidasp}}</td>
	              <td>{{$matriz->medidasm}}</td>
	              <td>{{$matriz->diametro}}</td>
	              <td>{{$matriz->tipo}}</td>
	            </tr>
	            @empty
	            	Sin Registros
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
      $('#medidasmb').val("");
      $('#medidaspb').val("");
      $('#diametrobb').val("");
      $('#materialidb').val("");

    });

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "matrizbronsons/" + idSeleccionado;
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
        var url = "matrizbronsons/" + idSeleccionado;
        $.ajax({  
          type: "GET",
          url: url,
          success: function(data){
            $("#medidasPulgada").val(data.medidasPulgada);
            $("#medidaMilimetro").val(data.medidaMilimetro);
            $("#diametroBoca").val(data.diametroBoca);
            $("#tipoMaterialid").val(data.tipoMaterialid);
          }
        });
    });

    $('#enviar_m').on('click', function(){
      var medidasPulgada = $("#medidasPulgada").val();
      var medidaMilimetro = $("#medidaMilimetro").val();
      var diametroBoca = $("#diametroBoca").val();
      var tipoMaterialid = $("#tipoMaterialid").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "matrizbronsons/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: {
          'medidasPulgada' : medidasPulgada,
          'medidaMilimetro' : medidaMilimetro,
          'diametroBoca' : diametroBoca,
          'tipoMaterialid' : tipoMaterialid
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