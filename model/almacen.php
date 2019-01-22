<?php
class Almacen
{
	private $pdo;
    
    public $id_almacen;
	public $id_producto;
	public $cantidad;
	public $min_stock;
	

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

		

			$stm = $this->pdo->prepare("SELECT * FROM almacen ");
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

			$cuenta = $this->pdo->prepare("SELECT * FROM almacen al join productos pr on al.id_producto = pr.id_producto join prove pro on pro.id_proveedor = pr.id_proveedor ");
			$cuenta->execute();
			
			$total_filas = $cuenta->rowCount();

			$total_paginas = ceil($total_filas / $por_pagina);

			$total_paginas = $total_paginas < 1 ? 1 : $total_paginas;

			$stm = $this->pdo->prepare("SELECT al.id_almacen ,pr.nombre as prod , pro.nombre as prove, cantidad FROM almacen al join productos pr on al.id_producto = pr.id_producto join prove pro on pro.id_proveedor = pr.id_proveedor ");
			$stm->execute();

			return ['lista' =>$stm->fetchAll(PDO::FETCH_OBJ) , 'paginas' => $total_paginas, 'id' => 'id_almacen' ];
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
			          ->prepare("SELECT * FROM almacen WHERE id_almacen = ?");
			          

			$stm->execute(array($id));
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
			          ->prepare("SELECT * FROM almacen WHERE id_producto = ?");
			          

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

	public function Registrar(Almacen $data)
	{
		try 
		{
		$sql = "INSERT INTO almacen (
			id_producto,
			cantidad,
			min_stock) 
		        VALUES (?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                   	$data->id_producto,
					$data->cantidad,
					$data->min_stock,
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
			            ->prepare("DELETE FROM almacen WHERE id_almacen = ?");			          

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
			$sql = "UPDATE almacen al JOIN productos pr on al.id_producto = pr.id_producto  SET al.cantidad = ? WHERE pr.upc = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                         $data->cantidad,
						 $data->upc
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar_cantidad($data)
	{


		try 
		{
			$sql = "UPDATE almacen  SET cantidad = ? WHERE id_almacen = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                         $data->cantidad,
						 $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener_cantidad_byid($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT cantidad FROM almacen  WHERE id_producto = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar_cantidad_byid($data)
	{


		try 
		{
			$sql = "UPDATE almacen  SET cantidad = ? WHERE id_producto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                         $data->cantidad,
						 $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
}