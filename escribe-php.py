# escribe-php.py

print('controlador [1] , modelo[2], salir[3]')

opcion = int(input())

while opcion < 3 :

  print('controlador [1] , modelo[2], salir[3]')

  opcion = int(input())

  if opcion == 1:

    print('nombre del controlador?')

    nombre = input()

    f = open('controller/'+nombre.lower()+'.controller.php','w')

    codigo = """<?php use \\roles\Roles;
    //incluir modelos a usar ej.
    //require __DIR__ . '/../model/cita.php';



    class """+nombre.capitalize()+"""Controller{
        
     
       //private $modelCita;
        
        public function __CONSTRUCT(){
          Roles::Acceso($_SESSION['rol']);
         // $this->modelCita = new Cita();
         
        }
        
        public function Index(){
           
           // require __DIR__ .'/../view/vista/vista.php';
           
        }

         public function Error(){
          require __DIR__ .'/../view/layauts/error.php';
        }
        
    }"""

    f.write(codigo)
    f.close()

  elif opcion == 2:

    print('nombre del modelo?')

    nombre = input()

    f = open('model/'+nombre+'.php','w')

    codigo = """<?php
  class """+nombre.capitalize()+"""
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
        $stm = $this->pdo->prepare("SELECT * FROM servicios");
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
  }"""

    f.write(codigo)
    f.close()
