<?php
use \route\Route;
?>
<div class="container-fluid">

  <div class="row b_cliente" >

    <div class="col-md-11">

      <div class="input-group " >


       <select name="cliente" id="client" style="width: 100%">
        <option></option>
          <?php foreach($this->modelCliente->Listar_normal() as $c) {?>
  <option value="<?= $c->id_cliente?>"><?php echo $c->nombre.' '.$c->a_paterno.' '.$c->a_materno?></option>
<?php } ?>
       </select>
        

          

     </div>

  </div>
  <div class="col-md-1">
    
            <button id="agregar_cliente" onclick="cliente()" class="btn btn-outline-seremas btn-block" type="button" id="button-addon2"><i class="fa fa-user" aria-hidden="true"></i></button>
          
  </div>
</div>

  
<div class="ventas d-none">
  <div class="row">

    <div class="col-md-6">

      <div class="row">

        <div class="col-md-12">

            <div class="card">

              <div class="card-header bg-seremas text-white font-weight-bold d-flex justify-content-between align-items-center">
               Tiket <span id="items">Productos / Servicios Total 0</span>
             </div>

            
<div class="productos">
             <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Descripcion</th>
      <th scope="col" class="text-center">Cantidad</th>
      <th scope="col" class="text-center">Precio</th>
      
    </tr>
  </thead>
  <tbody class="prod" id="pagos">
    
  </tbody>
