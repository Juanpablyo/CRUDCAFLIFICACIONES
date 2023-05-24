<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: index.html");
    exit;
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Bienvenido</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="welcome-container">
        <h2>Bienvenido, <?php echo $username; ?></h2>
        <a href="logout.php">Cerrar sesión</a>
    </div>
    <iframe src="indexej.php" frameborder="0" width="100%" height="500px"></iframe>

</body>
</html>