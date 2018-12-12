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
      } catch (Exception $e) 
      {
        die($e->getMessage());
      }
    }
  }