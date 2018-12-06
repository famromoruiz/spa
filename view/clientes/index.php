<?php
use \route\Route;
use \gridview\Gridview;

$pagina = (isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']))?$_REQUEST['pagina']:1;

$model = $this->modelCliente->listar($pagina);

//var_dump($model);exit;
?>
<div class="container-fluid">
<div id="alert-success" class="alert alert-success " style="display:none;" role="alert">
  Cliente añadido corectamente!
</div>
<div class="row">
  <div class="col-md-12">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-seremas float-right" data-toggle="modal" data-target="#exampleModalCenter">
  Agregar
</button>
  </div>
</div>
<br>
<div class="row animated fadeIn">

	<div class="col-md-12">
		<div class="card">
  <div class="card-header bg-seremas text-white">
    Clientes
  </div>

  <div class="table-responsive datos">

    <?= Gridview::Gridview($model['lista'],
      [
        'etiquetas' => array('nombre','Apellido paterno','Apellido materno','Celular','Email'),
        'atributos' => array('nombre','a_paterno','a_materno','cel_1','email'),
        'paginas' => $model['paginas'],
        'id' => $model['id']
      ]); ?>

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
                    <input maxlength="80" type="text"  class="form-control" placeholder="calle" name="calle" />
                </div>
                <div class="form-group">
                    <label class="control-label">Fraccionamiento</label>
                    <input maxlength="80" type="text"  class="form-control" placeholder="Fraccionamiento" name="fraccionamiento" />
                </div>
                <div class="form-group">
                    <label class="control-label">Ciudad</label>
                    <input maxlength="70" type="text"  class="form-control" placeholder="Ciudad" name="ciudad" />
                </div>
                <div class="form-group">
                    <label class="control-label">Municipio</label>
                    <input maxlength="50" type="text"  class="form-control" placeholder="Municipio" name="municipio" />
                </div>
                <div class="form-group">
                    <label class="control-label">Estado</label>
                    <input maxlength="50" type="text"  class="form-control" placeholder="Estado" name="estado" />
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
                    <input maxlength="10" type="text"  class="form-control" placeholder="Telefono"  name="telefono" />
                </div>
                <div class="form-group">
                    <label class="control-label">Telefono oficina</label>
                    <input maxlength="10" type="text"  class="form-control" placeholder="Telefono oficina" name="telefono_oficina" />
                </div>
                <div class="form-group">
                    <label class="control-label">Celular 1</label>
                    <input maxlength="10" type="text" required="required" class="form-control" placeholder="Celular 1" name="cel_1" />
                </div>
                <div class="form-group">
                    <label class="control-label">Celular 2</label>
                    <input maxlength="10" type="text" r class="form-control" placeholder="Celular 2" name="cel_2" />
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
                    <input maxlength="150" type="text" required="required" class="form-control" placeholder="Email" name="email" />
                </div>
                <div class="form-group">
                    <label class="control-label">Facebook</label>
                    <input maxlength="150" type="text"  class="form-control" placeholder="Facebook" name="facebook" />
                </div>
                <div class="form-group">
                    <label class="control-label">Instagram</label>
                    <input maxlength="150" type="text"  class="form-control" placeholder="Instagram" name="instagram" />
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


  $('.eliminar').on('click',function(){
    var eliminar = this.id;
    bootbox.confirm({
    title: " ",
    message: "Estas a punto de eliminar este elemento! Quires hacerlo?",
    buttons: {
        confirm: {
            label: '<i class="fa fa-check"></i> Si',
            className: 'btn-seremas'
        },
        cancel: {
            label: '<i class="fa fa-times"></i> No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        
        if (result == true) {
          $.ajax({
            url:   eliminar,
            type:  'get',
            beforeSend: function () {
              // accion antes de envio
            },
            success:  function (response) {
              //location.reload();
            }

          });
        }
    }
});
  });
  

function actualiza_tabla(pagina) {

if ($('.page-item').hasClass('active')) {

  alert('hola');
}
      

        var url = location.href+'&pagina='+pagina;
        console.log(url)
        $.ajax({

   // data:  cliente,
    url:   url,
    type:  'get',
    dataType:"html",
    beforeSend: function () {
      $('tbody').html('<div id="page-loader"><span class="preloader-interior"></span></div>');
    },
    success:  function (response) {
      console.log(response);
      //console.log($(response).find("tbody").html());
      //console.log($('tbody').html($(response).find("tbody").html()));
            setTimeout(function(){
        $('tbody').html($(response).find("tbody").html())
      }, 1000);

      

    }
      });
    }

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

  console.log(cliente);

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

function ver(id){

  var allInputs = $('#cliente input');

   $.ajax({

    data:  { id : id },
    url:   '<?= Route::Ruta(['ajax' , 'vercliente']) ?>',
    type:  'post',
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
      var cliente = JSON.parse(response);
      console.log(cliente);
       

      $( "input[name*='"+allInputs[0].name+"']" ).val(cliente.nombre).attr('disabled', true);
      $( "input[name*='"+allInputs[1].name+"']" ).val(cliente.a_paterno).attr('disabled', true);
      $( "input[name*='"+allInputs[2].name+"']" ).val(cliente.a_materno).attr('disabled', true);
      $( "input[name*='"+allInputs[3].name+"']" ).val(cliente.direccion).attr('disabled', true);
      $( "input[name*='"+allInputs[4].name+"']" ).val(cliente.fraccionamiento).attr('disabled', true);
      $( "input[name*='"+allInputs[5].name+"']" ).val(cliente.ciudad).attr('disabled', true);
      $( "input[name*='"+allInputs[6].name+"']" ).val(cliente.municipio).attr('disabled', true);
      $( "input[name*='"+allInputs[7].name+"']" ).val(cliente.estado).attr('disabled', true);
      $( "input[name*='"+allInputs[8].name+"']" ).val(cliente.tel_f).attr('disabled', true);
      $( "input[name*='"+allInputs[9].name+"']" ).val(cliente.tel_o).attr('disabled', true);
      $( "input[name*='"+allInputs[10].name+"']" ).val(cliente.cel_1).attr('disabled', true);
      $( "input[name*='"+allInputs[11].name+"']" ).val(cliente.cel_2).attr('disabled', true);
      $( "input[name*='"+allInputs[12].name+"']" ).val(cliente.email).attr('disabled', true);
      $( "input[name*='"+allInputs[13].name+"']" ).val(cliente.facebook).attr('disabled', true);
      $( "input[name*='"+allInputs[14].name+"']" ).val(cliente.instagram).attr('disabled', true);

       $('.modal-title').html('Ver Cliente');
       $('#exampleModalCenter').modal('toggle');
    }

  });

}

</script>