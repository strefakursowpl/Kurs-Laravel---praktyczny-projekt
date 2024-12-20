<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function inquiries(): HasMany {
        return $this->hasMany(Inquiry::class);
    }
}
