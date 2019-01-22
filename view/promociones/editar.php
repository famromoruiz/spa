<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Editar Promocion
				</div>
				<div class="card-body">

					<form action="" method="post">
					
					<div class="row">
						<div class="col-md-6">
							
                    		<p>
								<div class="form-group">
									<label class="control-label">Descripcion:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="descripcion" name="descripcion" value="<?= $model->descripcion ?>"/>
                    			</div>
                    		</p>
							<p>
								<div class="form-group">
									<label class="control-label">Descuento (%):</label>
                    				<input min="1" max="100"  type="number" required="required" class="form-control" placeholder="descuento" name="descuento" value="<?= $model->descuento ?>"/>
                    			</div>
							</p>
						</div>
						<div class="col-md-6">
							<p>
								<div class="form-group">
						      <label for="fecha">Inicia</label>
						      <input type='text' class="form-control" id='datetimepicker1' name="inicia" required="required" value="<?= fecha_h($model->inicia) ?>"  />
						    </div>
							</p>
							<p>
								<div class="form-group">
						      <label for="fecha">Termina</label>
						      <input type='text' class="form-control" id='datetimepicker2' name="termina" required="required" value="<?= fecha_h($model->termina) ?>" />
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

<script>
	$('#datetimepicker1').datetimepicker({
   format: 'DD/MM/YYYY'
	});

	$('#datetimepicker2').datetimepicker({
   format: 'DD/MM/YYYY'
	});
</script>