<?php

namespace App\Livewire\Pulse;

use Illuminate\Contracts\View\View;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;

class MostUpdatedUsersCard extends Card
{
    public function render(): View
    {
        $updatedRegisters = $this->aggregate('updated_user', 'count');
        $users = Pulse::resolveUsers($updatedRegisters->pluck('key'));

        $updatedRegisters = $updatedRegisters->map(fn($row) => (object)[
            'key' => $row->key,
            'user' => $users->find($row->key),
            'count' => (int) $row->count,
        ]);

        return view('livewire.pulse.most-updated-users-card', [
            'updatedRegisters' => $updatedRegisters,
        ]);
    }
}
