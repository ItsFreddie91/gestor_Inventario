<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerente</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <body class="bg-gray-100">
        <!-- Botón de menú móvil -->
        <button id="menuBtn" class="lg:hidden fixed top-4 left-4 z-50 bg-blue-600 text-white p-2 rounded-md">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    
        <!-- Sidebar -->
        <div id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-blue-800 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
            <!-- Logo o título -->
            <div class="p-6">
                <h2 class="text-white text-2xl font-bold">Mi Panel</h2>
            </div>
    
            <!-- Enlaces -->
            <nav class="mt-6">
                <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-blue-700 transition-colors duration-200">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Ventas
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-blue-700 transition-colors duration-200">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Reportes
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-blue-700 transition-colors duration-200">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    Stock
                </a>

                <form action="{{route('Logout')}}" method="POST">
                    @csrf
                    <a href="#" onclick="this.closest('form').submit()" class="flex items-center px-6 py-3 text-white hover:bg-blue-700 transition-colors duration-200 mt-auto">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Salir</span>
                    </a>
                </form>
                
            </nav>
        </div>
    
        <!-- Contenido principal -->
        <div class="lg:ml-64 p-8">
            <!--Contenido-->
            <main>
                @yield('Contenido')
            </main>
        </div>
    
        <script>
            const menuBtn = document.getElementById('menuBtn');
            const sidebar = document.getElementById('sidebar');
            let isSidebarOpen = false;
    
            menuBtn.addEventListener('click', () => {
                isSidebarOpen = !isSidebarOpen;
                if (isSidebarOpen) {
                    sidebar.classList.remove('-translate-x-full');
                } else {
                    sidebar.classList.add('-translate-x-full');
                }
            });
    
            // Cerrar sidebar al hacer clic fuera en dispositivos móviles
            document.addEventListener('click', (e) => {
                if (window.innerWidth < 1024) {
                    if (!sidebar.contains(e.target) && !menuBtn.contains(e.target) && isSidebarOpen) {
                        sidebar.classList.add('-translate-x-full');
                        isSidebarOpen = false;
                    }
                }
            });
    
            // Ajustar sidebar al cambiar el tamaño de la ventana
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                } else {
                    if (!isSidebarOpen) {
                        sidebar.classList.add('-translate-x-full');
                    }
                }
            });
        </script>
    </body>
</body>
</html>