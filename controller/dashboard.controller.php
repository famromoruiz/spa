<?php use \roles\Roles;
    //incluir modelos a usar ej.
    // require __DIR__ . '/../model/habitacion.php';



    class DashboardController{
        
     
       //private $modelCita;
        
        public function __CONSTRUCT(){
          Roles::Acceso($_SESSION['rol']);
         //$this->modelHabitaciones = new Habitacion();
         
        }
        
        public function Index(){
           
            require __DIR__ .'/../view/dashboard/index.php';
           
        }

        

         public function Error(){
          require __DIR__ .'/../view/layauts/error.php';
        }
        
    }