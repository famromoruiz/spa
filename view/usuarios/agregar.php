<?php
use \route\Route;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Agregar Usuario
				</div>
				<div class="card-body">

					<form action="" method="post">
					
					<div class="row">
						<div class="col-md-6">
							<p>
								<label for="producto">Rol</label>
						    <select class="form-control rol" style="width: 100%" id="rol" name="rol">
						      <option></option>
						      <option value="10">Administrador</option>
						      <option value="20">Cajero</option>
						      <option value="30">Terapeuta</option>
						    </select>
                    		</p>
                    		<p>
								<div class="form-group">
									<label class="control-label">Nombre:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="Nombre completo" name="nombre" value=""/>
                    			</div>
                    		</p>
							<p>
								<div class="form-group">
									<label class="control-label">Email:</label>
                    				<input maxlength="100" type="email" required="required" class="form-control" placeholder="email@email.com" name="email" value=""/>
                    			</div>
							</p>
						</div>
						<div class="col-md-6">
							
								<div class="form-group">
									<label class="control-label">Nik:</label>
                    				<input maxlength="100" type="text" required="required" class="form-control" placeholder="nik" name="nik" value=""/>
                    			</div>
							
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
	$(document).ready(function(){
		$('.rol').select2({
       width: 'resolve',
       placeholder: 'Seleccione...',
        selectOnClose: true,
        theme: "bootstrap4"
   
    }).addClass("rol");
	

	});
</script>