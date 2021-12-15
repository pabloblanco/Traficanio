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
            <h2>Información De La Cotización Nº {{$cotiz->id}}</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                
               <a class="btn btn-primary btn-sm btn-regresar" href="cotizar.html"><i class="fa fa-mail-reply"></i></a>                      
               </li>
                <li>
                  <button class="btn btn-primary btn-sm" type=""><i class="fa fa-print"></i></button>
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
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div  class="row">
                  <div class="col-md-6 col-sm- col-xs-12">
                    <label class="control-label" for="first-name">Nº De Compra</label>
                    <input disabled="" value="{{$cotiz->ordenCompra}}" type="text" id="" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Estado:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$cotiz->estcot}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Cliente:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$cotiz->razon}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Código Del Clinte:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$cotiz->codigo}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Fecha:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{Carbon\Carbon::parse($cotiz->fecha)->format('d/m/Y')}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Reventa:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$cotiz->descreventa}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <span><strong>Urgente:</strong></span>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <span>{{$cotiz->urgencia}}</span>
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
                        <span>{{$cotiz->diametroExteriorNominal}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Máximo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->largoMaximo}}</span>
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
                        <span>{{$cotiz->diametroExteriorMaximo}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Mínimo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->largoMinimo}}</span>
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
                        <span>{{$cotiz->diametroExteriorMinimo}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Máx. Entrega:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->largoMaxEntrega}}</span>
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
                        <span>{{$cotiz->diametroInteriorNominal}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Mín. Entrega:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->largoMinEntrega}}</span>
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
                        <span>{{$cotiz->diametroInteriorMaximo}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Ensayo De Expansión:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->ensayoExpansion}}</span>
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
                        <span>{{$cotiz->diametroInteriorMinimo}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Tipo De Costura:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->descostura}}</span>
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
                        <span>{{$cotiz->espesorNominal}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Norma:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->desnorma}}</span>
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
                        <span>{{$cotiz->espesorMaximo}}</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Espesor Mínimo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->espesorMinimo}}</span>
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
                        <span>{{Carbon\Carbon::parse($cotiz->fechaEntrega)->format('d/m/Y')}}</span>
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
                        <span>{{$cotiz->lugarEntrega}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Piezas:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->piezas}}</span>
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
                        <span>{{$cotiz->desnorma}}</span>
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
                        <span>{{$cotiz->desforma}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Kg/M:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->kilogrametro}}</span>
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
                        <span>{{$cotiz->desusofinal}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Biselado:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->bise}}</span>
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
                        <span>{{$cotiz->desembalaje}}</span>
                      </div>
                    </div>
                  </div>
            @if ($cotiz->estenciladoid > 0)
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Estencilado:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Máximo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->largomaxest}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Largo Mínimo:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->largominest}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Número De Colada:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->numeroColada}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Medida:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->med}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Tipo De Costura:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->costuraidest}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Norma:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->normaidest}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Observaciones:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->observaeste}}</span>
                      </div>
                    </div>
                  </div>
                </div><br>
            @endif
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
                        <span>{{$cotiz->durezaMinima}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Rugosidad:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->rugosidad}}</span>
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
                        <span>{{$cotiz->durezaMaxima}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Flecha:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->flecha}}</span>
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
                        <span>{{$cotiz->tacero}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Pestañado:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->pesta}}</span>
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
                        <span>{{$cotiz->desctt}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Aplastado:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->aplas}}</span>
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
                        <span></span>
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
                        <span>{{$cotiz->condicionvta}}</span>
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
                        <span><strong>Precio Metro:</strong></span>
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
                        <span>{{$cotiz->precioPieza}}</span>
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
                        <span>{{$unidad}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Tipo De Moneda:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span>{{$cotiz->moneda}}</span>
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
                        <span>{{$cotiz->precioMP}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <span><strong>Precio Contribución:</strong></span>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <span></span>
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
                        <span>{{$cotiz->observacionVenta}}</span>
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
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="heading1" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
                          <h4 class="panel-title">Preparación MP</h4>
                        </a>
                        <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                          <div class="panel-body">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label" for="first-name">Medida</label>
                                    <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label class="control-label" for="first-name">Largo Final</label>
                                    <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label class="control-label" for="first-name">Reducción (%)</label>
                                    <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label class="control-label" for="first-name">Esto es el precio 1</label>
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
                                <div class="form-group">
                                  <div class="col-md-9 col-sm-9 col-xs-12 ">
                                    <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div><!-- Terminaa el 1 -->
                        <div class="panel">
                          <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title">Empaquetado</h4>
                          </a>
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                      <label class="control-label" for="first-name">Tipo De Empaquetado</label>
                                      <select disabled="" id="" class="form-control" required>
                                        <option value="">Costrura 1</option>
                                        <option value="press">Costura 2</option>
                                        <option value="">Costura 3</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                      <label class="control-label" for="first-name">Tubos por Paquete</label>
                                      <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                      <label class="control-label" for="first-name">Kilogramo por Paquete</label>
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
                                  <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 ">
                                      <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div><!-- Terminaa el 2 -->
                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="heading3" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                              <h4 class="panel-title">Control Final</h4>
                            </a>
                            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                              <div class="panel-body">
                              </div>
                            </div>
                          </div><!-- Terminaa el 3 -->
                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="heading4" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                              <h4 class="panel-title">Entrega</h4>
                            </a>
                            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                              <div class="panel-body">
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-md-4 col-sm-4 col-xs-12">
                                        <label class="control-label" for="first-name">Tipo De Entrega</label>
                                        <select disabled="" id="" class="form-control" required>
                                          <option value=""> 1</option>
                                          <option value="press"> 2</option>
                                          <option value=""> 3</option>
                                        </select>
                                      </div>
                                      <div class="col-md-4 col-sm-4 col-xs-12">
                                        <label class="control-label" for="first-name">Costo Por Kg</label>
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
                                    <div class="form-group">
                                      <div class="col-md-9 col-sm-9 col-xs-12 ">
                                        <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div><!-- Terminaa el 4 -->
                            <div class="panel">
                              <a class="panel-heading collapsed" role="tab" id="heading5" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                <h4 class="panel-title">Certificado</h4>
                              </a>
                              <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                                <div class="panel-body">
                                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="control-label" for="first-name">Certificado</label>
                                          <select disabled="" id="" class="form-control" required>
                                            <option value=""> 1</option>
                                            <option value="press"> 2</option>
                                            <option value=""> 3</option>
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
                                      <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                                          <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div><!-- Terminaa el 5 -->
                              <div class="panel">
                                <a class="panel-heading collapsed" role="tab" id="heading6" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                  <h4 class="panel-title">Horno</h4>
                                </a>
                                <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                                  <div class="panel-body">
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                      <div class="form-group">
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4 col-xs-12">
                                            <label class="control-label" for="first-name">Tipo De Horno</label>
                                            <select disabled="" id="" class="form-control" required>
                                              <option value=""> 1</option>
                                              <option value="press"> 2</option>
                                              <option value=""> 3</option>
                                            </select>
                                          </div>
                                          <div class="col-md-4 col-sm-4 col-xs-12">
                                            <label class="control-label" for="first-name">Carga (Kg/M)</label>
                                            <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                          <div class="col-md-4 col-sm-4 col-xs-12">
                                            <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                                            <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" for="first-name">Dureza Máxima (HRB)</label>
                                            <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" for="first-name">Temperatura</label>
                                            <select disabled="" id="" class="form-control" required>
                                              <option value=""> 1</option>
                                              <option value="press"> 2</option>
                                              <option value=""> 3</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" for="first-name">Velocidad (Mts/h)</label>
                                            <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="control-label" for="first-name">Tubos por Camilla</label>
                                            <select disabled="" id="" class="form-control" required>
                                              <option value=""> 1</option>
                                              <option value="press"> 2</option>
                                              <option value=""> 3</option>
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
                                        <div class="form-group">
                                          <div class="col-md-9 col-sm-9 col-xs-12 ">
                                            <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div><!-- Terminaa el 6 -->
                                <div class="panel">
                                  <a class="panel-heading collapsed" role="tab" id="heading7" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                    <h4 class="panel-title">Corte</h4>
                                  </a>
                                  <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                                    <div class="panel-body">
                                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <label class="checkbox">Corte Punta
                                                <input type="checkbox" checked="checked">
                                                <span class="check"></span>
                                              </label>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                              <label class="control-label" for="first-name">Elemento Corte</label>
                                              <select disabled="" id="" class="form-control" required>
                                                <option value=""> 1</option>
                                                <option value="press"> 2</option>
                                                <option value=""> 3</option>
                                              </select>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                              <label class="control-label" for="first-name">Tipo De Corte</label>
                                              <select disabled="" id="" class="form-control" required>
                                                <option value=""> 1</option>
                                                <option value="press"> 2</option>
                                                <option value=""> 3</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <label class="control-label" for="first-name">Cantidad De Cortes</label>
                                              <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <label class="control-label" for="first-name">Resto/Scrap</label>
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
                                          <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                              <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div><!-- Terminaa el 7 -->
                                  <div class="panel">
                                    <a class="panel-heading collapsed" role="tab" id="heading8" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                      <h4 class="panel-title">Servicio</h4>
                                    </a>
                                    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                                      <div class="panel-body">
                                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label" for="first-name">Tipo De Rubro</label>
                                                <select disabled="" id="" class="form-control" required>
                                                  <option value=""> 1</option>
                                                  <option value="press"> 2</option>
                                                  <option value=""> 3</option>
                                                </select>
                                              </div>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label" for="first-name">Lugar De Entrega</label>
                                                <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label" for="first-name">Precio</label>
                                                <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                              </div>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label class="control-label" for="first-name">Proveedor</label>
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
                                            <div class="form-group">
                                              <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div><!-- Terminaa el 8 -->
                                    <div class="panel">
                                      <a class="panel-heading collapsed" role="tab" id="heading9" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                        <h4 class="panel-title">Trefila</h4>
                                      </a>
                                      <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                                        <div class="panel-body">
                                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                            <div class="form-group">
                                              <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                  <label class="control-label" for="first-name">N° De Trefila</label>
                                                  <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                  <label class="control-label" for="first-name">Tipo De Matríz</label>
                                                  <select disabled="" id="" class="form-control" required>
                                                    <option value=""> 1</option>
                                                    <option value="press"> 2</option>
                                                    <option value=""> 3</option>
                                                  </select>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                  <label class="control-label" for="first-name">Ø</label>
                                                  <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                              </div>
                                              <div class="x_title">
                                                <h2>Punzón</h2>
                                                <div class="clearfix"></div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                  <label class="control-label" for="first-name">Tipo De Punzón</label>
                                                  <select disabled="" id="" class="form-control" required>
                                                    <option value=""> 1</option>
                                                    <option value="press"> 2</option>
                                                    <option value=""> 3</option>
                                                  </select>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                  <label class="control-label" for="first-name">Materila Punzón</label>
                                                  <select disabled="" id="" class="form-control" required>
                                                    <option value=""> 1</option>
                                                    <option value="press"> 2</option>
                                                    <option value=""> 3</option>
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
                                              <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                  <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                                </div>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div><!-- Terminaa el 9-->
                                      <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="heading10" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                          <h4 class="panel-title">Punta</h4>
                                        </a>
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
                                                    <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                  </div>
                                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label class="control-label" for="first-name">Tipo De Punta</label>
                                                    <select disabled="" id="" class="form-control" required>
                                                      <option value=""> 1</option>
                                                      <option value="press"> 2</option>
                                                      <option value=""> 3</option>
                                                    </select>
                                                  </div>
                                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label class="control-label" for="first-name">Material</label>
                                                    <select disabled="" id="" class="form-control" required>
                                                      <option value=""> 1</option>
                                                      <option value="press"> 2</option>
                                                      <option value=""> 3</option>
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
                                                    <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                  </div>
                                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label class="control-label" for="first-name">Tipo De Punta</label>
                                                    <select disabled="" id="" class="form-control" required>
                                                      <option value=""> 1</option>
                                                      <option value="press"> 2</option>
                                                      <option value=""> 3</option>
                                                    </select>
                                                  </div>
                                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label class="control-label" for="first-name">Material</label>
                                                    <select disabled="" id="" class="form-control" required>
                                                      <option value=""> 1</option>
                                                      <option value="press"> 2</option>
                                                      <option value=""> 3</option>
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
                                                    <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                  </div>
                                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label class="control-label" for="first-name">Tipo De Punta</label>
                                                    <select disabled="" id="" class="form-control" required>
                                                      <option value=""> 1</option>
                                                      <option value="press"> 2</option>
                                                      <option value=""> 3</option>
                                                    </select>
                                                  </div>
                                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <label class="control-label" for="first-name">Material</label>
                                                    <select disabled="" id="" class="form-control" required>
                                                      <option value=""> 1</option>
                                                      <option value="press"> 2</option>
                                                      <option value=""> 3</option>
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
                                                <div class="form-group">
                                                  <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                    <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                                  </div>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div><!-- Terminaa el 10-->
                                        <div class="panel">
                                          <a class="panel-heading collapsed" role="tab" id="heading11" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                            <h4 class="panel-title">Prueba Hidráulica</h4>
                                          </a>
                                          <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                                            <div class="panel-body">
                                              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                  <div class="x_title">
                                                    <h4>Pasada 1</h4>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <label class="control-label" for="first-name">Presión De Prueba(Kg/cm <sup>2</sup>)</label>
                                                      <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <label class="control-label" for="first-name">Tiempo (seg)</label>
                                                      <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <label class="control-label" for="first-name">Precio</label>
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
                                                  <div class="form-group">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                      <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                                    </div>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div><!-- Terminaa el 11-->
                                          <div class="panel">
                                            <a class="panel-heading collapsed" role="tab" id="heading12" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                              <h4 class="panel-title">Estencilado</h4>
                                            </a>
                                            <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                                              <div class="panel-body">
                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                                  <div class="form-group">
                                                    <div class="row">
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label" for="first-name">Largo Mínimo</label>
                                                        <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                      </div>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label" for="first-name">Largo Máximo</label>
                                                        <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label" for="first-name">N° De Colada</label>
                                                        <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                      </div>
                                                      <div class="col-md-6 col-sm-4 col-xs-12">
                                                        <label class="control-label" for="first-name">Medida</label>
                                                        <input disabled="" type="text" id="" required="required" class="form-control col-md-7 col-xs-12">
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label" for="first-name">Tipo De Costura</label>
                                                        <select disabled="" id="" class="form-control" required>
                                                          <option value=""> 1</option>
                                                          <option value="press"> 2</option>
                                                          <option value=""> 3</option>
                                                        </select>
                                                      </div>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label class="control-label" for="first-name">Norma</label>
                                                        <select disabled="" id="" class="form-control" required>
                                                          <option value=""> 1</option>
                                                          <option value="press"> 2</option>
                                                          <option value=""> 3</option>
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
                                                    <div class="form-group">
                                                      <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                        <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                                      </div>
                                                    </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div><!-- Terminaa el 12-->
                                            <div class="panel">
                                              <a class="panel-heading collapsed" role="tab" id="heading13" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                                <h4 class="panel-title">Eddy Current</h4>
                                              </a>
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
                                                          <textarea disabled="" class="text-area" name="" id="" cols="" rows=""></textarea>
                                                        </div>
                                                      </div>
                                                      <div class="ln_solid"></div>
                                                      <div class="form-group">
                                                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                          <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                                        </div>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div><!-- Terminaa el 13-->
                                              <div class="panel">
                                                <a class="panel-heading collapsed" role="tab" id="heading14" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                                  <h4 class="panel-title">Batea</h4>
                                                </a>
                                                <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
                                                  <div class="panel-body">
                                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                                      <div class="form-group">
                                                        <div class="row">
                                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label class="control-label" for="first-name">Tipo De Batea</label>
                                                            <select disabled="" id="" class="form-control" required>
                                                              <option value=""> 1</option>
                                                              <option value="press"> 2</option>
                                                              <option value=""> 3</option>
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
                                                        <div class="form-group">
                                                          <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                            <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                                          </div>
                                                        </div>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div><!-- Terminaa el 14-->
                                                <div class="panel">
                                                  <a class="panel-heading collapsed" role="tab" id="heading15" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                                    <h4 class="panel-title">Enderezadora</h4>
                                                  </a>
                                                  <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
                                                    <div class="panel-body">
                                                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                                        <div class="form-group">
                                                          <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                              <label class="control-label" for="first-name">Tipo</label>
                                                              <select disabled="" id="" class="form-control" required>
                                                                <option value=""> 1</option>
                                                                <option value="press"> 2</option>
                                                                <option value=""> 3</option>
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
                                                          <div class="form-group">
                                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                              <button type="" class="btn btn-primary  btn-sm">Finalizar</button>
                                                            </div>
                                                          </div>
                                                        </form>
                                                      </div>
                                                    </div>
                                                  </div><!-- Terminaa el 15-->
                                                </div>
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