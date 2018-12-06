<?php
use \roles\Roles;
require __DIR__ . '/../model/cliente.php';
require __DIR__ . '/../model/cita.php';
require __DIR__ . '/../model/habitacion.php';
require __DIR__ . '/../model/masajista.php';
require __DIR__ . '/../model/servicio.php';
require __DIR__ . '/../model/serviciosCita.php';
require __DIR__ . '/../model/productos.php';

class ProductosController{
    
   private $modelCliente;
   private $modelCita;
   private $modelHabitacion;
   private $modelServicio;
   private $modelServiciosCita;
   private $modelProductos;
    
    public function __CONSTRUCT(){
      Roles::Acceso($_SESSION['rol']);
       $this->modelCliente = new Cliente();
       $this->modelCita = new Cita();
       $this->modelHabitacion = new Habitacion();
       $this->modelMasajista = new Masajista();
       $this->modelServicio = new Servicio();
       $this->modelServiciosCita = new ServiciosCita();
       $this->modelProductos = new Productos();
    }
    
    public function Index(){
       // require_once 'view/layauts/header.php';
        require __DIR__ .'/../view/productos/index.php';
       // require_once 'view/layauts/footer.php';
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

     public function Eliminar(){

      $id = $_GET['id'];

      $model = $this->modelProductos->Eliminar($id);

      require __DIR__ .'/../view/productos/ver.php';

    }



  

    public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}