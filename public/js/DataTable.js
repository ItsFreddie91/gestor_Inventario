$(document).ready(function() {
    // Asegúrate de que jQuery se haya cargado antes de ejecutar este código
    console.log("jQuery cargado: " + typeof $);
    $('#example').DataTable({
        "language": {
             "url": "https://cdn.datatables.net/plug-ins/2.1.8/i18n/es-MX.json" // Ruta del archivo de idioma en español
        }, "responsive": true
    });
});