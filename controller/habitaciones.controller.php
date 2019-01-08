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
      $model = new Habitacion;
        if ($_POST) {

        $habitacion = new Habitacion;
        $habitacion->nombre = $_POST['nombre'];
        $habitacion->descripcion = $_POST['descripcion'];
        

        $this->modelHabitaciones->Registrar($habitacion);
        
        
           require __DIR__ .'/../view/habitaciones/index.php';


      }else{
        
        require __DIR__ .'/../view/habitaciones/agregar.php';
      }
       // require_once 'view/layauts/footer.php';
    }

     public function Ver(){

      $id = $_GET['id'];

      $model = $this->modelHabitaciones->Obtener($id);

      require __DIR__ .'/../view/habitaciones/ver.php';

    }

    public function Editar(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';

       
          $model = $this->modelHabitaciones->Obtener($id);
        

      


      if ($_POST) {

        $habitacion = new Habitacion;
        $habitacion->id_habitacion = $_POST['id_habitacion'];
        $habitacion->nombre = $_POST['nombre'];
        $habitacion->descripcion = $_POST['descripcion'];

        $this->modelHabitaciones->Actualizar($habitacion);
        $model = $this->modelHabitaciones->Obtener($habitacion->id_habitacion);
        

          header('Location: ?r=habitaciones');

      }

      require __DIR__ .'/../view/habitaciones/editar.php';
    }

     public function Eliminar(){

      $id = $_GET['id'];

      $model = $this->modelHabitaciones->Eliminar($id);

      require __DIR__ .'/../view/habitaciones/index.php';

    }

         public function Error(){
          require __DIR__ .'/../view/layauts/error.php';
        }
        
    }