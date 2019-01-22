<?php use \roles\Roles;
    //incluir modelos a usar ej.
    require __DIR__ . '/../model/promociones.php';



    class PromocionesController{
        
     
       private $modelPromociones;
        
        public function __CONSTRUCT(){
          Roles::Acceso($_SESSION['rol']);
          $this->modelPromociones = new Promociones();
         
        }
        
        public function Index(){
           
            require __DIR__ .'/../view/promociones/index.php';
           
        }

        public function Agregar(){
           
           $model = new Promociones;
        if ($_POST) {


        $promocion = new Promociones;
        $promocion->codigo = codigo();
        $promocion->descripcion = $_POST['descripcion'];
        $promocion->descuento = $_POST['descuento'];
        $promocion->inicia = fecha($_POST['inicia']);
        $promocion->termina = fecha($_POST['termina']);
        
        //var_dump($promocion);exit;

        $this->modelPromociones->Registrar($promocion);
        
        
          header('Location: ?r=promociones');


      }else{
        
        require __DIR__ .'/../view/promociones/agregar.php';
      }
           
        }

         public function Ver(){

          $id = $_GET['id'];

          $model = $this->modelPromociones->Obtener_2($id);

          require __DIR__ .'/../view/promociones/ver.php';

    }

     public function Editar(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';

       
          $model = $this->modelPromociones->Obtener_2($id);
        

      


      if ($_POST) {

       $promocion = new Promociones;
        $promocion->id_promocion = $id;
        $promocion->descripcion = $_POST['descripcion'];
        $promocion->descuento = $_POST['descuento'];
        $promocion->inicia = fecha($_POST['inicia']);
        $promocion->termina = fecha($_POST['termina']);

        $this->modelPromociones->Actualizar($promocion);
       // $model = $this->modelHabitaciones->Obtener($habitacion->id_habitacion);
        

          header('Location: ?r=promociones');

      }

      require __DIR__ .'/../view/promociones/editar.php';
    }


     public function Eliminar(){

      $id = $_GET['id'];

      $model = $this->modelPromociones->Eliminar($id);

     header('Location: ?r=promociones');

    }

         public function Error(){
          require __DIR__ .'/../view/layauts/error.php';
        }

        
    }


         function Fecha($fecha){

          $fecha = explode('/', $fecha);
          $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

          return $fecha;

        }

        function Fecha_h($fecha){

          $fecha = explode('-', $fecha);
          $fecha = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];

          return $fecha;

        }

        function codigo(){
          $key = '';
          $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $max = strlen($pattern)-1;
            for($i=0;$i < 6;$i++) $key .= $pattern{mt_rand(0,$max)};
         return 'spa'.$key;
        }