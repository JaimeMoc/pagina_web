<!DOCTYPE html>
<html lang="es" ng-app="deportesApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportes - Tu Portal Deportivo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body ng-controller="MainController">

<?php
session_start();
?>

<header>
    <h1>Deportes</h1>
    <img src="https://i.ibb.co/N20rK3p/images-removebg-preview.png" alt="Logo de Deportes XYZ" class="logo">
    <nav>
        <ul>
            <li><a href="proyecto.html">Inicio</a></li>
            <li><a href="acerca_de.html">Acerca de</a></li>
            <li><a href="ubicacion.html">Ubicación</a></li>
            <li><a href="contactanos.html">Contacto</a></li>
        </ul>
        <section id="auth-buttons">
            <?php if (isset($_SESSION["usuario"])): ?>
                <p>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></p>
                <a href="logout.php">Cerrar Sesión</a>
            <?php else: ?>
                <a href="login.php">Iniciar Sesión</a>
                <a href="registro.php">Registrarse</a>
            <?php endif; ?>
        </section>
    </nav>
</header>

<main>
    <h2>Registro de Usuario</h2>
    <form method="post" action="register.php">
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br><br>

        <button type="submit">Registrarse</button>
    </form>

    <h2>Inicio de Sesión</h2>
    <form method="post" action="login.php">
        <label for="usuario_email">Nombre de Usuario o Correo Electrónico:</label>
        <input type="text" id="usuario_email" name="usuario_email" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Iniciar Sesión</button>
    </form>
</main>

<footer>
    <p>&copy; 2023 Deportes XYZ. Todos los derechos reservados.</p>
</footer>

<script>
    angular.module('deportesApp', [])
    .controller('MainController', ['$scope', function($scope) {
        $scope.isAuthenticated = <?php echo isset($_SESSION["usuario"]) ? 'true' : 'false'; ?>;
        $scope.currentForm = null;

        $scope.showForm = function(form) {
            $scope.currentForm = form;
        };

        $scope.logout = function() {
            $scope.isAuthenticated = false;
            window.location.href = 'logout.php';
        };
    }]);
</script>

</body>
</html>