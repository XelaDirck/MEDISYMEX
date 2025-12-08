function cerrarSesion() {
    // Confirmar antes de cerrar sesión
    if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
        // Redirigir al archivo de logout
        window.location.href = '../PHP/logout_familiar.php';
    }
}