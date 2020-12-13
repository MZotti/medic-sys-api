<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user)
    {
        if (!isset($user['password']) || empty($user['password'])) {
            $password = Str::random(10);
            $hashPassword = bcrypt($password);
            $user['password'] = $hashPassword;
        }
    }

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $random = Str::random(10);
        $user->email = 'deleted_' . $random . '_' . $user->email;
        $user->save();
    }

}
