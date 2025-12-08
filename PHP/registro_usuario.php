<?php
require 'conexion.php'; // Este archivo DEBE crear $pdo

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre     = $_POST['nombre'];
    $email      = $_POST['email'];
    $telefono   = $_POST['telefono'];
    $curp       = $_POST['curp'];
    $direccion  = $_POST['direccion'];
    $role       = $_POST['role'];
    $password   = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Escoger tabla
    if ($role === "recepcionista") {
        $tabla = "recepcionistas";
    } elseif ($role === "medico") {
        $tabla = "medicos";
    } else {
        die("Rol inválido");
    }

    // Query PDO
    $sql = "INSERT INTO $tabla 
            (nombre_completo, correo_electronico, contrasena, telefono, curp, direccion)
            VALUES (:nombre, :email, :pass, :telefono, :curp, :direccion)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nombre'   => $nombre,
        ':email'    => $email,
        ':pass'     => $passwordHash,
        ':telefono' => $telefono,
        ':curp'     => $curp,
        ':direccion'=> $direccion
    ]);

    echo "Usuario registrado correctamente.";
}
?>
