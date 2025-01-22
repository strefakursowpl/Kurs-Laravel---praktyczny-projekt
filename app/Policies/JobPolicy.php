<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function create(User $user) {
        return $user->role === Role::EMPLOYER ? Response::allow() : Response::deny('Nie możesz dodać ogłoszenia z tego konta');
    }

    public function manage(User $user, Job $job) {
        return $user->id === $job->employer_id;
    }
}
