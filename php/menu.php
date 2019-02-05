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
                      <a class="nav-link" href="sesionEnt.php">Estado Reservas</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="add.php">Reservar Evento</a>
                  </li>
                  <?php if ($_SESSION['tipo'] == "2") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Escenarios</a>
                    </li>
                  <?php } ?>
                  <?php if ($_SESSION['tipo'] == "2") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Club</a>
                    </li>
                  <?php } ?>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Contacto</a>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a class="nav-link" href="#">En: <?php echo $_SESSION['nombre']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="cerrarSesion.php">Salir</a></li>
                </ul>
            </div>
    </nav>
