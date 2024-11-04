<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:8|confirmed',
            'nome_usuario' => 'required|unique:usuarios,nome_usuario',
            'perfil' => 'required|in:administrador,tecnico,usuario'
        ]);

        $usuario = Usuario::create([
            'nome' => $request->name,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'perfil' => $request->perfil ?? 'usuario',
            'nome_usuario' => $request->nome_usuario
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function show(Usuario $usuario)
    {
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'password' => 'nullable|min:8|confirmed',
            'nome_usuario' => 'nullable|unique:usuarios,nome_usuario',
            'perfil' => 'nullable|in:administrador,tecnico,usuario'
        ]);

        $usuario->update([
            'nome' => $request->name,
            'email' => $request->email,
            'senha' => $request->password ? Hash::make($request->password) : $usuario->senha,
            'perfil' => $request->perfil ?? $usuario->perfil,
            'nome_usuario' => $request->nome_usuario ?? $usuario->nome_usuario
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
} 