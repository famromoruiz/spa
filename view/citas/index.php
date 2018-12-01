<?php
use \route\Route;
?>

<div class="container-fluid">
  <div id="alert-success" class="alert alert-success " style="display:none;" role="alert">
  This is a success alert—check it out!
</div>
<div class="row animated fadeIn">
  <div class="col-md-4">
<div class="card">
  <div class="card-header bg-seremas text-white">
    Agendar Cita
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
  <?php foreach($this->modelCliente->Listar_normal() as $c) {?>
  <option value="<?= $c->id_cliente?>"><?php echo $c->nombre.' '.$c->a_paterno.' '.$c->a_materno?></option>
<?php } ?>
</select>
<button type="button" class="btn btn-seremas btn-sm float-right" data-toggle="modal" data-target="#exampleModalCenter">
  Agregar
</button>
    </div>
     <div class="form-group">
      <label for="Habitacion">Habitacion</label>
      <select id="habitacion" class="form-control js-example-basic-single" name="habitacion">
       <?php foreach($this->modelHabitacion->Listar() as $h) {?>
  <option value="<?= $h->id_habitacion?>"><?= $h->nombre ?></option>
<?php } ?>
</select>
    </div>
    <div class="form-group">
      <label for="Masajista">Masajista</label>
      <select id="masajista" class="form-control js-example-basic-single" name="masajista">
    <?php foreach($this->modelMasajista->Listar() as $m) {?>
  <option value="<?= $m->id_personal?>"><?= $m->nombre ?></option>
<?php } ?>
</select>
    </div>
    <div class="form-group">
      <label for="servicios">Servicios</label>
      <select id="servicios" class="form-control js-example-basic-multiple" name="servicios[]" multiple="multiple">
      <?php foreach($this->modelServicio->Listar() as $s) {?>
  <option value="<?= $s->id_servicio?>"><?= $s->tratamiento ?></option>
<?php } ?>
</select>
    </div>
    
    <button type="button" onclick="agregarCita();" class="btn btn-seremas">Agendar</button>
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
    Calendario
  </div>
  <div class="card-body">

    

    <div class="row">
      <div class="col-md-12">
      <div *ngIf="calendarOptions">
      <div id="calendar"></div>
</div>
</div>
  </div>
</div>
  </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<form role="form" id="cliente">
    <div class="row setup-content" id="step-1">
        <div class="col-md-12">
            <div class="col-md-12">
                
                <div class="form-group ">
                    <label class="control-label">Nombre</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Nombre" name="nombre" />
                    <div class="invalid-feedback">
                            Looks good!
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Apellido Paterno</label>
                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Apelldo Paterno" name="a_paterno" />
                </div>
                <div class="form-group">
                    <label class="control-label">Apellido Materno</label>
                    <input maxlength="100" type="text"  class="form-control" placeholder="Apellido Materno" name="a_materno" />
                </div>
                
            </div>
             
        </div>

    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-md-12">
            <div class="col-md-12">
                <h3>Dirección</h3>
                <div class="form-group">
                    <label class="control-label">Calle</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="calle" name="calle" />
                </div>
                <div class="form-group">
                    <label class="control-label">Fraccionamiento</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Fraccionamiento" name="fraccionamiento" />
                </div>
                <div class="form-group">
                    <label class="control-label">Ciudad</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Ciudad" name="ciudad" />
                </div>
                <div class="form-group">
                    <label class="control-label">Municipio</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Municipio" name="municipio" />
                </div>
                <div class="form-group">
                    <label class="control-label">Estado</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Estado" name="estado" />
                </div>
                
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-md-12">
            <div class="col-md-12">
                <h3>Contacto</h3>
                 <div class="form-group">
                    <label class="control-label">Telefono</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Telefono"  name="telefono" />
                </div>
                <div class="form-group">
                    <label class="control-label">Telefono oficina</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Telefono oficina" name="telefono_oficina" />
                </div>
                <div class="form-group">
                    <label class="control-label">Celular 1</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Celular 1" name="cel_1" />
                </div>
                <div class="form-group">
                    <label class="control-label">Celular 2</label>
                    <input maxlength="200" type="text" r class="form-control" placeholder="Celular 2" name="cel_2" />
                </div>
                
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-4">
        <div class="col-md-12">
            <div class="col-md-12">
                <h3>Social</h3>
                 <div class="form-group ">
                    <label class="control-label">Email</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Email" name="email" />
                </div>
                <div class="form-group">
                    <label class="control-label">Facebook</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Facebook" name="facebook" />
                </div>
                <div class="form-group">
                    <label class="control-label">Instagram</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Instagram" name="instagram" />
                </div>
               
                
            </div>
        </div>
    </div>

