<?php
namespace route;

class Route{
    
   public $route;
    
    public function __CONSTRUCT(){
       
    }
    
    static function Ruta($ruta){
      $ruta = count($ruta) > 1 ? "?r=".$ruta[0]."/".$ruta[1] : "?r=".$ruta[0];
        echo $ruta;    
    }

     static function Active($menu){
      $active = $_REQUEST['r'] == $menu ? "active":""; 
        echo $active;       
    }
}
?>