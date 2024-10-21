<?php

use App\Http\Controllers\api\UsuarioController;
use App\Http\Controllers\api\PerfilController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\RolController;
use Illuminate\Support\Facades\Route;

Route::apiResource('usuario', UsuarioController::class);

Route::apiResource('perfil', PerfilController::class);

Route::apiResource('post', PostController::class);

Route::apiResource('rol', RolController::class);
