<?php use \roles\Roles;
    //incluir modelos a usar ej.
    require __DIR__ . '/../model/habitacion.php';



    class HabitacionesController{
        
     
       //private $modelCita;
        
        public function __CONSTRUCT(){
          Roles::Acceso($_SESSION['rol']);
         $this->modelHabitaciones = new Habitacion();
         
        }
        
        public function Index(){
           
            require __DIR__ .'/../view/habitaciones/index.php';
           
        }

          public function Agregar(){
      $model = new Productos;
        if ($_POST) {

        $producto = new Productos;
        $producto->upc = $_POST['upc'];
        $producto->nombre = $_POST['nombre'];
        $producto->descripcion = $_POST['descripcion'];
        $producto->precio = $_POST['precio'];
        $producto->precio_publico = $_POST['precio_publico'];

        $this->modelProductos->Registrar($producto);
        
        
           require __DIR__ .'/../view/productos/index.php';


      }else{
        
        require __DIR__ .'/../view/productos/agregar.php';
      }
       // require_once 'view/layauts/footer.php';
    }

     public function Ver(){

      $id = $_GET['id'];

      $model = $this->modelProductos->Obtener($id);

      require __DIR__ .'/../view/productos/ver.php';

    }

    public function Editar(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';

       
          $model = $this->modelProductos->Obtener($id);
        

      


      if ($_POST) {

        $producto = new Productos;
        $producto->id_producto = $_POST['id_producto'];
        $producto->upc = $_POST['upc'];
        $producto->nombre = $_POST['nombre'];
        $producto->descripcion = $_POST['descripcion'];
        $producto->precio = $_POST['precio'];
        $producto->precio_publico = $_POST['precio_publico'];

        $this->modelProductos->Actualizar($producto);
        $model = $this->modelProductos->Obtener($producto->id_producto);
        



      }

      require __DIR__ .'/../view/productos/editar.php';
    }

         public function Error(){
          require __DIR__ .'/../view/layauts/error.php';
        }
        
    }