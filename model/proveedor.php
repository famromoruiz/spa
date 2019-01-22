<?php
  class Proveedor
  {
    private $pdo;


  //entidades publicas
  public $id_proveedor;
  public $nombre;
  public $rfc;
  public $domicilio;
  public $tel_1;
  public $tel_2;
  public $contacto;
  public $alta;
  public $termino;
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

   public function Listar($pagina)
  {



    $pagina = $pagina;
    
    $por_pagina = 20; //la cantidad de registros que desea mostrar
    $adyacente  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($pagina - 1) * $por_pagina;
    try
    {
      $result = array();

      $cuenta = $this->pdo->prepare("SELECT * FROM prove ");
      $cuenta->execute();
      
      $total_filas = $cuenta->rowCount();

      $total_paginas = ceil($total_filas / $por_pagina);

      $total_paginas = $total_paginas < 1 ? 1 : $total_paginas;

      $stm = $this->pdo->prepare("SELECT * FROM prove ");
      $stm->execute();

      return ['lista' =>$stm->fetchAll(PDO::FETCH_OBJ) , 'paginas' => $total_paginas, 'id' => 'id_proveedor' ];
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

      $stm = $this->pdo->prepare("SELECT * FROM prove");
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
                  ->prepare("SELECT * FROM prove WHERE id_proveedor = ?");
                  

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
                    ->prepare("DELETE FROM prove WHERE id_proveedor = ?");               

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
        $sql = "UPDATE prove SET 
              nombre = ?, 
              rfc = ?,
              domicilio = ?,
              tel_1 = ?,
              tel_2 = ?,
              contacto = ?,
              email = ?
              WHERE id_proveedor = ?";

        $this->pdo->prepare($sql)
             ->execute(
              array(
                          $data->nombre, 
                          $data->rfc, 
                          $data->domicilio, 
                          $data->tel_1, 
                          $data->tel_2, 
                          $data->contacto, 
                          $data->email,
                          $data->id_proveedor
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
    $sql = "INSERT INTO prove (
      nombre,
      rfc,
      domicilio,
      tel_1,
      tel_2,
      contacto,
      email
      ) 
            VALUES (?,?,?,?,?,?,?)";

    $this->pdo->prepare($sql)
         ->execute(
        array(
              $data->nombre, 
              $data->rfc, 
              $data->domicilio, 
              $data->tel_1, 
              $data->tel_2, 
              $data->contacto, 
              $data->email
                )
      );
    } catch (Exception $e) 
    {
      die($e->getMessage());
    }
  }

 

  }