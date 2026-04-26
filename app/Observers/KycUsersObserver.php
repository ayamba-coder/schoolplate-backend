<?php

namespace App\Observers;

use App\Models\Student;
use App\Models\User;
use App\Notifications\KycNotification;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Database\Eloquent\Model;


class KycUsersObserver implements ShouldHandleEventsAfterCommit
{

    /**
     * Handle the User "created" event.
     */
    public function created(Model $user): void
    {
        $user->notify(new KycNotification());
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
