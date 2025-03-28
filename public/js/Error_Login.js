if (document.getElementById('loginError')) {
    Swal.fire({
        icon: "error",
        title: "Tu usuario y/o contraseña son incorrectos!",
        showConfirmButton: false,
        timer: 2000
    });
}

if (document.getElementById('Correo_Exis')) {
    Swal.fire({
        icon: "error",
        title: "El correo ya ha sido registrado!",
        showConfirmButton: false,
        timer: 2000
    });
}