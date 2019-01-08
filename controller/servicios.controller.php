<?php use \roles\Roles;
    //incluir modelos a usar ej.
  require __DIR__ . '/../model/servicio.php';
  require __DIR__ . '/../model/zonas.php';



    class ServiciosController{
        
     
       //private $modelCita;
        
        public function __CONSTRUCT(){
          Roles::Acceso($_SESSION['rol']);
          $this->modelServicios = new Servicio();
          $this->modelZonas = new Zona();
         
        }
        
        public function Index(){
           $model = $this->modelServicios->Listar_modelo();
           require __DIR__ .'/../view/servicios/index.php';
           
        }

            public function Agregar(){
      $model = new Servicio;
        if ($_POST) {

         $servicio = new Servicio;
        $servicio->tratamiento = $_POST['tratamiento'];
        $servicio->id_zona = $_POST['id_zona'];
        $servicio->tiempo = $_POST['tiempo'];
        $servicio->regular = $_POST['precio'];
        

        $this->modelServicios->Registrar($servicio);
        
        
           header('Location: ?r=servicios');


      }else{
        
        require __DIR__ .'/../view/servicios/agregar.php';
      }
       // require_once 'view/layauts/footer.php';
    }

         public function Editar(){
          $id = $_GET['id'];
           $model = $this->modelServicios->Obtener($id);
            if ($_POST) {

        $servicio = new Servicio;
        $servicio->id_servicio = $_POST['id_servicio'];
        $servicio->tratamiento = $_POST['tratamiento'];
        $servicio->id_zona = $_POST['id_zona'];
        $servicio->tiempo = $_POST['tiempo'];
        $servicio->regular = $_POST['precio'];

        $this->modelServicios->Actualizar($servicio);
        $model = $this->modelServicios->Obtener($servicio->id_servicio);
        
        header('Location: ?r=servicios');


      }
           require __DIR__ .'/../view/servicios/editar.php';
           
        }

         public function Ver(){

      $id = $_GET['id'];

      $model = $this->modelServicios->Obtener($id);

      require __DIR__ .'/../view/servicios/ver.php';

    }

     public function Eliminar(){

      $id = $_GET['id'];

      $model = $this->modelServicios->Eliminar($id);

      require __DIR__ .'/../view/servicios/index.php';

    }

         public function Error(){
          require __DIR__ .'/../view/layauts/error.php';
        }
        
    }