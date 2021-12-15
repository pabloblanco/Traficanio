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
									

									<div class="table-responsive">
											<table class="table table-striped jambo_table bulk_action">
												<thead>
													<tr class="headings">
														<th>Ejecutar</th>
														<th class="column-title">N° De Orden</th>
														<th class="column-title">Cliente</th>
														<th class="column-title">Dia. Ext.</th>
														<th class="column-title">Espesor</th>
														<th class="column-title">Cost</th>
														<th class="column-title">Kilos</th>
														<th class="column-title">Piezas</th>
														<th class="column-title">Metros</th>
														<th class="column-title">Kilos a Entregar</th>
														<th class="column-title">Piezas a Entregar</th>
														<th class="column-title">Metros a Entregar</th>
														<th class="column-title">Localidad</th>
														<th class="column-title">Lg</th>
														<th class="column-title">Código Cliente</th>
														<th class="column-title">Precio</th>
														<th class="column-title">Moneda</th>
														<th class="column-title">UM Texto</th>
													</tr>
												</thead>
												<tbody>

													@foreach ($listado as $lista)
														<tr>
															<td class="a-center ">
																<input value="{{$lista->versionid}}" type="checkbox" class="flat">
															</td>
															<td class=" ">{{$lista->Ordenp}}</td>
															<td class=" ">{{$lista->Cliente}}</td>
															<td class=" ">{{$lista->DiaExt}}</td>
															<td class=" ">{{$lista->Esp}}</td>
															<td class=" ">{{$lista->Cost}}</td>
															<td class="">{{number_format($lista->Kilos,2,'.','')}}</td>
															<td class="">{{number_format($lista->Piezas,2,'.','')}}</td>
															<td class="">{{number_format($lista->Metros,2,'.','')}}</td>
															<td><input class="input-rechazo" type="text" id="kilosen-{{$lista->versionid}}" id=""></td>
															<td><input class="input-rechazo" type="text" id="piezasen-{{$lista->versionid}}" id=""></td>
															<td><input class="input-rechazo" type="text" id="metrosen-{{$lista->versionid}}" id=""></td>
															<td><input class="input-rechazo" type="text" id="localidad-{{$lista->versionid}}" id=""></td>
															<td><input class="input-rechazo" type="text" id="lg-{{$lista->versionid}}" id=""></td>
															<td class="">{{$lista->Codigo}}</td>
															<td><input class="input-rechazo" type="text" id="precio-{{$lista->versionid}}" id=""></td>
															<td class="">{{$lista->Moneda}}</td>
															<td class="">{{$lista->UM}}</td>
														</tr>
													@endforeach
													
												</tbody>
											</table>
											<br>
											<div class="row">
												<div class="col-md-12">
													<a id="submit" class="btn btn-primary btn-sm">Ejecutar</a>
													<a href="cliente.html"  class="btn btn-primary btn-sm">Volver</a>
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" id="ordenid" value="{{$idorden}}">
				<input type="hidden" id="clienteid" value="{{$clienteid}}">
				<!-- /page content -->
@endsection

@section('js_extra')
<script type="text/javascript">
  $(function(){
    var checkedBox = [];
    var ordenid = $('#ordenid').val();
    var clienteid = $('#clienteid').val();
    console.clear();
    //Recorremos todos los input checkbox con name = Colores y que se encuentren "checked"

    $(document).on('click', 'input:checkbox', getCheckedBox);

    getCheckedBox();

    function getCheckedBox() {
      
      checkedBox = $.map($('input:checkbox:checked'), 
                             function(val, i) {
                                return val.value;
                             });
    }

    $('#submit').on('click', function(){
      var datades = [];
      for (var i=0; i<checkedBox.length; i++) {
      	var versionid = checkedBox[i];
      	var kilosen = $('#kilosen-' +versionid).val(); 
      	var metrosen = $('#metrosen-' +versionid).val(); 
      	var piezasen = $('#piezasen-' +versionid).val(); 
      	var localidad = $('#localidad-' +versionid).val();
      	var precio = $('#precio-' +versionid).val();

      	obj = {
      		'versionid': versionid,
      		'kilos' : kilosen,
      		'metros' : metrosen,
      		'piezas' : piezasen,
      		'localidad' : localidad,
      		'precio' : precio
      	}

      	datades.push(obj);
      } 

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('insertar_despacho')}}",
        data: {
          'ordenid' : ordenid,
          'despachos' : JSON.stringify(datades)
        },
        success: function(data){
        	if (data == "true"){
        		var urldirec = window.location.origin + "/public/index.php/cliente_despacho/" + ordenid;
        		window.location.href = urldirec;
        	}
        	else{
        		$.toast({ 
        		  text : "Error al insertar los Despachos", 
        		  showHideTransition : 'slide',  
        		  bgColor : 'red',              
        		  textColor : '#eee',            
        		  allowToastClose : false,     
        		  hideAfter : 5000,              
        		  stack : 5,                    
        		  textAlign : 'left',            
        		  position : 'top-right'       
        		});
        	}

        }
      });

    });

  });
</script>
@endsection