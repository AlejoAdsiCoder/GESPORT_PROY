<?php 
    $escenario = $_POST['escenario'];

    $errores = array();

    if(empty($_POST['escenario']))
        $errores['escenario'] = 'No se especifica el nombre de escenario';
    else $escenario = $_POST['escenario'];

    if(empty($errores))
    {
        $con = mysqli_connect("localhost", "root", "", "bdusuarios");
        $query = mysqli_query($con, "SELECT * FROM escenario WHERE escenario_id = '".$escenario."'");
    }
?>