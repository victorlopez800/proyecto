<?php
// Archivo actualizar.php

session_start();
require "conexion.php";



// Obtener los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$servicios = $_POST['servicios'];
$direccion = $_POST['direccion'];
$departamento = $_POST['departamento'];
$ciudad = $_POST['ciudad'];

// Actualizar los datos en la base de datos
$sql = "UPDATE tabla_contactos SET nombre = '$nombre', servicios = '$servicios', direccion = '$direccion', departamento = '$departamento', ciudad = '$ciudad' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado correctamente.";
} else {
    echo "Error al actualizar el registro: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>