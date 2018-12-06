


<!doctype html>
<html lang="es">
  <head>

	<title>SEREMAS inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- LIBRERIAS BOOTSTRAP-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../vendor/boostrap/dist/css/bootstrap.css">
	
	

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="../vendor/boostrap/dist/js/bootstrap.min.js"></script>

<style>

html { 
  background: url(https://i.ytimg.com/vi/aUooftKFtD0/maxresdefault.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
	body {

	background:transparent;
  
  padding-top: 4.5rem;

}

.container{
	background:rgba(0,0,0,0.5);
	 
	 min-width: 250px;
	 max-width: 250px;
	border-radius: 15px;
	color: white;
}
</style>
	
</head>
	

   

  <body class="text-center">
    <?php echo isset($alerta) ? $alerta : ''; ?>
    <div class="container">
      <hr>
      <div class="row justify-content-center align-items-center">


  			<form class="form-signin" method="post" >
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" id="text" name="usuario" class="form-control" placeholder="usuario" required autofocus>
      <br>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="contraseña" required>
      <hr>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordar sesion
        </label>
      </div>
      <button class="btn btn-lg btn-seremas btn-block" type="submit">Entrar</button>
      <a class="text-white" href="?r=site/reset">Olvide mi contraseña</a>
      <p class="mt-5 mb-3 ">&copy; 2018-2020</p>
    </form>
  			
  		</div>
  		
  		
  	</div>
    
  </body>
</html>
