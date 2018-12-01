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
<button type="button" class="btn btn-seremas float-right" data-toggle="modal" data-target="#exampleModalCenter">
  Agregar
</button>
  </div>
</div>
<br>
<div class="row animated fadeIn">

	<div class="col-md-12">
		<div class="card">
  <div class="card-header bg-seremas text-white">
    Productos
  </div>

  <div class="table-responsive datos">


    <?= Gridview::Gridview($model['lista'],
      [
        'etiquetas' => array('upc','nombre','descripcion','precio','precio_publico'),
        'atributos' => array('upc','nombre','descripcion','precio','precio_publico'),
        'paginas' => $model['paginas']
      ]); ?>

 </div>



</div>
	</div>
</div>

</div>
<script>
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