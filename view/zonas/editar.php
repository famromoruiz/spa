<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<?php  echo $model->nombre == null ? 'Agregar Zona' : 'Actualizar: '.$model->nombre;  ?>
				</div>
				<div class="card-body">

					<form action="" method="post">
					
					<div class="row">
						<div class="col-md-6">
							
                    		<p>
								<div class="form-group">
									<label class="control-label">Nombre:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="nombre" name="nombre" value="<?= $model->nombre ?>"/>
                    				<input maxlength="100" type="text" hidden="" required="required" class="form-control" placeholder="id" name="id_zona" value="<?= $model->id_zona ?>"/>
                    			</div>
                    		</p>
							<p>
								<div class="form-group">
									<label class="control-label">Descripcion:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="descripcion" name="descripcion" value="<?= $model->descripcion ?>"/>
                    			</div>
							</p>
						</div>
						<div class="col-md-6">
							
							
							
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