<?php
// Se checa lo que tiene el rol pp
session_start();
if ($_SESSION['rol'] !== 'PP') {
    die("No tienes permisos para acceder a esta página.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Pagos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Consultar</h2>

    <?php if ($resultado->num_rows > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>IDUsuario</th>
                    <th>foliopedido</th>
                    <th>cantidad</th>
                    <th>Material</th>
                    <th>Precios</th>
                    <th>Medida</th>
            
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila["IDUsuario"]) ?></td>
                        <td><?= number_format($fila["foliopedido"], 2) ?></td>
                        <td><?= htmlspecialchars($fila["cantidad"]) ?></td>
                        <td><?= htmlspecialchars($fila["Material"]) ?></td>
                        <td><?= number_format($fila["Precios"], 2) ?></td>
                        <td><?= htmlspecialchars($fila["Medidas"]) ?></td>
                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Se muestra los pedidos del usuario.</p>
    <?php endif; ?>

    <a href="formulario.php" class="btn btn-primary">Volver</a>
</body>
</html>

<?php
// Cerrar la conexión
$stmt->close();
$conexion->close();
?>

