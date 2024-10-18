<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        Log::info('new category {id} created.', ['id' => $category->id, 'name' => $category->name]);
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        Log::info('category {id} updated.', ['id' => $category->id, 'name' => $category->name]);
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        Log::info('category {id} deleted.', ['id' => $category->id, 'name' => $category->name]);
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        Log::info('category {id} restored.', ['id' => $category->id, 'name' => $category->name]);
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        Log::info('category {id} force deleted.', ['id' => $category->id, 'name' => $category->name]);
    }
}
