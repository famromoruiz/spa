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
require __DIR__ . '/../model/promociones.php';
require __DIR__ . '/../model/vale.php';

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
   private $modelPromociones;
   private $modelVale;
    
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
       $this->modelPromociones = new Promociones();
       $this->modelVale = new Vale();
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
       // var_dump($pk);exit;
      }
    }

    public function Inserta_pack(){
      if ($_POST) {
        foreach ($_POST['paquetes'] as $p) {
          
        $pk = (object) array('id_cliente' => $p['id_cliente'], 'id_servicio' => $p['id_servicio'] ,'cantidad' => $p['cantidad'],'fecha_caducidad' => '2019-01-01');
        $this->modelPaquetes->Inserta_pack($pk);
        }
        //var_dump($_POST);exit;
      }
    }

    public function Obtener_servicio(){
      if ($_POST) {
        $id = $_POST['id'];
        $servicio = $this->modelServicio->Obtener($id);
        echo json_encode($servicio);
      }
    }

    public function Actualiza_almacen(){
      if ($_POST) {

        $al = (object) array('id' => $_POST['id'] , 'cantidad' => $_POST['cantidad']);

        $this->modelAlmacen->Actualizar_cantidad($al);
        
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

    public function Valida_promo(){
      if ($_POST) {
        $codigo = $_POST['codigo'];

       $promo = $this->modelPromociones->Obtener($codigo);

       if ($promo == false) {
        $res = array('respuesta' => 'no existe promo', 'descuento' => 0);

        echo json_encode($res);
        
       }else{
        $res = array('respuesta' => 'si existe', 'descuento' => $promo->descuento);

        echo json_encode($res);
       }
      }
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

     public function Listar_productos_almacen_vales(){
      if ($_POST) {
        
        $productos = $this->modelProductos->Listar_2();
        $productos_l = [];
        foreach ($productos as $producto) {
          $productos_l[] = array('id' => $producto->id_producto , 'text' => $producto->nombre );
        }
         echo json_encode($productos_l);
      }
    }

     public function Listar_personal_almacen(){
      if ($_POST) {
        
        $personal = $this->modelUsuario->Listar_normal();
        $personal_l = [];
        foreach ($personal as $usuario) {
          $personal_l[] = array('id' => $usuario->id_usuario , 'text' => $usuario->nombre );
        }
        echo json_encode($personal_l);
      }
    }


      public function Verifica_firma(){
      if ($_POST) {



        $vale = (object) array(
          'producto' => intval($_POST['producto']), 
          'cantidad' => intval($_POST['cantidad']), 
          'entrega' => $_SESSION['id_usuario'],
          'recibe' => $_POST['usuario']);

        $user = (object) array('id' => $_POST['usuario'] , 'pass' => $_POST['firma']);
        $user->pass = sha1($user->pass);
        
        
        $usuario = $this->modelUsuario->Obtener_id_pass($user->id, $user->pass);


        $desbloquea = $usuario == true ? 'ok' : 'denegado';

        if ($desbloquea == 'ok') {
          $cantidad = $this->modelAlmacen->Obtener_cantidad_byid($vale->producto);
          $cantidad = intval($cantidad->cantidad) - $vale->cantidad;
          $rebaja = (object) array('cantidad' => $cantidad , 'id' => $vale->producto);
         // var_dump($rebaja);exit;
          $this->modelAlmacen->Actualizar_cantidad_byid($rebaja);
          $this->modelVale->Registrar($vale);
          echo 'ok';
        }else{
          echo 'nel';
        }
      }
    }

    public function Lista_vales(){
      if ($_POST) {
        $vales = $this->modelVale->Listar();

        $vales = json_encode($vales, JSON_PRETTY_PRINT);

        echo $vales;
      }
    }

    public function Reporte(){
      if ($_POST) {
        $fecha = (object) array(
          'inicio' => fecha($_POST['inicio']), 
          'termino' => fecha($_POST['termino'])
        );

        $ventas = $this->modelTicket->Reporte($fecha);

        $ventas = json_encode($ventas , JSON_PRETTY_PRINT);

        echo $ventas;
      }
    }

    public function Graficas(){
      if ($_POST) {
         
         $fecha = date('Y-m-d');
         $d_f = dias_semana($fecha);

        $dia = (object) array(
          'lunes'=>$d_f[0],
          'martes'=>$d_f[1] ,
          'miercoles'=>$d_f[2],
          'jueves'=>$d_f[3],
          'viernes'=>$d_f[4],
          'sabado'=>$d_f[5]
        );
        if ($_POST['grafica'] == 'ventas') {

      $lunes = $this->modelTicket->Obtener_montos($dia->lunes);
      $martes = $this->modelTicket->Obtener_montos($dia->martes);
      $miercoles = $this->modelTicket->Obtener_montos($dia->miercoles);
      $jueves = $this->modelTicket->Obtener_montos($dia->jueves);
      $viernes = $this->modelTicket->Obtener_montos($dia->viernes);
      $sabado = $this->modelTicket->Obtener_montos($dia->sabado);

      $dia->lunes =  $lunes->monto == null ? 0 : $lunes->monto;
      $dia->martes = $martes->monto == null ? 0 :$martes->monto;
      $dia->miercoles = $miercoles->monto == null ? 0 : $miercoles->monto;
      $dia->jueves = $jueves->monto == null ? 0 :$jueves->monto ;
      $dia->viernes = $viernes->monto == null ? 0 :$viernes->monto;
      $dia->sabado = $sabado->monto == null ? 0 :$sabado->monto;

      echo json_encode($dia);
          
        }

         if ($_POST['grafica'] == 'clientes') {

      $lunes = $this->modelCliente->Total_clientes($dia->lunes);
      $martes = $this->modelCliente->Total_clientes($dia->martes);
      $miercoles = $this->modelCliente->Total_clientes($dia->miercoles);
      $jueves = $this->modelCliente->Total_clientes($dia->jueves);
      $viernes = $this->modelCliente->Total_clientes($dia->viernes);
      $sabado = $this->modelCliente->Total_clientes($dia->sabado);

      $dia->lunes =  $lunes->clientes == null ? 0 : $lunes->clientes;
      $dia->martes = $martes->clientes == null ? 0 :$martes->clientes;
      $dia->miercoles = $miercoles->clientes == null ? 0 : $miercoles->clientes;
      $dia->jueves = $jueves->clientes == null ? 0 :$jueves->clientes ;
      $dia->viernes = $viernes->clientes == null ? 0 :$viernes->clientes;
      $dia->sabado = $sabado->clientes == null ? 0 :$sabado->clientes;

      echo json_encode($dia);
          
        }
        
      }
     

     
    }

   

  

    public function Error(){
      require __DIR__ .'/../view/layauts/error.php';
    }
       
}


 function dias_semana($fecha){

  $dias = array(
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday');

  $strFecha = strtotime($fecha);

  $fechas = [];

 switch (date("l",$strFecha)) {
  case 'Monday':
     $fechas[] = $lunes = date('Y-m-d',strtotime('today',$strFecha));
     $fechas[] = $martes = date('Y-m-d',strtotime('1 day ',$strFecha));
     $fechas[] = $miercoles = date('Y-m-d',strtotime('2 day ',$strFecha));
     $fechas[] = $jueves = date('Y-m-d',strtotime('3 day ',$strFecha));
     $fechas[] = $viernes = date('Y-m-d',strtotime('4 day ',$strFecha));
     $fechas[] = $sabado = date('Y-m-d',strtotime('5 day',$strFecha));
     break;
  case 'Tuesday':
     $fechas[] = $lunes = date('Y-m-d',strtotime('- 1 day',$strFecha));
     $fechas[] = $martes = date('Y-m-d',strtotime('today ',$strFecha));
     $fechas[] = $miercoles = date('Y-m-d',strtotime('1 day ',$strFecha));
     $fechas[] = $jueves = date('Y-m-d',strtotime('2 day ',$strFecha));
     $fechas[] = $viernes = date('Y-m-d',strtotime('3 day ',$strFecha));
     $fechas[] = $sabado = date('Y-m-d',strtotime('4 day',$strFecha));
     break;
  case 'Wednesday':
     $fechas[] = $lunes = date('Y-m-d',strtotime('- 2 day',$strFecha));
     $fechas[] = $martes = date('Y-m-d',strtotime('- 1 day ',$strFecha));
     $fechas[] = $miercoles = date('Y-m-d',strtotime('today ',$strFecha));
     $fechas[] = $jueves = date('Y-m-d',strtotime('1 day ',$strFecha));
     $fechas[] = $viernes = date('Y-m-d',strtotime('2 day ',$strFecha));
     $fechas[] = $sabado = date('Y-m-d',strtotime('3 day',$strFecha));
     break;
  case 'Thursday':
     $fechas[] = $lunes = date('Y-m-d',strtotime('- 3 day',$strFecha));
     $fechas[] = $martes = date('Y-m-d',strtotime('-2 ',$strFecha));
     $fechas[] = $miercoles = date('Y-m-d',strtotime('1 day ',$strFecha));
     $fechas[] = $jueves = date('Y-m-d',strtotime('today ',$strFecha));
     $fechas[] = $viernes = date('Y-m-d',strtotime('1 day ',$strFecha));
     $fechas[] = $sabado = date('Y-m-d',strtotime('2 day',$strFecha));
     break;
  case 'Friday':
     $fechas[] = $lunes = date('Y-m-d',strtotime('- 4 day',$strFecha));
     $fechas[] = $martes = date('Y-m-d',strtotime('- 3 day',$strFecha));
     $fechas[] = $miercoles = date('Y-m-d',strtotime('-2 day ',$strFecha));
     $fechas[] = $jueves = date('Y-m-d',strtotime('-1 day ',$strFecha));
     $fechas[] = $viernes = date('Y-m-d',strtotime('today ',$strFecha));
     $fechas[] = $sabado = date('Y-m-d',strtotime('1 day',$strFecha));
     break;
  case 'Saturday':
     $fechas[] = $lunes = date('Y-m-d',strtotime('- 5 day ',$strFecha));
     $fechas[] = $martes = date('Y-m-d',strtotime('- 4 day ',$strFecha));
     $fechas[] = $miercoles = date('Y-m-d',strtotime('- 3 day ',$strFecha));
     $fechas[] = $jueves = date('Y-m-d',strtotime('- 2 day ',$strFecha));
     $fechas[] = $viernes = date('Y-m-d',strtotime('- 1 day ',$strFecha));
     $fechas[] = $sabado = date('Y-m-d',strtotime('today',$strFecha));
     break;
   
 }
    return $fechas;
}

 function Fecha($fecha){

          $fecha = explode('/', $fecha);
          $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

          return $fecha;

        }