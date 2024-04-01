<?php

namespace App\Policies;

use App\Models\Promoteur;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PromoteurPolicy
{
    use HandlesAuthorization;

//    public function viewAny(User $user): bool
//    {
//
//    }
//
//    public function view(User $user, Promoteur $promoteur): bool
//    {
//    }
//
//    public function create(User $user): bool
//    {
//    }

    public function delete(User $user, Promoteur $promoteur): bool
    {
        return $this->update($user, $promoteur);
    }

    public function update(User $user, Promoteur $promoteur): bool
    {
        return $promoteur->user()->is($user);
    }

//    public function restore(User $user, Promoteur $promoteur): bool
//    {
//    }
//
//    public function forceDelete(User $user, Promoteur $promoteur): bool
//    {
//    }
}
