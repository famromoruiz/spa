<?php

namespace roles;

class Roles{
    
   public $rol;
    
    public function __CONSTRUCT(){
       
    }
    
    static function Rol($rol){

    	switch ($rol) {
    		case 10:
    			$redirige ="location: ?r=site";
    			break;
    		case 20:
    			$redirige ="location: ?r=site";
    			break;
    		case 30:
    			$redirige ="location: ?r=masajista";
    			break;
    		
    		
    	}

    	
    	 return $redirige ;
    	      
    }

     static function Acceso($rol){

    	switch ($rol) {
    		case 10:
    			
    			break;
    		case 20:
    			if ($_REQUEST['r'] == 'sale' or $_REQUEST['r'] == 'citas'  or $_REQUEST['r'] == 'citas/agregar' or $_REQUEST['r'] == 'citas/ver' or $_REQUEST['r'] == 'citas/editar' or $_REQUEST['r'] == 'citas/eliminar' or $_REQUEST['r'] == 'citas/error' ) {
    				
    			}else{
    				 header("location: ?r=site/error");
    			}
    			break;
    		case 30:
    			if ($_REQUEST['r'] == 'masajista') {
    				
    			}else{
    				 header("location: ?r=site/error");
    			}
    			break;
    		
    		
    	}

    	
    	 return;
    	      
    }

    

}