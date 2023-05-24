<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calificaciones";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Procesamiento del registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar si el nombre de usuario ya existe
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $error = "El nombre de usuario ya está en uso";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["username"] = $username;
            header("location: welcome.php");
        } else {
            $error = "Error al registrar el usuario: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
