if (document.getElementById('Categoria_A')) {
    Swal.fire({
        icon: "success",
        title: "La categoría se agrego",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Categoria_E')) {
    Swal.fire({
        icon: "error",
        title: "La categoría ya existe",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Ubicacion_A')) {
    Swal.fire({
        icon: "success",
        title: "La Sucursal se agrego con exito",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Proveedor_A')) {
    Swal.fire({
        icon: "success",
        title: "El proveedor se agrego con exito",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Proveedor_E')) {
    Swal.fire({
        icon: "warning",
        title: "El correo Electronico ya existe",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Proveedor_E_N')) {
    Swal.fire({
        icon: "warning",
        title: "El número de telefono ya existe",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Producto_A')) {
    Swal.fire({
        icon: "success",
        title: "El producto se agrego",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Repartido_A')) {
    Swal.fire({
        icon: "success",
        title: "El producto se ha repartido",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Repartido_Suc')) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
        Toast.fire({
        icon: "success",
        title: "Producto Registrado"
    });
}


if (document.getElementById('Imagen')) {
    Swal.fire({
        icon: "error",
        title: "Error al Subir la Imagen",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Producto_E')) {
    Swal.fire({
        icon: "error",
        title: "El producto no se agrego",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Actuali_E')) {
    Swal.fire({
        icon: "error",
        title: "El producto no se Actualizo",
        showConfirmButton: false,
        timer: 1500
    });
}

if (document.getElementById('Actualizado')) {
    Swal.fire({
        icon: "success",
        title: "El producto se ha actualizado",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Usuario_A')){
    Swal.fire({
        icon:"success",
        title: "El usuario ha sido registrado",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Usuario_E')){
    Swal.fire({
        icon:"success",
        title: "El usuario ha sido eliminado",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Suc_E')){
    Swal.fire({
        icon:"error",
        title: "La sucursal no se actualizo",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Suc_A')){
    Swal.fire({
        icon:"success",
        title: "La sucursal se actualizo",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('User_E')){
    Swal.fire({
        icon:"error",
        title: "El usuario no se actualizo",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('User_A')){
    Swal.fire({
        icon:"success",
        title: "EL usuario se actualizo",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Contra_E')){
    Swal.fire({
        icon:"error",
        title: "La contraseña no se actualizo",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Contra_A')){
    Swal.fire({
        icon:"success",
        title: "La contraseña se actualizo",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Proveedor_E')){
    Swal.fire({
        icon:"error",
        title: "El Proveedor no se actualizo",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Proveedor_E1')){
    Swal.fire({
        icon:"error",
        title: "El Proveedor no se registró",
        showConfirmButton: false,
        timer: 1500
    });
}


if(document.getElementById('Proveedor_A')){
    Swal.fire({
        icon:"success",
        title: "El proveedor se actualizo",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Entrega_E')){
    Swal.fire({
        icon:"error",
        title: "No se pudo realizar la entrega",
        showConfirmButton: false,
        timer: 1500
    });
}

if(document.getElementById('Entrega_A')){
    Swal.fire({
        icon:"success",
        title: "La entrega se ha realizado",
        showConfirmButton: false,
        timer: 1500
    });
}