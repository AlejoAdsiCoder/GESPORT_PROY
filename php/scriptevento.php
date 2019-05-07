<?php
  require_once "crud.php";

  $id = $_POST['id'];
  $escenario = $_POST['escenario'];
  $club = $_POST['club'];
  $descripcion = $_POST['descripcion'];
  $estado = $_POST['estado'];
  $fechaini = $_POST['fecha_hora_inicio'];
  $fechafin = $_POST['fecha_hora_fin'];

  $crud = new Crud();

  $crud->crearEvento($id, $club, $escenario, $estado, $fechaini, $fechafin);


 ?>
