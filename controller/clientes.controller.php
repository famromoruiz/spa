<?php
use \roles\Roles;
require __DIR__ . '/../model/cliente.php';

class ClientesController{
    
  private $modelCliente;
    
    public function __CONSTRUCT(){
      Roles::Acceso($_SESSION['rol']);
      $this->modelCliente = new Cliente();
    }
    
    public function Index(){
        require __DIR__ .'/../view/clientes/index.php';
    }

    public function Ver(){

      $id = $_GET['id'];

      $model = $this->modelCliente->Obtener($id);

      require __DIR__ .'/../view/clientes/ver.php';

    }

    public function Editar(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';

      $model = $this->modelCliente->Obtener($id);

      if ($_POST) {
        $cliente = new Cliente;
        $cliente->id_cliente = $_POST['id_cliente'];
        $cliente->nombre = $_POST['nombre'];
        $cliente->a_paterno = $_POST['a_paterno'];
        $cliente->a_materno = $_POST['a_materno'];
        $cliente->direccion = $_POST['calle'];
        $cliente->fraccionamiento = $_POST['fraccionamiento'];
        $cliente->ciudad = $_POST['ciudad'];
        $cliente->municipio = $_POST['municipio'];
        $cliente->estado = $_POST['estado'];
        $cliente->pais = 'mexico';
        $cliente->tel_f = $_POST['telefono'];
        $cliente->cel_1 = $_POST['cel_1'];
        $cliente->cel_2 = $_POST['cel_2'];
        $cliente->tel_o = $_POST['telefono_oficina'];
        $cliente->email = $_POST['email'];
        $cliente->facebook = $_POST['facebook'];
        $cliente->instagram = $_POST['instagram'];

        $this->modelCliente->Actualizar($cliente);
        $model = $this->modelCliente->Obtener($cliente->id_cliente);
        



      }

      require __DIR__ .'/../view/clientes/editar.php';
    }

     public function Eliminar(){

      $id = $_GET['id'];

      $model = $this->modelCliente->Eliminar($id);

      require __DIR__ .'/../view/clientes/ver.php';

    }

     public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
}