<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['user_id'], $_SESSION['user_token'])) {
    die('No hay sesión iniciada.');
}

$id_usuario = $_SESSION['user_id'];
$token = $_SESSION['user_token'];

// Destruir token de sesión inmediatamente
$stmt = $pdo->prepare("DELETE FROM sesiones_medicos WHERE token = :token");
$stmt->execute([':token' => $token]);

// Actualizar ultima_conexion y marcar usuario inactivo
$stmt = $pdo->prepare("UPDATE medicos SET ultima_conexion = NOW(), activo = 0 WHERE id = :id");
$stmt->execute([':id' => $id_usuario]);

// Destruir sesión PHP
session_unset();
session_destroy();

// Redirigir al login
header('Location: ../HTML/login_administrador.html');
exit;
?>
