@extends('layouts.app')

@section('content')

<!-- page content -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-rechazar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h5 class="modal-title" id="myModalLabel2">¿Motivo?</h5>
      </div>
       <form enctype="multipart/form-data" id="formrechazo" action="{{route('RechazarCotizacion')}}" method="post" accept-charset="utf-8">
        <input type="hidden" name="id_coti" value="{{$id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="estado" value="5">
        <div class="modal-body cuerpo-modal">
             <div class="form-group">
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Motivo</label>
                  <select name="re_rechazoid" id="re_rechazoid" class="form-control" required>
                    <option></option>
                    @foreach ($tiporechazos as $rechazo)
                      <option value="{{$rechazo->id}}">{{$rechazo->descripcion}}</option>
                    @endforeach                  
                  </select>
                </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Detalles</label>
                    <textarea class="text-area" name="re_dettalle" id="re_dettalle" cols="" rows=""></textarea>
                  </div>    
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Archivo</label>
                   <input name="re_file" type="file" class="form-control-file" id="re_file">
                </div>
              </div>
            </div>

        </div>      
        <div class="modal-footer">
          <button id="send_delete" type="submit" class="btn btn-primary">Aceptar</button>
          <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
      </div>
  </div>
</div>

<!--  modal Anuelar  -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-anular">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h5 class="modal-title" id="myModalLabel2">¿Está seguro que desea anular?</h5>
      </div>
      
      <div class="modal-footer">
        <button id="send_anular" type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- /modals Anuelar-->

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="col-md-4 col-sm- col-xs-12">
              <h2>Información De La Cotización {{$infocotiza}}</h2>             
            </div>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                
              <a class="btn btn-primary btn-sm btn-regresar" href="{{route('indexcotizacion')}}"><i class="fa fa-mail-reply"></i></a>                      
               </li>
                <li>
                  <a class="btn btn-primary btn-sm" type="" href="{{route('exportarventa', $id)}}"><i class="fa fa-print"></i></a>
                </li>
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
              @if($row->estadoid == 2)
                <div class="row"><button id="generar_orden" type="button" class="btn btn-primary">Generar Orden</button><button id="rechazar_orden" type="button" class="btn btn-danger">Rechazar</button><button id="anular_orden" data-toggle="modal" data-target="#modal-anular" type="button" class="btn btn-warning">Anular</button></div>
              @endif
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div  class="row">
                  <div class="col-md-6 col-sm- col-xs-12">
                    <label class="control-label" for="first-name">Nº De Compra</label>
                    <input disabled="" type="text" id="ordencompra" value="{{$row->ordenCompra}}" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Estado:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$row->estcot}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Cliente:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$row->razon}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Código Del Clinte:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$row->codigo}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Fecha:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$fecha}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Reventa:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$row->descreventa}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Urgente:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$row->urgencia}}</span>
                  </div>
                </div><br>
                <div class="x_title">
                  <h2>Medidas</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row color-fila">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Diámetro Ext. Nominal:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->diametroExteriorNominal}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Máximo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->largoMaximo}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Diámetro Ext. Máximo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->diametroExteriorMaximo}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Mínimo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->largoMinimo}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Diámetro Ext. Mínimo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->diametroExteriorMinimo}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Máx. Entrega:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->largoMaxEntrega}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Diámetro Int. Nominal:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->diametroInteriorNominal}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Mín. Entrega:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->largoMinEntrega}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Diámetro Int. Máx:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->diametroInteriorMaximo}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Ensayo De Expansión:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->ensayoExpansion}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Diámetro Int. Mínimo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->diametroInteriorMinimo}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Tipo De Costura:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->descostura}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row color-fila">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Espesor Nominal:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->espesorNominal}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Norma:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->desnorma}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Espesor Máximo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->espesorMaximo}}</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Espesor Mínimo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->espesorMinimo}}</span>
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="x_title">
                  <h2>Otros Datos</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Fecha De Entrega:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$fechae}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Kilos:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$kilos}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Lugar De Entrega:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$le}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Piezas:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->piezas}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Norma:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->desnorma}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Metros:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$metros}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Forma:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->desforma}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Kg/M:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->kilogrametro}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Uso:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->desusofinal}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Biselado:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->bise}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Embalaje:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->desembalaje}}</span>
                      </div>
                    </div>
                  </div>
                 <!--  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Estencilado:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span></span>
                      </div>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Máximo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->largomaxest}}</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Mínimo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->largominest}}</span>
                      </div>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Número De Colada:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->numeroColada}}</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Medida:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->med}}</span>
                      </div>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Tipo De Costura:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->costuraidest}}</span>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Norma:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->normaidest}}</span>
                      </div>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Observaciones:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->observaeste}}</span>
                      </div>
                    </div>
                  </div>
                </div> --><br>
                <div class="x_title">
                  <h2>Control De Calidad</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Dureza Mínima:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->durezaMinima}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Rugosidad:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->rugosidad}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Dureza Máxima:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->durezaMaxima}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Fecha:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->flecha}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Tipo De Acero:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->tacero}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Pestañado:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->pesta}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Tratamiento Térmico:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->desctt}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Aplastado:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->aplas}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Observaciones Prod:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->observacionProduccion}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="x_title">
                  <h2>Datos De Venta</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Condición De Venta:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->condicionvta}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Precio Kilo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$pkilo}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Precio  Metro:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$pmetro}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Precio Pieza:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->precioPieza}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Precio Pasado:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$precioPasado}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Tipo De Moneda:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->moneda}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Precio 45%:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$precioMP}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Precio Contribución:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$precioCtr}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Observaciones Venta:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$row->observacionVenta}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="x_title">
                  <h2>Procesos</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      
                        
                    </div>


                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- /page content -->

