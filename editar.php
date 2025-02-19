<?php
session_start();

$server = "localhost:3309";
$user = "root";
$pass = "";
$db = "cliente";

try {
    $conexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_GET['id']) || !isset($_GET['IDUsuario'])) {
        die("Faltan parámetros en la URL.");
    }

    $IDPedido = $_GET['id'];
    $IDUsuario = $_GET['IDUsuario'];

    // Se optiene los  datos del pedido
    $sql = "SELECT * FROM pedidos WHERE IDPedido = :IDPedido";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':IDPedido', $IDPedido, PDO::PARAM_INT);
    $stmt->execute();
    $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$pedido) {
        die("Pedido no encontrado.");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $folio = $_POST['foliopedido'];
        $cantidad = $_POST['cantidad'];
        $material = $_POST['material'];
        $precio = $_POST['precio'];
        $medida = $_POST['medida'];

        // Se realiza la actualizacion del  pedido
        $sql = "UPDATE pedidos SET foliopedido = :folio, cantidad = :cantidad, material = :material, precio = :precio, medida = :medida WHERE IDPedido = :IDPedido";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':folio', $folio);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':material', $material);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':medida', $medida);
        $stmt->bindParam(':IDPedido', $IDPedido);
        $stmt->execute();

        //Realizar los resultados del usuario
        header("Location: resultado.php?IDUsuario=$IDUsuario");
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Editar Pedido</h2>
    <form method="POST">
        <label>Folio del Pedido:</label>
        <input type="text" name="foliopedido" value="<?= $pedido['foliopedido'] ?>" class="form-control" required>
        <label>Cantidad:</label>
        <input type="text" name="cantidad" value="<?= $pedido['cantidad'] ?>" class="form-control" required>
        <label>Material:</label>
        <input type="text" name="material" value="<?= $pedido['material'] ?>" class="form-control" required>
        <label>Precio:</label>
        <input type="text" name="precio" value="<?= $pedido['precio'] ?>" class="form-control" required>
        <label>Medida:</label>
        <input type="text" name="medida" value="<?= $pedido['medida'] ?>" class="form-control" required>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
    <a href="resultado.php?IDUsuario=<?= $IDUsuario ?>" class="btn btn-secondary mt-3">Regresar</a>
</body>
</html>
