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
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Compras
				</div>
				<div class="card-body">
					
					Compras realisadas
				</div>
			</div>
		</div>
	</div>
</div>