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
 <!-- <div class="list-group busqueda">
    <li class="list-group-item ">
      hola
  </li>
</div> -->



    </div>
    
  </div>
  <br>
  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
  <div class="card-header bg-seremas text-white font-weight-bold d-flex justify-content-between align-items-center">
    Cuenta general por cobrar
    <span id="items">Total 0</span>
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
    Citas por cobrar
    <span>Total 6</span>
  </div>
  <div class="card-body servicios">

    <ul class="list-group-flush prod_cob">
  
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

    <h1  class="font-weight-bold"><i class="fa fa-dollar text-seremas" aria-hidden="true"></i><span id="pesos">00.00</span></h1>

    
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

<script>






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

                 $.each(JSON.parse(response), function(i, v) {
                  var p = v.title;

                  precio = v.precio;
                      
                    console.log(v.precio);
                    $('#pagos').append('<li id="dg1" class="list-group-item d-flex justify-content-between align-items-center" draggable="true" ondragstart="drag(event)" ><p> '+p+' <br> <small>'+p[0]+'</small></p><span class="">$'+v.precio+'</span></li>');
                    
                 });




                $("#items").html('Total '+$("#pagos li").length);  

                $('#buscar').val(' '); 

                var pesos = $('#pesos').html();

                pesos = parseFloat(pesos) + parseFloat(precio);
                     
                    console.log(pesos);  

                    $('#pesos').html(pesos.toFixed(2)); 

                }

        });



   



 
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