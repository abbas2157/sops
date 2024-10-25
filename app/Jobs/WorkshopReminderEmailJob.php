<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\WorkshopReminderEmail;
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class WorkshopReminderEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $user;
    private $workshop;
    public function __construct($user, $workshop)
    {
        $this->user = $user;
        $this->workshop = $workshop;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new WorkshopReminderEmail($this->user, $this->workshop));
    }
}
