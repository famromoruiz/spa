<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Cliente
                </div>
                <div class="card-body">
                     <div class="row setup-content" id="step-1">
        <div class="col-md-12">
            <div class="col-md-12">

                <form action="" method="post">
                
                <div class="form-group ">
                    <label class="control-label">Nombre</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Nombre" name="nombre" value="<?= $model->nombre ?>" />
                    <input  maxlength="100" type="text"  hidden="" class="form-control"  name="id_cliente" value="<?= $model->id_cliente ?>" />
                    <div class="invalid-feedback">
                            Looks good!
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Apellido Paterno</label>
                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Apelldo Paterno" name="a_paterno" value="<?= $model->a_paterno ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Apellido Materno</label>
                    <input maxlength="100" type="text"  class="form-control" placeholder="Apellido Materno" name="a_materno" value="<?= $model->a_materno ?>"/>
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
                    <input maxlength="200" type="text"  class="form-control" placeholder="calle" name="calle" value="<?= $model->direccion ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Fraccionamiento</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Fraccionamiento" name="fraccionamiento" value="<?= $model->fraccionamiento ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Ciudad</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Ciudad" name="ciudad" value="<?= $model->ciudad ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Municipio</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Municipio" name="municipio" value="<?= $model->municipio ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Estado</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Estado" name="estado"  value="<?= $model->estado ?>"/>
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
                    <input maxlength="200" type="text"  class="form-control" placeholder="Telefono"  name="telefono" value="<?= $model->tel_f ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Telefono oficina</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Telefono oficina" name="telefono_oficina" value="<?= $model->tel_o ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Celular 1</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Celular 1" name="cel_1" value="<?= $model->cel_1 ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Celular 2</label>
                    <input maxlength="200" type="text" r class="form-control" placeholder="Celular 2" name="cel_2" value="<?= $model->cel_2 ?>"/>
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
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Email" name="email" value="<?= $model->email ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Facebook</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Facebook" name="facebook" value="<?= $model->facebook ?>"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Instagram</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Instagram" name="instagram" value="<?= $model->instagram ?>"/>
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

 <button type="submit" class="btn btn-seremas" >Guardar</button>
 </form>
                </div>
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
</script>