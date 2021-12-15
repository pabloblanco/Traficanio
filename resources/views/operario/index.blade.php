@extends('layouts.app')

@section('content')
<div class="main_container">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Administrar Normas</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="">
                  <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Operario</button>
                </li>
  
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
  
              <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width: 100%;">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($model as $item)
                  <tr data-id="{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombreCompleto}}</td>
                    <td><button class="btn btn-info" onclick="editar({{$item->id}})">Editar</button>
                        <button class="btn btn-danger" onclick="borrar({{$item->id}})">X</button>
                    </td>
                  </tr>
                  @empty
                      Sin Registros
                  @endforelse
  
  
                </tbody>
              </table>
            </div>

          </div>
        </div>
  
  
      </div>
</div>


<!--  modal modifcar Norma -->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar Operario</h4>
        </div>
        <div class="modal-body cuerpo-modal">
        
            <form action="" method="post" accept-charset="utf-8">
            <div class="form-group">
                <input type="hidden" id="operario_id" name="operario_id">
              <div class="col-md-12 col-sm-12 div-input-modal">
                <label for="first-name">Nombre</label>
                <input name="nombre" id="nombre" type="text"  required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
          <button type="button" id="enviar_m" onclick="modificar()" class="btn btn-primary">Guardar</button>
        </div>
    
      </div>
   
    </div>
  </div>

<!-- /modals modificar--> 


<!--  modal modifcar Norma -->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Modificar Operario</h4>
        </div>
        <div class="modal-body cuerpo-modal">
        
            <form action="" method="post" accept-charset="utf-8">
            <div class="form-group">
                
              <div class="col-md-12 col-sm-12 div-input-modal">
                <label for="first-name">Nombre</label>
                <input name="nombre" id="nombreadd" type="text"  required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
          <button type="button" id="enviar_m" onclick="agregar()" class="btn btn-primary">Guardar</button>
        </div>
    
      </div>
   
    </div>
  </div>

<!-- /modals modificar--> 
@endsection

@section('js_extra')
<script>
    function editar(id){
        console.log(id)
        $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
        });

        $.ajax({  
            type: "GET",
            url: '{{route("operarioShow")}}',
            data:{
                id:id
            },
            success: function(data){
                console.log(data)
                $('#operario_id').val(data.id)
                $('#nombre').val(data.nombreCompleto)
                $('#modal-modificar').modal('show')
            }
        });
    }
    function modificar(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
        });
        if($('#nombre').val() == ''){
            $.toast({ 
                text : 'El nombre es obligatorio', 
                showHideTransition : 'slide',  
                bgColor : 'red',              
                textColor : '#eee',            
                allowToastClose : false,     
                hideAfter : 5000,              
                stack : 5,                    
                textAlign : 'left',            
                position : 'top-right'       
            });
            return
        }
        $.ajax({  
            type: "post",
            url: '{{route("operarioUpdate")}}',
            data:{
                operario_id:$('#operario_id').val(),
                nombre:$('#nombre').val()
            },
            success: function(data){
                console.log(data)
                $.toast({ 
                    text : 'Guardado con exito', 
                    showHideTransition : 'slide',  
                    bgColor : 'green', 
                    textColor : '#eee',            
                    allowToastClose : false,     
                    hideAfter : 5000,              
                    stack : 5,                    
                    textAlign : 'left',            
                    position : 'top-right'       
                });
                setTimeout(() => {
                    location.reload()
                }, 2000);
                //$('#modal-modificar').modal('show')
            }
        });
    }


    function agregar(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
        });
        if($('#nombreadd').val() == ''){
            $.toast({ 
                text : 'El nombre es obligatorio', 
                showHideTransition : 'slide',  
                bgColor : 'red',              
                textColor : '#eee',            
                allowToastClose : false,     
                hideAfter : 5000,              
                stack : 5,                    
                textAlign : 'left',            
                position : 'top-right'       
            });
            return
        }
        $.ajax({  
            type: "post",
            url: '{{route("operarioStore")}}',
            data:{
                
                nombre:$('#nombreadd').val()
            },
            success: function(data){
                console.log(data)
                $.toast({ 
                    text : 'Guardado con exito', 
                    showHideTransition : 'slide',  
                    bgColor : 'green', 
                    textColor : '#eee',            
                    allowToastClose : false,     
                    hideAfter : 5000,              
                    stack : 5,                    
                    textAlign : 'left',            
                    position : 'top-right'       
                });
                setTimeout(() => {
                    location.reload()
                }, 2000);
                //$('#modal-modificar').modal('show')
            }
        });
    }
    function borrar(id){
        $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
        });
        $.ajax({  
            type: "post",
            url: '{{route("operarioDelete")}}',
            data:{
                
                id:id
            },
            success: function(data){
                console.log(data)
                $.toast({ 
                    text : 'Eliminado con exito', 
                    showHideTransition : 'slide',  
                    bgColor : 'green', 
                    textColor : '#eee',            
                    allowToastClose : false,     
                    hideAfter : 5000,              
                    stack : 5,                    
                    textAlign : 'left',            
                    position : 'top-right'       
                });
                setTimeout(() => {
                    location.reload()
                }, 2000);
                //$('#modal-modificar').modal('show')
            }
        });
    }
</script>
@endsection