<?php

use App\Http\Controllers\GuitarController;
use App\Models\Guitar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $guitars = Guitar::all();

    return view('app', ['guitars' => $guitars]);
});

Route::post("/guitars", [GuitarController::class, 'store'])->name("guitars.store");
Route::get("/guitars/{id}/edit", [GuitarController::class, 'edit'])->name("guitars.edit");
Route::post("/guitars/{id}", [GuitarController::class, 'update'])->name("guitars.update");
Route::delete("/guitars/{id}", [GuitarController::class, 'destroy'])->name("guitars.destroy");
