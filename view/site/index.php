<?php
use \route\Route;
?>
<div class="container-fluid">
	<div class="row  align-items-center animated fadeIn" style="height:35em;">
		<div class="col-md-4 col-sm-12 col-xs-12 text-center tool">
			<button type="button" class="btn btn-seremas btn-circle btn-xl" data-placement="top" title="Tooltip on top" onclick="window.location.href='<?= Route::Ruta(['sale']) ?>'"><i class="fa fa-dollar" aria-hidden="true"></i> <p><span>Punto de venta</span></p></button>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12 text-center">
			 <button type="button" class="btn btn-seremas btn-circle btn-xl" onclick="window.location.href='<?= Route::Ruta(['citas']) ?>'"><i class="fa fa-calendar" aria-hidden="true"></i> <p><span>Citas</span></p> </button>


			
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12 text-center">
			 <button type="button" class="btn btn-seremas btn-circle btn-xl" onclick="window.location.href='<?= Route::Ruta(['almacen']) ?>'"><i class="fa fa-archive" aria-hidden="true"></i> <p><span>Almacen</span></p></button>
		</div>
	</div>
</div>
