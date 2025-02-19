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

//EDITAR

if (isset($_POST['accion']) && $_POST['accion'] == 'editarCampo') {
    $id = $_POST['id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Lista blanca de campos permitidos para evitar inyección SQL
    $allowed = ['foliopedido', 'cantidad', 'material', 'precio', 'medida'];
    if (!in_array($field, $allowed)) {
        echo "Campo no permitido.";
        exit;
    }

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=usuario", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        // Preparar y ejecutar la actualización
        $stmt = $pdo->prepare("UPDATE pedidos SET $field = :value WHERE id = :id");
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Campo actualizado correctamente.";
    } catch (PDOException $e) {
        echo "Error al actualizar el campo: " . $e->getMessage();
    }
    exit;
}

?>