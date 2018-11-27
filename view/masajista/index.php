<div class="container" ">
	
<div class="row " >
	<div class="col-md-12">
		<div class="card " >
  <div class="card-header bg-seremas text-white d-flex justify-content-between align-items-center">
    Hola <?= $_SESSION['nombre'] ?> <span id="liveclock"></span>
  </div>
  		<ul class="list-group list-group-flush">
    	 <?php $id =0;  foreach ($this->modelCita->Obtener(1) as $c) { 

                    $id++;


                  $fecha = $c->inicio;
                  $fecha = explode(' ', $fecha);
                  $hora = $fecha[1];
                  $fecha = explode('-', $fecha[0]);
                  $fecha = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];

                

                   ?>
            <li id="<?='masajes_l'.$id?>" class="list-group-item d-flex justify-content-between align-items-center "><?= $hora.':00' ?>   <?= strtoupper($c->nombre) ?>   <span><button type="button" class="btn btn-seremas btn-sm" onclick="agregar_citas_pago();"><i class="fa fa-play" aria-hidden="true"></i></button>  <button type="button" class="btn btn-danger btn-sm" onclick="agregar_citas_pago();"><i class="fa fa-stop" aria-hidden="true"></i></button></span></li>
      <?php } ?>
  </ul>
</div>
</div>
	</div>
</div>

<script language="JavaScript" type="text/javascript">
    function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

      

         if (minutes<=9)
         minutes="0"+minutes
         if (seconds<=9)
         seconds="0"+seconds
        //change font size here to your desire
        myclock="Hora: "+hours+":"+minutes+":"
         +seconds;
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
        setTimeout("show5()",1000)
         }


        window.onload=show5
         //-->
     </script>