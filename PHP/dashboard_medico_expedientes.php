<?php
// Lógica de PHP para manejar la búsqueda de pacientes y obtener los expedientes
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gestión de Expedientes - MEDISYMEX</title>
  <link rel="icon" type="image/webp" href="../SRC/Iconos/icon_favicon.webp"/>
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/styles.css"/>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
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

      <a href="dashboard_medico_pacientes.php" class="btn-blanco">
        <img src="../SRC/Iconos/person-badge.svg" alt="Pacientes" class="icon me-2">
        Pacientes
      </a>

      <a href="dashboard_medico_agenda.php" class="btn-blanco">
        <img src="../SRC/Iconos/calendar3-range.svg" alt="Agenda" class="icon me-2">
        Agenda
      </a>

      <a href="dashboard_medico_expedientes.php" class="btn-acceso">
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
        Cerrar sesión
    </button>
  </aside>

  <!-- Contenido -->
  <section class="flex-grow-1 py-4">
    <div class="container-fluid">
      <div class="row g-4">
        <!-- COLUMNA IZQUIERDA 50% -->
        <div class="col-12 col-lg-6">
          <!-- Card de Búsqueda de Pacientes -->
          <div class="card shadow-sm h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
              <strong>Pacientes registrados</strong>
              <span class="small">Búsqueda & filtros</span>
            </div>
            <div class="card-body">
              <form method="GET" action="dashboard_admin_expedientes.php" class="row g-3 mb-3 small">
                <div class="col-12 col-md-6">
                  <label class="form-label small mb-1">Nombre / Apellidos</label>
                  <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Buscar paciente...">
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label small mb-1">Documento</label>
                  <input type="text" id="searchDocument" name="searchDocument" class="form-control form-control-sm" placeholder="Buscar Documento...">
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
              <div class="table-responsive mt-3" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-sm table-hover align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Nombre</th>
                      <th>Documento</th>
                      <th>Teléfono</th>
                      <th>Última cita</th>
                      <th class="text-center">Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Paciente Demo</td>
                      <td>CURP123456</td>
                      <td>771-000-0000</td>
                      <td>2025-11-15</td>
                      <td class="text-center">
                        <button class="btn btn-sm btn-outline-info">
                          <i class="bi bi-file-text me-1"></i>Ver expediente
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>Paciente Ejemplo</td>
                      <td>CURP654321</td>
                      <td>772-000-0000</td>
                      <td>2025-11-10</td>
                      <td class="text-center">
                        <button class="btn btn-sm btn-outline-info">
                          <i class="bi bi-file-text me-1"></i>Ver expediente
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>Juan López</td>
                      <td>CURP789012</td>
                      <td>773-000-0000</td>
                      <td>2025-11-05</td>
                      <td class="text-center">
                        <button class="btn btn-sm btn-outline-info">
                          <i class="bi bi-file-text me-1"></i>Ver expediente
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- COLUMNA DERECHA 50% -->
        <div class="col-12 col-lg-6">
          <!-- Card de Gestión de Expediente COMPLETO -->
          <div class="card shadow-sm h-100">
            <div class="card-header">
              <strong>Expediente del paciente</strong>
            </div>
            <div class="card-body" style="max-height: 700px; overflow-y: auto;">
              
              <!-- ===== DATOS DEL PACIENTE ===== -->
              <h6 class="mb-3">Datos del paciente</h6>
              <div class="row g-3">
                <!-- Nombre completo -->
                <div class="col-12 col-md-12">
                  <label class="form-label small">Nombre completo</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Nombre completo">
                </div>
                
                <!-- Edad y Sexo -->
                <div class="col-12 col-md-4">
                  <label class="form-label small">Edad</label>
                  <input type="number" class="form-control form-control-sm" placeholder="Edad">
                </div>
                <div class="col-12 col-md-4">
                  <label class="form-label small">Sexo</label>
                  <select class="form-select form-select-sm">
                    <option value="" selected>Selecciona</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                  </select>
                </div>
                <div class="col-12 col-md-4">
                  <label class="form-label small">Tipo de sangre</label>
                  <select class="form-select form-select-sm">
                    <option value="" selected>Selecciona</option>
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
                
                <!-- Contacto -->
                <div class="col-12 col-md-6">
                  <label class="form-label small">Teléfono</label>
                  <input type="tel" class="form-control form-control-sm" placeholder="Teléfono">
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label small">Correo electrónico</label>
                  <input type="email" class="form-control form-control-sm" placeholder="Correo electrónico">
                </div>
              </div>

              <!-- ===== INFORMACIÓN CLÍNICA ===== -->
              <h6 class="mt-4">Información clínica</h6>
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label small">Alergias</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Ej. Penicilina, mariscos, etc.">
                </div>
                <div class="col-12">
                  <label class="form-label small">Padecimientos crónicos</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Ej. Diabetes, hipertensión, etc.">
                </div>
                <div class="col-12">
                  <label class="form-label small">Diagnóstico principal</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Diagnóstico principal">
                </div>
                <div class="col-12">
                  <label class="form-label small">Notas importantes</label>
                  <textarea class="form-control form-control-sm" rows="3" placeholder="Notas importantes sobre el paciente"></textarea>
                </div>
              </div>

              <!-- ===== TRATAMIENTO Y ESTUDIOS ===== -->
                <h6 class="mt-4">Tratamiento actual</h6>
                <div class="row g-3">
                  <!-- Medicamento 1 -->
                  <div class="col-12 col-md-6">
                    <label class="form-label small">Medicamento 1</label>
                    <input type="text" class="form-control form-control-sm" name="medicamento_1" placeholder="Nombre del medicamento">
                  </div>
                  <div class="col-12 col-md-3">
                    <label class="form-label small">Dosis</label>
                    <input type="text" class="form-control form-control-sm" name="dosis_1" placeholder="Ej: 500mg">
                  </div>
                  <div class="col-12 col-md-3">
                    <label class="form-label small">Frecuencia</label>
                    <select class="form-select form-select-sm" name="frecuencia_1">
                      <option value="">Seleccionar</option>
                      <option value="una_vez_dia">1 vez al día</option>
                      <option value="dos_veces_dia">2 veces al día</option>
                      <option value="tres_veces_dia">3 veces al día</option>
                      <option value="cada_6h">Cada 6 horas</option>
                      <option value="cada_8h">Cada 8 horas</option>
                      <option value="cada_12h">Cada 12 horas</option>
                      <option value="cada_24h">Cada 24 horas</option>
                      <option value="cuando_se_necesite">Cuando se necesite</option>
                    </select>
                  </div>
                  
                  <!-- Duración del tratamiento -->
                  <div class="col-12 col-md-6">
                    <label class="form-label small">Duración del tratamiento</label>
                    <div class="input-group input-group-sm">
                      <input type="number" class="form-control" name="duracion_tratamiento" placeholder="30">
                      <select class="form-select" name="unidad_duracion">
                        <option value="dias">días</option>
                        <option value="semanas">semanas</option>
                        <option value="meses">meses</option>
                        <option value="indefinido">Indefinido</option>
                      </select>
                    </div>
                  </div>
                  
                  <!-- Vía de administración -->
                  <div class="col-12 col-md-6">
                    <label class="form-label small">Vía de administración</label>
                    <select class="form-select form-select-sm" name="via_administracion">
                      <option value="">Seleccionar</option>
                      <option value="oral">Oral</option>
                      <option value="intravenosa">Intravenosa</option>
                      <option value="intramuscular">Intramuscular</option>
                      <option value="subcutanea">Subcutánea</option>
                      <option value="topica">Tópica</option>
                      <option value="inhalatoria">Inhalatoria</option>
                    </select>
                  </div>
                  
                  <!-- Instrucciones especiales -->
                  <div class="col-12">
                    <label class="form-label small">Instrucciones especiales</label>
                    <textarea class="form-control form-control-sm" name="instrucciones_tratamiento" rows="2" placeholder="Instrucciones adicionales para el tratamiento..."></textarea>
                  </div>
                  
                  <!-- Estudios recientes -->
                  <div class="col-12">
                    <label class="form-label small">Estudios recientes</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Laboratorio, imagenología, etc.">
                  </div>
                  
                  <!-- Próximos controles -->
                  <div class="col-12">
                    <label class="form-label small">Próximos controles / seguimiento</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Próximos controles / seguimiento">
                  </div>
</div>

              <!-- ===== BOTONES ===== -->
              <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top">
                <button type="reset" class="btn btn-outline-secondary btn-sm">Limpiar</button>
                <button type="submit" class="btn btn-success btn-sm">Guardar cambios</button>
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