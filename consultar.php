<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Pedidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Consultar Pedidos por Usuario</h2>
    <form action="resultado.php" method="GET">
        <label for="IDUsuario" class="form-label">Ingrese ID de Usuario:</label>
        <input type="text" name="IDUsuario" id="IDUsuario" class="form-control" required>
        <button type="submit" class="btn btn-primary mt-3">Consultar</button>
    </form>
</body>
</html>
