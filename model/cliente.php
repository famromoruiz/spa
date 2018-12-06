<?php
class Cliente
{
	private $pdo;
    
    public $id_cliente;
	public $nombre;
	public $a_paterno;
	public $a_materno;
	public $direccion;
	public $fraccionamiento;
	public $ciudad;
	public $municipio;
	public $estado;
	public $pais;
	public $tel_f;
	public $cel_1;
	public $cel_2;
	public $tel_o;
	public $email;
	public $facebook;
	public $instagram;
	public $foto;
	public $tipo_cliente;
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

		

			$stm = $this->pdo->prepare("SELECT * FROM clientes ");
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

			$cuenta = $this->pdo->prepare("SELECT * FROM clientes ");
			$cuenta->execute();
			
			$total_filas = $cuenta->rowCount();

			$total_paginas = ceil($total_filas / $por_pagina);

			$total_paginas = $total_paginas < 1 ? 1 : $total_paginas;

			$stm = $this->pdo->prepare("SELECT * FROM clientes  LIMIT $offset,$por_pagina");
			$stm->execute();

			return ['lista' =>$stm->fetchAll(PDO::FETCH_OBJ) , 'paginas' => $total_paginas, 'id' => 'id_cliente' ];
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
			          ->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
			          

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
			            ->prepare("DELETE FROM clientes WHERE id_cliente = ?");			          

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
						 nombre = ?,
						 a_paterno = ?,
						 a_materno = ?,
						 direccion = ?,
						 fraccionamiento = ?,
						 ciudad = ?,
						 municipio = ?,
						 estado = ?,
						 pais = ?,
						 tel_f = ?,
						 cel_1 = ?,
						 cel_2 = ?,
						 tel_o = ?,
						 email = ?,
						 facebook = ?,
						 instagram = ?
				    WHERE id_cliente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                         $data->nombre,
						 $data->a_paterno,
						 $data->a_materno,
						 $data->direccion,
						 $data->fraccionamiento,
						 $data->ciudad,
						 $data->municipio,
						 $data->estado,
						 $data->pais,
						 $data->tel_f,
						 $data->cel_1,
						 $data->cel_2,
						 $data->tel_o,
						 $data->email,
						 $data->facebook,
						 $data->instagram,
						 $data->id_cliente
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO clientes (
			nombre,
			a_paterno,
			a_materno,
			direccion,
			fraccionamiento,
			ciudad,
			municipio,
			estado,
			pais,
			tel_f,
			cel_1,
			cel_2,
			tel_o,
			email,
			facebook,
			instagram,
			foto) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                   	$data->nombre,
					$data->a_paterno,
					$data->a_materno,
					$data->direccion,
					$data->fraccionamiento,
					$data->ciudad,
					$data->municipio,
					$data->estado,
					$data->pais,
					$data->tel_f,
					$data->cel_1,
					$data->cel_2,
					$data->tel_o,
					$data->email,
					$data->facebook,
					$data->instagram,
					$data->foto
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}