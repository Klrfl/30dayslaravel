<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
