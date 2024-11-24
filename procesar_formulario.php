<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $deporte = htmlspecialchars($_POST['deporte']);
    $nivel = htmlspecialchars($_POST['nivel']);
    $equipo = htmlspecialchars($_POST['equipo']);

    echo "<h1>Información Recibida</h1>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Deporte Favorito: $deporte</p>";
    echo "<p>Nivel de Habilidad: $nivel</p>";
    echo "<p>Equipo Preferido: $equipo</p>";
}
?>