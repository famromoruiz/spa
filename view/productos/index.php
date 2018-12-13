<?php 
use \route\Route;
use \gridview\Gridview;

$pagina = (isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']))?$_REQUEST['pagina']:1;

$model = $this->modelProductos->Tabla($pagina);
 ?>
 <div class="container-fluid">
<div id="alert-success" class="alert alert-success " style="display:none;" role="alert">
  
</div>
<div class="row">
  <div class="col-md-12">
    <!-- Button trigger modal -->
<a href="?r=productos/agregar" class="btn btn-seremas float-right" >
  Agregar
</a>
  </div>
</div>
<br>
<div class="row animated fadeIn">

	<div class="col-md-12">
		<div class="card">
  <div class="card-header bg-seremas text-white">
    Productos
  </div>

  <div class="table-responsive datos ">


    <?= Gridview::Gridview($model['lista'],
      [
        'etiquetas' => [
          'upc' => ['nombre' => 'upc'],
          'nombre' => ['nombre' => 'nombre'],
          'descripcion' => ['nombre' => 'descripcion'],
          'precio' => ['nombre' => 'precio', 'css' => 'text-right'],
          'precio publico' => ['nombre' => 'precio publico' , 'css' => 'text-right']
        ],
        'atributos' => array('upc','nombre','descripcion','precio','precio_publico'),
        'css' =>['precio' => 'text-right font-weight-bold' ,'precio_publico' => 'text-right font-weight-bold'],
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