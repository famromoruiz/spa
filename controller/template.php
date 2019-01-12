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
<!DOCTYPE html>
<html lang="es">
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

	<script src="<?=HOME?>node_modules/popper.js/dist/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?=HOME?>vendor/boostrap/dist/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="<?=HOME?>vendor/qtip/qtip.min.js"></script>

	<link href="<?=HOME?>vendor/fullcalendar-scheduler/lib/fullcalendar.min.css" rel="stylesheet" />
	<link href="<?=HOME?>vendor/fullcalendar-scheduler/scheduler.min.css" rel="stylesheet" />
	<link href="<?=HOME?>vendor/fullcalendar-scheduler/lib/fullcalendar.print.min.css" rel="stylesheet" media="print" />
	<script src="<?=HOME?>vendor/fullcalendar-scheduler/lib/moment.min.js"></script>
	<script src="<?=HOME?>vendor/fullcalendar-scheduler/lib/fullcalendar.min.js"></script>
	<script src="<?=HOME?>vendor/fullcalendar-scheduler/scheduler.min.js"></script>
	<script src="<?=HOME?>vendor/fullcalendar/locale/es.js"></script>
	<script src="<?=HOME?>vendor/slimScroll/jquery.slimscroll.min.js"></script>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   

      

      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
	<link href='<?=HOME?>vendor/Date_Time/build/css/bootstrap-datetimepicker.min.css' rel='stylesheet' />
	<script src='<?=HOME?>vendor/Date_Time/build/js/bootstrap-datetimepicker.min.js'></script>
	<script src='<?=HOME?>node_modules/bootbox/bootbox.min.js'></script>
	

	<link href="<?=HOME?>vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
	<link href="<?=HOME?>node_modules/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css" rel="stylesheet" />
	
<script src="<?=HOME?>vendor/select2/dist/js/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

<script src='<?=HOME?>node_modules/chart.js/dist/Chart.js'></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/css/bootstrap4-toggle.min.css" rel="stylesheet">  
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
</head>

<body>
<header>
<?php require __DIR__ ."/../view/layauts/header.php";?>	
</header>

<main role="main">

<!-- <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav> -->

<?php }  public function __destruct() {?>

</main>

<footer>
<?php require __DIR__ ."/../view/layauts/footer.php";?>
</footer>
</body>
<script>
	$(document).ready( function () {
		if ($('body').find('.catalogos')) {
			 $('.catalogos').DataTable({
       "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }
    });
		}
   
} );
</script>
<script src="<?=HOME?>vendor/fonts/app/app.min.js"></script>
</html>
<?php } }?>