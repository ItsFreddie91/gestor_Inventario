if (document.getElementById('Carrito_Stock')) {
    Swal.fire({
        icon: "error",
        title: "No hay stock suficiente del producto que deseas comprar 🥺",
        showConfirmButton: false,
        timer: 2500
    });
}
