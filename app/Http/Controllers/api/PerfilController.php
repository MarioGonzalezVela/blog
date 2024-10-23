<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfiles = Perfil::all();
        return response()->json($perfiles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'usuario_id' => 'required|integer|min:1',
            'bio' => 'required|string|max:255',
            'web' => 'required|url:http,https'
        ]);

        // Usuario::findOrFail($data['usuario_id']);
        // $data['usuario_id'] = $result->id;

        $perfil = Perfil::create($data);
        return response()->json($perfil, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = Perfil::findOrFail($id);
        return response()->json(['perfil' =>$result, 'usuario' =>$result], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'usuario_id' => 'required|integer|min:1',
            'bio' => 'required|string|max:255',
            'web' => 'required|url:http,https'
        ]);

        $perfil = Perfil::findOrFail($id);
        $perfil->update($data);
        
        return response()->json($perfil, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();

        return response()->json($perfil, 204);
    }
}
