<?php

namespace App\Http\Controllers\Arquiteto;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('nome_usuario')->paginate(10);
        return view('arquiteto.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('arquiteto.usuarios.create');
    }

    public function store(UsuarioRequest $request)
    {
        $dados = $request->validated();
        $dados['password'] = Hash::make($dados['password']);
        
        Usuario::create($dados);
        
        return redirect()
            ->route('arquiteto.usuarios.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

    public function show(Usuario $usuario)
    {
        return view('arquiteto.usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('arquiteto.usuarios.edit', compact('usuario'));
    }

    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $dados = $request->validated();
        
        if ($request->filled('password')) {
            $dados['password'] = Hash::make($dados['password']);
        } else {
            unset($dados['password']);
        }
        
        $usuario->update($dados);
        
        return redirect()
            ->route('arquiteto.usuarios.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        
        return redirect()
            ->route('arquiteto.usuarios.index')
            ->with('success', 'Usuário excluído com sucesso!');
    }
}
