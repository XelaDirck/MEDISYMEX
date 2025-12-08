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
    <h6 class="sidebar-title mt-3">Médico</h6>

  <nav class="sidebar-nav">
    <a href="dashboard_medico.php" class="btn-acceso">
      <img src="../SRC/Iconos/speedometer2.svg" alt="Resumen" class="icon me-2">
      Resumen
    </a>

    <a href="dashboard_medico_pacientes.php" class="btn-blanco">
      <img src="../SRC/Iconos/person-badge.svg" alt="Pacientes" class="icon me-2">
      Pacientes
    </a>

    <a href="dashboard_medico_agenda.php" class="btn-blanco">
      <img src="../SRC/Iconos/calendar3-range.svg" alt="Agenda" class="icon me-2">
      Agenda
    </a>

    <a href="dashboard_medico_expedientes.php" class="btn-blanco">
      <img src="../SRC/Iconos/clipboard2-pulse.svg" alt="expedientes" class="icon me-2">
      Expedientes
    </a>

    <a href="dashboard_medico_perfil.php" class="btn-blanco">
      <img src="../SRC/Iconos/person-circle.svg" alt="Mi perfil" class="icon me-2">
      Mi perfil
    </a>
  </nav>

<div class="text-center mt-4">
  <img src="../SRC/Iconos/shield-check.svg" alt="Administrador" class="icon me-2">
  <h6 class="fw-bold my-2">Médico</h6>
  <p class="small">Clínica principal</p>
</div>

    <button class="btn btn-salida mt-2 d-flex align-items-center mx-auto" onclick="cerrarSesion()">
      <img src="../SRC/Iconos/box-arrow-right.svg" alt="Cerrar sesión" class="icon me-2">
        Cerrar sesión
    </button>

  </aside>

  <!-- Contenido -->
  <section class="flex-grow-1 py-4">
    <div class="container">

<!-- KPIs -->
<div class="row g-3 mb-4 text-start">
  <div class="col-12 col-sm-6 col-xl-6">
    <div class="card shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-muted mb-1">Citas hoy</p>
          <h3 id="adminKpiCitasHoy">0</h3>
        </div>
        <img src="../SRC/Iconos/calendar2-check.svg" alt="Citas hoy" class="icon">
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-xl-6">
    <div class="card shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <p class="text-muted mb-1">Pacientes activos</p>
          <h3 id="adminKpiPacientes">0</h3>
        </div>
        <img src="../SRC/Iconos/people.svg" alt="Pacientes activos" class="icon">
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
    <script src="../JS/cerrar_sesion_medico.js"></script>
</body>
</html>