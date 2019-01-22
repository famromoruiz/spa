<div class="col-md-6">
							
                    		<p>
								<div class="form-group">
									<label class="control-label">nombre:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="nombre" name="nombre" value="<?= $model->nombre ?>"/>
                    			</div>
                    		</p>
							<p>
								<div class="form-group">
									<label class="control-label">rfc:</label>
                    				<input maxlength="15" type="text" required="required" class="form-control" placeholder="rfc" name="rfc" value="<?= $model->rfc ?>"/>
                    			</div>
							</p><p>
								<div class="form-group">
									<label class="control-label">domicilio:</label>
                    				<input maxlength="150" type="text" required="required" class="form-control" placeholder="domicilio" name="domicilio" value="<?= $model->domicilio ?>"/>
                    			</div>
							</p><p>
								<div class="form-group">
									<label class="control-label">telefono:</label>
                    				<input maxlength="10" type="text" required="required" class="form-control" placeholder="telefono" name="tel_1" value="<?= $model->tel_1 ?>"/>
                    			</div>
							</p><p>
								<div class="form-group">
									<label class="control-label">celular:</label>
                    				<input maxlength="10"  type="text" required="required" class="form-control" placeholder="celular" name="tel_2" value="<?= $model->tel_2 ?>"/>
                    			</div>
							</p>
						</div>
						<div class="col-md-6">
							<p>
								<div class="form-group">
						      <label for="fecha">Contacto</label>
						      <input type='text' class="form-control"  name="contacto" value="<?= $model->contacto ?>" placeholder="contacto"  required="required" />
						    </div>
							</p>
							<p>
								<div class="form-group">
						      <label for="fecha">Email</label>
						      <input type='email' class="form-control"  name="email" value="<?= $model->email ?>"  placeholder="email" required="required"/>
						    </div>
							</p>
							
							
							
						</div>