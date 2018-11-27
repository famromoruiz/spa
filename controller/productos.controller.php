<?php
use \roles\Roles;
require __DIR__ . '/../model/cliente.php';
require __DIR__ . '/../model/cita.php';
require __DIR__ . '/../model/habitacion.php';
require __DIR__ . '/../model/masajista.php';
require __DIR__ . '/../model/servicio.php';
require __DIR__ . '/../model/serviciosCita.php';
require __DIR__ . '/../model/productos.php';

class CitasController{
    
   private $modelCliente;
   private $modelCita;
   private $modelHabitacion;
   private $modelServicio;
   private $modelServiciosCita;
   private $modelProductos;
    
    public function __CONSTRUCT(){
      Roles::Acceso($_SESSION['rol']);
       $this->modelCliente = new Cliente();
       $this->modelCita = new Cita();
       $this->modelHabitacion = new Habitacion();
       $this->modelMasajista = new Masajista();
       $this->modelServicio = new Servicio();
       $this->modelServiciosCita = new ServiciosCita();
       $this->modelProductos = new Productos();
    }
    
    // public function Index(){
    //    // require_once 'view/layauts/header.php';
    //     require __DIR__ .'/../view/citas/index.php';
    //    // require_once 'view/layauts/footer.php';
    // }

    public function Agregar(){

      if ($_POST) {
        
        
      

       $fecha = $_POST['fecha'];
       $para_sumar = $_POST['fecha'];
       $fechaform=explode(' ', $fecha);
       $fecha = explode('/',$fechaform[0]);
       $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

       //$date= $para_sumar; 
//       $fecha2 = $fecha.' '.$fechaform[1];
// $nuevafecha = strtotime ( '+1 hour' , strtotime ( $fecha2 ) ) ;
// $nuevafecha = strtotime ( '+13 minute' , strtotime ( $fecha2 ) ) ;
// $nuevafecha = strtotime ( '+30 second' , strtotime ( $fecha2 ) ) ;
// $nuevafecha = date ( 'Y-m-j H:i:s' , $nuevafecha );

//       echo $fecha.' '.$fechaform[1];

//       echo '<br>';

//        var_dump($nuevafecha);exit;

       $cit = new Cita;

        $cit->inicio = $fecha.' '.$fechaform[1];
        $cit->fin = $fecha.' '.$fechaform[1];
        $cit->id_cliente = $_POST['cliente'];
        $cit->id_habitacion = $_POST['habitacion'];
        $cit->id_masajista = $_POST['masajista'];

       $id = $this->modelCita->Registrar($cit);

       foreach ($_POST['servicios'] as $s) {
         $serv = new serviciosCita;
          $serv->id_cita = $id;
          $serv->id_servicio = $s[0];

          $this->modelServiciosCita->Registrar($serv);
       }
       
      

       


        return $id;
      }

     
    }

    public function Json(){

    	//header('Content-Type: application/json');

      $b= $_REQUEST['b'];

    	$productos=array();

       foreach ($this->modelProductos->Buscar() as $r) {

         
       	  $citas[] = array("id"=>$r->id_producto, "title"=>$r->nombre);
       	
       }

       $productos= json_encode($citas,JSON_PRETTY_PRINT);

        echo $productos;

    }

    public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}