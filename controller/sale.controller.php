<?php
require __DIR__ . '/../model/productos.php';


class SaleController{
    
  // private $modelCliente;
   //private $modelCita;
    
    public function __CONSTRUCT(){
      $this->modelProductos = new Productos();
    }
    
    public function Index(){
       // require_once 'view/layauts/header.php';
        require __DIR__ .'/../view/sales/index.php';
       // require_once 'view/layauts/footer.php';
    }

   public function Json(){

      //header('Content-Type: application/json');

    

    //$test = isset($GET['b']);

    

    

      //var_dump($b);exit;

     $bs=[];

       foreach ($this->modelProductos->Buscar($_GET['q']) as $r) {

         
          $bs[] = ["id"=>$r->id_producto, "title"=>$r->upc.' '.$r->nombre.' '.$r->descripcion];
        
       }

       $productos= json_encode($bs);

        echo $productos;

    }

     public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}