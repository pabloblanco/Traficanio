@extends('layouts.app')

@section('content')

<!-- Inicio de las ventanas modales-->

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-productoadd">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Agregar Detalles Del Producto</h4>
          </div>
          <div class="modal-body cuerpo-modal">

            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
             <div class="row">
            
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Diámetro Exterior</label>
                <input type="text" id="diamex" class="form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tol + Diám. Exterior</label>
                <input type="text" id="tolmasdiamex" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tol - Diám. Exterior</label>
                <input type="text" id="tolmenosdiamex" class="form-control col-md-7 col-xs-12">
              </div>

            </div>

            <div  class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Espesor</label>
                <input type="text" id="espesor" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tol + Espesor</label>
                <input type="text" id="tolmasespesor" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tol - Espesor</label>
                <input type="text" id="tolmenosespesor" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>

            </div>

            <div  class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Diámetro Interior</label>
                <input type="text" id="diamein" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tol + Diám. Interior</label>
                <input type="text" id="tolmasdiamein" placeholder="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tol - Diám. Interior</label>
                <input type="text" id="tolmenosdiamein" placeholder="" class="form-control col-md-7 col-xs-3">
              </div>

            </div>

            <div  class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tipo Acero</label>
                <select id="sae" class="form-control">
                  <option></option>
                  
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tipo Costura</label>
                  <select id="tcost" class="form-control">
                    <option></option>
                    
                  </select>
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Estado Fabricación</label>
                  <select id="estfabricacion" class="form-control">
                      <option></option>
                      
                    </select>
              </div>

            </div>
            <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" >Norma</label>
              <select id="norma_id" class="form-control">
                <option></option>
                
              </select>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" >Forma</label>
              <select id="forma_id" class="form-control">
                <option></option>
               
              </select>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" >Rubros</label>
              <select id="rubro_id" class="form-control">
                <option></option>
                
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
              <label class="checkbox">Estado
                <input type="checkbox" id="estado">
                <span class="check"></span>
              </label>
            </div>
          </div><br>

        </form>
        <div class="modal-footer">

          <button type="button" id="asociar" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  modal Eliminar  -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">¿Está seguro que desea eliminar?</h4>
      </div>
      <div class="modal-body cuerpo-modal">
      </div>
      <div class="modal-footer">
        <button id="send" type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- /modals eliminar -->

<!--  modal Bucar Medida-->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-producto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Productos</h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-productoadd">Agregar Producto</button>
          </div>
        </div>
        <form autocomplete="off">
          <div class="form-group">
            <br>
            <div class="x_title">
              <h2>Buscar</h2>
              <div class="clearfix"></div>
            </div>
            <div class="row">
                  
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Diámetro Exterior</label>
                <input type="text" id="" class="form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tol + Diám. Exterior</label>
                <input type="text" id="b-tolmasdiamex" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tol - Diám. Exterior</label>
                <input type="text" id="b-tolmenosdiamex" class="form-control col-md-7 col-xs-12">
              </div>

            </div>
            <div  class="row">
               <div class="col-md-4 col-sm-4 col-xs-12">
                 <label class="control-label" >Espesor</label>
                 <input type="text" id="b-espesor" placeholder="" class="form-control col-md-7 col-xs-12">
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                 <label class="control-label" >Tol + Espesor</label>
                 <input type="text" id="b-tolmasespesor" placeholder="" class="form-control col-md-7 col-xs-12">
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                 <label class="control-label" >Tol - Espesor</label>
                 <input type="text" id="b-tolmenosespesor" placeholder="" class="form-control col-md-7 col-xs-3">
               </div>

            </div>

            <div  class="row">
               <div class="col-md-4 col-sm-4 col-xs-12">
                 <label class="control-label" >Diámetro Interior</label>
                 <input type="text" id="b-diamein" placeholder="" class="form-control col-md-7 col-xs-3">
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                 <label class="control-label" >Tol + Diám. Interior</label>
                 <input type="text" id="b-tolmasdiamein" placeholder="" class="form-control col-md-7 col-xs-12">
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                 <label class="control-label" >Tol - Diám. Interior</label>
                 <input type="text" id="b-tolmenosdiamein" placeholder="" class="form-control col-md-7 col-xs-3">
               </div>

            </div>

            <div  class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tipo Acero</label>
                <select id="e-sae" class="form-control">
                  <option></option>
                  
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Tipo Costura</label>
                  <select id="e-tcost" class="form-control">
                    <option></option>
                    
                  </select>
              </div>
             <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" >Estado Fabricación</label>
                <select id="e-estfabricacion" class="form-control">
                    <option></option>
                    
                  </select>
            </div>

            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Norma</label>
                <select id="e-norma_id" class="form-control">
                  <option></option>
                  
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Forma</label>
                <select id="e-rubro_id" class="form-control">
                  <option></option>
                  
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Rubros</label>
                <select id="e-rubro_id" class="form-control">
                  <option></option>
                  
                </select>
              </div>
            </div>

            <div class="x_content"><br><br>
              <table id="datatable-productos" class="table table-stripped table-bordered">
                <thead>
                  <tr>
                    <th>Diame. Ext. Nominal</th>
                    <th>Diame. Ext. Minimo</th>
                    <th>Diame. Ext. Maximo</th>
                    <th>Diame. Int. Nominal</th>
                    <th>Diame. Int. Minimo</th>
                    <th>Diame. Int. Maximo</th>
                    <th>Espesor Nominal</th>
                    <th>Espesor. Minimo</th>
                    <th>Espesor. Maximo</th>
                    <th>Tipo Acero</th>
                    <th>Tipo Costura</th>
                    <th>Norma</th>
                    <th>Forma</th>
                    <th>Est. Fabricacion</th>
                  </tr>
                </thead>
                <tbody>
                  

                </tbody>
              </table>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
        <a id="buscarmedida" class="btn btn-primary">Buscar</a>
      </div>
    </div>
  </div>
</div>
<!-- /cerrar modals Bucar Medida-->


