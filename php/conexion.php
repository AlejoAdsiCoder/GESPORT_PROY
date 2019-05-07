<?php

  $database ="gesport";
  $usuario = "root";
  $hostname = "localhost:8889";
  $pass = "root";

  $con = new mysqli($hostname, $usuario, $pass, $database);

  if($con->connect_errno) {
       echo "Fallo al conectar a MySQL: (" . $con->connect_errno .") ". $con->connect_error;
  }
