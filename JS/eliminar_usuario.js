// eliminar_usuario.js
// =============== FUNCIÓN PARA ELIMINAR USUARIO ===============
function eliminarUsuario(id, rol) {
    if (!id || !rol) {
        alert("ID o rol no especificados.");
        return;
    }

    if (!confirm("¿Seguro que deseas eliminar este usuario? Esta acción no se puede deshacer.")) {
        return;
    }

    fetch("../PHP/eliminar_usuario.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8"
        },
        body: JSON.stringify({ id: id, rol: rol })
    })
    .then(res => res.json())
    .then(data => {
        if (data.error) {
            alert("Error: " + data.error);
            return;
        }

        // éxito
        alert(data.message || "Usuario eliminado correctamente.");
        // recargar tabla si existe la función
        if (typeof cargarUsuarios === "function") {
            cargarUsuarios();
        } else {
            // fallback: recargar la página
            location.reload();
        }
    })
    .catch(err => {
        console.error("Error en fetch eliminar:", err);
        alert("Ocurrió un error al eliminar el usuario.");
    });
}

// Delegación de eventos: escucha clicks en todo el documento y actúa si el target tiene clase .btnEliminar
document.addEventListener("click", function(e) {
    const el = e.target.closest && e.target.closest(".btnEliminar");
    if (!el) return;

    const id = el.getAttribute("data-id");
    const rol = el.getAttribute("data-rol");

    // convertir rol a string claro (opcional)
    eliminarUsuario(id, rol);
});
