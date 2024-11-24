<?php
include 'db_conexion.php'; 

// Establecer los encabezados para la respuesta JSON
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $mensaje = trim($_POST["mensaje"]);
    $errores = [];

    // Validar nombre
    if (empty($nombre)) {
        $errores[] = "El campo nombre no puede estar vacío.";
    } elseif (strlen($nombre) > 35) {
        $errores[] = "El nombre no puede superar los 35 caracteres.";
    }

    // Validar email
    if (empty($email)) {
        $errores[] = "El campo email no puede estar vacío.";
    } elseif (strlen($email) > 60) {
        $errores[] = "El email no puede superar los 60 caracteres.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email no es válido.";
    }

    // Validar mensaje
    if (empty($mensaje)) {
        $errores[] = "El campo mensaje no puede estar vacío.";
    }

    // Mostrar errores o procesar el formulario
    if (!empty($errores)) {
        echo json_encode(['status' => 'error', 'messages' => $errores]);
    } else {
        // Insertar los datos en la base de datos
        $stmt = $conn->prepare("INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $mensaje);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Formulario enviado correctamente.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al enviar el formulario: ' . $stmt->error]);
        }

        // Cerrar la conexión
        $stmt->close();
        $conn->close();
    }
} else {
    // Si no es una solicitud POST
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
}
?>