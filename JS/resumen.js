function cargarKpis() {
    fetch("../PHP/get_resumen.php")
        .then(response => response.json())
        .then(data => {
            document.getElementById("adminKpiRecepcionistas").innerText = data.recepcionistas;
            document.getElementById("adminKpiPacientes").innerText      = data.pacientes;
            document.getElementById("adminKpiMedicos").innerText        = data.medicos;
            document.getElementById("adminKpiPersonal").innerText       = data.personal_total;
        })
        .catch(error => console.error("Error cargando KPIs:", error));
}

document.addEventListener("DOMContentLoaded", cargarKpis);
