<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Agregar Proveedor
				</div>
				<div class="card-body">

					<form action="" method="post">
					
					<div class="row">
						<?php  include('_form.php'); ?>
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