<input type="hidden" id="procesos" value="{{$procesoscoti}}" name="">
<input type="hidden" id="idcoti" value="{{$id}}" name="">
<input type="hidden" id="tipohornos" value="{{$tipohornos}}" name="">
<input type="hidden" id="normas" value="{{$normas}}" name="">
<input type="hidden" id="tipocosturas" value="{{$tipocosturas}}" name="">
<input type="hidden" id="transportes" value="{{$transportes}}" name="">
<input type="hidden" id="preciopasdado" value="{{$row->precioPasado}}">
<input type="hidden" id="matrizsimaceros" value="{{$matrizsimacero}}"> 
<input type="hidden" id="matrizsimwidias" value="{{$matrizsimwidia}}">
<input type="hidden" id="matrizdoble" value="{{$matrizdoble}}">
<input type="hidden" id="matriztribular" value="{{$matriztribular}}">
<input type="hidden" id="matrizlimon" value="{{$matrizlimon}}"> 
<input type="hidden" id="cabezaturco" value="{{$cabezaturco}}"> 

@endsection

@section('js_extra')

<script>
  $(function(){

    $('#send_anular').on('click', function(){
      anular_cot();
    });

    function anular_cot(){
      console.log("entro");
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "put",
        url: "{{route('anular_cot')}}",
        data: {
            'id': $('#idcoti').val()
        },
        success: function(data){
          if (data == "true"){
            $.toast({ 
              text : "Se ha Anulado con exito.", 
              showHideTransition : 'slide',  
              bgColor : 'green',              
              textColor : '#eee',            
              allowToastClose : false,     
              hideAfter : 4000,              
              stack : 5,                    
              textAlign : 'left',            
              position : 'top-right'       
            });

            location.reload();
          }

        }
      });

    }
    
    var procesos = [];
    if ($('#procesos').val() !== ""){
      procesos = JSON.parse($('#procesos').val());
    }

    var cotizacion_id = $('#idcoti').val();

    for (var i = 0; i < procesos.length; i++) {
      var tipo = procesos[i].tipo;
      var idp = procesos[i].id;
      if (tipo == 1){
        var divinsert = `<div class="panel mp">
                            <a class="panel-heading" role="tab" id="heading1" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
                             <h4 class="panel-title">Preparación MP</h4>
                            </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo == 2)
      {
        var divinsert = `
                      <div class="panel horno">
                        <a class="panel-heading collapsed" role="tab" id="heading6" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                          <h4 class="panel-title">Horno</h4>
                        </a>
                      </div>
                        `;
        $('div.accordion').append(divinsert);
      }
      else if (tipo == 3){
        var divinsert = `<div class="panel batea">
                          <a class="panel-heading collapsed" role="tab" id="heading14" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
                            <h4 class="panel-title">Batea</h4>
                          </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==4){
        var divinsert = `<div class="panel punta">
                          <a class="panel-heading collapsed" role="tab" id="heading10" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                            <h4 class="panel-title">Punta</h4>
                          </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo == 5){
        var divinsert = ` <div class="panel trefila">
                          <a class="panel-heading collapsed" role="tab" id="heading9" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                            <h4 class="panel-title">Trefila</h4>
                          </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==6){
        var divinsert = ` <div class="panel enderezadora">
                          <a class="panel-heading collapsed" role="tab" id="heading15" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
                            <h4 class="panel-title">Enderezadora</h4>
                          </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==7){
        var divinsert = `  <div class="panel corte">
                            <a class="panel-heading collapsed" role="tab" id="heading7" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                              <h4 class="panel-title">Corte</h4>
                            </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==8){
        var divinsert = `  <div class="panel current">
                            <a class="panel-heading collapsed" role="tab" id="heading13" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
                              <h4 class="panel-title">Eddy Current</h4>
                            </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==9){
        var divinsert = `  <div class="panel prueba">
                            <a class="panel-heading collapsed" role="tab" id="heading12" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse12">
                              <h4 class="panel-title">Prueba Hidraulica</h4>
                            </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==10){
        var divinsert = `  <div class="panel estencilado">
                            <a class="panel-heading collapsed" role="tab" id="heading12" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
                              <h4 class="panel-title">Estencilado</h4>
                            </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==11){
        var divinsert = `  <div class="panel empaquetado">
                          <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title">Empaquetado</h4>
                          </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==12){
        var divinsert = `  <div class="panel control">
                          <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo66" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title">ControlFinal</h4>
                          </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==13){
        var divinsert = `  <div class="panel entrega">
                            <a class="panel-heading collapsed" role="tab" id="heading4" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                              <h4 class="panel-title">Entrega</h4>
                            </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==14){
        var divinsert = `  <div class="panel servicio">
                              <a class="panel-heading collapsed" role="tab" id="heading8" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                <h4 class="panel-title">Servicio</h4>
                              </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      else if (tipo ==15){
        var divinsert = `  <div class="panel certificado">
                            <a class="panel-heading collapsed" role="tab" id="heading5" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                              <h4 class="panel-title">Certificado</h4>
                            </a>
                        </div>`;
        $('div.accordion').append(divinsert);
      }
      getpr(tipo, idp);

    }

    function getpr(tipo, idp){
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('guardarproceso')}}",
        data: {
            'tipo': tipo,
            'idorden': cotizacion_id,
            'idproceso': idp,
            'esop': 0,
            'op':1,
            'data': {}   
        },
        success: function(data){
          var results = data.procesos;
          if (tipo == 1){
            var div = preparacionMP(results);
            $('div.mp').append(div);
          }
          else if (tipo == 2){
            horno(results);            
          }
          else if (tipo == 3){
            batea(results);
          }
          else if (tipo == 4){
            punta(results);
          }
          else if (tipo == 5){
            trefila(results);
          }
          else if (tipo == 6){
            enderezadora(results);
          }
          else if (tipo == 7){
            corte(results);
          }
          else if (tipo == 8){
            current(results);
          }
          else if (tipo == 9){
            prueba(results);
          }
          else if (tipo == 10){
            estencilado(results);
          }
          else if (tipo == 11){
            empaquetado(results);
          }
          else if (tipo == 13){
            entrega(results);
          }
          else if (tipo == 14){
            servicio(results);
          }
          else if (tipo == 15){
            certificado(results);
          }
          else {

          }
        }
      });

    } 

    function trefila(results){
      console.log(results);
      var cabezaTurco = 0;
      var espesor = 0;
      var flecha = 0;
      var idpun = 0;
      var matTL = 0;
      var matpun = 0;
      var matpun2 = 0;
      var matrizDoble = 0;
      var matrizSimAcero = 0;
      var matrizSimWidia = 0;
      var matrizTL = 0;
      var numero = 0;
      var observaciones = 0;
      var punzonDoble = 0;
      var punzonid = 0;
      var reduccion = 0;
      var tipo = 0;
      var tipoMatrizid = 0;

      if (results.row){
        var data = results.row;
        numero = data.numero;

      }

      var div = `
                
                  <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">N° De Trefila</label>
                              <input disabled="" value="${numero}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Matríz</label>
                              <select disabled="" id="prtipom" class="form-control" required>
                                <option value="0"></option>
                                <option value="1">Simple</option>
                                <option value="2">Doble</option>
                                <option value="3">Trilobular</option>
                                <option value="4">Limón</option>
                                <option value="5">Cabeza de Turco</option>
                              </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Ø</label>
                              <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row matriz">
                            

                          </div>
                          <div class="x_title">
                            <h2>Punzón</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Punzón</label>
                              <select disabled="" id="prtipopunzon" class="form-control" required>
                                <option value="0"></option>
                                <option value="1">Simple</option>
                                <option value="2">Trilobular</option>
                                <option value="3">Limón</option>
                                <option value="4">Doble</option>
                                <option value="5">Al Aire</option>
                              </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Material Punzón</label>
                              <select disabled="" id="matpunzon" class="form-control" required>
                                <option value="0"></option>
                                <option value="1">Acero</option>
                                <option value="2">Widia</option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Ø</label>
                              <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                              <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Espesor</label>
                              <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Kg/ mt calculado</label>
                              <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Reducción</label>
                              <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows=""></textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                      </div>
                  </div><!-- Terminaa el 9-->
                `;
      $('div.trefila').append(div);
      $('#prtipom').val(results.row.tipoMatrizid);

      if (results.row){
        var divmatriz = $('div[class="row matriz"]');
        if (results.row.tipoMatrizid == 1){
          var selematerial = `
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Material</label>
                                <select disabled="" id="prmaterial" class="form-control" required>
                                  <option value="0"></option>
                                  <option value="1">Acero</option>
                                  <option value="2">Widia</option>
                                </select>
                              </div>
                                `;
          divmatriz.append(selematerial);
          $('#prmaterial').val(results.row.tipo);
  
          if (results.row.tipo == 1)
          {

            var seleacero = JSON.parse($('#matrizsimaceros').val());
            var stringacero = "";
            for (var i = 0; i < seleacero.length; i++) {
              if (seleacero[i].id ==results.row.matrizSimAcero)
                stringacero = seleacero[i].descripcion;
            }
            var msimacero = `
                              <div class="col-md-5 col-sm-5 col-xs-12">
                                <label class="control-label" for="first-name">Matriz SimAcero</label>
                                <select disabled="" class="form-control" required>
                                  <option>${stringacero}</option>
                                </select>
                              </div>
                                `;
            divmatriz.append(msimacero);

          }
          else{ 
            var selewidia = JSON.parse($('#matrizsimwidias').val());
            var stringwidia = "";
            for (var i = 0; i < selewidia.length; i++) {
              if (selewidia[i].id ==results.row.matrizSimWidia)
                stringwidia = selewidia[i].descripcion;
            }

            var mwidia = `
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Matriz SimWidia</label>
                                <select disabled="" class="form-control" required>
                                  <option>${stringwidia}</option>
                                </select>
                              </div>
                                `;
            divmatriz.append(mwidia);
          }          
        }
        else if(results.row.tipoMatrizid == 2){
          var matrizdobles = JSON.parse($('#matrizdoble').val());
          var stringdoble = "";
          for (var i = 0; i < matrizdobles.length; i++) {
            if (matrizdobles[i].id ==results.row.matrizDoble)
              stringdoble = matrizdobles[i].descripcion;
          }

          var matrizDoble = `
                              <div class="col-md-7 col-sm-7 col-xs-12">
                                <label class="control-label" for="first-name">Matriz Doble</label>
                                <select disabled="" id="prmaterial" class="form-control" required>
                                  <option>${stringdoble}</option>
                                </select>
                              </div>
                                `;
          divmatriz.append(matrizDoble);
        }
        else if (results.row.tipoMatrizid == 3){
          var tribulares = JSON.parse($('#matriztribular').val());

          var stringtribular = "";
          for (var i = 0; i < tribulares.length; i++) {
            if (tribulares[i].id ==results.row.matrizTL)
              stringtribular = tribulares[i].descripcion;
          }

          var matrizTribular = `
                              <div class="col-md-7 col-sm-7 col-xs-12">
                                <label class="control-label" for="first-name">Matriz Trilobular</label>
                                <select disabled="" id="prmaterial" class="form-control" required>
                                  <option>${stringtribular}</option>
                                </select>
                              </div>
                                `;
          divmatriz.append(matrizTribular);

        }
        else if (results.row.tipoMatrizid == 4){
          var matrizlimons = JSON.parse($('#matrizlimon').val());

          var stringlimon = "";
          for (var i = 0; i < matrizlimons.length; i++) {
            if (matrizlimons[i].id ==results.row.matrizTL)
              stringlimon = matrizlimons[i].descripcion;
          }

          var matrizLimon = `
                              <div class="col-md-7 col-sm-7 col-xs-12">
                                <label class="control-label" for="first-name">Matriz Limon</label>
                                <select disabled="" id="prmaterial" class="form-control" required>
                                  <option>${stringlimon}</option>
                                </select>
                              </div>
                                `;
          divmatriz.append(matrizLimon);

        }
        else{
          var cabezaturcos = JSON.parse($('#cabezaturco').val());
          var stringcabezaturco = "";
          for (var i = 0; i < cabezaturcos.length; i++) {
            if (cabezaturcos[i].id ==results.row.cabezaTurco)
              stringcabezaturco = cabezaturcos[i].descripcion;
          }

          var matrizCabezaTurco = `
                              <div class="col-md-7 col-sm-7 col-xs-12">
                                <label class="control-label" for="first-name">Cabeza Turco</label>
                                <select disabled="" id="prmaterial" class="form-control" required>
                                  <option>${stringcabezaturco}</option>
                                </select>
                              </div>
                                `;

          divmatriz.append(matrizCabezaTurco);

        }

        if (results.tipoPunzon){
          $('#prtipopunzon').val(results.tipoPunzon);
          $('#matpunzon').val(results.row.matpun);
          if (results.row.matpun == 1){
            
          }
        }


      }
      return true;

    }

    function certificado(results){
      var certificadoid = 0;
      var observaciones = "";

      if (results.row){
        certificadoid = results.row.certificadoid!==undefined? results.row.certificadoid : "";
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";
      }

      var div = `
              
                <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                  <div class="panel-body">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label" for="first-name">Certificado</label>
                            <select disabled="" id="certificadoid" class="form-control" required>
                              <option value="1">SIN CERT</option>
                              <option value="2">DIMQUIMFIS</option>
                              <option value="3">DIMENSIONAL</option>
                              <option value="4">DIM Y QUIM</option>
                              <option value="5">ORDIMQUIM </option>
                              <option value="6">QUIMICO</option>
                              <option value="7">IPM</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="control-label" for="first-name">Observaciones</label>
                            <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                      </form>
                  </div>
                </div><!-- Terminaa el 5 -->
              `;
      $('div.certificado').append(div);
      $('#certificadoid').val(certificadoid);

      return true;
    }

    function servicio(results){
      var lugarEntrega = "";
      var precio = "";
      var proveedor = "";
      var observaciones = "";
      var tipoCentroid = 0;

      if (results.row){
        lugarEntrega = results.row.lugarEntrega!==undefined? results.row.lugarEntrega : "";
        precio = results.row.precio!==undefined? results.row.precio : "";
        proveedor = results.row.proveedor!==undefined? results.row.proveedor : "";
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";
        tipoCentroid = results.row.tipoCentroid!==undefined? results.row.tipoCentroid : "";

      }

      var div = `
               
                  <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Rubro</label>
                              <select disabled="" id="prtiporubro" class="form-control" required>
                                <option></option>
                                <option value="1">Cortador</option>
                                <option value="2">Zincador</option>
                              </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Lugar De Entrega</label>
                              <input disabled="" value="${lugarEntrega}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Precio</label>
                              <input disabled="" value="${precio}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Proveedor</label>
                              <input disabled="" value="${proveedor}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                    </div>
                  </div><!-- Terminaa el 8 -->

                `;
      $('div.servicio').append(div);
      $('#prtiporubro').val(tipoCentroid);

      return true;
    }

    function entrega(results){
      var tipoEntregaid = 0;
      var costoxKilo = "";
      var observaciones = "";
      var direccion = "";

      if (results.row.observaciones){
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";

      }

      if (results.row.costoxKilo){
        costoxKilo = results.row.costoxKilo!==undefined? results.row.costoxKilo : "";

      }


      if (results.row.tipoEntregaid){
        tipoEntregaid = results.row.tipoEntregaid!==undefined? results.row.tipoEntregaid : "";

      }


      if (results.row.direccion){
        direccion = results.row.direccion!==undefined? results.row.direccion : "";

      }

      if (results.row.transporteid){
        transporteid = results.row.transporteid!==undefined? results.row.transporteid : "";

      }

      var divmatriz = $('div.accordion');

      var div2 = `
                  <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Entrega</label>
                              <select disabled="" id="prtipoentrega" class="form-control" required>
                                <option></option>
                                <option value="1">Puesto en Traficaño</option>
                                <option value="2">Otras Direcciones</option>
                              </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Costo Por Kg</label>
                              <input disabled="" value="${costoxKilo}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row otrasdir">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Direccion</label>
                              <input disabled="" value="${direccion}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Transporte</label>
                              <select disabled="" id="prtrans" class="form-control" required>
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                    </div>
                  </div><!-- Terminaa el 4 --> `;

      var div = `
                
                  <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Entrega</label>
                              <select disabled="" id="prtipoentrega" class="form-control" required>
                                <option></option>
                                <option value="1">Puesto en Traficaño</option>
                                <option value="2">Otras Direcciones</option>
                              </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Costo Por Kg</label>
                              <input disabled="" value="${costoxKilo}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row otrasdir">
                            
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                      </div>
                  </div><!-- Terminaa el 4 -->
                `;
      if (tipoEntregaid == 2){
        $('div.entrega').append(div2);
      }
      else{
        $('div.entrega').append(div);       
      }

      $('#prtipoentrega').val(tipoEntregaid);

      var transportes = JSON.parse($('#transportes').val());
      var transporte = "";

      
      for (var i = 0; i < transportes.length; i++) {
        if (transportes[i].id ==results.row.transporteid )
          transporte = transportes[i].razon;
      }

      $('#prtrans option').eq(0).text(transporte);

      return true;

    }
    function empaquetado(results){
      var observaciones = "";
      var kilosxPaquete = "";
      var tubosxPaquete = "";

      if (results.row){
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";
        kilosxPaquete = results.row.kilosxPaquete!==undefined? results.row.kilosxPaquete : "";
        tubosxPaquete = results.row.tubosxPaquete!==undefined? results.row.tubosxPaquete : "";
      }

      var div = `<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                      <label class="control-label" for="first-name">Tipo De Empaquetado</label>
                                      <select disabled="" id="tipopa" class="form-control" required>
                                        <option></option>
                                        <option value="1">Atado con alambre</option>
                                        <option value="2">Zunchado</option>
                                        <option value="3">Suelto</option>
                                        <option value="4">Vendado</option>
                                        <option value="5">Contenedores</option>
                                        <option value="6">Cajas</option>
                                        <option value="7">Bolsas</option>
                                        <option value="8">Cajón cliente</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                      <label class="control-label" for="first-name">Tubos por Paquete</label>
                                      <input disabled="" value="${tubosxPaquete}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                      <label class="control-label" for="first-name">Kilogramo por Paquete</label>
                                      <input disabled="" value="${kilosxPaquete}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                      <label class="control-label" for="first-name">Observaciones</label>
                                      <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                                    </div>
                                  </div>
                                  <div class="ln_solid"></div>
                                </form>
                              </div>
                          </div><!-- Terminaa el 2 -->                 
                `;

      $('div.empaquetado').append(div);
      if (results.row){
        $('#tipopa').val(results.row.tipoEmpaquetadoid);
      }
      return true;
    }

    function estencilado(results){
      var observaciones = "";
      var largoMaximo = "";
      var largoMinimo = "";
      var medida = "";
      var numeroColada = "";

      if (results.row){
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";
        largoMaximo = results.row.largoMaximo!==undefined? results.row.largoMaximo : "";
        largoMinimo = results.row.largoMinimo!==undefined? results.row.largoMinimo : "";
        medida = results.row.medida!==undefined? results.row.medida : "";
        numeroColada = results.row.numeroColada!==undefined? results.row.numeroColada : "";
      }

      var div = `
                
                  <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Largo Mínimo</label>
                              <input disabled="" type="text" id="" value="${largoMinimo}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Largo Máximo</label>
                              <input disabled="" type="text" id="" value="${largoMaximo}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">N° De Colada</label>
                              <input disabled="" type="text" id="" required="required" value="${numeroColada}" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Medida</label>
                              <input disabled="" type="text" id="" required="required" value="${medida}" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Costura</label>
                              <select disabled="" id="prtc" class="form-control" required>
                                <option></option>
                              </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Norma</label>
                              <select disabled="" id="prtinorma" class="form-control" required>
                                <option value=""></option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                      </div>
                  </div><!-- Terminaa el 12-->                  
                `;

      $('div.estencilado').append(div);
      if (results.row){

        var normas = JSON.parse($('#normas').val());
        var norma = "";

        var tipocosturas = JSON.parse($('#tipocosturas').val());
        var costura = "";
        //$('#prtc').val(results.row.tipoCostura);
        
        for (var i = 0; i < normas.length; i++) {
          if (normas[i].id ==results.row.normaid )
            norma = normas[i].descripcion;
        }

        for (var i = 0; i < tipocosturas.length; i++) {
          if (tipocosturas[i].id ==results.row.tipoCostura )
            costura = tipocosturas[i].descripcion;
        }

        $('#prtinorma option').eq(0).text(norma);
        $('#prtc option').eq(0).text(costura);
      }
      return true;
    }

    function prueba(results){
      var observaciones = "";
      var precio = "";
      var presion = "";
      var tiempo = "";
      if (results.row){
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";
        precio = results.row.precio!==undefined? results.row.precio : "";
        presion = results.row.presion!==undefined? results.row.presion : "";
        tiempo = results.row.tiempo!==undefined? results.row.tiempo : "";
      }

      var div = `
                
                  <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Presión De Prueba(Kg/cm <sup>2</sup>)</label>
                              <input disabled="" value="${presion}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Tiempo (seg)</label>
                              <input disabled="" value="${tiempo}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Precio</label>
                              <input disabled="" type="text" id="" value="${precio}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                      </div>
                    </div>
                  </div><!-- Terminaa el 11-->
                `;

      $('div.prueba').append(div);
      return true;
    }

    function current(results){
      var observaciones = "";
      if (results.row){
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";
      }
      var divmatriz = $('div.accordion');
      var div = `
                
                  <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Precio</label>
                              <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                      </div>
                  </div><!-- Terminaa el 13-->
                  
                `;

      $('div.current').append(div);
      return true;
    }

    function corte(results){
      var cortePunta = '<input type="checkbox">';
      var observaciones = "";
      var cortes = "";
      var resto = "";
      if (results.row){
        if (results.row.cortePunta>0)
          cortePunta = '<input type="checkbox" checked="checked">';
       
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";
        cortes = results.row.cortes!==undefined? results.row.cortes : "";
        resto = results.row.resto!==undefined? results.row.resto : "";        
      }

      var div = `
               
                  <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="checkbox">Corte Punta
                                ${cortePunta}
                                <span class="check"></span>
                              </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Corte</label>
                              <select disabled="" id="prtipo" class="form-control" required>
                                <option></option>
                                <option value="1">Puntas</option>
                                <option value="2">Multiplo</option>
                                <option value="3">Medio</option>
                                <option value="4">Final</option>
                              </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Elemento Corte</label>
                              <select disabled="" id="elemento" class="form-control" required>
                                <option></option>
                                <option value="1">Sierra</option>
                                <option value="2">Disco</option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Cantidad De Cortes</label>
                              <input disabled="" value="${cortes}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Resto/Scrap</label>
                              <input disabled="" value="${resto}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                    </div>
                  </div><!-- Terminaa el 7 -->
                `;
      $('div.corte').append(div);
      if (results.row){
        $('#prtipo').val(results.row.tipoCorteid);
        $('#elemento').val(results.row.elemento);        
      }
      return true;
    }

    function enderezadora(results){
      var observaciones = "";
      var tipo = 0;
      if (results.row){
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";
        tipo = results.row.tipo;
      }
      var div = `
               
                  <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Tipo</label>
                              <select disabled="" id="prtipo" class="form-control" required>
                                <option ></option>
                                <option value="1">SLAVA CHICA </option>
                                <option value="2">SLAVA GRANDE</option>
                                <option value="3">BRONX</option>
                                <option value="4">DASZ</option>
                                <option value="5">SHUSTER</option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                      </div>
                  </div><!-- Terminaa el 15-->
                `;
      $('div.enderezadora').append(div);
      $('#prtipo').val(tipo);
      return true;
    }

    function punta(results){
      var pasadas = results.pasada;
      var pasada1 = pasadas[0]; 
      var pasada2 = pasadas[1]; 
      var pasada3 = pasadas[2];
      var largo1 = "";
      var largo2 = "";
      var largo3 = "";

      if (pasada1){
        var tipop1 = pasada1.tipoPunta;
        var matriz1 = pasada1.matriz;
        largo1 = pasada1.largo!==undefined? pasada1.largo : "";
      }

      if (pasada2){
        largo2 = pasada2.largo!==undefined? pasada2.largo : "";
        var tipop2 = pasada2.tipoPunta;
        var matriz2 = pasada2.matriz;        
      }


      if (pasada3){
        var tipop3 = pasada3.tipoPunta;
        var matriz3 = pasada3.matriz;        
        largo3 = pasada3.largo!==undefined? pasada3.largo : "";
      }
      var div = `
                  <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="x_title">
                            <h4>Pasada 1</h4>
                            <div class="clearfix"></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Largo (mm)</label>
                              <input disabled="" value="${largo1}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Punta</label>
                              <select disabled="" id="tp1" class="form-control" required>
                                <option></option>
                                <option value="1">Mitchel</option>
                                <option value="2">Bronson</option>
                                <option value="3">Conificadora</option>
                              </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Material</label>
                              <select disabled="" id="m1" class="form-control" required>
                                <option></option>
                                <option value="1">Acero</option>
                                <option value="2">Widia</option>
                              </select>
                            </div>
                          </div>
                          <div class="x_title">
                            <h4>Pasada 2</h4>
                            <div class="clearfix"></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Largo (mm)</label>
                              <input disabled="" value="${largo2}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Punta</label>
                              <select disabled="" id="tp2" class="form-control" required>
                                <option></option>
                                <option value="1">Mitchel</option>
                                <option value="2">Bronson</option>
                                <option value="3">Conificadora</option>
                              </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Material</label>
                              <select disabled="" id="m2" class="form-control" required>
                                <option></option>
                                <option value="1">Acero</option>
                                <option value="2">Widia</option>
                              </select>
                            </div>
                          </div>
                          <div class="x_title">
                            <h4>Pasada 3</h4>
                            <div class="clearfix"></div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Largo (mm)</label>
                              <input disabled="" value="${largo3}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Punta</label>
                              <select disabled="" id="tp3" class="form-control" required>
                                <option></option>
                                <option value="1">Mitchel</option>
                                <option value="2">Bronson</option>
                                <option value="3">Conificadora</option>
                              </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="control-label" for="first-name">Material</label>
                              <select disabled="" id="m3" class="form-control" required>
                                <option></option>
                                <option value="1">Acero</option>
                                <option value="2">Widia</option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows=""></textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                      </div>
                  </div><!-- Terminaa el 10-->
                `;
      $('div.punta').append(div);
      if (pasada1){
        $('#tp1').val(tipop1);
        $('#m1').val(matriz1);        
      }

      if (pasada2){
        $('#tp2').val(tipop2);
        $('#m2').val(matriz2);
      }

      if (pasada3){
        $('#tp3').val(tipop3);
        $('#m3').val(matriz3);        
      }

      return true;
    }

    function batea(results){
      var observaciones = "";
      var tipoBateaid = 0;

      if (results.row){
        observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";
        tipoBateaid = results.row.tipoBateaid!==undefined? results.row.tipoBateaid : "";
      }

      var divmatriz = $('div.accordion');
      var div = ` <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
                    <div class="panel-body">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label" for="first-name">Tipo De Batea</label>
                              <select disabled="" id="prtipobatea" class="form-control" required>
                                <option></option>
                                <option value="1">Con desengrase</option>
                                <option value="2">Sin desengrase</option>
                                <option value="3">Solo desengrase</option>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <label class="control-label" for="first-name">Observaciones</label>
                              <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                        </form>
                      </div>
                  </div><!-- Terminaa el 14-->
                `;
      $('div.batea').append(div);
      $('#prtipobatea').val(tipoBateaid);
      return true;
    }

    function horno(results){
      var carga = results.row.carga!==undefined? results.row.carga : "";
      var durezaMinima = results.row.durezaMinima!==undefined? results.row.durezaMinima : "";
      var durezaMaxima = results.row.durezaMaxima!==undefined? results.row.durezaMaxima : "";
      var velocidad = results.row.velocidad!==undefined? results.row.velocidad : "";
      var tubosxCamilla = results.row.tubosxCamilla!==undefined? results.row.tubosxCamilla : "";
      var observaciones = results.row.observaciones!==undefined? results.row.observaciones : "";

      //var divmatriz = $('div.accordion');
      var tipohornos = JSON.parse($('#tipohornos').val());
      var div = `<div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                                  <div class="panel-body">
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                      <div class="form-group">
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4 col-xs-12">
                                            <label class="control-label" for="first-name">Tipo De Horno</label>
                                            <select disabled="" id="prtipohorno" class="form-control" required>
                                              <option value=""></option>
                                            </select>
                                          </div>
                                          <div class="col-md-4 col-sm-4 col-xs-12">
                                            <label class="control-label" for="first-name">Carga (Kg/M)</label>
                                            <input value="${carga}" disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                          <div class="col-md-4 col-sm-4 col-xs-12">
                                            <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                                            <input value="${durezaMinima}" disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" for="first-name">Dureza Máxima (HRB)</label>
                                            <input value="${durezaMaxima}" disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" for="first-name">Temperatura</label>
                                            <select disabled="" id="prtemperaturaa" class="form-control" required>
                                              <option value="840">840</option>
                                              <option value="910">910</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" for="first-name">Velocidad (Mts/h)</label>
                                            <input value="${velocidad}" disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" for="first-name">Tubos por Camilla</label>
                                            <input value="${tubosxCamilla}" disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="control-label" for="first-name">Observaciones</label>
                                            <textarea disabled="" class="text-area" name="" id="" cols="" rows="">${observaciones}</textarea>
                                          </div>
                                        </div>
                                        <div class="ln_solid"></div>

                                      </form>
                                    </div>
                                </div><!-- Terminaa el 6 -->`;
      //divmatriz.append(div);
      var horno = "";

      for (var i = 0; i < tipohornos.length; i++) {
        if (tipohornos[i].id ==results.row.tipoHornoid )
          horno = tipohornos[i].descripcion;
      }

      $('div.horno').append(div);

      $('#prtipohorno option').eq(0).text(horno);

      $('#prtemperaturaa').val(results.row.temperatura);
      return true;

    }


    function preparacionMP(data){
      var div = `<div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                          <div class="panel-body">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label" for="first-name">Medida</label>
                                    <input disabled="" value="${data.medida}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label class="control-label" for="first-name">Largo Final</label>
                                    <input disabled="" value="${data.largofinal}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label class="control-label" for="first-name">Reducción (%)</label>
                                    <input disabled="" value="${data.reduccion}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label class="control-label" for="first-name">Precio</label>
                                    <input disabled="" value="${data.precio}" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label" for="first-name">Observaciones</label>
                                    <textarea disabled="" value="${data.observaciones}" class="text-area" name="" id="" cols="" rows=""></textarea>
                                  </div>
                                </div>
                                <div class="ln_solid"></div>
                              </form>
                            </div>
                        </div><!-- Terminaa el 1 -->`;
      //divmatriz.append(div);
      return div;
    }

    ///GENERAR ORDEN///
    $('#generar_orden').on('click', function(){
      validarOC(cotizacion_id);
    });

    $('#rechazar_orden').on('click', function(){
      $('#modal-rechazar').modal('show');
    });

    function validarOC(id){
      var ordencompra = $('#ordencompra').val();
      var pp = $('#preciopasdado').val();

      location.href =`/public/verordenproduccion/${id}?orden=${ordencompra}&preciopasado=${pp}&estadoid=3`;
    }

  });
</script>

@endsection