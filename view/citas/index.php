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
  <?php foreach($this->modelCliente->Listar() as $c) {?>
  <option value="<?= $c->id_cliente?>"><?php echo $c->nombre.' '.$c->a_paterno.' '.$c->a_materno?></option>
<?php } ?>
</select>
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
      url: '<?= Route::Ruta(['citas' , 'json']) ?>', // use the `url` property
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
      url: '<?= Route::Ruta(['citas' , 'json']) ?>', // use the `url` property
      //color: '#563d7c',    // an option!
      textColor: 'white',  // an option!
    }

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