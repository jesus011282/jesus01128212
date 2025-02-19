<?php
include 'conexion.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=usuario", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    if ($_POST['accion'] === "insertar") {
        $stmt = $pdo->prepare("CALL sp_InsertarPedido(:idusuario, :foliopedido, :cantidad, :material, :precio, :medida)");
        $stmt->execute([
            ':idusuario' => $_POST['idusuario'],
            ':foliopedido' => $_POST['foliopedido'],
            ':cantidad' => $_POST['cantidad'],
            ':material' => $_POST['material'],
            ':precio' => $_POST['precio'],
            ':medida' => $_POST['medida']
        ]);
        echo "Pedido agregado correctamente.";
    }

    if ($_POST['accion'] === "eliminar") {
        $stmt = $pdo->prepare("CALL sp_EliminarPedido(:id)");
        $stmt->execute([':id' => $_POST['id']]);
        echo "Pedido eliminado correctamente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>