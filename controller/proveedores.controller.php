<?php use \roles\Roles;
    //incluir modelos a usar ej.
    require __DIR__ . '/../model/proveedor.php';



    class ProveedoresController{
        
     
       private $modelProveedor;
        
        public function __CONSTRUCT(){
          Roles::Acceso($_SESSION['rol']);
          $this->modelProveedor = new Proveedor();
         
        }
        
        public function Index(){
           
            require __DIR__ .'/../view/proveedores/index.php';
           
        }

         public function Agregar(){
           
           $model = new Proveedor;
        if ($_POST) {


        $proveedor = new Proveedor;
        $proveedor->nombre = $_POST['nombre'];
        $proveedor->rfc = $_POST['rfc'];
        $proveedor->domicilio = $_POST['domicilio'];
        $proveedor->tel_1 = $_POST['tel_1'];
        $proveedor->tel_2 = $_POST['tel_2'];
        $proveedor->contacto = $_POST['contacto'];
        $proveedor->email = $_POST['email'];
        
        //var_dump($promocion);exit;

        $this->modelProveedor->Registrar($proveedor);
        
        
          header('Location: ?r=proveedores');


      }else{
        
        require __DIR__ .'/../view/proveedores/agregar.php';
      }
           
        }

         public function Editar(){
           $id = isset($_GET['id']) ? $_GET['id'] : '';

       
          $model = $this->modelProveedor->Obtener($id);
        if ($_POST) {


        $proveedor = new Proveedor;
        $proveedor->id_proveedor = $id;
        $proveedor->nombre = $_POST['nombre'];
        $proveedor->rfc = $_POST['rfc'];
        $proveedor->domicilio = $_POST['domicilio'];
        $proveedor->tel_1 = $_POST['tel_1'];
        $proveedor->tel_2 = $_POST['tel_2'];
        $proveedor->contacto = $_POST['contacto'];
        $proveedor->email = $_POST['email'];


        $this->modelProveedor->Actualizar($proveedor);
        
        
          header('Location: ?r=proveedores');


      }else{
        
        require __DIR__ .'/../view/proveedores/editar.php';
      }
           
        }

         public function Ver(){

          $id = $_GET['id'];

          $model = $this->modelProveedor->Obtener($id);

          require __DIR__ .'/../view/proveedores/ver.php';

    }

     public function Eliminar(){

      $id = $_GET['id'];

      $model = $this->modelProveedor->Eliminar($id);

     header('Location: ?r=proveedores');

    }

         public function Error(){
          require __DIR__ .'/../view/layauts/error.php';
        }
        
    }