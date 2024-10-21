<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'name',
        'email'
    ];

    public function perfil(){
        return $this->hasOne(Perfil::class, 'usuario_id');
    }
}
