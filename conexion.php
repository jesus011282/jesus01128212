<?php
$server ="localhost:3306";
$user ="root";
$pass="";
$db ="usuario";
$conexion =new mysqli($server,$user,$pass,$db);
if($conexion->connect_error){
die("conexion fallida".$conexion->connect_error);
}else{
  //echo"conectado";
}
?>