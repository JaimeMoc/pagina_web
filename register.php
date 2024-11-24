<?php
require 'db_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $nombre = trim($_POST["nombre"]);
    $apellidos = trim($_POST["apellidos"]);
    $telefono = trim($_POST["telefono"]);
    $errors = [];

    // Validación del nombre de usuario
    if (empty($usuario) || !ctype_alnum($usuario) || strlen($usuario) > 25) {
        $errors[] = "El nombre de usuario es obligatorio, debe ser alfanumérico y no debe superar los 25 caracteres.";
    }

    // Validación del correo electrónico
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 60) {
        $errors[] = "El correo es obligatorio, debe tener un formato válido y no debe superar los 60 caracteres.";
    }

    // Validación de la contraseña
    if (empty($password) || strlen($password) < 8 || strlen($password) > 20 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W]/', $password)) {
        $errors[] = "La contraseña es obligatoria, debe tener entre 8 y 20 caracteres, incluir al menos una mayúscula, un número y un símbolo.";
    }

    // Validación del nombre
    if (empty($nombre) || !ctype_alpha(str_replace(' ', '', $nombre)) || strlen($nombre) > 40) {
        $errors[] = "El nombre es obligatorio, solo debe contener letras y no debe superar los 40 caracteres.";
    }

    // Validación de los apellidos
    if (empty($apellidos) || !ctype_alpha(str_replace(' ', '', $apellidos)) || strlen($apellidos) > 40) {
        $errors[] = "Los apellidos son obligatorios, solo deben contener letras y no deben superar los 40 caracteres.";
    }

    // Validación del teléfono
    if (empty($telefono) || !ctype_digit($telefono) || strlen($telefono) != 10) {
        $errors[] = "El teléfono es obligatorio y debe tener 10 dígitos.";
    }

    if (empty($errors)) {
        // Inserción en la base de datos
        $sql = "INSERT INTO usuarios (usuario, email, password, nombre, apellidos, telefono)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $usuario, $email, $password, $nombre, $apellidos, $telefono);

        if ($stmt->execute()) {
            echo "Registro exitoso";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>