<?php

use App\Http\Controllers\ConsultaAghuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaSisfamController;

Route::get('/consultas/sisfam', [ConsultaSisfamController::class, 'index']) ->name('consultas.index');

Route::get('/consultas/aghu', [ConsultaAghuController::class, 'index']) ->name('consultas.consultas_aghu.blade.php');