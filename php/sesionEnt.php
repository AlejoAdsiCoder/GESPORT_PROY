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
      <h2>Lista de reservas</h2>
      <hr />

      <?php
      if(isset($_GET['aksi']) == 'delete'){
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
        $cek = mysqli_query($con, "SELECT * FROM evento WHERE idEvento='$nik'");
        if(mysqli_num_rows($cek) == 0){
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($con, "DELETE FROM evento WHERE idEvento='$nik'");
          if($delete){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
          }
        }
      }
      ?>

      <form class="form-inline" method="get">
        <div class="form-group">
          <select name="filter" class="form-control" onchange="form.submit()">
            <option value="0">Filtros de datos de reservas</option>
            <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
            <option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Aprobado</option>
            <option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Cancelado</option>
                        <option value="3" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>En espera</option>
          </select>
        </div>
      </form>
      <br />
      <div class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
          <th>No</th>
                    <th>Id Evento</th>
          <th>Nombre actividad</th>
          <th>Id Escenario</th>
                    <th>Fecha Inicio</th>
                    <th>Descripción</th>
          <th>Id Entrenador</th>
          <th>Fecha fin</th>
          <th>Estado</th>
        </tr>
        <?php
        if($filter){
          $sql = mysqli_query($con, "SELECT * FROM evento WHERE estado='$filter' ORDER BY id ASC");
        }else{
          $sql = mysqli_query($con, "SELECT * FROM evento ORDER BY id ASC");
        }

        if(mysqli_num_rows($sql) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
          while($row = mysqli_fetch_assoc($sql)){
            echo '
            <tr>
              <td>'.$no.'</td>
              <td>'.$row['id'].'</td>
              <td><a href="profile.php?nik='.$row['id'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['nombre_actividad'].'</a></td>
                            <td>'.$row['descripcion'].'</td>
              <td>'.$row['fecha_hora_inicio'].'</td>
                            <td>'.$row['fecha_hora_inicio'].'</td>
              <td>'.$row['fecha_hora_fin'].'</td>
              <td>'.$row['escenario_id'].'</td>
              <td>'.$row['usuario_cedula'].'</td>
              <td>';
              if($row['estado'] == '1'){
                echo '<span class="label label-success">Aprobado</span>';
              }
                            else if ($row['estado'] == '2' ){
                echo '<span class="label label-info">Cancelado</span>';
              }
                            else if ($row['estado'] == '3' ){
                echo '<span class="label label-warning">En espera</span>';
              }
            echo '
              </td>
              <td>

								<a href="edit.php?nik='.$row['id'].'" title="Editar datos" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
								<a href="index.php?aksi=delete&nik='.$row['id'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombre_actividad'].'?\')" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
							</td>
            </tr>
            ';
            $no++;
          }
        }
        ?>
      </table>
      </div>
    </div>
  </div>
  </body>
</html>
