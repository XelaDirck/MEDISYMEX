<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';

    if (empty($password)) {
        echo "Ingresa una contraseña.";
    } else {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        echo "<strong>Hash generado:</strong><br>";
        echo "<textarea style='width:100%; height:80px;'>$hash</textarea>";
    }
}
?>

<form method="POST">
    <label>Escribe una contraseña:</label><br>
    <input type="text" name="password" style="width:300px;" required>
    <br><br>
    <button type="submit">Generar BCRYPT</button>
</form>
