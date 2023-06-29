
<?php
session_start();

  require "conexion.php";


  if (isset($_SESSION['username'])) {
      header("Location: login.php");
  }


// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    

    // Consulta para obtener el hash de la contraseña del usuario
    $query = "SELECT password FROM usuarios WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // El usuario existe en la base de datos

        // Obtener el hash de la contraseña almacenada en la base de datos
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        // Verificar la contraseña ingresada utilizando password_verify()
        if (password_verify($password, $storedPassword)) {
           $_SESSION['username'] = $username;
           header("Location: panel.php");
          
        } else {
            // Credenciales inválidas
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        // Usuario no encontrado
        echo "Nombre de usuario o contraseña incorrectos.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZALT</title>
    <link rel="stylesheet" href="style.css">
    <style>

</style>
</head>
<body>
        <div class="box">
                <h2>ZALT Soluciones Logisticas</h2>
                <p>Admin panel</p>
                <form method="post" action="">
                  <div class="inputBox">
                    <input type="text" name="username" required onkeyup="this.setAttribute('value', this.value);"  value="">
                    <label>Usuario</label>
                  </div>
                  <div class="inputBox">
                        <input type="password" name="password" required onkeyup="this.setAttribute('value', this.value);" value="">
                        <label>Clave</label>
                      </div>
                  <input type="submit" name="Iniciar" value="Iniciar sesión">
                </form>
              </div>
</body>
</html>