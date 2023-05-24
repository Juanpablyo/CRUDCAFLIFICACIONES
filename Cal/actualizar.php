<?php
// Obtener datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$parcial_1 = $_POST['parcial_1'];
$parcial_2 = $_POST['parcial_2'];
$parcial_3 = $_POST['parcial_3'];
$promedio = ($parcial_1 + $parcial_2 + $parcial_3) / 3;

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "calificaciones");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Actualizar calificaciones del alumno en la base de datos
$query = "UPDATE alumnos SET nombre = '$nombre', parcial_1 = $parcial_1, parcial_2 = $parcial_2, parcial_3 = $parcial_3, promedio = $promedio WHERE id = $id";
$result = mysqli_query($conexion, $query);

// Verificar si la actualización fue exitosa
if ($result) {
    echo "Calificaciones actualizadas correctamente.";
} else {
    echo "Error al actualizar calificaciones: " . mysqli_error($conexion);
}

// Cerrar conexión
mysqli_close($conexion);
?>
<button onclick="window.location.href='indexej.php'">Regresar</button>