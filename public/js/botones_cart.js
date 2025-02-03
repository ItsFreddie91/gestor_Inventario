document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', function () {
        const rowId = this.dataset.rowId;
        const quantity = this.value;

        fetch(`/carrito/actualizar/${rowId}`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message); // Mensaje de éxito
                // Puedes actualizar el total del carrito en la vista
                document.querySelector('#cart-total').textContent = data.cartTotal;
            }
        })
        .catch(error => console.error('Error al actualizar el carrito:', error));
    });
});

document.querySelectorAll('.decrease-btn').forEach(button => {
    button.addEventListener('click', function () {
        const rowId = this.dataset.rowId;
        const input = document.querySelector(`#quantity-${rowId}`);
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
            input.closest('form').submit(); // Envía el formulario automáticamente
        }
    });
});

document.querySelectorAll('.increase-btn').forEach(button => {
    button.addEventListener('click', function () {
        const rowId = this.dataset.rowId;
        const input = document.querySelector(`#quantity-${rowId}`);
        input.value = parseInt(input.value) + 1;
        input.closest('form').submit(); // Envía el formulario automáticamente
    });
});

