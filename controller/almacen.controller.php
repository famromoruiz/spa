<?php
use \roles\Roles;
require __DIR__ . '/../model/productos.php';
require __DIR__ . '/../model/almacen.php';



class AlmacenController{
    
  // private $modelCliente;
   //private $modelCita;
    
    public function __CONSTRUCT(){
      Roles::Acceso($_SESSION['rol']);
      $this->modelProductos = new Productos();
      $this->modelAlmacen = new Almacen();
      
    }
    
    public function Index(){
       
        require __DIR__ .'/../view/almacen/index.php';
      
    }

     public function Agregar(){
      $model = new Almacen;
        if ($_POST) {



        $almacen = new Almacen;
        $almacen->id_producto = $_POST['id_producto'];
        $almacen->cantidad = $_POST['cantidad'];
        $almacen->min_stock = $_POST['min_stock'];

        $registrar = $this->modelAlmacen->Registrar($almacen);

        //var_dump($registrar);exit;
        
        
           //require __DIR__ .'/../view/almacen/index.php';

           header('Location: ?r=almacen');


      }else{
        
        require __DIR__ .'/../view/almacen/agregar.php';
      }
       // require_once 'view/layauts/footer.php';
    }


      public function Eliminar(){

      $id = $_GET['id'];

      $model = $this->modelAlmacen->Eliminar($id);

      require __DIR__ .'/../view/almacen/index.php';

    }

   

     public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}