<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Guitar;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GuitarController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();

        $guitars = Guitar::query()
            ->with('category')
            ->where('name', 'like', "%{$request->input('query')}%")
            ->when($request->input('category_id'), function (Builder $query, int $category_id) {
                $query->where('category_id', $category_id);
            })
            ->when($request->input('tag_id'), function (Builder $query, int $tag_id) {
                $query->whereRelation('tags', 'tags.id', $tag_id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        $categories = Category::all();
        $tags = Tag::all();

        if ($request->header('HX-Request')) {
            return view('components.guitar-table', ['guitars' => $guitars]);
        };

        return view('guitars.index', [
            'guitars' => $guitars,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

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
        $tags = Tag::all();
        $currentTags = $guitar->tags()->pluck('tags.id')->all();

        return view("components.guitar-edit-form", [
            'guitar' => $guitar,
            'open' => true,
            'categories' => $categories,
            'tags' => $tags,
            'currentTags' => $currentTags,
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

        if ($request->has('tag')) {
            $newGuitar->tags()->sync($input['tag']);
        } else {
            $newGuitar->tags()->detach();
        }

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
