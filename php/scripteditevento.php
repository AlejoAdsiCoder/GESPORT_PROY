<?php
  require_once "crud.php";

  $id = $_POST['idEvento'];
  $nombre = $_POST['nombre_actividad'];
  $descripcion = $_POST['descripcion'];
  $estado = $_POST['estado'];
  $fechaini = $_POST['fecha_hora_inicio'];
  $fechafin = $_POST['fecha_hora_fin'];
  $idescenario = $_POST['idEscenario'];
  $identrenador = $_POST['idEntrenador'];

  $crud = new Crud();

  $crud->editarEvento($id, $nombre, $descripcion, $estado, $fechaini, $fechafin, $idescenario, $identrenador);
