<?php

session_start();
require "conexion.php";


  // Consulta para obtener los datos de la tabla
  $query = "SELECT * FROM tabla_contactos";
  $result = $conn->query($query);
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Datos|panel</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<a href="salir.php">Cerrar sesión</a>
	<table class='table table-bordered'>
                <tr>
                    <th>ID</th>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Servicios</th>
                    <th>Dirección</th>
                    <th>Departamento</th>
                    <th>Ciudad</th>
                    <th>Teléfono</th>
                    <th>Editar</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['correo'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['servicios'] . "</td>";
                        echo "<td>" . $row['direccion'] . "</td>";
                        echo "<td>" . $row['departamento'] . "</td>";
                        echo "<td>" . $row['ciudad'] . "</td>";
                        echo "<td>" . $row['telefono'] . "</td>";
                        echo "<td> <a href='editar.php?id=".$row['id']."'>Editar</a> </td>";
                        echo "<td> <a href='delete.php?id=".$row['id']."'>Eliminar</a> </td>";
                        echo "</tr>";
                    }
                } else {
                    // No hay datos en la tabla
                    echo "<tr><td colspan='8'>No hay datos</td></tr>";
                }
                ?>
            </table>
</body>
</html>