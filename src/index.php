<?php
$servername = "database";
$username = "root";
$password = "secret";
$dbname = "ctf";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        echo "¡Bienvenido, admin! Aquí está tu bandera: FLAG:{SQL_Injection_BANDERA}";
    } else {
        echo "Credenciales incorrectas.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Reto CTF - SQLi</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <button onclick="location.href='setup.php'">Inicializar reto</button><br><br>
    <form action="index.php" method="post">
        Usuario: <input type="text" name="username"><br>
        Contraseña: <input type="password" name="password"><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
