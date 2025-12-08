<?php
// Datos de conexión
$host = "localhost";       // Cambia si tu host es diferente
$dbname = "medisymex";     // Cambia al nombre de tu base de datos
$user = "root";            // Cambia al usuario de tu BD
$pass = "@ PHPMy4dm1n' @"; // Cambia a la contraseña de tu BD
$charset = "utf8";         // Definir charset compatible

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Muestra errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Devuelve arrays asociativos
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Evita inyecciones
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
