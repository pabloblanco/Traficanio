@extends('layouts.app')

@section('content')

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
<!-- /modals eliminar norma-->
<!--  modal modifcar  -->


<!--  modal Bucar Medida-->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-contacto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Contacto</h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <form autocomplete="off">
          <div class="form-group">
            <div class="row contactosform">
                  
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Contacto</label>
                <input type="text" id="contactoadd" class="form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Email</label>
                <input type="email" id="emailadd" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Celular</label>
                <input type="text" id="celularadd" class="form-control col-md-7 col-xs-12">
              </div>

            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
        <a id="addcontacto" class="btn btn-primary">Añadir</a>
      </div>
    </div>
  </div>
</div>
<!-- /cerrar modals Bucar Medida-->

<!--  modal Bucar Direcciones-->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-direcciones">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Direccion</h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <form autocomplete="off">
          <div class="form-group">
            <div class="row direccionform">
                  
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Direccion</label>
                <input type="text" id="direcciondadd" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Contacto</label>
                <input type="text" id="contactodadd" class="form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Telefono 1</label>
                <input type="text" id="telefonodadd" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Telefono 2</label>
                <input type="text" id="telefono2dadd" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Horario de Recepcion</label>
                <input type="text" id="recepciondadd" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Localidad</label>
                <input list="localidades-dir" type="text" id="localidaddadd" class="form-control col-md-7 col-xs-12 js-typeahead-dir">
                <datalist id="localidades-dir">
                    
                </datalist>
              </div>


            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
        <a id="adddireccion" class="btn btn-primary">Añadir</a>
      </div>
    </div>
  </div>
</div>
<!-- /cerrar modals Bucar Direcciones-->


<!--  modal Bucar Transportes-->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-tranexis">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Transporte</h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <form autocomplete="off">
          <div class="form-group">
            <div class="row direccionform">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Razon</label>
                <input type="text" id="razontran" class="form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Direccion</label>
                <input type="text" id="direcciontran" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Codigo Postal</label>
                <input type="text" id="codigopostaltran" class="form-control col-md-7 col-xs-12">
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Email</label>
                <input type="email" id="emailtran" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Contacto</label>
                <input type="text" id="contactotran" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Telefono 1</label>
                <input type="text" id="telefonotran" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Telefono 2</label>
                <input type="text" id="telefono2tran" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Telefono 3</label>
                <input type="text" id="telefono3tran" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Celular</label>
                <input type="text" id="celulartran" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Celular</label>
                <input type="text" id="celular2tran" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Horario de Recepcion</label>
                <input type="text" id="recepciontran" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Localidad</label>
                <input type="text" id="localidadtran" class="form-control col-md-7 col-xs-12">
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" >Observaciones</label>
                <textarea id="observaciontran" class="text-area"></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- /cerrar modals Bucar Transportes-->

<!--  modal Confirmar Transporte -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-confirmartransporte">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h5 class="modal-title" id="myModalLabel2">¿Desea agregar este transporte?</h5>
      </div>
      
      <div class="modal-footer">
        <button id="confirmtrans" type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" id="canceltrans" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- /modals Confirmar Transporte-->


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-clientemod">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel2">Modificar</h4>
			</div>
			<div class="modal-body cuerpo-modal">
				<form id="formclientem" data-parsley-validate class="form-horizontal form-label-left">

						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Razón Social</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Domicilio</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Nombre Fantasía</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Codigo Postal</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">CUIT</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Localidad</label>
								<input list="localidades-m" data-localid="" type="text" id="" class="form-control col-md-7 col-xs-12 js-typeahead-m" autocomplete="off">
                <datalist id="localidades-m">
                    
                </datalist>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Codigo CLiente</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Sitio Web</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">IIBB</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Horario Recepcion</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Zona</label>
								<select id="" class="form-control" required>
									<option></option>
									@foreach ($zonas as $zona)
										<option value="{{$zona->id}}">{{$zona->descripcion}}</option>
									@endforeach
									
								</select>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Rubro</label>
								<select id="" class="form-control" required>
									<option></option>
									@foreach ($rubros as $rubro)
										<option value="{{$rubro->id}}">{{$rubro->descripcion}}</option>
									@endforeach
								</select>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label class="control-label" for="first-name">Condicion Venta</label>
								<select id="" class="form-control" required>
									<option></option>
									@foreach ($condiciones as $rubro)
										<option value="{{$rubro->id}}">{{$rubro->descripcion}}</option>
									@endforeach									
								</select>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label class="control-label" for="first-name">Observaciones</label>
								<textarea  class="text-area">
									
								</textarea>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <label class="checkbox">Activo
							    <input type="checkbox">
							    <span class="check"></span>
							  </label>
							</div>
						</div>
				</form>

				<form id="formcontactosm">
					<div class="x_title">
					  <h2>Contactos</h2>
					  <div class="clearfix"></div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label" for="first-name">Contactos:</label>
							<a href="#" id="agregarcontactom">Agregar +</a>								
						</div>						
						<div class="x_content tableconm">
						  
						</div>
					</div>
				</form>
				<form id="formdireccionm">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label" for="first-name">Direcciones:</label>
							<a id="agregardireccionesm" href="#">Agregar +</a>								
						</div>	
						<div class="x_content tabledicm">
						  
						</div>					
					</div>
				</form>
				<form id="formtelefonosm">
					<div class="x_title">
					  <h2>Telefonos</h2>
					  <div class="clearfix"></div>
					</div>
					<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Telefono</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12 phone">					
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Fax</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">					
							</div>							
					</div>
					<div class="row buttonadd">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<a id="agregartelefonom" href="#">Mas Telefonos +</a>								
						</div>							
					</div>				
				</form>

				<form id="formtransportem">
						<div class="x_title">
						  <h2>Transportes</h2>
						  <div class="clearfix"></div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Existente:</label>
								<select id="transportem" class="form-control">
									<option></option>
									@foreach ($transportes as $transporte)
										<option value="{{$transporte->id}}">{{$transporte->razon}}</option>
									@endforeach									
								</select>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<a href="#" id="agregartransportem">Agregar +</a>								
							</div>
							<div class="x_content tabletransm">
							  
							</div>								
						</div>
					
				</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary guardar">Guardar</button>
				</div>

			</div>

		</div>
	</div>
</div>
<!-- /modals modificar-->

