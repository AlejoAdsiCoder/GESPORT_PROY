<?php
  class Crud
  {
    require_once "conexion.php";
    public function crearEvento($id, $nombre, $descripcion, $estado, $fechaini, $fechafin, $idescenario, $identrenador) {
      try {

        //echo $id . "<br>" . $nombre . "<br>" . $descripcion . "<br>" . $estado . "<br>" . $fechaini . "<br>" . $fechafin . "<br>" . $idescenario . "<br>" . $identrenador;

        $cek = mysqli_query($con, "SELECT * FROM evento WHERE id ='$id'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con, "INSERT INTO evento(id, nombre_actividad, descripcion, estado, fecha_hora_inicio, fecha_hora_fin, escenario_id, usuario_cedula)
															VALUES('$id', '$nombre', '$descripcion', '$estado', '$fechaini', '$fechafin', '$idescenario', '$identrenador')") or die(mysqli_error($con));
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}

				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
				}
      } catch (PDOException $e) {
        echo "Fallo la conexion: " . $e->getMessage();
				die();
      }

    }

    public function editarEvento($id, $nombre, $descripcion, $estado, $fechaini, $fechafin, $idescenario, $identrenador) {
      try {
        $update = mysqli_query($con, "UPDATE evento SET nombre_actividad='$nombre_actividad', descripcion = '$descripcion', estado = '$estado', fecha_hora_inicio = '$fechaini', fecha_hora_fin = '$fechafin', escenario_id = '$idescenario', usuario_cedula = '$identrenador'") or die(mysqli_error($con));
        if($update){
          header("Location: edit.php?nik=".$nik."&pesan=sukses");
        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
        }
      } catch (PDOException $e) {
        echo "Fallo la conexion: " . $e->getMessage();
				die();
      }

    }

    public function obtenerEventos() {
      if($filter){
        $sql = mysqli_query($con, "SELECT * FROM evento WHERE estado='$filter' ORDER BY idEvento ASC");
      }else{
        $sql = mysqli_query($con, "SELECT * FROM evento ORDER BY idEvento ASC");
      }
    }
  }
