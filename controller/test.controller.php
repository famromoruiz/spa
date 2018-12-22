<?php use \roles\Roles;
    //incluir modelos a usar ej.
    //require __DIR__ . '/../model/cita.php';



    class TestController{
        
     
       //private $modelCita;
        
        public function __CONSTRUCT(){
          Roles::Acceso($_SESSION['rol']);
         // $this->modelCita = new Cita();
         
        }
        
        public function Index(){
           
           // require __DIR__ .'/../view/vista/vista.php';
           
        }

         public function Error(){
          require __DIR__ .'/../view/layauts/error.php';
        }
        
    }