<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuitarRequest;
use App\Models\Category;
use App\Models\Guitar;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function store(GuitarRequest $request)
    {
        $input = $request->validated();

        $newGuitar = new Guitar();
        $newGuitar->name = $input['name'];
        $newGuitar->category_id = $input['category_id'];
        $newGuitar->model = $input['model'];
        $newGuitar->description = $input['description'];
        $newGuitar->price = $input['price'];

        $newGuitar->saveOrFail();

        return view('components.guitar', ['guitar' => Guitar::find($newGuitar->id)->load('category')]);
    }

    public function edit(Request $request, string $id)
    {
        $guitar = Guitar::with('category')->find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $currentTags = $guitar->tags()->pluck('tags.id')->all();

        if ($request->hasHeader('HX-Request')) {
            return view("components.guitar-edit-form", [
                'guitar' => $guitar,
                'open' => true,
                'categories' => $categories,
                'tags' => $tags,
                'currentTags' => $currentTags,
            ]);
        }

        return view('guitars.edit', [
            $id,
            'guitar' => $guitar,
            'open' => true,
            'categories' => $categories,
            'tags' => $tags,
            'currentTags' => $currentTags,
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $input = $request->validate([
                'name' => 'required|string',
                'model' => 'required|string',
                'category_id' => 'required|integer',
                'description' => 'required|string|max:255',
                'price' => 'required|decimal:0,2',
                'tag' => 'sometimes|required|array',
                'tag.*' => 'integer',
            ]);
        } catch (ValidationException $e) {
            if ($request->hasHeader('HX-Request')) {
                $guitar = Guitar::with('category')->find($request['id']);
                $categories = Category::all();
                $tags = Tag::all();
                $currentTags = $guitar->tags()->pluck('tags.id')->all();

                return response()
                    ->view('components.guitar-edit-form', [
                        'guitar' => $guitar,
                        'open' => true,
                        'categories' => $categories,
                        'tags' => $tags,
                        'currentTags' => $currentTags,
                        'errors' => $e->errors(),
                    ])
                    ->withHeaders([
                        'HX-Retarget' => '#dialog',
                    ]);
            }

            throw $e;
        }

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

        $newGuitar->saveOrfail();

        if ($request->hasHeader('HX-Request')) {
            return view("components.guitar", [
                'guitar' => $newGuitar,
                'open' => true
            ]);
        }

        return redirect()->route('guitars.index');
    }

    public function destroy(Request $request, string $id)
    {
        Guitar::destroy($id);
        if ($request->header('HX-Request')) {
            return redirect()->route('guitars.index');
        }

        return response("", 201);
    }
}
