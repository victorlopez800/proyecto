<?php




$host = "localhost";
$usuarioDB = "root";
$passwordDB = "";
$nombreDB = "lopez";


// Crear conexión a la base de datos
  $conn = new mysqli($host, $usuarioDB, $passwordDB, $nombreDB);

  // Verificar si hay errores en la conexión
  if ($conn->connect_error) {
      die("Error de conexión a la base de datos: " . $conn->connect_error);
  }