<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 h-screen flex">
    <!-- Menú Lateral Responsivo -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full w-64 bg-indigo-700 text-white p-4 shadow-lg transition-transform duration-300 ease-in-out md:relative md:translate-x-0 z-50 flex flex-col">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center">
                <i class="fas fa-chart-pie mr-3 text-2xl"></i>
                <h1 class="text-xl font-bold">Gerente</h1>
            </div>
            <button id="closeSidebar" class="md:hidden">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <nav class="flex-grow">
            <ul>
                <li class="mb-4">
                    <a href="{{route('Gerente_Inicio')}}" class="flex items-center hover:bg-indigo-600 p-2 rounded">
                        <i class="fas fa-home mr-3"></i>
                        Inventario
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{route('Reportes_Gerentes')}}" class="flex items-center hover:bg-indigo-600 p-2 rounded">
                        <i class="fa-solid fa-chart-line mr-3"></i>
                        Reportes
                    </a>
                </li>
                
            </ul>
        </nav>
        
        <!-- Botón de Cerrar Sesión en la parte inferior -->

        <form action="{{route('Logout')}}" method="POST">
            @csrf
            <div class="mt-auto pb-4">
                <a href="#" onclick="this.closest('form').submit()" class="flex items-center hover:bg-indigo-600 p-2 rounded text-white">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Cerrar Sesión
                </a>
            </div>
        </form>

    </aside>

    <!-- Overlay para móviles -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden"></div>

    <!-- Panel Principal -->
    <main class="flex-grow p-6 bg-gray-100 overflow-auto w-full md:w-auto">
        <header class="flex justify-between items-center mb-6">
            <div class="flex items-center">
                <button id="openSidebar" class="md:hidden mr-4">
                    <i class="fas fa-bars text-2xl text-gray-600"></i>
                </button>
            </div>
            <div class="flex items-center">
                <div class="flex items-center">
                    @auth
                    <img src="https://th.bing.com/th/id/OIP.OcmYwRCA9m-3b9kShi85IQHaJ4?rs=1&pid=ImgDetMain" alt="Usuario" class="rounded-full mr-2" width="30px">
                        <span class="email botones_textos">{{ Auth::user()->correo_usuario }}</span>
                    @else
                        <h5>No hay sesión</h5>
                    @endauth
                </div>
            </div>
        </header>

        <!--Contenido-->
        @yield('Contenido')

        @yield('Reportes')

    </main>

    <script>
        // Script para el menú responsivo
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const openSidebarBtn = document.getElementById('openSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');

        // Abrir sidebar
        openSidebarBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        });

        // Cerrar sidebar
        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Cerrar sidebar al hacer clic fuera
        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });
    </script>
</body>
</html>