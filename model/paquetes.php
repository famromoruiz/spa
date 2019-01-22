<?php
  class Paquetes
  {
    private $pdo;


  //entidades publicas

    public $id_paquete;
    public $id_cliente;
    public $id_servicio;
    public $cantidad;
    public $fecha_caducidad;
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
        //consulta
        $stm = $this->pdo->prepare("SELECT * FROM paquetes");
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
                  ->prepare("SELECT * FROM paquetes WHERE id_cliente = ? and cantidad > 0");
                  

        $stm->execute(array($id));
        return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (Exception $e) 
      {
        die($e->getMessage());
      }
    }

    public function Obtener_1($id)
    {
      try 
      {
        $stm = $this->pdo
                  ->prepare("SELECT * FROM paquetes WHERE id_servicio = ?");
                  

        $stm->execute(array($id));
        return $stm->fetch(PDO::FETCH_OBJ);
      } catch (Exception $e) 
      {
        die($e->getMessage());
      }
    }

     public function Resta_pack($pk)
    {
      try 
      {
        $stm = "UPDATE paquetes SET 
              cantidad          = ?
              WHERE id_servicio = ?";
                  

        $this->pdo->prepare($stm)
             ->execute(
              array(
                          $pk->cantidad, 
                          $pk->id_servicio
            )
          );
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

    public function Inserta_pack($data)
    {
      try 
      {
      $sql = "INSERT INTO paquetes (id_cliente, id_servicio, cantidad, fecha_caducidad) 
              VALUES (?, ?, ?, ?)";

      $this->pdo->prepare($sql)
           ->execute(
          array(
                      $data->id_cliente,
                      $data->id_servicio, 
                      $data->cantidad, 
                      $data->fecha_caducidad
                  )
        );
      } catch (Exception $e) 
      {
        die($e->getMessage());
      }
    }
  }