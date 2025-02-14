<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/Login_Cliente.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body class="bg-dark">
    @if ($errors->has('login_error'))
        <input type="hidden" id="loginError" value="true">

    @endif
    @if ($errors->has('tipo_user_error'))
        <div class="alert alert-danger">
            {{ $errors->first('tipo_user_error') }}
        </div>
    @endif
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="{{route('Iniciar_Sesion')}}" method="POST" class="sign-in-form">
                        @csrf
                        <div class="logo">
                            <img src="{{asset('Img/logo.png')}}" alt="easyclass" />
                            <h4>Tienda Online</h4>
                        </div>
        
                        <div class="heading">
                            <h2>¡Bienvenido de nuevo!</h2>
                            <h6>¿Aún no estás registrado?</h6>
                            <a href="#" class="toggle">Regístrate aquí</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="email" name="Correo_S" id="Correo_S" class="input-field" onkeyup="this.value=Correo_Contraseña(this.value)" required/>
                                <label>Email</label>
                            </div>

                            <div class="input-wrap">
                                    <input type="password" name="Contrasena_S" id="Contrasena_S" minlength="8" class="input-field" onkeyup="this.value=Correo_Contraseña(this.value)" required/>
                                    <label>Contraseña</label>
                            </div>

                            <input type="submit" value="Iniciar Sesión" class="sign-btn" />

                            <p class="text">
                                ¿Olvidaste tus datos de inicio de sesión?
                                <a href="#">Obtén ayuda</a> para iniciar sesión.
                            </p>
                        </div>
                    </form>


                    <!--Registro-->
                    <form action="{{route('registrar')}}" autocomplete="off" method="POST" class="sign-up-form">
                        @csrf
                        <div class="logo">
                            <img src="{{asset('Img/logo.png')}}" alt="easyclass" />
                            <h4>Tienda Online</h4>
                        </div>

                        <div class="heading">
                            <h6>¿Ya tienes una cuenta?</h6>
                            <a href="#" class="toggle">Inicia Sesión</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                    <input type="text" name="Nombre" id="Nombre" minlength="3" class="input-field" autocomplete="off" onkeyup="this.value=Nombre_Apellidos(this.value)" required/>
                                    <label>Nombre</label>
                            </div>

                            <div class="input-wrap">
                                <input type="text" name="Apellido_P" id="Apellido_P" minlength="5" class="input-field" autocomplete="off" onkeyup="this.value=Nombre_Apellidos(this.value)" required/>
                                <label>Apellido Paterno</label>
                            </div>

                            <div class="input-wrap">
                                <input type="text" name="Apellido_M" id="Apellido_M" minlength="5" class="input-field" autocomplete="off" onkeyup="this.value=Nombre_Apellidos(this.value)" required/>
                                <label>Apellido Materno</label>
                            </div>

                            <div class="input-wrap">
                                    <input type="email" name="Correo_R" id="Correo_R" class="input-field" onkeyup="this.value=Correo_Contraseña(this.value)" required/>
                                    <label>Email</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" name="Contrasena_R" id="Contrasena_R" minlength="8" class="input-field" onkeyup="this.value=Correo_Contraseña(this.value)" required/>
                                <label>Contraseña (min. 8 caracácteres)</label>
                            </div>

                            <div class="input-wrap">
                                <input type="text" name="Direccion" id="Direccion" minlength="8" class="input-field" onkeyup="this.value=Inputs_Producto(this.value)" required/>
                                <label>Dirección</label>
                            </div>

                            <input type="submit" value="Registrarse" class="sign-btn" />

                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="{{asset('Img/image1.png')}}" class="image img-1 show" alt="" />
                        <img src="{{asset('Img/image2.png')}}" class="image img-2" alt="" />
                        <img src="{{asset('Img/image3.png')}}" class="image img-3" alt="" />
                    </div>

                    <div class="text-slider">
                        <div class="text-wrap">
                            <div class="text-group">
                                <h2>¡Tenemos lo que buscas!</h2>
                                <h2>Forma parte de nuestra familia</h2>
                                <h2>¡Esto es sorprendente!</h2>
                            </div>
                        </div>

                        <div class="bullets">
                            <span class="active" data-value="1"></span>
                            <span data-value="2"></span>
                            <span data-value="3"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{asset('js/Login_Cliente.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/Error_Login.js')}}"></script>
    <script src="{{asset('js/Validacion_Inputs.js')}}"></script>
</body>
</html>