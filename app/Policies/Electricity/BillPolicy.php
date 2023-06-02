<?php

namespace App\Policies\Electricity;

use App\Models\Bill;
use App\Models\User;

class BillPolicy
{
    public function viewAny(User $user)
    {
        if ($user->role == 'admin' || $user->role == 'moderator')
            return true;
        else
            return false;
    }

    public function view(User $user)
    {
        if ($user->role == 'admin' || $user->role == 'moderator')
            return true;
        else
            return false;
    }

    public function create(User $user)
    {
        if ($user->role == 'admin' || $user->role == 'moderator')
            return true;
        else
            return false;
    }

    public function update(User $user, Bill $bill)
    {
        if ($user->role == 'admin' || $bill->user_id == $user->id)
            return true;
        else
            return false;
    }

    public function delete(User $user)
    {
        if ($user->role == 'admin')
            return true;
        else
            return false;
    }
}
