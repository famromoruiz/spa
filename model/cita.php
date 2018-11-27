<?php

//namespace app\Model;


class Cita
{
	private $pdo;
    
    public $id_cita;
	public $inicio;
	public $fin;
	public $id_cliente;
	public $id_habitacion;
	public $id_masajista;
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

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT ci.status, ci.id_cita , CONCAT(cl.nombre,' ',cl.a_paterno,' ',cl.a_materno) as nombre, cl.cel_1, ci.inicio, ci.fin, hb.nombre as habitacion, pr.nombre as masajista  FROM citas ci JOIN clientes cl on ci.id_cliente = cl.id_cliente join habitaciones hb on ci.id_habitacion = hb.id_habitacion join personal pr on ci.id_masajista = pr.id_personal join servicios_cita svc on ci.id_cita = svc.id_cita join servicios sr on svc.id_servicio = sr.id_servicio join zonas zn on sr.id_zona = zn.id_zona GROUP by ci.id_cita");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listarcobro()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT cl.tipo_cliente, ci.status, ci.id_cita , CONCAT(cl.nombre,' ',cl.a_paterno,' ',cl.a_materno) as nombre, cl.cel_1, ci.inicio, ci.fin, hb.nombre as habitacion, pr.nombre as masajista  FROM citas ci JOIN clientes cl on ci.id_cliente = cl.id_cliente join habitaciones hb on ci.id_habitacion = hb.id_habitacion join personal pr on ci.id_masajista = pr.id_personal join servicios_cita svc on ci.id_cita = svc.id_cita join servicios sr on svc.id_servicio = sr.id_servicio join zonas zn on sr.id_zona = zn.id_zona where ci.status = 4 GROUP by ci.id_cita");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listarserv($id)
	{
		try
		{
			$result = array();

			




			$stm = $this->pdo->prepare("SELECT zn.nombre as zona, sr.regular , sr.preferente, sr.intermedia, sr.mas, sr.tratamiento , sr.tiempo FROM citas ci JOIN clientes cl on ci.id_cliente = cl.id_cliente join habitaciones hb on ci.id_habitacion = hb.id_habitacion join personal pr on ci.id_masajista = pr.id_personal join servicios_cita svc on ci.id_cita = svc.id_cita join servicios sr on svc.id_servicio = sr.id_servicio join zonas zn on zn.id_zona = sr.id_zona  WHERE ci.id_cita = ?");
			$stm->execute(array($id));

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
			$stm = $this->pdo->prepare("SELECT ci.status, ci.id_cita , CONCAT(cl.nombre,' ',cl.a_paterno,' ',cl.a_materno) as nombre, cl.cel_1, ci.inicio, ci.fin, hb.nombre as habitacion, pr.nombre as masajista  FROM citas ci JOIN clientes cl on ci.id_cliente = cl.id_cliente join habitaciones hb on ci.id_habitacion = hb.id_habitacion join personal pr on ci.id_masajista = pr.id_personal join servicios_cita svc on ci.id_cita = svc.id_cita join servicios sr on svc.id_servicio = sr.id_servicio join zonas zn on sr.id_zona = zn.id_zona where ci.id_masajista = ? GROUP by ci.id_cita");
			
			          

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
		    return  $this->pdo->lastInsertId();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}