<!--  modal Agregar Cliente-->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-clienteadd">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel2">Agregar Cliente</h4>
			</div>
			<div class="modal-body cuerpo-modal">
				<form id="formcliente" data-parsley-validate class="form-horizontal form-label-left">

					<div class="form-group">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Razón Social</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Domicilio</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Nombre Fantasía</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Codigo Postal</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">CUIT</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div> 
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Localidad</label>
								<input list="localidades" data-localid="" type="text" id="" class="form-control col-md-7 col-xs-12 js-typeahead" autocomplete="off">
                <datalist id="localidades">
                    
                </datalist>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Codigo CLiente</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Sitio Web</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">IIBB</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Horario Recepcion</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Zona</label>
								<select id="" class="form-control" required>
									<option></option>
									@foreach ($zonas as $zona)
										<option value="{{$zona->id}}">{{$zona->descripcion}}</option>
									@endforeach
									
								</select>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Rubro</label>
								<select id="" class="form-control" required>
									<option></option>
									@foreach ($rubros as $rubro)
										<option value="{{$rubro->id}}">{{$rubro->descripcion}}</option>
									@endforeach
								</select>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label class="control-label" for="first-name">Condicion Venta</label>
								<select id="" class="form-control" required>
									<option></option>
									@foreach ($condiciones as $rubro)
										<option value="{{$rubro->id}}">{{$rubro->descripcion}}</option>
									@endforeach									
								</select>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label class="control-label" for="first-name">Observaciones</label>
								<textarea  class="text-area">
									
								</textarea>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <label class="checkbox">Activo
							    <input type="checkbox">
							    <span class="check"></span>
							  </label>
							</div>
						</div>
				</form>
				

				</div>
				<form id="formcontactos">
					<div class="x_title">
					  <h2>Contactos</h2>
					  <div class="clearfix"></div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label" for="first-name">Contactos:</label>
							<a href="#" id="agregarcontacto">Agregar +</a>								
						</div>						
						<div class="x_content tablecon">
						  
						</div>
					</div>
				</form>
				<form id="formdireccion">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<label class="control-label" for="first-name">Direcciones:</label>
							<a id="agregardirecciones" href="#">Agregar +</a>								
						</div>	
						<div class="x_content tabledic">
						  
						</div>					
					</div>
				</form>
				<form id="formtelefonos">
					<div class="x_title">
					  <h2>Telefonos</h2>
					  <div class="clearfix"></div>
					</div>
					<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Telefono</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12 phone">					
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Fax</label>
								<input type="text" id="" class="form-control col-md-7 col-xs-12">					
							</div>							
					</div>
					<div class="row buttonadd">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<a id="agregartelefono" href="#">Mas Telefonos +</a>								
						</div>							
					</div>				
				</form>
				<form id="formtransporte">
						<div class="x_title">
						  <h2>Transportes</h2>
						  <div class="clearfix"></div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<label class="control-label" for="first-name">Existente:</label>
								<select id="transporteadd" class="form-control">
									<option></option>
									@foreach ($transportes as $transporte)
										<option value="{{$transporte->id}}">{{$transporte->razon}}</option>
									@endforeach									
								</select>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<a href="#" id="agregartransporte">Agregar +</a>								
							</div>
							<div class="x_content tabletrans">
							  
							</div>								
						</div>
					
				</form>
				<div class="modal-footer">
					<button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary guardar">Guardar</button>
				</div>

			</div>

		</div>
	</div>
</div>

<!-- Fin de las ventanas modales-->


