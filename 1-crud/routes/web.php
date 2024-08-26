<?php

use App\Models\Guitar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $guitars = DB::select('select * from guitars');

    return view('app', ['guitars' => $guitars]);
});
