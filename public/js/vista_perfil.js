function actualizar_datos() {
    document.getElementById('personalDataForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Animación de guardado
        const submitButton = this.querySelector('button[type="submit"]');
        const originalContent = submitButton.innerHTML;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';
        submitButton.disabled = true;

        // Simulamos el guardado
        setTimeout(() => {
            submitButton.innerHTML = '<i class="fas fa-check me-2"></i>¡Guardado!';
            
            // Enviar el formulario después de la animación
            setTimeout(() => {
                submitButton.innerHTML = originalContent;
                submitButton.disabled = false;
                
                // Eliminar la prevención y enviar el formulario
                e.target.submit();
            }, 1500);
        }, 1500);
    });
}
