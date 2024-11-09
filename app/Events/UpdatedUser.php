<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class UpdatedUser
{
    use Dispatchable;

    public function __construct(public int $userId)
    {

    }
}
