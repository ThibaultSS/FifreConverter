<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConvertController;

Route::get('/', function () {
    return view('home');
});
Route::post('/print', [ConvertController::class, 'assemble']);
