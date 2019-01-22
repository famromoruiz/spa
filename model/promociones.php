<?php
class Promociones
{
	private $pdo;
    
    public $id_promocion;
    public $codigo;
	public $descripcion;
	public $descuento;
	public $inicia;
	public $termina;
	public $status;
	

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

		

			$stm = $this->pdo->prepare("SELECT * FROM promociones where status = 0 ");
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

			$cuenta = $this->pdo->prepare("SELECT * FROM promociones where status = 0 ");
			$cuenta->execute();
			
			$total_filas = $cuenta->rowCount();

			$total_paginas = ceil($total_filas / $por_pagina);

			$total_paginas = $total_paginas < 1 ? 1 : $total_paginas;

			$stm = $this->pdo->prepare("SELECT * FROM promociones where status = 0 ");
			$stm->execute();

			return ['lista' =>$stm->fetchAll(PDO::FETCH_OBJ) , 'paginas' => $total_paginas, 'id' => 'id_promocion' ];
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($codigo)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM promociones WHERE codigo = ? and status = 0");
			          

			$stm->execute(array($codigo));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Obtener_2($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM promociones WHERE id_promocion = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener_cantidad($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT al.cantidad FROM almacen al join productos pr on al.id_producto = pr.id_producto WHERE pr.upc = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try 
		{
		$sql = "INSERT INTO promociones (
			codigo,
			descripcion,
			descuento,
			inicia,
			termina) 
		        VALUES (?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                   	$data->codigo,
					$data->descripcion,
					$data->descuento,
					$data->inicia,
					$data->termina
                )
			);
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
			            ->prepare("DELETE FROM promociones WHERE id_promocion = ?");			          

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
			$sql = "UPDATE promociones  SET descripcion = ?, descuento = ?, inicia = ?, termina = ? WHERE id_promocion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
					$data->descripcion,
					$data->descuento,
					$data->inicia,
					$data->termina,
					$data->id_promocion
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
}