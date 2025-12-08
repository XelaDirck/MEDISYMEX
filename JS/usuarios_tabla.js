function cargarUsuarios() {
    fetch("../PHP/get_usuarios.php")
        .then(response => response.json())
        .then(data => {

            let tbody = document.getElementById("tablaUsuarios");
            tbody.innerHTML = "";

            data.forEach(user => {

                tbody.innerHTML += `
                    <tr>
                        <td>${user.nombre_completo}</td>
                        <td>${user.correo_electronico}</td>
                        <td>${user.telefono ?? "—"}</td>
                        <td>${user.curp ?? "—"}</td>
                        <td>${user.direccion ?? "—"}</td>
                        <td>${user.rol}</td>
                        <td>${user.ultima_conexion ?? "Nunca"}</td>
                        <td>${user.activo == 1 ? "Activo" : "Inactivo"}</td>

                        <td>
                            <button 
                                class="btn btn-warning btn-sm"
                                onclick="editarUsuario(${user.id}, '${user.rol}')"
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEditar">
                                Editar
                            </button>

                            <button 
                                class="btn btn-danger btn-sm btnEliminar" 
                                data-id="${user.id}" 
                                data-rol="${user.rol}">
                                Eliminar
                            </button>

                        </td>

                        <td>
                            <button class="btn btn-info btn-sm">Reporte</button>
                        </td>
                    </tr>
                `;
            });

        })
        .catch(err => console.error("Error cargando usuarios:", err));
}

document.addEventListener("DOMContentLoaded", cargarUsuarios);
