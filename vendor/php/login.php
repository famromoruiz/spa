<?php
 if (empty($_POST["usuario"]) or (empty($_POST["password"]))) {
   header("location: index.php?error");
 }else{
    $usuario = test_input($_POST["usuario"]);
    $clave = test_input($_POST["password"]);
    $shaclave = sha1($clave);

 include("conectar.php");


  $sql = "SELECT * FROM usuarios WHERE nikname = '$usuario' and password = '$shaclave'";
  // var_dump($sql);exit;
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);


      if($count == 1) {
		   session_start();
       $_SESSION['nombre'] = $row["nombre"];
       $_SESSION['tipo'] = $row["rol"];

      //   echo $_SESSION['nombre_usuario'] = $row["nombre_usuario"];

       //echo "entro";exit;

         header("location: http://localhost/base/?menu=menu");
      }else {
        
        header("location: http://localhost/base/Site/login.php");
      }
   }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
