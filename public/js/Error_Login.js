if (document.getElementById('loginError')) {
    Swal.fire({
        icon: "error",
        title: "Tu usuario y/o contraseña son incorrectos!",
        showConfirmButton: false,
        timer: 2000
    });
}