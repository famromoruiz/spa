<?php

namespace gridview;

class Gridview{
    
   public $gridview;
    
    public function __CONSTRUCT(){
       
    }
    
    static function Gridview($model, $configuracion){

      $cuenta = count($model);

      $id = $configuracion['id'];

      $ver = $_REQUEST['r'].'/ver&id=';
      $editar = $_REQUEST['r'].'/editar&id=';
      $eliminar = $_REQUEST['r'].'/eliminar&id=';

      $tabla = ' <table class="table table-hover ">
                  <caption> <span> <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end ">';

      $flag = 0 ;

      for ($i = 0; $i < $configuracion['paginas'] ; $i++) {
        $flag++;
        $tabla.= '<li class="page-item"><a class="page-link text-seremas"  onclick="actualiza_tabla('.$flag.');" ">'.$flag.'</a></li>';
      }
    
      $tabla .= '</ul>
              </nav> 
            </span>
          </caption>

  <thead class="thead">
    <tr>';

    foreach ($configuracion['etiquetas'] as $key => $val) {
      $css_col = isset($val['css']) ? $val['css'] : '';
      $tabla .='<th class="'.$css_col.'" scope="col">'.ucwords(strtolower($val['nombre'])).'</th>';
    }

    $tabla .='<th class="text-center" scope="col"></th>';
      
    $tabla .='</tr>
  </thead>
  <tbody>';

$t = 0;


   
   foreach ($model as $value) {

    $t++;

    $tabla .= '<tr>';

    foreach ($configuracion['atributos'] as $key => $val) {


      if ($val == 'rol') {

        switch ($value->$val) {
          case 10:
            $datos = strtoupper('admin');
            break;
            case 20:
            $datos = strtoupper('cajero');
            break;
            case 30:
            $datos = strtoupper('terapeuta');
            break;
        }

       
        
      }else{
        $datos = $val == 'email' ?'<a class="text-seremas" href="mailto:'.strtolower($value->$val).'">'.strtolower($value->$val).'</a>' : ucwords(strtolower($value->$val));
      }

       
       $css = isset($configuracion['css'][$val]) ? $configuracion['css'][$val] : '' ;
       $tabla .= '<td class="'.$css.'">'.$datos.'</td>';

    }

    $tabla .= '<td class="text-center ">

         <div class="dropdown mr-1">
    <button type="button" class="btn btn-seremas dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
      Acciones
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">';
    $tabla .= $_REQUEST['r'] == 'almacen' ? '' : '<a href="?r='.$ver.$value->$id.'" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>';
    $tabla .= '<a href="?r='.$editar.$value->$id.'" class="dropdown-item"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>';

    $tabla .= '<a href="?r='.$eliminar.$value->$id.'" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
      
   $tabla.=' </div>
  </div>
   </td> ';


    

    $tabla .='</tr>';
    
   }
    
 $tabla .= '</tr></tbody>
</table>';

      $gridview = $tabla;
      
        return $gridview;       
    }

}

