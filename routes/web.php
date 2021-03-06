<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function() {
Route::resource('normas', 'NormaController');
Route::resource('tipoaceros', 'TipoAceroController');
Route::resource('condicionventas', 'CondicionVentaController');
Route::resource('punzones', 'PunzoneController');
Route::resource('matriztls', 'MatrizTLController');
Route::resource('matrizbronsons', 'MatrizBronsonController');
Route::resource('matrizmitchells', 'MatrizMitchellController');
Route::resource('matrizdobles', 'MatrizDobleController');
Route::resource('matrizsimaceros', 'MatrizSimAceroController');
Route::resource('matrizsimwidias', 'MatrizSimWidiaController');
Route::resource('cabezaturcos', 'CabezaTurcoController');
Route::resource('ingresos', 'IngresoController');
Route::resource('egresos', 'EgresoController');
Route::resource('ajustes', 'AjusteController');
Route::resource('transportes', 'TransporteController');
Route::resource('clientes', 'ClienteController');
Route::resource('notas', 'NotaController');
Route::resource('seguimientos', 'SeguimientoController');
Route::resource('crmcontactos', 'CrmContactoController');
Route::resource('tareas', 'TareaController');
Route::resource('documentos', 'DocumentoController');
Route::resource('medidabibliotecas', 'MedidaBibliotecaController');
Route::resource('medidas', 'MedidaController');
Route::resource('usos', 'UsoController');
Route::resource('proveedores', 'ProveedorController');
Route::resource('fabricaciones', 'EstadoFabricacionController');
Route::get('/calendario', 'CRMController@calendario')->name('calendario');
Route::get('/cliente', 'CRMController@cliente')->name('cliente');
Route::get('/nota', 'CRMController@nota')->name('nota');
Route::get('/seguimiento', 'CRMController@seguimiento')->name('seguimiento');
Route::post('/buscarcoti', 'CRMController@buscarcoti')->name('buscarcoti');
Route::post('/buscarordencliente', 'CRMController@buscarordencliente')->name('buscarordencliente');
Route::get('/coCentro', 'CostoController@coCentro')->name('coCentro');
Route::get('/costoCentro', 'CostoController@costoCentro')->name('costoCentro');
Route::get('/costoGeneral', 'CostoController@costoGeneral')->name('costoGeneral');
Route::post('/create-contacto-cliente', 'CRMController@CreateContactoCliente')->name('contactocliente');
Route::post('/create_nota', 'CRMController@nota_create')->name('create_nota');
Route::get('/buscar_contacto', 'CRMController@BuscarContactoCliente')->name('buscar_contacto');
Route::get('/ver_contacto/{id}', 'CRMController@vercontacto')->name('ver_contacto');
Route::put('/update_contacto/{id}', 'CRMController@updatecontacto')->name('update_contacto');
Route::get('/buscar_punzon', 'PunzoneController@busqueda')->name('buscar_punzon');
Route::get('/transporte', 'CRMController@transporte')->name('transporte');
Route::get('/buscar_transporte/{id}', 'CRMController@vertransporte')->name('buscar_transporte');
Route::post('/addtransporte', 'CRMController@addtransporte')->name('addtransporte');
Route::put('/updatetransporte/{id}', 'CRMController@updatetransporte')->name('updatetransporte');
Route::delete('/deletetransporte/{id}', 'CRMController@deletetransporte')->name('deletetransporte');
Route::post('/addcoeficiente', 'CostoController@addcoeficiente')->name('addcoeficiente');
Route::get('/buscar_coeficiente', 'CostoController@buscar_coeficiente')->name('buscar_coeficiente');
Route::post('/addcostoGeneral', 'CostoController@addcostoGeneral')->name('addcostoGeneral');
Route::get('/showcostoGeneral', 'CostoController@showcostoGeneral')->name('showcostoGeneral');
Route::get('/report_despacho', 'ReportController@report_despacho')->name('report_despacho');
Route::get('/report_entrega_mes', 'ReportController@report_entrega_mes')->name('report_entrega_mes');
Route::get('/report_produccion', 'ReportController@report_produccion')->name('report_produccion');
Route::get('/report_toneladasxdia', 'ReportController@report_toneladasxdia')->name('report_toneladasxdia');
Route::get('/report_venta', 'ReportController@report_venta')->name('report_venta');
Route::get('/report_precio_proveedor', 'ReportController@report_precio_proveedor')->name('report_precio_proveedor');
Route::post('/buscar_report_toneladasxdia', 'ReportController@buscar_report_toneladasxdia')->name('buscar_report_toneladasxdia');
Route::post('/buscar_reporteprecioproveedor', 'ReportController@buscar_reporteprecioproveedor')->name('buscar_reporteprecioproveedor');
Route::post('/buscar_reporteventas', 'ReportController@buscar_reporteventas')->name('buscar_reporteventas');
Route::post('/buscar_reporteentregames', 'ReportController@buscar_reporteentregames')->name('buscar_reporteentregames');
Route::post('/buscarreport_despacho', 'ReportController@buscarreport_despacho')->name('buscarreport_despacho');
Route::get('/indexcotizacion', 'CotizacionController@indexcotizacion')->name('indexcotizacion');
Route::post('/addcotizacion', 'CotizacionController@addcotizacion')->name('addcotizacion');
Route::post('/searchcotizacion', 'CotizacionController@searchcotizacion')->name('searchcotizacion');
Route::get('/editcotizacion', 'CotizacionController@editcotizacion')->name('editcotizacion'); 
Route::put('/updatecotizacion', 'CotizacionController@updatecotizacion')->name('updatecotizacion');
Route::post('/RechazarCotizacion', 'CotizacionController@RechazarCotizacion')->name('RechazarCotizacion'); 
Route::put('/anular_cot', 'CotizacionController@anular_cot')->name('anular_cot');
Route::get('/actualizar_precio', 'VentaController@actualizar_precio')->name('actualizar_precio');
Route::get('/cambio', 'VentaController@cambio')->name('cambio');
Route::get('/lista_precio', 'VentaController@lista_precio')->name('lista_precio');
Route::post('/add_report_entrega_mes', 'ReportController@add_report_entrega_mes')->name('add_report_entrega_mes');
Route::post('/buscar_actualizar_precio', 'VentaController@buscar_actualizar_precio')->name('buscar_actualizar_precio');
Route::post('/process_actualizar_precio', 'VentaController@process_actualizar_precio')->name('process_actualizar_precio');
Route::post('/cargarreport', 'ReportController@cargarreport')->name('cargarreport');
Route::post('/ejecutarreport', 'ReportController@ejecutarreport')->name('ejecutarreport');
Route::post('/addcambio', 'VentaController@addcambio')->name('addcambio');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/autorizacion', 'DespachoController@autorizacion')->name('autorizacion');
Route::post('/buscardespachos', 'DespachoController@buscardespachos')->name('buscardespachos');
Route::post('/buscarentrega', 'DespachoController@buscarentrega')->name('buscarentrega');
Route::get('/cliente_despacho/{id}', 'DespachoController@cliente_despacho')->name('cliente_despacho');
Route::get('/datos_control/{id}', 'DespachoController@datos_control')->name('datos_control');
Route::get('/despacho', 'DespachoController@despacho')->name('despacho');
Route::get('/agregar_despacho/{idorden}/{clienteid}', 'DespachoController@agregar_despacho')->name('agregar_despacho');
Route::post('/procesar_despacho', 'DespachoController@procesar_despacho')->name('procesar_despacho');
Route::post('/insertar_despacho', 'DespachoController@insertar_despacho')->name('insertar_despacho');
Route::put('/estadodespacho', 'DespachoController@estadoFacturadoDespacho')->name('estadodespacho');
Route::post('/guardar_despacho', 'DespachoController@guardar_despacho')->name('guardar_despacho');
Route::delete('/cancelar_despacho', 'DespachoController@cancelar_despacho')->name('cancelar_despacho');
Route::get('/historial_despacho/{id}/{type}', 'DespachoController@historial_despacho')->name('historial_despacho');
Route::put('/update_despacho', 'DespachoController@update_despacho')->name('update_despacho');
Route::get('/control_entrega', 'DespachoController@control_entrega')->name('control_entrega');
Route::post('/procesarControlEntrega', 'DespachoController@procesarControlEntrega')->name('procesarControlEntrega');
Route::get('/ubicacion', 'DespachoController@ubicacion')->name('ubicacion');
Route::get('/buscar_medida', 'PaqueteController@buscar_medida')->name('buscar_medida');
Route::get('/indexmedida', 'StockPaqueteController@indexmedida')->name('indexmedida');
Route::get('/indexpaquete', 'StockPaqueteController@indexpaquete')->name('indexpaquete');
Route::post('/buscarpaquetes', 'StockPaqueteController@buscarpaquetes')->name('buscarpaquetes');
Route::get('/indexmovimiento', 'StockPaqueteController@indexmovimiento')->name('indexmovimiento');
Route::get('/indexmed', 'StockPaqueteController@indexmed')->name('indexmed');
Route::get('/actualizarmp', 'StockMPController@actualizarmp')->name('actualizarmp');
Route::post('/mpprecio', 'StockMPController@actualizarMPPrecio')->name('mpprecio');
Route::post('/historialMp', 'StockMPController@historialMp')->name('historialMp');
Route::get('/mpRechazo', 'ProduccionController@mpRechazo')->name('mpRechazo');
Route::post('/procesarRechazo', 'ProduccionController@procesarRechazo')->name('procesarRechazo'); 
Route::post('/procesarRechazoPOST', 'ProduccionController@procesarRechazoPOST')->name('procesarRechazoPOST'); 
Route::get('/oprechazo/{id}', 'ProduccionController@oprechazo')->name('oprechazo'); 
Route::post('/processrechazoMP', 'ProduccionController@processrechazoMP')->name('processrechazoMP');
Route::post('/processautorizarMP', 'ProduccionController@processautorizarMP')->name('processautorizarMP');
Route::get('/autorizarMP', 'ProduccionController@autorizarMP')->name('autorizarMP');
Route::post('/generarxdif', 'ProduccionController@generarxdif')->name('generarxdif');
Route::get('/indexrechazo', 'ProduccionController@indexrechazo')->name('indexrechazo');
Route::post('/buscarrechazo', 'ProduccionController@buscarrechazo')->name('buscarrechazo');
Route::get('/detalle_rechazo/{id}', 'ProduccionController@detalle_rechazo')->name('detalle_rechazo');
Route::get('/indexcalendario', 'ProduccionController@indexcalendario')->name('indexcalendario');
Route::get('/indexsubproceso', 'ProduccionController@indexsubproceso')->name('indexsubproceso');
Route::get('/indextour', 'ProduccionController@indextour')->name('indextour');
Route::put('/ejeprocesos', 'ProduccionController@ejeprocesos')->name('ejeprocesos');
Route::get('/datacalendario', 'ProduccionController@datacalendario')->name('datacalendario');
Route::get('/mostrarprocesos', 'ProduccionController@mostrarprocesos')->name('mostrarprocesos');
Route::put('/openTour', 'ProduccionController@open_tour')->name('openTour');
Route::post('/SeleTraza', 'ProduccionController@SeleTraza')->name('SeleTraza');
Route::put('/pasaraplanta', 'ProduccionController@pasaraplanta')->name('pasaraplanta');
Route::get('/ordenes', 'ProduccionController@ordenes')->name('ordenes');
Route::get('/buscarordenes', 'ProduccionController@buscarordenes')->name('buscarordenes');
Route::get('/ver_orden/{id}/{coti}', 'ProduccionController@ver_orden')->name('ver_orden');
Route::get('/controlfinal/{id}', 'ProduccionController@controlfinal')->name('controlfinal');
Route::get('/controlcalidad/{id}', 'ProduccionController@controlcalidad')->name('controlcalidad');
Route::post('/eliminarproceso', 'ProduccionController@eliminarproceso')->name('eliminarproceso');
Route::post('/guardarproceso', 'ProduccionController@guardarproceso')->name('guardarproceso');
Route::get('/selectoresindividuales', 'ProduccionController@selectoresindividuales')->name('selectoresindividuales');
Route::post('/vercot', 'ProduccionController@vercot')->name('vercot');
Route::get('/buscarmedidaproceso', 'ProduccionController@buscarmedidaproceso')->name('buscarmedidaproceso');
Route::get('/selectortrefila', 'ProduccionController@selectortrefila')->name('selectortrefila');
Route::get('/buscarprocesoop/{id}/{type}', 'ProduccionController@buscarprocesoop')->name('buscarprocesoop');
Route::get('/consultarprocesosop/', 'ProduccionController@consultarprocesosop')->name('consultarprocesosop');
//procesos produccion//
Route::get('/subprocesoplanificado/{id}', 'ProduccionController@subprocesoplanificado')->name('subprocesoplanificado');
Route::get('/subprocesoenejecucion/{id}', 'ProduccionController@subprocesoenejecucion')->name('subprocesoenejecucion');
Route::post('/storecontrolfinal', 'ProduccionController@storecontrolfinal')->name('storecontrolfinal');
Route::put('/cancelar_produccion', 'ProduccionController@cancelar_produccion')->name('cancelar_produccion');
Route::put('/actualizar_orden', 'ProduccionController@actualizar_orden')->name('actualizar_orden');
//end procesos produccion//
Route::post('/addingreso', 'IngresoController@addingreso')->name('addingreso');
Route::post('/addubicacion', 'DespachoController@addubicacion')->name('addubicacion');
Route::post('/adddatos_control', 'DespachoController@adddatos_control')->name('adddatos_control');
Route::post('/buscaregreso', 'EgresoController@buscaregreso')->name('buscaregreso');
Route::post('/actualizaregreso', 'EgresoController@actualizarEgreso')->name('actualizaregreso');
Route::post('/buscarajuste', 'AjusteController@buscarajuste')->name('buscarajuste');
Route::post('/buscaraprecio', 'VentaController@buscar_actualizar_precio')->name('buscaraprecio');
Route::post('/buscarlistadeprecios', 'VentaController@buscarlistaprecio')->name('buscarlistadeprecios');
Route::post('/buscarseguimiento', 'CRMController@buscarseguimiento')->name('buscarseguimiento');
Route::delete('/deleteNota/{id}', 'CRMController@DeleteNota')->name('deleteNota');
Route::post('/buscarmedidas', 'StockPaqueteController@buscarmedida')->name('buscarmedidas');
Route::post('/buscarmovimiento', 'StockPaqueteController@buscarmovimiento')->name('buscarmovimiento');
Route::get('/buscarcostoporcentro', 'CostoController@buscarcostoporcentro')->name('buscarcostoporcentro');
Route::post('/addcostoporcentro', 'CostoController@addcostoporcentro')->name('addcostoporcentro');
Route::delete('/deleteCrmcontacto/{id}', 'CRMController@DeleteCrmContacto')->name('deleteCrmcontacto');
Route::get('/vercotizacion/{id}', 'CRMController@vercotizacion')->name('vercotizacion');
//PROCESOS//
Route::get('/procesosindex/{id}', 'ProcesoController@procesos')->name('procesosindex');
Route::get('/copiarprocesocot/{id}', 'ProcesoController@copiarprocesocot')->name('copiarprocesocot');
Route::get('/vercotind/{id}', 'ProcesoController@vercotind')->name('vercotind');
Route::get('/procesopreparacionmp/{id}', 'ProcesoController@preparacionmp')->name('procesopreparacionmp');
Route::get('/procesoempaquetado/{id}', 'ProcesoController@empaquetado')->name('procesoempaquetado');
Route::get('/procesoentrega', 'ProcesoController@entrega')->name('procesoentrega');
Route::get('/procesocertificado/{id}', 'ProcesoController@certificado')->name('procesocertificado');
Route::get('/procesohorno/{id}', 'ProcesoController@horno')->name('procesohorno');
Route::get('/procesocorte/{id}', 'ProcesoController@corte')->name('procesocorte');
Route::get('/procesoservicio/{id}', 'ProcesoController@servicio')->name('procesoservicio');
Route::get('/procesotrefila', 'ProcesoController@trefila')->name('procesotrefila');
Route::get('/procesopunta', 'ProcesoController@punta')->name('procesopunta');
Route::get('/procesopruebahidraulica/{id}', 'ProcesoController@pruebahidraulica')->name('procesopruebahidraulica');
Route::get('/procesoestencilado/{id}', 'ProcesoController@estencilado')->name('procesoestencilado');
Route::get('/procesocurrent/{id}', 'ProcesoController@current')->name('procesocurrent');
Route::get('/procesobatea/{id}', 'ProcesoController@batea')->name('procesobatea');
Route::get('/procesoenderezadora/{id}', 'ProcesoController@enderezadora')->name('procesoenderezadora');
Route::post('/buscarmedidaproceso', 'ProcesoController@buscarmedidaproceso')->name('buscarmedidaproceso');
Route::get('/buscar_procesos/{id}/{type}', 'ProcesoController@buscar_proceso')->name('buscar_procesos');
Route::post('/buscarpreparacion', 'ProcesoController@buscarpreparacion')->name('buscarpreparacion');
Route::get('/runproceso', 'DespachoController@runprocesos')->name('runproceso');
Route::post('/buscarmedidapreparacionmp', 'ProcesoController@buscarmedidapreparacionmp')->name('buscarmedidapreparacionmp');
Route::get('/resumenProceso/{id}', 'ProcesoController@resumenProceso')->name('resumenProceso');
Route::post('/copiar/', 'ProcesoController@copiar')->name('copiar');
Route::get('/runprocesos', 'ProduccionController@runprocesos')->name('runprocesos');
Route::resource('productos', 'ProductoController');
Route::get('/buscarproducto', 'ProductoController@buscarproducto')->name('buscarproducto');
Route::get('/usuarios', 'UsuarioController@index')->name('usuarios');
Route::get('/listarusuarios', 'UsuarioController@listarusuarios')->name('listarusuarios');
Route::get('/verusuario/{id}', 'UsuarioController@verusuario')->name('verusuario');
Route::post('/addusuario', 'UsuarioController@addusuario')->name('addusuario');
Route::put('/updateusuario/{id}', 'UsuarioController@updateusuario')->name('updateusuario');
Route::delete('/deleteusuario/{id}', 'UsuarioController@deleteusuario')->name('deleteusuario');
Route::get('/selectores', 'ProduccionController@selectores')->name('selectores');
Route::get('/exportar/{id}', 'ExportarController@exportarorden')->name('exportar');
Route::get('/exportarventa/{id}', 'ExportarController@exportarcotizacion')->name('exportarventa');
Route::get('/punzonestrefila', 'ProduccionController@punzonestrefila')->name('punzonestrefila');
Route::get('/atributo/{id}/{idp}', 'AtributosController@show')->name('atributo');
Route::get('/buscar_direcciones', 'DireccionesController@buscar_direcciones')->name('buscar_direcciones');
Route::get('/clientes_search', 'ClienteController@clientes_search')->name('clientes_search');
Route::get('/getcliente', 'ClienteController@getcliente')->name('getcliente');
Route::put('/actualizarcliente', 'ClienteController@actualizarcliente')->name('actualizarcliente');
Route::get('/buscarlocalidades', 'LocalidadesController@buscarlocalidades')->name('buscarlocalidades');
Route::get('/verordenproduccion/{id}', 'ProduccionController@verordenproduccion')->name('verordenproduccion');
Route::get('/data_verproduct/', 'ProduccionController@data_verproduct')->name('data_verproduct');
Route::post('/procesarProduccion/', 'ProduccionController@procesarProduccion')->name('procesarProduccion');
Route::get('/deposito/', 'StockPaqueteController@deposito')->name('deposito');
Route::get('/SearchMedida/', 'StockPaqueteController@SearchMedida')->name('SearchMedida');
Route::post('/buscar-paquetes', 'StockPaqueteController@searchPaquetes')->name('searchPaquetes');
Route::post('/procesarMateriaPrima/', 'StockPaqueteController@procesarMateriaPrima')->name('procesarMateriaPrima');



Route::get('/operarios', 'OperarioController@index')->name('operarioIndex');
Route::get('/operarios-show', 'OperarioController@show')->name('operarioShow');
Route::post('/operarios-update', 'OperarioController@update')->name('operarioUpdate');
Route::post('/operarios-store', 'OperarioController@store')->name('operarioStore');
Route::post('/operarios-delete', 'OperarioController@delete')->name('operarioDelete');


});
Auth::routes();
