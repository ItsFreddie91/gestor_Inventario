<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class Login_Controller extends Controller
{

    public function Login(){
        return view('Cliente_Login');
    }

    public function registrar(Request $request){
        // Validar datos de entrada
        $request->validate([
            'Correo_R' => 'required|email|unique:usuarios,correo_usuario',
            'Contrasena_R' => 'required|string|min:6',
            'Nombre' => 'required|string',
            'Apellido_P' => 'required|string',
            'Apellido_M' => 'required|string',
            'Direccion' => 'required|string'
        ]);

        // Guardar el nuevo usuario
        $item = new Usuario();
        $item->correo_usuario = $request->Correo_R;
        $item->contrasena_usuario = Hash::make($request->Contrasena_R);
        $item->tipo_usuario_id = '4';
        $item->save();

        // Obtener el ID del usuario recién registrado
        $usuario_id = $item->id_usuario;

        // Guardar la nueva persona con el ID del usuario
        $item2 = new Persona();
        $item2->nombre_persona = $request->Nombre;
        $item2->apellidop_persona = $request->Apellido_P;
        $item2->apellidom_persona = $request->Apellido_M;
        $item2->direccion_persona = $request->Direccion;
        $item2->usuario_id = $usuario_id;
        $item2->save();

        Auth::login($item);
        $request->session()->regenerate(); // Regenerar la sesión
        return to_route('Index');
    }

    public function Iniciar_Sesion(Request $request){
        // Validar datos de entrada
        $request->validate([
            'Correo_S' => 'required|email',
            'Contrasena_S' => 'required|string',
        ]);

        // Buscar el usuario por correo electrónico
        if($usuario = Usuario::where('correo_usuario', $request->input('Correo_S'))->first()){
            if(Hash::check($request->input('Contrasena_S'), $usuario->contrasena_usuario)){
                Auth::login($usuario); // Autenticar al usuario manualmente
                $request->session()->regenerate(); // Regenerar la sesión

                switch ($usuario->tipo_usuario_id) {
                    case 1:
                        return redirect()->intended('Admin_Inicio')->with('status', 'Sesión creada con éxito.');
                    case 2:
                        return redirect()->intended('Gerente_Inicio');
                    case 3:
                        return redirect()->intended('Almacenista_Inicio');
                    case 4:
                        return redirect()->intended('/');
                    default:
                        return redirect()->back()->withErrors(['tipo_user_error' => 'Tipo de usuario no reconocido.']);
                }
            }else{
                // Cambiar para no mostrar la contraseña ingresada en el mensaje de error
                return redirect()->back()->withErrors(['login_error' => 'Algo Fallo. Usuario o contraseña incorrectos.']);
            }
        } else {
            // Cambiar para no mostrar la contraseña ingresada en el mensaje de error
            return redirect()->back()->withErrors(['login_error' => 'Algo Fallo. Usuario o contraseña incorrectos.']);
        }
    }


    public function Logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/');
    }

}
