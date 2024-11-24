<?php
$servername = "localhost";
$username = "root"; 
$password = ""; // Tu contraseña de MySQL
$dbname = "deportes"; // El nombre de tu base de datos

// Configurar el manejo de errores
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Creación de la conexión utilizando el modo de excepciones
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // Manejo de excepciones: muestra el mensaje de error
    die("Error de conexión: " . $e->getMessage());
}
?>