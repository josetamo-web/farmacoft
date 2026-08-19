<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Debes primero registrarte o iniciar sesión como cliente para enviar un mensaje.');
        }

        // Verificar si el usuario tiene el rol 'cliente'
        if (Auth::user()->role !== 'cliente') {
            return redirect()->back()->with('error', 'Solo los usuarios con cuenta de cliente pueden enviar este formulario.');
        }

        $request->validate([
            'nombre'  => 'required|string|max:255',
            'correo'  => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        Contact::create([
            'user_id' => Auth::id(),
            'nombre'  => $request->nombre,
            'correo'  => $request->correo,
            'mensaje' => $request->mensaje,
        ]);

        return redirect()->back()->with('exito', 'Tu mensaje ha sido enviado correctamente.');
    }
}