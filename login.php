<?php
session_start();
require 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_email = trim($_POST["usuario_email"]);
    $password = trim($_POST["password"]);
    $errors = [];

    // Validación de campos vacíos
    if (empty($usuario_email)) {
        $errors[] = "El nombre de usuario o correo electrónico es obligatorio.";
    }

    if (empty($password)) {
        $errors[] = "La contraseña es obligatoria.";
    }

    if (empty($errors)) {
        // Consulta para verificar las credenciales
        $sql = "SELECT * FROM usuarios WHERE (usuario = ? OR email = ?) AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $usuario_email, $usuario_email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION["usuario"] = $user["usuario"];
            header("Location: proyecto.php"); // Actualiza la redirección aquí
            exit;
        } else {
            $errors[] = "El nombre de usuario/email y/o contraseña son incorrectos, favor de verificar.";
        }

        $stmt->close();
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>