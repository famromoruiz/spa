<?php
use Spipu\Html2Pdf\Html2Pdf;
require __DIR__ . '/../model/productos.php';
require __DIR__ . '/../model/cliente.php';
require __DIR__ . '/../model/cita.php';
require __DIR__ . '/../model/habitacion.php';
require __DIR__ . '/../model/masajista.php';
require __DIR__ . '/../model/servicio.php';
require __DIR__ . '/../model/serviciosCita.php';
require __DIR__ . '/../model/usuario.php';
require __DIR__ . '/../model/almacen.php';
require __DIR__ . '/../model/ticket.php';
require __DIR__ . '/../model/paquetes.php';

class AjaxController{

    
   private $modelCliente;
   private $modelCita;
   private $modelHabitacion;
   private $modelServicio;
   private $modelServiciosCita;
   private $modelUsuario;
   private $modelAlmacen;
   private $modelTicket;
   private $modelPaquetes;
    
    public function __CONSTRUCT(){
     
      $this->modelProductos = new Productos();
       $this->modelCliente = new Cliente();
       $this->modelCita = new Cita();
       $this->modelHabitacion = new Habitacion();
       $this->modelMasajista = new Masajista();
       $this->modelServicio = new Servicio();
       $this->modelServiciosCita = new ServiciosCita();
       $this->modelUsuario = new usuario();
       $this->modelAlmacen = new Almacen();
       $this->modelTicket = new Ticket();
       $this->modelPaquetes = new Paquetes();
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
              $color = "#FFFF00";
              break;case 5:
              $color = "#D8D8D8";
              break;
            
            
          }

          foreach ($this->modelCita->Listarserv($r->id_cita) as $sr) {
            $flag++;
            
            $servicios .= "Servicio: ".$flag." Zona: ".$sr->zona." Tratamiento: ".$sr->tratamiento."<br>";
          }

      

          
         
