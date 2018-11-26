<?php
require __DIR__ . '/../model/cliente.php';
//require __DIR__ . '/../model/cita.php';

class ClientesController{
    
  private $modelCliente;
   //private $modelCita;
    
    public function __CONSTRUCT(){
      $this->modelCliente = new Cliente();
      // $this->modelCita = new Cita();
    }
    
    public function Index(){
       // require_once 'view/layauts/header.php';
        require __DIR__ .'/../view/clientes/index.php';
       // require_once 'view/layauts/footer.php';
    }

   

     public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}