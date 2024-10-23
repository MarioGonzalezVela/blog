<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Http\Resources\UsuarioResource;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $usuario = Usuario::create($data);
        return response()->json($usuario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $result = Usuario::with('perfil')->findOrFail($id);
        $result = Usuario::findOrFail($id);
        // return response()->json(new UsuarioResource($result), 200);
        return response()->json($result,200);
    }

    public function showPerfil(string $id)
    {
        $result = Usuario::findOrFail($id);
        return response()->json($result->perfil, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($data);

        return response()->json($usuario, 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json($usuario, 204);
    }
}
