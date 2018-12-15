<?php
class Habitacion
{
	private $pdo;
    
    public $id_habitacion;
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

			$stm = $this->pdo->prepare("SELECT * FROM habitaciones");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

  public function Listar($pagina)
  {



    $pagina = $pagina;
    
    $por_pagina = 20; //la cantidad de registros que desea mostrar
    $adyacente  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($pagina - 1) * $por_pagina;
    try
    {
      $result = array();

      $cuenta = $this->pdo->prepare("SELECT * FROM habitaciones ");
      $cuenta->execute();
      
      $total_filas = $cuenta->rowCount();

      $total_paginas = ceil($total_filas / $por_pagina);

      $total_paginas = $total_paginas < 1 ? 1 : $total_paginas;

      $stm = $this->pdo->prepare("SELECT * FROM habitaciones  LIMIT $offset,$por_pagina");
      $stm->execute();

      return ['lista' =>$stm->fetchAll(PDO::FETCH_OBJ) , 'paginas' => $total_paginas, 'id' => 'id_habitacion' ];
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
			          ->prepare("SELECT * FROM clientes WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM clientes WHERE id = ?");			          

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
			$sql = "UPDATE clientes SET 
						Nombre          = ?, 
						Apellido        = ?,
                        Correo        = ?,
						Sexo            = ?, 
						FechaNacimiento = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre, 
                        $data->Correo,
                        $data->Apellido,
                        $data->Sexo,
                        $data->FechaNacimiento,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cita $data)
	{
		try 
		{
		$sql = "INSERT INTO citas (inicio, fin, id_cliente, id_habitacion, id_masajista) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->inicio,
                    $data->fin, 
                    $data->id_cliente, 
                    $data->id_habitacion,
                    $data->id_masajista
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}