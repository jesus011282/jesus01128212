<?php
session_start();

// Conexión a la base de datos
$server = "localhost:3309";
$user = "root";
$pass = "";
$db = "cliente";

try {
    $conexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si hay un IDUsuario en la URL
    if (!isset($_GET['IDUsuario']) || empty($_GET['IDUsuario'])) {
        die("ID de usuario no proporcionado.");
    }

    $IDUsuario = $_GET['IDUsuario'];

    // Consulta SQL con parámetro
    $sql = "SELECT * FROM pedidos WHERE IDUsuario = :IDUsuario";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':IDUsuario', $IDUsuario, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener los resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Consulta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script>
        function confirmarEliminacion(id, IDUsuario) {
            if (confirm("¿Estás seguro de que deseas eliminar este pedido? Esta acción no se puede deshacer.")) {
                window.location.href = "borrar.php?id=" + id + "&IDUsuario=" + IDUsuario;
            }
        }
    </script>
</head>
<body class="container mt-4">
    <h2>Resultados de la Consulta</h2>

    <?php if (!empty($resultados)): ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Folio del Pedido</th>
                    <th>Cantidad</th>
                    <th>Material</th>
                    <th>Precio</th>
                    <th>Medida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $fila): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila["foliopedido"]) ?></td>
                        <td><?= htmlspecialchars($fila["cantidad"]) ?></td>
                        <td><?= htmlspecialchars($fila["material"]) ?></td>
                        <td><?= htmlspecialchars($fila["precio"]) ?></td>
                        <td><?= htmlspecialchars($fila["medida"]) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $fila['IDPedido'] ?>&IDUsuario=<?= $IDUsuario ?>" class="btn btn-warning btn-sm">Editar</a>
                            <button onclick="confirmarEliminacion(<?= $fila['IDPedido'] ?>, '<?= $IDUsuario ?>')" class="btn btn-danger btn-sm">Borrar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="alert alert-warning">No se encontraron pedidos para este usuario.</p>
    <?php endif; ?>

    <a href="consultar.php" class="btn btn-secondary mt-3">Volver</a>
    <a href="formulario.php" class="btn btn-secondary mt-3">formulario</a>
</body>
</html>
