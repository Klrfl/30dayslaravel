<?php

use App\Models\Guitar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $guitars = Guitar::all();

    return view('app', ['guitars' => $guitars]);
});
