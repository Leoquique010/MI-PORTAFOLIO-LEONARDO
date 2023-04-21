<?php
  $conexion = mysqli_connect("localhost","root","admin123","login");
  $conexion -> set_charset("utf8");
  if(!$conexion){
    echo "No se ha podido establecer conexion con la bd.";
  }else{
    $user=$_POST["usuario"];
    $contra=$_POST["contra"];
    $sql=$conexion->query("SELECT * FROM registro WHERE usuario='$user' and contras='$contra' ");
    if($datos=$sql->fetch_object()){
      header("Location: home.html");
    }else{
	?>	
      <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title>Login</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
          <link rel="stylesheet" href="style.css">
        </head>
        <body>
          <div class="text-center text-white">
              <h1 style="color: black">Contraseña o usuario incorrecto.</h1>
          </div>
          <form method="" action="index.html">
            <div class="text-center text-white">
              <button type="submit" class="btn btn-dark btn-lg">Volver a intentar.</button>
            </div>
          </form>
        </body>
      </html>
      <?php
    }
  }
 ?>