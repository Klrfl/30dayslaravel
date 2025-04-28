<?php

namespace App\Observers;

use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class TagObserver
{
    /**
     * Handle the Tag "created" event.
     */
    public function created(Tag $tag): void
    {
        Log::info('new tag {id} created.', ['id' => $tag->id, 'name' => $tag->name]);
    }

    /**
     * Handle the Tag "updated" event.
     */
    public function updated(Tag $tag): void
    {
        Log::info('new tag {id} updated.', ['id' => $tag->id, 'name' => $tag->name]);
    }

    /**
     * Handle the Tag "deleted" event.
     */
    public function deleted(Tag $tag): void
    {
        Log::info('new tag {id} deleted.', ['id' => $tag->id, 'name' => $tag->name]);
    }

    /**
     * Handle the Tag "restored" event.
     */
    public function restored(Tag $tag): void
    {
        Log::info('new tag {id} restored.', ['id' => $tag->id, 'name' => $tag->name]);
    }

    /**
     * Handle the Tag "force deleted" event.
     */
    public function forceDeleted(Tag $tag): void
    {
        Log::info('new tag {id} force deleted.', ['id' => $tag->id, 'name' => $tag->name]);
    }
}
