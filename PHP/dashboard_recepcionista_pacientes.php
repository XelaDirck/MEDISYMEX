<?php

// Lógica de PHP

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gestión de Pacientes - MEDISYMEX</title>

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

  <a href="dashboard_recepcionista_pacientes.php" class="btn-acceso">
    <img src="../SRC/Iconos/person-badge.svg" alt="Usuarios y roles" class="icon me-2">
    Pacientes
  </a>

  <a href="dashboard_recepcionista_agenda.php" class="btn-blanco">
    <img src="../SRC/Iconos/calendar3-range.svg" alt="Agenda" class="icon me-2">
    Agenda
  </a>

  <a href="dashboard_recepcionista_perfil.php" class="btn-blanco">
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

      <!-- Fila de cards (Filtro de pacientes + Alta rápida de paciente) -->
      <div class="row g-3 mb-4">
        
        <!-- Card de Filtro de Pacientes -->
        <div class="col-12 col-lg-8">
          <div class="card shadow-sm h-100">
            <div class="card-section card-section-header d-flex justify-content-between align-items-center">
              <strong>Pacientes registrados</strong>
              <span class="small">Búsqueda & filtros</span>
            </div>
            <div class="card-body">
              <!-- Filtros -->
              <form method="GET" action="dashboard_admin_pacientes.php" class="row g-3 mb-3 small">
                <div class="col-12 col-md-4">
                  <label class="form-label small mb-1">Nombre / Apellidos</label>
                  <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Buscar...">
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

                <div class="col-12 d-flex gap-2">
                  <button type="submit" class="btn-acceso btn-outline-primary btn-sm">
                    <i class="bi bi-funnel me-1"></i>Aplicar
                  </button>
                  <button type="reset" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-x-circle me-1"></i>Limpiar
                  </button>
                </div>
              </form>

              <!-- Tabla de pacientes -->
              <div class="table-responsive">
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

        <!-- Card de Alta rápida de Paciente -->
        <div class="col-12 col-lg-4">
          <div class="card shadow-sm h-100">
            <div class="card-section-header">
              <strong>Alta rápida de paciente</strong>
            </div>
            <div class="card-body">
              <form id="formRecepAltaPaciente">
                <div class="mb-2">
                  <label class="form-label small">Nombre completo</label>
                  <input type="text" id="altaPacNombre" class="form-control form-control-sm" required>
                </div>
                <div class="mb-2">
                  <label class="form-label small">CURP / ID</label>
                  <input type="text" id="altaPacDocumento" class="form-control form-control-sm" required>
                </div>

                <div class="mb-2">
                  <label class="form-label small">Teléfono</label>
                  <input type="text" id="altaPacTelefono" class="form-control form-control-sm" required>
                </div>
                <div class="mb-2">
                  <label class="form-label small">Correo</label>
                  <input type="email" id="altaPacCorreo" class="form-control form-control-sm">
                </div>

                <div class="mb-2">
                  <label class="form-label small">Estado civil</label>
                  <select id="altaPacEstadoCivil" class="form-select form-select-sm">
                    <option value="">Selecciona...</option>
                    <option value="soltero">Soltero(a)</option>
                    <option value="casado">Casado(a)</option>
                    <option value="union_libre">Unión libre</option>
                    <option value="divorciado">Divorciado(a)</option>
                    <option value="viudo">Viudo(a)</option>
                  </select>
                </div>

                <div class="mb-2">
                  <label class="form-label small">Nacionalidad</label>
                  <input type="text" id="altaPacNacionalidad" class="form-control form-control-sm" placeholder="Mexicana, etc.">
                </div>

                <div class="mb-2">
                  <label class="form-label small">Domicilio</label>
                  <textarea id="altaPacDomicilio"
                            class="form-control form-control-sm"
                            rows="2"
                            style="resize:none;"
                            placeholder="Calle, número, colonia, ciudad"></textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label small">Médico responsable</label>
                  <select id="altaPacMedicoResp" class="form-select form-select-sm">
                    <option value="">Selecciona médico...</option>
                    <option value="demo1">Dr. Demo 1</option>
                    <option value="demo2">Dra. Demo 2</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label small">Etiqueta</label>
                  <select id="altaPacEtiqueta" class="form-select form-select-sm">
                    <option value="">Ninguna</option>
                    <option value="nuevo">Nuevo</option>
                    <option value="frecuente">Frecuente</option>
                    <option value="deuda">Con adeudo</option>
                  </select>
                </div>

                <button type="submit" class="btn-acceso w-100 btn-sm">
                  <i class="bi bi-save me-1"></i>Registrar paciente
                </button>
              </form>

              <p class="text-muted small mt-3 mb-0">
                Recepción solo registra <strong>datos de contacto y administrativos</strong>.  
                Campos clínicos (alergias, antecedentes, diagnósticos, etc.) se capturan en el
                <strong>expediente del médico</strong>.
              </p>
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
