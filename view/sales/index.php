<?php
use \route\Route;
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="input-group mb-4">
        
        <select id="bs" class="form-control buscar" name="bs">
  <?php foreach($this->modelProductos->Listar() as $c) {?>
  <option value="<?= $c->id_producto?>"><?php echo $c->descripcion?></option>
<?php } ?>
</select>
  <!-- <input id="buscar" type="text" class="form-control" placeholder="Productos" autofocus="" aria-label="productos" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-seremas" type="button" id="button-addon2"><i class="fa fa-plus" aria-hidden="true"></i></button>
  </div> -->
</div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
  <div class="card-header bg-seremas text-white font-weight-bold d-flex justify-content-between align-items-center">
    Cuenta general por cobrar
    <span>Total 6</span>
  </div>
  <div class="card-body productos">

    <ul id="pagos" class="list-group-flush " ondrop="drop(event)" ondragover="allowDrop(event)">
  <li class="list-group-item d-flex justify-content-between align-items-center ">
    <p>
       Facial <br> <small>Vaporisado</small>
    </p>
   
    <span class="">$ 100.00</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <p>
       Facial <br> <small>Vaporisado</small>
    </p>
   
    <span class="">$ 100.00</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <p>
       Facial <br> <small>Vaporisado</small>
    </p>
   
    <span class="">$ 100.00</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <p>
       Facial <br> <small>Vaporisado</small>
    </p>
   
    <span class="">$ 100.00</span>
  </li>
</ul>

    
   
  </div>
</div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
  <div class="card-header bg-seremas text-white font-weight-bold d-flex justify-content-between align-items-center">
    Citas por cobrar
    <span>Total 6</span>
  </div>
  <div class="card-body servicios">

    <ul class="list-group-flush">
  <li id="dg1" class="list-group-item d-flex justify-content-between align-items-center" draggable="true" ondragstart="drag(event)" >
    <p>
       Masaje dropp <br> <small>Vaporisado</small>
    </p>
   
    <span class="">$ 100.00</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <p>
       Facial <br> <small>Vaporisado</small>
    </p>
   
    <span class="">$ 100.00</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <p>
       Facial <br> <small>Vaporisado</small>
    </p>
   
    <span class="">$ 100.00</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <p>
       Facial <br> <small>Vaporisado</small>
    </p>
   
    <span class="">$ 100.00</span>
  </li>
</ul>

    
   
  </div>
</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
  <div class="card-header bg-seremas text-white text-center font-weight-bold">
    TOTAL
  </div>
  <div class="card-body text-center">

    <h1 class="font-weight-bold"><i class="fa fa-dollar text-seremas" aria-hidden="true"></i> 100.00</h1>

    
</div>
<div class="card-footer text-muted">
    <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-outline-seremas  btn-block">PAGAR</button>
  </div>
</div>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  $(document).ready(function() {

   $('.buscar').select2({
        placeholder: '',

   });
 });




  $(function(){
  $('.productos').slimScroll({
    height: '240px'
  });

  $('.servicios').slimScroll({
    height: '120px'
  });
});
</script>