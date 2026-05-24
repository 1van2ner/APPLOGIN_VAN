<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career; // Corregido a 'App' con mayúscula
use App\Models\User;   // Corregido a 'App' con mayúscula

class UserController extends Controller
{
    public function create(){
        $careers = Career::all();
        return view('register', compact('careers'));
    }

    public function store(Request $request){
        // 1. Validar que los datos lleguen bien y la carrera exista en HeidiSQL
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'career_id' => 'required|exists:careers,id',
            'terms_accepted' => 'accepted',
        ]);

        // 2. Guardar el usuario en la base de datos (Corregido sin espacios ni $)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encripta la contraseña por seguridad
            'career_id' => $request->career_id,
            'terms_accepted' => $request->has('terms_accepted'),
        ]);

        // 3. Redireccionar con mensaje de éxito
        return redirect()->route('register')->with('success', 'Usuario registrado exitosamente.');
    }
}