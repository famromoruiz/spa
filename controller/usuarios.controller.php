<?php
use \roles\Roles;
require __DIR__ . '/../model/usuario.php';



class UsuariosController{
    
  // private $modelCliente;
   //private $modelCita;
    
    public function __CONSTRUCT(){
      Roles::Acceso($_SESSION['rol']);
      $this->modelUsuarios = new Usuario();
      
    }
    
    public function Index(){
       
        require __DIR__ .'/../view/usuarios/index.php';
      
    }

    public function Ver(){

      $id = $_GET['id'];

      $model = $this->modelUsuarios->Obtener_id($id);

     require __DIR__ .'/../view/usuarios/ver.php'; 
    }

    public function Editar(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';

       
          $model = $this->modelUsuarios->Obtener_id($id);
        

      


      if ($_POST) {

        if ($_POST['pass'] == '') {
        
        $usuario = new Usuario;
        $usuario->nombre = $_POST['nombre'];
        $usuario->nikname = $_POST['nik'];
        $usuario->email = $_POST['email'];
        $usuario->id_usuario = $id;

        $this->modelUsuarios->Actualizar($usuario);

        }else{
        
        $pass = sha1($_POST['pass']);
        $usuario = new Usuario;
        $usuario->nombre = $_POST['nombre'];
        $usuario->nikname = $_POST['nik'];
        $usuario->email = $_POST['email'];
        $usuario->password = $pass;
        $usuario->id_usuario = $id;

        $this->modelUsuarios->Edita_pass($usuario);
        }

          header('Location: ?r=usuarios');

      }

      require __DIR__ .'/../view/usuarios/editar.php';
    }


     public function Agregar(){
     
        if ($_POST) {

          switch ($_POST['rol']) {
            case 10:
              $rol = 'Administrador';
              break;
              case 20:
              $rol = 'Cajero';
              break;
              case 30:
              $rol = 'Terapeuta';
              break;
          }

          $pass = $this->genera_pass();

          $pass_bd = sha1($pass);     

        $usuario = new Usuario;
        $usuario->nikname = $_POST['nik'];
        $usuario->password = $pass_bd;
        $usuario->rol = $_POST['rol'];
        $usuario->nombre = $_POST['nombre'];
        $usuario->token = null;
        $usuario->email = $_POST['email'];

        $registrar = $this->modelUsuarios->Registrar($usuario);

             // crear transportador
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'TLS'))
          ->setUsername('famromoruiz@gmail.com')
          ->setPassword('12al26vi01')
        ;

        // Crea el Mailer usando el transporte creado
        $mailer = new Swift_Mailer($transport);

        // Crear mensaje
        $message = (new Swift_Message('Usuario Creado'))
          ->setFrom(['sistema@seremas.com' => 'Sistema'])
          ->setTo([ $_POST['email'] => $_POST['nombre'] ])
          ->setBody('Estimado <b>'.ucwords($_POST['nombre']).'</b> El equipo de SERE +, te ha añadido como usuario de su sistema y te asigno un usuario: '.$_POST['nik'].' y password:'.$pass.' con el rol de: '.$rol.', para ingresar solo visita la siguiente liga: http://192.168.100.3/spa')
          ;

        // Enviar mensaje
        $result = $mailer->send($message);








        // var_dump($registrar);exit;
        
        
        //    //require __DIR__ .'/../view/almacen/index.php';

           header('Location: ?r=usuarios');


      }else{
        
        require __DIR__ .'/../view/usuarios/agregar.php';
      }
       // require_once 'view/layauts/footer.php';
    }


      public function Eliminar(){

      $id = $_GET['id'];

      $model = $this->modelUsuarios->Eliminar($id);

      require __DIR__ .'/../view/usuarios/index.php';

    }

   

     public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }


    public function genera_pass($tamano = 10) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $caracteres_largo = strlen($caracteres);
    $cadena_aleatoria = '';
    for ($i = 0; $i < $tamano; $i++) {
        $cadena_aleatoria .= $caracteres[rand(0, $caracteres_largo - 1)];
    }
    return $cadena_aleatoria;
}
    
   
    
  
    
    
}