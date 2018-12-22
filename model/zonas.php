<?php
class Zona
{
	private $pdo;



public $id_zona;
public $nombre;
public $descripcion;
    
    
	

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar_normal()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM zonas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	 public function Listar()
  {



    $pagina = 0;
    
    $por_pagina = 10; //la cantidad de registros que desea mostrar
    $adyacente  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($pagina - 1) * $por_pagina;
    try
    {
      $result = array();

      $cuenta = $this->pdo->prepare("SELECT * FROM zonas ");
      $cuenta->execute();
      
      $total_filas = $cuenta->rowCount();

      $total_paginas = ceil($total_filas / $por_pagina);

      $total_paginas = $total_paginas < 1 ? 1 : $total_paginas;

      $stm = $this->pdo->prepare("SELECT * FROM zonas");
      $stm->execute();

      return ['lista' =>$stm->fetchAll(PDO::FETCH_OBJ) , 'paginas' => $total_paginas, 'id' => 'id_zona' ];
    }
    catch(Exception $e)
    {
      die($e->getMessage());
    }
  }

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM zonas WHERE id_zona = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM zonas WHERE id_zona = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE zonas SET 
						nombre          = ?,
						descripcion          = ?
				    WHERE id_zona = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->descripcion,
                        $data->id_zona
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try 
		{
		$sql = "INSERT INTO zonas (nombre, descripcion) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre,
                    $data->descripcion
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}