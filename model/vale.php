<?php
  class Vale
  {
    private $pdo;


  //entidades publicas
  public $id_servicio;

      
      
    

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
        $stm = $this->pdo->prepare("SELECT DATE(vs.fecha) as fecha,TIME(vs.fecha) as hora, pr.nombre as producto, vs.cantidad as cantidad, usr.nombre as entrega , usr_re.nombre as recibe  FROM vales_salida vs join productos pr on vs.id_producto = pr.id_producto JOIN usuarios usr on vs.id_entrega = usr.id_usuario JOIN usuarios usr_re on vs.id_recibe = usr_re.id_usuario");
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

    public function Registrar($vale)
    {
      try 
      {
      $sql = "INSERT INTO vales_salida (id_producto, cantidad, id_entrega, id_recibe) 
              VALUES (?, ?, ?, ?)";

      $this->pdo->prepare($sql)
           ->execute(
          array(
                      $vale->producto,
                      $vale->cantidad, 
                      $vale->entrega, 
                      $vale->recibe
                  )
        );
      } catch (Exception $e) 
      {
        die($e->getMessage());
      }
    }
  }