          $citas[] = array("id"=>$r->id_masajista,"resourceId"=>$r->id_masajista, "title"=>$r->nombre,'start'=>$r->inicio,'end'=>$r->fin, "description"=>$servicios,"id_cita"=>$r->id_cita,"tel"=>$r->tel,"estado"=>$r->status,"color"=>$color, "allDay"=>false);
        
       }

       $citas= json_encode($citas,JSON_PRETTY_PRINT);

        echo $citas;
    }

    public function Verificar_cita(){
      
        if ($_POST) {

          $obj = (object) [
            'id' => intval($_POST['id']),
            'estado' => intval($_POST['estado']),
          ];

          $datos=$this->modelCita->Comprobar($obj);
          $datos = count($datos);

          $r = $datos > 0 ? 'acces' : 'deny';

            echo $r;
        }
    }


    public function Confirmar_cita(){
      
        if ($_POST) {

         $obj = (object) [
            'id' => intval($_POST['id']),
            'estado' => 2,
          ];

          $datos=$this->modelCita->Confirmar($obj);
          

          $r = 'ok';

            echo $r;
        }
    }

      public function Iniciar_cita(){
      
        if ($_POST) {

         $obj = (object) [
            'id' => intval($_POST['id']),
            'estado' => 3,
          ];

          $datos=$this->modelCita->Confirmar($obj);
          

          $r = 'ok';

            echo $r;
        }
    }

     public function Terminar_cita(){
      
        if ($_POST) {

         $obj = (object) [
            'id' => intval($_POST['id']),
            'estado' => 4,
          ];

          $datos=$this->modelCita->Confirmar($obj);
          

          $r = 'ok';

            echo $r;
        }
    }

    public function Cobrar_cita(){
      
        if ($_POST) {

         // var_dump($_POST['citas_pv']['id_cita']);exit;

         $obj = (object) [
            'id' => intval($_POST['citas_pv']['id_cita']),
            'estado' => 5,
          ];

          $datos=$this->modelCita->Confirmar($obj);
          

          $r = 'ok';

            echo $r;
        }
    }


     public function Masajistas(){
        //header('Content-Type: application/json');
      $masajistas=array();

       foreach ($this->modelUsuario->Listar_rol_masajista() as $r) {

          $citas[] = array("id"=>$r->id_usuario,"title"=>strtoupper($r->nikname));
        
       }

       $masajistas= json_encode($citas,JSON_PRETTY_PRINT);

        echo $masajistas;
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

    public function Listar_servicios_punto_venta(){
      if ($_POST) {
        $id = $_POST['id'];
        $servicios = $this->modelServicio->Obtener_por_zona($id);
        //$serv_data = [];
        // foreach ($servicios as $servicio) {
        //   $serv_data[] = array('id' => $servicio->id_servicio , 'text' => $servicio->tratamiento );
        // }
        // echo json_encode($serv_data);

        $serv = '';
        foreach ($servicios as $servicio) {
          $serv.= '<option value="'.$servicio->id_servicio.'">'.$servicio->tratamiento.'</option>';  
                  }
        echo $serv;
      }
    }

    public function Listar_citas_por_cobrar(){
      if ($_POST) {
        $paquetes = $this->modelPaquetes->Obtener($_POST['id']);

       

        

       // var_dump(count($paquetes));exit;

         $r="";
         $serv_pack = [];
         $servic = 0;
         $id =0;  foreach ($this->modelCita->Listarcobro($_POST['id']) as $c) { 

                    $id++;


                  $fecha = $c->inicio;
                  $fecha = explode(' ', $fecha);
                  $fecha = explode('-', $fecha[0]);
                  $fecha = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];

                  $servicios = $this->modelCita->Listarserv($c->id_cita);



                  $n =count($servicios);

                  $tipo =$c->tipo_cliente;

                  

                  $costo = 0.00;

                  

                  for ($i = 0; $i < $n ; $i++) {
                   // $serv_pack[] = $servicios[$i]->id_servicio;

                    if (count($paquetes) > 0) {

                      foreach ($paquetes as $p) {

                      //var_dump($servicios[$i]->id_servicio);exit;

                      if ($p->id_servicio == $servicios[$i]->id_servicio) {
                        $serv_pack[] = $servicios[$i]->id_servicio;
                       $servic = 0;
                      }else{
                        $serv_pack[] = 0;
                        $servic = $servicios[$i]->$tipo;
                      }
                    }

                     $costo = $servic + $costo;
                      
                    }else{
                    
                     $costo =  $servicios[$i]->$tipo + $costo;

                    }
                    // foreach ($paquetes as $p) {

                    //   //var_dump($servicios[$i]->id_servicio);exit;

                    //   if ($p->id_servicio == $servicios[$i]->id_servicio) {
                    //     $serv_pack[] = $servicios[$i]->id_servicio;
                    //    $servic = 0;
                    //   }else{
                    //     $serv_pack[] = 0;
                    //     $servic = $servicios[$i]->$tipo;
                    //   }
                    // }

                    
                  }

                  // echo '<pre>';
                  // var_dump($serv_pack);exit();

                 // $serv_pack = trim(json_encode($serv_pack));
                  
          $r.=' <li id="masajes_l'.$id.'" class="list-group-item d-flex justify-content-between align-items-center "> '.$fecha.' '.strtoupper($c->nombre).' '.'$'.number_format($costo,2).' <span><button type="button" class="btn btn-seremas btn-sm" onclick="agregar_citas_pago(\'masajes_l'.$id.'\',\''.strtoupper($c->nombre).'\',\''.number_format($costo,2).'\',\''.$fecha.'\',\''.$c->id_cita.'\');">Añadir</button></span></li>';
       }

       $respuesta = array("boton" => $r , "servicios" => $serv_pack);

       echo json_encode($respuesta);
      }
     
    }

    public function Rebaja_pack(){
      if ($_POST) {
        foreach ($_POST['paquetes'] as $p) {
          
        $pack = $this->modelPaquetes->Obtener_1($p);
        $pack_c = $pack->cantidad - 1;
        $pk = (object) array('cantidad' => $pack_c , 'id_servicio' => $p);
        $this->modelPaquetes->Resta_pack($pk);
        }
        var_dump($pk);exit;
      }
    }

    public function Obtener_servicio(){
      if ($_POST) {
        $id = $_POST['id'];
        $servicio = $this->modelServicio->Obtener($id);
        echo json_encode($servicio);
      }
    }


    public function Descontar_almacen(){

      if ($_POST) {
        $productos = $_POST['productos'];

      foreach ($productos as $producto) {
        $cantidad = $this->modelAlmacen->Obtener_cantidad($producto['upc']);
        $cantidad = intval($cantidad->cantidad) - intval($producto['cantidad']);
        $prod = (object) array('cantidad' => $cantidad , 'upc' => $producto['upc']);
        $this->modelAlmacen->Actualizar($prod);
      }

       echo 'ok';
      }

      

      echo 'ok';
    }

    public function Tiket(){


      if ($_POST) {

        $cuenta_tr = count($_POST['descripcion']);
        $tr = '';

        for ($i = 0; $i < $cuenta_tr ; $i++) {
          $tr .= '<tr><td class="cantidad">'.$_POST['descripcion'][$i]['cantidad'].'</td><td class="producto">'.$_POST['descripcion'][$i]['descripcion'].'</td><td class="precio">'.$_POST['descripcion'][$i]['precio'].'</td></tr>';
        }

        $ticket = (Object) array(
          'cliente' => $_POST['id_cliente'],
          'descripcion' => trim($tr),
          'monto' => $_POST['monto']

        );

                      // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML('<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Descripcion</th>
      <th scope="col" class="text-center">Cantidad</th>
      <th scope="col" class="text-center">Precio</th>
      
    </tr>
  </thead>
  <tbody class="prod" id="pagos">
    '.$ticket->descripcion.'
  </tbody>
</table>');

        // Output a PDF file directly to the browser
        $mpdf->Output('docs/tickets/filename.pdf','F');

        $this->modelTicket->Registrar($ticket);

        var_dump($ticket);exit;
        
      }
    }


     public function Listar_productos_almacen(){
      if ($_POST) {
        
        $productos = $this->modelProductos->Listar();
        $productos_l = [];
        foreach ($productos as $producto) {
          $productos_l[] = array('id' => $producto->id_producto , 'text' => $producto->nombre );
        }
        echo json_encode($productos_l);
      }
    }

   

  

    public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
       
}