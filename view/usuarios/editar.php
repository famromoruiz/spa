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
									<label class="control-label">Nombre:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="nombre" name="nombre" value="<?= $model->nombre ?>"/>
                    				<input maxlength="100" type="text" hidden="" required="required" class="form-control" placeholder="id" name="id" value="<?= $model->id_usuario?>"/>
                    			</div>
                    		</p>
							<p>
								<div class="form-group">
									<label class="control-label">Nik:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="nikname" name="nik" value="<?= $model->nikname ?>"/>
                    			</div>
							</p>
						</div>
						<div class="col-md-6">
						<p>
								<div class="form-group">
									<label class="control-label">Email:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="email" name="email" value="<?= $model->email ?>"/>
                    			</div>
							</p>
							<p>
								<div class="form-group">
									<label class="control-label">Password:</label>
                    				<input maxlength="100" type="password"  class="form-control" placeholder="password" name="pass" />
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