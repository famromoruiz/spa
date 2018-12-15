<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<?= $model->nombre  ?>
				</div>
				<div class="card-body">
					
					<div class="row">
						<div class="col-md-6">
							<p>UPC: <?= $model->upc ?></p>
							<p>Descripcion: <?= $model->descripcion ?></p>
						</div>
						<div class="col-md-6">
							<p>Precio: <?=  '$'. $model->precio ?></p>
							<p>Precio publico: <?= '$'.  $model->precio_publico ?></p>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
</div>