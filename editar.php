<?php

session_start();
require "conexion.php";

// Consulta para obtener los datos de la tabla
$query = "SELECT * FROM tabla_contactos";
$result = $conn->query($query);


// Obtener el ID del registro a editar
$id = $_GET['id'];

// Obtener los datos del registro de la base de datos
$sql = "SELECT * FROM tabla_contactos WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Mostrar el formulario de edición
    ?>
    <form method="POST" action="update.php">
        <!-- Aquí van los campos del formulario -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
        <input type="text" name="servicios" value="<?php echo $row['servicios']; ?>">
        <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>">
        <input type="text" name="departamento" value="<?php echo $row['departamento']; ?>">
        <input type="text" name="ciudad" value="<?php echo $row['ciudad']; ?>">
        
        <input type="submit" value="Actualizar">
    </form>
    <?php
} else {
    echo "No se encontró el registro.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>