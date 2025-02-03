let total_pago = document.getElementById('total_pago').value;

paypal.Buttons({
    style:{
        color: 'blue',
        shape: 'pill',
        label: 'pay',
    },
    createOrder: function(data, actions){
        return actions.order.create({
            purchase_units: [{
                amount:{
                    value: total_pago
                }
            }]
        });
    },
    onApprove: function(data, actions){
        return actions.order.capture().then(function(details) {
            // Redirigir al servidor para guardar el pedido
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/Crear_Pedido'; // Ruta en Laravel
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            form.appendChild(csrfInput);
            document.body.appendChild(form);
            form.submit();
        });
    },
    onCancel: function(data){
        Swal.fire({
            icon: "error",
            title: "El pago ha sido Cancelado",
            showConfirmButton: false,
            timer: 2500
        });
    }
}).render('#paypal-button-container');