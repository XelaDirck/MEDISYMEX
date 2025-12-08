<?php

// Lógica de PHP

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gestión de Usuarios - MEDISYMEX</title>

  <!-- Favicon -->
  <link rel="icon" type="image/webp" href="../SRC/Iconos/icon_favicon.webp"/>

  <!-- Bootstrap (opcional) -->
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">

  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="../CSS/styles.css"/>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- LAYOUT -->
<main class="flex-grow-1 hero">

  <!-- Sidebar escritorio -->
  <aside class="sidebar-med sidebar-desktop">
    <img src="../SRC/Iconos/icon_nabvar.webp" alt="Logo MEDISYMEX" width="38" height="38"/>
    <h6 class="sidebar-title mt-3">Administrador</h6>

<nav class="sidebar-nav">
  <a href="dashboard_admin.php" class="btn-blanco">
    <img src="../SRC/Iconos/speedometer2.svg" alt="Resumen" class="icon me-2">
    Resumen
  </a>

  <a href="dashboard_admin_usuarios.php" class="btn-acceso">
    <img src="../SRC/Iconos/person-badge.svg" alt="Usuarios y roles" class="icon me-2">
    Registro
  </a>

  <a href="dashboard_admin_reportes.php" class="btn-blanco">
    <img src="../SRC/Iconos/clipboard2-pulse.svg" alt="Reportes" class="icon me-2">
    Control
  </a>

  <a href="dashboard_admin_perfil.php" class="btn-blanco">
    <img src="../SRC/Iconos/person-circle.svg" alt="Mi perfil" class="icon me-2">
    Mi perfil
  </a>
</nav>

    <div class="text-center mt-4">
      <img src="../SRC/Iconos/shield-check.svg" alt="Administrador" class="icon me-2">
      <h6 class="fw-bold my-2">Administrador</h6>
      <p class="small">Clínica principal</p>
    </div>

    <button class="btn btn-salida mt-2 d-flex align-items-center mx-auto" onclick="cerrarSesion()">
      <img src="../SRC/Iconos/box-arrow-right.svg" alt="Cerrar sesión" class="icon me-2">
        Cerrar sesión
    </button>

  </aside>

<!-- Contenido -->
<section class="flex-grow-1 d-flex justify-content-center align-items-center">
  <div class="container d-flex justify-content-center">

    <!-- Fila de cards -->
    <div class="row g-3 align-items-center justify-content-center w-100">

      <!-- Card para Alta rápida de Usuario -->
      <div class="col-12 col-lg-4">
        <div class="card shadow-sm h-100 " style="max-height: 750px;">

          <div class="card-section-header fw-bold">
            <strong>Registro de usuarios</strong>
          </div>

          <div class="card-body">

        <form method="POST" action="registro_usuario.php" novalidate>
          <div class="mb-2">
            <label for="nombre" class="form-label fw-bold">Nombre completo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" required>
          </div>

          <div class="mb-2">
            <label for="email" class="form-label fw-bold">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
          </div>

          <div class="mb-2">
            <label for="telefono" class="form-label fw-bold">Número telefónico</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Número telefónico">
          </div>

          <div class="mb-2">
            <label for="curp" class="form-label fw-bold">CURP / ID</label>
            <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP / ID">
          </div>

          <div class="mb-2">
            <label for="direccion" class="form-label fw-bold">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
          </div>

          <div class="mb-2">
            <label for="role" class="form-label fw-bold">Rol</label>
            <select id="role" name="role" class="form-control" required>
              <option value="recepcionista">Recepcionista</option>
              <option value="medico">Médico</option>
            </select>
          </div>

          <div class="mb-2">
            <label for="password" class="form-label fw-bold">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
          </div>

          <div class="mb-2">
            <label for="password_confirm" class="form-label fw-bold">Confirmar contraseña</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirmar contraseña" required>
          </div>

          <button type="submit" class="btn btn-acceso">Registrar Usuario</button>
        </form>


          </div>
        </div>
      </div>

    </div>
  </div>
</section>

</main>

  <!-- ===== FOOTER ===== -->
  <footer class="footer">
    <div class="footer-inner text-center">
      <p>&copy; 2025 MEDISYMEX. Todos los derechos reservados.</p>
      <p>
        <a href="#">Política de Privacidad</a> |
        <a href="#">Términos de Uso</a>
      </p>
    </div>
  </footer>

  <!-- JS -->
  <script src="../JS/bootstrap.bundle.min.js"></script>
  <script src="../JS/cerrar_sesion_administrador.js"></script>
</body>
</html>
