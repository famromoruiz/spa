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
							<p>Nombre: <?= $model->nombre ?></p>
							<p>Nik: <?= $model->nikname ?></p>
						</div>
						<div class="col-md-6">
							<p>Email: <?= $model->email ?></p>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
</div>