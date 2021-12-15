  
  @extends('layouts.app')

  @section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Buscar Proceso</h2>
              <ul class="nav navbar-right panel_toolbox">
              <li><a href="proceso.html" class="btn btn-primary  btn-sm"><i class="fa fa-mail-reply"></i></a></li>

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
              <form id="demo-form2" autocomplete="off" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" id="idco" value="{{$id}}">
                <div class="form-group">
                  <div class="row">
                    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Nro de Orden:</label>
                      <input type="text" id="clienteb" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<label class="control-label" for="first-name">Cliente:</label>
                    	<input type="text" id="" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-5 col-xs-12">
                      <label class="control-label" for="first-name">Fecha De Entrega</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Fecha - Desde</label>
                      <div class='input-group date' id='myDatepicker23'>
                        <input id="fechadesdeb" type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Fecha - Hasta</label>
                      <div class='input-group date' id='myDatepicker22'>
                        <input id="fechahastab" type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  

                  <div  class="row">
                    <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                      <label class="control-label" for="first-name">Diámetro Exterior</label>
                    </div>
                    <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                      <label class="control-label" for="first-name">Diámetro Interior</label>
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Desde</label>
                      <input type="text" id="diametroextdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Hasta</label>
                      <input type="text" id="diametroexthastab" placeholder="" class="form-control col-md-7 col-xs-3">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Desde</label>
                      <input type="text" id="diametroextmindesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <label class="control-label" for="first-name">Hasta</label>
                      <input type="text" id="diametroextminhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                    </div>
                  </div>
                  
                  <div  class="row">
                    <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12 col-xs-3 col-xs-offset-5">
                      <label class="control-label" for="first-name">Espesor</label>
                    </div>
                  </div>
                  <div  class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <label class="control-label" for="first-name">Desde</label>
                      <input type="text" id="espesormaxdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <label class="control-label" for="first-name">Hasta</label>
                      <input type="text" id="espesormaxhastab" placeholder="" class="form-control col-md-7 col-xs-6">
                    </div>
                  </div>
                  <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12 col-xs-3 col-xs-offset-5">
                    <label class="control-label" for="first-name">Kilos</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="kilosdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="kiloshastab" placeholder="" class="form-control col-md-7 col-xs-6">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Largo Máx.</label>
                    <input type="text" id="largomaxb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Largo Mín.</label>
                    <input type="text" id="largominb" placeholder="" class="form-control col-md-7 col-xs-6">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de acero</label>
                    <select id="tipoaceroidb" class="form-control">
                      <option></option>
                      @foreach ($tipoaceros as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de costura</label>
                    <select id="tipocosturaidb" class="form-control">
                      <option></option>
                      @foreach ($tipocostura as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Tratamiento Térmico</label>
                    <select id="tratamiendoidb" class="form-control">
                      <option></option>
                      @foreach ($tratamientos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de norma</label>
                    <select id="normaidb" class="form-control">
                      <option></option>
                      @foreach ($normas as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de orden</label>
                    <select id="tipoordenidb" class="form-control">
                      <option></option>
                      @foreach ($tipoorden as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Uso</label>
                    <select id="usoidb" class="form-control">
                      <option></option>
                      @foreach ($usos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 ">
                    <a id="buscar" class="btn btn-primary  btn-sm">Buscar</a>
                    <a id="limpiar" class="btn btn-success  btn-sm">Limpiar</a>
                  </div>
                </div>
              </div>
            </form>
            <div class="clearfix"></div>
            <div class="x_content">
              <div class="row">
                <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                <div id="loader1"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"> Copiando Procesos</div>
                <div class="table-responsive">
                  <table id="datatable-procesos" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Medida</th>
                        <th>Nro Orden</th>
                        <th>Proceso</th>
                        <th width="20">Copiar</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="esop" value="{{$type}}">
<input type="hidden" id="orden" value="{{$id}}">
<!-- /page content -->

@endsection

@section('js_extra')
<script type="text/javascript">
  $(function(){

  	var ordenid = $('#orden').val();

    var table = $("#datatable-procesos").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    function convertirFechaAFormato(fecha_recibida)
    {
      var nuevafecha = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
      return nuevafecha;
    }

    function forcampos(limpiar){
	    var inputs = $('form input');
	    var selects = $('form select');
	    var number = 16;
	    var array = [];

	    inputs.each(function(index, ele) {
	    	if ($(this).attr('type')== "text"){
	    		if (limpiar > 0){
	    			$(this).val("");
	    		}
	    		else{
		    		var idp = 'bp-'+index;
			    	$(this).attr('id', idp);

			    	if (idp == "bp-4" || idp == "bp-5"){
			    		if ($(this).val().length>0)
			    			var fecha = convertirFechaAFormato($(this).val());
			    		else
			    			var fecha = null;

			    		array.push(fecha);
			    	}
			    	else{
				    	array.push($(this).val());		    						    		
			    	}
			    	
	    		}
	    	}
	    });

	    selects.each(function(index, ele) {
	    	if (limpiar > 0){
	    		$(this).val("");
	    	}
	    	else{
		    	var idp = 'bp-'+number;
			    $(this).attr('id', idp);	

			    array.push($(this).val());

			    number++;	    		
	    	}
	    });

	    if (limpiar==0){
		    var obj = {
		    	'orden': array[0],
		    	'cliente': array[1],
		    	'fedesde': array[2],
		    	'fehasta': array[3],
		    	'dedesde': array[4],
		    	'dehasta': array[5],
		    	'didesde': array[6],
		    	'dihasta': array[7],
		    	'esdesde': array[8],
		    	'eshasta': array[9],
		    	'kidesde': array[10],
		    	'kihasta': array[11],
		    	'lamin':   array[12],
		    	'lamax':   array[13],
		    	'tipoacero': array[14],
		    	'tipocostura': array[15],
		    	'tratamiento': array[16],
		    	'tiponorma':array[17],
		    	'tipoorden':array[18],
		    	'uso':array[19]
		    }

		    return obj;	    	
	    }

	    return true;
    } 

    function constructortabla(result){
    	table.destroy();
    	table = $("#datatable-procesos").DataTable({
    	  "data": result,
    	  "columns": [
    	    {"data": "medida"},
    	    {"data": "nroOrd"},
    	    {"data": "procesos"},
    	    {"data": "verid",
    	    render : function (data, type, row) {
    	      return "<td><i class='fa fa-copy'></i></td>";
    	    }
    		}

    	  ],
    	  dom: 'Bfrtip',
    	  buttons: [
    	      'copy', 'csv', 'print'
    	  ],
    	  "order": [],
    	  "fnCreatedRow": function(nRow, aData, iDataIndex) {
    	  		$('td', nRow).eq(3).attr("data-co", aData['verid']);
    	  },
    	  "language": {
    	      "sProcessing":     "Procesando.....",
    	      "sLengthMenu":     "Mostrar _MENU_ registros",
    	      "sZeroRecords":    "No se encontraron resultados",
    	      "sEmptyTable":     "No se encontraron resultados de busqueda",
    	      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    	      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    	      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    	      "sInfoPostFix":    "",
    	      "sSearch":         "Buscar:",
    	      "sUrl":            "",
    	      "sInfoThousands":  ",",
    	      "sLoadingRecords": "Cargando...",
    	      "oPaginate": {
    	        "sFirst":    "Primero",
    	        "sLast":     "Último",
    	        "sNext":     "Siguiente",
    	        "sPrevious": "Anterior"
    	      },
    	      "oAria": {
    	        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    	        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    	      }
    	    }
    	});

    	return true;
    }

    function consulta(data){
    	$.ajax({  
    	  type: "get",
    	  url: "{{route('consultarprocesosop')}}",
    	  data: data,
    	  success: function(data){
    	  	var arrayReturn = data.resultados;
    	  	if (arrayReturn.length>0){
    	  		constructortabla(arrayReturn);
    	  		carga();
    	  	}
    	  	else{
    	  		table.clear().draw();
    	  	}

    	  }
    	});

    }

    $('#buscar').on('click', function(){
    	var obj = forcampos(0);
    	consulta(obj);
    });

     

    function carga(){
    	$('#datatable-procesos tbody tr td').on('click', function(){
    	      	var id = $(this).data('co');
    		    $.ajaxSetup({
    		        headers: {
    		            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
    		        }
    		    });
    		    $.ajax({  
    		      type: "post",
    		      url: "{{route('copiar')}}",
    		      data: {
    		        'cotpadre': id,
    		        'cothijo' : ordenid,
    		        'co': 0,
    		      },
    		      beforeSend: function() {
    		        $('#loader1').show();
    		      },
    		      complete: function(){
    		        $('#loader1').hide();
    		      },
    		      success: function(data){

    		      }
    		    });

    	});  
    }

    $('#limpiar').on('click', function(){
    	forcampos(1);
    	table.clear().draw();
    });


  });
 </script>
 @endsection