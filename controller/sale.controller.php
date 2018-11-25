<?php
require __DIR__ . '/../model/productos.php';
require __DIR__ . '/../model/cita.php';
require __DIR__ . '/../model/servicio.php';


class SaleController{
    
  // private $modelCliente;
   //private $modelCita;
    
    public function __CONSTRUCT(){
      $this->modelProductos = new Productos();
      $this->modelCita = new Cita();
      //$this->modelCita = new Servicio();
    }
    
    public function Index(){
       // require_once 'view/layauts/header.php';
        require __DIR__ .'/../view/sales/index.php';
       // require_once 'view/layauts/footer.php';
    }

   public function Json(){

      //header('Content-Type: application/json');

    $q = isset($_GET['q']);
    $p = isset($_GET['p']);

    $res;

    //$test = isset($GET['b']);
    if ($q == false) {
      if ($p == false) {
        
      }else{
         $b = $_GET['p'];
      $res = $this->modelProductos->Buscar2($b);
      }
     
    }else{
      $b = $_GET['q'];
      $res = $this->modelProductos->Buscar($b);
    }
    
   
    

      

     $bs=[];

       foreach ( $res as $r) {

         
          $bs[] = ["id"=>$r->id_producto, "title"=>$r->upc.' '.$r->nombre.' '.$r->descripcion,"precio"=> $r->precio_publico];
        
       }

       $productos= json_encode($bs);

        echo $productos;

    }

     public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}