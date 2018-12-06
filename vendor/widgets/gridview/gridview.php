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
      $tabla .='<th scope="col">'.ucwords(strtolower($val)).'</th>';
    }

    $tabla .='<th class="text-center" scope="col">Acciones</th>';
      
    $tabla .='</tr>
  </thead>
  <tbody>';
   
   foreach ($model as $value) {

    $tabla .= '<tr>';

    foreach ($configuracion['atributos'] as $key => $val) {

       $datos = $val == 'email' ? strtolower($value->$val) : ucwords(strtolower($value->$val));
       $tabla .= '<td>'.$datos.'</td>';

    }

    $tabla .= '<td class="d-flex justify-content-between align-items-center"><a href="?r='.$ver.$value->$id.'"><i class="fa fa-eye" aria-hidden="true"></i></a> <a href="?r='.$editar.$value->$id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a id="?r='.$eliminar.$value->$id.'" class="eliminar" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';

    $tabla .='</tr>';
    
   }
    
 $tabla .= '</tr></tbody>
</table>';

      $gridview = $tabla;
      
        return $gridview;       
    }

}

