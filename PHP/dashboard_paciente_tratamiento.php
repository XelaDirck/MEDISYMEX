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
    <h6 class="sidebar-title mt-3">Paciente</h6>

    <nav class="sidebar-nav">

      <a href="dashboard_paciente.php" class="btn-blanco">
        <img src="../SRC/Iconos/calendar3-range.svg" alt="Citas" class="icon me-2">
        Citas
      </a>
      <a href="dashboard_paciente_expedientes.php" class="btn-blanco">
        <img src="../SRC/Iconos/clipboard2-pulse.svg" alt="Expedientes" class="icon me-2">
        Expediente
      </a>
      <a href="dashboard_paciente_tratamiento.php" class="btn-acceso">
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

    <button class="btn btn-salida mt-2 d-flex align-items-center mx-auto" onclick="cerrarSesion()">
      <img src="../SRC/Iconos/box-arrow-right.svg" alt="Cerrar sesión" class="icon me-2">
        Cerrar sesión
    </button>
  </aside>

  <!-- Contenido -->
  <section class="flex-grow-1 py-4">
    <div class="container-fluid">
      <div class="row g-4">

        <!-- Card de Tratamiento y estudios -->
        <div class="col-12">
          <div class="card shadow-sm h-100">
            <div class="card-section-header">
              <strong>Tratamiento y estudios del paciente</strong>
            </div>
            <div class="card-body">

              <!-- ===== TRATAMIENTO ACTUAL (TABLA) ===== -->
              <h6 class="mb-3">Tratamiento actual</h6>
              <div class="table-responsive mb-4">
                <table class="table table-sm table-bordered">
                  <thead class="table-light">
                    <tr>
                      <th>Medicamento</th>
                      <th>Dosis</th>
                      <th>Frecuencia</th>
                      <th>Duración</th>
                      <th>Instrucciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Medicamento A</td>
                      <td>500 mg</td>
                      <td>Mañana y noche</td>
                      <td>30 días</td>
                      <td>Tomar con alimentos</td>
                    </tr>
                    <tr>
                      <td>Medicamento B</td>
                      <td>250 mg</td>
                      <td>1 vez al día</td>
                      <td>15 días</td>
                      <td>Tomar en ayunas</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- ===== ESTUDIOS RECIENTES ===== -->
              <h6 class="mt-4">Estudios recientes</h6>
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label small">Estudios realizados</label>
                  <input type="text" class="form-control form-control-sm" value="Análisis de sangre, radiografía" readonly>
                </div>
                <div class="col-12">
                  <label class="form-label small">Resultados</label>
                  <input type="text" class="form-control form-control-sm" value="Todo dentro de los valores normales" readonly>
                </div>
              </div>

              <!-- ===== PRÓXIMOS CONTROLES ===== -->
              <h6 class="mt-4">Próximos controles</h6>
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label small">Próximos exámenes</label>
                  <input type="text" class="form-control form-control-sm" value="Examen de colesterol en 3 meses" readonly>
                </div>
              </div>

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