<?php
// Lógica de PHP para manejar la visualización y modificación de citas
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gestión de Citas - MEDISYMEX</title>

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
        <img src="../SRC/Iconos/person-badge.svg" alt="Pacientes" class="icon me-2">
        Pacientes
      </a>

      <a href="dashboard_recepcionista_agenda.php" class="btn-acceso">
        <img src="../SRC/Iconos/calendar3-range.svg" alt="Agenda" class="icon me-2">
        Agenda
      </a>

      <a href="dashboard_recepcionista_perfil.php" class="btn-blanco">
        <img src="../SRC/Iconos/person-circle.svg" alt="Mi perfil" class="icon me-2">
        Mi perfil
      </a>
    </nav>

    <div class="text-center mt-4">
      <img src="../SRC/Iconos/shield-check.svg" alt="Recepcionista" class="icon me-2">
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

      <!-- Fila de cards (Filtro de Citas + Nueva Cita Rápida) -->
      <div class="row g-3 mb-4">

        <!-- Card de Filtro y Lista de Citas (70%) -->
        <div class="col-12 col-lg-8">
          <div class="card shadow-sm h-100">
            <div class="card-header">
              <strong>Filtros de citas</strong>
            </div>
            <div class="card-body">
              <!-- Filtros -->
              <form method="GET" action="dashboard_recepcionista_citas.php" class="row g-3 mb-3 small">
                <div class="col-12 col-md-6">
                  <label class="form-label small mb-1">Fecha</label>
                  <input type="date" id="fecha" name="fecha" class="form-control form-control-sm">
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label small mb-1">Paciente</label>
                  <input type="text" id="paciente" name="paciente" class="form-control form-control-sm" placeholder="Nombre / apellidos">
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label small mb-1">Médico</label>
                  <input type="text" id="medico" name="medico" class="form-control form-control-sm" placeholder="Nombre del médico">
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label small mb-1">Estado</label>
                  <select id="estado" name="estado" class="form-select form-select-sm">
                    <option value="todos">Todos</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="confirmada">Confirmada</option>
                    <option value="cancelada">Cancelada</option>
                  </select>
                </div>

                <div class="col-12 d-flex gap-2 mt-2">
                  <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-funnel me-1"></i> Aplicar
                  </button>
                  <button type="reset" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-x-circle me-1"></i> Limpiar
                  </button>
                </div>
              </form>

              <!-- Lista de citas -->
              <div class="table-responsive">
                <table class="table table-sm table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Paciente</th>
                      <th>Médico</th>
                      <th>Motivo</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2025-11-21</td>
                      <td>10:00</td>
                      <td>Paciente Demo</td>
                      <td>Dr. Ejemplo</td>
                      <td>Consulta general</td>
                      <td><span class="badge text-bg-success">Confirmada</span></td>
                      <td>
                        <form method="POST" action="gestionar_cita.php">
                          <button type="submit" name="accion" value="confirmar" class="btn btn-outline-success btn-sm">Confirmar</button>
                          <button type="submit" name="accion" value="cancelar" class="btn btn-outline-danger btn-sm">Cancelar</button>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>2025-11-22</td>
                      <td>11:00</td>
                      <td>Paciente Ejemplo</td>
                      <td>Dra. Gómez</td>
                      <td>Chequeo</td>
                      <td><span class="badge text-bg-warning">Pendiente</span></td>
                      <td>
                        <form method="POST" action="gestionar_cita.php">
                          <button type="submit" name="accion" value="confirmar" class="btn btn-outline-success btn-sm">Confirmar</button>
                          <button type="submit" name="accion" value="cancelar" class="btn btn-outline-danger btn-sm">Cancelar</button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Card de Nueva Cita Rápida (30%) -->
        <div class="col-12 col-lg-4">
          <div class="card shadow-sm h-100">
            <div class="card-header">
              <strong>Gestionar cita</strong>
            </div>
            <div class="card-body">
              <form method="POST" action="gestionar_cita.php">
                <!-- Formulario para agendar, reagendar o eliminar cita -->
                <div class="mb-2 row">
                  <div class="col-12 col-md-6">
                    <label class="form-label small">Paciente</label>
                    <input type="text" class="form-control form-control-sm" name="paciente" placeholder="Nombre del paciente" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small">Médico</label>
                    <input type="text" class="form-control form-control-sm" name="medico" placeholder="Nombre del médico" required>
                  </div>
                </div>

                <div class="mb-2 row">
                  <div class="col-12 col-md-6">
                    <label class="form-label small">Fecha</label>
                    <input type="date" class="form-control form-control-sm" name="fecha" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small">Hora</label>
                    <input type="time" class="form-control form-control-sm" name="hora" required>
                  </div>
                </div>

                <div class="mb-2 row">
                  <div class="col-12">
                    <label class="form-label small">Motivo</label>
                    <input type="text" class="form-control form-control-sm" name="motivo" placeholder="Motivo de la consulta" required>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-12">
                    <label class="form-label small">Estado</label>
                    <select class="form-select form-select-sm" name="estado" required>
                      <option value="pendiente">Pendiente</option>
                      <option value="confirmada">Confirmada</option>
                      <option value="cancelada">Cancelada</option>
                    </select>
                  </div>
                </div>

                <div class="d-flex justify-content-end gap-3">
                  <button type="submit" name="accion" value="agendar" class="btn btn-success btn-sm">Guardar cita</button>
                  <button type="submit" name="accion" value="reagendar" class="btn btn-warning btn-sm">Reagendar cita</button>
                  <button type="submit" name="accion" value="eliminar" class="btn btn-danger btn-sm">Eliminar cita</button>
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
