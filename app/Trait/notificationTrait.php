<?php

namespace App\Trait;

use App\Models\User;

trait notificationTrait
{
    public function notificationMessage(){

        $user = User::query()->where('id', 'LIKE', auth()->user()->id)->first();
        return $user->notifications->collect();
    }

    public function notificationCounter()
    {
        return $this->notificationMessage()->count();

    }
}
