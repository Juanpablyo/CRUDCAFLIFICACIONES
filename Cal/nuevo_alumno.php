<link rel="stylesheet" type="text/css" href="css.css"><?php
include("conexion.php");

if (isset($_POST["registrar"])) {
    $nombre = $_POST["nombre"];
    $parcial_1 = $_POST["parcial_1"];
    $parcial_2 = $_POST["parcial_2"];
    $parcial_3 = $_POST["parcial_3"];
   

    // Calcular el promedio
    $promedio = ($parcial_1 + $parcial_2 + $parcial_3) / 3;

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO alumnos (nombre, parcial_1, parcial_2, parcial_3, promedio) VALUES ('$nombre', $parcial_1, $parcial_2, $parcial_3, $promedio)";
    mysqli_query($conexion, $sql);

    header("Location: indexej.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar nuevo alumno</title>
</head>
<body>
    <h1>Registrar nuevo alumno</h1>

    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="parcial_1">Parcial 1:</label>
        <input type="number" name="parcial_1" required>
        <br>
        <label for="parcial_2">Parcial 2:</label>
        <input type="number" name="parcial_2" required>
        <br>
        <label for="parcial_3">Parcial 3:</label>
        <input type="number" name="parcial_3" required>
        <br>
        <br>
        <button type="submit" name="registrar">Registrar</button>
    </form>
</body>
</html>
