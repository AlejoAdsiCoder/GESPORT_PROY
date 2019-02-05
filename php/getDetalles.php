<?php 
    include_once("conexion.php");

    if($_POST['esc']) {
        $sql = "SELECT dia, jornada, hora_inicio, hora_fin FROM escenario INNER JOIN horario ON escenario.id = horario.escenario_id WHERE escenario.id = '".$_REQUEST['esc']."'";      
        $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));

        $data = array();
        while($rows = mysqli_fetch_assoc($resultset)) {
            $data = $rows;
        }
        echo json_encode($data);
    } else {
        echo 0;
    }
?>
