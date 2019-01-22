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
  var os = thisDB.createObjectStore("paquetes", {keyPath: "id_paquete" , autoIncrement:true}); // crear tabla

}

}

openRequest.onsuccess = function(e) {
     // se ha creado con exito
} 

var db;
var request = indexedDB.open("spa");

var client_id;
var packs;
var rebaja_pack = 1;

request.onerror = function(event) {
  alert("¿Por qué no permitiste que mi aplicación web use IndexedDB?");
};

request.onsuccess = function(event) {
  db = request.result;
};

$('#buscar').on('keyup input', function(){
  buscar($('#buscar').val());
});





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

      //$('.items_2').html(response); return;

      var l_c_p_c = JSON.parse(response);

      packs = l_c_p_c.servicios;

     // console.log(packs);

      $('.items_2').html(l_c_p_c.boton);
      $(".pagos_2").html('Total '+$(".items_2 li").length);
    }

  });

  $('.ventas').removeClass('d-none');
  $('.b_cliente').addClass('d-none');
}


 // $(function() {
 //    $('#ventas-paquetes').change(function() {
 //      let status = $(this).prop('checked');
 //      localStorage.setItem("status-venta",status);
 //      console.log(localStorage.getItem("status-venta"));
 //    })
 //  });
  


$(document).ready(function(){

   if (localStorage.getItem("status-venta") == "true") {

    //hola

    //alert('chek is true');
          $('#ventas-paquetes').bootstrapToggle('on');
        }else{
          $('#ventas-paquetes').bootstrapToggle('off');
           //alert(typeof(localStorage.getItem("status-venta")));
        }

  $('#client').select2({
       width: 'resolve',
       placeholder: 'Seleccione Cliente...',
        theme: "bootstrap4"
   
    }).addClass("cliente");

   $('#promo').select2({
       width: 'resolve',
       placeholder: 'Seleccione Promo...',
      
        theme: "bootstrap4"
   
    }).addClass("promo");



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


  $('.zonas_p').select2({
       width: 'resolve',
       placeholder: 'Seleccione...',
        selectOnClose: true,
        theme: "bootstrap4"
   
    }).addClass("zonas_p");

  $('.servicio_p').select2({
       width: 'resolve',
       placeholder: 'Seleccione...',
        selectOnClose: true,
        theme: "bootstrap4"
   
    }).addClass("servicio_p");

});




$('#client').on('select2:select', function (e) {
  
  var id = e.params.data.id;

  $('#agregar_cliente').attr('onclick', 'cliente("'+id+'")');
  
});

$('.promo').on('select2:select', function (e) {
     var descuento = '.'+parseInt(e.params.data.id);

     let cantidad = parseFloat($('#pesos_2').html()).toFixed(2);

     let promo = parseFloat(cantidad-cantidad*descuento).toFixed(2);

     $('#pesos_2').html(promo);

     
});



$('.cancelar').on('click',function(){
  $('#promo').val('').trigger('change');
  $('#body_tck').html("");
});


$('.pagar').on('click',function(){

 // window.print();

  $('#pesos_2').html($('.pesos').html());
  
});

$('.zonas').on('select2:select', function (e) {

   $('#servicio').val('').trigger('change');
  
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
 $('#servicio').val('').trigger('change');

      // var servicios = [];
     
      //  servicios = JSON.parse(response);

      var servicios = response;

       $('#servicio').html(servicios);

//       var data = $.map(servicios, function (obj) {
//   obj.id = obj.id || obj.pk; // replace pk with your identifier

//   return obj;
// });
     // var servicios = response;
      // if (servicios.length == 0) {
      //   servicios = [];
      // }
     // console.log(servicios);
       $('.servicio').select2({
      
        theme: "bootstrap4"
   
    }).addClass("servicio");

      
    }

  });
});

