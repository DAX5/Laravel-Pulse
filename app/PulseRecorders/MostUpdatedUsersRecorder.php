<?php

namespace App\PulseRecorders;

use App\Events\UpdatedUser;
use Laravel\Pulse\Facades\Pulse;

class MostUpdatedUsersRecorder
{
    public array $listen = [
        UpdatedUser::class
    ];

    public function record(UpdatedUser $event): void
    {
        Pulse::record('updated_user', $event->userId, 1)->count();
    }
}
