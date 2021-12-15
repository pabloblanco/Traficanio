@extends('layouts.app')

@section('content')

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
													<th class="column-title">N° De Orden</th>
													<th class="column-title">Cliente</th>
													<th class="column-title">Ext</th>
													<th class="column-title">Esp</th>
													<th class="column-title">Cost</th>
													<th class="column-title">Piezas</th>
													<th class="column-title">Metros</th>
													<th class="column-title">Kilos</th>
													<th class="column-title">Cod. Pieza</th>
													<th class="column-title">Fecha Prometida</th>
													<th class="column-title">Certificado</th>
													<th class="column-title">Orden. Compra</th>
													<th class="column-title">UM</th>
													<th class="column-title">Precio</th>
													<th class="column-title">Moneda</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($db as $d)
													<tr class="even pointer">
														<td class=" ">{{$d->Orden}}</td>
														<td class=" ">{{$d->Cliente}}</td>
														<td class=" ">{{$d->Ext}}</td>
														<td class=" ">{{$d->Esp}}</td>
														<td class=" ">{{$d->Cost}}</td>
														<td>{{$d->Piezas}}</td>
														<td>{{$d->Metros}}</td>
														<td>{{$d->Kilos}}</td>
														<td class="">{{$d->CodPieza}}</td>
														<td class="">{{Carbon\Carbon::parse($d->Fechaprometida)->format('d/m/Y')}}</td>
														<td class="">{{$d->Certificado}}</td>
														<td>{{$d->OrdenCompra}}</td>
														<td>{{$d->UM}}</td>
														<td>{{$d->Precio}}</td>
														<td>{{$d->Moneda}}</td>
													</tr>
												@endforeach
											</tbody>
										</table>
										<br>
										<div class="row">
											<div class="col-md-12">
												<a href="{{route('autorizacion')}}"  class="btn btn-primary btn-sm">Volver</a>
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