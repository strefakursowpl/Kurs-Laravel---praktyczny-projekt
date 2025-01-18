<?php

namespace App\Models;

use App\Enums\ExperienceLevel;
use App\Enums\JobMode;
use App\Enums\JobSchedule;
use App\Enums\JobType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{

    use HasFactory;

    protected $guarded = [
        'id'
    ];
    
    protected function casts(): array {
        return [
            'type' => JobType::class,
            'experience_level' => ExperienceLevel::class,
            'schedule' => JobSchedule::class,
            'mode' => JobMode::class,
            'tags' => 'array',
            'salary_from' => 'integer',
            'salary_to' => 'integer',
        ];
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function jobInquiries(): HasMany {
        return $this->hasMany(Inquiry::class);
    }

    public function favoriteJobs(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_job');
    }
}
