<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Agregar Zona
				</div>
				<div class="card-body">

					<form action="" method="post">
					
					<div class="row">
						<div class="col-md-6">
							
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