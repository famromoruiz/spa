<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Agregar Servicio
				</div>
				<div class="card-body">

					<form action="" method="post">
					
					<div class="row">
						<div class="col-md-6">
							
                    		<p>
								<div class="form-group">
									<label class="control-label">Tratamiento:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="nombre" name="tratamiento" value="<?= $model->tratamiento ?>"/>
                    			</div>
                    		</p>
							<p>
								<div class="form-group">
                    				 <label for="cliente">Zona:</label>
									 <select id="zona" class="form-control js-example-basic-single" style="width: 100%" name="id_zona">
									  <?php foreach($this->modelZonas->Listar_normal() as $z) {?>
									  <option value="<?= $z->id_zona?>"><?php echo $z->nombre?></option>
									<?php } ?>
									</select>
                    			</div>
							</p>
							<p>
								<div class="form-group">
									<label class="control-label">Tiempo:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="Tiempo en minutos" name="tiempo" value="<?= $model->tiempo ?>"/>
                    			</div>
							</p>
						</div>
						<div class="col-md-6">
							
							<p>
								<div class="form-group">
									<label class="control-label">Precio:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="precio" name="precio" value="<?= $model->regular ?>"/>
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