<!-- MODAL QUE AGREGA COTIZACIONES -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-cotizar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        
      </div>
      <div class="modal-body cuerpo-modal">
        <div class="x_title">
          <h2>Información de la cotización</h2>
          <div class="clearfix"></div>
        </div>
        <form id="form1" action="{{route('addcotizacion')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Cliente</label>
              <select name="clienteidADD" id="clienteidADD" class="form-control" required>
                <option value="-1" selected="selected"></option>
                @foreach ($clientes as $cliente)
                  <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Fecha</label>
              <div class='input-group date' id='myDatepicker7'>
                <input name="fechaADD" id="fechaADD" type='text' class="form-control" />
                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </span>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Estado</label>
              <select name="" id="estadoidcotizacion" class="form-control" disabled="" required>
                @foreach ($estadocotizacions as $estado)
                  <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            
             <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Tipo de orden</label>
              <select id="tipoOrdenADD" name="tipoOrdenADD" class="form-control" required>
                <option value="" selected="selected"></option>
                @foreach($tiporden as $tpo)
                <option value="{{$tpo->id}}">{{$tpo->descripcion}}</option>
                @endforeach
              </select>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Urgente</label>
              <input type="checkbox" class="flat" name="urgenteADD" id="urgenteADD">
            </div>
          </div><br>
          <div class="x_title">
            <h2>Productos</h2>
            <div class="clearfix"></div>
          </div>
          <div  class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label class="control-label" for="documento">Producto</label>
              <input data-id="" id="producto_id" disabled="" type="text" id="documento" class="form-control col-md-7 col-xs-12">
              
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-12">
              <a id="productoadd" class="btn btn-primary btn-calidad btn-sm btn-margin"><i class="fa fa-search"></i></a>
            </div>
          </div>

        <br>
        <div class="x_title">
          <h2>Atributos</h2>
          <div class="clearfix"></div>
        </div>

        <div  class="row">
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Mínimo Entrega (mm)</label>
            <input type="text" id="largoMinEntregaADD" placeholder="" required="required" class="form-control col-md-7 col-xs-4">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Máximo Entrega (mm)</label>
            <input type="text" id="largoMaxEntregaADD" placeholder="" required="required" class="form-control col-md-7 col-xs-4">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Dureza Mín (HRB)</label>
            <input type="text" id="durezaminimaADD" name="durezaminimaADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Dureza Máx (HRB)</label>
            <input type="text" id="durezamaximaADD" name="durezamaximaADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Rugosidad</label>
            <input type="text" id="rugosidadADD" name="rugosidadADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
          </div>
           <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Ensayo de Expansión</label>
            <input type="text" id="ensayoexpADD" name="ensayoexpADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
          </div>          
        </div>
        <div  class="row">
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Uso</label>
            <select id="usoidADD" name="usoidADD" class="form-control" required>
              <option value="" selected="selected"></option>
              @foreach($usos as $uso)
              <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Embalaje</label>
            <select id="embalajeidADD" name="embalajeidADD" class="form-control" required>
              <option value="" selected="selected"></option>
              @foreach($embalajes as $emb)
              <option value="{{$emb->id}}">{{$emb->descripcion}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Códig del Material</label>
            <input type="text" id="codmaterialADD" name="codmaterialADD" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <label class="control-label" for="first-name">Certificado</label>
            <select id="certificadoADD" name="certificadoADD" class="form-control" required>
              <option value="" selected="selected"></option>
              @foreach($certificados as $certificado)
              <option value="{{$certificado->id}}">{{$certificado->descripcion}}</option>
              @endforeach
            </select>
          </div>          
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Multiplo Mín (mm)</label>
            <input type="text" id="multiplomin" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <label class="control-label" for="first-name">Multiplo Máx (mm)</label>
            <input type="text" id="multiplomax" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label class="control-label" for="first-name">Forma</label>
            <select id="formaADD" name="formaADD" class="form-control" required>
              <option value="" ></option>
              @foreach($formas as $frm)
                  <option value="{{$frm->id}}">{{$frm->descripcion}}</option>
              @endforeach
            </select>
          </div>
        </div>

         <br>
          <div class="x_title">
            <h2>Otros Datos</h2>
            <div class="clearfix"></div>
          </div>

          <div  class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label class="control-label" for="first-name">Fecha</label>
              <div class='input-group date' id='myDatepicker8'>
                <input type="text" id="fechaOtroADD" name="fechaOtroADD" class="form-control" />
                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </span>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
              <label class="control-label" for="first-name">Lugar de Entrega</label>
              <select id="lugarEntregaADD" name="lugarEntregaADD" class="form-control" required>
                <option value=""></option>
              </select>
            </div>
          </div>
          <div  class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label class="control-label" for="first-name">Kilos</label>
              <input type="text" id="kilosADD" name="kilosADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label class="control-label" for="first-name">Piezas</label>
              <input type="text" id="piezasADD" name="piezasADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label class="control-label" for="first-name">Metros</label>
              <input type="text" id="metrosADD" name="metrosADD" placeholder="" required="required" class="form-control col-md-7 col-xs-4">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label class="control-label" for="first-name">Kg/M</label>
              <input type="text" id="kilogramosmetrosADD" name="kilogramosmetrosADD" placeholder="" disabled="" class="form-control col-md-7 col-xs-4">
            </div>

          </div>

          <div  class="row">
            <div class="col-md-9 col-sm-9 col-xs-12 radio">
              <label>
                <input type="checkbox" class="flat" id="biseladoADD" name="biseladoADD" name="iCheck"> Biselado
              </label>
              <label>
                <input type="checkbox" class="flat" id="estenciladoADD" name="estenciladoADD" name="iCheck"> Estencilado
              </label>
            </div>
          <!--   <div class="col-md-4 col-sm-4 col-xs-4">
              <label class="control-label" for="first-name">Nro Colada</label>
              <input name="numerocoladaestenciladoADD" type="text" id="numerocoladaestenciladoADD" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <label class="control-label" for="first-name">Medida</label>
              <input name="medidaestenciladoADD" type="text" id="medidaestenciladoADD" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label class="control-label" for="first-name">Observaciones</label>
              <input type="text" id="observacionesestenciladoADD" name="observacionesestenciladoADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
            </div> -->

          </div><br>
          <div class="x_title">
            <h2>Historial De Medida</h2>
            <div class="clearfix"></div>
          </div>
          <div class="row">
            <div class="col-md-7 col-xs-12">
              <button type="button" class="btn btn-default btn-sm">Ver medida en biblioteca</button>
            </div>
          </div>

        <div class="x_title">
          <h2>Control de Calidad</h2>
          <div class="clearfix"></div>
        </div>
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          <!-- <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Tipo de acero</label>
              <select id="tipoaceroidADD" name="tipoaceroidADD" class="form-control" required>
                <option value="" selected="selected"></option>
                @foreach($tipoacero as $tipoacr)
                <option value="{{$tipoacr->id}}">{{$tipoacr->descripcion}}</option>
                @endforeach
              </select>
            </div>
           
            
          </div> -->
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Observaciones de Prod.</label>
              <input type="text" id="observacionesADD" name="observacionesADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <label class="control-label" for="first-name">Flecha (mm/mt)</label>
              <input type="text" id="flechaADD" name="flechaADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
              <label class="control-label" for="first-name">Pestañado</label>
              <input type="checkbox" id="pestanadoADD" name="pestanadoADD" class="flat" >
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
              <label class="control-label" for="first-name">Aplastado</label>
              <input type="checkbox" id="aplastadoADD" name="aplastadoADD" class="flat" >
            </div>
          </div><br>
          <div class="x_title">
            <h2>Datos De Venta</h2>
            <div class="clearfix"></div>
          </div>
          
          <div  class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
              <label class="control-label" for="first-name">Condición de venta</label>
              <select id="condicionventaADD" name="condicionventaADD" class="form-control" required>
                <option value="0">Seleccione...</option>
                @foreach($condiciones as $cond)
                <option value="{{$cond->id}}">{{$cond->descripcion}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <label class="control-label" for="first-name">Nº De Orden Compra</label>
              <input type="text" id="ordencompraADD" name="ordencompraADD" placeholder="" required="required" class="form-control col-md-7 col-xs-4">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <label class="control-label" for="first-name">Precio Kilo</label>
              <input type="text" id="preciokiloADD" name="preciokiloADD" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
            </div>
          </div>
          
          <div  class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label class="control-label" for="first-name">Precio Metro</label>
              <input type="text" id="precioMetroADD" name="precioMetroADD" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label class="control-label" for="first-name">Precio Pieza</label>
              <input type="text" id="precioPiezaADD" name="precioPiezaADD" placeholder="" required="required" class="form-control col-md-7 col-xs-4">
            </div>
            
          </div>
          <div  class="row">
            <div class="col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-12 col-xs-5 col-xs-offset-5">
              <label class="control-label" for="first-name"><strong>Precio Pasado al Cliente</strong></label>
            </div>
            
          </div>
          <div  class="row">
            <div class="col-md-9 col-sm-9 col-xs-12 radio">
                <label>
                  <input type="radio" class="flat" name="iCheck" id="porkiloADD" > Por kilo
                </label>
                <label>
                  <input type="radio" class="flat" name="iCheck" id="porMetroADD"> Por metro
                </label>
                <label>
                  <input type="radio" class="flat" name="iCheck" id="porPiezaADD"> Por pieza
                </label>
              </div>
          </div>
          <div  class="row">
            <div class="col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-12 col-xs-5 col-xs-offset-5">
              <label class="control-label" for="first-name"><strong>Debe de Cargar la Cotización del Día</strong></label>
            </div>
            
          </div>
          <div  class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label class="control-label" for="first-name">Tipo de Moneda</label>
              <select id="tipomonedaidADD" name="tipomonedaidADD" class="form-control" required>
                @foreach($monedas as $moneda)
                <option value="{{$moneda->id}}">{{$moneda->descripcion}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label class="control-label" for="first-name">Precio 45%</label>
              <input disabled="" type="text" id="precio45ADD" name="precio45ADD" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label class="control-label" for="first-name">Precio Contribución</label>
              <input disabled="" type="text" id="precioContribucionADD" name="precioContribucionADD" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label class="control-label" for="first-name">Precio Por Costos</label>
              <input disabled="" type="text" id="precioCostoADD" id="precioCostoADD" value="0,4" placeholder="" required="required" class="form-control col-md-7 col-xs-3">
            </div>
          </div>
          <div class="row resumencoti">
                      
          </div>
          <div  class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label class="control-label" for="first-name">Orbservaciones  Venta</label>
              <input  type="text" id="observacionesVentaADD" name="observacionesVentaADD"  placeholder="" required="required" class="form-control col-md-7 col-xs-3">
            </div>
          </div>
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-12">
              <label class="control-label" for="first-name">Crear Seguimiento</label>
              <input type="checkbox" class="flat" id="crearSeguimientoADD" name="crearSeguimientoADD" >
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label class="control-label" for="first-name">Usuario</label>
              <select id="usuarioidADD" name="usuarioidADD" class="form-control" disabled="" required>
                <option value="{{Auth::user()->id}}" selected="selected">{{Auth::user()->usuario}}</option>
              </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label class="control-label" for="first-name">Prioridad</label>
              <select id="prioridadidADD" name="prioridadidADD" class="form-control" required>
                <option value="" selected="selected"></option>
                @foreach($prioridades as $prio)
                <option value="{{$prio->id}}">{{$prio->descripcion}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label class="control-label" for="first-name">Fecha Prometida</label>
              <div class='input-group date' id='myDatepicker12'>
                <input type='text' id="fechaPrometidaADD" name="fechaPrometidaADD" class="form-control" />
                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label class="control-label" for="first-name">Título</label>
              <input type="text" id="tituloADD" name="tituloADD"  placeholder="" required="required" class="form-control col-md-7 col-xs-3">
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label class="control-label" for="first-name">Comentarios</label>
              <input  type="text" id="comentariosSeguimientoADD" name="comentariosSeguimientoADD"  placeholder="" required="required" class="form-control col-md-7 col-xs-3">
            </div>
          </div>

          </div><br>

        </form>
        <div class="modal-footer">      
          <button type="button" id="botonguardarCotizacion" class="btn btn-primary">Guardar</button>
          <button type="button" id="botonirProcesos" class="btn btn-primary">Guardar e ir a procesos</button>
          <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- FIN DE AGREGAR COTIZACION -->
<!-- ===================================== -->
<!-- Fin de las ventanas modales-->





















<!-- ================================= -->
<!--COMIENZO DE PARAMETROS DE BUSQUEDA-->
<!-- ================================= -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-2">
                <h2>Busqueda de Cotizaciones</h2>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2">
                <ul class="nav navbar-right panel_toolbox">
                  <li class="">
                    <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-cotizar" id="addcoti">Agregar Cotización</button>
                  </li>
                </ul>
              </div>
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
              
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Desde</label>
                    <div class='input-group date' id='DatepickerDesdeVentaBusqueda'>
                      <input type='text' class="form-control" id="DatepickerDesdeVentaInputBusqueda"/>
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Hasta</label>
                    <div class='input-group date' id='DatepickerHastaVenta'>
                      <input type='text' class="form-control" id="DatepickerHastaInputBusqueda" />
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">N° de Cotización</label>
                    <input type="text" id="nrocotizacionbusqueda"  class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Estado</label>
                    <select id="estadobusqueda" class="form-control">
                      <option value="" selected="selected"></option>
                      @foreach($estadocotizacions as $estad)
                      <option value="{{$estad->id}}">{{$estad->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Cliente</label>
                    <input type="text" id="clientebusqueda" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Códig. Del Cliente</label>
                    <input type="text" id="clientecodbusqueda" class="form-control col-md-7 col-xs-12">
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
                    <div class='input-group date' id='DatepickerFechaDesde'>
                      <input type='text' class="form-control" id="DatepickerFechaEntregaDesdeb" />
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Fecha - Hasta</label>
                    <div class='input-group date' id='DatepickerFechaHasta'>
                      <input type='text' class="form-control" id="DatepickerFechaEntregaHastab" />
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
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Ext. Min</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametroexteriordesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametroexteriorhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametroexteriormindesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametroexteriorminhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Ext. Máx</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
                    <label class="control-label" for="first-name">Largo</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametroexteriormaxdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametroexteriormaxhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Máximo</label>
                    <input type="text" id="largomaximobusqueda" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Mínimo</label>
                    <input type="text" id="largominimobusqueda" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
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
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de acero</label>
                    <select id="tipoacerobusqueda" class="form-control">
                      <option value="" selected="selected"></option>
                      @foreach($tipoacero as $acero)
                      <option value="{{$acero->id}}">{{$acero->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de costura</label>
                    <select id="tipocosturabusqueda" class="form-control">
                      <option value="" selected="selected"></option>
                      @foreach($tipocostura as $costu)
                      <option value="{{$costu->id}}">{{$costu->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Tratamiento Térmico</label>
                    <select id="tipotratamientotermicobusqueda" class="form-control">
                      <option value="" selected="selected"></option>
                      @foreach($tratamientos as $tra)
                      <option value="{{$tra->id}}">{{$tra->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de norma</label>
                    <select id="tiponormabusqueda" class="form-control">
                      <option value="" selected="selected"></option>
                      @foreach($normas as $norm)
                      <option value="{{$norm->id}}">{{$norm->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de orden</label>
                    <select id="tipordenbusqueda" class="form-control">
                      <option value="" selected="selected"></option>
                      @foreach($tiporden as $tipor)
                      <option value="{{$tipor->id}}">{{$tipor->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Uso</label>
                    <select id="tipousobusqueda" class="form-control">
                      <option value="" selected="selected"></option>
                      @foreach($usos as $use)
                      <option value="{{$use->id}}">{{$use->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Códig. Del Material</label>
                    <input type="text" id="codigomaterialbusqueda" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <label class="checkbox">Urgente
                      <input type="checkbox" id="urgentebusqueda"  style="margin-left: 10px;">
                      <span class="check"></span>
                    </label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Interior</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Int. Mín</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametrointeriordesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametrointeriorhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametrointeriormindesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametrointeriorminhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Int. Máx</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="diametrointeriormaxdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="diametrointeriormaxhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesordesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesorhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor Mínimo Exterior</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor Máximo Exterior</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesorminexteriordesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesorminexteriorhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" id="espesormaximoexteriordesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" id="espesormaximoexteriorhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 ">
                    <button type="button" id="busquedacotizacion" class="btn btn-primary  btn-sm">Buscar</button>
                    <button type="button" id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</button>
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
                  <table id="datatable-buttonscotiza" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Medida</th>
                        <th>Código Cliente</th>
                        <th>Fecha</th>
                        <th>N° Cotización</th>
                        <th>Estado</th>
                        <th>Uso</th>
                        <th>Tratamiento Térmico</th>
                        <th>MP/KG</th>
                        <th>Ext</th>
                        <th>Esp</th>
                        <th>Kg/m MP</th>
                        <th>Mts</th>
                        <th>Kilos</th>
                        <th>Precio Kg</th>
                        <th>Moneda</th>
                        <th>Pesos x 45</th>
                        <th>Peso Contrib.</th>
                        <th>Copiar</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Proceso</th>
                      </tr>
                    </thead>
                    <tbody id="table_result_cotizacion">

                      <!--<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>-->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
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


<input type="hidden" id="diametroExteriorNominalADD">
<input type="hidden" id="diametroExteriorMinimoADD">
<input type="hidden" id="diametroExteriorMaximoADD">
<input type="hidden" id="diametroInteriorNominalADD">
<input type="hidden" id="diametroInteriorMinimoADD">
<input type="hidden" id="diametroInteriorMaximoADD">
<input type="hidden" id="espesorNominalADD">
<input type="hidden" id="espesorMinimoADD">
<input type="hidden" id="espesorMaximoADD">
<input type="hidden" id="tiponormaestenciladoADD">
<input type="hidden" id="costuraidestanciladoADD"> 
<input type="hidden" id="tipoaceroidADD">
<input type="hidden" id="ntipoaceroidADD"> 
<input type="hidden" id="costuraidADD">
<input type="hidden" id="ncosturaidADD"> 
<input type="hidden" id="largoMinimoADD"> 
<input type="hidden" id="largoMaximoADD">  
<input type="hidden" id="normaidADD"> 
<input type="hidden" id="tratamientoidADD">
<input type="hidden" id="largominimoestenciladoADD"> 
<input type="hidden" id="largomaximoestenciladoADD">
<input type="hidden" id="observacionesestenciladoADD" value="">
<input type="hidden" id="precioMPADD" name="precioMPADD">
<input type="hidden" id="ttADD" name="ttADD">
<input type="hidden" id="costuADD" name="costuADD">
<input type="hidden" id="estenciladoidADD">

<!-- /page content -->

@endsection

@section('js_extra')

<script>
  $(function(){
   /* $('#buttonenviar').on('click', function(){
      $('#form1').submit();
    }); */ 

    /// CAMBIOS NUEVOS///
    var diamexn = 0;
    var diameinn = 0;
    var espesorn = 0;
    var accioncoti = "N";
    var idcopia = 0;
    var idSeleccionado = 0;
    var title = "";

    var date = new Date();

     $('body').on('click', 'table tr', function(){
      idSeleccionado = $(this).data('id');

      if($(this).hasClass('selected-table')){
        $(this).removeClass('selected-table');
      }else{
        $("tbody tr.selected-table").removeClass('selected-table');
        $(this).addClass('selected-table');
      }

    });

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [day, month, year].join('/');
    }

    var fechahoy = formatDate(date);
    $('#fechaADD').val(fechahoy); 
    $('#fechaOtroADD').val(fechahoy); 

    $('#productoadd').click(function(){
      modalcotip();
    });

    $('#modal-producto button.btn-delete').click(function(){
      //reabrircoti();
      setTimeout(modalcotizacioncargar, 500);
      limpiartablaproductos();

    });

    $('#modal-producto button.btn-sm').click(function(){
      abriraddproducto();
    });

    $('#modal-productoadd button.btn-delete').click(function(){
      cerraraddproducto();
      limpiartablaproductos();
    });


    function modalcotip(){
      //Cierra el de cotizacion y abre el de producto
      $('#modal-cotizar').modal('hide');
      $('#modal-producto').modal({show:true});
      asignaridproductos('sch');
      selectoresproductos('sch');
      changecampos('sch');
      setTimeout(cjeck, 500);
    }


    function reabrircoti(){
      $('#modal-cotizar').modal('show');
      setTimeout(cjeck, 500);      
    }

    function abriraddproducto(){
      asignaridproductos('add');
      selectoresproductos('add');
      changecampos('add');
      $('#modal-producto').modal('hide');
      setTimeout(cjeck, 500);

    }

    function cerraraddproducto(){
      asignaridproductos('sch');
      selectoresproductos('sch');
      $('#modal-productoadd').modal('hide');
      $('#modal-producto').modal('show');
      setTimeout(cjeck, 500);
    }

    function modalcotizacioncargar(){
      $('#modal-cotizar').modal('show');
    }

    function cjeck(){
      $('body').addClass("modal-open");

    }

    function iniciartablaproductos(){
      $("#datatable-productos").DataTable({
        "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
          },
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false,
      });

      return true;
    }
    iniciartablaproductos();

    function asignaridproductos(tipo){
      if (tipo == "sch")
        var modal = "modal-producto ";

      if (tipo == "add")
        var modal = "modal-productoadd ";

      var inputs = $('#'+modal+'div.cuerpo-modal form input');
      var selects = $('#'+modal+'div.cuerpo-modal form select');
      var number = 12;

      inputs.each(function(index, ele) {
        $(this).attr('id', 'tc-'+index+'-'+tipo);
      });

      selects.each(function(index, ele) {
        $(this).attr('id', 'tc-'+number+'-'+tipo);        
        number++;      
      });
    }

    function selectoresproductos(tipo){
      $('#tc-12-'+tipo+' option').remove();
      $('#tc-13-'+tipo+' option').remove();
      $('#tc-14-'+tipo+' option').remove();      
      $('#tc-15-'+tipo+' option').remove();
      $('#tc-16-'+tipo+' option').remove();
      $('#tc-17-'+tipo+' option').remove();

      var tpacero = $('#tc-12-'+tipo);
      var tpcostura = $('#tc-13-'+tipo);
      var estfabricacion = $('#tc-14-'+tipo);      
      var norma = $('#tc-15-'+tipo);
      var forma = $('#tc-16-'+tipo);
      var rubro = $('#tc-17-'+tipo);

      $.ajax({  
        type: "get",
        url: "{{route('productos.index')}}",
        data: {
          'modal' : 1,
          
        },
        success: function(data){
          var aceros = data.resultados.ta;
          var costuras = data.resultados.tc;
          var est = data.resultados.est;
          var normas = data.resultados.normas;
          var formas = data.resultados.formas;
          var rubros = data.resultados.rb;

          tpacero.append("<option></option>");
          tpcostura.append("<option></option>");
          estfabricacion.append("<option></option>");     
          norma.append("<option></option>");
          forma.append("<option></option>");
          rubro.append("<option></option>");

          for (var e = 0; e < aceros.length; e++) {
            var registro = aceros[e];
            var id = registro.id;
            var des = registro.descripcion;
            var opt = `
                <option value="${id}">${des}</option>
                `;
            tpacero.append(opt);
          }

          for (var e = 0; e < costuras.length; e++) {
            var registro = costuras[e];
            var id = registro.id;
            var des = registro.descripcion;
            var opt = `
                <option value="${id}">${des}</option>
                `;
            tpcostura.append(opt);
          }

          for (var e = 0; e < est.length; e++) {
            var registro = est[e];
            var id = registro.id;
            var des = registro.descripcion;
            var opt = `
                <option value="${id}">${des}</option>
                `;
            estfabricacion.append(opt);
          }

          for (var e = 0; e < normas.length; e++) {
            var registro = normas[e];
            var id = registro.id;
            var des = registro.descripcion;
            var opt = `
                <option value="${id}">${des}</option>
                `;
            norma.append(opt);
          }

          for (var e = 0; e < formas.length; e++) {
            var registro = formas[e];
            var id = registro.id;
            var des = registro.descripcion;
            var opt = `
                <option value="${id}">${des}</option>
                `;
            forma.append(opt);
          }

          for (var e = 0; e < rubros.length; e++) {
            var registro = rubros[e];
            var id = registro.id;
            var des = registro.descripcion;
            var opt = `
                <option value="${id}">${des}</option>
                `;
            rubro.append(opt);
          }
          
        }
      });

    }

    //.....Buscar Prodcutos.....//

    function changecampos(tipo){
      $('#tc-3-'+tipo).on('change', function(){//espesor
        var pas = 1;
        if ($('#tc-6-'+tipo).val()!=="")
          pas = 3;

        calcular_campos(tipo, pas);
      });

      $('#tc-6-'+tipo).on('change', function(){//diametro int
        calcular_campos(tipo);
      });

       $('#tc-0-'+tipo).on('change', function(){//diametro ext
        calcular_campos(tipo, 2);
      });    
    }

    $('#buscarmedida').click(function(){
      var obj = formproducto('sch', 0);
      $.ajax({  
        type: "GET",
        url: "{{route('buscarproducto')}}",
        data: obj,
        beforeSend: function() {
          $('#loader').show();
        },
        success: function(data){
          var arrayReturn = data;

          if (data !== "false"){
            $("#datatable-productos").DataTable().destroy();
            $("#datatable-productos").DataTable({
              "data": arrayReturn,
              "columns": [
                {"data": "diametroExterior"},
                {"data": "tolmenosdiamex"},
                {"data": "tolmasdiamex"},
                {"data": "diamein"},
                {"data": "tolmenosdiamein"},
                {"data": "tolmasdiamein"},
                {"data": "espesorNominal"},
                {"data": "tolmenosespesor"},
                {"data": "tolmasespesor"},
                {"data": "sae"},
                {"data": "tcost"},
                {"data": "normades"},
                {"data": "formades"},
                {"data": "tt"},
              ],
              "paging":   true,
              "ordering": false,
              "info":     false,
              "searching": true,

              "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
                      $(nRow).attr('id', arrayid['id']);
                      $(nRow).attr('data-de', arrayid['diametroExterior']);
                      $(nRow).attr('data-demin', arrayid['tolmenosdiamex']);
                      $(nRow).attr('data-demax', arrayid['tolmasdiamex']);
                      $(nRow).attr('data-di', arrayid['diamein']);
                      $(nRow).attr('data-dimin', arrayid['tolmasdiamein']);
                      $(nRow).attr('data-dimax', arrayid['tolmenosdiamein']);
                      $(nRow).attr('data-en', arrayid['espesorNominal']);
                      $(nRow).attr('data-enmax', arrayid['tolmasespesor']);
                      $(nRow).attr('data-enmin', arrayid['tolmenosespesor']);
                      $(nRow).attr('data-costu', arrayid['tipoCostura']);
                      $(nRow).attr('data-norma', arrayid['normaid']);
                      $(nRow).attr('data-acero', arrayid['tipoAceroSAE']);
                      $(nRow).attr('data-nacero', arrayid['sae']);
                      $(nRow).attr('data-ncostu', arrayid['tcost']);
                      $(nRow).attr('data-tt', arrayid['tratamientoTermico']);  
                      $(nRow).attr('data-forma', arrayid['forma_id']);
              },

              "initComplete": function(settings, json) {
                  //alert("completado");
                  //$("#loadingSpinner").hide();
                  //$('#loadingSpinner').hide();
                  //or $('#loadingSpinner').empty();
              },

            });  
            seleccionarmedida();             
          }
          else{
            limpiartablaproductos();
          }

        }
      });
    });

    function limpiartablaproductos(){
      $("#datatable-productos").DataTable().clear().draw();
    }

    function calcular_campos(tipo, pasador){

      var valesp = $('#tc-3-'+tipo).val();
      var valdiame = $('#tc-0-'+tipo).val();
      var valdiamein = $('#tc-6-'+tipo).val();

      var esp = $('#tc-3-'+tipo); 
      var de = $('#tc-0-'+tipo);        
      var di = $('#tc-6-'+tipo); 

      if (pasador == 1){ ///cambie espesor
        di.val("");
      }
      else if (pasador == 2){///cambie el diametro exterior
        di.val("");
      }
      else if(pasador==3){
        
      }
      else{ /// cambie el diametro interior
        de.val("");
      }

      if ((di.val().length != 0 && di.val() != 0) && (de.val().length != 0 && de.val() != 0)){
        var den = (parseFloat(valdiame) - parseFloat(valdiamein)) / 2;
        var r = parseFloat(esp).toFixed(2);
        esp.val(r);
        return;
      } //si tiene espesor y diametro exterior calcula diametro interior
      else if ((esp.val().length != 0 && esp.val() != 0) && (de.val().length != 0 && de.val() != 0)){
        var den = parseFloat(valdiame) - ( 2 * parseFloat(valesp));
        var r = parseFloat(den).toFixed(2);
        di.val(r);
        return;
      } // si tiene espesor y diametro interor calcula diametro exterior
      else if ((esp.val().length != 0 && esp.val() != 0) && (di.val().length != 0 && di.val() != 0)){
        var den = parseFloat(valdiamein) + (2* parseFloat(valesp));
        var r = parseFloat(den).toFixed(2);
        de.val(r);
        return;
      }
      return;
    }

    function formproducto(tipo, val){

      var data = {
        'modal' : 1,
        'data': val,
        'nombre' : null,
        'diamex' : $('#tc-0-'+tipo).val(),
        'tolmasdiamex' : $('#tc-1-'+tipo).val(),
        'tolmenosdiamex' : $('#tc-2-'+tipo).val(),
        'espesor' : $('#tc-3-'+tipo).val(),
        'tolmasespesor' : $('#tc-4-'+tipo).val(),
        'tolmenosespesor' : $('#tc-5-'+tipo).val(),
        'diamein' : $('#tc-6-'+tipo).val(),
        'tolmasdiamein' : $('#tc-7-'+tipo).val(),
        'tolmenosdiamein' : $('#tc-8-'+tipo).val(),
        'sae' : $('#tc-12-'+tipo).val(),
        'tcost' : $('#tc-13-'+tipo).val(),
        'estfabricacion' : $('#tc-14-'+tipo).val(),
        'normaid' : $('#tc-15-'+tipo).val(),
        'formaid' : $('#tc-16-'+tipo).val(),
        'rubroid' : $('#tc-17-'+tipo).val()
      }

      return data;
    }

    function seleccionarmedida(){
      $('#modal-producto table tr td').on('click', function(){
        var de = $(this).parent('tr').data('de');
        var di = $(this).parent('tr').data('di');
        var en = $(this).parent('tr').data('en');
        var dexmin = $(this).parent('tr').data('demin');
        var dexmax = $(this).parent('tr').data('demax');
        var dimin = $(this).parent('tr').data('dimin');
        var dimax = $(this).parent('tr').data('dimax');
        var enmin = $(this).parent('tr').data('enmin');
        var enmax = $(this).parent('tr').data('enmax');
        var costu = $(this).parent('tr').data('costu');
        var norma = $(this).parent('tr').data('norma');
        console.log(norma);
        var acero = $(this).parent('tr').data('acero');
        var nacero = $(this).parent('tr').data('nacero');
        var ncostu = $(this).parent('tr').data('ncostu');
        var tt = $(this).parent('tr').data('tt');
        var formaid = $(this).parent('tr').data('forma');

        $('#diametroExteriorNominalADD').val(de);
        $('#diametroExteriorMinimoADD').val(dexmin);
        $('#diametroExteriorMaximoADD').val(dexmax);

        $('#diametroInteriorNominalADD').val(di);
        $('#diametroInteriorMinimoADD').val(dimin);
        $('#diametroInteriorMaximoADD').val(dimax);

        $('#espesorNominalADD').val(en);
        $('#espesorMinimoADD').val(enmin);
        $('#espesorMaximoADD').val(enmax);

        $('#tiponormaestenciladoADD').val(norma);
        $('#costuraidestanciladoADD').val(costu);
        $('#costuraidADD').val(costu);
        $('#ncosturaidADD').val(ncostu);        
        $('#tipoaceroidADD').val(acero);
        $('#ntipoaceroidADD').val(nacero); 
        $('#normaidADD').val(norma);
        $('#tratamientoidADD').val(tt);
        $('#formaADD').val(formaid);

        if (accioncoti=="M" || accioncoti=="C"){
          getProcesos();        
        }

        if (de == undefined)
          de = "0.00";

        if (di == undefined)
          di = "0.00";

        if (en == undefined)
          en = "0.00";

        calculoKgm(de, en);

        var text = 'Diametro Ext:'+parseFloat(de).toFixed(2)+', Diametro Int:'+parseFloat(di).toFixed(2)+', Espesor:'+parseFloat(en).toFixed(2);
        var idmedida = $(this).parent('tr').attr('id');
        asociar(text, idmedida, null);
        limpiartablaproductos();
      });
    }

    function asociar(texto, id, data){
      console.log(data);
      var lmax = $('#largomaximoestenciladoADD').val();
      var lmin = $('#largominimoestenciladoADD').val();

      if (data !== null){
        $('#diametroExteriorNominalADD').val(data.diametroExterior);
        $('#diametroExteriorMinimoADD').val(data.tolmenosdiamex);
        $('#diametroExteriorMaximoADD').val(data.tolmasdiamex);

        $('#diametroInteriorNominalADD').val(data.diamein);
        $('#diametroInteriorMinimoADD').val(data.tolmenosdiamein);
        $('#diametroInteriorMaximoADD').val(data.tolmasdiamein);

        $('#espesorNominalADD').val(data.espesorNominal);
        $('#espesorMinimoADD').val(data.tolmenosespesor);
        $('#espesorMaximoADD').val(data.tolmasespesor);

        $('#tiponormaestenciladoADD').val(data.normaid);
        $('#costuraidestanciladoADD').val(data.tipoCostura);

        $('#costuraidADD').val(data.tipoCostura);        
        $('#tipoaceroidADD').val(data.tipoAceroSAE); 
        $('#normaidADD').val(data.normaid);
        $('#tratamientoidADD').val(data.tratamientoTermico); 
        $('#ncosturaidADD').val(""); 
        $('#formaADD').val(data.forma_id);

        $('#modal-producto').modal('hide');
        $('#modal-cotizar').modal('show');        
      }

      $('#producto_id').val(texto);
      console.log(id);
      $('#producto_id').data('id_producto', id);

      $('#modal-producto').modal('hide');
      setTimeout(modalcotizacioncargar, 500);

      var cliente = $('#clienteidADD').val() !== "-1";
      if (cliente == true){
        if (accioncoti=="N"){
          cargaratributos($('#clienteidADD').val(), id);
        }
      }
    }
    //.....End Buscar Prodcutos.....//

    //.....Crear Prodcutos.....//
    $('#guardarp').on('click', function(){
      var obj = formproducto('add', 0);
      peticionpostaddproducto(obj)
    });

    $('#asociar').on('click', function(){
      var obj = formproducto('add', 1);
      peticionpostaddproducto(obj)
    });

    function peticionpostaddproducto(campos){
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('productos.store')}}",
        data: campos,
        success: function(data){
          if (data.resultado){ 
            asociar(data.text, data.resultado.id, data.resultado);
            calculoKgm(data.resultado.diametroExterior, data.resultado.espesorNominal);
            if (accioncoti !== "N")
              cargarResumen();
            $('#modal-productoadd').modal('hide');
            $('#modal-cotizar').modal('show');
            setTimeout(cjeck, 500);
          }
          else if (data == "true"){
            $.toast({ 
              text : "Se ha guardado con exito.", 
              showHideTransition : 'slide',  
              bgColor : 'green',              
              textColor : '#eee',            
              allowToastClose : false,     
              hideAfter : 5000,              
              stack : 5,                    
              textAlign : 'left',            
              position : 'top-right'       
            });

            $('#modal-productoadd').modal('hide');
            $('#modal-producto').modal('show');
            setTimeout(cjeck, 500);
          }
          else{
            //no se guardo
          }

        }
      });

    }

    //.....End Crear Prodcutos.....//

    function calculoKgm(de, esp){
      console.log(de, esp)
      $('#kilogramosmetrosADD').val("");

      var op = (parseFloat(de) - parseFloat(esp)) * esp * 0.0246;
      console.log('op',op)
      $('#kilogramosmetrosADD').val(op.toFixed(3));
      
      return true;
    }

    function cargaratributos(id, idp){
        var pe = `/public/atributo/${id}/${idp}`;      
      $.ajax({  
        type: "get",
        url: pe,
        success: function(data){
          if (data !== "false"){
            $('#largomaximoestenciladoADD').val(data.largomaxentrega);    
            $('#largominimoestenciladoADD').val(data.largominentrega);    
            $('#durezaminimaADD').val(data.durezamin);    
            $('#durezamaximaADD').val(data.durezamax);          
            $('#rugosidadADD').val(data.rugosidad);  
            $('#ensayoexpADD').val(data.ensayoexp);  
            $('#usoidADD').val(data.usoid);   
            $('#embalajeidADD').val(data.embalajeid);    
            $('#codmaterialADD').val(data.codigocliente);   
            $('#certificadoADD').val(data.certificadoid); 
            $('#multiplomin').val(data.multiplomin);   
            $('#multiplomax').val(data.multiplomax);    
            $('#largoMinEntregaADD').val(data.largominentrega);   
            $('#largoMaxEntregaADD').val(data.largomaxentrega); 
            $('#largoMaximoADD').val(data.largomax);
            $('#largoMinimoADD').val(data.largomin);    
          }
          else{
            $('#largomaximoestenciladoADD').val("");    
            $('#largominimoestenciladoADD').val("");    
            $('#durezaminimaADD').val("");    
            $('#durezamaximaADD').val("");          
            $('#rugosidadADD').val("");  
            $('#ensayoexpADD').val("");  
            $('#usoidADD').val("");   
            $('#embalajeidADD').val("");    
            $('#codmaterialADD').val("");   
            $('#certificadoADD').val("");
            $('#multiplomin').val("");   
            $('#multiplomax').val("");    
            $('#largoMinEntregaADD').val("");   
            $('#largoMaxEntregaADD').val("");
            $('#largoMaximoADD').val("");
            $('#largoMinimoADD').val("");      
          }


        }
      });
    }

    function calcularcantidades(tipo){
      console.log(tipo);
      var kgm = $('#kilogramosmetrosADD').val();

      if (tipo == 1){//kilos

        //Metros = Kgs / kg/mts 
        var k = $('#kilosADD').val();
        var op = parseFloat(k)/parseFloat(kgm);
        $('#metrosADD').val(op.toFixed(2));
        
      }
      else if (tipo ==2){//metros
        //Kilos= Metro x kg/mts
        var m = $('#metrosADD').val();
        var op = parseFloat(m)*parseFloat(kgm);
        $('#kilosADD').val(op.toFixed(2));

      }else{ //piezas
        var largmin = parseFloat($('#largoMinEntregaADD').val()).toFixed(3); 
        var largmax = parseFloat($('#largoMaxEntregaADD').val()).toFixed(3);
        var pr = (Number(largmin) + Number(largmax))/2;
        var promedio = pr/1000;
        
        var piezas = $('#piezasADD').val();
        console.log(parseFloat(kgm));
           
        var opm = parseFloat(piezas)*promedio;
        var opk = parseFloat(piezas)*parseFloat(kgm)*promedio;
        var m = $('#metrosADD').val(opm.toFixed(2))
        var k = $('#kilosADD').val(opk.toFixed(2));

      }

    }

    $('#kilosADD').on('change', function(){
      $('#piezasADD').val("");
      $('#metrosADD').val("");
      calcularcantidades(1);
    });

    $('#metrosADD').on('change', function(){
      $('#piezasADD').val("");
      $('#kilosADD').val("");
      calcularcantidades(2);
    });

    $('#piezasADD').on('change', function(){
      $('#kilosADD').val("");
      $('#metrosADD').val("");
      calcularcantidades(3);
    });

    function calcularprecio(tipo){
      var kgm = parseFloat($('#kilogramosmetrosADD').val());
      var largmin = parseFloat($('#largoMinEntregaADD').val()).toFixed(3); 
      var largmax = parseFloat($('#largoMaxEntregaADD').val()).toFixed(3);
      var pr = (Number(largmin) + Number(largmax))/2;
      var promedio = pr/1000;
      var prkilo = parseFloat($('#preciokiloADD').val()).toFixed(2);
      var prmetros= parseFloat($('#precioMetroADD').val()).toFixed(2);
      var prpieza= parseFloat($('#precioPiezaADD').val()).toFixed(2);

      if (tipo == 1){ //calcula precio en kilos
        var op = prkilo * kgm;
        var op2 = prkilo*kgm*promedio;
        $('#precioMetroADD').val(op.toFixed(2));
        $('#precioPiezaADD').val(op2.toFixed(2));
      }
      else if (tipo == 2){// calcula precio en metros
        var op = prmetros/kgm;
        var op2 = prmetros*promedio;
        $('#preciokiloADD').val(op.toFixed(2));
        $('#precioPiezaADD').val(op2.toFixed(2));
      }
      else if (tipo == 3){// calcula precio en metros
        var op = prpieza/promedio/kgm;
        var op2 = prpieza/promedio;
        $('#preciokiloADD').val(op.toFixed(2));
        $('#precioMetroADD').val(op2.toFixed(2));
      }

    }

    $('#preciokiloADD').on('change', function(){
      $('#precioMetroADD').val("");
      $('#precioPiezaADD').val("");
      calcularprecio(1);
    });

    $('#precioMetroADD').on('change', function(){
      $('#preciokiloADD').val("");
      $('#precioPiezaADD').val("");
      calcularprecio(2);
    });

    $('#precioPiezaADD').on('change', function(){
      $('#preciokiloADD').val("");
      $('#precioMetroADD').val("");
      calcularprecio(3);
    });

    $('#clienteidADD').on('change', function(){
      var id_producto = $("#producto_id").data('id_producto');
      if (id_producto){
        cargaratributos($(this).val(), id_producto);
      }
      direccionesclientes($('#clienteidADD').val(), null);
    });


    function direccionesclientes(id, defa){
      $.ajax({  
        type: "get",
        url: "{{route('buscar_direcciones')}}",
        data: {
          'id': id
        },
        success: function(data){
          if (data !== "false"){
            $('#lugarEntregaADD option').remove();
            $('#lugarEntregaADD').append('<option></option>');
            for (var e = 0; e < data.length; e++) {
              var registro = data[e];
              var id = registro.id;
              var des = registro.direccion;
              var opt = `
                  <option value="${id}">${des}</option>
                  `;
              $('#lugarEntregaADD').append(opt);
            }
            if (defa !== null && defa !== ""){
              $('#lugarEntregaADD').val(defa);
            }
          }

        }
      });
    }

    $('#addcoti').on('click', function(){
      if (accioncoti == "M")
        accioncoti = "N";

      title = "Agregar Cotización";

      $('#modal-cotizar div.modal-header h4').remove();
      $('#modal-cotizar div.modal-header').append(`<h4 class="modal-title" id="myModalLabel2">${title}</h4>`);

      modalcotizacion(accioncoti);
    });

    let UsuarioSelectedVal = $('#usuarioidADD option:selected').val()
    let UsuarioSelectedText = $('#usuarioidADD option:selected').text()
    

    function modalcotizacion(type){
      var inputs = $('#modal-cotizar input');
      var selects = $('#modal-cotizar select');

      inputs.each(function(index, ele) {
        if ($(this).attr('type')=="checkbox"){
          $(this).prop('checked', false);
        }
        else{
          $(this).val("");         
        }
      });

      selects.each(function(index, ele) {
        if ($(this).attr('id') !== "usuarioidADD")
          $(this).val("");
      });  

      $('#modal-cotizar div.resumencoti div').remove();

      $('#diametroExteriorNominalADD').val("");
      $('#diametroExteriorMinimoADD').val("");
      $('#diametroExteriorMaximoADD').val("");

      $('#diametroInteriorNominalADD').val("");
      $('#diametroInteriorMinimoADD').val("");
      $('#diametroInteriorMaximoADD').val("");

      $('#espesorNominalADD').val("");
      $('#espesorMinimoADD').val("");
      $('#espesorMaximoADD').val("");

      $('#tiponormaestenciladoADD').val("");
      $('#costuraidestanciladoADD').val("");

      $('#costuraidADD').val("");        
      $('#tipoaceroidADD').val(""); 
      $('#normaidADD').val("");
      $('#tratamientoidADD').val(""); 
      $('#ncosturaidADD').val(""); 
      $('#normaidADD').val("");
      $('#precioMPADD').val("");
      $('#ttADD').val("");
      $('#costuADD').val("");
      $('#estenciladoidADD').val("");


      $('#usuarioidADD').empty()
      $('#usuarioidADD').append(`<option value="${UsuarioSelectedVal}">${UsuarioSelectedText}</option>`)

        $('#fechaPrometidaADD').removeAttr('disabled');
        $('#tituloADD').attr('disabled')
        $('#comentariosSeguimientoADD').removeAttr('disabled')
        $('#prioridadidADD').removeAttr('disabled');

      if (type == "N"){
        $('#fechaADD').val(fechahoy); 
        $('#fechaOtroADD').val(fechahoy);
        $('#fechaPrometidaADD').val(fechahoy);
        $('#formaADD').val(1);
        $('#condicionventaADD').val(0);
        $('#tipomonedaidADD').val(1);
        $('#estadoidcotizacion').val(-1);
      }
      else{
        getcotizacion();
      }

    }

    /// MODIFICAR COTIZACION ///
    $(document).on('click', "table tr a[class='edit_coti']", function(){
      accioncoti = "M";
      title = "Modificar Cotización";

      $('#modal-cotizar div.modal-header h4').remove();
      $('#modal-cotizar div.modal-header').append(`<h4 class="modal-title" id="myModalLabel2">${title}</h4>`);

      modalcotizacion(accioncoti);
    });

    $(document).on('click', "table tr a[class='copy_coti']", function(){
      accioncoti = "C";
      idcopia =  $(this).parents('tr').data('id');
      title = "Copiar Cotización";

      $('#modal-cotizar div.modal-header h4').remove();
      $('#modal-cotizar div.modal-header').append(`<h4 class="modal-title" id="myModalLabel2">${title}</h4>`);

      modalcotizacion(accioncoti);
    });


    function getcotizacion(){
      $.ajax({  
        type: "get",
        url: "{{route('editcotizacion')}}",
        data: {
          'id': idSeleccionado
        },
        success: function(data){
          console.log(data)
          cargardatacotizacion(data);
        }
      });
    }

    function fechaformato(fecha_recibida)
    {
      var nuevafecha = fecha_recibida.split("-");
      nuevafecha  = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
      return nuevafecha;
    }

    

    function cargardatacotizacion(result){
      if (result.fecha){
        var fechadd = fechaformato(result.fecha);
        $('#estadoidcotizacion').val(result.estadoid);
      }
      else{
        var fechadd = fechaformato(result.fechaPedido);
        $('#estadoidcotizacion').val(1);
      }

      $('#clienteidADD').val(result.clienteid);
      $('#fechaADD').val(fechadd);
      $('#formaADD').val(result.formaid);
      $('#tipoOrdenADD').val(result.tipoReventa);
      if (result.urgente>0)
        $('#urgenteADD').prop('checked', true);

      $('#producto_id').data('id_producto', result.producto_id);
      var text = 'Diametro Ext:'+result.diametroExteriorNominal+', Diametro Int:'+result.diametroInteriorNominal+', Espesor:'+result.espesorNominal;

      $('#producto_id').val(text);

      $('#diametroExteriorNominalADD').val(result.diametroExteriorNominal);
      $('#diametroExteriorMinimoADD').val(result.diametroExteriorMinimo);
      $('#diametroExteriorMaximoADD').val(result.diametroExteriorMaximo);

      $('#diametroInteriorNominalADD').val(result.diametroInteriorNominal);
      $('#diametroInteriorMinimoADD').val(result.diametroInteriorMinimo);
      $('#diametroInteriorMaximoADD').val(result.diametroInteriorMaximo);

      $('#espesorNominalADD').val(result.espesorNominal);
      $('#espesorMinimoADD').val(result.espesorMinimo);
      $('#espesorMaximoADD').val(result.espesorMaximo);

      $('#tiponormaestenciladoADD').val(result.tiponormaest);
      $('#costuraidestanciladoADD').val(result.tipocosturaest);

      $('#costuraidADD').val(result.costuraid);        
      $('#tipoaceroidADD').val(result.tipoAcero); 
      $('#normaidADD').val(result.normaid);
      $('#tratamientoidADD').val(result.tratamientoTermico); 
      $('#ncosturaidADD').val(result.costu); 
      //$('#normaidADD').val("");
      $('#largoMinEntregaADD').val(result.largoMinEntrega);
      $('#largoMaxEntregaADD').val(result.largoMaxEntrega);
      $('#durezaminimaADD').val(result.durezaMinima);
      $('#durezamaximaADD').val(result.durezaMaxima);
      $('#rugosidadADD').val(result.rugosidad);
      $('#ensayoexpADD').val(result.ensayoExpansion);
      $('#usoidADD').val(result.uso);
      $('#estenciladoidADD').val(result.estenciladoid);

      $('#embalajeidADD').val(result.tipoEmbalaje);
      $('#codmaterialADD').val(result.codigoPieza);
      $('#certificadoADD').val(result.certificadoid);
      $('#multiplomin').val("");
      $('#multiplomax').val("");
      $('#largominimoestencilado').val(result.largoMinEntrega);
      $('#largomaximoestencilado').val(result.largoMaxEntrega);

      if (result.fechaEntrega){
        var fechaotro = fechaformato(result.fechaEntrega);
        $('#fechaOtroADD').val(fechaotro);
      }
      //$('#lugarEntregaADD').val(result.lugarEntrega);
      direccionesclientes(result.clienteid, result.lugarEntrega);
      $('#kilosADD').val(result.kilos);

      $('#piezasADD').val(result.piezas);
      $('#metrosADD').val(result.metros);
      $('#kilogramosmetrosADD').val(result.kilogrametro);
      $('#biseladoADD').val(result.kilos);
      $('#estenciladoADD').val(result.kilos);

      if (result.biselado>0)
        $('#biseladoADD').prop('checked', true);

      // if (result.pestaniado>0)
      //   $('#estenciladoADD').prop('checked', true);

      $('#observacionesADD').val(result.observacionProduccion);
      $('#flechaADD').val(result.flecha);
 
      $('#condicionventaADD').val(result.condicionVenta);
      $('#ordencompraADD').val(result.ordenCompra);
      $('#preciokiloADD').val(result.precioKilo);
      $('#precioMetroADD').val(result.precioMetro);
      $('#precioPiezaADD').val(result.precioPieza);

      if (result.aplastado>0)
        $('#aplastadoADD').prop('checked', true);

      if (result.pestaniado>0)
        $('#pestanadoADD').prop('checked', true);

      if (result.precioPasado == "m"){
        $('#porMetroADD').prop('checked', true);
      }
      else if(result.precioPasado == "k"){
        $('#porkiloADD').prop('checked', true);
      }
      else{
        $('#porPiezaADD').prop('checked', true);
      }

      $('#tipomonedaidADD').val(result.tipoMoneda);
      $('#precio45ADD').val(result.pesosx45);
      $('#precioContribucionADD').val(result.precioxContribucion);
      $('#precioCostoADD').val(result.precioxCostos);
      $('#observacionesVentaADD').val(result.observacionVenta);
      $('#prioridadidADD').val(2);
      if (result.estadocoti)
        $('#fechaPrometidaADD').val(fechahoy);
      else
        $('#fechaPrometidaADD').val(result.fechaPrometida);


        // eduardo seguimiento
        $('#fechaPrometidaADD').attr('disabled',true);
        $('#tituloADD').attr('disabled',true)
        $('#comentariosSeguimientoADD').attr('disabled',true)
        $('#prioridadidADD').attr('disabled',true);

        $('#fechaPrometidaADD').val(result.fecha_prometidaSeguimiento);
        $('#tituloADD').val(result.tituloSeguimiento)
        $('#comentariosSeguimientoADD').val(result.comentarioSeguimiento)
        
        $('#prioridadidADD').val(result.prioridadSeguimiento);
        // $('#tituloADD').val(result.comentarioSeguimiento)

        $('#usuarioidADD').empty()
        $('#usuarioidADD').append(`<option value="${result.usuarioSeguimiento}">${result.usuarioSeguimientoNombre}</option>`)

      $('#ttADD').val(result.tt);
      $('#precioMPADD').val(result.precioMP);
      $('#costuADD').val(result.costu);

      if (accioncoti=="M" || accioncoti=="C"){
        getProcesos();        
      }
    }

    function getProcesos(){
      var url = "{{route('resumenProceso', 1)}}"
      var res = url.replace("1", idSeleccionado);

      $.ajax({  
        type: "get",
        url: res,
        success: function(data){
          cargarResumen(data);
        }
      });
    }

    function cargarResumen(procs){
      $('#modal-cotizar div.resumencoti div').remove();

      var dexor = $('#diametroExteriorNominalADD').val();
      var espor = $('#espesorNominalADD').val();
      var diametroExteriorNominal =$('#diametroExteriorNominalADD').val();
      var espesorNominal =$('#espesorNominalADD').val();
      var diametroInteriorNominal = $('#diametroInteriorNominalADD').val();
      var tt = $('#ttADD').val();
      var precioMP = $('#precioMPADD').val();
      var kilos =  $('#kilosADD').val();
      var metros =  $('#metrosADD').val();
      var costu =  $('#costuADD').val();

      var calcular = (dexor-espor)*espor*0.0246;
      var kgmp = parseFloat(calcular).toFixed(3);

      var tableresumen = `<div class="x_title">
        <h2>Resumen</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="table-responsive">
            <table id="datatable-resumen" class="table table-striped table-bordered table-hover" style="width: 100%">
              <thead>
                <tr>
                  <th>Ext</th>
                  <th>Esp</th>
                  <th>Int</th>
                  <th>T/cost</th>
                  <th>Tem</th>
                  <th>KG/m</th>
                  <th>Mts.</th>
                  <th>U$D MP/KG</th>
                  <th>Ext</th>
                  <th>Esp</th>
                  <th>Kg/m MP</th>
                  <th>Bateas</th>
                  <th>Trefilas</th>
                  <th>Horno</th>
                  <th>Kilos</th>
                </tr>
              </thead>
              <tbody id="tbody_resumen">

                <tr>
                  <td>${diametroExteriorNominal}</td>
                  <td>${espesorNominal}</td>
                  <td>${diametroInteriorNominal}</td>
                  <td>${costu}</td>
                  <td>${tt}</td>
                  <td>${kgmp}</td>
                  <td>${metros}</td>
                  <td>${precioMP}</td>
                  <td>${diametroExteriorNominal}</td>
                  <td>${espesorNominal}</td>
                  <td>${kgmp}</td>
                  <td>${procs.batea}</td>
                  <td>${procs.trefila}</td>
                  <td>${procs.horno}</td>
                  <td>${kilos}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>`;
      $('#modal-cotizar div.resumencoti').append(tableresumen);

    }
    /// END MODIFICAR COTIZACION ///
    /// END CAMBIOS NUEVOS ///
    var table = $("#datatable-buttonscotiza").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

     
    var irproceso = false; 

    $("#loadingSpinner").hide();

    function convertirFechaAFormato(fecha_recibida)
    {
      var nuevafecha = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
      return nuevafecha;
    }

    function getDate(dateString)
    {
      var dateNew = dateString.split("-");
      return new Date(dateNew[0], dateNew[1]-1, dateNew[2]);
    }

    function validarNumero(elemento)
    {
      var is_numerico = $.isNumeric(elemento);
      return is_numerico;
    }

    function camposValidos()
    {
      var valido = true;

      var largoMinEntrega         = $("#largoMinEntregaADD").val();
      var largoMaximoEntrega      = $("#largoMaxEntregaADD").val();
      // var diametroExteriorNominal = $("#diametroExteriorNominalADD").val();
      // var diametroInteriorNominal = $("#diametroInteriorNominalADD").val();
      // var espesorNominal          = $("#espesorNominalADD").val();


      if(largoMinEntrega.trim()=="" ||  largoMinEntrega===undefined)
      {
        $.toast({ 
          text : "El Campo Largo Minimo de Entrega es Obligatorio", 
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

      if(largoMaximoEntrega.trim()=="" ||  largoMaximoEntrega===undefined)
      {
        $.toast({ 
          text : "El Campo Largo Máximo de Entrega es Obligatorio", 
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

      
      if($('#clienteidADD option:selected').val()=="" ||  $('#clienteidADD option:selected').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Cliente es Obligatorio", 
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


      if($('#tipoOrdenADD option:selected').val()=="" ||  $('#tipoOrdenADD option:selected').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Tipo de orden es Obligatorio", 
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

      if($('#producto_id').val()=="" ||  $('#producto_id').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Producto es Obligatorio", 
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

      if($('#usoidADD option:selected').val()=="" ||  $('#usoidADD option:selected').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Uso es Obligatorio", 
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


      if($('#embalajeidADD option:selected').val()=="" ||  $('#embalajeidADD option:selected').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Embalaje es Obligatorio", 
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

      if($('#certificadoADD option:selected').val()=="" ||  $('#certificadoADD option:selected').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Certificado es Obligatorio", 
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

      if($('#lugarEntregaADD option:selected').val()=="" ||  $('#lugarEntregaADD option:selected').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Lugar de entrega es Obligatorio", 
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

      if($('#kilosADD').val()=="" && $('#piezasADD').val()=="" && $('#metrosADD').val()=="" )
      {
        $.toast({ 
          text : "Debe seleccionar pieza , kilos o metros", 
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


      if($('#condicionventaADD option:selected').val()=="" ||  $('#condicionventaADD option:selected').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Condicion de venta es Obligatorio", 
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

      if($('#preciokiloADD').val()=="" ||  $('#preciokiloADD').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Precio es Obligatorio", 
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

      if($('#tipomonedaidADD option:selected').val()=="" ||  $('#tipomonedaidADD option:selected').val()===undefined)
      {
        $.toast({ 
          text : "El Campo Tipo de moneda es Obligatorio", 
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

      if(!$('#porkiloADD').is(':checked') && !$('#porMetroADD').is(':checked') && !$('#porPiezaADD').is(':checked') )
      {
        $.toast({ 
          text : "Debe  una opcion seleccionar pieza , kilos o metros", 
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

      // if(diametroExteriorNominal.trim()=="" ||  diametroExteriorNominal===undefined)
      // {
      //   $.toast({ 
      //     text : "El Campo Diametro Exterior Nominal es Obligatorio", 
      //     showHideTransition : 'slide',  
      //     bgColor : 'red',              
      //     textColor : '#eee',            
      //     allowToastClose : false,     
      //     hideAfter : 5000,              
      //     stack : 5,                    
      //     textAlign : 'left',            
      //     position : 'top-right'       
      //   });
      //   return false;
      // }

      // if(diametroInteriorNominal.trim()=="" ||  diametroInteriorNominal===undefined)
      // {
      //   $.toast({ 
      //     text : "El Campo Diametro Interior Nominal es Obligatorio", 
      //     showHideTransition : 'slide',  
      //     bgColor : 'red',              
      //     textColor : '#eee',            
      //     allowToastClose : false,     
      //     hideAfter : 5000,              
      //     stack : 5,                    
      //     textAlign : 'left',            
      //     position : 'top-right'       
      //   });
      //   return false;
      // }

      // if(espesorNominal.trim()=="" ||  espesorNominal===undefined)
      // {
      //   $.toast({ 
      //     text : "El Campo espesor Nominal es Obligatorio", 
      //     showHideTransition : 'slide',  
      //     bgColor : 'red',              
      //     textColor : '#eee',            
      //     allowToastClose : false,     
      //     hideAfter : 5000,              
      //     stack : 5,                    
      //     textAlign : 'left',            
      //     position : 'top-right'       
      //   });
      //   return false;
      // }
      

      return valido;
    }

    function limpiarFormularioCrear()
    {


      $("#estadoidADD").val("");
      $("#clienteidADD").val("");
      $("#tipoOrdenADD").val("");
      $("#fechaADD").val("");
      $("#urgenteADD").prop('checked', false);
      $("#formaADD").val("");
      $("#diametroExteriorNominalADD").val("");
      $("#diametroExteriorMinimoADD").val("");
      $("#diametroExteriorMaximoADD").val("");
      $("#diametroInteriorNominalADD").val("");
      $("#diametroInteriorMinimoADD").val("");
      $("#diametroInteriorMaximoADD").val("");
      $("#espesorNominalADD").val("");
      $("#espesorMinimoADD").val("");
      $("#espesorMaximoADD").val("");
      $("#largoMinimoADD").val("");
      $("#largoMaximoADD").val("");
      $("#largoMinEntregaADD").val("");
      $("#largoMaxEntregaADD").val("");
      $("#tratamientoidADD").val("");
      $("#costuraidADD").val("");
      $("#normaidADD").val("");
      $("#fechaOtroADD").val("");
      $("#lugarEntregaADD").val("");
      $("#usoidADD").val("");
      $("#embalajeidADD").val("");
      $("#codmaterialADD").val("");
      $("#kilosADD").val("");
      $("#piezasADD").val("");
      $("#metrosADD").val("");
      $("#kilogramosmetrosADD").val("");
      $("#biseladoADD").prop('checked', false);
      $("#estenciladoADD").prop('checked', false);
      $("#durezamaximaADD").val("");
      $("#durezaminimaADD").val("");
      $("#tipoaceroidADD").val("");
      $("#certificadoADD").val("");
      $("#observacionesADD").val("");
      $("#rugosidadADD").val("");
      $("#flechaADD").val("");
      $("#pestanadoADD").prop('checked', false);
      $("#aplastadoADD").prop('checked', false);
      $("#condicionventaADD").val("");
      $("#ordencompraADD").val("");
      $("#preciokiloADD").val("");
      $("#precioMetroADD").val("");
      $("#precioPiezaADD").val("");
      $("#porkiloADD").prop('checked', false);
      $("#porPiezaADD").prop('checked', false);
      $("#porMetroADD").prop('checked', false);
      $("#tipomonedaidADD").val("");
      $("#precio45ADD").val("");
      $("#precioContribucionADD").val("");
      $("#precioCostoADD").val("");
      $("#observacionesVentaADD").val("");
      $("#crearSeguimientoADD").prop('checked', false);
      $("#usuarioidADD").val("");
      $("#prioridadidADD").val("");
      $("#fechaPrometidaADD").val("");
      $("#tituloADD").val("");
      $("#comentariosSeguimientoADD").val("");
      $("#observacionesestenciladoADD").val("");
      $("#tiponormaestenciladoADD").val("");
      $("#largominimoestenciladoADD").val("");
      $("#largomaximoestenciladoADD").val("");
      $("#numerocoladaestenciladoADD").val("");
      $("#medidaestenciladoADD").val(""); 
      $("#costuraidestanciladoADD").val("");
      $("#ensayoexpADD").val("");
    }


    function procesarCotizacionSendProceso()
    {
      
      irproceso = true;
      procesarCotizacionSend();        
    }

    function procesarCotizacionSendGuardar()
    {
      irproceso = false;
      procesarCotizacionSend();
    }


    function procesarCotizacionSend(){

      if(!camposValidos()){
        console.log('false')
        return;
      }

      
        
      var idcoti = idSeleccionado;
      var estenciladoid = $('#estenciladoidADD').val();
      var estado                = 1;
      var cliente               = $("#clienteidADD").val();
      var tipoOrden             = $("#tipoOrdenADD").val();
      var nombreCliente         = $("#clienteidADD :selected").text();
      var fecha                 = $("#fechaADD").val();
      var urgente               = $("#urgenteADD").is(":checked") ? 1 : 0;
      var forma     = $("#formaADD").val();
      var diametroExteriorNominal = $("#diametroExteriorNominalADD").val();
      var diametroExteriorMinimo  = $("#diametroExteriorMinimoADD").val();
      var diametroExteriorMaximo  = $("#diametroExteriorMaximoADD").val();
      var diametroInteriorNominal = $("#diametroInteriorNominalADD").val();
      var diametroInteriorMinimo  = $("#diametroInteriorMinimoADD").val();
      var diametroInteriorMaximo  = $("#diametroInteriorMaximoADD").val();
      var espesorNominal   = $("#espesorNominalADD").val();
      var espesorMinimo    = $("#espesorMinimoADD").val();
      var espesorMaximo    = $("#espesorMaximoADD").val();
      var largoMinimo      = $("#largoMinEntregaADD").val();
      var largoMaximo      = $("#largoMaxEntregaADD").val();
      var largoMinEntrega   = $("#largoMinEntregaADD").val();
      var largoMaximoEntrega = $("#largoMaxEntregaADD").val();
      var tratamiento        = $("#tratamientoidADD").val();
      var costura            = $("#costuraidADD").val();
      var nombrecostura      = $("#ncosturaidADD").val();
      var norma              = $("#normaidADD").val();
      var fechaOtro          = $("#fechaOtroADD").val();
      var lugarEntrega       = $("#lugarEntregaADD").val();
      var uso                = $("#usoidADD").val();
      var embalaje           = $("#embalajeidADD").val();
      var codmaterial        = $("#codmaterialADD").val();
      var kilos              = $("#kilosADD").val();
      var piezas             = $("#piezasADD").val();
      var metros             = $("#metrosADD").val();
      var kilogramosmetros   = $("#kilogramosmetrosADD").val();
      var biselado           = $("#biseladoADD").is(":checked") ? 1 : 0;
      var estencilado        = $("#estenciladoADD").is(":checked") ? 1 : 0;
      var durezamaxima       = $("#durezamaximaADD").val();
      var durezaminima       = $("#durezaminimaADD").val();
      var tipoacero          = $("#tipoaceroidADD").val();
      var nombretipoacero    = $("#ntipoaceroidADD").val();
      var certificado        = $("#certificadoADD").val();
      var observaciones      = $("#observacionesADD").val();
      var rugosidad          = $("#rugosidadADD").val();
      var flecha             = $("#flechaADD").val();
      var pestanado          = $("#pestanadoADD").is(":checked") ? 1 : 0;
      var aplastado          = $("#aplastadoADD").is(":checked") ? 1 : 0;
      var condicionventa     = $("#condicionventaADD").val();
      var ordencompra        = $("#ordencompraADD").val();
      var preciokilo         = $("#preciokiloADD").val();
      var preciometro        = $("#precioMetroADD").val();
      var preciopieza        = $("#precioPiezaADD").val();
      var porKilo            = $("#porkiloADD").is(":checked") ? 1 : 0;
      var porPieza           = $("#porPiezaADD").is(":checked") ? 1 : 0;
      var porMetro           = $("#porMetroADD").is(":checked") ? 1 : 0;
      var tipomoneda         = $("#tipomonedaidADD").val();
      var precio45           = $("#precio45ADD").val();
      var precioContribucion = $("#precioContribucionADD").val();
      var precioCosto        = $("#precioCostoADD").val();
      var observacionesVenta = $("#observacionesVentaADD").val();
      var crearSeguimiento   = $("#crearSeguimientoADD").is(":checked") ? 1 : 0;
      var usuario            = $("#usuarioidADD").val();
      var prioridad          = $("#prioridadidADD").val();
      var fechaPrometida     = $("#fechaPrometidaADD").val();
      var titulo             = $("#tituloADD").val();
      var comentariosSeguimiento = $("#comentariosSeguimientoADD").val();
      var observacionesestencilado = $("#observacionesestenciladoADD").val();
      var tiponormaestencilado     = $("#tiponormaestenciladoADD").val();
      var largominimoestencilado   = $("#largominimoestenciladoADD").val();
      var largomaximoestencilado   = $("#largomaximoestenciladoADD").val();
      var numerocoladaestencilado  = $("#numerocoladaestenciladoADD").val();
      var medidaestencilado        = $("#medidaestenciladoADD").val(); 
      var costuraestancilado       = $("#costuraidestanciladoADD").val();
      var multiplomin = $("#multiplomin").val();
      var multiplomax =$("#multiplomax").val();
      var ensayo  = $("#ensayoexpADD").val();
      var producto_id = $('#producto_id').data('id_producto');

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      var urlcreate = "addcotizacion";
      var method = "post";

      if (accioncoti == "M")
      {
        urlcreate = "updatecotizacion";
        method = "put";
      }

      $.ajax({  
        type: method,
        url: urlcreate,
        data: {
           idcopia : idcopia,
           accion: accioncoti,
           idcoti:idcoti,
           estenciladoid: estenciladoid,
           multiplomax:multiplomax,
           multiplomin: multiplomin,
           producto_id : producto_id,
           estado:estado,       
           cliente:cliente ,          
           tipoOrden:tipoOrden,          
           nombreCliente:nombreCliente,       
           fecha:fecha,                           
           urgente:urgente,               
           forma:forma,                
           diametroExteriorNominal:diametroExteriorNominal,
           diametroExteriorMinimo: diametroExteriorMinimo,
           diametroExteriorMaximo: diametroExteriorMaximo,
           diametroInteriorNominal: diametroInteriorNominal,
           diametroInteriorMinimo: diametroInteriorMinimo,
           diametroInteriorMaximo: diametroInteriorMaximo,
           espesorNominal:espesorNominal,
           espesorMinimo:espesorMinimo,  
           espesorMaximo:espesorMaximo,
           largoMinimo:largoMinimo,      
           largoMaximo:largoMaximo,     
           largoMinEntrega:largoMinEntrega, 
           largoMaximoEntrega:largoMaximoEntrega,
           tratamiento:tratamiento,     
           costura:costura,   
           nombrecostura:nombrecostura,
           norma:norma,             
           fechaOtro:fechaOtro,       
           lugarEntrega:lugarEntrega,      
           uso:uso,                           
           embalaje:embalaje,          
           codmaterial:codmaterial,      
           kilos:kilos,                         
           piezas:piezas,             
           metros:metros,             
           kilogramosmetros:kilogramosmetros,
           biselado:biselado, 
           estencilado:estencilado,
           durezamaxima:durezamaxima,       
           durezaminima:durezaminima,      
           tipoacero:tipoacero,          
           nombretipoacero:nombretipoacero,   
           certificado:certificado,       
           observaciones:observaciones,      
           rugosidad:rugosidad,         
           flecha:flecha,             
           pestanado:pestanado,          
           aplastado:aplastado,          
           condicionventa:condicionventa,     
           ordencompra:ordencompra,        
           preciokilo:preciokilo,        
           preciometro:preciometro,        
           preciopieza:preciopieza,        
           porKilo:porKilo,            
           porPieza:porPieza,           
           porMetro:porMetro,           
           tipomoneda:tipomoneda,         
           precio45:precio45,          
           precioContribucion:precioContribucion, 
           precioCosto:precioCosto,        
           observacionesVenta: observacionesVenta, 
           crearSeguimiento:crearSeguimiento,   
           usuario:usuario,         
           prioridad:prioridad,       
           fechaPrometida:fechaPrometida,   
           titulo:titulo,             
           comentariosSeguimiento:comentariosSeguimiento,
           observacionesestencilado:observacionesestencilado,
           tiponormaestencilado:tiponormaestencilado,   
           largominimoestencilado:largominimoestencilado,   
           largomaximoestencilado:largomaximoestencilado,   
           numerocoladaestencilado:numerocoladaestencilado,  
           medidaestencilado:medidaestencilado,
           costuraestancilado:costuraestancilado,
           ensayo:ensayo
        },
        success: function(data){

          console.log(data.resultado);

          if(data.resultado!=null)
          {
            $.toast({ 
              text : "Cotización creada con exito", 
              showHideTransition : 'slide',  
              bgColor : 'green',              
              textColor : '#eee',            
              allowToastClose : false,     
              hideAfter : 5000,              
              stack : 5,                    
              textAlign : 'left',            
              position : 'top-right'       
            });

            limpiarFormularioCrear();

            if(irproceso){
              window.location.href = window.location.origin+"/public/procesosindex/"+data.resultado;
            }
            return;
          }else{
            $.toast({ 
              text : "No se pudo crear la Cotización, Vuelva a Intentarlo", 
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

          
        },
        error: function(error){
          $.toast({ 
            text : "No se pudo crear la Cotización, Vuelva a Intentarlo", 
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
      });

    }


    $("#botonguardarCotizacion").on("click", procesarCotizacionSendGuardar);

    



    function limpiarFormularioBusqueda()
    {
      $("#DatepickerDesdeVentaInputBusqueda").val("");
      $("#DatepickerHastaInputBusqueda").val("");
      $("#DatepickerFechaEntregaDesdeb").val("");
      $("#DatepickerFechaEntregaHastab").val("");
      $("#clientebusqueda").val("");
      $("#clientecodbusqueda").val("");
      $("#tipoacerobusqueda").val("");
      $("#tipocosturabusqueda").val("");
      $("#tipotratamientotermicobusqueda").val("");
      $("#tiponormabusqueda").val("");
      $("#tipordenbusqueda").val("");
      $("#tipousobusqueda").val("");
      $("#estadobusqueda").val("");
      $("#diametroexteriordesdeb").val("");
      $("#diametroexteriorhastab").val("");
      $("#diametroexteriormindesdeb").val("");
      $("#diametroexteriorminhastab").val("");
      $("#diametroexteriormaxdesdeb").val("");
      $("#diametroexteriormaxhastab").val("");
      $("#largomaximobusqueda").val("");
      $("#largominimobusqueda").val("");
      $("#kilosdesdeb").val("");
      $("#kiloshastab").val("");
      $('#urgentebusqueda').prop('checked', false);
      $("#diametrointeriordesdeb").val("");
      $("#diametrointeriorhastab").val("");
      $("#diametrointeriormindesdeb").val("");
      $("#diametrointeriorminhastab").val("");
      $("#diametrointeriormaxdesdeb").val("");
      $("#diametrointeriormaxhastab").val("");
      $("#espesordesdeb").val("");
      $("#espesorhastab").val("");
      $("#espesorminexteriordesdeb").val("");
      $("#espesorminexteriorhastab").val("");
      $("#espesormaximoexteriordesdeb").val("");
      $("#espesormaximoexteriorhastab").val("");
      $("#nrocotizacionbusqueda").val("");
      $("#codigomaterialbusqueda").val("");
    }

    $("#limpiarbusqueda").on("click", function(){
      limpiarFormularioBusqueda();
    });

    $("#botonirProcesos").on("click", procesarCotizacionSendProceso);


    $("#busquedacotizacion").on('click', function(){

      var fechaDesde = $("#DatepickerDesdeVentaInputBusqueda").val();
      var fechaHasta = $("#DatepickerHastaInputBusqueda").val();
      var fechaEntregaDesde  = $("#DatepickerFechaEntregaDesdeb").val();
      var fechaEntregaHasta  = $("#DatepickerFechaEntregaHastab").val();
      var cliente      = $("#clientebusqueda").val();
      var clientecod   = $("#clientecodbusqueda").val();
      var tipoacero =  $("#tipoacerobusqueda").val();
      var tipocostura = $("#tipocosturabusqueda").val();
      var tipotratamientotermico =  $("#tipotratamientotermicobusqueda").val();
      var tiponorma = $("#tiponormabusqueda").val();
      var tiporden =$("#tipordenbusqueda").val();
      var tipouso = $("#tipousobusqueda").val();
      var estado  = $("#estadobusqueda").val();
      var diametroexteriordesde  =  $("#diametroexteriordesdeb").val();
      var diametroexteriorhasta  =  $("#diametroexteriorhastab").val();
      var diametroexteriormindesde    = $("#diametroexteriormindesdeb").val();
      var diametroexteriorminhasta    = $("#diametroexteriorminhastab").val();
      var diametroexteriormaxdesde    = $("#diametroexteriormaxdesdeb").val();
      var diametroexteriormaxhasta    = $("#diametroexteriormaxhastab").val();
      var largomaximo                 =  $("#largomaximobusqueda").val();
      var largominimo                 =  $("#largominimobusqueda").val();
      var kilosdesde                  =  $("#kilosdesdeb").val();
      var kiloshasta                  =  $("#kiloshastab").val();
      var urgente                     =  $("#urgentebusqueda").is(":checked");
      var diametrointeriordesde       =  $("#diametrointeriordesdeb").val();
      var diametrointeriorhasta       =  $("#diametrointeriorhastab").val();
      var diametrointeriormindesde    =  $("#diametrointeriormindesdeb").val();
      var diametrointeriorminhasta    =  $("#diametrointeriorminhastab").val();
      var diametrointeriormaxdesde    =  $("#diametrointeriormaxdesdeb").val();
      var diametrointeriormaxhasta    =  $("#diametrointeriormaxhastab").val();
      var espesordesde                =  $("#espesordesdeb").val();
      var espesorhasta                =  $("#espesorhastab").val();
      var espesorminexteriordesde     =  $("#espesorminexteriordesdeb").val();
      var espesorminexteriorhasta     =  $("#espesorminexteriorhastab").val();
      var espesormaximoexteriordesde  =  $("#espesormaximoexteriordesdeb").val();
      var espesormaximoexteriorhasta  =  $("#espesormaximoexteriorhastab").val();
      var cotizacion                  =  $("#nrocotizacionbusqueda").val();
      var codigomaterial              =  $("#codigomaterialbusqueda").val();

      console.log(urgente);

      var d1 = null;
      var d2 =  null;

      if(fechaDesde!==undefined && fechaDesde!=""){
        fechaDesde = convertirFechaAFormato(fechaDesde);
        d1 = getDate(fechaDesde);
      }

      if(fechaHasta!==undefined && fechaHasta!=""){
        fechaHasta = convertirFechaAFormato(fechaHasta);
        d2 = getDate(fechaHasta);
      }

      if(fechaEntregaDesde!==undefined && fechaEntregaDesde!=""){
        fechaEntregaDesde = convertirFechaAFormato(fechaEntregaDesde);
        
      }

      if(fechaEntregaHasta!==undefined && fechaEntregaHasta!=""){
        fechaEntregaHasta  = convertirFechaAFormato(fechaEntregaHasta);
        
      }

      if(d1!=null && d2!=null)
      {
        console.log("entro");
        if(d1>d2)
        {
          $.toast({ 
            text : "La Fecha Desde no puede ser mayor que la Fecha Hasta", 
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
      
      //table.destroy();
      $("#loadingSpinner").show();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });
      var urledit = "searchcotizacion";
      $.ajax({  
        type: "post",
        url: urledit,
        data: {
          'fechaDesde' : fechaDesde,
          'fechaHasta' : fechaHasta,
          'fechaEntregaDesde': fechaEntregaDesde,
          'fechaEntregaHasta': fechaEntregaHasta,
          'cliente': cliente,
          'codcliente': clientecod,
          'tipocostura': tipocostura,
          'tiponorma': tiponorma,
          'tipotratamientotermico': tipotratamientotermico,
          'tipouso': tipouso,
          'tiporden': tiporden,
          'tipoacero': tipoacero,
          'estado': estado,
          'urgente': urgente,
          'diametroexteriordesde': diametroexteriordesde,
          'diametroexteriorhasta': diametroexteriorhasta,
          'diametroexteriormindesde': diametroexteriormindesde,
          'diametroexteriorminhasta': diametroexteriorminhasta,
          'diametroexteriormaxdesde': diametroexteriormaxdesde,
          'diametroexteriormaxhasta': diametroexteriormaxhasta,
          'largomaximo': largomaximo,
          'largominimo': largominimo,
          'kilosdesde': kilosdesde,
          'kiloshasta': kiloshasta,
          'diametrointeriordesde': diametrointeriordesde,
          'diametrointeriorhasta': diametrointeriorhasta,
          'diametrointeriormindesde': diametrointeriormindesde,
          'diametrointeriorminhasta': diametrointeriorminhasta,
          'diametrointeriormaxdesde': diametrointeriormaxdesde,
          'diametrointeriormaxhasta': diametrointeriormaxhasta,
          'espesordesde': espesordesde,
          'espesorhasta': espesorhasta,
          'espesorminexteriordesde': espesorminexteriordesde,
          'espesorminexteriorhasta': espesorminexteriorhasta,
          'espesormaximoexteriordesde': espesormaximoexteriordesde,
          'espesormaximoexteriorhasta': espesormaximoexteriorhasta,
          'cotizacion': cotizacion,
          'codigomaterial': codigomaterial,
        },
        beforeSend: function() {
           $('#loader').show();
        },
        complete: function(){
           $('#loader').hide();
        },
        success: function(data){

          var arrayReturn = data.resultado;
          var arrayid = [];
          for (var i = 0; i < arrayReturn.length; i++) {
            arrayid.push(arrayReturn[i].id);           
          }

          table.destroy();

          table = $("#datatable-buttonscotiza").DataTable({
            "data": arrayReturn,
            "columns": [
              {"data": "medida"},
              {"data": "codigoPieza"},
              {"data": "fechaEntrega"},
              {"data": "id"},
              {"data": "estado"},
              {"data": "uso"},
              {"data": "tt"},
              {"data": "precio"},
              {"data": "diametroExterior"},
              {"data": "espesorNominal"},
              {"data": "mpkg"},
              {"data": "metros"},
              {"data": "kilos"},
              {"data": "preciokilo"},
              {"data": "moneda"},
              {"data": "pesosx45"},
              {"data": "precioxContribucion"},
            ],
            columnDefs : [
              { targets : [17],
                "data" : "id",
                render : function (data, type, row) {
                  //let a=window.location.origin+"/public/copiarprocesocot/"+data;
                  return  `<a class="copy_coti" data-toggle="modal" data-target="#modal-cotizar"><i class='fa fa-file-o'></i></a>`;
                }

              },
              { targets : [18],
                "data" : "id",
                render : function (data, type, row) {
                  let a=window.location.origin+"/public/vercotind/"+data;
                  return  `<a href="${a}"><i class='fa fa-eye'></i></a>`;
                }

              },
              { targets : [19],
                "data" : "id",
                render : function (data, type, row) {
                  return  `<a class="edit_coti" data-toggle="modal" data-target="#modal-cotizar"><i class="fa fa-edit"></i></a>`;
                }

              },
              { targets : [20],
                "data" : "id",
                render : function (data, type, row) {
                  let a=window.location.origin+"/public/procesosindex/"+data;
                  return  `<a href="${a}"><i class='fa fa-cog'></i></a>`;
                }

              },
            ],
            "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
                    $(nRow).attr('data-id', arrayid['id']);
                    //$('td', nRow).eq(19).append("<td align='center'><a href='"+window.location.origin+"/public/procesosindex/"+arrayid['id']+"'><i class='fa fa-search'></i></a></td>" );
                    //$('td', nRow).eq(9).attr('href', "/detalle_rechazo" + arrayid['id']);
            },
            "initComplete": function(settings, json) {
                //alert("completado");
                //$("#loadingSpinner").hide();
                //$('#loadingSpinner').hide();
                //or $('#loadingSpinner').empty();
            },
            "processing": true,
            "order": [],
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

          //$("#table_result_cotizacion").html("");
        }
      });


    });

});
</script>
@endsection