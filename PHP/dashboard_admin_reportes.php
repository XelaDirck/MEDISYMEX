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
  <!-- Sidebar escritorio -->
  <aside class="sidebar-med sidebar-desktop">
    <img src="../SRC/Iconos/icon_nabvar.webp" alt="Logo MEDISYMEX" width="38" height="38"/>
    <h6 class="sidebar-title mt-3">Administrador</h6>

<nav class="sidebar-nav">
  <a href="dashboard_admin.php" class="btn-blanco">
    <img src="../SRC/Iconos/speedometer2.svg" alt="Resumen" class="icon me-2">
    Resumen
  </a>

  <a href="dashboard_admin_usuarios.php" class="btn-blanco">
    <img src="../SRC/Iconos/person-badge.svg" alt="Usuarios y roles" class="icon me-2">
    Registro
  </a>

  <a href="dashboard_admin_reportes.php" class="btn-acceso">
    <img src="../SRC/Iconos/clipboard2-pulse.svg" alt="control" class="icon me-2">
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
  <section class="flex-grow-1 py-4">
    <div class="container">

      <!-- Card de Filtro y Lista de Usuarios -->
      <div class="col-12 col-lg-12">
        <div class="card shadow-sm h-100">

          <div class="card-section card-section-header d-flex justify-content-between align-items-center">
              <strong>Usuarios de la clínica</strong>
              <span class="small">Búsqueda & filtros</span>
            <div class="buscador">
              <div class="input-group">
                <span class="input-group-text">
                  <img src="../SRC/Iconos/search.svg" alt="Buscar" width="18" height="18">
                </span>
                <input type="search" class="form-control" placeholder="Buscar...">
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-sm table-hover align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th>Nombre completo</th>
                    <th>Correo electrónico</th>
                    <th>Número telefónico</th>
                    <th>CURP / ID</th>
                    <th>Dirección</th>
                    <th>Rol</th>     
                    <th>Última conexón</th>
                    <th>Activo</th>                           
                    <th>Acción</th>           
                    <th>Reporte</th>                                                                                                               
                  </tr>
                </thead>

                <tbody id="tablaUsuarios">

                </tbody>

              </table>
            </div>

          </div>
        </div>
      </div>

    </div>
  </section>
</main>

<div class="modal fade" id="modalEditar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Editar usuario</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form id="formEditar" method="POST" action="../PHP/update_usuario.php">
        <div class="modal-body">

          <input type="hidden" name="id" id="userID">
          <input type="hidden" name="tabla" id="userTabla">

          <label class="fw-bold mt-2">Nombre</label>
          <input class="form-control" id="nombre" name="nombre">

          <label class="fw-bold mt-2">Correo</label>
          <input class="form-control" id="email" name="email">

          <label class="fw-bold mt-2">Teléfono</label>
          <input class="form-control" id="telefono" name="telefono">

          <label class="fw-bold mt-2">CURP</label>
          <input class="form-control" id="curp" name="curp">

          <label class="fw-bold mt-2">Dirección</label>
          <input class="form-control" id="direccion" name="direccion">

          <label class="fw-bold mt-2">Rol</label>
          <select id="role" name="role" class="form-control">
            <option value="recepcionista">Recepcionista</option>
            <option value="medico">Médico</option>
          </select>

          <label class="fw-bold mt-2">Nueva contraseña (opcional)</label>
          <input type="password" class="form-control" id="password" name="password">
          <input type="password" class="form-control mt-2" id="password_confirm" name="password_confirm">
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-acceso" type="submit">Guardar cambios</button>
        </div>
      </form>

    </div>
  </div>
</div>


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
<script src="../JS/usuarios_tabla.js"></script>
<script src="../JS/update_usuario.js"></script>
<script src="../JS/eliminar_usuario.js"></script>
</body>
</html>
