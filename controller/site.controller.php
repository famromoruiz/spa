<?php
use \roles\Roles;
use \route\Route;
require __DIR__ . '/../model/usuario.php';




class SiteController{
    
  private $model;
  
    
    public function __CONSTRUCT(){
      $this->model = new Usuario;

    }
    
    public function Index(){
       // require_once 'view/layauts/header.php';
        require __DIR__ .'/../view/site/index.php';
       // require_once 'view/layauts/footer.php';
    }

    public function Login(){
        if ($_POST) {
            if (empty($_POST["usuario"]) or (empty($_POST["password"]))) {
                require __DIR__ .'/../view/site/login.php';
            }
            else
                {
                    $usuario = htmlspecialchars(stripslashes(trim($_POST["usuario"])));
                    $clave = htmlspecialchars(stripslashes(trim($_POST["password"])));
                    $shaclave = sha1($clave);

                    $usuario = $this->model->Obtener($usuario , $shaclave);

                    //var_dump($usuario);exit;
                    if ($usuario == false) {
                      $alerta = '<div class="alert alert-danger" role="alert">
  Usuario o Contraseña no validos =(
</div>';
                       require __DIR__ .'/../view/site/login.php';
                    }else{
                       if($usuario->nikname) {
                           // session_start();
                          $s_nombre =  $_SESSION['nombre'] = $usuario->nikname;
                           $s_rol = $_SESSION['rol'] = $usuario->rol;

                           $_SESSION['id_usuario'] = $usuario->id_usuario;

                            

                           header(Roles::Rol($usuario->rol));
                        }
                        else 
                            {
                                require __DIR__ .'/../view/site/login.php';
                            }
                    }
                       
                        }
                    }
                    else
                        {
                            require __DIR__ .'/../view/site/login.php';
                        }
                    }

    public function Reset(){

      if (isset($_GET['token'])) {

        require __DIR__ .'/../view/site/password.php';

        $token = $_GET['token'];
        $usuario = $this->model->Obtener_token($token);

        if ($_POST) {

          $nuevo_password = $_POST['password'];

          $this->model->Actualizar_password(['usuario' => $usuario->nikname , 'password' => $nuevo_password]);

          header('Location: ?r=site');
          
        }
       // var_dump($usuario); exit;
      }else{
        if ($_POST) {

        $cuenta = 10;

        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $cuentacaracteres = strlen($caracteres);

        $string = '';

        for ($i = 0; $i < $cuenta; $i++) {
        $string .= $caracteres[rand(0, $cuentacaracteres - 1)];
      }

        $string = sha1($string);

        $email = $_POST['email'];

         $usuario = $this->model->Obtener_mail($email);
          $this->model->Token(['token' => $string ,'email' => $email]);

        // crear transportador
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'TLS'))
          ->setUsername('famromoruiz@gmail.com')
          ->setPassword('12al26vi01')
        ;

        // Crea el Mailer usando el transporte creado
        $mailer = new Swift_Mailer($transport);

        // Crear mensaje
        $message = (new Swift_Message('Restaura tu contraseña'))
          ->setFrom(['sistema@seremas.com' => 'Sistema'])
          ->setTo([ $email => $usuario->nikname ])
          ->setBody('Estimado '.$usuario->nikname.' se inicio el proceso de recuperacion de contraseña si no fuiste tu omite este mensaje, si deseas recuperar tu contraseña sigue el siguiente enlace: http://localhost/base/base_mvc/web/index.php?r=site/reset&token='.$string)
          ;

        // Enviar mensaje
        $result = $mailer->send($message);

        //var_dump($string);
        
      }

       require __DIR__ .'/../view/site/reset.php';
      }

      

    }

  

    public function Salir(){
        
        //session_start();
        
        $_SESSION = array();

        //var_dump($_SESSION);exit;

        if (ini_get("session.use_cookies")) {

           $params = session_get_cookie_params();
           setcookie(session_name(), '', time() - 42000,
           $params["path"], $params["domain"],
           $params["secure"], $params["httponly"]
       );

       }

       session_destroy();

      //require __DIR__ .'/../view/site/login.php';
       header("location: ?site/login");

    }

     public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
}