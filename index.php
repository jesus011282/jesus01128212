<?php

session_start();

if(isset($_SESSION['usuario']['TipoUsuario'])){
    #var_dump($_SESSION['usuario']['TipoUsuario']);
    // Moatrar lo que son los usuarios logueados
    if($_SESSION['usuario']['TipoUsuario']==='pp'){

        $menuOptions='
        <a href="index.php">Inicio</a>
        <a href="consultar.php">Consultar</a>
        <a href="registro.php">Registrar</a>
        <a href="modificar.php">Modificar</a>
        <a href="eliminar.php">Eliminar</a>
        <a href="salir.php">Salir</a>';
    }elseif($_SESSION['usuario']['TipoUsuario']==='CP'){

        $menuOptions='
        <a href="index.html">Inicio</a>
        <a href="modificar.php">Modificar</a>
        <a href="eliminar.php">Eliminar</a>
        <a href="salir.php">Salir</a>';
        
    }
}
else{
         //Los usuarios no logueado
         $menuOptions='
         <a href="index.php"> Inicio</a>
         <a href="registro.php">Registrarse</a>
         <a href="login.php"> Iniciar sesion</a>';   
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EL MUNDO CREATIVO</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align:center;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 50px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: inline-block;
        }
        .navbar a:hover {
            background-color: #575757;
        }
        .container {
            margin-top: 50px;
        }
        img {
            width: 60%;
            max-width: 500px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
  <div class="navbar">
    <?php echo $menuOptions; ?>
  </div>
  <div class="content">
    <h1>Mundo Creativo</h1>
    <!-- La imagen que se ve en la porta de inicio de la papeleria) -->
    <img src="logo.jpg" alt="Imagen de papelería">
    <p>
      Bienvenidos a Mundo Creativo, tu mejor opción en artículos de papelería y materiales de oficina.
      Descubre nuestra amplia variedad de productos y disfruta de la mejor calidad al mejor precio.
    </p>
    
  </div>
</body>
</html>