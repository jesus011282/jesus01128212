<?php
/*
$server ="localhost";
$user ="root";
$pass="";
$db ="usuario";
$conexion =new mysqli($server,$user,$pass,$pass);
if($conexion->conect_erro){
die("conexion fallida".$conexion->connect_errno);
}else{
  echo"conectado";
}
*/
include ("conexion.php");
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarse - Mundo Creativo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .navbar {
      background-color: #333;
      overflow: hidden;
      padding: 10px;
    }
    .navbar a {
      color: #fff;
      text-decoration: none;
      padding: 14px 20px;
      display: inline-block;
    }
    .navbar a:hover {
      background-color: #ddd;
      color: #333;
    }
    .container {
      width: 500px;
      margin: 50px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    form label {
      display: block;
      margin: 10px 0 5px;
    }
    form input[type="text"],
    form input[type="number"],
    form input[type="email"],
    form input[type="tel"],
    form input[type="password"],
    form select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    form button {
      background-color: #333;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 4px;
      width: 100%;
    }
    form button:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="index.php">Inicio</a>
    <a href="registro.php">Registrarse</a>
    <a href="login.php">Iniciar sesión</a>
  </div>
  <div class="container">
    <h2>Registrarse</h2>
    <form action="registrar_usuario.php" method="POST">
      <label for="IDUsuario">ID de Usuario:</label>
      <input type="text" id="IDUsuario" name="IDUsuario" required>
      
      <label for="Nombre">Nombre:</label>
      <input type="text" id="Nombre" name="Nombre" required>
      
      <label for="ApellidoPaterno">Apellido Paterno:</label>
      <input type="text" id="ApellidoPaterno" name="ApellidoPaterno" required>
      
      <label for="ApellidoMaterno">Apellido Materno:</label>
      <input type="text" id="ApellidoMaterno" name="ApellidoMaterno" required>
      
      <label for="Edad">Edad:</label>
      <input type="number" id="Edad" name="Edad" required>
      
      <label for="Sexo">Sexo:</label>
      <select id="Sexo" name="Sexo" required>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
      </select>
      
      <label for="Email">Email:</label>
      <input type="email" id="Email" name="Email" required>
      
      <label for="Telefono">Teléfono:</label>
      <input type="tel" id="Telefono" name="Telefono" required>
      
      <!-- Sw Campo oculto para definir el TipoUsuario como CP -->
      <input type="hidden" name="TipoUsuario" value="CP">
      
      <label for="Password">Contraseña:</label>
      <input type="password" id="Password" name="Password" required>
      
      <label for="confirmPassword">Confirmar Contraseña:</label>
      <input type="password" id="confirmPassword" name="confirmPassword" required>
      
      <button type="submit">Registrarse</button>
    </form>
  </div>
</body>
</html>
