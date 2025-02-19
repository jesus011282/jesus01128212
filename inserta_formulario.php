<?php
// S realiza lo que es la configuración de la base de datos
$server = "localhost:3309";
$user = "root";
$pass = "";
$db = "cliente";

try {
    //Realizar lo que es la conexion de la base de datos 
    $conexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Se realizo el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $IDUsuario = $_POST['IDUsuario'];
        $foliopedido = $_POST['foliopedido'];
        $cantidad = $_POST['cantidad'];
        $material = $_POST['material'];
        $precio = $_POST['precio'];
        $medida = $_POST['medida'];

        // Se realizo lo que es la consulta SQL con PDO
        $sql = "INSERT INTO pedidos (IDUsuario, foliopedido, cantidad, material, precio, medida) 
                VALUES (:IDUsuario, :foliopedido, :cantidad, :material, :precio, :medida)";

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':IDUsuario', $IDUsuario, PDO::PARAM_STR);
        $stmt->bindParam(':foliopedido', $foliopedido, PDO::PARAM_INT);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':material', $material, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
        $stmt->bindParam(':medida', $medida, PDO::PARAM_STR);

        // Checar la consulta
        if ($stmt->execute()) {
            // minimizar lo que es la  consultar.php que sea exitosa
            header("Location: consultar.php");
            exit(); // Se lo que es el script  
        } else {
            echo " Error al insertar el registro.";
        }
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
