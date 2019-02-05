<?php
session_start();
if (!isset($_SESSION["cedula"])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gesport reservas</title>

	<!-- Bootstrap -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
	<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
</head>
<body>
	<?php include("menu.php");?>
	<div class="container">
		<div class="content">
			<h2>Datos de la reserva &raquo; Agregar datos</h2>
			<hr />
			<form class="form-horizontal" action="scriptevento.php" method="post">
				<div class="form-group row">
					<label class="col-sm-3 control-label">Id Evento</label>
					<div class="col-sm-2">
						<input type="text" name="idEvento" class="form-control" placeholder="Código" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">Nombre actividad</label>
					<div class="col-sm-4">
						<input type="text" name="nombre_actividad" class="form-control" placeholder="Nombre de la actividad" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">Descripción</label>
					<div class="col-sm-3">
						<textarea name="descripcion" class="form-control" placeholder="Descripción del evento"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">Estado</label>
					<div class="col-sm-3">
						<select name="estado" class="form-control">
							<option value=""> ----- </option>
                           <option value="1">Aprobado</option>
							<option value="2">Cancelado</option>

							 <option value="3">En espera</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">Fecha hora inicio</label>
					<div class="col-sm-4">
						<input type="datetime-local" name="fecha_hora_inicio" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">Fecha hora fin</label>
					<div class="col-sm-3">
						<input type="datetime-local" name="fecha_hora_fin" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">Escenario</label>
					<div class="col-sm-4">
						<input type="text" name="idEscenario" class="form-control" placeholder="Código del escenario" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 control-label">Entrenador</label>
					<div class="col-sm-3">
						<input type="text" name="idEntrenador" class="form-control" placeholder="Identificación del entrenador" required>
					</div>
				</div>



				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
</body>
</html>
