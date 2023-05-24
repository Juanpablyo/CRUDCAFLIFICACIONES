<!DOCTYPE html>
<html>
<head>
    <title>Editar calificaciones</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <h1>Editar calificaciones</h1>
    <?php

if (isset($yourArray['id'])) {
    // Access the 'id' key
    $id = $yourArray['id'];
} else {
    // Handle the case when 'id' key is not present
    $id = null; // or any default value you want
}

    // Obtener ID del alumno a editar
    $id = $_GET["id"];

    // Conexión a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'calificaciones');
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtener datos del alumno a editar
    $query = "SELECT * FROM alumnos WHERE id = $id";
    $result = mysql_query($conexion, $query);
    $fila = mysqli_fetch_assoc($result);

    // Mostrar formulario con datos del alumno
    echo "<form action='actualizar.php' method='POST'>";
    echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>";
    echo "<label>Nombre:</label>";
    echo "<input type='text' name='nombre' value='" . $fila['nombre'] . "' required>";
    echo "<br><br>";
    echo "<label>Parcial 1:</label>";
    echo "<input type='number' name='parcial_1' step='0.01' value='" . $fila['parcial_1'] . "' required>";
    echo "<br><br>";
    echo "<label>Parcial 2:</label>";
    echo "<input type='number' name='parcial_2' step='0.01' value='" . $fila['parcial_2'] . "' required>";
    echo "<br><br>";
    echo "<label>Parcial 3:</label>";
    echo "<input type='number' name='parcial_3' step='0.01' value='" . $fila['parcial_3'] . "' required>";
    echo "<br><br>";
    echo "<button type='submit'>Actualizar</button>";
    echo "</form>";

    // Cerrar conexión
    mysqli_close($conexion);
    ?>
</body>
</html>