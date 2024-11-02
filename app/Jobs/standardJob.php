<?php

namespace App\Jobs;

use App\Models\ProcessData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class standardJob implements ShouldQueue
{
    use Queueable;

    private $slow;

    /**
     * Create a new job instance.
     */
    public function __construct(bool $slow = false)
    {
        $this->slow = $slow;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->slow) {
            sleep(5);
        }

        ProcessData::create(['count' => rand(1, 999)]);
    }
}
