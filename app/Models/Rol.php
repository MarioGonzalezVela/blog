<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rol extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function usuarios(): BelongsToMany{
        
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
