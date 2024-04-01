<?php

namespace App\Policies;

use App\Models\Terrain;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TerrainPolicy
{
    use HandlesAuthorization;

//    public function viewAny(User $user): bool
//    {
//
//    }
//
//    public function view(User $user, Terrain $terrain): bool
//    {
//    }
//
//    public function create(User $user): bool
//    {
//    }

    public function delete(User $user, Terrain $terrain): bool
    {
        return $this->update($user, $terrain);
    }

    public function update(User $user, Terrain $terrain): bool
    {
        return $terrain->user()->is($user);
    }

//    public function restore(User $user, Terrain $terrain): bool
//    {
//    }
//
//    public function forceDelete(User $user, Terrain $terrain): bool
//    {
//    }
}
