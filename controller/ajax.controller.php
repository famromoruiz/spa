<?php
require __DIR__ . '/../model/productos.php';
require __DIR__ . '/../model/cliente.php';
require __DIR__ . '/../model/cita.php';
require __DIR__ . '/../model/habitacion.php';
require __DIR__ . '/../model/masajista.php';
require __DIR__ . '/../model/servicio.php';
require __DIR__ . '/../model/serviciosCita.php';

class AjaxController{
    
   private $modelCliente;
   private $modelCita;
   private $modelHabitacion;
   private $modelServicio;
   private $modelServiciosCita;
    
    public function __CONSTRUCT(){
      $this->modelProductos = new Productos();
       $this->modelCliente = new Cliente();
       $this->modelCita = new Cita();
       $this->modelHabitacion = new Habitacion();
       $this->modelMasajista = new Masajista();
       $this->modelServicio = new Servicio();
       $this->modelServiciosCita = new ServiciosCita();
    }
    
    public function Citas(){
        //header('Content-Type: application/json');
      $citas=array();

       foreach ($this->modelCita->Listar() as $r) {

          $servicios = "";
          $flag= 0;

          switch ($r->status) {
            case 1:
              $color = "#563d7c";
              break;case 2:
              $color = "#00BFFF";
              break;case 3:
              $color = "#FF4000";
              break;case 4:
              $color = "#FF0040";
              break;case 5:
              $color = "#D8D8D8";
              break;
            
            
          }

          foreach ($this->modelCita->Listarserv($r->id_cita) as $sr) {
            $flag++;
            
            $servicios .= "Servicio: ".$flag." Zona: ".$sr->zona." Tratamiento: ".$sr->tratamiento."<br>";
          }

      

          
         
          $citas[] = array("id"=>1, "title"=>$r->nombre,'start'=>$r->inicio,'end'=>$r->fin, "description"=>$servicios,"color"=>$color, "allDay"=>false);
        
       }

       $citas= json_encode($citas,JSON_PRETTY_PRINT);

        echo $citas;
    }

    public function Ventas(){
      $q = isset($_GET['q']);
    $p = isset($_GET['p']);

    $res;

    //$test = isset($GET['b']);
    if ($q == false) {
      if ($p == false) {
        
      }else{
         $b = $_GET['p'];
      $res = $this->modelProductos->Buscar2($b);
      }
     
    }else{
      $b = $_GET['q'];
      $res = $this->modelProductos->Buscar($b);
    }
    
   
    

      

     $bs=[];

       foreach ( $res as $r) {

         
          $bs[] = ["id"=>$r->id_producto, "title"=>$r->upc.' '.$r->nombre.' '.$r->descripcion,"precio"=> $r->precio_publico];
        
       }

       $productos= json_encode($bs);

        echo $productos;
    }


    public function Agregarcliente(){
      if ($_POST) {

        $cliente = new Cliente;
        $cliente->nombre = $_POST['nombre'];
        $cliente->a_paterno = $_POST['a_paterno'];
        $cliente->a_materno = $_POST['a_materno'];
        $cliente->direccion = $_POST['calle'];
        $cliente->fraccionamiento = $_POST['fraccionamiento'];
        $cliente->ciudad = $_POST['ciudad'];
        $cliente->municipio = $_POST['municipio'];
        $cliente->estado = $_POST['estado'];
        $cliente->pais = 'Mexico';
        $cliente->tel_f =$_POST['telefono'];
        $cliente->cel_1 = $_POST['cel_1'];
        $cliente->cel_2 = $_POST['cel_2'];
        $cliente->tel_o =$_POST['telefono_oficina'];
        $cliente->email = $_POST['email'];
        $cliente->facebook = $_POST['facebook'];
        $cliente->instagram = $_POST['instagram'];
        $cliente->foto = 'kuasfjkafgkuhcajkfhsah';

        $this->modelCliente->Registrar($cliente);
       

      }
    }

     public function Vercliente(){
      if ($_POST) {

        $id = $_POST['id'];

       $cliente =  $this->modelCliente->Obtener($id);
       
       echo json_encode($cliente);

      }
    }

   

  

    public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
    
   
    
  
    
    
}