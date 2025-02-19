<?php
include_once("conexion.php");

// Verificar que los campos no estén vacíos
if (!empty($_POST['Nombre']) && !empty($_POST['ApellidoPaterno']) && !empty($_POST['ApellidoMaterno']) &&
    !empty($_POST['Edad']) && !empty($_POST['Sexo']) && !empty($_POST['Email']) &&
    !empty($_POST['Telefono']) && !empty($_POST['TipoUsuario']) && !empty($_POST['Password'])) {

    // Obtener los valores del formulario
    $IDUsuario = $_POST['IDUsuario'];
    $Nombre = $_POST['Nombre'];
    $ApellidoPaterno = $_POST['ApellidoPaterno'];
    $ApellidoMaterno = $_POST['ApellidoMaterno'];
    $Edad = $_POST['Edad'];
    $Sexo = $_POST['Sexo'];
    $Email = $_POST['Email'];
    $Telefono = $_POST['Telefono'];
    $TipoUsuario = $_POST['TipoUsuario'];
    $Password = $_POST['Password']; 
    // para insertar en la base de datos
    $sql = "INSERT INTO usuarios (IDUsuario,Nombre, ApellidoPaterno, ApellidoMaterno, Edad, Sexo, Email, Telefono, TipoUsuario, contrasenia) 
            VALUES ('$IDUsuario','$Nombre', '$ApellidoPaterno', '$ApellidoMaterno', $Edad, '$Sexo', '$Email', '$Telefono', '$TipoUsuario', '$Password')";

    var_dump($sql);    

    if ($conexion->query($sql) === TRUE) {
        header("Location: registro.php"); //Después del registro
        exit();
    } else {
        echo "Error al registrar: " . $conexion->error;
    }
} else {
    echo "Error: Todos los campos son obligatorios.";
}
?>