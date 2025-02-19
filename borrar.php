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

    // Checar si pudo  recibir un ID válido
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $IDPedido = $_GET['id'];

        // Se elimino el pedido
        $sql = "DELETE FROM pedidos WHERE IDPedido = :IDPedido";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':IDPedido', $IDPedido, PDO::PARAM_INT);
        $stmt->execute();

        // bloquear la vuelta a los resultados.php en la cual tiene un mensaje 
        header("Location: resultado.php?mensaje=eliminado");
        exit();
    } else {
        echo "ID de pedido no válido.";
    }
} catch (PDOException $e) {
    echo "Error en la eliminación: " . $e->getMessage();
}
?>
