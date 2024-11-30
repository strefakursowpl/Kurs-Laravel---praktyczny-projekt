<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{

    protected $guarded = [];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_book')->withPivot('status', 'created_at', 'updated_at');
    }
}
