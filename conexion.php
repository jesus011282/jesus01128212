<?php
$server ="localhost:3309";
$user ="root";
$pass="";
$db ="cliente";
$conexion =new mysqli($server,$user,$pass,$db);
if($conexion->connect_error){
die("conexion fallida".$conexion->connect_error);
}else{
  //Se conectado";
}
?>                                                                                                                                                                                                                                                                                                                                     
