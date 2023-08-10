<?php
$servername = "database";
$username = "root";
$password = "secret";
$dbname = "ctf";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear tabla
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla users creada correctamente<br>";
} else {
    echo "Error creando tabla: " . $conn->error . "<br>";
}

// Insertar registro usando sentencias preparadas
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

$user_to_insert = 'admin';
$password_to_insert = 'FLAG:{SQL_Injection_BANDERA}';

$stmt->bind_param("ss", $user_to_insert, $password_to_insert);

if ($stmt->execute() === TRUE) {
    echo "Nuevo registro creado correctamente<br>";
} else {
    echo "Error: " . $stmt->error . "<br>";
}

$stmt->close();
$conn->close();

echo "Setup completo<br><a href='index.php'>Regresar al inicio</a>";
?>
