<?php
use \roles\Roles;
require __DIR__ . '/../model/cliente.php';
require __DIR__ . '/../model/cita.php';
require __DIR__ . '/../model/habitacion.php';
require __DIR__ . '/../model/masajista.php';
require __DIR__ . '/../model/servicio.php';
require __DIR__ . '/../model/serviciosCita.php';

class CitasController{
    
   private $modelCliente;
   private $modelCita;
   private $modelHabitacion;
   private $modelServicio;
   private $modelServiciosCita;
    
    public function __CONSTRUCT(){

      Roles::Acceso($_SESSION['rol']);
       $this->modelCliente = new Cliente();
       $this->modelCita = new Cita();
       $this->modelHabitacion = new Habitacion();
       $this->modelMasajista = new Masajista();
       $this->modelServicio = new Servicio();
       $this->modelServiciosCita = new ServiciosCita();
    }
    
    public function Index(){
       // require_once 'view/layauts/header.php';
        require __DIR__ .'/../view/citas/index.php';
       // require_once 'view/layauts/footer.php';
    }

    public function Agregar(){

      if ($_POST) {


        
        
      

       $fecha = $_POST['fecha'];
       $para_sumar = $_POST['fecha'];
       $fechaform=explode(' ', $fecha);
       $fecha = explode('/',$fechaform[0]);
       $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

       $minutos_añadir = 0;

       $n_serv = $_POST['servicios'];

       $cuenta = count($n_serv);

      for ($i = 0; $i < $cuenta ; $i++) {
      
        $śervicios_t = $this->modelServicio->Obtener($n_serv[0]); 

         $minutos_añadir = $śervicios_t->tiempo + $minutos_añadir;
      
      }



     
         
       


     

  
      $fecha2 = $fechaform[1];
      $nuevafecha = strtotime( $fecha2 );
      $minutos_añadir = $minutos_añadir * 60;
      $fechafin = date("H:i:s", $nuevafecha + $minutos_añadir);


     

      // echo $fechaform[1];

      // echo '<br>';

      //  var_dump();exit;

       $cit = new Cita;

        $cit->inicio = $fecha.' '.$fechaform[1];
        $cit->fin = $fecha.' '.$fechafin;
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
    	$citas=array();

       foreach ($this->modelCita->Listar() as $r) {

          $servicios = "";
          $flag= 0;

          switch ($r->status) {
            case 1:
              $color = "#563d7c";
              break;case 2:
              $color = "#00BFFF";
              break;case 3:
              $color = "#FF4000";
              break;case 4:
              $color = "#FF0040";
              break;case 5:
              $color = "#D8D8D8";
              break;
            
            
          }

          foreach ($this->modelCita->Listarserv($r->id_cita) as $sr) {
            $flag++;
            
            $servicios .= "Servicio: ".$flag." Zona: ".$sr->zona." Tratamiento: ".$sr->tratamiento."<br>";
          }

      

          
         
       	  $citas[] = array("id"=>1, "title"=>$r->nombre,'start'=>$r->inicio,'end'=>$r->fin, "description"=>$servicios,"color"=>$color, "allDay"=>false);
       	
       }

       $citas= json_encode($citas,JSON_PRETTY_PRINT);

        echo $citas;

    }

    public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}