function confirmDelete(rowId) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto, el produto se eliminara de todas las sucursales!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, envía el formulario
            document.getElementById('delete-form-' + rowId).submit();
        }
    });
}

function confirmDeleteSucursal(rowId) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto, la sucursal se eliminara!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, envía el formulario
            document.getElementById('delete-form-' + rowId).submit();
        }
    });
}

function confirmDeleteUsuario(rowId) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto, el usuario se eliminara!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, envía el formulario
            document.getElementById('delete-form-' + rowId).submit();
        }
    });
}

function confirmDeleteProveedor(rowId) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto, el proveedor se eliminara!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, envía el formulario
            document.getElementById('delete-form-' + rowId).submit();
        }
    });
}

function confirmEntrega(rowId) {
    Swal.fire({
        title: 'Confirmar',
        text: "¡El pedido se marcara como entregado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Entregarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, envía el formulario
            document.getElementById('update-form-' + rowId).submit();
        }
    });
}