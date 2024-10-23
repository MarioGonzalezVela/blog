<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuario extends Model
{
    protected $visible = ['id', 'name', 'email', 'perfil_data'];

    protected $appends = ['perfil_data'];

    protected $fillable = [
        'name',
        'email'
    ];

    public function getPerfilDataAttribute(){
        return $this->perfil;
    }

    public function perfil(){

        return $this->hasOne(Perfil::class, 'usuario_id');
    }

    public function roles(): BelongsToMany{

        return $this->belongsToMany(Rol::class);
    }
}
