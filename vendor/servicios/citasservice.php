<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include('../php/conectar.php');

/**
 * summary
 */

if ($_POST) {
    $fecha = $_POST['fecha'];
$fechaform=explode(' ', $fecha);

$fecha = explode('/',$fechaform[0]);
$fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

$cita = (object) array(
    'inicio'=>$fecha.'T'.$fechaform[1],
    'fin'=>$fecha.'T'.$fechaform[1],
    'cliente'=>$_POST['cliente'],
    'habitacion'=>$_POST['habitacion'],
    'masajista'=>$_POST['masajista'],
    'servicios'=>$_POST['servicios']
);


    agregarCita($conn ,$cita);
}else{
    listarCitas($conn);
}


	 function agregarCita($conn ,$cita){
        $sql="INSERT INTO citas (inicio,fin,id_cliente,id_habitacion,id_masajista) VALUES ('$cita->inicio','$cita->fin','$cita->cliente','$cita->habitacion','$cita->masajista')";
        $result = mysqli_query($conn,$sql);

        $ok='oky!';

        return $ok;
    }

     function listarCitas($conn){
        $citas=array();

        $sql = "SELECT * FROM citas";
        $result = $conn->query($sql);

        while ($row= $result->fetch_assoc()) {

            $citas[] = array("title"=>$row['id_cliente'],'start'=>$row['inicio'],'end'=>$row['fin'], "description"=>"This is a cool event","allDay"=>false);
            
        }

        echo json_encode($citas);

    }
?>