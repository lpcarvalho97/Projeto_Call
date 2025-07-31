<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaSisfamController;

Route::get('/api/consulta-sisfam', [ConsultaSisfamController::class, 'index']);