$('.zonas_p').on('select2:select', function (e) {

   $('#servicio_p').val('').trigger('change');
  
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
 $('#servicio_p').val('').trigger('change');

      // var servicios = [];
     
      //  servicios = JSON.parse(response);

      var servicios = response;

       $('#servicio_p').html(servicios);

//       var data = $.map(servicios, function (obj) {
//   obj.id = obj.id || obj.pk; // replace pk with your identifier

//   return obj;
// });
     // var servicios = response;
      // if (servicios.length == 0) {
      //   servicios = [];
      // }
      //console.log(servicios);
       $('.servicio_p').select2({
      
        theme: "bootstrap4"
   
    }).addClass("servicio_p");

      
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

  

  var datos_zonas = $('#zona').select2('data');

  //console.log();

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
      var p = datos_zonas[0].text+' '+servicio.tratamiento;
      var cantidad = 1;

       $('#pagos').append('<tr onclick="remover_fila(this)" id="fila_'+id+'" class="fila"><th class="text-center" scope="row"><span class="text-danger"> <i class="fa fa-times" aria-hidden="true"></i></span></th><td>'+p+'</td><td class="text-center">'+cantidad+'</td><td class="text-right costo">$'+precio.toFixed(2)+'</td></tr>');

       $("#items").html('Total '+$("#pagos tr").length); 

        var pesos = $('#pesos').html();

            pesos = parseFloat(pesos) + parseFloat(precio);

           
                     
                    

           $('.pesos').html(pesos.toFixed(2)); 
    }

  });
}


function agregar_paquete(){

  

  var datos_zonas = $('#zonas_p').select2('data');

  //console.log();

  var id =$('#servicio_p').val();

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
      var cantidad = $('#cantidad_p').val();

      var precio = parseFloat(servicio.regular) * cantidad;
      var p = datos_zonas[0].text+' '+servicio.tratamiento;

      var transaction = db.transaction(["paquetes"],"readwrite");
      var store = transaction.objectStore("paquetes");

      var request = store.add({id_cliente: client_id, id_servicio: servicio.id_servicio, cantidad: cantidad});

      
     
      request.onsuccess = function(e){
        
        var id_pq = request.result;

        $('#pagos').append('<tr onclick="remover_fila(this,'+id_pq+',undefined)" id="fila_'+id+'" class="fila"><th class="text-center" scope="row"><span class="text-danger"> <i class="fa fa-times" aria-hidden="true"></i></span></th><td>'+p+'</td><td class="text-center">'+cantidad+'</td><td class="text-right costo">$'+precio.toFixed(2)+'</td></tr>');

       $("#items").html('Total '+$("#pagos tr").length); 

        var pesos = $('#pesos').html();

            pesos = parseFloat(pesos) + parseFloat(precio);

           
                     
                    

           $('.pesos').html(pesos.toFixed(2)); 

        
      };

      
   


       

          
    }

  });
}

function remover_fila(test,id_paq,id_cita){

  // console.log(test , id_paq , id_cita);


  // return;


  if (typeof(id_paq) == 'number') {
    console.log(id_paq);
     var request_p = db.transaction(["paquetes"], "readwrite")
                .objectStore("paquetes")
                .delete(id_paq);
  }

  if (typeof(id_cita) == 'number') {
    id_cita.toString();
    console.log(id_cita.toString());
    var request_cit = db.transaction(["citas"], "readwrite")
                .objectStore("citas")
                .delete(id_cita.toString());

    $.ajax({

    data:  { id : client_id},
    url:   "<?= Route::Ruta(['ajax' , 'Listar_citas_por_cobrar']) ?>",
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {

      //$('.items_2').html(response); return;

      var l_c_p_c = JSON.parse(response);

      packs = l_c_p_c.servicios;

     // console.log(packs);

      $('.items_2').html(l_c_p_c.boton);
      $(".pagos_2").html('Total '+$(".items_2 li").length);
    }

  });
  }
  

  var upc = $(test).children('.upc').text().split(' ');
  // var id_cita = $(test).children('input').val();

  var request = db.transaction(["productos"], "readwrite")
                .objectStore("productos")
                .delete(upc[0]);

  

  var precio = parseFloat($(test).children('.costo').text().substr(1));

    
  var pesos = $('#pesos').html();

       pesos = parseFloat(pesos) - parseFloat(precio);

        $('.pesos').html(pesos.toFixed(2)); 
        $(test).remove();
        $("#items").html('Total '+$("#pagos tr").length);

  var total = $("#pagos tr").length;
}


function agregar_citas_pago(id ,nombre , costo, fecha, id_cita){

  rebaja_pack = 0;


  var transaction = db.transaction(["citas"],"readwrite");
  var store = transaction.objectStore("citas");

  var request = store.add({id_cita: id_cita});

  

 var p = 'Cita con fecha del '+fecha;
 var cantidad = 1;
 var precio = parseFloat(costo.replace(',', ''));


     $('#pagos').append(`
      <tr onclick="remover_fila(this,undefined,`+id_cita+`)" id="fila_`+id+`" class="fila">
        <th class="text-center" scope="row"><span class="text-danger"> <i class="fa fa-times" aria-hidden="true"></i></span></th>
        <td>`+p+`</td>
        <td class="text-center">`+cantidad+`</td>
        <td class="text-right costo">$`+precio.toFixed(2)+`</td>
        <input type="hidden" value="`+id_cita+`">
      </tr>`);



   $("#items").html('Total '+$("#pagos tr").length);

  $('#'+id).remove();

   $(".pagos_2").html('Total '+$(".items_2 li").length);

  costo =costo.replace(",","");

 



 var pesos = $('#pesos').html();

                pesos = parseFloat(pesos) + parseFloat(costo);  

                $('.pesos').html(pesos.toFixed(2)); 

}


