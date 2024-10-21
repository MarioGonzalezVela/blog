<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'usuario_id',
        'titulo',
        'contenido'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
