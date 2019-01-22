<?php
  class Ticket
  {
    private $pdo;             

  public $id_ticket;
  public $id_cliente;
  public $descripcion;
  public $fecha;
  public $monto;

      
      
    

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

    public function Listar($id)
    {
      try
      {
        $result = array();
        //consulta
        $stm = $this->pdo->prepare("SELECT * FROM ticket where id_cliente= ?");
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
        $stm = $this->pdo
                  ->prepare("SELECT * FROM servicios WHERE id_servicio = ?");
                  

        $stm->execute(array($id));
        return $stm->fetch(PDO::FETCH_OBJ);
      } catch (Exception $e) 
      {
        die($e->getMessage());
      }
    }

     public function Obtener_montos($fecha)
    {
      try 
      {
        $stm = $this->pdo
                  ->prepare("SELECT SUM(monto) as monto FROM `ticket` WHERE DATE(fecha) = ?");
                  

        $stm->execute(array($fecha));
        return $stm->fetch(PDO::FETCH_OBJ);
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

     public function Reporte($fecha)
    {
      try 
      {
        $stm = $this->pdo
                  ->prepare("SELECT * FROM ticket WHERE fecha BETWEEN CAST(? AS DATE) AND CAST(? as DATE);");
                  

        $stm->execute(array($fecha->inicio,$fecha->termino));
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

    public function Registrar($data)
    {
      try 
      {
      $sql = "INSERT INTO ticket (id_cliente, descripcion, monto) 
              VALUES (?, ?, ?)";

      $this->pdo->prepare($sql)
           ->execute(
          array(
                      $data->cliente,
                      $data->descripcion, 
                      $data->monto
                  )
        );
      } catch (Exception $e) 
      {
        die($e->getMessage());
      }
    }
  }