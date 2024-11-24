<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Información Socioeconómica</title>
    <link rel="stylesheet" type="text/css" href="formulario.css">
</head>
<body>
    <h1>Resultados de Información Socioeconómica</h1>
    <div class="resultados">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vivienda = htmlspecialchars($_POST['vivienda']);
        $material_piso = htmlspecialchars($_POST['material_piso']);
        $direccion = htmlspecialchars($_POST['direccion']);
        $cuartos = htmlspecialchars($_POST['cuartos']);
        $edad = htmlspecialchars($_POST['edad']);
        $correo = htmlspecialchars($_POST['correo']);
        
        echo "<p>Vivienda: " . $vivienda . "</p>";
        echo "<p>Material del piso: " . $material_piso . "</p>";
        echo "<p>Dirección: " . $direccion . "</p>";
        echo "<p>Cuartos para dormir: " . $cuartos . "</p>";
        echo "<p>Edad: " . $edad . "</p>";
        echo "<p>Correo electrónico: " . $correo . "</p>";
    } else {
        echo "<p>No se han enviado datos.</p>";
    }
    ?>
    </div>
</body>
</html>