</table>
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

            <div class=" servicios">

              <ul class="list-group-flush prod_cob  items_2">

              <!-- lista de cobros -->
  
            </ul>
        </div>
    </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header bg-seremas text-white text-center font-weight-bold">
              Agregar Articulo
            </div>
            <hr>
            <div class="articulos">
            <ul class="nav nav-pills  nav-justified" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-productos-tab" data-toggle="pill" href="#pills-productos" role="tab" aria-controls="pills-productos" aria-selected="true">Productos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-servicios-tab" data-toggle="pill" href="#pills-servicios" role="tab" aria-controls="pills-servicios" aria-selected="false">Servicios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-paquetes-tab" data-toggle="pill" href="#pills-paquetes" role="tab" aria-controls="pills-paquetes" aria-selected="false">Paqutes</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-productos" role="tabpanel" aria-labelledby="pills-productos-tab">
  <br>
  <div class="row">
    <div class="col-md-6">
       <div class="input-group ">

        <datalist id="busqueda">
          
        </datalist>

        <input id="buscar" list="busqueda" type="search" class="form-control" placeholder="Productos"  aria-label="producto" aria-describedby="button-addon2" onkeyup="buscar(this.value);">
        

        

     </div>
    </div>
    <div class="col-md-6">
             <div class="input-group ">


        <input id="cantidad"  min="1"  type="number" class="form-control" placeholder="Cantidad"  aria-label="cantidad" aria-describedby="button-addon2" >

          <div class="input-group-append">
            <button onclick="agregar_p()" class="btn btn-outline-seremas" type="button" id="button-addon2"><i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>

     </div>
    </div>
  </div>
  
   </div>
  <div class="tab-pane fade" id="pills-servicios" role="tabpanel" aria-labelledby="pills-servicios-tab">
    <br>
    <div class="form-row">
    <div class="col">
    <label for="zona">Zona</label>
    <select class="form-control zonas" style="width: 100%" id="zona">
      <option></option>
      <?php foreach ($dataproviderZonas as $zona) {?>
        <option value="<?= $zona->id_zona ?>"><?= $zona->nombre ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="col">
    <label for="servicio">Servicio</label>
    <select class="form-control servicio" style="width: 100%" id="servicio">
      
    </select>
  </div>
</div>
<br>
<button type="button" class="btn btn-seremas btn-sm" onclick="agregar_servicio();">Agregar</button>
  </div>
  <div class="tab-pane fade" id="pills-paquetes" role="tabpanel" aria-labelledby="pills-paquetes-tab">...</div>
</div>
</div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
         <div class="col-md-12">
          <div class="card ">
  <div class="card-header bg-seremas text-white text-center font-weight-bold">
    TOTAL
  </div>
  <div class="card-body text-center">

    <h1  class="font-weight-bold"><i class="fa fa-dollar text-seremas" aria-hidden="true"></i><span id="pesos" class="pesos">0.00</span></h1>

    
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
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cobrar</h5>
        
      </div>
      <div class="modal-body ">
        <div class="row">
          <div class="col-md-12 text-center">
        <h1  class="font-weight-bold"><i class="fa fa-dollar text-seremas" aria-hidden="true"></i><span id="pesos_2" class="pesos">0.00</span></h1>
            
          </div>
        </div>

        <div class="row m-pago">
          <div class="col-md-12 d-flex justify-content-center">

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input efectivo">
              <label class="custom-control-label" for="customRadioInline1">Efectivo</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input tarjeta">
              <label class="custom-control-label" for="customRadioInline2">Tarjeta credito / debito</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input credito">
              <label class="custom-control-label" for="customRadioInline3">Credito</label>
            </div>

          </div>
        </div>

        <div class="row m-pago">
          <div class="col-md-12 formas_pago">
            
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-seremas confirmar disabled" onclick="confirmar();">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<script>

window.indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;

window.IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.msIDBTransaction;

window.IDBKeyRange = window.IDBKeyRange || window.webkitIDBKeyRange || window.msIDBKeyRange;

if (!window.indexedDB) {
     window.alert("Your browser doesn't support a stable version of IndexedDB.");
}

var openRequest = indexedDB.open("spa",1);



openRequest.onupgradeneeded = function(e) { 
// cuando es necesario crear las tablas de la base de datos

var thisDB = e.target.result;

if(!thisDB.objectStoreNames.contains("productos")) {

  var os = thisDB.createObjectStore("productos", {keyPath: "upc"}); // crear tabla
  var os = thisDB.createObjectStore("citas", {keyPath: "id_cita"}); // crear tabla

}

}

openRequest.onsuccess = function(e) {
     // se ha creado con exito
} 

var db;
var request = indexedDB.open("spa");

var client_id;

request.onerror = function(event) {
  alert("¿Por qué no permitiste que mi aplicación web use IndexedDB?");
};

request.onsuccess = function(event) {
  db = request.result;
};


function cliente(id){
  client_id = id;

  $.ajax({

    data:  { id : client_id},
    url:   "<?= Route::Ruta(['ajax' , 'Listar_citas_por_cobrar']) ?>",
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {

      $('.items_2').html(response);
    }

  });

  $('.ventas').removeClass('d-none');
  $('.b_cliente').addClass('d-none');
}
  


$(document).ready(function(){

  $('#client').select2({
       width: 'resolve',
       placeholder: 'Seleccione Cliente...',
        theme: "bootstrap4"
   
    }).addClass("cliente");



  $(".pagos_2").html('Total '+$(".items_2 li").length);

  $('.zonas').select2({
       width: 'resolve',
       placeholder: 'Seleccione...',
        selectOnClose: true,
        theme: "bootstrap4"
   
    }).addClass("zonas");

  $('.servicio').select2({
       width: 'resolve',
       placeholder: 'Seleccione...',
        selectOnClose: true,
        theme: "bootstrap4"
   
    }).addClass("servicio");

});

$('#client').on('select2:select', function (e) {
  
  var id = e.params.data.id;

  $('#agregar_cliente').attr('onclick', 'cliente("'+id+'")');
  
});


$('.zonas').on('select2:select', function (e) {
  
  var id = e.params.data.id;
  $.ajax({

    data:  {id : id},
    url:   '<?= Route::Ruta(['ajax' , 'Listar_servicios_punto_venta']) ?>',
    type:  'post',
    datatype: 'json',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
     
      var servicios = JSON.parse(response);
      if (servicios.length == 0) {
        servicios = [];
      }
       $('.servicio').select2({
       width: 'resolve',
       data:servicios,
       placeholder: 'Seleccione...',
        selectOnClose: true,
        theme: "bootstrap4"
   
    }).addClass("servicio");

      
    }

  });
});

var metodo_pago = "";

$('input:radio').on("click", function(){
  habilitar_boton_confirmar();
});

$('.efectivo').on("click", function(){

  metodo_pago = "efectivo";

  $('.formas_pago').html(`
    <br>
    <div class="input-group mb-3">
      <div class="input-group-prepend"> <span class="input-group-text text-seremas"><i class="fa fa-dollar" aria-hidden="true"></i>
</span></div><input placeholder="efectivo" id="efectivo" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
    </div>`);
});

$('.tarjeta').on("click", function(){

   metodo_pago = "tarjeta";
  $('.formas_pago').html(`
    <br>
    <div class="input-group mb-3">
      <div class="input-group-prepend"> <span class="input-group-text text-seremas"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>
</span></div><input type="text" id="tarjeta" placeholder="ref" class="form-control" aria-label="">
    </div>`);
});

