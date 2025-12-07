<?php
// Lógica de PHP para manejar la visualización del expediente del paciente
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ver Expediente - MEDISYMEX</title>
  <link rel="icon" type="image/webp" href="../SRC/Iconos/icon_favicon.webp"/>
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/styles.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
<main class="flex-grow-1 hero d-flex">
  <!-- Sidebar -->
  <aside class="sidebar-med sidebar-desktop">
    <img src="../SRC/Iconos/icon_nabvar.webp" alt="Logo MEDISYMEX" width="38" height="38"/>
    <h6 class="sidebar-title mt-3">Pacientes</h6>
    <nav class="sidebar-nav">
      <a href="dashboard_paciente.php" class="btn-blanco">
        <img src="../SRC/Iconos/speedometer2.svg" alt="Resumen" class="icon me-2">
        Resumen
      </a>
      <a href="dashboard_paciente_citas.php" class="btn-blanco">
        <img src="../SRC/Iconos/calendar3-range.svg" alt="Citas" class="icon me-2">
        Citas
      </a>
      <a href="dashboard_paciente_expedientes.php" class="btn-acceso">
        <img src="../SRC/Iconos/clipboard2-pulse.svg" alt="Expedientes" class="icon me-2">
        Expediente
      </a>
      <a href="dashboard_paciente_tratamiento.php" class="btn-blanco">
        <img src="../SRC/Iconos/prescription2.svg" alt="Tratamiento" class="icon me-2">
        Tratamiento
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
      <img src="../SRC/Iconos/box-arrow-right.svg" alt="Cerrar sesión" class="icon me-2">
      Cerrar sesión
    </button>
  </aside>

  <!-- Contenido -->
  <section class="flex-grow-1 py-4">
    <div class="container-fluid">
      <div class="row g-2">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header">
              <strong>Expediente de Juan López</strong>
            </div>
            <div class="card-body">
              <!-- ===== DATOS DEL PACIENTE ===== -->
              <h6 class="mb-3">Datos del paciente</h6>
              <div class="row g-2">
                <div class="col-6">
                  <label class="form-label small">Nombre completo</label>
                  <input type="text" class="form-control form-control-sm" value="Juan López" readonly>
                </div>
                <div class="col-6">
                  <label class="form-label small">Edad</label>
                  <input type="number" class="form-control form-control-sm" value="38" readonly>
                </div>
                <div class="col-6">
                  <label class="form-label small">Sexo</label>
                  <select class="form-select form-select-sm" disabled>
                    <option value="masculino" selected>Masculino</option>
                    <option value="femenino">Femenino</option>
                  </select>
                </div>
                <div class="col-6">
                  <label class="form-label small">Tipo de sangre</label>
                  <select class="form-select form-select-sm" disabled>
                    <option value="O+" selected>O+</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                  </select>
                </div>
              </div>
              <!-- ===== INFORMACIÓN CLÍNICA ===== -->
              <h6 class="mt-3">Información clínica</h6>
              <div class="row g-2">
                <div class="col-12">
                  <label class="form-label small">Alergias</label>
                  <input type="text" class="form-control form-control-sm" value="Penicilina, mariscos" readonly>
                </div>
                <div class="col-12">
                  <label class="form-label small">Padecimientos crónicos</label>
                  <input type="text" class="form-control form-control-sm" value="Hipertensión, diabetes" readonly>
                </div>
                <div class="col-12">
                  <label class="form-label small">Diagnóstico principal</label>
                  <input type="text" class="form-control form-control-sm" value="Consulta general" readonly>
                </div>
                <div class="col-12">
                  <label class="form-label small">Notas importantes</label>
                  <textarea class="form-control form-control-sm" rows="2" readonly>Notas sobre el paciente...</textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
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