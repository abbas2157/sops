<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\CancelWorkshop;
use Illuminate\Support\Facades\{Mail};

class CancelWorkshopJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $users;
    private $workshop;
    public function __construct($users, $workshop)
    {
        $this->users = $users;
        $this->workshop = $workshop;
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach($this->users as $user) {
            Mail::to($user->email)->send(new CancelWorkshop($user, $this->workshop));
        }
       
    }
}
