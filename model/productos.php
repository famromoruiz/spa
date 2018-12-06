<?php
class Productos
{
	private $pdo;
    
	
public $id_producto;
public $upc;
public $nombre;
public $descripcion;
public $precio;
public $precio_publico;

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

			$stm = $this->pdo->prepare("SELECT * FROM productos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Tabla($pagina)
	{



		$pagina = $pagina;
		// $pagina = (isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']))?$_REQUEST['pagina']:1;
		$por_pagina = 20; //la cantidad de registros que desea mostrar
		$adyacente  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($pagina - 1) * $por_pagina;
		try
		{
			$result = array();

			$cuenta = $this->pdo->prepare("SELECT * FROM productos ");
			$cuenta->execute();
			//$cuenta->fetch(PDO::FETCH_NUM);
			$total_filas = $cuenta->rowCount();

			$total_paginas = ceil($total_filas / $por_pagina);

			$stm = $this->pdo->prepare("SELECT * FROM productos  LIMIT $offset,$por_pagina");
			$stm->execute();

			return ['lista' =>$stm->fetchAll(PDO::FETCH_OBJ) , 'paginas' => $total_paginas < 1 ? 1 : $total_paginas , 'id' => 'id_producto'];
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Buscar($b){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM `productos` WHERE  CONCAT(upc, nombre , descripcion)  like '%".$b."%'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Buscar2($b){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM productos WHERE upc = '".$b."' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
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
			          ->prepare("SELECT * FROM productos WHERE id_producto = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{

		try 
		{
			$sql = "UPDATE productos SET 
						 upc = ?,
						 nombre = ?,
						 descripcion = ?,
						 precio = ?,
						 precio_publico = ?
				    WHERE id_producto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                         $data->upc,
						 $data->nombre,
						 $data->descripcion,
						 $data->precio,
						 $data->precio_publico,
						 $data->id_producto
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
			            ->prepare("DELETE FROM productos WHERE id_producto = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function Registrar(Productos $data)
	{
		try 
		{
		$sql = "INSERT INTO productos (
				upc,
				nombre,
				descripcion,
				precio,
				precio_publico
		) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->upc,
                    $data->nombre, 
                    $data->descripcion, 
                    $data->precio,
                    $data->precio_publico
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}