$('.credito').on("click", function(){
   metodo_pago = "credito";
  $('.formas_pago').html('');
});


function habilitar_boton_confirmar(){
    if ($( ".confirmar" ).hasClass( "disabled" )) {
      $('.confirmar').removeClass('disabled');
    }else{
       
    }
}



function buscar(b){

 

if ( b === '') {
  $('#busqueda').html('');
}else{

   $.ajax({
                data:  { q:b },
                url:   '<?= Route::Ruta(['ajax' , 'ventas']) ?>',
                type:  'get',
                beforeSend: function () {
                        // $("#alert").html('<div class="alert alert-secondary" role="alert">Procesando, espere por favor...</div>');

                },
                success:  function (response) {

                  $('#busqueda').html('');
               
                

                 $.each(JSON.parse(response), function(i, v) {
                   
                    $('#busqueda').append('<option value="'+v.title+'"></option>');
                    
                 });




                  
                     
                       

                }

        });

}

   

 
}

function agregar_p(){

var transaction = db.transaction(["productos"],"readwrite");
var store = transaction.objectStore("productos");




  if ($('#buscar').val() == '') {
    bootbox.alert({
    title: ' ',
    message: "Debe elegir un producto!",
    size: 'small'
});
  }else{
    if ($('#cantidad').val() == '') {
       bootbox.alert({
    title: ' ',
    message: "La cantidad no puede estar vacia!",
    size: 'small'
});
    }else{

     var str = $('#buscar').val().split(' ');

     

      

 var cantidad = $('#cantidad').val();

 // prod_alm.push({upc: str[0] , cantidad: cantidad });

 var request = store.add({upc: str[0] , cantidad: cantidad});

request.onerror = function(e) {
  alert('el producto con upc:'+str[0]+' ya se cargo al tiket si deseas actualizar la cantidad eliminalo para agregarlo con la nueva cantidad');
}

request.onsuccess = function(e) {
   var p =str[0];

  var precio;


   $.ajax({
                data:  { p:p },
                url:   '<?= Route::Ruta(['ajax' , 'ventas']) ?>',
                type:  'get',
                beforeSend: function () {
                        // $("#alert").html('<div class="alert alert-secondary" role="alert">Procesando, espere por favor...</div>');

                },
                success:  function (response) {

                 $.each(JSON.parse(response), function(i, v) {
                  var p = v.title;

                  precio = v.precio * cantidad;



                   var id = $("#pagos tr").length + 1;
                      
                   
                   

                    $('#pagos').append('<tr onclick="remover_fila(this)" id="fila_'+id+'" class="fila"><th class="text-center" scope="row"><span class="text-danger" > <i class="fa fa-times" aria-hidden="true"></i></span></th><td class="upc">'+p+'</td><td class="text-center">'+cantidad+'</td><td class="text-right costo">$'+precio.toFixed(2)+'</td></tr>');
                    
                 });




                $("#items").html('Total '+$("#pagos tr").length);  

                $('#buscar').val('').focus();
                $('#cantidad').val('');

                var pesos = $('#pesos').html();

                pesos = parseFloat(pesos) + parseFloat(precio);
                     
                    

                    $('.pesos').html(pesos.toFixed(2)); 

                }

        });
    }
}


      

 


  }


 
}

function agregar_servicio(){

  var id =$('#servicio').val();

  $.ajax({

    data:  {id : id},
    url:   "<?= Route::Ruta(['ajax' , 'Obtener_servicio']) ?>",
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
      var servicio = JSON.parse(response);
     

      var id = $("#pagos tr").length + 1;
      var precio = parseFloat(servicio.regular);
      var p = $('#zona').text()+' '+servicio.tratamiento;
      var cantidad = 1;

       $('#pagos').append('<tr onclick="remover_fila(this)" id="fila_'+id+'" class="fila"><th class="text-center" scope="row"><span class="text-danger"> <i class="fa fa-times" aria-hidden="true"></i></span></th><td>'+p+'</td><td class="text-center">'+cantidad+'</td><td class="text-right costo">$'+precio.toFixed(2)+'</td></tr>');

       $("#items").html('Total '+$("#pagos tr").length); 

        var pesos = $('#pesos').html();

            pesos = parseFloat(pesos) + parseFloat(precio);

           
                     
                    

           $('.pesos').html(pesos.toFixed(2)); 
    }

  });
}

