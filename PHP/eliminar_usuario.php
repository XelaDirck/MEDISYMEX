<?php
require 'conexion.php'; // debe crear $pdo
header("Content-Type: application/json; charset=utf-8");

$input = json_decode(file_get_contents("php://input"), true);

$id  = $input['id'] ?? null;
$rol = $input['rol'] ?? null;

if (!$id || !$rol) {
    http_response_code(400);
    echo json_encode(['error' => 'ID o rol no especificados']);
    exit;
}

// normalizar rol y decidir tabla
$rolLower = mb_strtolower($rol, 'UTF-8');
$tabla = 'recepcionistas';
if ($rolLower === 'médico' || $rolLower === 'medico') {
    $tabla = 'medicos';
} elseif ($rolLower === 'recepcionista') {
    $tabla = 'recepcionistas';
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Rol inválido']);
    exit;
}

// asegurar id numérico
if (!ctype_digit((string)$id)) {
    http_response_code(400);
    echo json_encode(['error' => 'ID inválido']);
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM {$tabla} WHERE id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Usuario eliminado correctamente.']);
    } else {
        // no se encontró registro
        http_response_code(404);
        echo json_encode(['error' => 'Usuario no encontrado o ya eliminado.']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error de base de datos: ' . $e->getMessage()]);
}
