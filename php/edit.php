<?php
include("conexion.php");
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
	<title>Reserva</title>

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
			<h2>Datos de la reserva &raquo; Editar datos</h2>
			<hr />

			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = $_GET["nik"];
			$sql = mysqli_query($con, "SELECT * FROM evento WHERE id='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$id = $_POST['idEvento'];
				$nombre = $_POST['nombre_actividad'];
				$descripcion = $_POST['descripcion'];
				$estado = $_POST['estado'];
				$fechaini = $_POST['fecha_hora_inicio'];
				$fechafin = $_POST['fecha_hora_fin'];
				$idescenario = $_POST['idEscenario'];
				$identrenador = $_POST['idEntrenador'];

				$update = mysqli_query($con, "UPDATE evento SET nombre_actividad='$nombre', descripcion = '$descripcion', estado = '$estado', fecha_hora_inicio = '$fechaini', fecha_hora_fin = '$fechafin', escenario_id = '$idescenario', usuario_cedula = '$identrenador' WHERE idEvento='$nik'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?nik=".$nik."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}

			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
		}
			?>
			<form class="form-horizontal" action="" method="post">
			<div class="form-group row">
				<label class="col-sm-3 control-label">Id Evento</label>
				<div class="col-sm-2">
					<input type="text" name="idEvento" value="<?php echo $row['id']; ?>" class="form-control" placeholder="Código" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 control-label">Nombre actividad</label>
				<div class="col-sm-4">
					<input type="text" name="nombre_actividad" value="<?php echo $row ['nombre_actividad']; ?>" class="form-control" placeholder="Nombre de la actividad" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-3">
					<textarea name="descripcion" value="<?php echo $row ['descripcion'] ?>" class="form-control" placeholder="Descripción del evento"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-3">
					<select name="estado" class="form-control">
						<option value=""> ----- </option>
						<option value="1" <?php if ($row ['estado']==1){echo "selected";} ?>>Aprobado</option>
 <option value="2" <?php if ($row ['estado']==2){echo "selected";} ?>>Cancelado</option>
 <option value="3" <?php if ($row ['estado']==3){echo "selected";} ?>>En espera</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 control-label">Fecha hora inicio</label>
				<div class="col-sm-4">
					<input type="datetime-local" name="fecha_hora_inicio" value="<?php echo $row['fecha_hora_inicio'] ?>" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 control-label">Fecha hora fin</label>
				<div class="col-sm-3">
					<input type="datetime-local" name="fecha_hora_fin" value="<?php echo $row['fecha_hora_fin'] ?>" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 control-label">Escenario</label>
				<div class="col-sm-4">
					<input type="text" name="idEscenario" value="<?php echo $row['escenario_id'] ?>" class="form-control" placeholder="Código del escenario" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 control-label">Entrenador</label>
				<div class="col-sm-3">
					<input type="text" name="idEntrenador" value="<?php echo $row['usuario_cedula'] ?>" class="form-control" placeholder="Identificación del entrenador" required>
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
