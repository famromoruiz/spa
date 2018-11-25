<?php
use \route\Route;
?>
<div class="container">

  <div class="row">

    <div class="col-md-12">

      <div class="input-group ">

        <datalist id="busqueda">
          
        </datalist>

        <input id="buscar" list="busqueda" type="search" class="form-control" placeholder="Productos"  aria-label="productos" aria-describedby="button-addon2" onkeyup="buscar(this.value);">

          <div class="input-group-append">
            <button onclick="agregar_p()" class="btn btn-outline-seremas" type="button" id="button-addon2"><i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>

     </div>

  </div>
</div>

  <br>

  <div class="row">

    <div class="col-md-8">

      <div class="row">

        <div class="col-md-12">

            <div class="card">

              <div class="card-header bg-seremas text-white font-weight-bold d-flex justify-content-between align-items-center">
               Cuenta general por cobrar  <span id="items">Total 0</span>
             </div>

             <div class="card-body productos">

              <ul id="pagos" class="list-group-flush " ondrop="drop(event)" ondragover="allowDrop(event)">
                
              </ul>

             </div>

            </div>
        </div>

      </div>

      <br>

      <div class="row">

        <div class="col-md-12">

          <div class="card">

            <div class="card-header bg-seremas text-white font-weight-bold d-flex justify-content-between align-items-center">

              Citas por cobrar  <span class="pagos_2">Total 0</span>
            </div>

            <div class="card-body servicios">

              <ul class="list-group-flush prod_cob  items_2">

                <?php $id =0;  foreach ($this->modelCita->Listarcobro() as $c) { 

                    $id++;


                  $fecha = $c->inicio;
                  $fecha = explode(' ', $fecha);
                  $fecha = explode('-', $fecha[0]);
                  $fecha = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];

                  $servicios = $this->modelCita->Listarserv($c->id_cita);

                  $n =count($servicios);

                  $tipo =$c->tipo_cliente;

                  $costo = 0.00;

                  for ($i = 0; $i < $n ; $i++) {
                    $costo = $servicios[$i]->$tipo + $costo;
                  }
                   ?>
            <li id="<?=$id?>" class="list-group-item d-flex justify-content-between align-items-center "><?= $fecha ?>   <?= strtoupper($c->nombre) ?>  <?= '$'.number_format($costo,2) ?> <span><button type="button" class="btn btn-seremas btn-sm" onclick="agregar_citas_pago(<?=$id?>);">Añadir</button></span></li>
      <?php } ?>
  
            </ul>
        </div>
    </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
  <div class="card-header bg-seremas text-white text-center font-weight-bold">
    TOTAL
  </div>
  <div class="card-body text-center">

    <h1  class="font-weight-bold"><i class="fa fa-dollar text-seremas" aria-hidden="true"></i><span id="pesos" class="pesos">00.00</span></h1>

    
</div>
<div class="card-footer text-muted">
    <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-outline-seremas  btn-block">PAGAR</button>
  </div>
</div>
        </div>
      </div>
    </div>

  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cobrar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h1  class="font-weight-bold"><i class="fa fa-dollar text-seremas" aria-hidden="true"></i><span id="pesos_2" class="pesos">00.00</span></h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-seremas">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<script>


$(document).ready(function(){
  $(".pagos_2").html('Total '+$(".items_2 li").length); 
});



function buscar(b){

  console.log(b);

if ( b === '') {
  $('#busqueda').html('');
}else{

   $.ajax({
                data:  { q:b },
                url:   '<?= Route::Ruta(['sale' , 'json']) ?>',
                type:  'get',
                beforeSend: function () {
                        // $("#alert").html('<div class="alert alert-secondary" role="alert">Procesando, espere por favor...</div>');

                },
                success:  function (response) {

                  $('#busqueda').html('');
               
                  console.log(response);

                 $.each(JSON.parse(response), function(i, v) {
                    console.log(v.id);
                    $('#busqueda').append('<option value="'+v.title+'"></option>');
                    
                 });




                  
                     
                       

                }

        });

}

   

 
}

function agregar_p(){

 var str = $('#buscar').val().split(' ');

  var p =str[0];

  var precio;


   $.ajax({
                data:  { p:p },
                url:   '<?= Route::Ruta(['sale' , 'json']) ?>',
                type:  'get',
                beforeSend: function () {
                        // $("#alert").html('<div class="alert alert-secondary" role="alert">Procesando, espere por favor...</div>');

                },
                success:  function (response) {

                 
               
                  console.log(response);

                  var id = 0;

                 $.each(JSON.parse(response), function(i, v) {
                  var p = v.title;

                  precio = v.precio;

                   id ++;
                      
                    console.log(v.precio);
                    $('#pagos').append('<li id="dg1" class="list-group-item"> <p class=" "><span class="text-danger"> <i class="fa fa-times" aria-hidden="true"></i></span> '+p+' </p> <p class="text-right"> <span class="font-weight-bold">$'+v.precio+'</span></p></li>');
                    
                 });




                $("#items").html('Total '+$("#pagos li").length);  

                $('#buscar').val('').focus(); 

                var pesos = $('#pesos').html();

                pesos = parseFloat(pesos) + parseFloat(precio);
                     
                    console.log(pesos);  

                    $('.pesos').html(pesos.toFixed(2)); 

                }

        });
 
}


function agregar_citas_pago(id){

  alert(id);

}






  $(function(){
  $('.productos').slimScroll({
    height: '240px'
  });

  $('.servicios').slimScroll({
    height: '120px'
  });
});
</script>