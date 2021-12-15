@extends('layouts.app')

@section('css_extra')
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">

@endsection

@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Cargue y Ordene los procesos - Cotización N°:{{$id}}</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{route('indexcotizacion')}}" class="btn btn-primary  btn-sm"><i class="fa fa-mail-reply"></i></a></li>
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
              <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <ul id="insertproceso" class='proceso'>
                    
                    
                  </ul>
                </div>
              </div>

              <div class="clearfix"></div>
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12">
                      <label class="control-label" for="first-name">Proceso</label>
                      <select id="elegido" class="form-control">
                       
                      </select>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12 ">
                      <a id="elegir" style="margin-top: 29px" type="" class="btn btn-primary  btn-sm">Elegir</a>
                    </div>
                  </div><br>
                  <div class="row">

                  <div class="col-md-1 col-md-offset-1">
                    {{-- <a id="guardardata" class="btn btn-primary  btn-sm">Guardar</a> --}}
                  </div>

                  <div class="col-md-1">
                    <a href="{{route('buscar_procesos', ['id'=>$id, 'type'=>'esop'])}}" class="btn btn-default  btn-sm">Buscar Proceso</a>
                  </div>

                </div>
                </form>

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- INICIO SECCION MODAL -->
       <!--  INICIO modal Entrega  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-entrega">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso - Entrega
               </h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="form-group">
                   <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Tipo De Entrega</label>
                       <select id="" class="form-control">
                         @foreach ($tipoentregas as $entrega)
                          <option value="{{$entrega->id}}">{{$entrega->descripcion}}</option>
                         @endforeach
                       </select>
                     </div>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Costo Por Kg</label>
                       <input type="text" id="" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <div class="row otrasdir">
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Direccion</label>
                       <input type="text" id="" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Transporte</label>
                       <select id="" class="form-control" required>
                         <option></option>
                         @foreach ($transportes as $transporte)
                          <option value="{{$transporte->id}}">{{$transporte->razon}}</option>
                         @endforeach
                       </select>
                     </div>
                   </div>
                   <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                       <label class="control-label" for="first-name">Observaciones</label>
                       <textarea class="text-area" name="" id="" cols="" rows=""></textarea>
                     </div>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizarentrega" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Entrega-->
       <!--  INICIO modal Certificado  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-certificado">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso - Certificado
               </h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="form-group">
                   <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Certificado</label>
                       <select  id="" class="form-control" required>
                         @foreach ($certificados as $certificado)
                          <option value="{{$certificado->id}}">{{$certificado->descripcion}}</option>
                         @endforeach
                       </select>
                     </div>
                 
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Observaciones</label>
                       <textarea class="text-area" name="" id="" cols="" rows=""></textarea>
                     </div>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizarcertificado" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Certificado-->
       <!--  INICIO modal Trefila  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-trefila">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso - Trefila
               </h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="form-group">
                   <div class="row matriz">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">N° De Trefila</label>
                       <input type="text" id="nrotrefila" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Tipo De Matríz</label>
                       <select data-f="0" id="tipomatriztre" class="form-control">
                         
                       </select>
                     </div>
                     
                                 
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Ø</label>
                       <input type="text" id="" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <div class="x_title">
                     <h2>Punzón</h2>
                     <div class="clearfix"></div>
                   </div>
                   <div class="row punzon">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Tipo De Punzón</label>
                       <select data-f="0" class="form-control">
                         
                       </select>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Material Punzón</label>
                       <select data-f="0" class="form-control">
                         
                       </select>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Punzón</label>
                       <select data-f="0" class="form-control">
                         
                       </select>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Ø</label>
                       <input type="text" id="" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <div class="elemento1">
                     
                   </div>
                   
                   <div class="x_title">
                     <div class="clearfix"></div>
                   </div>
                   <div class="row">

                     <div class="col-md-3 col-sm-3 col-xs-12">
                       <label class="control-label" for="first-name">Flecha (mm/mt)</label>
                       <input type="text" id="flechatre" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-12">
                       <label class="control-label" for="first-name">Espesor</label>
                       <input type="text" id="espesortrefila" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-12">
                       <label class="control-label" for="first-name">Kg/ mt calculado</label>
                       <input type="text" id="kgtrefila" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-12">
                       <label class="control-label" for="first-name">Reducción</label>
                       <input type="text" id="reducciontrefila" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>

                   <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                       <label class="control-label" for="first-name">Observaciones</label>
                       <textarea class="text-area" name="" id="observaciontre" cols="" rows=""></textarea>
                     </div>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizartrefila" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Trefila-->
       <!--  INICIO modal Horno  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-horno">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso - Horno
               </h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="form-group">
                   <div class="row">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Tipo De Horno</label>
                       <select id="tipohorno" class="form-control">
                        @foreach ($tipohornos as $horno)
                          <option value="{{$horno->id}}">{{$horno->descripcion}}</option>
                        @endforeach                         
                       </select>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Carga (Kg/M)</label>
                       <input type="text" id="cargahorno" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Dureza Mínima (HRB)</label>
                       <input type="text" id="durezaminhorno" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Dureza Máxima (HRB)</label>
                       <input type="text" id="durezamaxhorno" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Temperatura</label>
                       <select  id="temperaturahorno" class="form-control">
                         <option></option>
                         <option value="840">840</option>
                         <option value="910">910</option>
                       </select>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Velocidad (Mts/h)</label>
                       <input type="text" id="velocidadhorno" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label" for="first-name">Tubos por Camilla</label>
                       <input type="text" id="tubosxcamilla" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                       <label class="control-label" for="first-name">Observaciones</label>
                       <textarea class="text-area" name="" id="obshorno" cols="" rows=""></textarea>
                     </div>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizarhorno" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Horno-->
       <!--  INICIO modal Empaquetado  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-empaquetado">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso - Empaquetado</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div  class="row">
                   <div class="col-md-4 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Tipo de Empaquetado</label>
                     <select id="tipoempaquetado" class="form-control" required>
                       <option></option>
                       @foreach ($tipoempaquetados as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                       @endforeach
                     </select>
                   </div>
                   <div class="col-md-4 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Tubos Por Paquete</label>
                     <input type="text" id="tubosxpaquetesem" placeholder="" class="form-control col-md-7 col-xs-4">
                   </div>
                   <div class="col-md-4 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Kg Por Paquete</label>
                     <input type="text" id="kgporpaquetesem" placeholder="" class="form-control col-md-7 col-xs-3">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class="control-label" for="first-name">Observaciones</label>
                     <textarea class="text-area" name="" id="observacionesem" cols="" rows=""></textarea>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizarempaquetado" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Empaquetado-->
       <!--  INICIO modal Corte  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-corte">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso - Corte</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class="checkbox">Corte Punta
                       <input type="checkbox" id="cortepunta">
                       <span class="check"></span>
                     </label>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-3 col-sm-3 col-xs-12">
                     <label class="control-label" for="first-name">Tipo De Corte</label>
                     <select id="tipocorte" class="form-control" required>
                      <option></option>
                      @foreach ($tipocorte as $p)
                        <option value="{{$p->id}}">{{$p->descripcion}}</option>
                      @endforeach         
                     </select>
                   </div>
                   <div class="col-md-3 col-sm-3 col-xs-12">
                     <label class="control-label" for="first-name">Elemento Corte</label>
                     <select id="elementocorte" class="form-control" required>
                       <option></option>
                       <option value="1">Sierra</option>
                       <option value="2">Disco</option>
                     </select>
                   </div>
                   <div class="col-md-3 col-sm-3 col-xs-12">
                     <label class="control-label" for="first-name">Cantidad De Cortes</label>
                     <input type="text" id="cantidadcortes" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-3 col-sm-3 col-xs-12">
                     <label class="control-label" for="first-name">Resto/Scrap</label>
                     <input type="text" id="restocorte" class="form-control col-md-7 col-xs-12">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class="control-label" for="first-name">Observaciones</label>
                     <textarea class="text-area" name="" id="observacionescorte" cols="" rows=""></textarea>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizarcorte" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Corte-->
       <!--  INICIO modal Servicio  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-servicio">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso - Servicio</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Tipo De Rubro</label>
                     <select id="" class="form-control" required>
                       <option></option>
                       @foreach ($tiporubros as $rubro)
                        <option value="{{$rubro->id}}">{{$rubro->descripcion}}</option>
                       @endforeach
                     </select>
                   </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Lugar De Entrega</label>
                     <input  type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Precio</label>
                     <input  type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Proveedor</label>
                     <input  type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class="control-label" for="first-name">Observaciones</label>
                     <textarea  class="text-area" name="" id="" cols="" rows=""></textarea>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <button type="button" id="finalizarservicio" class="btn btn-primary">Ejecutar</button>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Servicio-->
       <!--  INICIO modal Prueba Hidraúlica  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-prueba-hidra">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso - Prueba Hidraúlica</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="x_title">
                   <h4>Pasada 1</h4>
                   <div class="clearfix"></div>
                 </div>
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class="control-label" for="first-name">Presión De Prueba(Kg/cm <sup>2</sup>)</label>
                     <input type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Tiempo (seg)</label>
                     <input type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Precio</label>
                     <input type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class="control-label" for="first-name">Observaciones</label>
                     <textarea class="text-area" name="" id="" cols="" rows=""></textarea>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizarprueba" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Prueba Hidrúlica-->
       <!--  INICIO modal Estencilado  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-estencilado">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso - Estencilado</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Largo Mínimo</label>
                     <input type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Largo Máximo</label>
                     <input type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">N° De Colada</label>
                     <input  type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                   <div class="col-md-6 col-sm-4 col-xs-12">
                     <label class="control-label" for="first-name">Medida</label>
                     <input type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Tipo De Costura</label>
                     <select id="tipocostura" class="form-control">
                      <option></option>
                      @foreach ($tipocosturas as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach                      
                     </select>
                   </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Norma</label>
                     <select  id="normas" class="form-control">
                      <option></option>
                      @foreach ($normas as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach 
                     </select>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class="control-label" for="first-name">Observaciones</label>
                     <textarea class="text-area" name="" id="" cols="" rows=""></textarea>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizarestencilado" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Prueba Estencilado-->
       <!--  INICIO modal  Eddy C-  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eddy">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso -  Eddy Current</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Precio</label>
                     <input type="text" id="" class="form-control col-md-7 col-xs-12">
                   </div>
                 
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Observaciones</label>
                     <textarea  class="text-area" name="" id="" cols="" rows=""></textarea>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizareddy" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Eddy C-->
       <!--  INICIO modal  Batea  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-batea">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso -  Batea</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Tipo De Batea</label>
                     <select id="tipobatea" class="form-control" required>
                        <option></option>
                        @foreach ($tipobateas as $p)
                          <option value="{{$p->id}}">{{$p->descripcion}}</option>
                        @endforeach                       
                     </select>
                   </div>
                 
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Observaciones</label>
                     <textarea  class="text-area" name="" id="obsbatea" cols="" rows=""></textarea>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizarbatea" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Batea-->
       <!--  INICIO modal  Punta  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-punta">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso -  Punta</h4>
             </div>
             <div class="modal-body cuerpo-modal" id="puntainsert">
               <div class="x_title">
                 <h4>Pasada 1</h4>
                 <div class="clearfix"></div>
               </div>
               <div class="row">
                 <div class="col-md-4 col-sm-4 col-xs-12">
                   <label class="control-label" for="first-name">Largo (mm)</label>
                   <input type="text" id="largopunta1" class="form-control col-md-7 col-xs-12">
                 </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                   <label class="control-label" for="first-name">Tipo De Punta</label>
                   <select id="tipopunta1" class="form-control">
                    <option></option>
                    @foreach ($tipopuntas as $p)
                      <option value="{{$p->id}}">{{$p->descripcion}}</option>
                    @endforeach
                     
                   </select>
                 </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                   <label class="control-label" for="first-name">Material</label>
                   <select id="tipopm1" class="form-control">
                    <option></option>
                    @foreach ($tipomatpuntas as $p)
                      <option value="{{$p->id}}">{{$p->descripcion}}</option>
                    @endforeach
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
                   <input type="text" id="largopunta2" class="form-control col-md-7 col-xs-12">
                 </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                   <label class="control-label" for="first-name">Tipo De Punta</label>
                   <select id="tipopunta2" class="form-control">
                    <option></option>
                    @foreach ($tipopuntas as $p)
                      <option value="{{$p->id}}">{{$p->descripcion}}</option>
                    @endforeach                     
                   </select>
                 </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                   <label class="control-label" for="first-name">Material</label>
                   <select id="tipopm2" class="form-control">
                    <option></option>
                    @foreach ($tipomatpuntas as $p)
                      <option value="{{$p->id}}">{{$p->descripcion}}</option>
                    @endforeach
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
                   <input type="text" id="largopunta3" class="form-control col-md-7 col-xs-12">
                 </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                   <label class="control-label" for="first-name">Tipo De Punta</label>
                   <select id="tipopunta3" class="form-control">
                    <option></option>
                    @foreach ($tipopuntas as $p)
                      <option value="{{$p->id}}">{{$p->descripcion}}</option>
                    @endforeach                      
                   </select>
                 </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                   <label class="control-label" for="first-name">Material</label>
                   <select id="tipopm3" class="form-control">
                    <option></option>
                    @foreach ($tipomatpuntas as $p)
                      <option value="{{$p->id}}">{{$p->descripcion}}</option>
                    @endforeach
                   </select>
                 </div>
               </div>
               
             </div>
             <div class="modal-footer">
               <a id="finalizarpunta" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Punta-->
       <!--  INICIO modal  Enderezadora  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-enderezadora">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso -  Enderezadora</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="row">
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Tipo</label>
                     <select id="tipoenderezado" class="form-control" required>
                      <option></option>
                      @foreach ($tipoenderezados as $p)
                        <option value="{{$p->id}}">{{$p->descripcion}}</option>
                      @endforeach
                     </select>
                   </div>
                 
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label" for="first-name">Observaciones</label>
                     <textarea class="text-area" name="" id="observacionesenderezado" cols="" rows=""></textarea>
                   </div>
                 </div>
               </form>
             </div>
             <div class="modal-footer">
               <a id="finalizarenderezado" class="btn btn-primary">Ejecutar</a>
               <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
             </div>
           </div>
         </div>
       </div>
       <!-- FIN/modals Enderezadora-->
       <!--  INICIO modal PrepracionMP  -->
       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-preparaciomp">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">Proceso -  Prepración MP</h4>
             </div>
             <div class="modal-body cuerpo-modal">
               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                 <input type="hidden" id="medidaid" value="">
                 <div class="form-group">
                   <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                       <label class="control-label" for="first-name">Medida</label>
                       <input  type="text" id="medidades" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Largo Final</label>
                       <input type="text" id="largofin" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Reducción (%)</label>
                       <input type="text" id="reduccionmp" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Precio</label>
                       <input  type="text" id="preciomp" class="form-control col-md-7 col-xs-12">
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                       <label class="control-label" for="first-name">Observaciones</label>
                       <textarea class="text-area" name="" id="obervacionesmp" cols="" rows=""></textarea>
                     </div>
                   </div>
                   <div class="form-group"><br>
                     <div class="col-md-9 col-sm-9 col-xs-12 ">
                       <a id="finalizarmp" class="btn btn-primary  btn-sm">Finalizar</a>
                     </div>
                   </div>
                 </form>
                 <div class="ln_solid"></div>
                 <div class="clearfix"></div>
                 <div class="x_content">
                   <div class="row">
                     <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover" style="width: 100%">
                         <thead>
                           <tr>
                             <th>Ext</th>
                             <th>Esp</th>
                             <th>Int</th>
                             <th>T/cost</th>
                             <th>Term</th>
                             <th>Kg/m</th>
                             <th>Mts</th>
                             <th>MP/KG</th>
                             <th>Ext</th>
                             <th>Esp</th>
                             <th>Lg</th>
                             <th>Kg/m MP</th>
                             <th>Bateas</th>
                             <th>Trefilas</th>
                             <th>Horno</th>
                             <th>Kilos</th>
                           </tr>
                         </thead>
                         <tbody id="tablamp">
                           
                         </tbody>
                       </table>
                     </div>
                   </div>
                   <form id="busquedamedida">
                     <div  class="row">
                       <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                         <label class="control-label" for="first-name">Diámetro Exterior</label>
                       </div>
                       <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                         <label class="control-label" for="first-name">Espesor</label>
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
                         <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-3">
                         <label class="control-label" for="first-name">Hasta</label>
                         <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                       </div>
                     </div>
                     <div  class="row">
                       <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                         <label class="control-label" for="first-name">Largo Máx</label>
                       </div>
                       <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                         <label class="control-label" for="first-name">Largo Mín</label>
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
                         <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-3">
                         <label class="control-label" for="first-name">Hasta</label>
                         <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-3 col-sm-3 col-xs-12">
                         <label class="control-label" for="first-name">Tipo de acero</label>
                         <select id="" class="form-control" required>
                           
                         </select>
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-12">
                         <label class="control-label" for="first-name">Tipo de costura</label>
                         <select id="" class="form-control" required>
                           
                         </select>
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-12">
                         <label class="control-label" for="first-name">Tratamiento Térmico</label>
                         <select id="" class="form-control" required>
                           
                         </select>
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-12">
                         <label class="control-label" for="first-name">Tipo de norma</label>
                         <select id="" class="form-control" required>
                           
                         </select>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-3 col-sm-3 col-xs-12">
                         <label class="checkbox">Estándar
                           <input type="checkbox">
                           <span class="check"></span>
                         </label>
                       </div>
                     </div>
                     <div  class="row">
                       <div class="col-md-3 col-sm-3 col-xs-3">
                         <label class="control-label" for="first-name">Reducción Min (%)</label>
                         <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-12">
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-3">
                         <label class="control-label" for="first-name">Reducción Máx (%)</label>
                         <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-3">
                         <label class="control-label" for="first-name">Plus entre Diam. Int y Punzón</label>
                         <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                       </div>
                       <div class="col-md-3 col-sm-3 col-xs-3">
                         <label class="control-label" for="first-name">Hasta</label>
                         <input type="text" id="" placeholder="" class="form-control col-md-7 col-xs-3">
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-3 col-sm-3 col-xs-12">
                         <label class="checkbox">Pasada al Aire
                           <input type="checkbox">
                           <span class="check"></span>
                         </label>
                       </div>
                     </div>
                   </form>
                 </div><br>
               </div>
                <div id="loadermp"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                 <div class="row tablestock">
                  
                 </div>
               <div class="modal-footer">
                 <a id="buscarmedida" class="btn btn-primary">Ejecutar</a>
                 <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
               </div>
             </div>
           </div>
         </div>
         <!-- FIN/modals PrepracionMP-->

         <!--  INICIO modal Punta  -->
         <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-punta">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                 </button>
                 <h4 class="modal-title" id="myModalLabel2">Proceso - Punta</h4>
               </div>
               <div class="modal-body cuerpo-modal">
                 <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                   <div class="x_title">
                     <h4>Pasada 1</h4>
                     <div class="clearfix"></div>
                   </div>
                   <div class="row">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Largo (mm)</label>
                       <input type="text" id="" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Tipo De Punta</label>
                       <select id="" class="form-control" required>
                         <option value=""> 1</option>
                         <option value="press"> 2</option>
                         <option value=""> 3</option>
                       </select>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Material</label>
                       <select id="" class="form-control" required>
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
                       <input type="text" id="" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Tipo De Punta</label>
                       <select  id="" class="form-control" required>
                         <option value=""> 1</option>
                         <option value="press"> 2</option>
                         <option value=""> 3</option>
                       </select>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Material</label>
                       <select id="" class="form-control" required>
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
                       <input type="text" id="" class="form-control col-md-7 col-xs-12">
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Tipo De Punta</label>
                       <select id="" class="form-control" required>
                         <option value=""> 1</option>
                         <option value="press"> 2</option>
                         <option value=""> 3</option>
                       </select>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                       <label class="control-label" for="first-name">Material</label>
                       <select  id="" class="form-control" required>
                         <option value=""> 1</option>
                         <option value="press"> 2</option>
                         <option value=""> 3</option>
                       </select>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                       <label class="control-label" for="first-name">Observaciones</label>
                       <textarea class="text-area" name="" id="" cols="" rows=""></textarea>
                     </div>
                   </div>
                 </form>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-primary">Ejecutar</button>
                 <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
               </div>
             </div>
           </div>
         </div>
         <!-- FIN/modals Punta-->


        <!-- /FIN SECCION MODAL -->
    <input type="hidden" value="{{$id}}" id="idcoti">
    <input type="hidden" id="selectores" value="{{$selectores}}">
    <input type="hidden" id="ejecutandose" value="{{$ejecutandose}}">
    <input type="hidden" id="accion" value="a">



    <!-- /page content -->
@endsection

@section('js_extra')
<script type="text/javascript">
  $(function(){
    var cotizacion = $('#idcoti').val();
    var selectores = JSON.parse($('#selectores').val());
    var ejecutandose = JSON.parse($('#ejecutandose').val());
    var procesoseleccionado = 0;
    var idprocesoseleccionado = 0;
    var posicion = 0;
    var den = 0;
    var en = 0;
    var din = 0;
    var kgAux = 0;
    var objmedida = {};
    var idSeleccionado = 0;
    var onchentrega = 0;

    cargarprocesos(ejecutandose);
    cargarselector(selectores);


    function cargarselector(selectores) {
        $('#elegido').append('<option value="-1">Seleccione...</option>');

        for (var i = 0; i < selectores.length; i++) {
          var e = selectores[i];
          var desc = e.des;
          var id = e.id;
          var idorden = cotizacion;

          var opt = '<option value='+id+'>'+desc+'</option>';

          $('#elegido').append(opt);
        }
    }

    function cargarprocesos(ejecutandose){

          for (var i = 0; i < ejecutandose.length; i++) {
            var e = ejecutandose[i];
            var idpropio = e.idpropio;
            var tipoproceso = e.tipoproceso;
            var des = e.descripcion;
            var idorden = cotizacion;


            if (tipoproceso == 1){

              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-preparaciomp" href="">Prepación MP</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 2){

              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-horno" href="">Horno</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 3){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-batea" href="">Batea</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 4){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-punta" href="">Punta</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 5){ 

              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-trefila" href="">Trefila</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 6){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-enderezadora" href="">Enderezadora</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 7){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-corte" href="">Corte</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 8){
                  var li = `
                      <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-eddy" href="">Eddy Current</a>
                          </div>
                          <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                            <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                          </div>
                          <div class="col-md-2 col-sm-2 col-xs-2">
                            <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                          </div>    
                        </li>
                      `;
            }
            else if (tipoproceso == 9){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-prueba-hidra" href="">Prueba Hidraulica</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 10){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-estencilado" href="">Estencilado</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 11){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-empaquetado" href="">Empaquetado</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 12){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-control" href="">Control Final</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 13){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-entrega" href="">Entrega</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else if (tipoproceso == 14){
                  var li = `
                      <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-servicio" href="">Servicio</a>
                          </div>
                          <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                            <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                          </div>
                          <div class="col-md-2 col-sm-2 col-xs-2">
                            <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                          </div>    
                        </li>
                      `;
            }
            else if (tipoproceso == 15){
              var li = `
                  <li data-sele='${idpropio}' data-delete='${i}' data-proceso='${tipoproceso}' data-orden="${idorden}" class="lista-proceso">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#modal-certificado" href="">Certificado</a>
                      </div>
                      <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                        <button class="ico-copy" id="copiarproceso" data-sele='${idpropio}' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button> 
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-2">
                        <button class="ico-trash" id="deleteproceso" data-delete='${i}' data-id='${idpropio}' data-proceso='${tipoproceso}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
                      </div>    
                    </li>
                  `;
            }
            else{
              
            }
            $('#insertproceso').append(li);
          }
        }

    $('#elegir').on('click', function(){
      var id = $("select option:selected").val();
      var desc = $("select option:selected").text();
      var orden = cotizacion;
      $('#accion').val("N");
      var de = desc.split(' ');
      var cargado = cargarproceso(id, orden, de[0]);
      if (cargado == true){
        $("select option:selected").remove();
      }

      obtenerElementos(cotizacion);
      return true;
    });

    function cargarproceso(idpro, idorden, desc){
      var cantidadpr = $('body #insertproceso li').length + 1;

      var modal = asignarmodal(idpro, 0); //posicion 0 = modal/ Posicion 1 = Obj 

      var li = `
          <li data-sele='0' data-delete="${cantidadpr}" data-proceso='${idpro}' data-orden="${idorden}" class="lista-proceso">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <i class="fa fa-arrows ico-arrows"></i><a data-toggle="modal" data-target="#${modal[0]}" href="">${desc}</a>
              </div>
              <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                <button class="ico-copy" id="copiarproceso" data-sele='0' data-proceso='${idpro}'> <i class="fa fa-copy"></i></button> 
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2">
                <button class="ico-trash" data-delete="${cantidadpr}" id="deleteproceso" data-id='0' data-proceso='${idpro}' data-orden="${idorden}"><i class="fa fa-trash"></i></button>
              </div>    
            </li>
          `;

      $('#insertproceso').append(li);
      sortable();
      //location.reload();

      //guardarprocesos(idpro, idorden, 0, 0);
      //return true
    }

    $(document).on('click', 'li #deleteproceso', function(){
      var id = $(this).data('id');
      var iddele = $(this).data('delete');
      var proceso = $(this).data('proceso');
      var orden = $(this).data('orden');
      deleteproceso(proceso, id, orden, iddele);
      //removeproceso(id, proceso);

      //obtenerElementos(cotizacion);

    });

    function removeproceso(value){
      $("li[data-delete="+value+"]").remove();
    }

    function deleteproceso(idpro, nropr, idcoti, remove){
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('eliminarproceso')}}",
        data: {
          'nropr': idpro, //tipo
          'idpro': nropr, //idproceso
          'idcoti': idcoti, //idorden
          'esop': 0  //1 es orden de prod. / 0 es cotizacion

        },
        beforeSend: function() {
          $('#loader').show();
        },
        complete: function(){
          $('#loader').hide();
        },
        success: function(data){
          removeproceso(remove);
          obtenerElementos(cotizacion);
        }
      });

      return true;
    }

    $(document).on('click', "li[class='lista-proceso']", function(){
      procesoseleccionado = $(this).data('proceso');
      idprocesoseleccionado = $(this).data('sele');
      posicion = $(this).data('delete');
      guardarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, 1); 

    });

    function mostrartablamp(data){

      $('#tablamp tr').remove();

      var tr = `
                  <tr>
                    <td>${data.den}</td>
                    <td>${data.en}</td>
                    <td>${data.din}</td>
                    <td>${data.costu}</td>
                    <td>${data.tt}</td>
                    <td>${data.kg2}</td>
                    <td>${data.metros}</td>
                    <td>${data.preciomp}</td>
                    <td>${data.dexor}</td>
                    <td>${data.espor}</td>
                    <td>${data.lg}</td>
                    <td>${data.kgmmp}</td>
                    <td>${data.bateas}</td>
                    <td>${data.trefila}</td>
                    <td>${data.horno}</td>
                    <td>${data.kilos}</td>
                  </tr>
      `;

      $('#tablamp').append(tr);
    }

    function mostrardataproceso(tipo, data){
          var number = 0;
          var array = [];

          if (tipo == 1){
            var modalmp = $("#modal-preparaciomp input");
            var modalmptext = $("#modal-preparaciomp textarea");
            var observaciones = $('#obervacionesmp').val();
            var number = 4;

            modalmp.each(function(index, ele) {
              var attrid = 'mp-'+number+'-'+posicion;
              //$(this).attr('id', 'mp-'+number+'-'+posicion);
              //var attval = $(this).val();
              array.push(attrid);
             
              //$(this).val("");
              number++;
              if (number == 9)
                return false;
            });

            modalmptext.each(function(index, ele) {
              var attrid = 'mp-'+7+'-'+posicion;
              array.push(attrid);
              return false;
            });

            var medidades = data.medida;
            var medidaid = data.medidaid;
            var largofinal = data.largofinal;
            var reduccion = data.reduccion
            var precio = data.precio;
            den = data.den;
            en = data.en;
            din = data.din;
            $('#mp-5-'+posicion).attr('data-id', data.medidaid);
            $('#'+array[1]).val(medidades);
            $('#'+array[2]).val(largofinal);
            $('#'+array[3]).val(reduccion);
            $('#'+array[4]).val(precio);
            $('#'+array[0]).val(medidaid);

            // pasar den, en y din para poder buscar la medida
            var tabla = JSON.parse(data.tabla);
            mostrartablamp(tabla[0]);
            


            //$('#obervacionesmp').val(data.) no retorna este valor

          }
          else if(tipo == 2){

            var array = [];
            var number = 2;
            var modalinput = $("#modal-horno input");
            var modalselect = $("#modal-horno select");
            var modalmptext = $("#modal-horno textarea");

            modalselect.each(function(index, ele) {
              array.push('mp-'+index+'-'+posicion);
            });

            modalinput.each(function(index, ele) {
              array.push('mp-'+number+'-'+posicion);
              number++;
            });

            modalmptext.each(function(index, ele) {
              array.push('mp-'+7+'-'+posicion);
              return false;
            });

            var tipohorno = data.row.tipoHornoid;
            var cargakgm = data.row.carga;
            var durezamax = data.row.durezaMaxima;
            var durezamin = data.row.durezaMinima;
            var temperatura = data.row.temperatura;
            var velocidad = data.row.velocidad;
            var tubosxcamilla = data.row.tubosxCamilla;
            var obs = data.row.observaciones;

            if (tipohorno>0){
              //$('#tipohorno option:eq('+tipohorno+')').prop('selected', true);
              $('#'+array[0]).val(tipohorno);
            }

            if (temperatura>0){
              //$('#temperaturahorno option:eq('+temperatura+')').prop('selected', true);
              $('#'+array[1]).val(temperatura);
            }

            $('#'+array[2]).val(cargakgm);
            $('#'+array[3]).val(durezamin);
            $('#'+array[4]).val(durezamax);
            $('#'+array[5]).val(velocidad);
            $('#'+array[6]).val(tubosxcamilla);
            $('#'+array[7]).val(obs);
          }
          else if(tipo == 3){
            var modalmp = $("#modal-batea select");
            var modalmptext = $("#modal-batea textarea");
            var array = [];

            modalmp.each(function(index, ele) {
              var attrid = 'mp-'+index+'-'+posicion;
              array.push(attrid);
            });

            modalmptext.each(function(index, ele) {
              var attrid = 'mp-'+6+'-'+posicion;
              array.push(attrid);
              return false;
            });

            

            $('#'+array[1]).val(data.row.observaciones);
            $('#mp-0-'+posicion).val(data.row.tipoBateaid);
            
          }
          else if(tipo == 4){//Punta
            var modalselect = $("#modal-punta select");
            var modalinput = $("#modal-punta input");
            var number = 6;
            var array = [];

            modalselect.each(function(index, ele) {
              array.push('mp-'+index+'-'+posicion);
              if (index == 5)
                return false;
            });

            modalinput.each(function(index, ele) {
              array.push('mp-'+number+'-'+posicion);
              number++;
            });

            for (var i = 0; i < data.pasada.length; i++) {
              var e = data.pasada[i];
              if (e.pasada == 1){
                $('#'+array[6]).val(e.largo);
                $('#'+array[0]).val(e.tipoPunta);
                $('#'+array[1]).val(e.material);
              }

              if (e.pasada == 2){
                $('#'+array[7]).val(e.largo);
                $('#'+array[2]).val(e.tipoPunta);
                $('#'+array[3]).val(e.material);
              }

              if (e.pasada == 3){
                $('#'+array[8]).val(e.largo);
                $('#'+array[4]).val(e.tipoPunta);
                $('#'+array[5]).val(e.material);
              }

            }

          }
          else if(tipo == 5){//trefila
            $('#mp-17-'+posicion).val(data.valesp);
            if(data.row==null){
              $('#mp-18-'+posicion).val(data.kgmcalc);
              return false;
            }
             $('#mp-13-'+posicion).val(data.row.numero);
             $('#mp-0-'+posicion).val(data.row.tipoMatrizid);
             changematriz(data.row.tipoMatrizid, data.row, data.tipoPunzon, data.kgmcalc);
            return;

          }
          else if(tipo == 6){ //enderezado
            var modalselect = $("#modal-enderezadora select");
            var modaltext = $("#modal-enderezadora textarea");
            var array = [];

            modalselect.each(function(index, ele) {
              array.push('mp-'+index+'-'+posicion);
              return false;
            });

            modaltext.each(function(index, ele) {
              array.push('mp-'+6+'-'+posicion);
              return false;
            });

            $('#'+array[0]).val(data.row.tipo);
            $('#'+array[1]).val(data.row.observaciones);
          }
          else if(tipo == 7){//corte
            var modalselect = $("#modal-corte select");
            var modalinput = $("#modal-corte input");
            var modaltext = $("#modal-corte textarea");
            var array = [];
            var number = 2;

            modalselect.each(function(index, ele) {
              var attval = 'mp-'+index+'-'+posicion;
              array.push(attval);
            });

            modalinput.each(function(index, ele) {
              // if ($(this).attr('type') == 'checkbox'){
              //   if ($(this).is(':checked'))
              //     var attval = 1;
              //   else
              //     var attval = 0;
              // }
              // else{
              // }
              var attval = 'mp-'+number+'-'+posicion;

              array.push(attval);
              number++;
            });

            modaltext.each(function(index, ele) {
              //$(this).attr('id', );
              array.push('mp-'+6+'-'+posicion);
              return false;
            });

            if (data.row.cortePunta > 0)
               $('#'+array[2]).prop('checked', true);

            $('#'+array[1]).val(data.row.elemento);
            $('#'+array[0]).val(data.row.tipoCorteid);
            $('#'+array[3]).val(data.row.cortes);
            $('#'+array[4]).val(data.row.resto);
            $('#'+array[5]).val(data.row.observaciones);

            // $('#elementocorte option:eq('+data.row.elemento+')').prop('selected', true);
            // $('#tipocorte option:eq('+data.row.tipoCorteid+')').prop('selected', true);
            // $('#cantidadcortes').val(data.row.cortes);
            // $('#restocorte').val(data.row.resto);
            // $('#observacionescorte').text(data.row.observaciones);
          }
          else if(tipo == 8){
            var modalinput = $("#modal-eddy input");
            var modaltext = $("#modal-eddy textarea");
            var array = [];

            modalinput.each(function(index, ele) {
              array.push('mp-'+index+'-'+posicion);
              return false;
            });

            modaltext.each(function(index, ele) {
              array.push('mp-'+6+'-'+posicion);
              return false;
            });

            //$('#'+array[0]).val(data.row.precio);
            $('#'+array[1]).val(data.row.observaciones);

          }
          else if(tipo == 9){
            var modalinput = $("#modal-prueba-hidra input");
            var modaltext = $("#modal-prueba-hidra textarea");
            var array = [];

            modalinput.each(function(index, ele) {
              array.push('mp-'+number+'-'+posicion);
              number++;
            });

            modaltext.each(function(index, ele) {
              array.push('mp-'+6+'-'+posicion);
              return false;
            });

            $('#'+array[0]).val(data.row.presion);
            $('#'+array[1]).val(data.row.tiempo);
            $('#'+array[2]).val(data.row.precio);
            $('#'+array[3]).val(data.row.observaciones);

          }
          else if(tipo == 10){
            var modalinput = $("#modal-estencilado input");
            var modalselect = $("#modal-estencilado select");
            var modaltext = $("#modal-estencilado textarea");
            var array = [];
            var number = 2;

            modalselect.each(function(index, ele) {
              array.push('mp-'+index+'-'+posicion);
            });

            modalinput.each(function(index, ele) {
              array.push('mp-'+number+'-'+posicion);
              number++;
            });

            modaltext.each(function(index, ele) {
              array.push('mp-'+6+'-'+posicion);
              return false;
            });

            $('#'+array[0]).val(data.row.tipoCostura);
            $('#'+array[1]).val(data.row.normaid);
            $('#'+array[2]).val(data.row.largoMinimo);
            $('#'+array[3]).val(data.row.largoMaximo);
            $('#'+array[4]).val(data.row.numeroColada);
            $('#'+array[5]).val(data.row.medida);
            $('#'+array[6]).val(data.row.observaciones);

          }
          else if(tipo == 11){///empaquetado
            var modalselect = $("#modal-empaquetado select");
            var modalinput = $("#modal-empaquetado input");
            var modaltext = $("#modal-empaquetado textarea");
            var array = [];
            var number = 1;

            modalselect.each(function(index, ele) {
              array.push('mp-'+index+'-'+posicion);
            });

            modalinput.each(function(index, ele) {
              array.push('mp-'+number+'-'+posicion);
              number++;
            });

            modaltext.each(function(index, ele) {
              $(this).attr('id', 'mp-'+6+'-'+posicion);
              array.push('mp-'+6+'-'+posicion);
              return false;
            });

            $('#'+array[0]).val(data.row.tipoEmpaquetadoid);
            $('#'+array[1]).val(data.row.tubosxPaquete);
            $('#'+array[2]).val(data.row.kilosxPaquete);
            $('#mp-6-'+posicion).val(data.row.observaciones);
          }
          else if(tipo == 12){

          }
          else if(tipo == 13){
            var modalselect = $("#modal-entrega select");
            var modalinput = $("#modal-entrega input");
            var modaltext = $("#modal-entrega textarea");
            var array = [];
            var number = 2;

            modalselect.each(function(index, ele) {
              array.push('mp-'+index+'-'+posicion);
            });

            modalinput.each(function(index, ele) {
              array.push('mp-'+number+'-'+posicion);
              number++;
            });

            modaltext.each(function(index, ele) {
              array.push('mp-'+6+'-'+posicion);
              return false;
            });

            $('#mp-0-'+posicion).val(data.row.tipoEntregaid);
            sel_entrega(data.row.tipoEntregaid);

            $('#mp-2-'+posicion).val(data.row.costoxKilo);
            $('#mp-3-'+posicion).val(data.row.direccion);
            $('#mp-1-'+posicion).val(data.row.transporteid);
            $('#mp-6-'+posicion).val(data.row.observaciones);

          }
          else if(tipo == 14){
            $('#mp-3-'+posicion).val(data.row.tipoCentroid);
            $('#mp-0-'+posicion).val(data.row.lugarEntrega);
            $('#mp-1-'+posicion).val(data.row.precio);
            $('#mp-2-'+posicion).val(data.row.proveedor);
            $('#mp-4-'+posicion).val(data.row.observaciones);
          }
          else{
            var modalselect = $("#modal-certificado select");
            var modaltext = $("#modal-certificado textarea");
            var array = [];

            modalselect.each(function(index, ele) {
              array.push('mp-'+index+'-'+posicion);
            });

            modaltext.each(function(index, ele) {
              array.push('mp-'+6+'-'+posicion);
            });

            $('#'+array[0]).val(data.row.certificadoid);
            $('#'+array[1]).val(data.row.observaciones);

          }

          return true;
        }

    function guardarprocesos(tipo, idorden, idproceso, op){

          var obj = asignarmodal(tipo, 0);
          selectorindividual(procesoseleccionado);
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
                'idorden': idorden,
                'idproceso': idproceso,
                'esop': 0,
                'op':op,
                'data': JSON.stringify(obj[1])   
            },
            success: function(data){
              var resultados = data.procesos;
              if (procesoseleccionado == 5)
                trefilia(data.procesos);

              if (resultados.tipo !== null && resultados.row !== null || resultados.row2){
                mostrardataproceso(tipo, resultados);
              }
              else{
                limpiarmodal(obj[0]);
              }

            }
          });

        }


    function limpiarmodal(modal){
      var textarea = $('#'+modal+' textarea');
      var input = $('#'+modal+' input');
      var select = $('#'+modal+' select');

      if (textarea.length >0){
        textarea.each(function(index, ele) {
          $(this).val("");
        });
      }

      if (input.length >0){
        input.each(function(index, ele) {
          if ($(this).attr('type')=='checkbox'){
            console.log('checks');
            $(this).prop('checked', false);
          }
          else{
            $(this).val("");
          }
        });
      }

      if (select.length >0){
        select.each(function(index, ele) {
          $(this).val("");
        });
      }
      return true;
    }

    function selectorindividual(tipo){
      var tables = [];
      if (tipo == 1){
        tables = ['tipoacero', 'tipocostura', 'tratamientotermico', 'normas'];
      }
      else if (tipo == 5){
        //tables = ['tipopunzon', 'tipomaterialpm'];
        tables = [];
      }
      else{
        return;
      }

      $.ajax({  
        type: "get",
        url: "{{route('selectoresindividuales')}}",
        data: {
          'tables': JSON.stringify(tables),
        },
        success: function(data){
          var retornado = data.resultados;
          for (var i = 0; i < retornado.length; i++) {
            //var idelemento = tables[i];
            var idelemento = 'mp-'+i+'-'+posicion;
            var selectToInsert = retornado[i];
            $('#'+idelemento+' option').remove();
            $('#'+idelemento).append('<option value="-1"></option>');

            for (var e = 0; e < selectToInsert.selector.length; e++) {
              var registro = selectToInsert.selector[e];
              var id = registro.id;
              var des = registro.descripcion;
              var opt = `
                  <option value="${id}" data-id="${id}">${des}</option>
                  `;
              $('#'+idelemento).append(opt);
            }
          }

          console.log(retornado);
        }
      });
    }


   $('#finalizarmp').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      if (validate() !== true)
        return false;

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;

    });

    $('#finalizarbatea').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;

    });

    $(document).on('click', '#finalizarcorte', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;

    });

    $('#finalizarpunta').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizartrefila').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizarenderezado').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);


      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizarempaquetado').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizarhorno').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizareddy').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizarcertificado').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizarentrega').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizarestencilado').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizarprueba').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    $('#finalizarservicio').on('click', function(){
      var obj = asignarmodal(procesoseleccionado, 0);

      finalizarprocesos(procesoseleccionado, cotizacion, idprocesoseleccionado, obj[1]);
      $('#'+obj[0]).modal('toggle');
      return;
    });

    function finalizarprocesos(tipo, idorden, idproceso, data){

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
            'idorden': idorden,
            'idproceso': idproceso,
            'esop': 0,
            'op':0,
            'data': JSON.stringify(data)       
        },
        success: function(data){

          var id = 0;
          if ($.isNumeric(data.procesos))
            id = data.procesos;

          if (id>0)
            $('li[data-delete='+posicion+']').data('sele', id);

          obtenerElementos(cotizacion);

          //asignarmodal(tipo, id);

          // if (saveproceso == true){
          //   $.toast({ 
          //     text : "Se Creo Correctamente", 
          //     showHideTransition : 'slide',  
          //     bgColor : 'green',              
          //     textColor : '#eee',            
          //     allowToastClose : false,     
          //     hideAfter : 5000,              
          //     stack : 5,                    
          //     textAlign : 'left',            
          //     position : 'top-right'       
          //   });

          //   return true;
          // }

        }
      });


    }
    ///// END FINALIZADORES DE PROCESOS /////

    function asignarmodal(tipo, data){
      //se asigna el modal al proceso cargado nuevo
        var accion = $('#accion').val();
        var number = 0;
      if (tipo == 1){
        busquedamedidavalue(0);
        var array = [];
        var modalmp = $("#modal-preparaciomp input");
        var modalmptext = $("#modal-preparaciomp textarea");
        var observaciones = $('#obervacionesmp').val();
        var number = 4;

        modalmp.each(function(index, ele) {
          var attrid = $(this).attr('id', 'mp-'+number+'-'+posicion);
          var attval = $(this).val();
          array.push(attval);
         
          number++;
          if (number == 9)
            return false;
        });

        modalmptext.each(function(index, ele) {
          var attrid = $(this).attr('id', 'mp-'+7+'-'+posicion);
          array.push($(this).val());
          return false;
        });
        
        var medidaid = $('#mp-5-'+posicion).data('id');

        var obj = {
          'medidaid': medidaid,
          'largofin': array[2],
          'reduccion': array[3],
          'precio': array[4],
          'observaciones': array[5],
          'accion': accion
        }

        var modal = 'modal-preparaciomp';
      }
      else if (tipo == 2){
        var array = [];
        var number = 2;
        var modalinput = $("#modal-horno input");
        var modalselect = $("#modal-horno select");
        var modalmptext = $("#modal-horno textarea");

        modalselect.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
        });

        modalinput.each(function(index, ele) {
          $(this).attr('id', 'mp-'+number+'-'+posicion);
          var attval = $(this).val();
          array.push(attval);
          $(this).val("");
          number++;
        });

        modalmptext.each(function(index, ele) {
          $(this).attr('id', 'mp-'+7+'-'+posicion);
          var attval = $(this).val();
          array.push(attval);
          $(this).val("");
          return false;
        });

        var obj = {
          'tipohorno': array[0],
          'temperatura': array[1],
          'cargahorno': array[2],
          'durezaminhorno': array[3],
          'durezamaxhorno': array[4],
          'velocidadhorno': array[5],
          'tubosxcamilla': array[6],
          'obshorno': array[7],
          'accion': accion
        }

        var modal = 'modal-horno';


      }
      else if (tipo == 3){
        var modalmp = $("#modal-batea select");
        var modalmptext = $("#modal-batea textarea");
        var array = [];

        modalmp.each(function(index, ele) {
          var attrid = $(this).attr('id', 'mp-'+index+'-'+posicion);
          var attval = $(this).val();
          array.push(attval);
         
          $(this).val("");
          //if (number == 5)
          //  return false;
        });

        modalmptext.each(function(index, ele) {
          var attrid = $(this).attr('id', 'mp-'+6+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        var obj = {
          'tipobatea': array[0],
          'obs': array[1],
          'accion': accion
        }

        var modal = 'modal-batea';
        
      }
      else if (tipo == 4){
        var modalselect = $("#modal-punta select");
        var modalinput = $("#modal-punta input");
        var number = 6;
        var array = [];

        modalselect.each(function(index, ele) {
          var attrid = $(this).attr('id', 'mp-'+index+'-'+posicion);
          var attval = $(this).val();
          array.push(attval);
          $(this).val("");
          if (index == 5)
            return false;
        });

        modalinput.each(function(index, ele) {
          var attrid = $(this).attr('id', 'mp-'+number+'-'+posicion);
          var attval = $(this).val();
          array.push(attval);
          $(this).val("");
          number++;
        });


        //verificar pasadas//
        if (array[1] == "")
          array[1] = null;

        if (array[7] == "")
          array[7] = null;

        if (array[8] == "")
          array[8] = null;


        var obj = {
          'largopunta1': array[6],
          'tipopunta1': array[0],
          'tipopm1': array[1],
          'largopunta2': array[7],
          'tipopunta2': array[2],
          'tipopm2': array[3],
          'largopunta3': array[8],
          'tipopunta3': array[4],
          'tipopm3': array[5],
          'accion': accion
        }

        var modal = 'modal-punta';
        
      }
      else if (tipo == 5){

        var nrotrefila = $('#mp-13-'+posicion).val();
        var tipoMatrizid = $('#mp-0-'+posicion).val();
        var punzonid = $('#mp-10-'+posicion).val();
        var espesortrefila = $('#mp-17-'+posicion).val();
        var reducciontrefila = $('#mp-19-'+posicion).val();
        var flecha = $('#mp-16-'+posicion).val();
        var observaciones = $('#mp-20-'+posicion).val(); 
        //Selectores

        if ($('#mp-1-'+posicion).parent('div').css('display') !== 'none')      
          var tipomaterialpm = $('#mp-1-'+posicion).val();
        else
          var tipomaterialpm = null;

        if ($('#mp-2-'+posicion).parent('div').css('display') !== 'none')      
          var matrizDoble = $('#mp-2-'+posicion).val();
        else
          var matrizDoble = null;

        if ($('#mp-3-'+posicion).parent('div').css('display') !== 'none')      
          var matriztl = $('#mp-3-'+posicion).val();
        else
          var matriztl = null;

        if ($('#mp-4-'+posicion).parent('div').css('display') !== 'none')      
          var matriztl2 = $('#mp-4-'+posicion).val();
        else
          var matriztl2 = null;

        if ($('#mp-5-'+posicion).parent('div').css('display') !== 'none')      
          var cabezaTurco = $('#mp-5-'+posicion).val();
        else
          var cabezaTurco = null;

        if ($('#mp-6-'+posicion).parent('div').css('display') !== 'none')      
          var matrizSimAcero = $('#mp-6-'+posicion).val();
        else
          var matrizSimAcero = null;

        if ($('#mp-7-'+posicion).parent('div').css('display') !== 'none')      
          var matrizSimWidia = $('#mp-7-'+posicion).val();
        else
          var matrizSimWidia = null;

        if ($('#mp-12-'+posicion).parent('div').css('display') !== 'none')      
          var punzonDoble = $('#mp-12-'+posicion).val();
        else
          var punzonDoble = null;          

        var obj = {
          'nrotrefila': nrotrefila,
          'tipoMatrizid': tipoMatrizid,
          'punzonid': punzonid,
          'espesortrefila': espesortrefila,
          'reducciontrefila': reducciontrefila,
          'flechatre': flecha,
          'observaciontre': observaciones,
          'tipomaterialpm': tipomaterialpm,
          'matrizDoble': matrizDoble,
          'matriztl': matriztl,
          'matriztl2': matriztl2,
          'cabezaTurco': cabezaTurco,
          'matrizSimAcero': matrizSimAcero,
          'matrizSimWidia': matrizSimWidia,
          'punzonDoble': punzonDoble,
          'accion': accion
        }
        var modal = 'modal-trefila';
        
      }
      else if (tipo == 6){

        var modalselect = $("#modal-enderezadora select");
        var modaltext = $("#modal-enderezadora textarea");
        var array = [];

        modalselect.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          var attval = $(this).val();
          array.push(attval);
          $(this).val("");
          return false;
        });

        modaltext.each(function(index, ele) {
          $(this).attr('id', 'mp-'+6+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        var obj = {
          'tipoenderezado': array[0],
          'obs': array[1],
          'accion': accion
        }

        var modal = 'modal-enderezadora';
        
      }
      else if (tipo == 7){

        var modalselect = $("#modal-corte select");
        var modalinput = $("#modal-corte input");
        var modaltext = $("#modal-corte textarea");
        var array = [];
        var number = 2;

        modalselect.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          var attval = $(this).val();
          array.push(attval);
          $(this).val("");
        });

        modalinput.each(function(index, ele) {
          $(this).attr('id', 'mp-'+number+'-'+posicion);
          if ($(this).attr('type') == 'checkbox'){
            if ($(this).is(':checked'))
              var attval = 1;
            else
              var attval = 0;
          }
          else{
            var attval = $(this).val();
          }

          array.push(attval);
          number++;
          $(this).val("");
          $(this).prop('checked', false);
        });

        modaltext.each(function(index, ele) {
          $(this).attr('id', 'mp-'+6+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        var obj = {
          'cortepunta': array[2],
          'elementocorte': array[1],
          'tipocorte': array[0],
          'cantidad': array[3],
          'resto': array[4],
          'obs': array[5],
          'accion': accion
        }

        var modal = 'modal-corte';
        
      }
      else if (tipo == 8){
        var modalinput = $("#modal-eddy input");
        var modaltext = $("#modal-eddy textarea");
        var array = [];

        modalinput.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        modaltext.each(function(index, ele) {
          $(this).attr('id', 'mp-'+6+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        var obj = {
          'precio': array[0],
          'obs': array[1],
          'accion':accion
        }

        var modal = 'modal-eddy';
      }
      else if (tipo == 9){
        var modalinput = $("#modal-prueba-hidra input");
        var modaltext = $("#modal-prueba-hidra textarea");
        var array = [];

        modalinput.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
        });

        modaltext.each(function(index, ele) {
          $(this).attr('id', 'mp-'+6+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        var obj = {
          'presionprueba': array[0],
          'tiempo': array[1],
          'precio': array[2],
          'obs': array[3],
          'accion': accion
        }

        var modal = 'modal-prueba-hidra';
        
      }
      else if (tipo == 10){
        var modalinput = $("#modal-estencilado input");
        var modalselect = $("#modal-estencilado select");
        var modaltext = $("#modal-estencilado textarea");
        var array = [];
        var number = 2;

        modalselect.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
        });

        modalinput.each(function(index, ele) {
          $(this).attr('id', 'mp-'+number+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          number++;
        });

        modaltext.each(function(index, ele) {
          $(this).attr('id', 'mp-'+6+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        var obj = {
          'costuraid': array[0],
          'normaid': array[1],
          'largomin': array[2],
          'largomax': array[3],
          'nrocolada': array[4],
          'medida': array[5],
          'obs': array[6],
          'accion':accion
        }

        var modal = 'modal-estencilado';
        
      }
      else if (tipo == 11){
        var modalselect = $("#modal-empaquetado select");
        var modalinput = $("#modal-empaquetado input");
        var modaltext = $("#modal-empaquetado textarea");
        var array = [];
        var number = 1;
        modalselect.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
        });

        modalinput.each(function(index, ele) {
          $(this).attr('id', 'mp-'+number+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          number++;
        });

        modaltext.each(function(index, ele) {
          $(this).attr('id', 'mp-'+6+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        var obj = {
          'tipoempaquetado': array[0],
          'tubosxpaquetesem': array[1],
          'kgporpaquetesem': array[2],
          'obs': array[3],
          'accion': accion
        }

        var modal = 'modal-empaquetado';
      }
      else if (tipo == 12){
        var modal = 'modal-control';
        
      }
      else if (tipo == 13){
        var modalselect = $("#modal-entrega select");
        var modalinput = $("#modal-entrega input");
        var modaltext = $("#modal-entrega textarea");
        var obj = {
          'tipo': $('#mp-0-'+posicion).val(),
          'costo': $('#mp-2-'+posicion).val(),
          'obs': $('#mp-6-'+posicion).val(),
          'direccion': $('#mp-3-'+posicion).val(),
          'transporteid': $('#mp-1-'+posicion).val(),
          'accion': accion
        }

        var array = [];
        var number = 2;
        modalselect.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
        });

        modalinput.each(function(index, ele) {
          $(this).attr('id', 'mp-'+number+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          number++;
        });

        modaltext.each(function(index, ele) {
          $(this).attr('id', 'mp-'+6+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        if (onchentrega == 0){
          $('#mp-0-'+posicion).on('change', function(){
            sel_entrega($(this).val());
          });          
        }
        onchentrega = 1;
        
        var modal = 'modal-entrega';
        
      }
      else if (tipo == 14){
        var modalselect = $("#modal-servicio select");
        var modalinput = $("#modal-servicio input");
        var modaltext = $("#modal-servicio textarea");

        var obj = {
          'tiporubro': $('#mp-3-'+posicion).val(),
          'lugar': $('#mp-0-'+posicion).val(),
          'precio': $('#mp-1-'+posicion).val(),
          'proveedor': $('#mp-2-'+posicion).val(),
          'obs': $('#mp-4-'+posicion).val(),
          'accion': accion
        }

        modalinput.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          $(this).val("");
        });

        modalselect.eq(0).attr('id', 'mp-3-'+posicion);
        modaltext.eq(0).attr('id', 'mp-4-'+posicion);

        modalselect.eq(0).val("");
        modaltext.eq(0).val("");

        var modal = 'modal-servicio';
        
      }
      else{

        var modalselect = $("#modal-certificado select");
        var modalinput = $("#modal-certificado input");
        var modaltext = $("#modal-certificado textarea");
        var array = [];

        modalselect.each(function(index, ele) {
          $(this).attr('id', 'mp-'+index+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        modaltext.each(function(index, ele) {
          $(this).attr('id', 'mp-'+6+'-'+posicion);
          array.push($(this).val());
          $(this).val("");
          return false;
        });

        var obj = {
          'tipo': array[0],
          'obs': array[1],
          'accion': accion
        }

        var modal = 'modal-certificado';
      }

      return [modal, obj];
    }

    function obtenerElementos(id){
      //console.clear();
      var list = '';
      var lenglist = $('body #insertproceso li').length;
      var i = 0;

      $('body #insertproceso li').each(function(ele) {
        i = i+1;
        var tipo = $(this).data('proceso');
        var idproceso = $(this).data('sele');

        if (i == lenglist){
          list += tipo+'*'+idproceso;
        }
        else{
          list += tipo+'*'+idproceso+',';
        }
      });

      vercot(list, id);
      console.log(list);
      console.log(lenglist);
    }

    function vercot(list, coti){
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('vercot')}}",
        data: {
          'list': list, //procesosytipos
          'idcot': coti, //cotizacion
          'esop': 0  //1 es orden de prod. / 0 es cotizacion

        },
        beforeSend: function() {
          $('#loader2').show();
        },
        complete: function(){
          $('#loader2').hide();
        },
        success: function(data){
          console.log(data);
          if (data == "true"){
              $.toast({ 
                text : "Cambios guardados", 
                showHideTransition : 'slide',  
                bgColor : 'green',              
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
    }


    function copiarproceso(tipoproceso, descripcion){
      var cantidadpr = $('body #insertproceso li').length + 1;
      var modal = asignarmodal(tipoproceso, 0);
      var li = ` 
          <li data-sele='0' data-delete='${cantidadpr}' data-proceso='${tipoproceso}' data-orden="${cotizacion}" class="lista-proceso">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <i class="fa fa-arrows ico-arrows"></i><a href="" data-toggle="modal" data-target="#${modal[0]}">${descripcion}</a> 
              </div>
              <div class="col-md-2 col-md-offset-2 col-sm-2 col-xs-2 ">
                <button class="ico-copy-ende" id="copiarproceso" data-sele='0' data-proceso='${tipoproceso}'> <i class="fa fa-copy"></i></button>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2">              
                <button class="ico-trash" data-proceso='${tipoproceso}' data-orden="${cotizacion}" id="deleteproceso" data-id='0' data-delete='${cantidadpr}' type=""><i class="fa fa-trash"></i></button>
              </div>
            </div>
          </li>
          `;

      $('#insertproceso').append(li);

      obtenerElementos(cotizacion);

    }

     $(document).on('click', '#copiarproceso', function(){
      console.log("si");
      copiar = 1;
      var tipo = $(this).parents('li');
      //var des = $(this).siblings('a').text();
      var texto = $(this).parents('div.row').eq(0);
      var des = texto.children().eq(0).children().text();
      copiarproceso(tipo.data('proceso'), des);
      $.toast({ 
                text : 'Se ha copiado el proceso con exito', 
                showHideTransition : 'slide',  
                bgColor : 'green',              
                textColor : '#eee',            
                allowToastClose : false,     
                hideAfter : 5000,              
                stack : 5,                    
                textAlign : 'left',            
                position : 'top-right'       
            });
    });

    $(document).on('click', '#buscarmedida', function(){
      var data = busquedamedidavalue(1);
      sendmedida(data);

    });

    $(document).on('click', '#mp-16-'+posicion, function(){
      estandar();
    });

    $(document).on('click', '#mp-21-'+posicion, function(){
      pasada();
    });

    function estandar(){
        if ($("#mp-16-"+posicion).is(':checked') ){
             $("#mp-17-"+posicion).attr('disabled','disabled');
             $("#mp-18-"+posicion).attr('disabled','disabled');
        }
        else {
             $("#mp-17-"+posicion).removeAttr('disabled');
             $("#mp-18-"+posicion).removeAttr('disabled');

        }
    }

    function pasada(){

    if ($('#mp-21-'+posicion).is(':checked') )
        {
            $("#mp-17-"+posicion).val(0);
            $("#mp-19-"+posicion).attr('disabled','disabled');

        }
        else
            $("#mp-19-"+posicion).removeAttr('disabled');

    }

    function validate(){
      if ($("#mp-8-"+posicion).val().length == 0){
        $.toast({ 
          text : "Debe Completar el Precio", 
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

      return true;
    }

    function busquedamedidavalue(value){
      var selectmedida = $("#busquedamedida select");
      var inputmedida = $("#busquedamedida input");
      var array = [];
      var number = 8;


      selectmedida.each(function(index, ele) {
        $(this).attr('id', 'mp-'+index+'-'+posicion);
        //onsole.log(ele);
        array.push($(this).val());
        $(this).val("");
        //return false;
      });

      inputmedida.each(function(index, ele) {
        $(this).attr('id', 'mp-'+number+'-'+posicion);
        if ($(this).attr('type') == 'checkbox'){
          if ($(this).is(':checked'))
            var attval = 1;
          else
            var attval = 0;

          $(this).prop('checked', false);
        }
        else{
          var attval = $(this).val();
        }

        array.push(attval);
        $(this).val("");
        //return false;
        number++;
      });
      var estandar = 0;
      var pasada = 0;

      if (array[0] == "-1")
        array[0] = null;

      if (array[1] == "-1")
        array[1] = null;

      if (array[2] == "-1")
        array[2] = null;

      if (array[3] == "-1")
        array[3] = null;

      var obj = {
        'tipoacero': array[0],
        'tipocostura': array[1],
        'tratamiento': array[2],
        'norma': array[3],
        'diamexdesde': array[4],
        'diamexhasta': array[5],
        'espesordesde': array[6],
        'espesorhasta': array[7],
        'largomaxdesde': array[8],
        'largomaxhasta': array[9],
        'largomindesde': array[10],
        'largominhasta': array[11],
        'estandar': array[12],
        'reduccionmin': array[13],
        'reduccionmax': array[14],
        'plus': array[15],
        'hasta': array[16],
        'pasada': array[17],
        'den':den,
        'en': en,
        'din': din
      }

      if (value>0)
        return obj;

      return true;
    }

    function sendmedida(data){

      $.ajax({  
        type: "get",
        url: "{{route('buscarmedidaproceso')}}",
        data: data,
        beforeSend: function() {
          $('#loadermp').show();
        },
        complete: function(){
          $('#loadermp').hide();
        },
        success: function(data){
          var datos = data.resultados;
          if ($('#modal-preparaciomp div.tablestock table').length == 0){
            var tablestock = `<div class="table-responsive">
              <table id="datatablestock" class="table table-striped table-bordered table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th>Medida</th>
                    <th>Stocks</th>
                    <th>KGs Reservados Cotizacion</th>
                    <th>KGs Reservados Produccion</th>
                  </tr>
                </thead>
                <tbody id="tablastockmp">
                  
                </tbody>
              </table>
            </div>`;

            $('#modal-preparaciomp div.tablestock').append(tablestock);    

          }
          var tablest = $('#datatablestock').DataTable();        

          if (datos.length>0){
            tablest.destroy();
            $("#datatablestock").DataTable({
              "data": datos,
              "columns": [
                {"data": "MEDIDA"},
                {"data": "Stock(kgs)"},
                {"data": "KGsreservaCotizacion"},
                {"data": "KGsreservaProduccion"},
              ],
              "order": [],   
              "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
                      $(nRow).attr('data-id', arrayid['id']);
                      $(nRow).attr('data-medida', arrayid['MEDIDA']);
                      //$('td', nRow).eq(1).append("<td align='center'><a href='"+window.location.origin+"/public/detalle_rechazo/"+arrayid['id']+"'>"+ name[a]+"</td>" );
                      //$('td', nRow).eq(9).attr('href', "/detalle_rechazo" + arrayid['id']);
              },  
              "initComplete": function(settings, json) {
                  //alert("completado");
                  //$("#loadingSpinner").hide();
                  //$('#loadingSpinner').hide();
                  //or $('#loadingSpinner').empty();
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
            
            $('#datatablestock').on('click', 'tr', function(){
              idSeleccionado = $(this).data('id');
              var name_medidas = $(this).data('medida');

              if($(this).hasClass('selected-table')){
                $(this).removeClass('selected-table');
              }else{
                $("tbody tr.selected-table").removeClass('selected-table');
                $(this).addClass('selected-table');
              }

              cargarmedida(name_medidas, idSeleccionado);

            });
          }
          else{
            tablest.clear().draw();
          }
        }

      });

    }

    function cargarmedida(name, id){
      $('#mp-5-'+posicion).val("");
      $('#mp-5-'+posicion).val(name);
      $('#mp-5-'+posicion).attr('data-id', id);
      return true;
    }

    $(document).on('click', '#mp-0-'+posicion, function(){
      console.log("entro");
    });

    $(document).on('click', '#volver', function(){
      cerrar();
    });


    function selectorestrefila(){
      $('#modal-trefila div.matriz div.ma').remove();
      $('#modal-trefila div.matriz div.ma1').remove();

      var select1 = `<div id='material' class="col-md-4 col-sm-4 col-xs-12 ma">
                    <label class="control-label" for="first-name">Material</label>
                    <select data-f="1" class="form-control">
                      
                    </select>
                  </div> 
                `;
      var select2 = `<div id='matrizdoble' class="col-md-4 col-sm-4 col-xs-12 ma">
                    <label class="control-label" for="first-name">Matriz Doble</label>
                    <select data-f="1" class="form-control">
                      
                    </select>
                  </div> 
                `;
      var select3 = `<div id='trilobular' class="col-md-4 col-sm-4 col-xs-12 ma">
                    <label class="control-label" for="first-name">Matriz Trilobular</label>
                    <select data-f="1" class="form-control">
                      
                    </select>
                  </div> 
                `;

      var select4 = `<div id='limon' class="col-md-4 col-sm-4 col-xs-12 ma">
                    <label class="control-label" for="first-name">Matriz Limon</label>
                    <select data-f="1" class="form-control">
                      
                    </select>
                  </div> 
                `;

      var select5 = `<div id='cabeza' class="col-md-4 col-sm-4 col-xs-12 ma">
                    <label class="control-label" for="first-name">Cabeza Turco</label>
                    <select data-f="1" class="form-control">
                      
                    </select>
                  </div> 
                `;

      var select6 = `<div id='simacero' class="col-md-4 col-sm-4 col-xs-12 ma1">
                    <label class="control-label" for="first-name">Matriz SimAcero</label>
                    <select data-f="1" class="form-control">
                      
                    </select>
                  </div> 
                `;

      var select7 = `<div id='simwidia' class="col-md-4 col-sm-4 col-xs-12 ma1">
                    <label class="control-label" for="first-name">Matriz SimWidia</label>
                    <select data-f="1" class="form-control">
                    </select>
                  </div> 
                `;

      

      $('#modal-trefila div.matriz').append(select1);
      $('#modal-trefila div.matriz').append(select2);
      $('#modal-trefila div.matriz').append(select3);
      $('#modal-trefila div.matriz').append(select4);
      $('#modal-trefila div.matriz').append(select5);
      $('#modal-trefila div.matriz').append(select6);
      $('#modal-trefila div.matriz').append(select7);

      var divselectma = $("#modal-trefila div.matriz select");

      divselectma.each(function(index, ele) {
        if ($(this).data('f')=='1'){
          $(this).parent('div').hide();
        }

        $(this).attr('id', 'mp-'+index+'-'+posicion);  

      });

      $('#modal-trefila #mp-0-'+posicion).on('click', function(){
        changematriz($(this).val(), null, null, null);
      });

      $('#modal-trefila #mp-1-'+posicion).on('click', function(){
        var selectores = $('#modal-trefila'+' div.ma1');
        selectores.each(function(index, ele) {
          $(this).hide();
        });

        if ($(this).val() == 1){
          var select = 'simacero';
        }

        if ($(this).val() == 2){
          var select = 'simwidia';
        }

        if ($(this).val() !== '0')
          $('div #'+select).fadeIn();

      });

      
        ////////PUNZON//////////
        $('#mp-8-'+posicion).on('click', function(){
          changePunzon(0,0,9,0);
        });

        $('#mp-9-'+posicion).on('click', function(){
          changePunzon(0,0,9,$(this).val());
        });




        function changePunzon(dat,idpun,nrop,mat){
          //este = document.getElementById("tipopunzon");
          var tp = dat;
                 
          if (tp==0)
              tp = $("#mp-8-"+posicion).val();

          if (mat==0)
              mat = $("#mp-"+nrop+"-"+posicion).val();          

          if (tp==5){
              $("#mp-10-"+posicion).attr('disabled','disabled').val(-1);
              $("#mp-9-"+posicion).attr('disabled','disabled').val(-1);
              return false;
          }
          else{
              $("#mp-9-"+posicion).removeAttr('disabled');
              $("#mp-10-"+posicion).removeAttr('disabled');
          }
          

          if (tp==4){ // es doble
              tp = 1;
              generatePunzon(mat,idpun);
          }
          else {
              //aqui elimina el otro punzon
            $('div.elemento1 div').remove();
          }          

          var stop = false;
          if (nrop==11){
             
              stop = generatePunzon(mat,idpun);
              
          }

          if (!stop){
                     //divContenido = document.getElementById("selpunzon1");
            $.ajax({
                type: "GET",
                url: "{{route('punzonestrefila')}}",
                data: {
                  'punid': idpun,
                  'tipopunzon': tp,
                  'material': mat,
                  'pDoble': 0
                },
                success: function(data){
                  $('#mp-10-'+posicion).children('option').remove();
                  var list = data.resultado.selector;
                  $('#mp-10-'+posicion).append('<option>Seleccione...</option>');
                  for (var i = 0; i <list.length; i++) {
                    var e = list[i];
                    var opt = `<option value="${e.id}">${e.descripcion}</option>`;
                    $('#mp-10-'+posicion).append(opt);
                  }
                }
             });
          }
          return false;
        }

        function generatePunzon(mat,idpun){
             $.ajax({
                type: "GET",
                url: "{{route('punzonestrefila')}}",
                data: {
                  'punid': idpun,
                  'pDoble': 1,
                  'tipopunzon': 1,
                  'material': mat
                },
                success: function(data){
                  if (data.resultado.variables[2] == '1'){ //si es doble
                    $('div.elemento1 div').remove();
                    var np = `
                            <div class="x_title">
                              <h2>Punzón 2</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="row punzon2">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Material Punzón</label>
                                <select data-f="0" id="mp-11-${posicion}" class="form-control">
                                  
                                </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Punzón</label>
                                <select data-f="0" id="mp-12-${posicion}" class="form-control">
                                  
                                  
                                </select>
                              </div>
                            </div>
                             `;

                    $('div.elemento1').append(np);

                    $('#mp-11-'+posicion).on('click', function(){
                      changePunzon(0,0,11,0);
                    });

                    $('#mp-11-'+posicion).children('option').remove();
                    $('#mp-11-'+posicion).append('<option></option>');

                    for (var i = 0; i < data.resultado.selector.length; i++) {
                      var e = data.resultado.selector[i];
                      var opt = `<option value="${e.id}">${e.descripcion}</option>`;
                      $('#mp-11-'+posicion).append(opt);
                      $('#mp-11-'+posicion).val(data.resultado.variables[0]);
                    }

                    $('#mp-12-'+posicion).children('option').remove();
                    $('#mp-12-'+posicion).append('<option>Seleccione...</option>');

                    for (var i = 0; i < data.resultado.punzon.length; i++) {
                      var e = data.resultado.punzon[i];
                      var opt = `<option value="${e.id}">${e.descripcion}</option>`;
                      $('#mp-12-'+posicion).append(opt);
                      //$('#mp-12-'+posicion).val(data.resultado.variables[0]);
                    }

                  }
                  return;
                  if (data.resultado.nuevo>0){
                    console.log(data)
                    //inserto nuevo punzon
                    $('div.elemento1 div').remove();
                    var np = `
                            <div class="x_title">
                              <h2>Punzón 2</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="row punzon2">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Material Punzón</label>
                                <select data-f="0" id="mp-11-${posicion}" class="form-control">
                                  
                                </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Punzón</label>
                                <select data-f="0" id="mp-12-${posicion}" class="form-control">
                                  <option></option>
                                  
                                </select>
                              </div>
                            </div>
                             `;

                    $('div.elemento1').append(np);

                    $('#mp-11-'+posicion).on('click', function(){
                      changePunzon(0,0,11,0);
                    });

                    if (data.resultado.punzon !== ""){
                      $('#mp-11-'+posicion).children('option').remove();
                      $('#mp-11-'+posicion).append('<option></option>');

                      for (var i = 0; i < data.resultado.selector.length; i++) {
                        var e = data.resultado.selector[i];
                        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
                        $('#mp-11-'+posicion).append(opt);
                        $('#mp-11-'+posicion).val(data.resultado.variables[0]);
                      }

                      $('#mp-12-'+posicion).children('option').remove();
                      $('#mp-12-'+posicion).append('<option></option>');
                      return;

                    }

                    var divselect = $("#modal-trefila div.punzon2 select");

                    divselect.each(function(index, ele) {
                      $(this).children('option').remove();
                      $(this).append('<option></option>');
                      if (index == 0){
                        for (var i = 0; i < data.resultado.selector.length; i++) {
                          var e = data.resultado.selector[i];
                          var opt = `<option value="${e.id}">${e.descripcion}</option>`;
                          $(this).append(opt);
                        }

                      }
                      
                    });
                    return true;
                  }
                 //console.log("aqio esta  mierda 2 "+data);
                   //document.getElementById('selpunzon2').innerHTML = html;
            }
             });
             return true;
        }

      return true;
    }

    function trefilia(data){
      kgAux = data.kgAux;

      var divselectpu = $("#modal-trefila div.punzon select");
      var number = 8;
      divselectpu.each(function(index, ele) {
        $(this).attr('id', 'mp-'+number+'-'+posicion);
        number++;
      });

      var textareatrefila = $('#modal-trefila textarea');
      textareatrefila.attr('id', 'mp-20-'+posicion);

      var number = 13;
      var inputtrefila = $('#modal-trefila input');
      inputtrefila.each(function(index, ele) {
        $(this).attr('id', 'mp-'+number+'-'+posicion);
        number++;
      }); 

      $("#mp-15-"+posicion).on('change', function(){
        calcRed(kgAux);
        calcEspe();
      });
      

      selectorestrefila();
      $('#mp-0-'+posicion+' option').remove();
      $('#mp-0-'+posicion).append('<option value="0"></option>');
      $('#mp-1-'+posicion+' option').remove();
      $('#mp-1-'+posicion).append('<option value="0"></option>');
      $('#mp-2-'+posicion+' option').remove();
      $('#mp-2-'+posicion).append('<option value="0"></option>');
      $('#mp-3-'+posicion+' option').remove();
      $('#mp-3-'+posicion).append('<option value="0"></option>');
      $('#mp-4-'+posicion+' option').remove();
      $('#mp-4-'+posicion).append('<option value="0"></option>');
      $('#mp-5-'+posicion+' option').remove();
      $('#mp-5-'+posicion).append('<option value="0"></option>');
      $('#mp-6-'+posicion+' option').remove();
      $('#mp-6-'+posicion).append('<option value="0"></option>');
      $('#mp-7-'+posicion+' option').remove();
      $('#mp-7-'+posicion).append('<option value="0"></option>');
      $('#mp-8-'+posicion+' option').remove();
      $('#mp-8-'+posicion).append('<option value="0"></option>');
      $('#mp-9-'+posicion+' option').remove();
      $('#mp-9-'+posicion).append('<option value="0"></option>');

      var tipodematriz = data.tablas.tipomatriz;
      for (var i = 0; i < tipodematriz.length; i++) {
        var e = tipodematriz[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-0-'+posicion).append(opt);
      }

      var material = data.tablas.material;
      for (var i = 0; i < material.length; i++) {
        var e = material[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-1-'+posicion).append(opt);
      }

      var matrizdoble = data.tablas.matrizdoble;
      for (var i = 0; i < matrizdoble.length; i++) {
        var e = matrizdoble[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-2-'+posicion).append(opt);
      }

      var matriztltipo3 = data.tablas.matriztltipo3;
      for (var i = 0; i < matriztltipo3.length; i++) {
        var e = matriztltipo3[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-3-'+posicion).append(opt);
      }

      var matriztltipo4 = data.tablas.matriztltipo4;
      for (var i = 0; i < matriztltipo4.length; i++) {
        var e = matriztltipo4[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-4-'+posicion).append(opt);
      }

      var cabezaturco = data.tablas.cabezaturco;
      for (var i = 0; i < cabezaturco.length; i++) {
        var e = cabezaturco[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-5-'+posicion).append(opt);
      }

      var matrizsimacero = data.tablas.matrizsimacero;
      for (var i = 0; i < matrizsimacero.length; i++) {
        var e = matrizsimacero[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-6-'+posicion).append(opt);
      }

      var matrizsimwidia = data.tablas.matrizsimwidia;
      for (var i = 0; i < matrizsimwidia.length; i++) {
        var e = matrizsimwidia[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-7-'+posicion).append(opt);
      }

      var tipopunzon = data.tablas.tipopunzon;
      for (var i = 0; i < tipopunzon.length; i++) {
        var e = tipopunzon[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-8-'+posicion).append(opt);
      }

      var materialp = data.tablas.material;
      for (var i = 0; i < materialp.length; i++) {
        var e = materialp[i];
        var opt = `<option value="${e.id}">${e.descripcion}</option>`;
        $('#mp-9-'+posicion).append(opt);
      }

    }

    function cerrar() {        
        window.close();
    }

    function calcRed(kgm){
        var d1 = parseFloat($("#mp-14-"+posicion).val(),2);
        var d2 = parseFloat($("#mp-15-"+posicion).val(),2);
        var espes = redondear((d1-d2)/2,2);

        var kgmt = redondear(((d1-espes)*espes)*0.0246,2);

        $("#mp-19-"+posicion).val(redondear((1-(kgmt/1))*100,2));
    }

    function calcEspe(){
        var d1 = parseFloat($("#mp-14-"+posicion).val(),2);
        var d2 = parseFloat($("#mp-15-"+posicion).val(),2);
        var espes = redondear((d1-d2)/2,2);
        $("#mp-17-"+posicion).val(espes);
        //var es = $("#mp-17-"+posicion).val();
        var kgmtc = redondear(((d1-espes)*espes)*0.0246,3);
        $("#mp-18-"+posicion).val(kgmtc);
    }

    function redondear(cantidad,decimales) {
        var cant = parseFloat(cantidad);
        var dec = parseFloat(decimales);
        decimales = (!dec ? 2 : dec);
        return Math.round(cant * Math.pow(10, decimales)) / Math.pow(10, decimales);
    }

    function changematriz(val, number, tipopunzon, kgmcalc){
      var data = null;
      var acero = 0;
      var widia = 0;
      var divselect = $("#modal-trefila div.matriz select");

      divselect.each(function(index, ele) {
        if ($(this).data('f')=='1'){
          $(this).parent('div').hide();
        }
      });

      if (val == '1'){
        var select = 'material';
        if (number !== null){
          var data = number.tipo; //matrizSimAcero
          
          if (number.matrizSimAcero>0)
            acero = 1;

          if (number.matrizSimWidia>0)
            widia = 1;
        }

      }

      if (val == '2'){
        var select = 'matrizdoble';
        if (number !== null)
          var data = number.matrizDoble;
      }

      if (val == '3'){
        var select = 'trilobular';
        if (number !== null)
          var data = number.matrizTL;
      }

      if (val == '4'){
        var select = 'limon';
        if (number !== null)
          var data = number.matrizTL;
      }

      if (val == '5'){
        var select = 'cabeza';
        if (number !== null)
          var data = number.cabezaTurco;
      }


      if (val !== '0')
        $('div #'+select).fadeIn();

      if(acero>0){
        $('div #simacero').fadeIn();
        $('div #simacero option').each(function(index, ele) {
          if ($(this).val()==number.matrizSimAcero){
            $(this).attr('selected', 'selected');
          }
        });

      }

      if(widia>0){
        $('div #simwidia').fadeIn();
        $('div #simwidia option').each(function(index, ele) {
          if ($(this).val()==number.matrizSimWidia){
            $(this).attr('selected', 'selected');
          }
        });
      }

      if (data){
        $('div #'+select+' option').each(function(index, ele) {
          if ($(this).val()==data){
            $(this).attr('selected', 'selected');
          }
        });
      }

      
      $('#mp-8-'+posicion+' option').each(function(index, ele) {
          if ($(this).val()==tipopunzon){
            $(this).attr('selected', 'selected');
          }
      });

      if (tipopunzon==5){
          $("#mp-10-"+posicion).attr('disabled','disabled').val(-1);
          $("#mp-9-"+posicion).attr('disabled','disabled').val(-1);
          //return false;
      }

      if (tipopunzon){
        $('#mp-9-'+posicion+' option').each(function(index, ele) {
          if ($(this).val()==number.matpun){
            $(this).attr('selected', 'selected');
            //changePunzon(0,0,1,number.matpun);
          }
          var matpun2 = 0;
          if (number.matpun2 > 0)
            matpun2 = number.matpun2;

          changePunzon(tipopunzon,number.punzonDoble,9,matpun2, number.matpun, number.punzonid);
        });
      }

      if (number){
        $('#mp-16-'+posicion).val(number.flecha);
        $('#mp-17-'+posicion).val(number.espesor);
        $('#mp-18-'+posicion).val(kgmcalc);
        $('#mp-19-'+posicion).val(number.reduccion);
        $('#mp-20-'+posicion).val(number.observaciones);        
      }


        function changePunzon(dat,idpun,nrop,mat, matpun, idpunzon){
          //este = document.getElementById("tipopunzon");
          var tp = dat;
                 
          if (tp==0)
              tp = $("#mp-8-"+posicion).val();

          if (mat==0)
              mat = $("#mp-"+nrop+"-"+posicion).val();

          if (tp==5){
              $("#mp-10-"+posicion).attr('disabled','disabled').val(-1);
              $("#mp-9-"+posicion).attr('disabled','disabled').val(-1);
              return false;
          }
          else{
              $("#mp-9-"+posicion).removeAttr('disabled');
              $("#mp-10-"+posicion).removeAttr('disabled');
          }
          

          if (tp==4){ // es doble
              tp = 1;
              generatePunzon(mat,idpun);
          }
          else {
              //aqui elimina el otro punzon
            $('div.elemento1 div').remove();
          }          

          var stop = false;
          if (nrop==11){
             
              stop = generatePunzon(mat,idpun);
              
          }


          if (!stop){
                     //divContenido = document.getElementById("selpunzon1");
            $.ajax({
                type: "GET",
                url: "{{route('punzonestrefila')}}",
                data: {
                  'punid': idpunzon,
                  'tipopunzon': tp,
                  'material': matpun,
                  'pDoble': 0
                },
                success: function(data){
                  console.log(data);
                  $('#mp-10-'+posicion).children('option').remove();
                  var list = data.resultado.selector;
                  $('#mp-10-'+posicion).append('<option>Seleccione...</option>');
                  for (var i = 0; i <list.length; i++) {
                    var e = list[i];
                    var opt = `<option value="${e.id}">${e.descripcion}</option>`;
                    $('#mp-10-'+posicion).append(opt);
                  }

                  $('#mp-10-'+posicion+' option').each(function(index, ele) {
                      if ($(this).val()==idpunzon){
                        $(this).attr('selected', 'selected');
                      }
                  });
                }
             });
          }
          return false;
        }

        function generatePunzon(mat,idpun){
             $.ajax({
                type: "GET",
                url: "{{route('punzonestrefila')}}",
                data: {
                  'punid': idpun,
                  'pDoble': 1,
                  'tipopunzon': 1,
                  'material': mat
                },
                success: function(data){
                  if (data.resultado.variables[2] == '1'){ //si es doble
                    $('div.elemento1 div').remove();
                    console.log("entro");
                    var np = `
                            <div class="x_title">
                              <h2>Punzón 2</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="row punzon2">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Material Punzón</label>
                                <select data-f="0" id="mp-11-${posicion}" class="form-control">
                                  
                                </select>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="control-label" for="first-name">Punzón</label>
                                <select data-f="0" id="mp-12-${posicion}" class="form-control">
                                  
                                  
                                </select>
                              </div>
                            </div>
                             `;

                    $('div.elemento1').append(np);

                    $('#mp-11-'+posicion).on('click', function(){
                      changePunzon(0,0,11,0);
                    });

                    $('#mp-11-'+posicion).children('option').remove();
                    $('#mp-11-'+posicion).append('<option></option>');

                    for (var i = 0; i < data.resultado.selector.length; i++) {
                      var e = data.resultado.selector[i];
                      var opt = `<option value="${e.id}">${e.descripcion}</option>`;
                      $('#mp-11-'+posicion).append(opt);
                      $('#mp-11-'+posicion).val(data.resultado.variables[0]);
                    }

                    $('#mp-12-'+posicion).children('option').remove();
                    $('#mp-12-'+posicion).append('<option>Seleccione...</option>');

                    for (var i = 0; i < data.resultado.punzon.length; i++) {
                      var e = data.resultado.punzon[i];
                      var opt = `<option value="${e.id}">${e.descripcion}</option>`;
                      $('#mp-12-'+posicion).append(opt);
                      //$('#mp-12-'+posicion).val(data.resultado.variables[0]);
                    }

                    $('#mp-12-'+posicion+' option').each(function(index, ele) {
                        if ($(this).val()==idpun){
                          $(this).attr('selected', 'selected');
                        }
                    });

                  }
                  return;
            }
             });
             return true;
        }
    }

    function sel_entrega(tipo){
      if (tipo==2){
          $("#modal-entrega div.otrasdir").css("display", "block");
      }
      else{
          $("#modal-entrega div.otrasdir").css("display", "none");
          $('#mp-1-'+posicion).val("");
          $('#mp-3-'+posicion).val("");       
      }
    }

    function updateposition(){
      $('#insertproceso li').each(function( index ) {
        $( this ).data('delete', index);
        var p = $(this).children('div').children('div').children('button.ico-trash');
        p.data('delete', index);
      });
      obtenerElementos(cotizacion);

    }

    sortable();

    function sortable(){
      $('#insertproceso').sortable({
                     update: function(event, ui) {
                        var productOrder = $(this).sortable('toArray').toString();
                        updateposition();
                        //$("#sortable-9").text (productOrder);
                     }
                  });      
    }


  });
</script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
@endsection