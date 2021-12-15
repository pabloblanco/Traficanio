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
						<h2>Seleccione preparacion MP a autorizar:</h2>
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
						
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>

						<div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
									<tr class="headings">
										<th>Elegir</th>
										<th class="column-title">Orden</th>
										<th class="column-title">Kgs a preparar</th>
										<th class="column-title">Kgs preparados</th>
										<th class="column-title">Nueva cantidad</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($listR as $res)
										<tr class="even pointer" data-id="{{$res->idpmp}}">
											<td class="a-center ">
												<input value="{{$res->idpmp}}" id="eje" type="checkbox" class="flat" name="table_records">
											</td>
											<td class=" "> Nº {{$res->data->nro}}</td>
											<td class=" ">{{$res->kilos}}</td>
											<td class=" ">{{$res->data->kilospreparados}}</td>
											<td class=" "><input type="text" id="newkgs-{{$res->idpmp}}"></td>
											<td style="display: none;">
												<input type="hidden" value="{{$res->kilos}}" id="oldkgs-{{$res->idpmp}}">
												<input type="hidden" value="{{$res->data->kilospreparados}}" id="prepkgs-{{$res->idpmp}}">
												<input type="hidden" value="{{$res->data->trazabilidad}}" id="traza-{{$res->idpmp}}">
												<input type="hidden" value="{{$res->data->medOri}}" id="medidaid-{{$res->idpmp}}">
												<input type="hidden" value="{{$res->traza->id}}" id="paqueteid-{{$res->idpmp}}">
												<input type="hidden" value="{{$res->ordenpro}}" id="ordenid-{{$res->idpmp}}">
												<input type="hidden" value="{{$res->vxoid}}" id="versionid-{{$res->idpmp}}">
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							<br>
							<div class="row">
								<div class="col-md-12">
									<a type="button" id="ejecutar" class="btn btn-primary btn-sm">Autorizar</a>
									<a type="button" id="rechazar" class="btn btn-primary btn-sm">Rechazar</a>
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

  	 var checkedBox = [];

  	$(document).on('click', '#eje:checkbox', getCheckedBox);

  	getCheckedBox();

  	 function getCheckedBox() {
  	  
  	   checkedBox = $.map($('input:checkbox:checked'), 
  	                          function(val, i) {
  	                             return val.value;
  	                          });

  	}


 	var list = [];

  	$("#ejecutar").on("click", function(){
  		var data = traveTable();

	  	if(!data.length>0){
	  		AlertToast("Debe seleccionar al menos un proceso", "red");
	  	}
	  	else{
		  	POSTMP();
	  	}

  	});

  	function traveTable(){
  		list = [];
	  	for (var i = 0; i < checkedBox.length; i++) {
	  		var obj = {};

	  		var id = checkedBox[i];

	  		obj.autor = id;

	  		var tr = $("tr[data-id='"+id+"'] input");
	  		
	  		tr.each(function( index ) {
	  		 	var id_input = $(this).attr('id');
	  		 	if(id_input!=="eje"){
	  		 		var name = id_input.split('-')[0];
	  		 		obj[name] = $(this).val();
	  		 	}
	  		});

	  		list.push(obj);
	  	}
	  	return list;
  	}

  	function POSTMP(){
  		$.ajaxSetup({
  		    headers: {
  		    'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  		    }
  		});

  		$.ajax({  
  		    type: "post",
  		    url: "{{route('processautorizarMP')}}",
  		    data: {
  		    	'procesos': JSON.stringify(list)
  		    },
  		    beforeSend: function() {
  		      $('#loader').show();
  		    },
  		    complete: function(){
  		      $('#loader').hide();
  		    },
  		    success: function(data){
  		    	location.reload();

  		    }
  		});
  	}

  	function RECHAZARMP(){
  		$.ajaxSetup({
  		    headers: {
  		    'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  		    }
  		});

  		$.ajax({  
  		    type: "post",
  		    url: "{{route('processrechazoMP')}}",
  		    data: {
  		    	'procesos': JSON.stringify(list)
  		    },
  		    beforeSend: function() {
  		      $('#loader').show();
  		    },
  		    complete: function(){
  		      $('#loader').hide();
  		    },
  		    success: function(data){
  		    	location.reload();

  		    }
  		});
  	}

  	$('#rechazar').on('click', function(){
  		var data = traveTable();

	  	if(!data.length>0){
	  		AlertToast("Debe seleccionar al menos un proceso", "red");
	  	}
	  	else{
		  	RECHAZARMP();
	  	}
  	});


  	function AlertToast(dataText="", colorFont="green"){
  		$.toast({ 
  		  text : dataText, 
  		  showHideTransition : 'slide',  
  		  bgColor : colorFont,              
  		  textColor : '#eee',            
  		  allowToastClose : false,     
  		  hideAfter : 5000,              
  		  stack : 5,                    
  		  textAlign : 'left',            
  		  position : 'top-right'       
  		});
  	}


  });
</script>
@endsection