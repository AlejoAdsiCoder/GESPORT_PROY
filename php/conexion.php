<?php

  $database ="proygesport";
  $usuario = "root";
  $hostname = "127.0.0.1";
  $pass = "";

  $con = new mysqli($hostname, $usuario, $pass, $database);

  if($con->connect_errno) {
       echo "Fallo al conectar a MySQL: (" . $con->connect_errno .") ". $con->connect_error;
  }
