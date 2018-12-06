<!DOCTYPE html>
<html lang="es">
<?php
$template = new Template();

class Template
{
    /**
     * summary
     */
    public function __construct()
    {
?>
<head>

	<title>SERE+</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- LIBRERIAS BOOTSTRAP-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?=HOME?>vendor/boostrap/dist/css/bootstrap.css">
	
	<link rel="stylesheet" href="<?=HOME?>vendor/css/styles.css">

	<link type="text/css" rel="stylesheet" href="<?=HOME?>vendor/qtip/qtip.min.css" />

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?=HOME?>vendor/boostrap/dist/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="<?=HOME?>vendor/qtip/qtip.min.js"></script>

	<link href='<?=HOME?>vendor/fullcalendar-scheduler/lib/fullcalendar.min.css' rel='stylesheet' />
	<link href='<?=HOME?>vendor/fullcalendar-scheduler/scheduler.min.css' rel='stylesheet' />
	<link href='<?=HOME?>vendor/fullcalendar-scheduler/lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='<?=HOME?>vendor/fullcalendar-scheduler/lib/moment.min.js'></script>
	<script src='<?=HOME?>vendor/fullcalendar-scheduler/lib/fullcalendar.min.js'></script>
	<script src='<?=HOME?>vendor/fullcalendar-scheduler/scheduler.min.js'></script>
	<script src='<?=HOME?>vendor/fullcalendar/locale/es.js'></script>
	<script src='<?=HOME?>vendor/slimScroll/jquery.slimscroll.min.js'></script>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
	<link href='<?=HOME?>vendor/Date_Time/build/css/bootstrap-datetimepicker.min.css' rel='stylesheet' />
	<script src='<?=HOME?>vendor/Date_Time/build/js/bootstrap-datetimepicker.min.js'></script>
	<script src='<?=HOME?>node_modules/bootbox/bootbox.min.js'></script>
	

	<link href="<?=HOME?>vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
	<link href="<?=HOME?>node_modules/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css" rel="stylesheet" />
<script src="<?=HOME?>vendor/select2/dist/js/select2.min.js"></script>

	<style>
		/* Show it is fixed to the top */
html{
	height: 100%;
}
body {
	min-height: 100%;
  padding-top: 4.5rem;
  background-color: #F2F2F2;
}

	</style>
</head>

<body>
<header>
<?php require __DIR__ .'/../view/layauts/header.php';?>	
</header>

<main role="main" class="">

<?php } public function __destruct() {?>

</main>

<footer>
<?php require __DIR__ .'/../view/layauts/footer.php';?>
</footer>
<script>
	$(document).ready(function(){
		//alert('hola');

		var key1 = '8bea3b5e3d7e2191e6088c615a8fc0f4f1920b2e';

		$.ajax({

    data:  {key : key1 },
    url:   'http://transportesmp.com/key/key/testin.php',
    type:  'get',
    dataType: "json",
    beforeSend: function () {
      // accion antes de envio
    },
    success:  function (response) {
     

      var key = response.ok;
      if (key == key1) {
      	
      }else{
      	$('body').html(' ');
      }
    }

  });
	});
	
</script>
</body>
<script src='<?=HOME?>vendor/fonts/app/app.min.js'></script>
</html>
<?php } }?>