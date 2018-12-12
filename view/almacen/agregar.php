<?php
use \route\Route;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Agregar Producto
				</div>
				<div class="card-body">

					<form action="" method="post">
					
					<div class="row">
						<div class="col-md-6">
							<p>
								<label for="producto">Servicio</label>
    <select class="form-control producto" style="width: 100%" id="id_producto" name="id_producto">
      
    </select>
                    		</p>
                    		<p>
								<div class="form-group">
									<label class="control-label">Cantidad:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="cantidad" name="cantidad" value=""/>
                    			</div>
                    		</p>
							<p>
								<div class="form-group">
									<label class="control-label">Stock:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="Stock" name="min_stock" value=""/>
                    			</div>
							</p>
						</div>
						
					</div>

					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-seremas" type="submit">Guardar</button>
						</div>
					</div>

				</form>
					
				</div>
			</div>
		</div>
	</div>
	
</div>

<script>


	$(document).ready(function(){

		alert('hola');

		$.ajax({

    data:  {id : 1},
    url:   '<?= Route::Ruta(['ajax' , 'Listar_productos_almacen']) ?>',
    type:  'post',
    datatype: 'json',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
      console.log(response);
      var servicios = JSON.parse(response);
      if (servicios.length == 0) {
        servicios = [];
      }
        $('.producto').select2({
       width: 'resolve',
       data:servicios,
       placeholder: 'Seleccione...',
        selectOnClose: true,
        theme: "bootstrap4"
   
    }).addClass("producto");
    }

  });

	});
</script>