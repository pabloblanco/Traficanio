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
						<h2>Autorización y Entrega</h2>
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
						

						<div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">
										<th>Elegir</th>
										<th class="column-title">N° De Orden</th>
										<th class="column-title">Version</th>
										<th class="column-title">Cliente</th>
										<th class="column-title">Tipo</th>
										<th class="column-title">Medida</th>
										<th class="column-title">Fecha Pedido</th>
										<th class="column-title">Fecha Entrega</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($aprocesar as $pr)
									<tr class="even pointer">
										<td class="a-center ">
											<input value="{{$pr->nro}}" id="eje" type="checkbox" class="flat" name="table_records">
										</td>
										<td class=" ">{{$pr->nro}}</td>
										<td class=" ">{{$pr->version}}</td>
										<td class=" ">{{$pr->cliente}}</td>
										<td class=" ">{{$pr->tipo}}</td>
										<td class=" ">{{$pr->medida}}</td>
										<td class="">{{Carbon\Carbon::parse($pr->fechap)->format('d/m/Y')}}</td>
										<td class="">{{Carbon\Carbon::parse($pr->fechae)->format('d/m/Y')}}</td>
									</tr>
								@endforeach			
								</tbody>
							</table>
							<br>
							<div class="row">
								<div class="col-md-12">
									<a type="button" id="ejecutar" class="btn btn-primary btn-sm">Ejecutar</a>
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

  	$("#ejecutar").on("click", function(){
  		$.ajaxSetup({
  		    headers: {
  		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  		    }
  		});

  		$.ajax({  
  		  type: "put",
  		  url: "{{route('pasaraplanta')}}",
  		  data: {
  		  	'procesos': JSON.stringify(checkedBox)
  		  },
  		  beforeSend: function() {
  		    $('#loader').show();
  		  },
  		  complete: function(){
  		    $('#loader').hide();
  		  },
  		  success: function(data){
  		  	if (data == "true"){
  		  		location.reload();
  		  	}

  		  }
  		});

  	});

  });
</script>
@endsection