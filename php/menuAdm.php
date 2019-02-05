<?php
session_start();
if (!isset($_SESSION["cedula"])) {
    header("Location: ../index.php");
    exit();
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
    <div id="page-wrapper">
                <div id="page-inner">


                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">
                                estado <small>Reserva de escenarios deportivos
     </small>
                            </h1>
                        </div>
                    </div>
                    <!-- /. ROW  -->
    				<?php
    						include ('conexion.php');
    						$sql = "select * from evento";
    						$re = mysqli_query($con,$sql);
    						$c =0;
    						while($row=mysqli_fetch_array($re) )
    						{
    								$new = $row['estado'];
    								$id = $row['id'];
    								if($new=="3")
    								{
    									$c = $c + 1;


    								}

    						}





    				?>

    					<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">

    							<div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
    											<button class="btn btn-default" type="button">
    												Nuevas solicitudes de reserva
      <span class="badge"><?php echo $c ; ?></span>
    											</button>
    											</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                            <div class="panel-body">
                                               <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Cedula</th>
                                                <th>Nombre Actividad</th>
                                                <th>Descripcion</th>
                                                <th>Fecha hora inicio</th>
                                                <th>Fecha hora fin</th>
                                                <th>Escenario</th>
                                                <th>Entrenador</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>

                                            </tr>
                                        </thead>
                                        <tbody>

    									<?php
    									$tsql = "select id, nombre_actividad, descripcion, estado, fecha_hora_inicio, fecha_hora_fin, escenario_id, usuario_cedula, usuario.nombre AS Nombre, usuario.apellido AS Apellido from evento inner join usuario ON evento.usuario_cedula = usuario.cedula";
    									$tre = mysqli_query($con,$tsql);
    									while($trow=mysqli_fetch_array($tre) )
    									{
    										$co =$trow['estado'];
    										if($co=="3")
    										{
    											echo"<tr>
    												<th>".$trow['id']."</th>
                            <th>".$trow['nombre_actividad']."</th>
    												<th>".$trow['descripcion']."</th>
    												<th>".$trow['fecha_hora_inicio']."</th>
    												<th>".$trow['fecha_hora_fin']."</th>
    												<th>".$trow['escenario_id']."</th>
    												<th>".$trow['Nombre']." ".$trow['Apellido']."</th>
    												<th>".$trow['estado']."</th>

    												<th><a href='editReserva.php?rid=".$trow['id']." ' class='btn btn-primary'>Action</a></th>
    												</tr>";
    										}

    									}
    									?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                          <!-- End  Basic Table  -->
                                            </div>
                                        </div>
                                    </div>
    								<?php

    								$rsql = "SELECT * FROM `evento`";
    								$rre = mysqli_query($con,$rsql);
    								$r =0;
    								while($row=mysqli_fetch_array($rre) )
    								{
    										$br = $row['estado'];
    										if($br=="1")
    										{
    											$r = $r + 1;



    										}


    								}

    								?>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
    											<button class="btn btn-primary" type="button">
    												 Escenarios deportivos reservados
     <span class="badge"><?php echo $r ; ?></span>
    											</button>

    											</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">
    										<?php
    										$msql = "SELECT evento.id AS Id, usuario.nombre AS Nombre, usuario.apellido AS Apellido, evento.estado AS Estado, escenario.nombre AS cancha FROM evento INNER JOIN escenario ON escenario.id = evento.escenario_id INNER JOIN usuario ON evento.usuario_cedula = usuario.cedula";
    										$mre = mysqli_query($con,$msql);

    										while($mrow=mysqli_fetch_array($mre) )
    										{
    											$br = $mrow['Estado'];
    											if($br=="1")
    											{
    												$fid = $mrow['Id'];

    											echo"<div class='col-md-3 col-sm-12 col-xs-12'>
    													<div class='panel panel-primary text-center no-boder bg-color-blue'>
    														<div class='panel-body'>
    															<i class='fa fa-users fa-5x'></i>
    															<h3>".$mrow['Nombre']." ".$mrow['Apellido']."</h3>
    														</div>
    														<div class='panel-footer back-footer-blue'>
    														<a href=show.php?sid=".$fid ."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
    													Show
    													</button></a>
    															".$mrow['cancha']."
    														</div>
    													</div>
    											</div>";





    											}


    										}
    										?>

    										</div>

                                        </div>

                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
