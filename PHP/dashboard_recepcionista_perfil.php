<?php

//logica de PHP

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MEDISYMEX</title>

  <!-- Favicon -->
  <link rel="icon" type="image/webp" href="../SRC/Iconos/icon_favicon.webp"/>

  <!-- Bootstrap (opcional) -->
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">

  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="../CSS/styles.css"/>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- LAYOUT -->
<main class="flex-grow-1 hero d-flex">

  <!-- Sidebar escritorio -->
  <aside class="sidebar-med sidebar-desktop">
    <img src="../SRC/Iconos/icon_nabvar.webp" alt="Logo MEDISYMEX" width="38" height="38"/>
    <h6 class="sidebar-title mt-3">Recepción</h6>

<nav class="sidebar-nav">
  <a href="dashboard_recepcionista.php" class="btn-blanco">
    <img src="../SRC/Iconos/speedometer2.svg" alt="Resumen" class="icon me-2">
    Resumen
  </a>

  <a href="dashboard_recepcionista_pacientes.php" class="btn-blanco">
    <img src="../SRC/Iconos/person-badge.svg" alt="Usuarios y roles" class="icon me-2">
    Pacientes
  </a>

  <a href="dashboard_recepcionista_agenda.php" class="btn-blanco">
    <img src="../SRC/Iconos/calendar3-range.svg" alt="Agenda" class="icon me-2">
    Agenda
  </a>

  <a href="dashboard_recepcionista_perfil.php" class="btn-acceso">
    <img src="../SRC/Iconos/person-circle.svg" alt="Mi perfil" class="icon me-2">
    Mi perfil
  </a>
</nav>

<div class="text-center mt-4">
  <img src="../SRC/Iconos/shield-check.svg" alt="Administrador" class="icon me-2">
  <h6 class="fw-bold my-2">Recepcionista</h6>
  <p class="small">Clínica principal</p>
</div>

    <button class="btn btn-salida mt-2" onclick="cerrarSesion()">
      <img src="../SRC/Iconos/box-arrow-right.svg" alt="Cerrar sesión" class="icon me-2">
      <i class="bi bi-box-arrow-right"></i> Cerrar sesión
    </button>

  </aside>

  <!-- Contenido -->

  <section class="flex-grow-1 py-4">
    <div class="container">

      <!-- Card "Mi usuario" -->
      <div class="card shadow-sm mx-auto mb-4" style="max-width: 360px;">
        <!-- Foto de usuario -->
        <div class="text-center mt-4">
          <img src="../SRC/Iconos/person-circle.svg" alt="Foto de usuario" class="rounded-circle" width="100" height="100">
        </div>

        <!-- Cuerpo del card con campos de usuario -->
        <div class="card-body text-center">
          <h5 class="card-title fw-bold mb-1" id="userName">Root Recepcionista</h5>
          <p class="text-muted mb-2" id="userRole">Recepcionista</p>

          <div class="mb-2 text-start">
            <strong>Email:</strong>
            <p class="mb-1" id="userEmail">root@recepcionista.com</p>
          </div>

          <div class="mb-2 text-start">
            <strong>Teléfono:</strong>
            <p class="mb-1" id="userPhone">+52 775 255 91 84</p>
          </div>

          <div class="mb-2 text-start">
            <strong>Clínica:</strong>
            <p class="mb-0" id="userClinic">Clínica Fleming</p>
          </div>

          <button class="btn btn-acceso mt-3">Editar perfil</button>
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
    <script src="../JS/cerrar_sesion_recepcionista.js"></script>
</body>
</html>