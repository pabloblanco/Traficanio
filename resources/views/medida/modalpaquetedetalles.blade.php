<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Paquetes asociados</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                
                <th scope="col">Numero Trazabilidad</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Ubicacion</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Fecha Ingreso</th>
                <th scope="col">Fecha Mov</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody id="tablaPaquetes">
              
              
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          
        </div>
      </div>
    </div>
  </div>
  <script>
    function openModal(id){

      $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });
      $.ajax({
        url: "{{route('searchPaquetes')}}",
        data:{
          id:id
        },
        type:'POST'
      }).done(function(done) {
        console.log(done)
        $('#tablaPaquetes').empty()
        for(let index in done){
          $('#tablaPaquetes').append(`
            <tr>
                
                <td>${done[index].numeroTrazabilidad}</td>
                <td>${done[index].kilogramos}</td>
                <td>${done[index].ubicacion}</td>
                <td>${done[index].razon}</td>
                <td>${done[index].fechamov}</td>
                <td>${done[index].fechamov}</td>
                <td>${done[index].estado}</td>
              </tr>
          `)
        }
        $('#exampleModal').modal('show')
      });

      
    }
  </script>