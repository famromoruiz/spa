<?php
//require __DIR__ . '/../model/cliente.php';
//require __DIR__ . '/../model/cita.php';

class ClientesController{
    
  // private $modelCliente;
   //private $modelCita;
    
    public function __CONSTRUCT(){
      // $this->modelCliente = new Cliente();
      // $this->modelCita = new Cita();
    }
    
    public function Index(){
       // require_once 'view/layauts/header.php';
        require __DIR__ .'/../view/clientes/index.php';
       // require_once 'view/layauts/footer.php';
    }

    public function Json(){

    	//header('Content-Type: application/json');
    	// $citas=array();

     //   foreach ($this->modelCita->Listar() as $r) {
     //   	  $citas[] = array("title"=>$r->id_cliente,'start'=>$r->inicio,'end'=>$r->fin, "description"=>"This is a cool event","allDay"=>false);
       	
     //   }

     //   $citas= json_encode($citas,JSON_PRETTY_PRINT);

     //    echo $citas;

    }

     public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}