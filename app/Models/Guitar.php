<?php

namespace App\Models;

use App\Observers\GuitarObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ObservedBy([GuitarObserver::class])]
class Guitar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'category_id',
        'description',
        'price',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->BelongsToMany(Tag::class);
    }
}
