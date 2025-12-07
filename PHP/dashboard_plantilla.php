<?php
// Lógica de PHP para manejar la visualización y solicitud de citas
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ver Citas - MEDISYMEX</title>
  <link rel="icon" type="image/webp" href="../SRC/Iconos/icon_favicon.webp"/>
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/styles.css"/>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
<main class="flex-grow-1 hero d-flex">

  <!-- Sidebar -->
  <aside class="sidebar-med sidebar-desktop">
    <img src="../SRC/Iconos/icon_nabvar.webp" alt="Logo MEDISYMEX" width="38" height="38"/>
    <h6 class="sidebar-title mt-3">Paciente</h6>
    <nav class="sidebar-nav">
      <a href="dashboard_paciente.php" class="btn-blanco">
        <img src="../SRC/Iconos/speedometer2.svg" alt="Resumen" class="icon me-2">
        Resumen
      </a>

      <a href="dashboard_paciente_citas.php" class="btn-acceso">
        <img src="../SRC/Iconos/calendar3-range.svg" alt="Citas" class="icon me-2">
        Citas
      </a>

      <a href="dashboard_paciente_expedientes.php" class="btn-blanco">
        <img src="../SRC/Iconos/clipboard2-pulse.svg" alt="Expedientes" class="icon me-2">
        Expediente
      </a>

      <a href="dashboard_paciente_perfil.php" class="btn-blanco">
        <img src="../SRC/Iconos/person-circle.svg" alt="Mi perfil" class="icon me-2">
        Mi perfil
      </a>
    </nav>

    <div class="text-center mt-4">
      <img src="../SRC/Iconos/shield-check.svg" alt="Paciente" class="icon me-2">
      <h6 class="fw-bold my-2">Paciente</h6>
      <p class="small">Clínica principal</p>
    </div>

    <button class="btn btn-salida mt-2" onclick="cerrarSesion()">
      <img src="../SRC/Iconos/box-arrow-right.svg" alt="Cerrar sesión" class="icon me-2"><i class="bi bi-box-arrow-right"></i> Cerrar sesión
    </button>
  </aside>

  <!-- Contenido -->
  <section class="flex-grow-1 py-4">
    <div class="container-fluid">
      <div class="row g-4">
        
        <!-- Card de Ver citas (50%) -->
        <div class="col-12 col-lg-6">
          <div class="card shadow-sm h-100">
            <div class="card-header">
              <strong>Mis citas</strong>
            </div>
            <div class="card-body">

              <!-- Tabla de citas -->
              <div class="table-responsive mt-3">
                <table class="table table-sm table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Médico</th>
                      <th>Motivo</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2025-11-21</td>
                      <td>10:00</td>
                      <td>Dr. Ejemplo</td>
                      <td>Consulta general</td>
                      <td><span class="badge text-bg-success">Confirmada</span></td>
                    </tr>
                    <tr>
                      <td>2025-11-22</td>
                      <td>11:00</td>
                      <td>Dra. Gómez</td>
                      <td>Chequeo</td>
                      <td><span class="badge text-bg-warning">Pendiente</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>

        <!-- Card de Solicitar nueva cita (50%) -->
        <div class="col-12 col-lg-6">
          <div class="card shadow-sm h-100">
            <div class="card-header">
              <strong>Solicitar una cita</strong>
            </div>
            <div class="card-body">
              <form method="POST" action="solicitar_cita.php">
                <div class="mb-3">
                  <label class="form-label">Médico</label>
                  <select class="form-select form-select-sm" name="medico">
                    <option value="dr_ejemplo">Dr. Ejemplo</option>
                    <option value="dra_gomez">Dra. Gómez</option>
                    <!-- Agregar más médicos aquí -->
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Fecha</label>
                  <input type="date" class="form-control form-control-sm" name="fecha">
                </div>
                <div class="mb-3">
                  <label class="form-label">Hora</label>
                  <input type="time" class="form-control form-control-sm" name="hora">
                </div>
                <div class="mb-3">
                  <label class="form-label">Motivo</label>
                  <input type="text" class="form-control form-control-sm" name="motivo" placeholder="Motivo de la consulta">
                </div>
                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-success btn-sm">Solicitar cita</button>
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

<script src="../JS/bootstrap.bundle.min.js"></script>
<script src="../JS/cerrar_sesion_administrador.js"></script>
</body>
</html>