function confirmar(){

   var transaction_paq = db.transaction(["paquetes"],"readwrite");
  var store_paq = transaction_paq.objectStore("paquetes");

  var request_paq = store_paq.getAll();

  

  request_paq.onsuccess = function(event) {

   var paquetes = request_paq.result;

   // console.log(paquetes);return;

       
 $.post("<?= Route::Ruta(['ajax' , 'Inserta_pack']) ?>",{paquetes}, function(json, textStatus) {
      
  }).then( function(response){
    //console.log(response);
  });


};


  if (rebaja_pack == 0) {
    $.ajax({

    data:  { paquetes : packs},
    url:   "<?= Route::Ruta(['ajax' , 'Rebaja_pack']) ?>",
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
     // console.log(response);
    }

  });
  }

  //return;

  var transaction_p = db.transaction(["productos"],"readwrite");
  var store_p = transaction_p.objectStore("productos");

  var request = store_p.getAll();

  

  request.onsuccess = function(event) {

   var productos = request.result;

       
 $.post("<?= Route::Ruta(['ajax' , 'Descontar_almacen']) ?>",{productos}, function(json, textStatus) {
      
  }).then( function(response){
   // console.log(response);
  });


};


var transaction_c = db.transaction(["citas"],"readwrite");
var store_c = transaction_c.objectStore("citas");

var request_c = store_c.getAll();

request_c.onsuccess = function(event) {

   var citas_pv = request_c.result[0];


       
 $.post("<?= Route::Ruta(['ajax' , 'Cobrar_cita']) ?>",{citas_pv}, function(json, textStatus) {
      
  }).then( function(response){
    //console.log(response);
  });


};

 
  var descripcion = $('#pagos').html();
  var tck = $.parseHTML(descripcion);
  var art = [];
  for (var i = 0; i < tck.length -1; i++) {
    let desc = tck[i].nextSibling.children[1].firstChild;
    let cant = tck[i].nextSibling.children[2].firstChild;
    let prec = tck[i].nextSibling.children[3].firstChild;
    art.push({"descripcion" : desc.data , "cantidad" : cant.data, "precio" : prec.data });
  }

   for (var i = 0; i < art.length; i++) {
     $('#body_tck').append(`<tr>
          <td class="cantidad">`+art[i].cantidad+`</td>
          <td class="producto">`+art[i].descripcion+`</td>
          <td class="precio">`+art[i].precio+`</td>
        </tr>`);
   }
   
    var imprimir=document.getElementById("tck");
   newWin= window.open("");
   newWin.document.write(`<style>
    
*{
  font-size: 8px;
  font-family: 'Times New Roman';
}
 
td,
th,
tr,
table {
  border-top: 1px solid black;
  border-collapse: collapse;
}
 
td.producto,
th.producto {
  width: 80px;
  max-width: 80px;
}
 
td.cantidad,
th.cantidad {
  width: 40px;
  max-width: 40px;
  word-break: break-all;
}
 
td.precio,
th.precio {
  width: 40px;
  max-width: 40px;
  word-break: break-all;
}
 
.centrado {
  text-align: center;
  align-content: center;
}
 
.ticket {
  width: 155px;
  max-width: 155px;
}
 
img {
  max-width: inherit;
  width: inherit;
}
</style>`);
   newWin.document.write(imprimir.outerHTML);
   newWin.print();
   newWin.close();

  var monto = parseFloat($('#pesos_2').html()).toFixed(2);
  var metodo = metodo_pago;

 

   $.post("<?= Route::Ruta(['ajax' , 'Tiket']) ?>",{id_cliente: client_id , descripcion: art , monto: monto}, function(json, textStatus) {
      
  }).then( function(response){
    //console.log(response);
  });

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
  $('#body_tck').html("");
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

  var transaction_paq = db.transaction(["paquetes"],"readwrite");
  var store_paq = transaction_paq.objectStore("paquetes");

  store.clear();
  store_c.clear();
  store_paq.clear();
}