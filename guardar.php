<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lopez";

    // Conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }


    if (
        isset($_POST["nombre"]) &&
        isset($_POST["correo"]) &&
        isset($_POST["servicios"]) &&
        isset($_POST["direccion"]) &&
        isset($_POST["departamento"]) &&
        isset($_POST["ciudad"]) &&
        isset($_POST["telefono"])
    ) {
        // Todos los campos están presentes

        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $servicios = $_POST["servicios"];
        $direccion = $_POST["direccion"];
        $departamento = $_POST["departamento"];
        $ciudad = $_POST["ciudad"];
        $telefono = $_POST["telefono"];

        // Realizar la inserción en la base de datos u otra acción
        // Insertar los datos en la tabla de la base de datos
        $sql = "INSERT INTO tabla_contactos (nombre, correo, servicios, direccion, departamento, ciudad, telefono)
                VALUES ('$nombre', '$correo', '$servicios', '$direccion', '$departamento', '$ciudad', '$telefono')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Datos guardados correctamente";
        } else {
            echo "Error al guardar los datos: " . $conn->error;
        }
        
        $conn->close();
    } else {
        // Alguno o varios campos están ausentes

        // Manejar el caso en el que faltan campos
    }

?>
