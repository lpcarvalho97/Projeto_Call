<?php

use App\Http\Controllers\ConsultaAghuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaSisfamController;
use App\Http\Controllers\ConsultaAghuCopyController;

Route::get('/consultas/sisfam', [ConsultaSisfamController::class, 'index']) ->name('consultas.index');

Route::get('/consultas/aghu', [ConsultaAghuController::class, 'index']) ->name('consultas.consultas_aghu.blade.php');

Route::get('/consultas/teste', [ConsultaAghuCopyController::class, 'index']) ->name('consultas.consultas_aghu_copy');

Route::post('/consultas/aghu/update_campo', [ConsultaAghuController::class, 'updateCampo'])
    ->name('consultas.updateCampo');