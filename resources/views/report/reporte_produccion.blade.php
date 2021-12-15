@extends('layouts.app')

@section('content')

<!-- page content -->
<!-- Inicio de las ventanas modales-->
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
        <button id="send" type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- /modals eliminar -->
<!--  modal modifcar  -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Modificar Reporte De Producción</h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <form action="">
          <div class="form-group">

            <div class="row">

              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="control-label" for="first-name">Nombre</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($reportes as $reporte)
                    <option value="{{$reporte->id}}">{{$reporte->descripcion}}</option>
                  @endforeach
                </select>
              </div>

            </div><br>
            <div class="row">
              <div class="col-md-1">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Cargar</button>
              </div>
              <div class="col-md-1">
                <button type="button" class="btn btn-delete  btn-sm">Limpiar</button>
              </div>
            </div><br>
            <div class="x_title">
              <h5>Datos De Producción</h5>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Nombre</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <label class="control-label" for="first-name">Código del Cliente</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                <label class="control-label" for="first-name">Fecha De Entrega</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Desde</label>
                <div class='input-group date' id='DatepickerModalModifEntregaDesde'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Hasta</label>
                <div class='input-group date' id='DatepickerModalModifEntregaHasta'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                <label class="control-label" for="first-name">Fecha a Planta</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Desde</label>
                <div class='input-group date' id='DatepickerModalModifPlantaDesde'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Hasta</label>
                <div class='input-group date' id='DatepickerModalModifPlantaHasta'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="x_title">
              <h5>Estados</h5>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Sin Proceso
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">En Planificación
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">En Producción
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Pendiente de Control
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Facturada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Terminada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Anulada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Despachada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Rechazada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="x_title">
              <h5>Medidas</h5>
              <div class="clearfix"></div>
            </div>

            <div  class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Diámetro Exterior</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Diámetro Exterior Min</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Diámetro Exterior Máx.</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Diámetro Interior</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Diámetro Interior Min</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Diámetro Interior Máx</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Espesor</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Espesor Min.</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Espesor Máx.</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Kilos</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>

            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Largo Máximo</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Largo Mínimo</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Tipo de Acero</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($tipoaceros as $tipoacero)
                    <option value="{{$tipoacero->id}}">{{$tipoacero->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Tipo de Costura</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($tipocosturas as $tipocostura)
                    <option value="{{$tipocostura->id}}">{{$tipocostura->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Tratamiento Térmico</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($tratamientos as $tratamiento)
                    <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Norma</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($normas as $norma)
                    <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Tipo de Orden</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($tipoordenes as $tipoordene)
                    <option value="{{$tipoordene->id}}">{{$tipoordene->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Uso</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($usos as $uso)
                    <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="x_title">
              <h5>Subprocesos</h5>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Horno
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Batea
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Punta
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Trefila
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Corte
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Eddy Current
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Prueba Hidráulca
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>

            </div>
            <div class="x_title">
              <h5>Estados Subprocesos</h5>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Inactivo
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Activado
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">En proceso
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Finalizado
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Pendiente Autorización
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>

            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Prueba Hidráulca
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>

            </div>
            <div class="x_title">
              <h5>Control de Calidad</h5>
              <div class="clearfix"></div>
            </div>

            <div  class="row">
              <div class="col-md-4 col-sm-4 col-xs-4">
                <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4">
                <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4">
                <label class="control-label" for="first-name">Rugosidad</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>

            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-6">
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Certificado</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($certificados as $certificado)
                    <option value="{{$certificado->id}}">{{$certificado->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Pestañado
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Aplastado
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>

            </div><br>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /modals modificar-->
<!--  modal agregar  -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Agregar Reporte De Producción</h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <form action="">
          <div class="form-group">

            <div class="row">

              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="control-label" for="first-name">Nombre</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($reportes as $reporte)
                    <option value="{{$reporte->id}}">{{$reporte->descripcion}}</option>
                  @endforeach
                </select>
              </div>

            </div><br>
            <div class="row">
              <div class="col-md-1">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Cargar</button>
              </div>
              <div class="col-md-1">
                <button type="button" class="btn btn-delete  btn-sm">Limpiar</button>
              </div>
            </div><br>
            <div class="x_title">
              <h5>Datos De Producción</h5>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Nombre</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <label class="control-label" for="first-name">Código del Cliente</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                <label class="control-label" for="first-name">Fecha De Entrega</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Desde</label>
                <div class='input-group date' id='DatepickerModalAddEntregaDesde'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Hasta</label>
                <div class='input-group date' id='DatepickerModalAddEntregaHasta'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                <label class="control-label" for="first-name">Fecha a Planta</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Desde</label>
                <div class='input-group date' id='DatepickerModalAddPlantaDesde'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Hasta</label>
                <div class='input-group date' id='DatepickerModalAddPlantaHasta'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="x_title">
              <h5>Estados</h5>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Sin Proceso
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">En Planificación
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">En Producción
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Pendiente de Control
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Facturada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Terminada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Anulada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Despachada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Rechazada
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="x_title">
              <h5>Medidas</h5>
              <div class="clearfix"></div>
            </div>

            <div  class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Diámetro Exterior</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Diámetro Exterior Min</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Diámetro Exterior Máx.</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Diámetro Interior</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Diámetro Interior Min</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Diámetro Interior Máx</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Espesor</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Espesor Min.</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                <label class="control-label" for="first-name">Espesor Máx.</label>
              </div>
              <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                <label class="control-label" for="first-name">Kilos</label>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Desde</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Hasta</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
            </div>

            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Largo Máximo</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Largo Mínimo</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Tipo de Acero</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($tipoaceros as $tipoacero)
                    <option value="{{$tipoacero->id}}">{{$tipoacero->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Tipo de Costura</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($tipocosturas as $tipocostura)
                    <option value="{{$tipocostura->id}}">{{$tipocostura->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div  class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Tratamiento Térmico</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($tratamientos as $tratamiento)
                    <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Norma</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($normas as $norma)
                    <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Tipo de Orden</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($tipoordenes as $tipoordene)
                    <option value="{{$tipoordene->id}}">{{$tipoordene->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <label class="control-label" for="first-name">Uso</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($usos as $uso)
                    <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="x_title">
              <h5>Subprocesos</h5>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Horno
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Batea
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Punta
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Trefila
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Corte
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Eddy Current
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Prueba Hidráulca
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>

            </div>
            <div class="x_title">
              <h5>Estados Subprocesos</h5>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Inactivo
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Activado
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">En proceso
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Finalizado
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Pendiente Autorización
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>

            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Prueba Hidráulca
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>

            </div>
            <div class="x_title">
              <h5>Control de Calidad</h5>
              <div class="clearfix"></div>
            </div>

            <div  class="row">
              <div class="col-md-4 col-sm-4 col-xs-4">
                <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4">
                <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4">
                <label class="control-label" for="first-name">Rugosidad</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>

            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-6">
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Certificado</label>
                <select id="" class="form-control">
                  <option value=""></option>
                  @foreach ($certificados as $certificado)
                    <option value="{{$certificado->id}}">{{$certificado->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Pestañado
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <label class="checkbox">Aplastado
                  <input type="checkbox">
                  <span class="check"></span>
                </label>
              </div>

            </div><br>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /modals agregar-->

<!-- Fin de las ventanas modales-->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Reportes de Producción</h2>
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
          <div class="x_title">
            <h5>Cargar Reporte</h5>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">

                <div class="row">
                  <input id="idreport" name="" type="hidden">

                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Nombre</label>
                    <select id="nombrereporteidb" class="form-control">
                      <option></option>
                      @foreach ($reportes as $reporte)
                        <option value="{{$reporte->id}}">{{$reporte->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>

                </div><br>
                <div class="row">
                  <div class="col-md-1">
                    <a id="cargarreport" class="btn btn-default btn-sm">Cargar</a>
                  </div>
                  <div class="col-md-1">
                    <a id="limpiarbusqueda2" class="btn btn-delete  btn-sm">Limpiar</a>
                  </div>
                </div><br>
                <div class="x_title">
                  <h5>Datos De Producción</h5>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Nombre Cliente</label>
                    <select id="clienteidb" class="form-control">
                      <option value=""></option>
                      @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label" for="first-name">Código del Cliente</label>
                    <input type="text" id="codigob" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                    <label class="control-label" for="first-name">Fecha De Entrega</label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Desde</label>
                    <div class='input-group date' id='DatepickerEntregaDesde'>
                      <input id="desdeb" type='text' class="form-control" />
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Hasta</label>
                    <div class='input-group date' id='DatepickerEntregaHasta'>
                      <input id="hastab" type='text' class="form-control" />
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                    <label class="control-label" for="first-name">Fecha a Planta</label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Desde</label>
                    <div class='input-group date' id='DatepickerPlantaDesde'>
                      <input id="plantadesdeb" type='text' class="form-control" />
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Hasta</label>
                    <div class='input-group date' id='DatepickerPlantaHasta'>
                      <input id="plantahastab" type='text' class="form-control" />
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="x_title">
                  <h5>Estados</h5>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Sin Proceso
                      <input id="sinprocesob" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">En Planificación
                      <input id="enplanificacionb" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">En Producción
                      <input id="enproduccionb" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Pendiente de Control
                      <input id="pendientesb" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Facturada
                      <input id="facturab" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Terminada
                      <input id="terminadab" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Anulada
                      <input id="anuladab" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Despachada
                      <input id="despachadab" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Rechazada
                      <input id="rechazadab" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                </div>
                <div class="x_title">
                  <h5>Medidas</h5>
                  <div class="clearfix"></div>
                </div>

                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Exterior</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                    <label class="control-label" for="first-name">Diámetro Exterior Min</label>
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
                    <input type="text" id="diametroextmindesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametroextminhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Exterior Máx.</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                    <label class="control-label" for="first-name">Diámetro Interior</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametroextmaxdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametroextmaxhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametrointdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametrointhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Interior Min</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                    <label class="control-label" for="first-name">Diámetro Interior Máx</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametrointmindesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametrointminhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametrointmaxdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametrointmaxhastab" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                    <label class="control-label" for="first-name">Espesor Min.</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesordesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesorhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesormindesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesorminhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor Máx.</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                    <label class="control-label" for="first-name">Kilos</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesormaxdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesormaxhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="kilosdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="kiloshastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>

                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Largo Máximo</label>
                    <input type="text" id="largomaxb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Largo Mínimo</label>
                    <input type="text" id="largominb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tipo de Acero</label>
                    <select id="tipoaceroidb" class="form-control">
                      <option value=""></option>
                      @foreach ($tipoaceros as $tipoacero)
                        <option value="{{$tipoacero->id}}">{{$tipoacero->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tipo de Costura</label>
                    <select id="tipocosturaidb" class="form-control">
                      <option value=""></option>
                      @foreach ($tipocosturas as $tipocostura)
                        <option value="{{$tipocostura->id}}">{{$tipocostura->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tratamiento Térmico</label>
                    <select id="tratamientoidb" class="form-control">
                      <option value=""></option>
                      @foreach ($tratamientos as $tratamiento)
                        <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Norma</label>
                    <select id="normaidb" class="form-control">
                      <option value=""></option>
                      @foreach ($normas as $norma)
                        <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tipo de Orden</label>
                    <select id="tipoordenidb" class="form-control">
                      <option value=""></option>
                      @foreach ($tipoordenes as $tipoodene)
                        <option value="{{$tipoodene->id}}">{{$tipoodene->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Uso</label>
                    <select id="usoidb" class="form-control">
                      <option value=""></option>
                      @foreach ($usos as $uso)
                        <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="x_title">
                  <h5>Subprocesos</h5>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Horno
                      <input id="hornob" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Batea
                      <input id="bateab" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Punta
                      <input id="puntab" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Trefila
                      <input id="trefilab" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Corte
                      <input id="corteb" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Eddy Current
                      <input id="currentb" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Prueba Hidráulca
                      <input id="pruebab" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>

                </div>
                <div class="x_title">
                  <h5>Estados Subprocesos</h5>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Inactivo
                      <input id="inactivob" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Activado
                      <input id="activadob" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">En proceso
                      <input id="enprocesob" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Finalizado
                      <input id="finalizadob" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Pendiente Autorización
                      <input id="autorizacionb" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>

                </div>

                </div>
                <div class="x_title">
                  <h5>Control de Calidad</h5>
                  <div class="clearfix"></div>
                </div>

                <div  class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                    <input type="text" id="durezaminb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <label class="control-label" for="first-name">Dureza Maxima (HRB)</label>
                    <input type="text" id="durezamaxb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <label class="control-label" for="first-name">Rugosidad</label>
                    <input type="text" id="rugosidadb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                    <input type="text" id="flechab" placeholder="" class="form-control col-md-7 col-xs-6">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Certificado</label>
                    <select id="cerfiticadoidb" class="form-control">
                      <option value=""></option>
                      @foreach ($certificados as $certificado)
                        <option value="{{$certificado->id}}">{{$certificado->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Pestañado
                      <input id="pestanadob" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Aplastado
                      <input id="aplastadob" type="checkbox">
                      <span class="check"></span>
                    </label>
                  </div>

                </div><br>
                <div class="x_title">
                  <h5>Guardar/Ejecutar Reporte</h5>
                  <div class="clearfix"></div>
                </div>

                <div class="row">

                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Nombre del Reporte</label>
                    <input id="nombrereporte" type="text" id="" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 ">
                    <a id="ejecutar" class="btn btn-primary  btn-sm">Ejecutar</a>
                    <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
                  </div>
                </div>
              </div>
            </form>
            <div class="col-md-4 col-sm-4 col-xs-12">
            </div>
            <div class="clearfix"></div>
            <div class="x_content">
              <div class="row">
                <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                <div class="table-responsive">
                  <table id="datatable-buttonsreport" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>N° De Orden</th>
                        <th>Cliente</th>
                        <th>URG</th>
                        <th>Sem</th>
                        <th>Proceso Actual</th>
                        <th>Pase a Planta</th>
                        <th>Fecha del Pedido</th>
                        <th>Ext</th>
                        <th>Esp</th>
                        <th>Piezas</th>
                        <th>Mts</th>
                        <th>Kg</th>
                        <th>Costos</th>
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
<!-- /page content -->

@endsection

@section('js_extra')
<script type="text/javascript">
  $(function(){

    var table = $("#datatable-buttonsreport").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    $('#limpiarbusqueda2').on('click', function(){
      $('#nombrereporteidb').val("");
      $('#idreport').val("");
    });
    function vaciado(){
      $('#clienteidb').val("");
      $('#codigob').val("");
      $('#desdeb').val("");
      $('#hastab').val("");
      $('#plantahastab').val("");
      $('#plantadesdeb').val("");
      $("#sinprocesob").removeAttr('checked');
      $("#enplanificacionb").removeAttr('checked');
      $("#enproduccionb").removeAttr('checked');
      $("#pendientesb").removeAttr('checked');
      $("#facturab").removeAttr('checked');
      $("#terminadab").removeAttr('checked');
      $("#anuladab").removeAttr('checked');
      $("#despachadab").removeAttr('checked');
      $("#rechazadab").removeAttr('checked');
      $('#diametroextdesdeb').val("");
      $('#diametroexthastab').val("");
      $('#diametroextmaxhastab').val("");
      $('#diametroextmaxdesdeb').val("");
      $('#diametroextmindesdeb').val("");
      $('#diametroextminhastab').val("");
      $('#diametrointdesdeb').val("");
      $('#diametrointhastab').val("");
      $('#diametrointmaxhastab').val("");
      $('#diametrointmaxdesdeb').val("");
      $('#diametrointmindesdeb').val("");
      $('#diametrointminhastab').val("");
      $('#espesordesdeb').val("");
      $('#espesorhastab').val("");
      $('#espesorminhastab').val("");
      $('#espesormindesdeb').val("");
      $('#espesormaxhastab').val("");
      $('#espesormaxdesdeb').val("");
      $('#kiloshastab').val("");
      $('#kilosdesdeb').val("");
      $('#largominb').val("");
      $('#largomaxb').val("");
      $('#tipoaceroidb').val("");
      $('#tipocosturaidb').val("");
      $('#tratamientoidb').val("");
      $('#normaidb').val("");
      $('#tipoordenidb').val("");
      $('#usoidb').val("");
      $("#hornob").removeAttr('checked');
      $("#bateab").removeAttr('checked');
      $("#puntab").removeAttr('checked');
      $("#trefilab").removeAttr('checked');
      $("#corteb").removeAttr('checked');
      $("#currentb").removeAttr('checked');
      $("#pruebab").removeAttr('checked');
      $("#inactivob").removeAttr('checked');
      $("#activadob").removeAttr('checked');
      $("#enprocesob").removeAttr('checked');
      $("#finalizadob").removeAttr('checked');
      $("#autorizacionb").removeAttr('checked');
      $('#durezamaxb').val("");
      $('#durezaminb').val("");
      $('#rugosidadb').val("");
      $('#flechab').val("");
      $('#cerfiticadoidb').val("");
      $("#pestanadob").removeAttr('checked');
      $("#aplastadob").removeAttr('checked');
      $('#nombrereporte').val("");
    }
    $('#limpiarbusqueda').on('click', function(){
      vaciado();

    });


    $('#cargarreport').on('click', function(){
      vaciado();
      var reportcargado = $('#nombrereporteidb').val();
      if (reportcargado){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        $.ajax({
          type: "post",
          url: "{{route('cargarreport')}}",
          data: {
            'type': 1,
            'id': reportcargado,

          },
          success: function(data){
            //$('#sinprocesob').prop('checked', true);
            $('#clienteidb').val(data.clienteb);
            $('#desdeb').val(data.febdesde);
            $('#hastab').val(data.febhasta);
            $('#plantahastab').val(data.fephasta);
            $('#plantadesdeb').val(data.fepdesde);
            if (data.sinProceso == 1)
              $("#sinprocesob").prop('checked', true);
            if (data.enPlanificacion == 1)
              $("#enplanificacionb").prop('checked', true);
            if (data.enProduccion == 1)
              $("#enproduccionb").prop('checked', true);
            if (data.pendienteControl == 1)
              $("#pendientesb").prop('checked', true);
            if (data.facturada == 1)
              $("#facturab").prop('checked', true);
            if (data.terminada == 1)
              $("#terminadab").prop('checked', true);
            if (data.anulada == 1)
              $("#anuladab").prop('checked', true);
            if (data.despachada == 1)
              $("#despachadab").prop('checked', true);
            if (data.rechazada == 1)
              $("#rechazadab").prop('checked', true);
            $('#diametroextdesdeb').val(data.diamextb);
            $('#diametroexthastab').val(data.diamextb);
            $('#diametroextmaxhastab').val(data.diamextb);
            $('#diametroextmaxdesdeb').val(data.diamextb);
            $('#diametroextmindesdeb').val(data.diamextb);
            $('#diametroextminhastab').val(data.diamextb);
            $('#diametrointdesdeb').val(data.diamintb);
            $('#diametrointhastab').val(data.diamintb);
            $('#diametrointmaxhastab').val(data.diamintb);
            $('#diametrointmaxdesdeb').val(data.diamintb);
            $('#diametrointmindesdeb').val(data.diamintb);
            $('#diametrointminhastab').val(data.diamintb);
            $('#espesordesdeb').val(data.espesorb);
            $('#espesorhastab').val(data.espesorb);
            $('#espesorminhastab').val(data.espesorb);
            $('#espesormindesdeb').val(data.espesorb);
            $('#espesormaxhastab').val(data.espesorb);
            $('#espesormaxdesdeb').val(data.espesorb);
            $('#kiloshastab').val(data.kilhasta);
            $('#kilosdesdeb').val(data.kildesde);
            $('#largominb').val(data.largoMinb);
            $('#largomaxb').val(data.largob);
            $('#tipoaceroidb').val(data.tipoacerob);
            $('#tipocosturaidb').val(data.tipocosturab);
            $('#tratamientoidb').val(data.tipotratb);
            $('#normaidb').val(data.tiponormab);
            //$('#tipoordenidb').val(data.);
            $('#usoidb').val(data.usob);
            if (data.horno == 1)
              $("#hornob").prop('checked', true);
            if (data.batea == 1)
              $("#bateab").prop('checked', true);
            if (data.punta == 1)
              $("#puntab").prop('checked', true);
            if (data.trefila == 1)
              $("#trefilab").prop('checked', true);
            if (data.corte == 1)
              $("#corteb").prop('checked', true);
            if (data.eddyCurrent == 1)
              $("#currentb").prop('checked', true);
            if (data.pruebaH == 1)
              $("#pruebab").prop('checked', true);
            if (data.inactivo == 1)
              $("#inactivob").prop('checked', true);
            if (data.activado == 1)
              $("#activadob").prop('checked', true);
            if (data.enProceso == 1)
              $("#enprocesob").prop('checked', true);
            if (data.finalizado == 1)
              $("#finalizadob").prop('checked', true);
            if (data.pendiente)
              $("#autorizacionb").prop('checked', true);
            $('#durezamaxb').val(data.durezaMax);
            $('#durezaminb').val(data.durezaMin);
            $('#rugosidadb').val(data.rugosidad);
            $('#flechab').val(data.flecha);
            $('#cerfiticadoidb').val(data.certificado);
            if (data.aplastado == 1)
              $("#aplastadob").prop('checked', true);
            $('#nombrereporte').val(data.descripcion);
            if (data.pestañado == 1)
              $("#pestanadob").prop('checked', true);
            $('#idreport').val(data.id);

            return;
          }

        });

      }
      else{
        $.toast({
          text : "Debe Seleccionar un Reporte a Cargar",
          showHideTransition : 'slide',
          bgColor : 'red',
          textColor : '#eee',
          allowToastClose : false,
          hideAfter : 5000,
          stack : 5,
          textAlign : 'left',
          position : 'top-right'
        });
        return;
      }
    });

    $('#ejecutar').on('click', function(){
      var reporte_id = $('#idreport').val();
      var reportdes = $('#nombrereporte').val();
      var insert = 0;

      if (reporte_id != ""){
        if (reportdes == ""){
          $.toast({
            text : "Debe Ingresar un Nombre al Reporte",
            showHideTransition : 'slide',
            bgColor : 'red',
            textColor : '#eee',
            allowToastClose : false,
            hideAfter : 5000,
            stack : 5,
            textAlign : 'left',
            position : 'top-right'
          });
          return;
        }
      }
      // if (reportdes == "" && reporte_id == "")
      //   var insert = 1; // Busca

      if (reportdes != "" && reporte_id == "")
        var insert = 2; //Inserta

      if (reportdes != "" && reporte_id != "")
        var insert = 1; //Actualiza y Busca

      var clienteidb = $('#clienteidb').val();
      var codigob = $('#codigob').val();
      var desdeb = $('#desdeb').val();
      var hastab = $('#hastab').val();
      var plantahastab = $('#plantahastab').val();
      var plantadesdeb = $('#plantadesdeb').val();
      var sinprocesob = $("#sinprocesob").is(':checked');
      var enplanificacionb = $("#enplanificacionb").is(':checked');
      var enproduccionb = $("#enproduccionb").is(':checked');
      var pendientesb = $("#pendientesb").is(':checked');
      var facturab = $("#facturab").is(':checked');
      var terminadab = $("#terminadab").is(':checked');
      var anuladab = $("#anuladab").is(':checked');
      var despachadab = $("#despachadab").is(':checked');
      var rechazadab = $("#rechazadab").is(':checked');
      var diametroextdesdeb = $('#diametroextdesdeb').val();
      var diametroexthastab = $('#diametroexthastab').val();
      var diametroextmaxhastab = $('#diametroextmaxhastab').val();
      var diametroextmaxdesdeb = $('#diametroextmaxdesdeb').val();
      var diametroextmindesdeb = $('#diametroextmindesdeb').val();
      var diametroextminhastab = $('#diametroextminhastab').val();
      var diametrointdesdeb = $('#diametrointdesdeb').val();
      var diametrointhastab = $('#diametrointhastab').val();
      var diametrointmaxhastab = $('#diametrointmaxhastab').val();
      var diametrointmaxdesdeb = $('#diametrointmaxdesdeb').val();
      var diametrointmindesdeb = $('#diametrointmindesdeb').val();
      var diametrointminhastab = $('#diametrointminhastab').val();
      var espesordesdeb = $('#espesordesdeb').val();
      var espesorhastab = $('#espesorhastab').val();
      var espesorminhastab = $('#espesorminhastab').val();
      var espesormindesdeb = $('#espesormindesdeb').val();
      var espesormaxhastab = $('#espesormaxhastab').val();
      var espesormaxdesdeb = $('#espesormaxdesdeb').val();
      var kiloshastab = $('#kiloshastab').val();
      var kilosdesdeb = $('#kilosdesdeb').val();
      var largominb = $('#largominb').val();
      var largomaxb = $('#largomaxb').val();
      var tipoaceroidb = $('#tipoaceroidb').val();
      var tipocosturaidb = $('#tipocosturaidb').val();
      var tratamientoidb = $('#tratamientoidb').val();
      var normaidb = $('#normaidb').val();
      var tipoordenidb = $('#tipoordenidb').val();
      var usoidb = $('#usoidb').val();
      var hornob = $("#hornob").is(':checked');
      var bateab = $("#bateab").is(':checked');
      var puntab = $("#puntab ").is(':checked');
      var trefilab = $("#trefilab").is(':checked');
      var corteb = $("#corteb").is(':checked');
      var currentb = $("#currentb").is(':checked');
      var pruebab = $("#pruebab").is(':checked');
      var inactivob = $("#inactivob").is(':checked');
      var activadob = $("#activadob").is(':checked');
      var enprocesob = $("#enprocesob").is(':checked');
      var finalizadob = $("#finalizadob").is(':checked');
      var autorizacionb = $("#autorizacionb").is(':checked');
      var durezamaxb = $('#durezamaxb').val();
      var durezaminb = $('#durezaminb').val();
      var rugosidadb = $('#rugosidadb').val();
      var flechab = $('#flechab').val();
      var cerfiticadoidb = $('#cerfiticadoidb').val();
      var aplastadob = $("#aplastadob").is(':checked');
      var nombrereporte = $('#nombrereporte').val();
      var pestanadob = $("#pestanadob").is(':checked');

      if (sinprocesob != true)
        sinprocesob = null;

      if (enplanificacionb != true)
        enplanificacionb = null;

      if (enproduccionb != true)
        enproduccionb = null;

      if (pendientesb != true)
         pendientesb = null;

      if (facturab != true)
        facturab = null;

      if (terminadab != true)
        terminadab = null;

      if (anuladab != true)
        anuladab = null;

      if (despachadab != true)
        despachadab = null;

      if (rechazadab != true)
        rechazadab = null;

      if (hornob != true)
        hornob = null;

      if (bateab != true)
        bateab = null;

      if (puntab != true)
        puntab = null;

      if (trefilab != true)
        trefilab = null;

      if (corteb != true)
        corteb = null;

      if (currentb != true)
        currentb = null;

      if (pruebab != true)
        pruebab = null;

      if (inactivob != true)
        inactivob = null;

      if (activadob != true)
        activadob = null;

      if (enprocesob != true)
        enprocesob = null;

      if (finalizadob != true)
        finalizadob = null;

      if (autorizacionb != true)
        autorizacionb = null;

      if (aplastadob != true)
        aplastadob = null;

      if (pestanadob != true)
        pestanadob = null;



      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({
        type: "post",
        url: "{{route('ejecutarreport')}}",
        data: {
          'insert': insert,
          'id': reporte_id,
          'produccion': 1,
          'clienteidb' : clienteidb,
          'codigob': codigob,
          'desdeb' : desdeb,
          'hastab' : hastab,
          'plantahastab' : plantahastab,
          'plantadesdeb' : plantadesdeb,
          'sinprocesob' : sinprocesob,
          'enplanificacionb' : enplanificacionb,
          'enproduccionb' : enproduccionb,
          'pendientesb' : pendientesb,
          'facturab' : facturab,
          'terminadab' : terminadab,
          'anuladab' : anuladab,
          'despachadab' : despachadab,
          'rechazadab' : rechazadab,
          'diametroextdesdeb' : diametroextdesdeb,
          'diametroexthastab' : diametroexthastab,
          'diametroextmaxhastab' : diametroextmaxhastab,
          'diametroextmaxdesdeb' : diametroextmaxdesdeb,
          'diametroextmindesdeb' : diametroextmindesdeb,
          'diametroextminhastab' : diametroextminhastab,
          'diametrointdesdeb' : diametrointdesdeb,
          'diametrointhastab' : diametrointhastab,
          'diametrointmaxhastab' : diametrointmaxhastab,
          'diametrointmaxdesdeb' : diametrointmaxdesdeb,
          'diametrointmindesdeb' : diametrointmindesdeb,
          'diametrointminhastab' : diametrointminhastab,
          'espesordesdeb' : espesordesdeb,
          'espesorhastab' : espesorhastab,
          'espesorminhastab' : espesorminhastab,
          'espesormindesdeb' : espesormindesdeb,
          'espesormaxhastab' : espesormaxhastab,
          'espesormaxdesdeb' : espesormaxdesdeb,
          'kiloshastab' : kiloshastab,
          'kilosdesdeb' : kilosdesdeb,
          'largominb' : largominb,
          'largomaxb' : largomaxb,
          'tipoaceroidb' : tipoaceroidb,
          'tipocosturaidb' : tipocosturaidb,
          'tratamientoidb' : tratamientoidb,
          'normaidb' : normaidb,
          'tipoordenidb' : tipoordenidb,
          'usoidb' : usoidb,
          'hornob' : hornob,
          'bateab' : bateab,
          'puntab' : puntab ,
          'trefilab' : trefilab,
          'corteb' : corteb,
          'currentb' : currentb,
          'pruebab' : pruebab,
          'inactivob' : inactivob,
          'activadob' : activadob,
          'enprocesob' : enprocesob,
          'finalizadob' : finalizadob,
          'autorizacionb' : autorizacionb,
          'durezamaxb' : durezamaxb,
          'durezaminb' : durezaminb,
          'rugosidadb' : rugosidadb,
          'flechab' : flechab,
          'cerfiticadoidb' : cerfiticadoidb,
          'aplastadob' : aplastadob,
          'nombrereporte' : nombrereporte,
          'pestanadob' : pestanadob
        },
        beforeSend: function() {
          $('#loader').show();
        },
        complete: function(){
          $('#loader').hide();
        },
        success: function(data){
          var resultado = data.resultado;
          var insert = data.insert;
          if (insert == 1){
            table.destroy();
            console.log("entro aqui");
            if (resultado == "false"){
              table = $("#datatable-buttonsreport").DataTable({
                "data": [],
                "columns": [
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""},
                  {"data": ""}
                ],
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
              $.toast({
                text : "Reporte No Encontrado",
                showHideTransition : 'slide',
                bgColor : 'red',
                textColor : '#eee',
                allowToastClose : false,
                hideAfter : 5000,
                stack : 5,
                textAlign : 'left',
                position : 'top-right'
              });
              return;

            }
            else{
              table = $("#datatable-buttonsreport").DataTable({
                "data": resultado,
                "columns": [
                  {"data": "Norden"},
                  {"data": "Cliente"},
                  {"data": "URG"},
                  {"data": "Sem"},
                  {"data": "Procesoactual"},
                  {"data": "Paseaplanta"},
                  {"data": "FechaPedido"},
                  {"data": "Ext"},
                  {"data": "Esp"},
                  {"data": "Pzas"},
                  {"data": "Mts"},
                  {"data": "Kgs"},
                  {"data": "Cost"}
                ],
                columnDefs : [
                  { targets : [5],
                    render : function (data, type, row) {
                      if (data){
                        var nuevafecha = data.split("-");
                        nuevafecha = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
                        return nuevafecha;
                      }
                      else
                        return "00/00/0000";
                    }
                  },
                  { targets : [6],
                    render : function (data, type, row) {
                      if (data){
                        var nuevafecha = data.split("-");
                        nuevafecha = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
                        return nuevafecha;
                      }
                      else
                        return "00/00/0000";
                    }
                  },
                ],
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

            }
          }
          else if (insert == 2){
            if (resultado == "true")
              location.reload();
            else {
              $.toast({
                text : "Error, Intente Nuevamente",
                showHideTransition : 'slide',
                bgColor : 'red',
                textColor : '#eee',
                allowToastClose : false,
                hideAfter : 5000,
                stack : 5,
                textAlign : 'left',
                position : 'top-right'
              });
              return;

            }

          }
          else if (insert == 3){
            if (resultado == "true"){
              $.toast({
                text : "Reporte Actualizado con Exito",
                showHideTransition : 'slide',
                bgColor : 'green',
                textColor : '#eee',
                allowToastClose : false,
                hideAfter : 5000,
                stack : 5,
                textAlign : 'left',
                position : 'top-right'
              });
              return;
            }
            else{
              $.toast({
                text : "Error al Actualizar",
                showHideTransition : 'slide',
                bgColor : 'red',
                textColor : '#eee',
                allowToastClose : false,
                hideAfter : 5000,
                stack : 5,
                textAlign : 'left',
                position : 'top-right'
              });
              return;
            }

          }
          else {
            $.toast({
              text : "Error Inesperado!",
              showHideTransition : 'slide',
              bgColor : 'red',
              textColor : '#eee',
              allowToastClose : false,
              hideAfter : 5000,
              stack : 5,
              textAlign : 'left',
              position : 'top-right'
            });
            return;

          }

        }
      });

    });
  });
</script>
@endsection
