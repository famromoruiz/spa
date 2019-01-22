<?php
class Usuario
{
	private $pdo;
    
    public $id_usuario;
    public $nikname;
    public $password;
    public $rol;
    public $nombre;
    public $token;
    public $email;
   

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

			$stm = $this->pdo->prepare("SELECT * FROM usuarios");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


		public function Listar_rol_masajista()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM usuarios where rol = 30");
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
		
		$por_pagina = 10; //la cantidad de registros que desea mostrar
		$adyacente  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($pagina - 1) * $por_pagina;
		try
		{
			$result = array();

			$cuenta = $this->pdo->prepare("SELECT * FROM usuarios ");
			$cuenta->execute();
			
			$total_filas = $cuenta->rowCount();

			$total_paginas = ceil($total_filas / $por_pagina);

			$total_paginas = $total_paginas < 1 ? 1 : $total_paginas;

			$stm = $this->pdo->prepare("SELECT * FROM usuarios ");
			$stm->execute();

			return ['lista' =>$stm->fetchAll(PDO::FETCH_OBJ) , 'paginas' => $total_paginas, 'id' => 'id_usuario' ];
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($nik , $pass)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE nikname = ? and password = ?");
			          

			$stm->execute(array($nik , $pass));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener_id($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener_id_pass($id , $pass)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE id_usuario = ? and password = ?");
			          

			$stm->execute(array($id , $pass));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Obtener_mail($email)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE email = ? ");
			          

			$stm->execute(array($email));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener_token($token)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE token = ? ");
			          

			$stm->execute(array($token));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Token($data)
	{


			$token = $data['token'];
            $email = $data['email'];

		try 
		{
			$sql = "UPDATE usuarios SET 
						token = ?
				    WHERE email = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $token,
                        $email
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar_password($data)
	{


			$password = sha1($data['password']);
			$token = "";
            $usuario = $data['usuario'];

		try 
		{
			$sql = "UPDATE usuarios SET 
						password = ?,
						token = ?
				    WHERE nikname = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $password,
                        $token,
                        $usuario
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
			            ->prepare("DELETE FROM usuarios WHERE id_usuario = ?");			          

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
			$sql = "UPDATE usuarios SET 
						nombre          = ?, 
						nikname        = ?,
                        email        = ?
				    WHERE id_usuario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->nikname,
                        $data->email,
                        $data->id_usuario
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Edita_pass($data)
	{
		try 
		{
			$sql = "UPDATE usuarios SET 
						nombre   = ?, 
						nikname  = ?,
                        email    = ?,
                        password = ?
				    WHERE id_usuario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->nikname,
                        $data->email,
                        $data->password,
                        $data->id_usuario
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO usuarios (nikname,password,rol,nombre,token,email) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nikname,
			        $data->password,
			        $data->rol,
			        $data->nombre,
			        $data->token,
			        $data->email
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}