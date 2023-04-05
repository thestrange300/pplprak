<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/',[Controller::class, 'index'])->name('/');
Route::get('/edit',[Controller::class, 'edit'])->name('edit');
Route::put('/update/{id}',[Controller::class, 'update']);