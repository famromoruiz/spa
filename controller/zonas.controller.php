<?php use \roles\Roles;
    //incluir modelos a usar ej.
  require __DIR__ . '/../model/zonas.php';



    class ZonasController{
        
     
       //private $modelCita;
        
        public function __CONSTRUCT(){
          Roles::Acceso($_SESSION['rol']);
          $this->modelZonas = new Zona();
         
        }
        
        public function Index(){
           $model = $this->modelZonas->Listar();
           require __DIR__ .'/../view/zonas/index.php';
           
        }

            public function Agregar(){
      $model = new Zona;
        if ($_POST) {

        $zona = new Zona;
        $zona->nombre = $_POST['nombre'];
        $zona->descripcion = $_POST['descripcion'];
        

        $this->modelZonas->Registrar($zona);
        
        
           header('Location: ?r=zonas');


      }else{
        
        require __DIR__ .'/../view/habitaciones/agregar.php';
      }
       // require_once 'view/layauts/footer.php';
    }

         public function Editar(){
          $id = $_GET['id'];
           $model = $this->modelZonas->Obtener($id);
            if ($_POST) {

        $zona = new Zona;
        $zona->id_zona = $_POST['id_zona'];
        $zona->nombre = $_POST['nombre'];
        $zona->descripcion = $_POST['descripcion'];

        $this->modelZonas->Actualizar($zona);
        $model = $this->modelZonas->Obtener($zona->id_zona);
        
           header('Location: ?r=zonas');


      }
           require __DIR__ .'/../view/zonas/editar.php';
           
        }

         public function Ver(){

      $id = $_GET['id'];

      $model = $this->modelZonas->Obtener($id);

      require __DIR__ .'/../view/zonas/ver.php';

    }

     public function Eliminar(){

      $id = $_GET['id'];

      $model = $this->modelZonas->Eliminar($id);

      require __DIR__ .'/../view/zonas/index.php';

    }

         public function Error(){
          require __DIR__ .'/../view/layauts/error.php';
        }
        
    }