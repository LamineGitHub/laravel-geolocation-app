<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Zone;
use Illuminate\Auth\Access\HandlesAuthorization;

class ZonePolicy
{
    use HandlesAuthorization;

//    public function viewAny(User $user): bool
//    {
//
//    }
//
//    public function view(User $user, Zone $zone): bool
//    {
//    }
//
//    public function create(User $user): bool
//    {
//    }

    public function update(User $user, Zone $zone): bool
    {
        return $zone->user()->is($user);
    }

    public function delete(User $user, Zone $zone): bool
    {
        return $zone->user()->is($user);
    }

//    public function restore(User $user, Zone $zone): bool
//    {
//    }
//
//    public function forceDelete(User $user, Zone $zone): bool
//    {
//    }
}
