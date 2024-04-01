<?php

namespace App\Policies;

use App\Models\Region;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegionPolicy
{
    use HandlesAuthorization;

//    public function viewAny(User $user): void
//    {
//    }
//
//    public function view(User $user, Region $region): void
//    {
//    }
//
//    public function create(User $user): void
//    {
//    }

    public function delete(User $user, Region $region): bool
    {
        return $this->update($user, $region);
    }

    public function update(User $user, Region $region): bool
    {
        return $region->user()->is($user);
    }

//    public function restore(User $user, Region $region): void
//    {
//    }
//
//    public function forceDelete(User $user, Region $region): void
//    {
//    }
}
