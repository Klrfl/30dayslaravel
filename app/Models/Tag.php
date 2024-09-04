<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * get all guitars under a tag.
     */
    public function guitars(): BelongsToMany
    {
        return $this->BelongsToMany(Guitar::class);
    }
}
