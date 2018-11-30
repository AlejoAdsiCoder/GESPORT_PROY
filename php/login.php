<?php
session_start();
include("conexion.php");

//comando SQL para validar sesión
$sql = "SELECT cedula, nombre, tipo FROM usuario WHERE cedula = ? AND clave = ?";

//validacion y preparacion del SQL
if(!($sentencia = $con->prepare($sql))){
  echo "Falló la operación: ".$con->errno."-".$con->error;
  exit();
}

if(!($sentencia->bind_param("ss", $_POST["cedula"], $_POST["clave"]))) {
  echo "Falló la vinculación De Parámetros: ".$sentencia->errno."-".$sentencia->error,
  exit();
}
//ejecutar la consulta
if(!($sentencia->execute())){
  echo "Falló La Ejecución: " .$sentencia->errno."-".$sentencia->error;
  exit();
}

$sentencia->bind_result($cedula, $nombre, $tipo);

if($sentencia->fetch()) {
  if ($tipo == "1") {
    $_SESSION["cedula"] = $cedula;
    $_SESSION["nombre"] = $nombre;
    $_SESSION["tipo"] = $tipo;
    header("location: sesionEnt.php");
  }
  else if ($tipo == "2") {
    $_SESSION["cedula"] = $cedula;
    $_SESSION["nombre"] = $nombre;
    $_SESSION["tipo"] = $tipo;
    header("location: MenuAdm.php");
  }

}
else {
  session_destroy();
  header("location: ../index.html");
}
