<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información Socioeconómica</title>
    <link rel="stylesheet" type="text/css" href="formulario.css">
    <script>
        function validarFormulario() {
            var vivienda = document.forms["infoForm"]["vivienda"].value;
            var material_piso = document.forms["infoForm"]["material_piso"].value;
            var direccion = document.forms["infoForm"]["direccion"].value;
            var cuartos = document.forms["infoForm"]["cuartos"].value;
            var edad = document.forms["infoForm"]["edad"].value;
            var correo = document.forms["infoForm"]["correo"].value;

            if (vivienda == "") {
                alert("Se requiere seleccionar el tipo de vivienda");
                return false;
            }
            if (material_piso == "") {
                alert("Se requiere seleccionar el material del piso");
                return false;
            }
            if (direccion == "") {
                alert("Se requiere la dirección de la vivienda");
                return false;
            }
            if (cuartos == undefined) {
                alert("Se requiere seleccionar el número de cuartos");
                return false;
            }
            if (edad == "") {
                alert("No ha escrito su edad");
                return false;
            }
            if (correo == "") {
                alert("El campo correo es obligatorio");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Información Socioeconómica Relacionada al Deporte</h1>
    <form name="infoForm" action="resultados_informacion.php" method="post" onsubmit="return validarFormulario()">
        <label for="vivienda">Su vivienda es:</label>
        <select id="vivienda" name="vivienda" required>
            <option value="">Seleccione una opción</option>
            <option value="casa_propia">Casa propia</option>
            <option value="departamento">Departamento</option>
            <option value="alquiler">Alquiler</option>
            <option value="otro">Otro</option>
        </select>
        <br><br>

        <label for="material_piso">¿De qué material es la mayor parte del piso de esta vivienda?</label>
        <select id="material_piso" name="material_piso" required>
            <option value="">Seleccione una opción</option>
            <option value="madera">Madera</option>
            <option value="ceramica">Cerámica</option>
            <option value="cemento">Cemento</option>
            <option value="otro">Otro</option>
        </select>
        <br><br>

        <label for="direccion">Dirección de la vivienda:</label>
        <input type="text" id="direccion" name="direccion" required>
        <br><br>

        <label for="cuartos">¿Cuántos cuartos se usan para dormir?</label>
        <br>
        <input type="radio" id="cuarto1" name="cuartos" value="1" required>
        <label for="cuarto1">1</label>
        <br>
        <input type="radio" id="cuarto2" name="cuartos" value="2">
        <label for="cuarto2">2</label>
        <br>
        <input type="radio" id="cuarto3" name="cuartos" value="3">
        <label for="cuarto3">3</label>
        <br>
        <input type="radio" id="cuarto4" name="cuartos" value="4">
        <label for="cuarto4">4</label>
        <br>
        <input type="radio" id="cuarto5" name="cuartos" value="5">
        <label for="cuarto5">5</label>
        <br><br>

        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" required>
        <br><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
        <br><br>

        <input type="submit" value="Enviar datos">
    </form>
</body>
</html>