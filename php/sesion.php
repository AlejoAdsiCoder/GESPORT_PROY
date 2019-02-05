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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/">
                <h3>GESPORT</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Estado Reservas</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Reservar Evento</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Escenarios</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Club</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Contacto</a>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a class="nav-link" href="#">Admin: <?php echo $_SESSION['nombre']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="cerrarSesion.php">Salir</a></li>
                </ul>
            </div>
    </nav>
  </body>
</html>
