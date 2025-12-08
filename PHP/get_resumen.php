<?php
require 'conexion.php'; // Usa tu conexión PDO

header('Content-Type: application/json');

// Respuesta base
$response = [
    "recepcionistas" => 0,
    "pacientes"      => 0,
    "medicos"        => 0,
    "personal_total" => 0
];

try {
    // === Contador de recepcionistas ===
    $stmt = $pdo->query("SELECT COUNT(*) FROM recepcionistas");
    $response["recepcionistas"] = (int) $stmt->fetchColumn();

    // === Contador de pacientes ===
    $stmt = $pdo->query("SELECT COUNT(*) FROM pacientes");
    $response["pacientes"] = (int) $stmt->fetchColumn();

    // === Contador de médicos ===
    $stmt = $pdo->query("SELECT COUNT(*) FROM medicos");
    $response["medicos"] = (int) $stmt->fetchColumn();

    // Total de personal (recepcionistas + médicos)
    $response["personal_total"] = 
        $response["recepcionistas"] + $response["medicos"];

    echo json_encode($response);

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
