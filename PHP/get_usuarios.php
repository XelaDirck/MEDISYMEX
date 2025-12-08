<?php
require 'conexion.php'; // Tu conexión con $pdo

header("Content-Type: application/json; charset=utf-8");

try {

    // SELECT * para ambas tablas
    $sqlRecep = "SELECT * FROM recepcionistas";
    $sqlMed   = "SELECT * FROM medicos";

    $stmt1 = $pdo->query($sqlRecep);
    $stmt2 = $pdo->query($sqlMed);

    $recepcionistas = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $medicos       = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $usuarios = [];

    // Agregar campo rol manualmente
    foreach ($recepcionistas as $r) {
        $r["rol"] = "Recepcionista";
        $usuarios[] = $r;
    }

    foreach ($medicos as $m) {
        $m["rol"] = "Médico";
        $usuarios[] = $m;
    }

    echo json_encode($usuarios);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
