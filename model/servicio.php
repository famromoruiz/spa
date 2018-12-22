<?php
class Servicio
{
	private $pdo;



public $id_servicio;
public $id_zona;
public $tratamiento;
public $regular;
public $preferente;
public $intermedia;
public $mas;
public $tiempo;
public $notas;
    
    
	

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

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM servicios");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	 public function Listar_modelo()
  {



    $pagina = 0;
    
    $por_pagina = 10; //la cantidad de registros que desea mostrar
    $adyacente  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($pagina - 1) * $por_pagina;
    try
    {
      $result = array();

      $cuenta = $this->pdo->prepare("SELECT * FROM servicios ");
      $cuenta->execute();
      
      $total_filas = $cuenta->rowCount();

      $total_paginas = ceil($total_filas / $por_pagina);

      $total_paginas = $total_paginas < 1 ? 1 : $total_paginas;

      $stm = $this->pdo->prepare("SELECT * FROM servicios join zonas on servicios.id_zona = zonas.Id_zona");
      $stm->execute();

      return ['lista' =>$stm->fetchAll(PDO::FETCH_OBJ) , 'paginas' => $total_paginas, 'id' => 'id_servicio' ];
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
			          ->prepare("SELECT * FROM servicios join zonas on servicios.id_zona = zonas.id_zona WHERE id_servicio = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener_por_zona($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM servicios WHERE id_zona = ?");
			          

			$stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_OBJ);
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
			            ->prepare("DELETE FROM servicios WHERE id_servicio = ?");			          

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
			$sql = "UPDATE servicios SET 
						id_zona = ?,
						tratamiento =?,
						regular =?,
						tiempo = ?
				    WHERE id_servicio = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->id_zona, 
                        $data->tratamiento,
                        $data->regular,
                        $data->tiempo,
                        $data->id_servicio
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
		$sql = "INSERT INTO servicios (id_zona, tratamiento, regular, tiempo) 
		        VALUES (?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    	$data->id_zona, 
                        $data->tratamiento,
                        $data->regular,
                        $data->tiempo
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}