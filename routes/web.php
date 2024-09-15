<?php

use App\Http\Controllers\GuitarController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BaseController::class, 'index'])->name('home');
Route::get('/login', [BaseController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get("/guitars", [GuitarController::class, 'index'])->name("guitars.index");
Route::post("/guitars", [GuitarController::class, 'store'])->name("guitars.store");
Route::get("/guitars/{id}/edit", [GuitarController::class, 'edit'])->name("guitars.edit");
Route::put("/guitars/{id}", [GuitarController::class, 'update'])->name("guitars.update");
Route::delete("/guitars/{id}", [GuitarController::class, 'destroy'])->name("guitars.destroy");

Route::resource("/tags", TagController::class);
