<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre_usuario' => $this->name,
            'correo_electronico' => $this->email,
            'perfil' => new PerfilResource($this->whenLoaded('perfil'))
        ];
    }
}
