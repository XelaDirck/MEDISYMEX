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
<main class="flex-grow-1 hero d-flex">

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
        Usuarios
      </a>

      <a href="dashboard_admin_reportes.php" class="btn-blanco">
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

      <!-- Fila de cards (Filtro y Lista de Usuarios + Alta rápida de usuario) -->
      <div class="row g-3 mb-4">

        <!-- Card de Filtro y Lista de Usuarios -->
        <div class="col-12 col-lg-8">
          <div class="card shadow-sm h-100">
            <div class="card-section card-section-header d-flex justify-content-between align-items-center">
              <strong>Usuarios de la clínica</strong>
              <span class="small">Búsqueda & filtros</span>
            </div>
            <div class="card-body">
              <!-- Filtros -->
              <form method="GET" action="dashboard_admin_usuarios.php" class="row g-3 mb-3 small">
                <div class="col-12 col-md-4">
                  <label class="form-label small mb-1">Nombre / Correo</label>
                  <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Buscar...">
                </div>

                <div class="col-12 col-md-4">
                  <label class="form-label small mb-1">Rol</label>
                  <select id="roleFilter" name="role" class="form-select form-select-sm">
                    <option value="all">Todos</option>
                    <option value="paciente">Paciente</option>
                    <option value="recepcionista">Recepcionista</option>
                    <option value="medico">Médico</option>
                  </select>
                </div>

                <div class="col-12 col-md-4">
                  <label class="form-label small mb-1">Estado</label>
                  <select id="statusFilter" name="status" class="form-select form-select-sm">
                    <option value="all">Todos</option>
                    <option value="activo">Activo</option>
                    <option value="bloqueado">Bloqueado</option>
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

              <!-- Tabla de usuarios -->
              <div class="table-responsive">
                <table class="table table-sm table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Rol</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Fila demo (solo ver, sin editar) -->
                    <tr>
                      <td>Dr. Juan Pérez</td>
                      <td>juan.perez@medisymex.com</td>
                      <td>Médico</td>
                      <td><span class="badge text-bg-success">Activo</span></td>
                    </tr>
                    <tr>
                      <td>Dra. Ana Gómez</td>
                      <td>ana.gomez@medisymex.com</td>
                      <td>Médico</td>
                      <td><span class="badge text-bg-success">Activo</span></td>
                    </tr>
                    <tr>
                      <td>Usuario Bloqueado</td>
                      <td>bloqueado@medisymex.com</td>
                      <td>Paciente</td>
                      <td><span class="badge text-bg-danger">Bloqueado</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <p class="text-muted small mt-2 mb-0">
                * Desde recepción solo se consultan usuarios y se registran nuevos.
                La <strong>historia clínica</strong> y datos médicos los completa el <strong>médico</strong>.
              </p>
            </div>
          </div>
        </div>

        <!-- Card para Alta rápida de Usuario -->
        <div class="col-12 col-lg-4">
          <div class="card shadow-sm h-100">
            <div class="card-section-header">
              <strong>Alta rápida de usuario</strong>
            </div>
            <div class="card-body">
              <form method="POST" action="add_user.php">
                <div class="mb-3">
                  <label for="fullName" class="form-label">Nombre completo</label>
                  <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Nombre completo" required>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Correo electrónico</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
                </div>

                <div class="mb-3">
                  <label for="role" class="form-label">Rol</label>
                  <select id="role" name="role" class="form-control" required>
                    <option value="paciente">Paciente</option>
                    <option value="recepcionista">Recepcionista</option>
                    <option value="medico">Médico</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">Estado</label>
                  <select id="status" name="status" class="form-control" required>
                    <option value="activo">Activo</option>
                    <option value="bloqueado">Bloqueado</option>
                  </select>
                </div>

                <button type="submit" class="btn-acceso">Registrar Usuario</button>
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
