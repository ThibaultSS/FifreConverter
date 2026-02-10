<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConvertController;

Route::get('/', function () {
    return view('home');
});
Route::get('/print', [ConvertController::class, 'printMe']);
