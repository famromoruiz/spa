<?php
use \route\Route;
?>
<div id="alert-success" class="alert alert-success " style="display:none;" role="alert">
  Cliente añadido corectamente!
</div>
<div class="row animated fadeIn">
	<div class="col-md-4">
<div class="card">
  <div class="card-header bg-seremas text-white">
    Agregar Cliente
  </div>
  <div class="card-body">

  	<div class="row">
  		<div class="col-md-12">
  			
  	<form  id="form">
	  <div class="form-group">
	    <label for="fecha">Fecha</label>
	    <input type='text' class="form-control" id='datetimepicker1' name="fecha" />
	  </div>
	  <div class="form-group">
	    <label for="cliente">Cliente:</label>
 <select id="cliente" class="form-control js-example-basic-single" name="cliente">
 
  <option value=""></option>

</select>
	  </div>
	   <div class="form-group">
	    <label for="Habitacion">Habitacion</label>
	    <select id="habitacion" class="form-control js-example-basic-single" name="habitacion">
  <option value="1">habitacion 1o</option>
  <option value="2">habitacion 2</option>
</select>
	  </div>
	  <div class="form-group">
	    <label for="Masajista">Masajista</label>
	    <select id="masajista" class="form-control js-example-basic-single" name="masajista">
  <option value="1">Alejandro romo</option>
  <option value="2">Cesar Alan</option>
</select>
	  </div>
	  <div class="form-group">
	    <label for="servicios">Servicios</label>
	    <select id="servicios" class="form-control js-example-basic-multiple" name="servicios[]" multiple="multiple">
  <option value="1">Masaje 1</option>
  <option value="2">Masaje 2</option>
</select>
	  </div>
	  
	  <button type="button" onclick="agregarCliente();" class="btn btn-seremas">Guardar</button>
</form>
  		</div>
  	</div>
   <!--  <blockquote class="blockquote mb-0">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote> -->
  </div>
</div>
		
	</div>
	<div class="col-md-8">
		<div class="card">
  <div class="card-header bg-seremas text-white">
    Clientes
  </div>
  <div class="card-body">

  	

  	<div class="row">
  		<div class="col-md-12">
  		<div *ngIf="calendarOptions">
      <div id="listaClientes"></div>
</div>
</div>
  </div>
</div>
	</div>
</div>



<script>


</script>