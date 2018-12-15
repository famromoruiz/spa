<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<?php  echo $model->nombre == null ? 'Agregar Producto' : 'Actualizar: '.$model->nombre;  ?>
				</div>
				<div class="card-body">

					<form action="" method="post">
					
					<div class="row">
						<div class="col-md-6">
							<p>
								<div class="form-group">
									<label class="control-label">UPC:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="UPC" name="upc" value="<?= $model->upc ?>"/>
                    				<input maxlength="100" type="text" hidden="" required="required" class="form-control" placeholder="id" name="id_producto" value="<?= $model->id_producto ?>"/>
                    			</div>
                    		</p>
                    		<p>
								<div class="form-group">
									<label class="control-label">Nombre:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="nombre" name="nombre" value="<?= $model->nombre ?>"/>
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
							<p>
								<div class="form-group row">
									<div class="col-3">
									<label class="control-label">Precio:</label>
                    				<input maxlength="10" type="text" required="required" class="form-control" placeholder="precio" name="precio" value="<?= $model->precio ?>"/>
                    				</div>
                    			</div>
							</p>
							<p>
								<div class="form-group row">
									<div class="col-3">
									<label class="control-label">Precio Publico:</label>
                    				<input maxlength="10" type="text" required="required" class="form-control" placeholder="precio_publico" name="precio_publico" value="<?= $model->precio_publico ?>"/>
                    				</div>
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