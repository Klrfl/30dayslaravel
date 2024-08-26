<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use Illuminate\Http\Request;

class GuitarController extends Controller
{
    public function edit(string $id)
    {
        $guitar = Guitar::find($id);
        return view("components.guitar-edit-form", ['guitar' => $guitar, 'open' => true]);
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $newGuitar = Guitar::query()->findOrFail($id);

        $newGuitar->name = $input['name'];
        $newGuitar->model = $input['model'];
        $newGuitar->type = $input['type'];
        $newGuitar->description = $input['description'];
        $newGuitar->price = $input['price'];

        $newGuitar->saveOrFail();

        return view("components.guitar-edit-form", [
            'guitar' => $newGuitar,
            'open' => false
        ]);
    }
}