function remover_fila(test){

  var upc = $(test).children('.upc').text().split(' ');
  // var id_cita = $(test).children('input').val();

  var request = db.transaction(["productos"], "readwrite")
                .objectStore("productos")
                .delete(upc[0]);

  // var request = db.transaction(["citas"], "readwrite")
  //               .objectStore("citas")
  //               .delete(id_cita);

  var precio = parseFloat($(test).children('.costo').text().substr(1));

    
  var pesos = $('#pesos').html();

       pesos = parseFloat(pesos) - parseFloat(precio);

        $('.pesos').html(pesos.toFixed(2)); 
        $(test).remove();
        $("#items").html('Total '+$("#pagos tr").length);

  var total = $("#pagos tr").length;
}


function agregar_citas_pago(id ,nombre , costo, fecha, id_cita){

  var transaction = db.transaction(["citas"],"readwrite");
  var store = transaction.objectStore("citas");

  var request = store.add({id_cita: id_cita});

  

 var p = 'Cita con fecha del '+fecha;
 var cantidad = 1;
 var precio = parseFloat(costo.replace(',', ''));


     $('#pagos').append(`
      <tr onclick="remover_fila(this)" id="fila_`+id+`" class="fila">
        <th class="text-center" scope="row"><span class="text-danger"> <i class="fa fa-times" aria-hidden="true"></i></span></th>
        <td>`+p+`</td>
        <td class="text-center">`+cantidad+`</td>
        <td class="text-right costo">$`+precio.toFixed(2)+`</td>
        <input type="hidden" value="`+id_cita+`">
      </tr>`);



   $("#items").html('Total '+$("#pagos li").length);

  $('#'+id).remove();

   $(".pagos_2").html('Total '+$(".items_2 li").length);

  costo =costo.replace(",","");

 



 var pesos = $('#pesos').html();

                pesos = parseFloat(pesos) + parseFloat(costo);  

                $('.pesos').html(pesos.toFixed(2)); 

}


function confirmar(){

  var transaction_p = db.transaction(["productos"],"readwrite");
  var store_p = transaction_p.objectStore("productos");

  var request = store_p.getAll();

  

  request.onsuccess = function(event) {

   var test = request.result;

       
 $.post("<?= Route::Ruta(['ajax' , 'Descontar_almacen']) ?>",{test}, function(json, textStatus) {
      
  }).then( function(response){
    console.log(response);
  });


};





//   store_p.getAllItems(function (items) {

//     var len = items.length;

//     for (var i = 0; i < len; i += 1) {

//         console.log(items[i]);

//     }

// });



  

 


 
  var descripcion = $('#pagos').html();
  var monto = parseFloat($('#pesos').html());
  var metodo = metodo_pago;

  //console.log(client_id , descripcion, monto , metodo);
  switch(metodo_pago) {
  case "efectivo":

    var pesos = parseFloat($('#pesos').html());
    var cambio =  $('#efectivo').val() - pesos ;
        
    $('.m-pago').remove();
    $('#exampleModalLongTitle').html('Cambio:');
    $('#pesos_2').html(cambio.toFixed(2));
    break;
  case "tarjeta":
    var cambio =  0 ;
        
    $('.m-pago').remove();
    $('#exampleModalLongTitle').html('Cambio:');
    $('#pesos_2').html(cambio.toFixed(2));
    break;
  case "credito":

    break;
}
$('.cancelar').remove();
$('.confirmar').attr('onclick', 'nueva_venta();').html('Nueva Venta');
}

function nueva_venta(){
  location.reload();
}






  $(function(){
  $('.productos').slimScroll({
    height: '240px'
  }); 

  $('.articulos').slimScroll({
    height: '200px'
  });

  $('.servicios').slimScroll({
    height: '120px'
  });
});



    window.onbeforeunload = function (e) {
var message = "Message to Show";
e = e ;
// For IE and Firefox
if (e) {
//e.returnValue = message;
//// ACTION
cerrar();
// console.log(e);
// return message;
}
 // For Safari//// ACTION
//return message;
};

function cerrar(){
  var transaction = db.transaction(["productos"],"readwrite");
  var store = transaction.objectStore("productos");

  var transaction_c = db.transaction(["citas"],"readwrite");
  var store_c = transaction_c.objectStore("citas");

  store.clear();
  store_c.clear();
}

</script>