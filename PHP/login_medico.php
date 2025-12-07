<?php
session_start();
require 'conexion.php'; // conexión PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        die('Por favor ingresa correo y contraseña.');
    }

    // Buscar usuario
    $stmt = $pdo->prepare("SELECT * FROM medicos WHERE correo_electronico = :email LIMIT 1");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();

    if (!$user) die('Usuario no encontrado.');
    if ($password !== $user['contrasena']) die('Contraseña incorrecta.');

    // Eliminar cualquier token previo para este usuario (forzar sesión única)
    $stmt = $pdo->prepare("DELETE FROM sesiones_medicos WHERE id_usuario = :id_usuario");
    $stmt->execute([':id_usuario' => $user['id']]);

    // Generar token único
    $token = bin2hex(random_bytes(32));

    // Insertar nuevo token
    $stmt = $pdo->prepare("INSERT INTO sesiones_medicos (id_usuario, token) VALUES (:id_usuario, :token)");
    $stmt->execute([
        ':id_usuario' => $user['id'],
        ':token' => $token
    ]);

    // Marcar usuario como activo
    $stmt = $pdo->prepare("UPDATE medicos SET activo = 1 WHERE id = :id");
    $stmt->execute([':id' => $user['id']]);

    // Guardar info de sesión PHP
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['correo_electronico'];
    $_SESSION['user_nombre'] = $user['nombre_completo'];
    $_SESSION['user_token'] = $token;
    $_SESSION['user_tipo'] = 'administrador';

    header('Location: ../PHP/dashboard_medico.php');
    exit;
}
?>