<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-seremas btn-circle-form ">1</a>
            
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle-form " disabled="disabled">2</a>
            
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle-form " disabled="disabled">3</a>
            
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default btn-circle-form " disabled="disabled">4</a>
            
        </div>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-seremas  guardar " onclick="guardar();">Guardar</button>
        
        </form>
      </div>
    </div>
  </div>
</div>



<script>
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-seremas').addClass('btn-default');
            $item.addClass('btn-seremas');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(e){

      console.log(e);
       e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

                var curStep = $(this).closest("#step-1"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

                 for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
                if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
                $target.show();

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-seremas').addClass('btn-default');
            $item.addClass('btn-seremas');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
        // var curStep = $(this).closest(".setup-content"),
        //     curStepBtn = curStep.attr("id"),
        //     nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        //     curInputs = curStep.find("input[type='text'],input[type='url']"),
        //     isValid = true;

        // $(".form-group").removeClass("has-error");
        // for(var i=0; i<curInputs.length; i++){
        //     if (!curInputs[i].validity.valid){
        //         isValid = false;
        //         $(curInputs[i]).closest(".form-group").addClass("has-error");
        //     }
        // }

        // if (isValid)
        //     nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-seremas').trigger('click');
});

function guardar(){

  var boton = $('.guardar');
  boton.click(function(e){
    e.preventDefault();
  });

  var allInputs = $('#cliente input');

  var cliente = {};

  $.each( allInputs, function( key, value ) {
    cliente[allInputs[key].name] = allInputs[key].value ;
  });

   $.ajax({

    data:  cliente,
    url:   '<?= Route::Ruta(['ajax' , 'agregarcliente']) ?>',
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
      location.reload();
    }

  });
}

</script>




<script>

$('#datetimepicker1').datetimepicker({
   format: 'DD/MM/YYYY HH:mm'
});

function agregarCita(){
  var parametros = {
    fecha : $('#datetimepicker1').val(),
    cliente : $('#cliente').val(),
    habitacion : $('#habitacion').val(),
    masajista : $('#masajista').val(),
    servicios : $('#servicios').val(),

  };

  var calendar = $('#calendar').fullCalendar({
      locale: 'es',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
     // defaultDate: '2018-03-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
        eventSources: [

    // your event source
    {
      url: '<?= Route::Ruta(['ajax' , 'citas']) ?>', // use the `url` property
      color: 'yellow',    // an option!
      textColor: 'black'  // an option!
    }

    // any other sources...

  ],

  //  eventRender: function(event, element) {
  //   element.qtip({
  //     content: event.description
  //   });
  // }

    });

  $.ajax({
                data:  parametros,
                url:   '<?= Route::Ruta(['citas' , 'agregar']) ?>',
                type:  'post',
                beforeSend: function () {
                        // $("#alert").html('<div class="alert alert-secondary" role="alert">Procesando, espere por favor...</div>');

                },
                success:  function (response) {
                 $("#form")[0].reset();
                  $('#alert-success').show();
                  setTimeout(function(){
                   $('#alert-success').hide();
                 }, 3000);
                  console.log(response);
                        // $("#alert").html('<div class="alert alert-success" role="alert">Datos guardados correctamente.</div>');
                        // $(".alert").alert('close');
                        //   resetboton();
                        // window.location.reload();

                        calendar.fullCalendar('refetchEvents');


                }

        });

  console.log(parametros);
}
            

  

  $(document).ready(function() {

    $('.js-example-basic-multiple').select2({
      placeholder: "Selecione...",
    
    });
    $('.js-example-basic-single').select2({
      placeholder: "Selecione...",
   
    });



    $('#calendar').fullCalendar({
     
      locale: 'es',
     aspectRatio: 2,

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay,agendaWeek'
      },

     // defaultDate: '2018-03-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
        eventSources: [

    // your event source
    {
      url: '<?= Route::Ruta(['ajax' , 'citas']) ?>', // use the `url` property
      //color: '#563d7c',    // an option!
      textColor: 'white',  // an option!
    },
    

    // any other sources...



  ],
    resources: [
    { id: '1', title: 'Masajista 1' },
    { id: '2', title: 'Masajista 2' }
    
  ],

  


   eventClick: function(calEvent, jsEvent, view) {

   

    abrirModal(calEvent.title);

  },


   eventRender: function(event, element) {

    var titulo = event.title;
    var descripcion = event.description;

    element.qtip({
      content: { title: titulo , text: descripcion },
      style: {
        classes: 'qtip-bootstrap',
         
    }
    });
  }

    });

  });

 function abrirModal(titulo){
  alert(titulo);
 }

</script>