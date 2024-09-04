<?php

use App\Http\Controllers\GuitarController;
use Illuminate\Support\Facades\Route;

Route::get("/guitars", [GuitarController::class, 'index'])->name("guitars.index");
Route::post("/guitars", [GuitarController::class, 'store'])->name("guitars.store");
Route::get("/guitars/{id}/edit", [GuitarController::class, 'edit'])->name("guitars.edit");
Route::put("/guitars/{id}", [GuitarController::class, 'update'])->name("guitars.update");
Route::delete("/guitars/{id}", [GuitarController::class, 'destroy'])->name("guitars.destroy");
