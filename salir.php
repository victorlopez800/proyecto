<?php
// Archivo logout.php

// Iniciar sesión (si aún no está iniciada)
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión u otra página deseada
header("Location: login.php");
exit();
?>