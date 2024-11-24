<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Deportes</title>
</head>
<body>
    <h1>Formulario de Deportes</h1>
    <form action="procesar_formulario.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="deporte">Deporte Favorito:</label>
        <select id="deporte" name="deporte" required>
            <option value="futbol">Fútbol</option>
            <option value="baloncesto">Baloncesto</option>
            <option value="tenis">Tenis</option>
            <option value="natacion">Natación</option>
            <option value="atletismo">Atletismo</option>
        </select><br><br>

        <label for="nivel">Nivel de Habilidad:</label>
        <select id="nivel" name="nivel" required>
            <option value="principiante">Principiante</option>
            <option value="intermedio">Intermedio</option>
            <option value="avanzado">Avanzado</option>
        </select><br><br>

        <label for="equipo">Equipo Preferido:</label>
        <input type="text" id="equipo" name="equipo"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>