<?php

// Lógica de PHP

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detalle del Paciente - MEDISYMEX</title>

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
      <a href="dashboard_medico.php" class="btn-blanco">
        <img src="../SRC/Iconos/speedometer2.svg" alt="Resumen" class="icon me-2">
        Resumen
      </a>

      <a href="dashboard_medico_pacientes.php" class="btn-acceso">
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
      <img src="../SRC/Iconos/shield-check.svg" alt="Médico" class="icon me-2">
      <h6 class="fw-bold my-2">Médico</h6>
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

      <!-- Fila de cards (Filtro de pacientes + Detalle del paciente) -->
      <div class="row g-3 mb-4">

        <!-- Filtro de Pacientes -->
        <div class="col-12 col-lg-4">
          <div class="card shadow-sm h-100">
            <div class="card-header">
              <strong>Buscar paciente</strong>
            </div>
            <div class="card-body">
              <form method="GET" action="dashboard_medico_pacientes.php" class="row g-3 mb-2 small">
                <div class="col-12">
                  <label class="form-label small mb-1">Nombre completo / CURP</label>
                  <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Buscar paciente...">
                </div>

                <div class="col-12 mt-2">
                  <label class="form-label small mb-1">Estado civil</label>
                  <select id="statusFilter" name="status" class="form-select form-select-sm">
                    <option value="all">Todos</option>
                    <option value="soltero">Soltero(a)</option>
                    <option value="casado">Casado(a)</option>
                    <option value="viudo">Viudo(a)</option>
                  </select>
                </div>

                <div class="col-12 d-flex gap-2 mt-2">
                  <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-funnel me-1"></i>Aplicar
                  </button>
                  <button type="reset" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-x-circle me-1"></i>Limpiar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Card de Detalle del Paciente -->
        <div class="col-12 col-lg-8">
          <div class="card shadow-sm mb-4">
            <div class="card-header">
              <strong>Detalle del paciente</strong>
              <span class="small">Paciente: Juan López</span>
            </div>
            <div class="card-body">

              <!-- Datos básicos del paciente en 4 columnas -->
              <h6>Datos básicos</h6>
              <form method="POST" action="save_patient_details.php">
                <div class="mb-2 row">
                  <div class="col-12 col-md-3">
                    <label class="form-label">Nombre completo</label>
                    <input type="text" class="form-control form-control-sm" name="fullName" value="" placeholder="Nombre completo">
                  </div>
                  <div class="col-12 col-md-3">
                    <label class="form-label">Edad</label>
                    <input type="number" class="form-control form-control-sm" name="age" value="" placeholder="Edad">
                  </div>
                  <div class="col-12 col-md-3">
                    <label class="form-label">Sexo</label>
                    <select class="form-select form-select-sm" name="sex">
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                    </select>
                  </div>
                  <div class="col-12 col-md-3">
                    <label class="form-label">Tipo de sangre</label>
                    <select class="form-select form-select-sm" name="bloodType">
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                    </select>
                  </div>
                </div>

                <div class="mb-2 row">
                  <div class="col-12 col-md-3">
                    <label class="form-label">Peso (kg)</label>
                    <input type="number" class="form-control form-control-sm" name="weight" value="" placeholder="Peso">
                  </div>
                  <div class="col-12 col-md-3">
                    <label class="form-label">Altura (cm)</label>
                    <input type="number" class="form-control form-control-sm" name="height" value="" placeholder="Altura">
                  </div>
                  <div class="col-12 col-md-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" class="form-control form-control-sm" name="phone" value="" placeholder="Teléfono">
                  </div>
                  <div class="col-12 col-md-3">
                    <label class="form-label">Temperatura (°C)</label>
                    <input type="number" class="form-control form-control-sm" name="temperature" value="" placeholder="Temperatura">
                  </div>
                </div>

                <div class="mb-2 row">
                  <div class="col-12 col-md-3">
                    <label class="form-label">Pulso (lpm)</label>
                    <input type="number" class="form-control form-control-sm" name="pulse" value="" placeholder="Pulso">
                  </div>
                  <div class="col-12 col-md-3">
                    <label class="form-label">Última cita</label>
                    <input type="date" class="form-control form-control-sm" name="lastVisit" value="">
                  </div>
                </div>

                <!-- Condiciones médicas -->
                <h6 class="mt-4">Condiciones médicas</h6>
                <div class="mb-3">
                  <label class="form-label">Alergias</label>
                  <input type="text" class="form-control form-control-sm" name="allergies" value="" placeholder="Alergias">
                </div>

                <div class="mb-3">
                  <label class="form-label">Padecimientos crónicos</label>
                  <input type="text" class="form-control form-control-sm" name="chronicConditions" value="" placeholder="Padecimientos crónicos">
                </div>

                <!-- Contacto de emergencia -->
                <h6 class="mt-4">Contacto de emergencia</h6>
                <div class="mb-3">
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control form-control-sm" name="emergencyContactName" value="" placeholder="Nombre contacto">
                </div>

                <div class="mb-3">
                  <label class="form-label">Teléfono</label>
                  <input type="text" class="form-control form-control-sm" name="emergencyContactPhone" value="" placeholder="Teléfono contacto">
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-success btn-sm">Guardar cambios</button>
                </div>
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
