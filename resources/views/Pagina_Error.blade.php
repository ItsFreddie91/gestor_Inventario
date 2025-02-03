<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <link rel="stylesheet" href="{{asset('css/Pagina_Error.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-red-50 via-white to-red-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-2xl text-center max-w-md w-full border-2 border-red-100 relative overflow-hidden" style="animation: shake 0.5s infinite;">
        <!-- Decorative gradient overlay -->
        <div class="absolute top-0 left-0 right-0 bottom-0 opacity-10 bg-gradient-to-r from-red-200 to-pink-200 z-0"></div>

        <div class="relative z-10">
            <div class="mb-6" style="animation: pulse 2s infinite;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 mx-auto text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-pink-600 mb-4">¡Acceso Denegado!</h1>
            <p class="text-gray-700 mb-6 text-lg font-medium">
                Lo sentimos, no tienes los permisos necesarios para acceder a esta página. 
                <span class="block text-sm text-gray-500 mt-2">Por favor, verifica tus credenciales.</span>
            </p>
            
            <div class="flex space-x-4 justify-center mb-6">
                <a href="{{route('Login')}}" class="bg-red-500 text-white px-8 py-3 rounded-full hover:bg-red-600 transition duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                    Iniciar Sesión
                </a>
                <a href="{{route('Index')}}" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-full hover:bg-gray-200 transition duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                    Página Principal
                </a>
            </div>

            <div class="border-t border-red-100 pt-4 text-sm text-gray-500">
                <p>¿Necesitas ayuda? Contacta con nuestro 
                    <a href="https://www.youtube.com/watch?v=sHSfNSwHw-U" class="text-red-500 hover:underline">soporte técnico</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>