<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Project $project)
    {
        return $user->role === 'admin' || 
               $project->assigned_to === $user->id || 
               $project->created_by === $user->id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Project $project)
    {
        return $user->role === 'admin' || 
               $project->assigned_to === $user->id || 
               $project->created_by === $user->id;
    }

    public function delete(User $user, Project $project)
    {
        return $user->role === 'admin' || $project->created_by === $user->id;
    }
} 