<?php
require 'conexion.php'; // PDO = $pdo

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["error" => "Método no permitido"]);
    exit;
}

$id         = $_POST['id'] ?? null;
$tabla      = $_POST['tabla'] ?? null; // recepcionistas | medicos
$nombre     = $_POST['nombre'] ?? null;
$email      = $_POST['email'] ?? null;
$telefono   = $_POST['telefono'] ?? null;
$curp       = $_POST['curp'] ?? null;
$direccion  = $_POST['direccion'] ?? null;
$password   = $_POST['password'] ?? null;

// Validación básica
if (!$id || !$tabla) {
    echo json_encode(["error" => "ID o tabla no especificados"]);
    exit;
}

// Evitar SQL injection en nombre de tabla
$tablasPermitidas = ["recepcionistas", "medicos"];
if (!in_array($tabla, $tablasPermitidas)) {
    echo json_encode(["error" => "Tabla inválida"]);
    exit;
}

// Si NO viene contraseña → no la actualiza
if (empty($password)) {

    $sql = "UPDATE $tabla 
            SET nombre_completo = ?, 
                correo_electronico = ?, 
                telefono = ?, 
                curp = ?, 
                direccion = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $ok = $stmt->execute([
        $nombre,
        $email,
        $telefono,
        $curp,
        $direccion,
        $id
    ]);

} else {
    // Si hay contraseña → la actualiza también
    $hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE $tabla 
            SET nombre_completo = ?, 
                correo_electronico = ?, 
                telefono = ?, 
                curp = ?, 
                direccion = ?,
                contrasena = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $ok = $stmt->execute([
        $nombre,
        $email,
        $telefono,
        $curp,
        $direccion,
        $hash,
        $id
    ]);
}

echo json_encode([
    "success" => $ok ? true : false,
    "message" => $ok ? "Usuario actualizado correctamente" : "Error al actualizar usuario"
]);
