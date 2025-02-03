<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Error_Controller extends Controller
{
    public function Pagina_Error(){
        return view('Pagina_Error');
    }
}
