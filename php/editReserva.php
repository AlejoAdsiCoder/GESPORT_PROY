<?php
session_start();
if (!isset($_SESSION["cedula"])) {
    header("Location: ../index.php");
    exit();
}


if(!isset($_GET["rid"]))
		{

			 header("location:index.php");
		}
		else {
				$curdate=date("Y/m/d");
				include ('conexion.php');
				$id = $_GET['rid'];


				$sql ="SELECT usuario.nombre AS Nombre, usuario.apellido AS Apellido, usuario.email AS email, usuario.direccion AS direccion, usuario.telefono AS telefono, evento.nombre_actividad AS nombre_actividad, evento.descripcion AS descripcion, evento.fecha_hora_inicio AS fecha_hora_inicio, evento.fecha_hora_fin AS fecha_hora_fin, escenario.nombre AS escenario, evento.estado AS estado FROM evento INNER JOIN escenario ON escenario.id = evento.escenario_id INNER JOIN usuario ON evento.usuario_cedula = usuario.cedula WHERE evento.id = '$id'";


				$re = mysqli_query($con,$sql) or die(mysqli_error($con));;
				while($row=mysqli_fetch_array($re))
				{

					$fname = $row['Nombre'];
					$lname = $row['Apellido'];
					$email = $row['email'];
    			$dir = $row['direccion'];
					$Phone = $row['telefono'];
					$title = $row['nombre_actividad'];
          $descripcion = $row['descripcion'];
          $fhinicio = $row['fecha_hora_inicio'];
          $fhfin = $row['fecha_hora_fin'];
          $es = $row['estado'];
          $esc = $row['escenario'];

				}
	}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/admin.css">
  <style>
  .content {
    margin-top: 80px;
  }
</style>
  <title></title>
</head>
<body>
  <?php
  include("conexion.php");
  include("menu.php");
  ?>

  <div class="container">
  <div class="content">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Reserva de escenario deportivo<small>	<?php echo  $curdate; ?> </small>
                        </h1>
                    </div>


					<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
Confirmación de reserva
                        </div>
                        <div class="panel-body">

							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                            <th>DESCRIPCION</th>
                                            <th><?php echo $descripcion ?> </th>

                                        </tr>
                                        <tr>
                                            <th>Nombre Actividad</th>
                                            <th><?php echo $title ?> </th>

                                        </tr>
                                        <tr>
                                            <th>nombre</th>
                                            <th><?php echo $fname.$lname; ?> </th>

                                        </tr>
										<tr>
                                            <th>Email</th>
                                            <th><?php echo $email; ?> </th>

                                        </tr>										<tr>
                                            <th>Telefono</th>
                                            <th><?php echo $Phone; ?></th>

                                        </tr>
										<tr>
                                            <th>Actividad que se realizara</th>
                                            <th><?php echo $title; ?></th>

                                        </tr>
										<tr>
                                            <th>Fecha Hora inicio </th>
                                            <th><?php echo $fhinicio; ?></th>

                                        </tr>
										<tr>
                                            <th>Fecha Hora fin </th>
                                            <th><?php echo $fhfin; ?></th>

                                        </tr>
                                        <tr>
                                            <th>Escenario Deportivo </th>
                                            <th><?php echo $esc; ?></th>

                                        </tr>
										<tr>
                                            <th>Nivel de estado</th>
                                            <th><?php echo $es; ?></th>

                                        </tr>





                                </table>
                            </div>



                        </div>
                        <div class="panel-footer">
                            <form method="post">
										<div class="form-group">
														<label>Seleccione el Estado</label>
														<select name="conf"class="form-control">
															<option value selected>	</option>
															<option value="1">Aprobado</option>
                              <option value="2">Cancelado</option>
                              <option value="3">En espera</option>
														</select>
										 </div>
							<input type="submit" name="co" value="Confirmar cambio" class="btn btn-success">

							</form>
                        </div>
                    </div>
					</div>

          <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">
                   Detalles de Escenarios desportivos
                 </div>
                        <div class="card-body">

						<table width="200px">

              <?php
                $escenarios = "SELECT nombre, estado FROM escenario";
                $res = mysqli_query($con,$escenarios);
    						while($row=mysqli_fetch_array($res) )
                {
                  ?>
                  <tr>
                      <td><b><?php echo $row['nombre'] ?></b></td>
                      <td><?php if($row['estado']=="1") { ?><span class="badge badge-success">Activo</span><?php }
                      else { ?> <span class="badge badge-danger">Inactivo</span> <?php } ?><td>
                  </tr>
                  <?php
                }
              ?>


						</table>





						</div>
                    </div>
					</div>
          <?php
          if(isset($_POST['co']))
          {
            $st = $_POST['conf'];



            if($st=="1")
            {
                mysqli_query($con, "UPDATE `evento` SET `estado`='$st' WHERE id = '$id'");
            }
            else if($st=="2"){
                mysqli_query($con, "UPDATE `evento` SET `estado`='$st' WHERE id = '$id'");
            }
            else if($st=="3"){
                mysqli_query($con, "UPDATE `evento` SET `estado`='$st' WHERE id = '$id'");
            }
          }
            ?>
</body>
</html>
