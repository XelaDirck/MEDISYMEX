<?php
// Lógica de PHP para manejar la visualización de los reportes
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Generar Reporte - MEDISYMEX</title>

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
    <h6 class="sidebar-title mt-3">Administrador</h6>

    <nav class="sidebar-nav">
      <a href="dashboard_administrador.php" class="btn-acceso">
        <img src="../SRC/Iconos/speedometer2.svg" alt="Resumen" class="icon me-2">
        Resumen
      </a>

      <a href="dashboard_admin_usuarios.php" class="btn-blanco">
        <img src="../SRC/Iconos/person-badge.svg" alt="Usuarios y roles" class="icon me-2">
        Usuarios
      </a>

      <a href="dashboard_admin_reportes.php" class="btn-acceso">
        <img src="../SRC/Iconos/clipboard2-pulse.svg" alt="Reportes" class="icon me-2">
        Reportes
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

    <button class="btn btn-salida mt-2" onclick="cerrarSesion()">
      <img src="../SRC/Iconos/box-arrow-right.svg" alt="Cerrar sesión" class="icon me-2">
      <i class="bi bi-box-arrow-right"></i> Cerrar sesión
    </button>

  </aside>

  <!-- Contenido -->
  <section class="flex-grow-1 py-4">
    <div class="container">

      <!-- KPIs -->
      <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
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

        <div class="col-12 col-sm-6 col-xl-3">
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

        <div class="col-12 col-sm-6 col-xl-3">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <p class="text-muted mb-1">Médicos</p>
                <h3 id="adminKpiMedicos">0</h3>
              </div>
              <img src="../SRC/Iconos/heart-pulse.svg" alt="Médicos" class="icon">
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <p class="text-muted mb-1">Ocupación agenda</p>
                <h3 id="adminKpiOcupacion">0%</h3>
              </div>
              <img src="../SRC/Iconos/activity.svg" alt="Ocupación agenda" class="icon">
            </div>
          </div>
        </div>
      </div>

      <!-- Filtro y Listado de Pacientes -->
      <div class="row g-3 mb-4">
        <div class="col-12 col-lg-8">
          <div class="card shadow-sm h-100">
            <div class="card-header">
              <strong>Filtros de pacientes</strong>
            </div>
            <div class="card-body">
              <form method="GET" action="dashboard_admin_reportes.php" class="row g-3 mb-3 small">
                <div class="col-12 col-md-4">
                  <label class="form-label small mb-1">Nombre / Apellidos</label>
                  <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Buscar paciente...">
                </div>

                <div class="col-12 col-md-4">
                  <label class="form-label small mb-1">Teléfono</label>
                  <input type="text" id="searchPhone" name="searchPhone" class="form-control form-control-sm" placeholder="Buscar teléfono...">
                </div>

                <div class="col-12 col-md-4">
                  <label class="form-label small mb-1">Etiqueta</label>
                  <select id="labelFilter" name="labelFilter" class="form-select form-select-sm">
                    <option value="all">Todas</option>
                    <option value="nuevo">Nuevo</option>
                    <option value="frecuente">Frecuente</option>
                    <option value="deuda">Con adeudo</option>
                  </select>
                </div>

                <div class="col-12 d-flex gap-2 mt-3">
                  <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-funnel me-1"></i> Aplicar
                  </button>
                  <button type="reset" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-x-circle me-1"></i> Limpiar
                  </button>
                </div>
              </form>

              <!-- Tabla de pacientes -->
              <div class="table-responsive mt-3">
                <table class="table table-sm table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Nombre</th>
                      <th>Documento</th>
                      <th>Teléfono</th>
                      <th>Última cita</th>
                      <th>Etiqueta</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Paciente Demo</td>
                      <td>CURP123456</td>
                      <td>771-000-0000</td>
                      <td>2025-11-15</td>
                      <td><span class="badge text-bg-success">Frecuente</span></td>
                    </tr>
                    <tr>
                      <td>Paciente Ejemplo</td>
                      <td>CURP654321</td>
                      <td>772-000-0000</td>
                      <td>2025-11-10</td>
                      <td><span class="badge text-bg-primary">Nuevo</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Card de Generación de Reporte -->
        <div class="col-12 col-lg-4">
          <div class="card shadow-sm h-100">
            <div class="card-header">
              <strong>Generar reporte</strong>
            </div>
            <div class="card-body">
              <form method="GET" action="generar_reporte.php">
                <div class="mb-3">
                  <label class="form-label">Tipo de reporte</label>
                  <select class="form-select form-select-sm" name="tipo_reporte">
                    <option value="pacientes">Pacientes</option>
                    <option value="medicos">Médicos</option>
                    <option value="recepcionistas">Recepcionistas</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Fecha desde</label>
                  <input type="date" class="form-control form-control-sm" name="fecha_desde">
                </div>

                <div class="mb-3">
                  <label class="form-label">Fecha hasta</label>
                  <input type="date" class="form-control form-control-sm" name="fecha_hasta">
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                  <button type="submit" class="btn btn-primary btn-sm">Generar reporte</button>
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
