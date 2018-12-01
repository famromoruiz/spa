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



  

    public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}