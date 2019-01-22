<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<?= $model->nombre .' '.$model->a_paterno.' '.$model->a_materno ?>
				</div>
				<div class="card-body">
					
					<div class="row">
						<div class="col-md-6">
							<p>Direccion: <?= $model->direccion.', '.$model->fraccionamiento.' '.$model->estado.', '.$model->municipio ?></p>
							<p>Email: <?= $model->email ?></p>
						</div>
						<div class="col-md-6">
							<p>Telefono: <?= $model->tel_f ?></p>
							<p>Telefono Oficina: <?= $model->tel_o ?></p>
							<p>Celular: <?= $model->cel_1 ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>Facebook: <?= $model->facebook ?></p>
						</div>
						<div class="col-md-6">
							<p>Instagram: <?= $model->instagram ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr class="seremas">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Compras
				</div>
				 <table class="table">
				  <thead>
				    <tr>
				      <th scope="col" class="text-center">#</th>
				      <th scope="col" class="text-center">Fecha / Hora</th>
				      <th scope="col" class="text-center">Monto</th>
				      <th scope="col" class="text-center">tiket</th>
				      
				    </tr>
				  </thead>
				  <tbody class="tiket" id="tiket">
				  	<?php $item = 0; foreach ($model_ticket as $tiket) { $item++; ?>
				    <tr>
				    	<td class="text-center"><?= $item?></td>
				    	<td class="text-center"><?= $tiket->fecha?></td>
				    	<td class="text-center">$<?= $tiket->monto?></td>
				    	<td class="text-center"> <button type="button" class="btn btn-seremas" onclick="tiket('<?= htmlspecialchars($tiket->descripcion)?>');" data-toggle="modal" data-target="#exampleModal">
  Ver tiket
</button></td>
				    </tr>
				<?php } ?>
				  </tbody>
</table>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Paquetes
				</div>
				 <table class="table">
				  <thead>
				    <tr>
				      <th scope="col" class="text-center">#</th>
				      <th scope="col" class="text-center">Paquete</th>
				      <th scope="col" class="text-center">Cantidad</th>
				      
				      
				    </tr>
				  </thead>
				  <tbody class="paquetes" id="paquetes">
				  	<?php $item = 0;  foreach ($model_paquetes as $paquete) { $serv = $this->modelServicios->Obtener($paquete->id_servicio); $item++; ?>
				    <tr>
				    	<td class="text-center"><?= $item?></td>
				    	<td class="text-center"><?= $serv->tratamiento?></td>
				    	<td class="text-center"><?= $paquete->cantidad?></td>
				    	
				    </tr>
				<?php } ?>
				  </tbody>
</table>
			</div>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tiket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">Cantidad</th>
      <th scope="col">Descripcion</th>
      <th scope="col" class="text-center">Precio</th>
    </tr>
  </thead>
  <tbody class="prod" id="pagos">
    
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-seremas disabled">Imprimir</button>
      </div>
    </div>
  </div>
</div>

<script>
	function tiket(descripcion){
		$('#pagos').html(descripcion);
	}
</script>