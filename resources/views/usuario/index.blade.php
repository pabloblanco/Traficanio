@extends('layouts.app')

@section('content')

    <!-- Inicio de las ventanas modales-->
    <!--  modal Agregar Usuario-->

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Agregar Usuario</h4>
          </div>
          <div class="modal-body cuerpo-modal">
            <form action="{{route('addusuario')}}" method="post" autocomplete="off" accept-charset="utf-8">

              <div class="form-group">

                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="user">Usuario</label>
                  <input name="nombre" type="text" id="nombrea" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="user">Contarseña</label>
                  <input name="password" type="password" id="passa" class="form-control col-md-7 col-xs-12 passvalid">
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Sector</label>
                  <select id="sector_ida" class="form-control">
                    @foreach ($sector as $se)
                    	<option value="{{$se->id}}">{{$se->descripcion}}</option>
                    @endforeach
                  </select>
                </div>               
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
            <a id="guardaruser" type="button" class="btn btn-primary">Guardar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /modals agregar  Usuario-->

    <!--  modal Eliminar Usuario -->

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
  <!-- /modals eliminar Usuario-->
  <!--  modal modifcar Usuario-->

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar Usuario</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form action="  " method="get" accept-charset="utf-8">

            <div class="form-group">

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="user">Usuario</label>
                <input type="text" id="nombreu" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="user">Contarseña</label>
                <input type="password" id="passu" class="form-control col-md-7 col-xs-12 passvalidu">
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Sector</label>
                <select id="sector_idu" class="form-control" required>
                  @foreach ($sector as $se)
                  	<option value="{{$se->id}}">{{$se->descripcion}}</option>
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
            <h2>Administrar Usuario</h2>
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
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="">
                <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Usuario</button>


              </li>

            </ul>
            <div class="clearfix"></div>
            <div class="x_content">

              <table id="tableusuarios" class="table table-striped table-bordered table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Sector</th>
                  </tr>
                </thead>
                <tbody>                 
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-md-1">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar" id="modificar">Modificar</button>
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

    var table = $("#tableusuarios").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    function validarpass(v){
    	if (v == null){
	    	var val = $('.passvalid').val().length;		
    	}
    	else{
	    	var val = $('.passvalid'+v).val().length;		
    	}
    	return val;
    }

    function listarusuarios(){
    	$.ajax({  
    	  type: "GET",
    	  url: "{{route('listarusuarios')}}",
    	  success: function(data){
    	  	if (data !== "false"){
    	  		var arrayReturn = data.resultado;
    	  		table.destroy();
    	  		table = $("#tableusuarios").DataTable({
    	  			"data": arrayReturn,
    	  			"columns": [
    	  			  {"data": "nombre"},
    	  			  {"data": "sector"},
    	  			],
    	  			"order": [],
    	  			"initComplete": function(settings, json) {
    	  			    //alert("completado");
    	  			    //$("#loadingSpinner").hide();
    	  			    //$('#loadingSpinner').hide();
    	  			    //or $('#loadingSpinner').empty();
    	  			},

    	  			"fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
    	  			        $(nRow).attr('data-id', arrayid['id']);
    	  			        //$('td', nRow).eq(9).append("<td align='center'><a href='"+window.location.origin+"/public/detalle_rechazo/"+arrayid['id']+"'><i class='fa fa-search'></i></a></td>" );
    	  			        //$('td', nRow).eq(9).attr('href', "/detalle_rechazo" + arrayid['id']);
    	  			},
    	  			"processing": true,
    	  			"language": {
    	  			    "sProcessing":     "Procesando.....",
    	  			    "sLengthMenu":     "Mostrar _MENU_ registros",
    	  			    "sZeroRecords":    "No se encontraron resultados",
    	  			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
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

    	  	}
    	    
    	  }
    	});
    }

    listarusuarios();

    $('table').on('click', 'tr', function(){
      idSeleccionado = $(this).data('id');

      if($(this).hasClass('selected-table')){
        $(this).removeClass('selected-table');
      }else{
        $("tbody tr.selected-table").removeClass('selected-table');
        $(this).addClass('selected-table');
      }

    });


    $('#guardaruser').on('click', function(){

    	if (validarpass(null)<6){
    		$.toast({ 
    		      text : "La Contraseña debe poseer al menos 6 Caracteres", 
    		      showHideTransition : 'slide',  
    		      bgColor : 'red',              
    		      textColor : '#eee',            
    		      allowToastClose : false,     
    		      hideAfter : 5000,              
    		      stack : 5,                    
    		      textAlign : 'left',            
    		      position : 'top-right'       
    		});

    		return false;
    	}

    	$.ajaxSetup({
    	    headers: {
    	        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
    	    }
    	});

    	$.ajax({  
    	  type: "post",
    	  url: "{{route('register')}}",
    	  data: {
    	  	'usuario': $('#nombrea').val(),
    	  	'password': $('#passa').val(),
    	  	'sectorid': $('#sector_ida').val()
    	  },
    	  success: function(data){
    	  		$.toast({ 
    	  		      text : "Usuario Creado con Exito", 
    	  		      showHideTransition : 'slide',  
    	  		      bgColor : 'green',              
    	  		      textColor : '#eee',            
    	  		      allowToastClose : false,     
    	  		      hideAfter : 5000,              
    	  		      stack : 5,                    
    	  		      textAlign : 'left',            
    	  		      position : 'top-right'       
    	  		});

    	    	listarusuarios();
    	   		return;
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
        var url = "verusuario/" + idSeleccionado;
        $.ajax({  
          type: "get",
          url: url,
          success: function(data){
            $('#nombreu').val(data.nombre);
            $('#sector_idu').val(data.sectorid);
          }
        });
    });

    function verificarpassupdate(){
    	return $('#passu').val().length;
    }

    $('#send_delete').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        var url = "deleteusuario/" + idSeleccionado;
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

      if (verificarpassupdate() >0){
	      if (validarpass('u')<6){
	      	$.toast({ 
	      	      text : "La Contraseña debe poseer al menos 6 Caracteres", 
	      	      showHideTransition : 'slide',  
	      	      bgColor : 'red',              
	      	      textColor : '#eee',            
	      	      allowToastClose : false,     
	      	      hideAfter : 5000,              
	      	      stack : 5,                    
	      	      textAlign : 'left',            
	      	      position : 'top-right'       
	      	});

	      	return false;
	      }
      	var obj = {
      		'usuario' : $('#nombreu').val(),
      		'password' : $('#passu').val(),
      		'sectorid' : $('#sector_idu').val()
      	}
      }
      else{
      	var obj = {
      		'usuario' : $('#nombreu').val(),
      		'sectorid' : $('#sector_idu').val()
      	}
      }


      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "updateusuario/" + idSeleccionado;
      $.ajax({  
        type: "put",
        url: urledit,
        data: obj,
        success: function(data){
          if(data=="true"){
          	location.reload();
          }
        }
      });
    });

    return;

  });
</script> 
@endsection