<div class="right_col" role="main">



	<div class="">  

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
            <div class="row">
              <div class="col-md-2 col-sm-2 col-xs-2">
                <h2>Búsqueda De Cliente</h2>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-1">
                <ul class="nav navbar-right panel_toolbox">
                  <li class="">
                    <button type="button" id="addcliente" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-clienteadd">Agregar Cliente</button>
                  </li>
                </ul>
              </div>
                <div class="col-md-1">
                  <button id="modcliente" type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-clientemod">Modificar</button>
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
						<form id="demo-form2" autocomplete="off" data-parsley-validate class="form-horizontal form-label-left">

							<div class="form-group">
								<div class="row">
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="control-label" for="first-name">Razón Social</label>
										<input type="text" id="razonup" class="form-control col-md-7 col-xs-12">
									</div> 
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="control-label" for="first-name">CUIT</label>
										<input type="text" id="cuitup" class="form-control col-md-7 col-xs-12">
									</div> 
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="control-label" for="first-name">Nombre Fantasía</label>
										<input type="text" id="nombrefantasiaup" class="form-control col-md-7 col-xs-12">
									</div>


								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="control-label" for="first-name">Localidad</label>
										<input type="text" id="localidadup" class="form-control col-md-7 col-xs-12">
									</div>

									<div class="col-md-6 col-sm-6 col-xs-12">
										<label class="control-label" for="first-name">Zona</label>
										<select id="zonaup" class="form-control" required>
											<option></option>
											@foreach ($zonas as $zona)
												<option value="{{$zona->id}}">{{$zona->descripcion}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-12">	  				<label class="checkbox">Activo
										<input type="checkbox" id="activoup">
										<span class="check"></span>
									</label>

								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 ">

									<a id="buscarcliente" type="" class="btn btn-primary  btn-sm">Buscar</a>
									<button type="" class="btn btn-success  btn-sm">Limpiar</button>
								</div>
							</div>
						</form>
						<div class="col-md-4 col-sm-4 col-xs-12">

						</div>
						
						<div class="clearfix"></div>
						<div class="x_content">
							<div class="row">
								<div class="">
									<table id="datatable-cliente" class="table table-striped table-bordered table-hover" style="width: 100%">
										<thead>
											<tr>
												<th>Razón Social</th>
												<th>Telefono</th>
												<th>Nombre</th>
												<th>Lugar</th>
												<th>Zona</th>
											</tr>
										</thead>
										<tbody>
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
<!-- /page content -->


@endsection


@section('js_extra')
<script src="{{ asset ('dependencias/jquery.numeric.min.js') }}"></script>

<script type="text/javascript">
  $(function(){

  	/// MODFIFICAR CLIENTE ///
  	var idSeleccionado = 0;
  	var accion = 'N';
    var cerrar = 0;
    var mc = null;

  	var table = $("#datatable-cliente").DataTable({
  	  "language": {
  	        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
  	    }
  	});

  	$('table').on('click', 'tr', function(){
  	  idSeleccionado = $(this).data('id');

  	  if($(this).hasClass('selected-table')){
  	    $(this).removeClass('selected-table');
  	  }else{
  	    $("tbody tr.selected-table").removeClass('selected-table');
  	    $(this).addClass('selected-table');
  	  }

  	});

  	$('#modcliente').click(function(){
  		accion = "M";
  	  datacliente(idSeleccionado);
  	});

  	$('#addcliente').click(function(){
  		accion = "N";
  	});

  	function datacliente(id){

  		$.ajax({  
  		  type: "get",
  		  url: "{{route('getcliente')}}",
  		  data: {
  		  	'id': id
  		  },
  		  success: function(data){
  		  	asignaridmodalmodificar(data);
  		   	
  		  }
  		});

  	}

  	function asignaridmodalmodificar(results){
  		//cliente de prueba= 132132 (razon)
  		var data_cliente = results.cliente;
  		var data_contacto = results.contactos;
  		var data_direccion = results.direcciones;
  		var data_transporte = results.transportes;
  		var tlf = data_cliente.telefonos;
  		var tlfs_array = tlf.split("/");
  		for (var i=0; i<tlfs_array.length; i++) {
  			var div = `
  					<div class="row">
  						<div class="col-md-4 col-sm-4 col-xs-12">
  							<label class="control-label" for="first-name">Telefono</label>
  							<input type="text" id="" class="form-control col-md-7 col-xs-12 phone">					
  						</div>
  						<div class="col-md-4 col-sm-4 col-xs-12">
  							<label class="control-label" for="first-name">Fax</label>
  							<input type="text" id="" class="form-control col-md-7 col-xs-12">					
  						</div>						
  					</div>
  					`;

  			$('#formtelefonosm div.buttonadd').before(div);

  		}

  		var formclienteinput = $('#formclientem input');
  		formclienteinput.each(function(index, ele) {
  			$(this).attr('id', 'fcmi-'+index);
  			$(this).val("");
  			if ($(this).attr('type')=="checkbox")
  				$(this).prop('checked', false);
  		  
  		});


  		var formclienteselect = $('#formclientem select');
  		formclienteselect.each(function(index, ele) {
  			$(this).attr('id', 'fcms-'+index);
  			$(this).val("");  		  
  		});

  		var formclientetextarea = $('#formclientem textarea');
  		formclientetextarea.each(function(index, ele) {
  			$(this).attr('id', 'fcmt-'+index);
  			$(this).val("");  		  
  		});

  		asignardatamodalmodificar(data_cliente)

  		$('#formcontactosm div.tableconm table').remove();
  		if (data_contacto.length>0)
  			asignarmodalmodificarcontacto(data_contacto);

  		$('#formdireccionm div.tabledicm table').remove();
  		if (data_direccion.length>0)
  			asignarmodalmodificardirecciones(data_direccion);

  		$('#formtransportem div.tabletransm table').remove();
  		if (data_transporte.length>0)
  			asignarmodalmodificartransporte(data_transporte);

  		$('#formtelefonosm div.buttonadd').siblings('div').remove();

  		if (tlf == "" || tlf == null)
  			addtlfmodificar();

  		for (var i=0; i<tlfs_array.length; i++) {
  			if (tlfs_array[i] !== ""){
	  			var div = `
	  					<div class="row">
	  						<div class="col-md-4 col-sm-4 col-xs-12">
	  							<label class="control-label" for="first-name">Telefono</label>
	  							<input type="text" id="" value="${tlfs_array[i]}" class="form-control col-md-7 col-xs-12 phone">					
	  						</div>
	  						<div class="col-md-4 col-sm-4 col-xs-12">
	  							<label class="control-label" for="first-name">Fax</label>
	  							<input type="text" id="" class="form-control col-md-7 col-xs-12">					
	  						</div>						
	  					</div>
	  					`;

	  			$('#formtelefonosm div.buttonadd').before(div);  				
  			}

  		}
  	}

  	function addtlfmodificar(){
  		var div = `
  				<div class="row">
  					<div class="col-md-4 col-sm-4 col-xs-12">
  						<label class="control-label" for="first-name">Telefono</label>
  						<input type="text" id="" value="" class="form-control col-md-7 col-xs-12 phone">					
  					</div>
  					<div class="col-md-4 col-sm-4 col-xs-12">
  						<label class="control-label" for="first-name">Fax</label>
  						<input type="text" id="" class="form-control col-md-7 col-xs-12">					
  					</div>						
  				</div>
  				`;

  		$('#formtelefonosm div.buttonadd').before(div);
  	}

  	function asignarmodalmodificarcontacto(data){
  		if($('#formcontactosm div.tableconm table').length == 0)
  			inserttablecontactosm();

  		var index = $('#formcontactosm div.tableconm table tbody tr').length;  

  		for (var i=0; i<data.length; i++) {
	  		var tr = `<tr data-identi="${i}" data-contacto="${data[i].contacto}" data-email="${data[i].email}" data-celular="${data[i].celular}">
								<td data-contacto="${data[i].contacto}">${data[i].contacto}</td>
								<td data-email="${data[i].email}">${data[i].email}</td>
								<td data-celular="${data[i].celular}">${data[i].celular}</td>
                <td><a data-identi="${index}" class="btn btn-primary btn-edit btn-sm js-edit"><i class="fa fa-edit"></i></a></td> 
								<td><button data-identi="${i}"" class="btn btn-primary btn-eliminar btn-sm js-eliminar"><i class="fa fa-trash"></i></a></td>						    		
							  </tr>`;

			$('#tbodycontactom').append(tr);
  		}

  		$('#tbodycontactom tr button').on('click', function(){
  			$(this).parents('tr').remove();

  			var index = $('#formcontactosm div.tableconm table tbody tr').length; 
  			if (index == 0)
  				$('#formcontactosm div.tableconm table').remove();
  		});

      var buttonedit = $('#tbodycontactom tr a.js-edit');

      buttonedit.on('click', function(){ 
        var tr = $(this).parents('tr');
        var contacto = tr.data('contacto');
        var email = tr.data('email');
        var celular = tr.data('celular');
        $('#contactoadd').val(contacto);
        $('#emailadd').val(email);
        $('#celularadd').val(celular);
        modalcontacto();
        mc = tr.data('identi');
      });

  	}

  	function asignarmodalmodificardirecciones(data){
  		if($('#formdireccionm div.tabledicm table').length == 0)
  			inserttabledireccionm();

  		var index = $('#formdireccionm div.tabledicm table tbody tr').length;

  		for (var i=0; i<data.length; i++) {
  			if (data[i].localidadid == null)
  				data[i].localidadid = "";

  			if (data[i].telefono == null)
  				data[i].telefono = "";

  			if (data[i].telefono2 == null)
  				data[i].telefono2 = "";

  			if (data[i].horarioRecepcion == null)
  				data[i].horarioRecepcion = "";

  			var tr = `<tr data-identi="${i}">
							<td data-direccion="${data[i].direccion}">${data[i].direccion}</td>
							<td data-contacto="${data[i].contacto}">${data[i].contacto}</td>
							<td data-t1="${data[i].telefono}">${data[i].telefono}</td>
							<td data-recepcion="${data[i].horarioRecepcion}">${data[i].horarioRecepcion}</td>
							<td data-localidad="${data[i].localidadid}">${data[i].localidadid}</td>
							<td><a data-identi="${i}" class="btn btn-primary btn-eliminar btn-sm js-eliminar"><i class="fa fa-trash"></i></a></td>						    		
						  </tr>`;

			$('#tbodydireccionm').append(tr);	  		
  		}

  		$('#tbodydireccionm tr a').on('click', function(){
  			$(this).parents('tr').remove();

  			var index = $('#formdireccionm div.tabledicm table tbody tr').length; 
  			if (index == 0)
  				$('#formdireccionm div.tabledicm table').remove();
  		});


  	}

  	function asignarmodalmodificartransporte(data){
  		//var index = $('#formtransportem div.tabletransm table tr').length;
  		// if (index == 0)
  		tabletransportemod();

  		for (var i=0; i<data.length; i++) {
  			if (data[i] !== null){
	  			var tr = `<tr data-identi="${i}" data-id="${data[i].id}" data-razon="${data[i].razon}" data-contacto="${data[i].contacto}" data-celular="${data[i].celular}" data-codigopostal="${data[i].codigoPostal}" data-direccion="${data[i].direccion}" data-email="${data[i].email}" data-fax="${data[i].fax}" data-horario="${data[i].horarioRecepcion}" data-localidadid="${data[i].localidadid}" data-observaciones="${data[i].observaciones}" data-telefono1="${data[i].telefono1}" data-telefono2="${data[i].telefono2}" data-telefono3="${data[i].telefono3}">
						<td data-razon="${data[i].razon}">${data[i].razon}</td>
						<td><a href="#"><i class="fa fa-eye"></i></a></td>
						<td><button data-identi="${i}"" class="btn btn-primary btn-eliminar btn-sm js-eliminar"><i class="fa fa-trash"></i></a></td>						    		
					  </tr>`;

					$('#tbodytransportem').append(tr);
          
  			}
  		}

  		$('#tbodytransportem tr button').on('click', function(){
  			$(this).parents('tr').remove();
  			var index = $('#formtransporte div.tabletrans table tbody tr').length; 
  			var tt = $('#formtransporte div.tabletrans table');							

  			if (accion == "M"){
  				var index = $('#formtransportem div.tabletransm table tbody tr').length; 
  				var tt = $('#formtransportem div.tabletransm table');
  			}

  			if (index == 0)
  				tt.remove();
		  });

		$('#formtransportem div.tabletransm table tbody tr a').on('click', function(){
			var attrdata = $(this).parent('td').parent('tr');
			console.log("entro");
			cargarmodaltransporte(attrdata);
		});

		return true;
  	}

  	function tabletransportemod(){
		var lengtrans = $('#formtransportem div.tabletransm');
		var tbody = "tbodytransportem";

  		var table =  `<table id="datatable-transporte" class="table table-stripped table-bordered">
					    <thead>
					      <tr>
					        <th>Nombre de Transporte</th>
					        <th>Ver Transporte</th>
					        <th>Eliminar</th>
					      </tr>
					    </thead>
					    <tbody id="${tbody}">
		  	
					    </tbody>
					  </table> `;


  		lengtrans.append(table);

  		return true;
  	}


  	function asignardatamodalmodificar(data){
  		$('#fcmi-0').val(data.razon);
  		$('#fcmi-1').val(data.domicilio);
  		$('#fcmi-2').val(data.nombreFantasia);
  		$('#fcmi-3').val(data.codigoPostal);
  		$('#fcmi-4').val(data.cuit);
  		//$('#fcmi-5').val(data.localidadid);
  		$('#fcmi-6').val(data.codigo);
  		$('#fcmi-7').val(data.sitioWeb);
  		$('#fcmi-8').val(data.IIBB);
  		$('#fcmi-9').val(data.horarioRecepcion);
  		$('#fcms-0').val(data.zonaid);
  		$('#fcms-1').val(data.rubroid);
  		$('#fcms-2').val(data.condicionVenta); 
  		$('#fcmt-0').val(data.observaciones);
  		if (data.activo == 1)
  			$('#fcmi-10').prop('checked', true);

      $('#fcmi-5').val(data.Lugar);
      $('#localidades-m option').remove();

      if (data.localidadid > 0 && data.localidadid !== null){
        $('#localidades-m').append('<option data-value="'+data.localidadid+'"></option>');
      }
  	}

  	function inserttablecontactosm(){
  		var table =  `<table id="datatable-productos" class="table table-stripped table-bordered">
						    <thead>
						      <tr>
						        <th>Contacto</th>
						        <th>Email</th>
						        <th>Celular</th>
                    <th>Editar</th>
						        <th>Eliminar</th>
						      </tr>
						    </thead>
						    <tbody id="tbodycontactom">
						    	
						    </tbody>
						  </table> `;

  				$('#formcontactosm div.tableconm').append(table);
  			return true;
  	}

  	function inserttabledireccionm(){
  			var table =  `<table id="datatable-direccionm" class="table table-stripped table-bordered">
						    <thead>
						      <tr>
						        <th>Direccion</th>
						        <th>Contacto</th>
						        <th>Telefonos</th>
						        <th>Horario de Recepcion</th>
						        <th>Localidad</th>
						        <th>Eliminar</th>
						      </tr>
						    </thead>
						    <tbody id="tbodydireccionm">
						    	
						    </tbody>
						  </table> `;

  				$('#formdireccionm div.tabledicm').append(table);
  			return true;
  	}

  	$('#agregarcontactom').click(function(){
  	  modalcontacto();
  	});

  	$('#agregardireccionesm').click(function(){
  	  modaldireccion();
  	});

  	$(document).on('click', '#agregartelefonom', function(){
  	  addtlfmodificar();
  	});

  	$('#transportem').on('change', function(){
  		if ($('#transportem').val()>0){
  			$('#modal-clientemod').modal('hide');
  			$('#modal-confirmartransporte').modal({show:true});
  			setTimeout(cjeck, 500);
  		}
  	});

  	$('#agregartransportem').on('click', function(){
  		limpiarmodaltransporte();
  		abrirmodalvertran(1);
  	});

  	///END MODIFICAR CLIENTE ///




  	/// MODAL AGREGAR CLIENTE ///
  		var idfinal = 0;
  		var acmod = 'A';

  		var formclienteinput = $('#formcliente input');
  		formclienteinput.each(function(index, ele) {
  			$(this).attr('id', 'fci-'+index);
  		  
  		});

  		var formclienteselect = $('#formcliente select');
  		formclienteselect.each(function(index, ele) {
  			$(this).attr('id', 'fcs-'+index);
  		  
  		});

  		var formclientetextarea = $('#formcliente textarea');
  		formclientetextarea.each(function(index, ele) {
  			$(this).attr('id', 'fct-'+index);
  		  
  		});

  		$('#agregarcontacto').click(function(){
  		  modalcontacto();
  		});

  		$('#agregardirecciones').click(function(){
  		  modaldireccion();
  		});

  		$('#addcontacto').click(function(){
  		  $('#modal-contacto').modal('hide');
  		  if (accion == "M"){
  		  	reabrirmodcliente();
  		  }
  		  else{
  		  	reabriraddcliente();
  		  }

     		listconstactos();         
  		});

  		$('#adddireccion').click(function(){
  		  $('#modal-direcciones').modal('hide');
  		  if (accion == "M"){
  		  	reabrirmodcliente();
  		  }
  		  else{
  		  	reabriraddcliente();
  		  }
  		  listdirecciones();
  		});

  		$('#modal-contacto button.btn-delete').click(function(){
        limpiarformcontacto();
        cerrar = 1;
  		  if (accion == "M"){
  		  	reabrirmodcliente();
  		  }
  		  else{
  		  	reabriraddcliente();
  		  }
  		});

  		$('#modal-direcciones button.btn-delete').click(function(){
        cerrar = 1;
        limpiarformdireccion();
  			if (accion == "M"){
  				reabrirmodcliente();
  			}
  			else{
  				reabriraddcliente();
  			}
  		});

  		function reabriraddcliente(){
  		  $('#modal-clienteadd').modal('show');
  		  setTimeout(cjeck, 500);      
  		}

  		function reabrirmodcliente(){
  		  $('#modal-clientemod').modal('show');
  		  setTimeout(cjeck, 500);      
  		}

  		function modalcontacto(){
  		  if (accion == "M"){
  		  	$('#modal-clientemod').modal('hide');
  		  }
  		  else{
  		  	$('#modal-clienteadd').modal('hide'); 	
  		  }
  		  //Cierra el de cotizacion y abre el de producto
  		  $('#modal-contacto').modal({show:true});
  		  setTimeout(cjeck, 500);
  		}

  		function modaldireccion(){
  		  //Cierra el de cotizacion y abre el de producto
  		  if (accion == "M"){
  		  	$('#modal-clientemod').modal('hide');
  		  }
  		  else{
  		  	$('#modal-clienteadd').modal('hide'); 	
  		  }

  		  //$('#modal-clienteadd').modal('hide');
  		  $('#modal-direcciones').modal({show:true});
  		  setTimeout(cjeck, 500);
  		}

  		function cjeck(){
  		  $('body').addClass("modal-open");

  		}

  		function listdirecciones(){
  				if (accion == "M"){
  					var index = $('#formdireccionm div.tabledicm table tbody tr').length; 
  					if ($('#formdireccionm div.tabledicm table').length == 0)
  						inserttabledireccionm();

  					var tbodyappend = $('#tbodydireccionm');
  				}
  				else{
  					var index = $('#formdireccion div.tabledic table tbody tr').length;  
  					if ($('#formdireccion div.tabledic table').length == 0)
	  					inserttabledireccion();

  					var tbodyappend = $('#tbodydireccion');
  				}

  				var direccion = $('#direcciondadd').val();
  				var contacto = $('#contactodadd').val();
  				var t1 = $('#telefonodadd').val();
  				var t2 = $('#telefono2dadd').val();
  				var recepcion = $('#recepciondadd').val();
          var localidad = $('#localidaddadd').val();
          var localidadid = $('#localidades-dir option[value="'+localidad+'"]').data('value');
          var index = $('#formdireccion div.tabledic table tbody tr').length;  

  				var tr = `<tr data-identi="${index}">
							<td data-direccion="${direccion}">${direccion}</td>
							<td data-contacto="${contacto}">${contacto}</td>
							<td data-t1="${t1}">${t1}</td>
							<td data-recepcion="${recepcion}">${recepcion}</td>
							<td data-localidad="${localidadid}">${localidad}</td>
              <td><a data-identi="${index}" class="btn btn-primary btn-eliminar btn-sm js-eliminar"><i class="fa fa-trash"></i></a></td>						    		
						  </tr>`;

				tbodyappend.append(tr);	

				if (accion == "M"){
					var tbodybutton = $('#tbodydireccionm tr a.js-eliminar');
				}
				else{
					var tbodybutton = $('#tbodydireccion tr a.js-eliminar');
				}

				tbodybutton.on('click', function(){
					$(this).parents('tr').remove();

					if (accion == "M"){
						var formremove = $('#formdireccionm div.tabledicm table');
						var index = $('#formdireccionm div.tabledicm table tbody tr').length; 						
					}
					else{
						var formremove = $('#formdireccion div.tabledic table');
						var index = $('#formdireccion div.tabledic table tbody tr').length; 						
					}

					if (index == 0)
						formremove.remove();
				});	

				limpiarformdireccion();
  			return true;
  		}

  		function listconstactos(){
          var tr_edit = $("#formcontactos table tbody tr[data-identi="+mc+"]");
          if (accion == "M"){
            var index = $('#formcontactosm div.tableconm table tbody tr').length; 
            if ($('#formcontactosm div.tableconm table').length == 0)
              inserttablecontactosm();

            var tbodyappend = $('#tbodycontactom');
            tr_edit = $("#formcontactosm table tbody tr[data-identi="+mc+"]");
          }
          else{
            var index = $('#formcontactos div.tablecon table tbody tr').length;  
            if ($('#formcontactos div.tablecon table').length == 0)
              inserttablecontactos();

            var tbodyappend = $('#tbodycontacto');
          }


          var contacto = $('#contactoadd').val();
          var email = $('#emailadd').val();
          var celular = $('#celularadd').val();
                  
          if (mc !== null){//Modifica
            tr_edit.data('email', email);
            tr_edit.data('contacto', contacto);
            tr_edit.data('celular', celular);
            var tds = tr_edit.children('td');
            var tdcontacto = tds.eq(0);
            var tdemail = tds.eq(1);
            var tdcelular = tds.eq(2);
            tdcontacto.text(contacto);
            tdemail.text(email);
            tdcelular.text(celular);
            mc = null;
          }
          else{// Inserta
            var tr = `<tr data-identi="${index}" data-email="${email}" data-contacto="${contacto}" data-celular="${celular}">
                <td data-contacto="${contacto}">${contacto}</td>
                <td data-email="${email}">${email}</td>
                <td data-celular="${celular}">${celular}</td>
                <td><a data-identi="${index}" class="btn btn-primary btn-edit btn-sm js-edit"><i class="fa fa-edit"></i></a></td> 
                <td><a data-identi="${index}" class="btn btn-primary btn-eliminar btn-sm js-eliminar"><i class="fa fa-trash"></i></a></td>                    
                </tr>`;

            tbodyappend.append(tr);            
          }


        var buttonedit = $('#tbodycontacto tr a.js-edit');
        if (accion == "M"){
					var tbodybutton = $('#tbodycontactom tr a.js-eliminar');
          buttonedit = $('#tbodycontactom tr a.js-edit');
				}
				else{
					var tbodybutton = $('#tbodycontacto tr a.js-eliminar');
        }
        buttonedit.on('click', function(){ 
            var tr = $(this).parents('tr');
            var contacto = tr.data('contacto');
            var email = tr.data('email');
            var celular = tr.data('celular');
            $('#contactoadd').val(contacto);
            $('#emailadd').val(email);
            $('#celularadd').val(celular);
            modalcontacto();
            mc = tr.data('identi');
          });

				
        tbodybutton.on('click', function(){
					$(this).parents('tr').remove();

					if (accion == "M"){
						var formremove = $('#formcontactosm div.tableconm table');
						var index = $('#formcontactosm div.tableconm table tbody tr').length; 						
					}
					else{
						var formremove = $('#formcontactos div.tablecon table');
						var index = $('#formcontactos div.tablecon table tbody tr').length; 						
					}

					if (index == 0)
						formremove.remove();
				});
  				limpiarformcontacto();
  		}

  		function inserttablecontactos(){
  			var table =  `<table id="datatable-productos" class="table table-stripped table-bordered">
						    <thead>
						      <tr>
						        <th>Contacto</th>
						        <th>Email</th>
						        <th>Celular</th>
                    <th>Editar</th>
						        <th>Eliminar</th>
						      </tr>
						    </thead>
						    <tbody id="tbodycontacto">
						    	
						    </tbody>
						  </table> `;

  				$('#formcontactos div.tablecon').append(table);
  			return true;
  		}

  		function inserttabledireccion(){
  			var table =  `<table id="datatable-direccion" class="table table-stripped table-bordered">
						    <thead>
						      <tr>
						        <th>Direccion</th>
						        <th>Contacto</th>
						        <th>Telefono 1</th>
						        <th>Horario de Recepcion</th>
						        <th>Localidad</th>
						        <th>Eliminar</th>
						      </tr>
						    </thead>
						    <tbody id="tbodydireccion">
						    	
						    </tbody>
						  </table> `;

  				$('#formdireccion div.tabledic').append(table);
  			return true;
  		}

      $('#emailadd').on('change', function(){
        if(validemailadd($(this)) == false){
          $.toast({ 
            text : "Formato Invalido", 
            showHideTransition : 'slide',  
            bgColor : 'red',              
            textColor : '#eee',            
            allowToastClose : false,     
            hideAfter : 3000,              
            stack : 5,                    
            textAlign : 'left',            
            position : 'top-right'       
          });
          $(this).val("");
          $(this).focus();
        }
      });

      function validemailadd(ele){
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

            if (regex.test(ele.val().trim())) {
                return true;

            } else {
                return false;
            }
      }

  		function limpiarformcontacto(){
  			$('#modal-contacto div.contactosform input').each(function(index, ele) {
  				$(this).val("");  				
  			});
  		}

  		function limpiarformdireccion(){
  			$('#modal-direcciones div.direccionform input').each(function(index, ele) {
  				$(this).val("");
  			});
  		}

  		$(document).on('click', '#agregartelefono', function(){
  		  addtelefono();
  		});

  		function addtelefono(){
  			var div = `
  					<div class="row">
  						<div class="col-md-4 col-sm-4 col-xs-12">
  							<label class="control-label" for="first-name">Telefono</label>
  							<input type="text" id="" class="form-control col-md-7 col-xs-12 phone">					
  						</div>
  						<div class="col-md-4 col-sm-4 col-xs-12">
  							<label class="control-label" for="first-name">Fax</label>
  							<input type="text" id="" class="form-control col-md-7 col-xs-12">					
  						</div>						
  					</div>
  					`;

  			$('#formtelefonos div.buttonadd').before(div);
  		}

  		function recorrertablecontactos(){
  			///verifico si añadieron contactos
  			var list = [];
  			var existe = $('#formcontactos table').length;
  			if (accion == "M")
  				existe = $('#formcontactosm table').length;

  			if (existe == 0)
  				return "[]";

  			var tb = $('#tbodycontacto tr');
  			if (accion == "M")
  				tb = $('#tbodycontactom tr');

  			tb.each(function(index, ele) {
  				var obj = {};
					obj.contacto = $(this).data('contacto');
					obj.email = $(this).data('email');
					obj.celular = $(this).data('celular');
  				obj.identi = $(this).data('identi');
				list.push(obj);

  				
  			});
        console.log(list);
  			return JSON.stringify(list);
  		}

  		function recorrertabledirecciones(){
  			var list = [];
  			var existe = $('#formdireccion table').length;
  			if (accion == "M")
  				existe = $('#formdireccionm table').length;

  			if (existe == 0)
  				return "[]";

  			var tb = $('#tbodydireccion tr');
  			if (accion == "M")
  				tb = $('#tbodydireccionm tr');

  			tb.each(function(index, ele) {
  				var obj = {};
  				var tds = $(this).children('td');
  				tds.each(function(index, ele) {
  					if (index == 0){
  						obj.direccion = $(this).data('direccion');
  					}

  					if (index == 1){
  						obj.contacto = $(this).data('contacto');
  					}

  					if(index == 2){
  						obj.t1 = $(this).data('t1');
  					}

  					if(index == 3){
  						obj.recepcion = $(this).data('recepcion');
  					}

  					if(index == 4){
  						obj.localidad = $(this).data('localidad');
  					}

  				});
  				obj.identi = $(this).data('identi');
        list.push(obj);
  			});
  			return JSON.stringify(list);
  		}

  		function recorrertelefonos(){
			var list = [];
			var form = $('#formtelefonos div.row');
			if (accion =="M")
				form = $('#formtelefonosm div.row');

  			form.each(function(index, ele) {
  				var inputs = $(this).children('div').children('input');
  				if (inputs.eq(0).val() !== undefined && inputs.eq(1).val() !== undefined){
  					if (inputs.eq(0).val() !== ""){
						var obj = {};
		  				var tlf = inputs.eq(0).val();  
		  				var fax = inputs.eq(1).val();
		  				obj.telefono = tlf;
		  				obj.fax = fax;
		  				list.push(obj);  
  					}
  				}
  			});
  			return JSON.stringify(list);
  		}

  		function objetocliente(){
  			//listconstactos();

  			if (accion == "M"){
  				var obj = {
  					'id': idSeleccionado,
  					'razon': $('#fcmi-0').val(),
  					'domicilio': $('#fcmi-1').val(),
  					'nombrefantasia': $('#fcmi-2').val(),
  					'codigopostal': $('#fcmi-3').val(),
  					'cuit': $('#fcmi-4').val(),
  					'localidadid': $('#localidades-m option').data('value'),
  					'codigocliente': $('#fcmi-6').val(),
  					'sitioweb': $('#fcmi-7').val(),
  					'iibb': $('#fcmi-8').val(),
  					'horariorecepcion': $('#fcmi-9').val(),
  					'zona': $('#fcms-0').val(),
  					'rubro': $('#fcms-1').val(),
  					'activo': $("#fcmi-10").is(":checked") ? 1 : 0,
  					'condicionventa': $('#fcms-2').val(),
  					'observaciones': $('#fcmt-0').val(),
  					'contactos' : recorrertablecontactos(),
  				  'direcciones': recorrertabledirecciones(),
  					'telefonos': recorrertelefonos(),
  					//'fax':"",
  					'transportes': recorrertransportes()
  				}
  			}
  			else{
	  			var obj = {
	  				'razon': $('#fci-0').val(),
	  				'domicilio': $('#fci-1').val(),
	  				'nombrefantasia': $('#fci-2').val(),
	  				'codigopostal': $('#fci-3').val(),
	  				'cuit': $('#fci-4').val(),
	  				'localidadid':  $('#localidades option').data('value'),
	  				'codigocliente': $('#fci-6').val(),
	  				'sitioweb': $('#fci-7').val(),
	  				'iibb': $('#fci-8').val(),
	  				'horariorecepcion': $('#fci-9').val(),
	  				'zona': $('#fcs-0').val(),
	  				'rubro': $('#fcs-1').val(),
	  				'activo': $("#fci-10").is(":checked") ? 1 : 0,
	  				'condicionventa': $('#fcs-2').val(),
	  				'observaciones': $('#fct-0').val(),
	  				'contactos' : recorrertablecontactos(),
	  				'direcciones': recorrertabledirecciones(),
	  				'telefonos': recorrertelefonos(),
	  				'fax':"",
	  				'transportes': recorrertransportes()
	  			}  				
  			}
  			
  			if (accion == "M"){
  				ajaxupdate(obj);
  			}
  			else{
  				ajaxnew(obj);
  			}

  			

  		}

  		function ajaxnew(obj){
  			$.ajaxSetup({
  			    headers: {
  			        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  			    }
  			});

  			$.ajax({  
  			  type: "POST",
  			  url: "{{route('clientes.store')}}",
  			  data: obj,
          beforeSend: function() {
            console.log($('#modal-clienteadd button.guardar'));
          },
  			  success: function(data){
  			  	if (data == "true"){
  			  		location.reload();
  			  	}
  			   	
  			  }
  			});
  		}

  		function ajaxupdate(obj){
  			$.ajaxSetup({
  			    headers: {
  			        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  			    }
  			});

  			$.ajax({  
  			  type: "PUT",
  			  url: "{{route('actualizarcliente')}}",
  			  data: obj,
          beforeSend: function() {
            $('#modal-clientemod button.guardar');
          },
  			  success: function(data){
  			  	if (data == "true"){
  			  		location.reload();
  			  	}
  			   	
  			  }
  			});
  		}


  		$('#modal-clientemod button.guardar').on('click', function(){//GuardarCliente
        $('#modal-clientemod button.guardar').attr('disabled', true);
  			objetocliente();
  			return;
  		});


  		$('#modal-clienteadd button.guardar').on('click', function(){//GuardarCliente
        $('#modal-clienteadd button.guardar').attr('disabled', true);
  			objetocliente();
  			return;
  		});

  		$('#modal-contacto input').eq(1).on('change', function(){
  			var valid = validaremail($(this));
        if (cerrar !== 0){
          cerrar = 0;
    			if (valid == false){
    				$.toast({ 
    				  text : "Formato Invalido", 
    				  showHideTransition : 'slide',  
    				  bgColor : 'red',              
    				  textColor : '#eee',            
    				  allowToastClose : false,     
    				  hideAfter : 3000,              
    				  stack : 5,                    
    				  textAlign : 'left',            
    				  position : 'top-right'       
    				});

    				$(this).focus();
    				$(this).val("");
    			}
        }
  		});	

  		function validaremail(elem){
  			var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

  			if (regex.test(elem.val().trim())) {
  			    return true;

  			} else {
  			    return false;
  			}

  		}

  		$(document).on('change', '#emailtran', function(){
        if (cerrar !== 0){
          cerrar = 0;
          if (validaremail($(this))==false){
            $.toast({ 
              text : "Formato de Email Invalido", 
              showHideTransition : 'slide',  
              bgColor : 'red',              
              textColor : '#eee',            
              allowToastClose : false,     
              hideAfter : 3000,              
              stack : 5,                    
              textAlign : 'left',            
              position : 'top-right'       
            });

            $(this).focus();
            $(this).val("");
          }
        }
  			

  		});

      $(".js-typeahead").keyup(function(){
        $.get("buscarlocalidades", {data:$(this).val()}, function(data){
            // use a data source with 'id' and 'name' keys
            if (data.length !== 0)
              $('#localidades option').remove();

            for (var i=0; i<data.length; i++) {
              var opt = `<option data-value="${data[i].id}" value="${data[i].name}"></option>`;
              $('#localidades').append(opt);         
            }
        },'json');

      });

      $(".js-typeahead-m").keyup(function(){
        $.get("buscarlocalidades", {data:$(this).val()}, function(data){
            // use a data source with 'id' and 'name' keys
            if (data.length !== 0)
              $('#localidades-m option').remove();

            for (var i=0; i<data.length; i++) {
              var opt = `<option data-value="${data[i].id}" value="${data[i].name}"></option>`;
              $('#localidades-m').append(opt);         
            }
        },'json');

      });


      $(".js-typeahead-dir").keyup(function(){
        $.get("buscarlocalidades", {data:$(this).val()}, function(data){
            // use a data source with 'id' and 'name' keys
            if (data.length !== 0)
              $('#localidades-dir option').remove();

            for (var i=0; i<data.length; i++) {
              var opt = `<option data-value="${data[i].id}" value="${data[i].name}"></option>`;
              $('#localidades-dir').append(opt);         
            }

        },'json');

      });





  	///END MODAL AGREGAR CLIENTE ///

  	/// TRANSPORTE ///
  	$('#transporteadd').on('change', function(){
  		if ($('#transporteadd').val()>0){
  			$('#modal-clienteadd').modal('hide');
  			$('#modal-confirmartransporte').modal({show:true});
  			setTimeout(cjeck, 500);
  		}
  	});

  	$('#confirmtrans').on('click', function(){
  		if (accion == "M"){
  			var lengtrans = $('#formtransportem div.tabletransm table');
  			var buttontrans = $('#transportem');
  			var modaltrans = $('#modal-clientemod');
  		}
  		else{
  			var lengtrans = $('#formtransporte div.tabletrans table');
  			var buttontrans = $('#transporteadd');
  			var modaltrans = $('#modal-clienteadd');
  		}

  		if(lengtrans.length == 0)
  			tabletransporte();

  		if (buttontrans.val() > 0){
  			var index = busquedatransporte(1, buttontrans.val());
  		}
  		else{
  			var index = busquedatransporte(0, buttontrans.val());
  		}  	

  		$('#modal-confirmartransporte').modal('hide');
  		modaltrans.modal('show');
  		setTimeout(cjeck, 500);
  	});

  	$('#canceltrans').on('click', function(){
  		if (accion == "M"){
  			var modaltrans = $('#modal-clientemod');
  		}
  		else{
  			var modaltrans = $('#modal-clienteadd');
  		}
  		$('#modal-confirmartransporte').modal('hide');
  		modaltrans.modal('show');
  		setTimeout(cjeck, 500);
  	});

  	function tabletransporte(){
		if (accion == "M"){
			var lengtrans = $('#formtransportem div.tabletransm');
			var tbody = "tbodytransportem";
		}
		else{
			var lengtrans = $('#formtransporte div.tabletrans');
			var tbody = "tbodytransporte";
		}

  		var table =  `<table id="datatable-transporte" class="table table-stripped table-bordered">
					    <thead>
					      <tr>
					        <th>Nombre de Transporte</th>
					        <th>Ver Transporte</th>
					        <th>Eliminar</th>
					      </tr>
					    </thead>
					    <tbody id="${tbody}">
		  	
					    </tbody>
					  </table> `;


  		lengtrans.append(table);

  		return true;
  	}


  	function busquedatransporte(type, id){
  		if(type == 1){// existe


  			var sp = location.pathname.split('/');
  			if (sp.length == 3){
	  			var urlt = location.origin+'/'+sp[1]+'/transportes'+'/'+id;  				
  			}
  			else{
	  			var urlt = location.origin+'/'+sp[1]+'/'+sp[2]+'/'+sp[3]+'/transportes'+'/'+id;  				
  			}

  			$.ajax({  
  			  type: "get",
  			  url: urlt,
  			  success: function(data){
  			  	if (accion == "M"){
  			  		var tabletrans = $('#formtransportem div.tabletransm table tbody tr');
  			  		var tbody = $('#tbodytransportem');
  			  	}
  			  	else{
  			  		var tabletrans = $('#formtransporte div.tabletrans table tbody tr');
  			  		var tbody = $('#tbodytransporte');
  			  	}
  			  	var index = tabletrans.length;

  			  	var tr = `<tr data-identi="${index}" data-id="${data.id}" data-razon="${data.razon}" data-contacto="${data.contacto}" data-celular="${data.celular}" data-codigopostal="${data.codigoPostal}" data-direccion="${data.direccion}" data-email="${data.email}" data-fax="${data.fax}" data-horario="${data.horarioRecepcion}" data-localidadid="${data.localidadid}" data-observaciones="${data.observaciones}" data-telefono1="${data.telefono1}" data-telefono2="${data.telefono2}" data-telefono3="${data.telefono3}">
					<td data-razon="${data.razon}">${data.razon}</td>
					<td><a href="#"><i class="fa fa-eye"></i></a></td>
					<td><button data-identi="${index}"" class="btn btn-primary btn-eliminar btn-sm js-eliminar"><i class="fa fa-trash"></i></a></td>						    		
				  </tr>`;

				tbody.append(tr);

		  		var but = $('#tbodytransporte tr button');
				if (accion == "M"){
  			  		but = $('#tbodytransportem tr button');
				}

				but.on('click', function(){
						$(this).parents('tr').remove();
  	
  						var index = $('#formtransporte div.tabletrans table tbody tr').length; 
						var tt = $('#formtransporte div.tabletrans table');							

						if (accion == "M"){
							var index = $('#formtransportem div.tabletransm table tbody tr').length; 
							var tt = $('#formtransportem div.tabletransm table');
						}


						if (index == 0)
							tt.remove();
				});

				var ancla = $('#formtransporte div.tabletrans table tbody tr a');
				if (accion == "M"){
					var ancla = $('#formtransportem div.tabletransm table tbody tr a');
				}

				ancla.on('click', function(){
					var attrdata = $(this).parent('td').parent('tr');
					console.log("entro");
					cargarmodaltransporte(attrdata);
				});
  			  }
  			});
  		}
  		else{//existe
  			console.log("no existe");
  		}

  	}

  	function cargarmodaltransporte(attr){
  		abrirmodalvertran(0);
  		limpiarmodaltransporte();

  		$('#razontran').val(attr.data('razon'));
  		$('#direcciontran').val(attr.data('direccion'));
  		$('#codigopostaltran').val(attr.data('codigopostal'));
  		$('#emailtran').val(attr.data('email'));
  		$('#contactotran').val(attr.data('contacto'));
  		$('#telefonotran').val(attr.data('telefono1'));
  		$('#telefono2tran').val(attr.data('telefono2'));
  		$('#telefono3tran').val(attr.data('telefono3'));
  		$('#celulartran').val(attr.data('celular'));
  		//$('#celular2tran').val(attr.data('telefono2'));
  		$('#recepciontran').val(attr.data('horario'));
  		$('#localidadtran').val(attr.data('localidadid'));
  		$('#observaciontran').val(attr.data('observaciones'));
  	}

  	function limpiarmodaltransporte(){
  		$('#razontran').val("");
  		$('#direcciontran').val("");
  		$('#codigopostaltran').val("");
  		$('#emailtran').val("");
  		$('#contactotran').val("");
  		$('#telefonotran').val("");
  		$('#telefono2tran').val("");
  		$('#telefono3tran').val("");
  		$('#celulartran').val("");
  		$('#celular2tran').val("");
  		$('#recepciontran').val("");
  		$('#localidadtran').val("");
  		$('#observaciontran').val("");
  	}

  	function abrirmodalvertran(type){
  		var index = $('#formtransporte div.tabletrans table');
  		if (accion == "M"){
  			var index = $('#formtransportem div.tabletransm table')
  		}

  		if (type == 1){
  			if ($('#modal-tranexis div.modal-footer button.btn-primary').length == 0){
	  			$('#modal-tranexis div.modal-footer').append('<button type="button" id="creatransporte" class="btn btn-primary">Guardar</button>');  				
	
	  			$('#creatransporte').on('click', function(){
	  				if(index.length == 0){
	  					if (accion == "M"){
	  						tabletransportemod();
	  					}
	  					else{
		  					tabletransporte();	  						
	  					}
	  				}
	  				insertrtransporte();
	  			});
  			}

  		}
  		else{
  			$('#modal-tranexis div.modal-footer button.btn-primary').remove();
  		}

  		var modaltrans = $('#modal-clienteadd');
  		if (accion == "M")
  			var modaltrans = $('#modal-clientemod');

  		modaltrans.modal('hide');
  		$('#modal-tranexis').modal('show');
  		setTimeout(cjeck, 500);
  	}

  	function cerrarmodalvertran(){
  		var modalcli = $('#modal-clienteadd');
  		if (accion == "M")
  			modalcli = $('#modal-clientemod');
  		$('#modal-tranexis').modal('hide');
  		modalcli.modal('show');
  		setTimeout(cjeck, 500);
  	}

  	$('#modal-tranexis button.btn-delete').on('click', function(){
  		cerrarmodalvertran();
  	});

  	$('#agregartransporte').on('click', function(){
  		limpiarmodaltransporte();
  		abrirmodalvertran(1);
  	});



  	function insertrtransporte(){

  		var index = $('#formtransporte div.tabletrans table tbody tr').length;
  		if (accion == "M")
  			index = $('#formtransportem div.tabletransm table tbody tr').length;

  		var razon = $('#razontran').val();
  		var contacto = $('#contactotran').val();
  		var celular = $('#celular2tran').val();
  		var codigopostal = $('#codigopostaltran').val();
  		var direccion = $('#direcciontran').val();
  		var email = $('#emailtran').val();
  		var horario = $('#recepciontran').val();
  		var localidadid = $('#localidadtran').val();
  		var observaciones = $('#observaciontran').val();
  		var telefono1 = $('#telefonotran').val();
  		var telefono2 = $('#telefono2tran').val();
  		var telefono3 = $('#telefono3tran').val();

  		var tr = `<tr data-identi="${index}" data-id="0" data-razon="${razon}" data-contacto="${contacto}" data-celular="${celular}" data-codigopostal="${codigopostal}" data-direccion="${direccion}" data-email="${email}" data-horario="${horario}" data-localidadid="${localidadid}" data-observaciones="${observaciones}" data-telefono1="${telefono1}" data-telefono2="${telefono2}" data-telefono3="${telefono3}">
					<td data-razon="${razon}">${razon}</td>
					<td><a href="#"><i class="fa fa-eye"></i></a></td>
					<td><button data-identi="${index}"" class="btn btn-primary btn-eliminar btn-sm js-eliminar"><i class="fa fa-trash"></i></a></td>						    		
				  </tr>`;

		var tb = $('#tbodytransporte');
		if (accion == "M")
			tb = $('#tbodytransportem');

		tb.append(tr);

		cerrarmodalvertran();

		var tbbutton = $('#tbodytransporte tr button');
		if (accion == "M")
			tbbutton = $('#tbodytransportem tr button');

		tbbutton.on('click', function(){
			$(this).parents('tr').remove();
			var tablet = $('#formtransporte div.tabletrans table');

			var index = $('#formtransporte div.tabletrans table tbody tr').length; 
			if (accion == "M"){
				index = $('#formtransportem div.tabletransm table tbody tr').length;
				tablet = $('#formtransportem div.tabletransm table');
			}

			if (index == 0)
				tablet.remove();
		});

		var anclatran = $('#formtransporte div.tabletrans table tbody tr a');
		if (accion == "M" )
			anclatran = $('#formtransportem div.tabletransm table tbody tr a');

		anclatran.on('click', function(){
			var attrdata = $(this).parent('td').parent('tr');
			cargarmodaltransporte(attrdata);
		});
  		 			
  	}

  	function recorrertransportes(){
  		var listexis = [];
  		var listnew = [];
  		var transportes = [];
  		var existe = $('#formtransporte table').length;
  		if (accion == "M")
  			existe = $('#formtransportem table').length;

  		if (existe == 0)
  			return "[]";

  		var tb = $('#tbodytransporte tr');
  		if (accion == "M")
  			tb = $('#tbodytransportem tr');

  		tb.each(function(index, ele) {
  				var obj = {};

  				if ($(this).data('id') !==0){
  					obj.ide = $(this).data('id');
  					obj.razon = $(this).data('razon');
  					obj.contacto = $(this).data('contacto');
  					obj.celular = $(this).data('celular');
  					obj.codigopostal = $(this).data('codigopostal');
  					obj.direccion = $(this).data('direccion');
  					obj.email = $(this).data('email');
  					obj.horario = $(this).data('horario');
  					obj.localidadid = $(this).data('localidadid');
  					obj.observaciones = $(this).data('observaciones');
  					obj.telefono1 = $(this).data('telefono1');
  					obj.telefono2 = $(this).data('telefono2');
  					obj.telefono3 = $(this).data('telefono3');
					listexis.push(obj);  	
  				}
  				else{
  					obj.razon = $(this).data('razon');
  					obj.contacto = $(this).data('contacto');
  					obj.celular = $(this).data('celular');
  					obj.codigopostal = $(this).data('codigopostal');
  					obj.direccion = $(this).data('direccion');
  					obj.email = $(this).data('email');
  					obj.horario = $(this).data('horario');
  					obj.localidadid = $(this).data('localidadid');
  					obj.observaciones = $(this).data('observaciones');
  					obj.telefono1 = $(this).data('telefono1');
  					obj.telefono2 = $(this).data('telefono2');
  					obj.telefono3 = $(this).data('telefono3');
  					listnew.push(obj);
  				}  				
  		});

  		transportes.push(listexis);
  		transportes.push(listnew);

  		return JSON.stringify(transportes);
  	}

  	/// END TRANSPORTE ///

  	///BUSCAR CLIENTE///

  	$('#buscarcliente').on('click', function(){
  		var obj = {
  			'razon': $('#razonup').val(),
  			'cuit': $('#cuitup').val(),
  			'nfanta': $('#nombrefantasiaup').val(),
  			'localidadid': $('#localidadup').val(),
  			'zona': $('#zonaup').val(),
  			'activo': $("#activoup").is(":checked") ? 1 : 0
  		}

  		$.ajax({  
  		  type: "get",
  		  url: "{{route('clientes_search')}}",
  		  data: obj,
  		  success: function(data){
  		  	var arrayReturn = data.resultado;
  		  	if (data !== "false"){
  		  		table.destroy();
  		  		table = $("#datatable-cliente").DataTable({
  		  		  "data": arrayReturn,
  		  		  "columns": [
  		  		    {"data": "Razon"},
  		  		    {"data": "TELEFONO"},
  		  		    {"data": "Nombre"},
  		  		    {"data": "Lugar"},
  		  		    {"data": "Zona"}
  		  		  ],
  		  		  "order": [],   
  		  		  "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
  		  		          $(nRow).attr('data-id', arrayid['id']);
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
  		  		return true;
  		  	}
  		  	else{
  		  		table.clear().draw();

  		  		$.toast({ 
  		  		  text : "No se han encontrado resultados", 
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

  	///// END BUSCAR CLIENTE ////

  	/// DELETE CLIENTE ///
  	$('#send_delete').on('click', function(){
  		$.ajaxSetup({
  		    headers: {
  		        'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
  		    }
  		});

  		var url = "clientes/" + idSeleccionado;
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

  	/// END DELETE CLIENTE ///
  });
</script>
@endsection