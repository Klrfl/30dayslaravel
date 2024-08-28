<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Guitar;
use Illuminate\Http\Request;

class GuitarController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $newGuitar = new Guitar();
        $newGuitar->name = $input['name'];
        $newGuitar->category_id = $input['category_id'];
        $newGuitar->model = $input['model'];
        $newGuitar->description = $input['description'];
        $newGuitar->price = $input['price'];

        $newGuitar->saveOrFail();

        return view('components.guitar', ['guitar' => Guitar::find($newGuitar->id)->load('category')]);
    }

    public function edit(string $id)
    {
        $guitar = Guitar::with('category')->find($id);
        $categories = Category::all();

        return view("components.guitar-edit-form", [
            'guitar' => $guitar,
            'open' => true,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $newGuitar = Guitar::query()->findOrFail($id);

        $newGuitar->name = $input['name'];
        $newGuitar->model = $input['model'];
        $newGuitar->category_id = $input['category_id'];
        $newGuitar->description = $input['description'];
        $newGuitar->price = $input['price'];

        $newGuitar->saveOrFail();

        return view("components.guitar", [
            'guitar' => $newGuitar,
            'open' => true
        ]);
    }

    public function destroy(string $id)
    {
        Guitar::destroy($id);
        return response("", 201);
    }
}
