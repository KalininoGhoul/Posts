<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $fillable = ['user', 'text', 'order', 'category_id'];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
