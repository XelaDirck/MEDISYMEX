function editarUsuario(id, rol) {

    fetch("../PHP/get_usuario_por_id.php?id=" + id + "&rol=" + rol)
        .then(res => res.json())
        .then(user => {

            document.getElementById("nombre").value = user.nombre_completo;
            document.getElementById("email").value = user.correo_electronico;
            document.getElementById("telefono").value = user.telefono;
            document.getElementById("curp").value = user.curp;
            document.getElementById("direccion").value = user.direccion;
            document.getElementById("role").value = rol;

            // Cambiar acción del form
            const form = document.querySelector("form");
            form.action = "../PHP/update_usuario.php";

            // Insertar campos ocultos
            let campoId = document.getElementById("userID");
            let campoTabla = document.getElementById("userTabla");

            if (!campoId) {
                campoId = document.createElement("input");
                campoId.type = "hidden";
                campoId.name = "id";
                campoId.id = "userID";
                form.appendChild(campoId);
            }

            if (!campoTabla) {
                campoTabla = document.createElement("input");
                campoTabla.type = "hidden";
                campoTabla.name = "tabla";
                campoTabla.id = "userTabla";
                form.appendChild(campoTabla);
            }

            campoId.value = id;
            campoTabla.value = rol === "Médico" ? "medicos" : "recepcionistas";

            // Remover required de contraseñas en edición
            document.getElementById("password").required = false;
            document.getElementById("password_confirm").required = false;
        });
}
