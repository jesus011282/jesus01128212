<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - Mundo Creativo</title>
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
      width: 400px;
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
    form input[type="password"] {
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
    <h2>Iniciar Sesión</h2>
    <form action="validacion.php" method="POST">
      <label for="IDUsuario">ID de Usuario:</label>
      <input type="text" id="IDUsuario" name="IDUsuario" required>
      
      <label for="password">Contraseña:</label>
      <input type="password" id="Password" name="Password" required>
      
      <button type="submit">Iniciar Sesión</button>
    </form>
  </div>
</body>
</html>
