<?php
//require __DIR__ . '/../model/usuario.php';
class Masajista //extends Usuario
{
	private $pdo;


public $id_personal;
public $id_usuario;
public $nombre;
public $a_paterno;
public $a_materno;
public $tel;
public $cel;
public $email;
public $direccion;
    
    
	

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

			$stm = $this->pdo->prepare("SELECT * FROM personal");
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
			          ->prepare("SELECT * FROM personal WHERE id_usuario = ?");
			          

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

	// public function Actualizar($data)
	// {
	// 	try 
	// 	{
	// 		$sql = "UPDATE clientes SET 
	// 					Nombre          = ?, 
	// 					Apellido        = ?,
 //                        Correo        = ?,
	// 					Sexo            = ?, 
	// 					FechaNacimiento = ?
	// 			    WHERE id = ?";

	// 		$this->pdo->prepare($sql)
	// 		     ->execute(
	// 			    array(
 //                        $data->Nombre, 
 //                        $data->Correo,
 //                        $data->Apellido,
 //                        $data->Sexo,
 //                        $data->FechaNacimiento,
 //                        $data->id
	// 				)
	// 			);
	// 	} catch (Exception $e) 
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }

	// public function Registrar(Cita $data)
	// {
	// 	try 
	// 	{
	// 	$sql = "INSERT INTO citas (inicio, fin, id_cliente, id_habitacion, id_masajista) 
	// 	        VALUES (?, ?, ?, ?, ?)";

	// 	$this->pdo->prepare($sql)
	// 	     ->execute(
	// 			array(
 //                    $data->inicio,
 //                    $data->fin, 
 //                    $data->id_cliente, 
 //                    $data->id_habitacion,
 //                    $data->id_masajista
 //                )
	// 		);
	// 	} catch (Exception $e) 
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }
}