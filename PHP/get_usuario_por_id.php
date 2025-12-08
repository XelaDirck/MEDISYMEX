<?php
require 'conexion.php';

header("Content-Type: application/json; charset=utf-8");

$id  = $_GET['id']  ?? null;
$rol = $_GET['rol'] ?? null;

// Validación de parámetros
if (!$id || !$rol) {
    echo json_encode(["error" => "ID o rol no especificados"]);
    exit;
}

// Normalizar el rol
$rol_normalizado = strtolower(trim($rol));
$rol_normalizado = str_replace(["á","é","í","ó","ú"], ["a","e","i","o","u"], $rol_normalizado);

// Determinar la tabla
if ($rol_normalizado === "medico") {
    $tabla = "medicos";
} else if ($rol_normalizado === "recepcionista") {
    $tabla = "recepcionistas";
} else {
    echo json_encode(["error" => "Rol no válido"]);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM $tabla WHERE id = ?");
    $stmt->execute([$id]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo json_encode(["error" => "Usuario no encontrado"]);
        exit;
    }

    echo json_encode($usuario);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
