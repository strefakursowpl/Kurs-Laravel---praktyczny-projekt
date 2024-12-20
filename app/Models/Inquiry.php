<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function employer(): BelongsTo {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function job(): BelongsTo {
        return $this->belongsTo(Job::class);
    }
}
