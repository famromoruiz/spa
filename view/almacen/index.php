<?php
use \route\Route;
use \gridview\Gridview;

$pagina = (isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']))?$_REQUEST['pagina']:1;

$model = $this->modelAlmacen->listar($pagina);
?>
<div class="container-fluid">
	<div class="row">
  <div class="col-md-12">
    <!-- Button trigger modal -->
 <a href="?r=almacen/agregar" class="btn btn-seremas float-right" >
  Agregar
</a>
  </div>
</div>
<br>
	<div class="row">
		<div class="col-md-12">
		<div class="card">
		  <div class="card-header">
		    Almacen
        <a href="#" class="btn btn-seremas vale float-right" >
  Vale de salida
</a> <span class="float-right">&nbsp</span> <a href="#" class="btn btn-seremas vale_ver float-right" >
 Ver vales de salida
</a>
		  </div>
	  			<div class="table-responsive datos">

				    <?= Gridview::Gridview($model['lista'],
				      [
				        'etiquetas' => [
                  'producto' => ['nombre' => 'producto'],
                  'proveedor' => ['nombre' => 'proveedor'],
                  'Cantidad' => ['nombre' => 'cantidad', 'css' => 'text-center']
                ],
				        'atributos' => array('prod','prove','cantidad'),
                'css' =>['cantidad' => 'text-center'],
				        'paginas' => $model['paginas'],
				        'id' => $model['id']
				      ]); ?>



	 			</div>
		</div>
	</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalcantidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaleventosTitulo">Actualizar Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalcantidadBody text-center">
        <span></span> + <input id="suma" type="number"> <input id="id_al" type="hidden">
      </div>
      <div class="modal-footer footer_cita">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-seremas" onclick="actualizar();">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalvale" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaleventosTitulo">Vale de salida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalvaleBody text-center">

        <div class="row">
          <div class="col-md-4">
             <p>
              <div class="form-group">
          <label for="producto">Producto:</label>
          <select class="form-control producto" style="width: 100%" id="id_producto" name="id_producto">
            <option></option>
            
          </select>
        </div>
        </p>
          </div>
          <div class="col-md-4">
             <p>
              <div class="form-group">
          <label for="personal">Recibe:</label>
          <select class="form-control usuarios" style="width: 100%" id="id_personal" name="id_prersonal">
            <option></option>
            
          </select>
        </div>
        </p>
          </div>
          <div class="col-md-4">
            <p>
                <div class="form-group">
                  <label for="cantidad">Cantidad:</label>
                            <input maxlength="100" type="number" required="required" class="form-control cantidad" placeholder="cantidad" name="cantidad" value=""/>
                          </div>
                        </p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
             <p>
                <div class="form-group">
                  <label class="control-label">Firma quien recibe:</label>
                            <input maxlength="100" type="password" required="required" class="form-control firma" placeholder="firma" name="firma" value=""/>
                          </div>
                        </p>
          </div>
        </div>
       
      </div>
      <div class="modal-footer footer_cita">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-seremas" onclick="genera_vale();">Generar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modallistavales" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modallistavalesTitulo">Vales de salida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <table class="table" id="list_vale">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Entrega</th>
      <th scope="col">Recibe</th>
    </tr>
  </thead>
  <tbody class="lista_vales">
   <!-- lista vales -->
  </tbody>
</table>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary limpia_vales" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>

<script>

  $('.vale').on('click', function(event) {
    event.preventDefault();
    $.ajax({

    data:  {id : 1},
    url:   '<?= Route::Ruta(['ajax' , 'Listar_productos_almacen_vales']) ?>',
    type:  'post',
    datatype: 'json',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
     // console.log(response);
      var servicios = JSON.parse(response);
      if (servicios.length == 0) {
        servicios = [];
      }
        $('.producto').select2({
       width: 'resolve',
       data:servicios,
       placeholder: 'Seleccione...',
        //selectOnClose: true,
        theme: "bootstrap4"
   
    }).addClass("producto");




    }

  });

    $.ajax({

    data:  {id : 1},
    url:   '<?= Route::Ruta(['ajax' , 'Listar_personal_almacen']) ?>',
    type:  'post',
    datatype: 'json',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
      console.log(response);
      var usuarios = JSON.parse(response);
      if (usuarios.length == 0) {
        usuarios = [];
      }
        $('.usuarios').select2({
       width: 'resolve',
       data:usuarios,
       placeholder: 'Seleccione...',
        //selectOnClose: true,
        theme: "bootstrap4"
   
    }).addClass("usuarios");
    }

  });
     $('#modalvale').modal('toggle');
  });

  function genera_vale(){
    var producto = $('.producto').val();
    var usuario = $('.usuarios').val();
    var cantidad = $('.cantidad').val();
    var firma = $('.firma').val();
      $.ajax({

    data:  {producto : producto , usuario: usuario, cantidad: cantidad, firma: firma},
    url:   '<?= Route::Ruta(['ajax' , 'Verifica_firma']) ?>',
    type:  'post',
    datatype: 'json',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
      //console.log(response);return;
     if (response == 'ok') {
       location.reload();
     }else{
      alert('La firma no es valida!!!');
     }
    }

  });
  }

  $('.vale_ver').on('click', function(event) {
    event.preventDefault();
     $.ajax({

    data:  {nop : 0},
    url:   '<?= Route::Ruta(['ajax' , 'Lista_vales']) ?>',
    type:  'post',
    datatype: 'json',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
      var vale = $.parseJSON(response);

      var flag = 0;

      $.each(vale ,function(i, vale) {
        flag ++;
        $('.lista_vales').append(`<tr>
      <th scope="row">`+flag+`</th>
      <td>`+vale.fecha+`</td>
      <td>`+vale.hora+`</td>
      <td>`+vale.producto+`</td>
      <td>`+vale.cantidad+`</td>
      <td>`+vale.entrega+`</td>
      <td>`+vale.recibe+`</td>
    </tr>`);
      });

       
    }

  });
     $('#modallistavales').modal('toggle');
  });

  $('.limpia_vales').on('click',function(event) {
    event.preventDefault();
    $('.lista_vales').html('');
  });

  function editar(id,cantidad){
    $('.modalcantidadBody span').html(cantidad);
    $('#id_al').val(id);
    $('#modalcantidad').modal('toggle');
  }

  function actualizar(){
   var id = $('#id_al').val();
   var cantidad_anterior = $('.modalcantidadBody span').html();
   var cantidad_a_sumar = $('#suma').val() == '' ? 0 : $('#suma').val();
   var cantidad_nueva = parseInt(cantidad_anterior) + parseInt(cantidad_a_sumar);

    $.ajax({

    data:  {id : id , cantidad: cantidad_nueva},
    url:   '<?= Route::Ruta(['ajax' , 'actualiza_almacen']) ?>',
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
      location.reload();
    }

  });
  }
    
    $('.editar').on('click',function() {
      event.preventDefault();
      /* Act on the event */
    });

	  $('.eliminar').on('click',function(){
    var eliminar = this.id;
    bootbox.confirm({
    title: " ",
    message: "Estas a punto de eliminar este elemento! Quires hacerlo?",
    buttons: {
        confirm: {
            label: '<i class="fa fa-check"></i> Si',
            className: 'btn-seremas'
        },
        cancel: {
            label: '<i class="fa fa-times"></i> No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        
        if (result == true) {
          $.ajax({
            url:   eliminar,
            type:  'get',
            beforeSend: function () {
              // accion antes de envio
            },
            success:  function (response) {
              location.reload();
            }

          });
        }
    }
});
  });

    function actualiza_tabla(pagina) {

if ($('.page-item').hasClass('active')) {

  alert('hola');
}
      

        var url = location.href+'&pagina='+pagina;
        console.log(url)
        $.ajax({

   // data:  cliente,
    url:   url,
    type:  'get',
    dataType:"html",
    beforeSend: function () {
      $('tbody').html('<div id="page-loader"><span class="preloader-interior"></span></div>');
    },
    success:  function (response) {
      //console.log($(response).find("tbody").html());
      //console.log($('tbody').html($(response).find("tbody").html()));
            setTimeout(function(){
        $('tbody').html($(response).find("tbody").html())
      }, 1000);

      

    }
      });
    }
</script>