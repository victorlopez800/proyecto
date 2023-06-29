}<?php
// Archivo actualizar.php

session_start();
require "conexion.php";



// Obtener el ID del registro a eliminar
$id = $_GET['id'];

// Eliminar el registro de la base de datos
$sql = "DELETE FROM tabla_contactos WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado correctamente.";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

header("Location: panel.php");
?>