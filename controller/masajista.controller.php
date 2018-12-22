<?php
use \roles\Roles;
require __DIR__ . '/../model/cita.php';



class MasajistaController{
    
  // private $modelCliente;
   //private $modelCita;
    
    public function __CONSTRUCT(){
      Roles::Acceso($_SESSION['rol']);
      $this->modelCita = new Cita();
     
    }
    
    public function Index(){
       // require_once 'view/layauts/header.php';
        require __DIR__ .'/../view/masajista/index.php';
       // require_once 'view/layauts/footer.php';
    }

 

     public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}