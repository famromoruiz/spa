<?php

namespace gridview;

class Gridview{
    
   public $gridview;
    
    public function __CONSTRUCT(){
       
    }
    
    static function Gridview($model, $configuracion){

      $cuenta = count($model);

      $tabla = ' <table class="table table-hover ">
        <caption> <span> <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end ">';

  $flag = 0 ;

  for ($i = 0; $i < $configuracion['paginas'] ; $i++) {
    $flag++;
    $tabla.= '<li class="page-item"><a class="page-link text-seremas"  onclick="actualiza_tabla('.$flag.');" ">'.$flag.'</a></li>';
  }
    
  $tabla .= '</ul>
</nav> </span></caption>

  <thead class="thead">
    <tr>';

    foreach ($configuracion['etiquetas'] as $key => $val) {
      $tabla .='<th scope="col">'.ucwords(strtolower($val)).'</th>';
    }
      
    $tabla .='</tr>
  </thead>
  <tbody>';
   
   foreach ($model as $value) {

    $tabla .= '<tr>';

    foreach ($configuracion['atributos'] as $key => $val) {

       $tabla .= '<td>'. ucwords(strtolower($value->$val)).'</td>';

    }

    $tabla .='</tr>';
    
   }
    
 $tabla .= '</tr></tbody>
</table>';

      $gridview = $tabla;
      
        return $gridview;       
    }

    

}