<?php
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
                        if($usuario->nikname) {
                            session_start();
                            $_SESSION['nombre'] = $usuario->nikname;
                            $_SESSION['rol'] = $usuario->rol;

                            header("location: ?site");
                        }
                        else 
                            {
                                require __DIR__ .'/../view/site/login.php';
                            }
                        }
                    }
                    else
                        {
                            require __DIR__ .'/../view/site/login.php';
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