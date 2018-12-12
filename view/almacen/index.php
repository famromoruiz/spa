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

<script>
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
</script>