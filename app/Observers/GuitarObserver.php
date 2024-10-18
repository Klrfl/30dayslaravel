<?php

namespace App\Observers;

use App\Models\Guitar;
use Illuminate\Support\Facades\Log;

class GuitarObserver
{
    /**
     * Handle the Guitar "created" event.
     */
    public function created(Guitar $guitar): void
    {
        Log::info('new guitar with ID {id} has been created.', [
            'id' => $guitar->id,
        ]);
    }

    /**
     * Handle the Guitar "updated" event.
     */
    public function updated(Guitar $guitar): void
    {
        Log::info('guitar with ID {id} has been updated.', [
            'id' => $guitar->id,
        ]);
    }

    /**
     * Handle the Guitar "deleted" event.
     */
    public function deleted(Guitar $guitar): void
    {
        Log::info('guitar with ID {id} has been deleted.', [
            'id' => $guitar->id,
        ]);
    }

    /**
     * Handle the Guitar "restored" event.
     */
    public function restored(Guitar $guitar): void
    {
        //
    }

    /**
     * Handle the Guitar "force deleted" event.
     */
    public function forceDeleted(Guitar $guitar): void
    {
        //
    }
}
